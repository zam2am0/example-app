<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CourseCreated;
use Illuminate\Support\Facades\Mail;
use App\Models\Course;




class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['records'] = Course::get();
        return view('courses.index',$data);
        //api
        /*
        $records = Course::get();
        if(!$records)
        {
            return response()->json([
                'success' => false,
                'description' => "Data not found",
                'data' =>null
            ]) ;
        }

        return response()->json([
            'success' => true,
            'description' => "Data retrived  successfully",
            'data' =>$records
        ]) ;
        */        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $record = new Course;
        $record->name = $request->name;
        $record->price = $request->price;   
        $record->save();

        Mail::to("b@a.com")->send(new CourseCreated($record)); //"a@a.com" -> الشخص بيرسل له الإيميل


        return response()->json([
            'success' => true,
            'description' => "record add successfully",
            'data' =>$record
        ]) ;

    }

    /**
     * Display the specified resource. ->show one record
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $record = Course::find($id);
        if(!$record)
        {
            return response()->json([
                'success' => false,
                'description' => "Data not found",
                'data' =>null
            ]) ;
        }

        return response()->json([
            'success' => true,
            'description' => "Data retrived  successfully",
            'data' =>$record
        ]) ;

        

    }
    /*
    public function show1($id){
        $sucssuss = true;
        $record =$this->getCourseById($id);
        if(!$record){
            $sucssuss = false;
        }
        return $this->getCourseById(
            $sucssuss,
            $record,
            "read"
        );
    }

    private function getCourseById($id)
    {
        return Course::find($id);

    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $record = Course::find($id);

        if(!$record)
        {
            return response()->json([
                'success' => false,
                'description' => "Data not found",
                'data' =>null
            ]) ;
        }

        $record->name = $request->name;
        $record->price = $request->price;   
        $record->save();

        return response()->json([
            'success' => true,
            'description' => "record updated successfully",
            'data' =>$record
        ]) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record =$this->getCourseById($id);
       

        //
        $record = Course::find($id);
        if(!$record)
        {
            return response()->json([
                'success' => false,
                'description' => "Data not found",
                'data' =>null
            ]) ;
        }
        $record ->  delete();

        return response()->json([
            'success' => true,
            'description' => "record deleted successfully",
            'data' =>$record
        ]) ;
    }
}
