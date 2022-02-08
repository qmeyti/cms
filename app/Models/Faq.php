<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'answer',
        'language',
        'parent',
    ];

    public function parent()
    {
        return $this->belongsTo(Faq::class, 'parent', 'id');
    }

    public function haveTranslition()
    {
        return $this->hasMany(Faq::class, 'parent', 'id');
    }
    
}
