<?php

namespace App\Models;


use App\Models\ACL\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';

    protected $fillable = [
     'name',
     'label',
     'status',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // public function givePermissionTo(Permission $permission)
    // {
    //     return $this->permissions()->save($permission);
    // }
}
