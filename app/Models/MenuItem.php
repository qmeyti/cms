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
}
