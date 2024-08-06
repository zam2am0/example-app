<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Course;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $course = Course::find($request->course_id);
        if(!$course)
        {
            return "Course not found";
        }
        $order = new Order();
        $order->course_id = $request->course_id;
        $order->price = $course->price; //price dont take from request why? لانه يمكن الشخص يتلاعب بيه لأنه من فرونت اند
        $order->user_id = 1; //Auth::user()->id
        $order->save();

        
        //return "Order Place Successfully";
        return $this->payThawani($order,$course);
    }

    public function thawaniCallBack($status)
    {
        return "Payment" . $status;
    }

    public function payThawani($order,$course)
    {
        $products =[];
        $products[0] =[ //must do this key
            "name"=> $course->name,
            "quantity"=> 1,
            "unit_amount"=> intval($course->price)* 1000  //هذه بالبيسه 

        ];
        $metadata=[ //we can do any key and any value
            "customer_name" => "Zamzam",
            "email" => "zamzam@zamzam.com",
        ];
        $data= [
            "client_reference_id"=> $order ->id, //order id
            "mode"=>"payment",
            "products" => $products,
            "success_url" => "http://localhost:8000/payment/success",
            "cancel_url" => "http://localhost:8000/payment/failed",
            "metadata" => $metadata,
        ];
        
        $response = Http::withHeaders([
            'thawani-api-key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et', //secret key
            'X-Second' => 'bar'
        ])->post('https://uatcheckout.thawani.om/api/v1/checkout/session', $data);


        if($response->successful())
        {
            $tempResponse = json_decode($response);
            $session_id = $tempResponse->data->session_id;
            $publishable_key ="HGvTMLDssJghr9tlN9gr4DVYt0qyBy";

            return redirect("https://uatcheckout.thawani.om/pay/$session_id?key=$publishable_key");

        }

        return "Payment Failed";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
