<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'label',
        'link',
        'type',
        'parent',
        'sort',
        'class',
        'menu',
        'depth'
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class,'parent','id');
    }

    /**
     * @return mixed
     */
    public static function generateRoot()
    {
        return self::updateOrCreate(['id' => 1], [
            'label' => 'سرشاخه',
            'link' => null,
            'type' => null,
            'parent' => null,
            'sort' => 0,
            'class' => null,
            'menu' => null,
            'depth' => 0
        ]);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
