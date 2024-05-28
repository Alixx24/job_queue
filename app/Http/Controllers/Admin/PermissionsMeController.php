<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsMeController extends Controller
{
    public function index()
    {
        $authorRole = Role::create(['name' => 'author']);
        $authorPerms = Permission::create(['name' => 'edit posts', 'name' => 'view posts']);
        $managerRole = Role::create(['name' => 'manager']);
        $managerPerms = Permission::create(['name' => 'view users', 'name' => 'manager view posts']);
        //Assignee roles to perms
        $authorRole->givePermissionTo($authorPerms);
        $managerRole->givePermissionTo($managerPerms);
    }
}
