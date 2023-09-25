<?php
namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionsController extends Controller {

    public function create(){

        $createPost = Permission::create([
            'name' => 'create-post',
            'display_name' => 'Create Posts', // optional
            'description' => 'create new blog posts', // optional
        ]);

        
        $editUser = Permission::create([
           'name' => 'edit-user',
           'display_name' => 'Edit Users', // optional
           'description' => 'edit existing users', // optional
       ]);
    


    }

}