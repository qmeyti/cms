<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;

class Tag extends Model
{
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

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
    protected $fillable = ['name', 'view'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class);
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
     * generate new tags for post
     *
     * @param array $tags
     * @return int
     */
    public static function savePostTags($tags)
    {
        $tags = array_values($tags);
        $exists = Tag::whereIn('name', $tags)->pluck('name')->toArray();

        $new = [];

        $all = [];

        foreach ($tags as $tag) {
            if (!in_array($tag, $exists))
                $new[] = ['name' => "$tag"];
            $all[] = $tag;
        }

        if (count($new) > 0) {
            Tag::insert($new);
        }

        $newIds = [];
        if (count($all) > 0)
            $newIds = Tag::whereIn('name', $all)->pluck('id')->toArray();

        return $newIds;
    }

    /**
     * Get shuffle for a page
     *
     *
     * @param $pageTags
     * @param int|null $count
     * @return array
     */
    public static function getShuffleForPage($pageTags, int $count = null)
    {
        $tags = [];
        foreach ($pageTags as $tag)
            $tags[] = ['tag' => $tag->name, 'id' => $tag->id];

        if (empty($tags))
            return [];

        shuffle($tags);

        if (!is_null($count) && $count > 0)
            $tags = array_slice($tags, 0, $count);

        $ids = array_column($tags, 'id');
        $counts = DB::table('page_tag')
            ->whereIn('tag_id', $ids)
            ->groupBy('tag_id')
            ->select('tag_id', DB::raw('count(page_id) as count'))
            ->get();

        foreach ($tags as $key => $i1) {

            foreach ($counts as $i2) {
                if ($i1['id'] == $i2->tag_id)
                    $tags[$key]['count'] = $i2->count;
            }

        }

        return $tags;
    }

    /**
     * Get posts list random tags
     *
     * @param $posts
     * @param int $count
     * @return array
     */
    public static function getRandomForPages($posts, $count = 20)
    {
        $tags = [];
        foreach ($posts as $post) {
            $tagsObj = $post->tags;
            foreach ($tagsObj as $tag)
                $tags[] = ['tag' => $tag->name, 'id' => $tag->id, 'view' => $tag->view];
        }

        if (empty($tags))
            return [];

        shuffle($tags);

        $tags = array_slice($tags, 0, $count);

        $ids = array_column($tags, 'id');

        $counts = DB::table('page_tag')
            ->whereIn('tag_id', $ids)
            ->groupBy('tag_id')
            ->select('tag_id', DB::raw('count(page_id) as count'))
            ->get();

        foreach ($tags as $key => $i1) {

            foreach ($counts as $i2) {
                if ($i1['id'] == $i2->tag_id)
                    $tags[$key]['count'] = $i2->count;
            }

        }

        return $tags;
    }


    /**
     * Get the posts list popular tags list
     *
     * @param $posts
     * @param int $count
     * @return array
     */
    public static function getPopularForPage($posts, $count = 20)
    {
        $tags = [];
        foreach ($posts as $post) {
            $tagsObj = $post->tags;
            foreach ($tagsObj as $tag)
                $tags[] = ['tag' => $tag->name, 'id' => $tag->id, 'view' => $tag->view];
        }

        if (empty($tags))
            return [];

        $tags = collect($tags)->sortBy('view',SORT_REGULAR,true)->values()->all();

        $tags = array_slice($tags, 0, $count);

        $ids = array_column($tags, 'id');

        /**
         * Usage count
         */
        $counts = DB::table('page_tag')
            ->whereIn('tag_id', $ids)
            ->groupBy('tag_id')
            ->select('tag_id', DB::raw('count(page_id) as count'))
            ->get();

        foreach ($tags as $key => $i1) {

            foreach ($counts as $i2) {
                if ($i1['id'] == $i2->tag_id)
                    $tags[$key]['count'] = $i2->count;
            }

        }

        return $tags;
    }

    /**
     * Get most popular tags in all over site
     *
     * @param int $count
     * @return array
     */
    public static function getMostPopularAllOver(int $count = 24)
    {
        foreach (Tag::orderBy('view','DESC')->limit($count)->get() as $tag)
            $tags[] = ['tag' => $tag->name, 'id' => $tag->id,'view'=>$tag->view];

        if (empty($tags))
            return [];

        $ids = array_column($tags, 'id');

        $counts = DB::table('page_tag')
            ->whereIn('tag_id', $ids)
            ->groupBy('tag_id')
            ->select('tag_id', DB::raw('count(page_id) as count'))
            ->get();

        foreach ($tags as $key => $i1) {

            foreach ($counts as $i2) {
                if ($i1['id'] == $i2->tag_id)
                    $tags[$key]['count'] = $i2->count;
            }

        }

        return $tags;
    }
}
