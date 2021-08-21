<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public static function makeAutoDraft(string $postType = 'post', User $user = null, string $language = 'fa')
    {
        return Page::create([
            'status' => 'auto-draft',
            'author' => ($user ?? auth()->user())->id,
            'type' => $postType,
            'language' => $language,
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
}
