<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
	public function index() 
	{
		$roles = Role::all();
		return view('backend.roles.index', compact('roles'));
	}


	// swow form
	public function create() 
	{
		return view('backend.roles.create');
	} 


	// save form POST
	public function store(RoleFormRequest $request) 
	{
		// Validate Form with custom RoleFormRequest /Request/
		// script stops here if rules in RoleFormRequest Class fail

		// save in DB the role name
		Role::create( 
			['name' => $request->get('name')] 
		);

		return	redirect('/admin/roles/create')->with('status',	'A	new	role has been created!');
	}

}
