<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Language;
use App\Menu;
use App\Post;
use App\Setting;
use App\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    	//$this->middleware('is_admin')->only('index');
    }
	
	public function index(Request $request)
    {
        $local = App::getLocale();
        $lang = Language::where('lang', $local)->first();


        if (Auth::check()){
        	if (Auth::user()->is_admin == 1){
		        return view('admin.index', [
		            'users' => $users = User::all(),
			        'is_active' => 'index'
		        ]);
	        }else{
        		return redirect()->back();
	        }
        }else{
	        return redirect()->route('admin.login');
        }
    }

    public function loginPage()
    {
	    if (Auth::check()){
		    return redirect()->route('admin.index');
	    }else{
		    return view('admin.login');
	    }
    }



    /*BREAD users begin*/

    public function users()
    {
        $users = User::all();
        return view('admin.contents.users.users', [
            'users' => $users
        ]);
    }

    public function userAddForm()
    {
        return view('admin.contents.users.add');
    }
    protected function userCreate(Request $request)
    {
        $validate =  Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validate);
        }else{
            $user =  User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $notification = array([
               'alert-type' => 'success',
               'message' => 'User has been created successfully'
            ]);
            return redirect()->route('users.index')->with($notification);
        }

    }

    public function userEdit(User $user)
    {
        $permissions = Permission::all();

        $roles = Role::all();
        return view('admin.contents.users.edit', [
            'user' => $user,
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    public function userPermissionAttach(Permission $permission, User $user)
    {
        $user->givePermissionTo($permission);
        $notification = array(
            'message' => 'To the user permission has been attached successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function userPermissionDetach(Permission $permission, User $user)
    {
        $user->revokePermissionTo($permission);

        $notification = array(
            'message' => 'The permission from the user has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function userRoleAttach(Role $role, User $user)
    {
        $user->assignRole($role);
        $notification = array(
            'message' => 'To the user role has been attached successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function userRoleDetach(Role $role, User $user)
    {
        $user->removeRole($role);

        $notification = array(
            'message' => 'The role from the user has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /*BREAD users end*/

    /*BREAD permission begin*/
    public function permissions()
    {
        $permissions = Permission::all();
        return view('admin.contents.permissions.permissions', [
            'permissions' => $permissions
        ]);
    }

    public function permissionEdit(Permission $permission)
    {
        $roles = Role::all();

        return view('admin.contents.permissions.edit', [
            'permission' => $permission,
            'roles' => $roles,
        ]);
    }

    public function rolePermissionAttach(Permission $permission, Role $role)
    {
        $role->givePermissionTo($permission);

        $notification = array(
            'message' => 'To the permission role has been attached successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function rolePermissionDetach(Permission $permission, Role $role)
    {

        $role->revokePermissionTo($permission);

        $notification = array(
            'message' => 'The permission from the role has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function createRole(Request $request)
    {
        $request->validate([
            'role' => 'required'
        ]);
        Role::create([
            'name' => strtolower($request->role)
        ]);
        $notification = array(
            'message' => 'New role has been created successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function permissionDestroy(Permission $permission)
    {
        $permission->delete();

        $notification = array(
            'message' => 'Permission has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /*BREAD permission end*/


    /*BREAD roles begin*/
    public function roles()
    {
        $roles = Role::all();
        return view('admin.contents.roles.roles', [
            'roles' => $roles
        ]);
    }

    public function roleEdit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.contents.roles.edit', [
            'permissions' => $permissions,
            'role' => $role,
        ]);
    }

    public function permissionRoleAttach(Role $role, Permission $permission)
    {
        $role->givePermissionTo($permission);

        $notification = array(
            'message' => 'To the role permission has been attached successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function permissionRoleDetach(Role $role, Permission $permission)
    {

        $role->revokePermissionTo($permission);

        $notification = array(
            'message' => 'The permission from the role has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function createPermission(Request $request)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        Permission::create([
            'name' => strtolower($request->permission)
        ]);
        $notification = array(
            'message' => 'New permission has been created successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function roleDestroy(Role $role)
    {
        $role->delete();

        $notification = array(
            'message' => 'Role has been removed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /*BREAD roles end*/

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.account', [
        	'is_active' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Admin $admin)
    {
	    $validator = \Validator::make($request->all(), [
		    'firstname' => 'string|max:255',
		    'lastname' => 'string|max:255',
		    'email' => 'string|max:255',
		    'password' => 'same:password',
		    'password_confirmation' => 'same:password',
		    'avatar' => 'image|mimes:jpeg,jpg,png|max:10240',
	    ]);
	
	    if ($validator->fails()) {
		    $notification = array(
			    'message' => 'You have any error to user update failed',
			    'alert-type' => 'error'
		    );
		    return redirect()->back()
			    ->withErrors($validator)
			    ->with($notification)
			    ->withInput();
	    }else{
	    	if ($request->file('avatar')){
			    $avatar = $request->file('avatar')->store('users' .'/'. date('FY'), 'public');
		    }
		    
	    	$id = Auth::user()->id;
		    $user = User::find($id);
		    $user->firstname = $request->firstname;
		    $user->lastname = $request->lastname;
		    $user->email = $request->email;

		    if ($request->current_password){
			    if (Hash::check(Input::get('current_password'), $user['password'])){
				    $user->password = bcrypt($request->password);
			    }
		    }

		    if ($request->file('avatar')) {
			    $user->avatar = $avatar;
		    }

		    $user->save();
		    
		    $notification = array(
			    'message' => 'User has been updated successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->back()->with($notification);
	    }
    }


    public function homepage(Request $request)
    {
        $q = $request->search_text;

        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $galleries = DB::table('categories')
            ->join('category_lang', 'categories.id','category_lang.category_id')
            ->select('categories.status', 'categories.order', 'categories.id', 'category_lang.name', 'category_lang.lang_id')
            ->where('category_lang.lang_id', $language->id)
            ->orderBy('order', 'ASC')
            ->get();

        $id1 = Setting::where('key', 'post1')->first();
        $id2 = Setting::where('key', 'post2')->first();
        $id3 = Setting::where('key', 'post3')->first();

        $c_id1 = DB::table('settings_lang')->where('setting_id', $id1->id)->select('val')->first();
        $c_id2 = DB::table('settings_lang')->where('setting_id', $id2->id)->select('val')->first();
        $c_id3 = DB::table('settings_lang')->where('setting_id', $id3->id)->select('val')->first();

        return view('admin.homepage', [
            'galleries' => $galleries,
            'q' => $q,
            'c_id1' => $c_id1,
            'c_id2' => $c_id2,
            'c_id3' => $c_id3
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function settingsPost1(Request $request)
    {
        $val = $request->val;

        $locale = App::getLocale();
        $lang = Language::where('lang', '=', $locale)->first();

        $setting = Setting::where('key', 'post1')->first();
        $post1 = DB::table('settings_lang')->where('setting_id', $setting->id)->first();

        DB::table('settings_lang')->where('id', $post1->id)
            ->update([
            'val' => $val,
            'updated_at' => now()
        ]);

        return 'ok';
    }
    public function settingsPost2(Request $request)
    {
        $val = $request->val;

        $locale = App::getLocale();
        $lang = Language::where('lang', '=', $locale)->first();

        $setting = Setting::where('key', 'post2')->first();
        $post2 = DB::table('settings_lang')->where('setting_id', $setting->id)->first();

        DB::table('settings_lang')->where('id', $post2->id)
            ->update([
                'val' => $val,
                'updated_at' => now()
            ]);

        return 'ok';
    }
    public function settingsPost3(Request $request)
    {
        $val = $request->val;

        $locale = App::getLocale();
        $lang = Language::where('lang', '=', $locale)->first();

        $setting = Setting::where('key', 'post3')->first();
        $post3 = DB::table('settings_lang')->where('setting_id', $setting->id)->first();

        DB::table('settings_lang')->where('id', $post3->id)
            ->update([
                'val' => $val,
                'updated_at' => now()
            ]);

        return 'ok';
    }

    public function helper()
    {
        return view('admin.helper');
    }
}
