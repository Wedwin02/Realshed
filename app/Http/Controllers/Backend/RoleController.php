<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    //
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }
    public function AddPermission(){
        
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request){
     
        
        $permission = Permission::create([
            'name'=>$request->name,
            'group_name'=>$request->group_name,
        ]);
        $notification=array(
            'message'=>'Permission Create Successfully',
            'alert-type'=> 'success'

       );

       return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(Request $request){
        
        $pid = $request->id;
        Permission::findOrFail($pid)->update([
            'name'=>$request->name,
            'group_name'=>$request->group_name
        ]);
        $notification=array(
            'message'=>'Permission Update Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Permission Delete Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->back()->with($notification);


    }
    ///Role method
    public function AllRole(){
        $roles = Role::all();
        return view('backend.pages.role.all_role',compact('roles'));
    }
    public function AddRole(){
        
        return view('backend.pages.role.add_role');
    }

    public function StoreRole(Request $request){
     
        
        $roles = Role::create([
            'name'=>$request->name,
        ]);
        $notification=array(
            'message'=>'Role Create Successfully',
            'alert-type'=> 'success'

       );

       return redirect()->route('all.role')->with($notification);
    }

    public function EditRole($id){
        $roles = Role::findOrFail($id);
        return view('backend.pages.role.edit_role',compact('roles'));
    }
    public function UpdateRole(Request $request){
        
        $pid = $request->id;
        Role::findOrFail($pid)->update([
            'name'=>$request->name,
        ]);
        $notification=array(
            'message'=>'Role Update Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.role')->with($notification);
    }

    public function DeleteRole($id){
        Role::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Role Delete Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->back()->with($notification);


    }

    /// Role in Permission 
    public function AllRolePermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_role_permission',compact('roles'));
    }

    public function AddRolePermission(){
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('backend.pages.rolesetup.add_role_permission',compact('roles','permission','permission_groups'));
    }

    public function StoreRolePermission(Request $request){
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }
        $notification=array(
            'message'=>'Add Role has Permission Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.role.permission')->with($notification);

    }

    public function EditRolePermission($id){
        
        $roles = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroup();

        return view('backend.pages.rolesetup.edit_role_permission',compact('roles','permission','permission_groups'));
        
    }

    public function UpdateRolePermission(Request $request, $id){

        $roles = Role::findOrFail($id);
        $permissions = $request->permission;
        
        if(!empty($permissions)){
            $roles->syncPermissions($permissions);
            
        }
        
        $notification=array(
            'message'=>'Update Role has Permission Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.role.permission')->with($notification);
        
    }

    public function DeleteRolePermission($id){
        $roles = Role::findOrFail($id);
        if(!is_null($roles)){
            $roles->delete();

        }
        $notification=array(
            'message'=>'Delete Role has Permission Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->back()->with($notification);

    }
    



}
