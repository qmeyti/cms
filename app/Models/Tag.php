<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    protected $fillable = ['name'];

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
        $exists = Tag::whereIn('name', $tags)->pluck('tag')->toArray();

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
}
