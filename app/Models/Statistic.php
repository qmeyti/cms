<?php

namespace App\Models;

use App\Libraries\ClientSystemInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip', 'device', 'os', 'browser', 'target', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * Post views count
     * @todo modify
     * @param int $post
     * @return int
     */
    public static function postViewCount(int $post): int
    {
        return Statistic::where('type', 'post')->where('target', $post)->count();
    }

    /**
     * Return user total views
     *
     * @param User $user
     * @return int
     */
    public static function userTotalVisit(User $user)
    {
        return $user->statistics()->groupBy('created_at')->count();
    }

    public static function viewRoute()
    {
        return self::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'ip' => ClientSystemInformation::get_ip(),
            'device' => ClientSystemInformation::get_device(),
            'os' => ClientSystemInformation::get_os(),
            'browser' => ClientSystemInformation::get_browser(),
            'target' => __route() ?? 'unknown',
            'type' => 'route',
        ]);
    }

    public static function viewPost($Post)
    {
        return self::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'ip' => ClientSystemInformation::get_ip(),
            'device' => ClientSystemInformation::get_device(),
            'os' => ClientSystemInformation::get_os(),
            'browser' => ClientSystemInformation::get_browser(),
            'target' => $Post,
            'type' => 'post',
        ]);
    }

    public static function viewPage($Page)
    {
        return self::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'ip' => ClientSystemInformation::get_ip(),
            'device' => ClientSystemInformation::get_device(),
            'os' => ClientSystemInformation::get_os(),
            'browser' => ClientSystemInformation::get_browser(),
            'target' => $Page,
            'type' => 'page',
        ]);
    }
}
