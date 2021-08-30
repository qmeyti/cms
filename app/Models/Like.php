<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'ip',
        'user_id',
        'page_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Like post
     *
     *
     * @param $post
     * @return mixed
     */
    public static function like($post)
    {
        if (auth()->check()) {

            Like::where('page_id', $post->id)
                ->where('user_id', auth()->id())
                ->whereIn('type', ['like', 'dislike'])
                ->delete();

            return Like::create([
                'type' => 'like',
                'ip' => request()->ip(),
                'user_id' => auth()->id(),
                'page_id' => $post->id,
            ]);

        } else {

            Like::where('page_id', $post->id)
                ->where('user_id', null)
                ->where('ip', request()->ip())
                ->whereIn('type', ['like', 'dislike'])
                ->delete();

            return Like::create([
                'type' => 'like',
                'ip' => request()->ip(),
                'user_id' => null,
                'page_id' => $post->id,
            ]);
        }
    }

    /**
     * Dislike post
     *
     * @param $post
     * @return mixed
     */
    public static function dislike($post)
    {

        if (auth()->check()) {

            Like::where('page_id', $post->id)
                ->where('user_id', auth()->id())
                ->whereIn('type', ['like', 'dislike'])
                ->delete();

            return Like::create([
                'type' => 'dislike',
                'ip' => request()->ip(),
                'user_id' => auth()->id(),
                'page_id' => $post->id,
            ]);

        } else {

            Like::where('page_id', $post->id)
                ->where('user_id', null)
                ->where('ip', request()->ip())
                ->whereIn('type', ['like', 'dislike'])
                ->delete();

            return Like::create([
                'type' => 'dislike',
                'ip' => request()->ip(),
                'user_id' => null,
                'page_id' => $post->id,
            ]);
        }
    }

    /**
     * Like count
     *
     * @param $post
     * @return int
     */
    public static function likesCount($post): int
    {
        return Like::where('page_id', $post->id)
            ->where('type', 'like')
            ->count();
    }

    /**
     * Dislike count
     *
     * @param $post
     * @return int
     */
    public static function dislikesCount($post): int
    {
        return Like::where('page_id', $post->id)
            ->where('type', 'dislike')
            ->count();
    }
}
