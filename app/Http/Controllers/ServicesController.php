<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index($name,$price,$status)
    {
        $data['name'] = $name;
        $data['price'] = $price;
        $data['status'] = $status;
        return view('myservies',$data);
    }

    public function getServiceName($name)
    {
        return "Service name: $name";
    }
}
