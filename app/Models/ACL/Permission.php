<?php

namespace App\Models\ACL;

use App\Models\Module;

class Permission extends \Spatie\Permission\Models\Permission
{

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

}
