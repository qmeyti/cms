<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations';


      /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key_id',
        'translation',
        'language'
    ];
}




