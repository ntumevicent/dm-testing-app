<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function getPhotos(){
        $photos = Photo::all();

        return view('photos.index', [
            'photos'         =>  $photos
         ]);
    }

    public function createPage(){
        $users = User::all();

        return view('photos.create', [
           'users'         =>  $users
        ]);
    }

    public function storePhoto(Request $request){

        $request->validate( [
            'photo_title' => 'required',
            'photo' => 'required'
         ]);

        // return redirect()->back()->withErrors();  
         //return redirect()->back()->with('error','Something went wrong!');

         //return redirect()->back()->withErrors( [ 'account_number' => 'Invalid Meter Number' ] );
         //return redirect()->back()->with('success','Beneficiary Added Successfully');
         //return back()->with('message','Your Password Reseted Successfully. Please Check your email for new Password.');
         //return redirect()->back()->with('error','Something went wrong!');


       if ($request->hasFile('photo')) {
            $temp_name = $request->file('photo');
            $filename = uniqid().time().$temp_name->getClientOriginalName();
            $temp_name->move('assets/images/photos',$filename);
        }

        $upload = new Photo();
        $upload->photo_title = $request->photo_title;
        $upload->photo = $filename;
        $upload->save();

        return redirect()->back()->with('success','Uploaded photo Successfully');

        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'photo_title' => 'required',
    ]);

    $photo = Photo::find($id);

    if ($request->hasFile('photo')) {
        $temp_name = $request->file('photo');
        $filename = uniqid().time().$temp_name->getClientOriginalName();
        $temp_name->move('assets/images/photos',$filename);
        $photo->photo = $filename;
    }

    $photo->photo_title = $request->photo_title;
    $photo->save();

    return redirect()->back()->with('success', 'Photo updated successfully');
}



    public function editPage($id){
        $photo = Photo::findOrFail($id);
        return view('photos.edit', compact('photo',));
    }

    public function deletePhoto($id){
        $photo = Photo::findOrFail($id);
        $photo->delete();
       // return reponse()->json(['status', 'Photo deleted successfully']);

        return response()->json([
            'success' => 'Data deleted successfully!'
        ]);
    }

    public function storePhotoo(Request $request, $id = null) {
    $rules = [
        'photo_title' => 'required',
    ];

    if ($request->hasFile('photo')) {
        $rules['photo'] = 'image|max:2048';
    }

    $request->validate($rules, [
        'photo.image' => 'The uploaded file must be an image.',
        'photo.max' => 'The uploaded file may not be larger than 2MB.',
    ]);

    $photo = $id ? Photo::findOrFail($id) : new Photo;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/images/photos', $filename);
        $photo->photo = $filename;
    }

    $photo->photo_title = $request->photo_title;
    $photo->save();

    return redirect()->back()->with('success', 'Photo updated successfully.');
}

public function storePhotos(Request $request)
{
    $request->validate([
        'photo_title' => 'required',
        'photo' => 'required|image|max:2048',
    ], [
        'photo.required' => 'Please select a photo to upload.',
        'photo.image' => 'The uploaded file must be an image.',
        'photo.max' => 'The uploaded file may not be larger than 2MB.',
    ]);

    $file = $request->file('photo');
    $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
    $file->move('assets/images/photos', $filename);

    $photo = new Photo;
    $photo->photo_title = $request->photo_title;
    $photo->photo = $filename;
    $photo->save();

    return redirect()->back()->with('success', 'Photo uploaded successfully.');
}




}
