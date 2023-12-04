<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Amenities;


class AmenitieController extends Controller
{
    //Amenities Function CRUD
    public function AllAmenities(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities',compact('amenities'));
    }
    public function AddAmenities(){
        
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenities(Request $request){
        $request->validate([
            'amenities_name'=>'required|max:15',
        ]);
        
        Amenities::insert([
            'amenities_name'=>$request->amenities_name,
        ]);
        $notification=array(
            'message'=>'Amenitie Create Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.amenities')->with($notification);
    }

    public function EditAmenities($id){
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities',compact('amenities'));


    }

    public function UpdateAmenities(Request $request){
        
        $pid = $request->id;
        Amenities::findOrFail($pid)->update([
            'amenities_name'=>$request->amenities_name
        ]);
        $notification=array(
            'message'=>'Amenitie Update Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenities($id){
        Amenities::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Amenitie Delete Successfully',
            'alert-type'=> 'success'

       );
       return redirect()->back()->with($notification);


    }
}
