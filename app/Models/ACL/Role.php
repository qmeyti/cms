<?php

namespace App\Models\ACL;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = ['name', 'label','guard_name'];
}
