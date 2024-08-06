<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function openForm()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'name' => 'required | max:4',
                'password' => 'required'
            ]
            );

        //return $request->name;   //هنا يرجع كامل البيانات
        return $request->name;    //هنا بس يرجع لاسم
    }
}
