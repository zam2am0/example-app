<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    //
    public function uplodFile(Request $request)
    {
        $path = $request->file('logo')->store('public/logos');
        $data['image'] = $path;
        //return $path;   //بطريقة مباشرة
        return view('show-file',$data);
    }
}
