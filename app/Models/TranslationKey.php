<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationKey extends Model
{
    use HasFactory;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translation_key';

     /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'side'
    ];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }
}
