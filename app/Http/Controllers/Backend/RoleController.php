<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
}
