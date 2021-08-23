<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

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
        'key',
        'value',
        'user_id',
        'type',
        'part',
    ];

    /**
     * Add or update new setting
     *
     * @param string $key
     * @param $value
     * @param string $type
     * @param string|null $part
     * @return Setting
     */
    public static function addOrUpdate(string $key, $value, string $type = 'text', string $part = null)
    {
        return self::updateOrCreate(['key' => $key], [
            'key' => $key,
            'value' => $value,
            'user_id' => auth()->id(),
            'type' => in_array($type, ['int', 'float', 'json', 'bool', 'string', 'text', 'array']) ? $type : 'text',
            'part' => in_array($part, ['admin', 'home']) ? $part : null,
        ]);
    }

    /**
     * @param $key
     */
    public static function removeItem($key)
    {
        self::where('key', $key)->delete();
    }
}
