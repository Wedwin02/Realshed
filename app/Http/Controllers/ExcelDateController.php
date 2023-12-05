<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;


class ExcelDateController extends Controller
{
    //
    public function ImportPermission(){
        return view('backend.pages.doc_excel.import_permission');        
    }

    public function Import(Request $request) 
    {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification=array(
            'message'=>'Permission Imported Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->back()->with($notification);
    } 

    public function ExportPermission() 
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }  

     
    
}
