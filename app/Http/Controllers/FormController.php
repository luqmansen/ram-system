<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;
class FormController extends Controller
{
    
public function form()
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'telephone' => 'required',
        //     'email' => 'required'
        //     // 'cover_image' => 'image | nullable | max:1999',
        //     //'pdf_file' => ''
        //     // perlu ditambah row di table untuk id file yang di upload agar bisa di
        //     // lihat / di download di admin panel
        // ]);

        // //handle file upload
        // if($request->hasFile('cover_image')){
        //     // Get File Name with extension

        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     //kalo gini doang, nanti semisal 2 orang yg upload dengan nama 
        //     // file yang sama, nanti bakal jadi masalah, jadi buat fungsi 
        //     // untuk misahin 
            
        //     //get just file name
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //     //get just extension
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
            
        //     //filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //     //upload the image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // } else{
        //     $fileNameToStore = 'noimage.jpg';
        // }
        //Create Post

        // $customers = new user;
        // $customers->name = $request->input('name');
        // $customers->telephone = $request->input('telephone');
        // $customers->email = $request->input('email');
        // $customers->save();

        return view('reservation.customer-input');
    }

}