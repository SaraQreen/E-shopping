<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller {

    public function create(){

        
    $admin = Role::create([
      'name' => 'admin',
      'display_name' => 'User Administrator', // optional
      'description' => 'User is allowed to manage and edit other users', // optional
 ]); 

    $superadmin = Role::create([
      'name' => 'superadmin',
      'display_name' => 'Project Owner', // optional
      'description' => 'User is the owner of a given project', // optional
]);


    }

}