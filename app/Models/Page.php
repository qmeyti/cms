<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use function PHPUnit\Framework\isNull;

class Page extends Model
{
    use LogsActivity;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'feature_photo',
        'language',
        'parent',
        'author',
        'is_translation',
        'status',
        'type',
        'excerpt',
        'meta_description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function writer()
    {
        // dd('hi2');
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get parent page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent', 'id');

    }

    /**
     * Get children pages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Page::class, 'parent', 'id');
    }
    /**
     * Get children pages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function translations()
     {
         return $this->hasMany(Page::class, 'parent', 'id')->where('is_translation',1);
     }


    /**
     * Delete all old Auto-draft posts
     *
     * @param int $from
     */
    public static function deleteAutoDrafts(int $from = 86400)
    {
        Page::where('status', 'auto-draft')
            ->where('created_at', '<', date('Y-m-d H:i:s', time() - $from))
            ->delete();
    }

    /**
     * Make new auto draft post
     *
     * @param string $postType
     * @param User|null $user
     * @param string $language
     * @return mixed
     */
    public static function makeAutoDraft(string $postType = 'post', User $user = null)
    {
        return Page::create([
            'status' => 'auto-draft',
            'author' => ($user ?? auth()->user())->id,
            'type' => $postType,
            'language' =>isset($_GET['language']) ? $_GET['language'] : __lng(),

             'parent' => isset($_GET['parent'])? $_GET['parent'] : null,

             'is_translation' => isset($_GET['parent'])?1:0,

        ]);
    }





    /**
     * @param array $notInIds
     * @return mixed
     */
    public static function getParentablePage(array $notInIds)
    {
        return \App\Models\Page::where('status', 'published')->whereNotIn('id', $notInIds)->where('type', 'page')->get();
    }

    /**
     * @return mixed
     */
    public static function getLinkablePages()
    {
        return \App\Models\Page::where('status', 'published')->get(['id', 'title', 'type']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'page_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'page_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'page_id', 'id');

    }

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getPopulars(int $limit = 6)
    {
        $posts = \App\Models\Page::withCount('likes')
            ->orderBy('likes_count', 'DESC')
            ->limit($limit)
            ->get();

        return $posts;
    }

    /**
     * Get the near page
     *
     * @param Page $page
     * @param bool $next
     * @return mixed
     */
    public static function theNearPage(Page $page, bool $next = true)
    {
        return Page::where('id', ($next ? '>' : '<'), $page->id)
            ->orderBy('id', ($next ? 'ASC' : 'DESC'))
            ->where('is_translation', 0)
            ->where('status', 'published')
            ->first();
    }

    /**
     * @param string $tag
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getByTag(string $tag, int $limit = 10)
    {
        return Page::postsPublicConditions()
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            })->paginate($limit);
    }

    /**
     * @param string $field
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function findBy(string $field, string $value)
    {
        return Page::with(['tags', 'categories', 'writer', 'comments', 'comments' => function ($q) {
            $q->where('status', 'publish');
        }])
            ->withCount('comments')
            ->where($field, $value)
            ->where('is_translation', 0)
            ->where('status', 'published')
            ->first();
    }

    /**
     * @param int|null $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getFavored(int $limit = null)
    {
        $pages = Page::postsPublicConditions()
            ->whereIn('pages.id', Favorite::where('user_id', auth()->id())->pluck('page_id')->toArray());

        if (!is_null($limit))
            return $pages->paginate($limit);

        return $pages->get();

    }

    /**
     * @param int|null $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getLiked(int $limit = null)
    {
        $pages = Page::postsPublicConditions()
            ->whereIn('pages.id', Like::where('user_id', auth()->id())
                ->where('type', 'like')
                ->pluck('page_id')
                ->toArray());

        if (!is_null($limit))
            return $pages->paginate($limit);

        return $pages->get();

    }

    /**
     * @param string $status
     * @param array|string[] $order
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function postsPublicConditions($status = 'published', array $order = ['pages.id', 'DESC'])
    {
        return Page::with('tags', 'categories', 'writer')
            ->withCount('comments')
            ->where('type', 'post')
            ->where('is_translation', 0)
            ->where('status', 'published')
            ->orderBy($order[0], $order[1]);
    }
}
