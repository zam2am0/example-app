<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data['records'] =Product::all(); // يعني جيب لي كل البروكيت بموجودة في الداتابيس
        return view('products/index',$data);
    }

    public function create()
    {
        return view('products/create');
    }
    public function edit($id)
    {
        $data['record'] = Product::findOrFail($id);
        //$data['record'] = Product::where('id',$id)->first(); //نفس لاين السابق
        return view('products/edit',$data);
    }

    public function getProducts()
    {
        return "this is getProducts function";
    }

    public function store(Request $request)
    {
        //creat product
        $record = new Product; //creat object from class (Product) --> خاص بمودل
        $record->name = $request->name;
        $record->price = $request->price;
        $record->is_active = true;
        $record->save();    //نحفظ

        return "Record added successfully";
    }

    public function update(Request $request,$id)
    {
        //creat product
        $record = Product::find($id); //creat object from class (Product) --> خاص بمودل
        $record->name = $request->name;
        $record->price = $request->price;
        $record->is_active = $request->is_active;
        $record->save();    //نحفظ

        return "Record update successfully";
    }

    public function delete($id)
    {
        $record = Product::find($id);
        if ($record) 
        {
            $record->delete();
            $record->delete;
            return "Record delete successfully";
        } 
        else 
        {
            return "Record not found";
        }
    }

    
}
