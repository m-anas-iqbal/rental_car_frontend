<?php

namespace App\Http\Controllers;

use App\Models\cancelation_request;
use App\Models\car_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Models\Cars;
use App\Models\User;

class CancelationController extends Controller
{
    public function index()
    {
        $cancelation_request = cancelation_request::all();
        return view('admin.pages.cancelation.cancelation_request', compact('cancelation_request'));
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
    public function cancelation($id)
    {
        // print_r($id."  ");
        $dec_id = Crypt::decrypt($id);
        // print_r($dec_id);
        $car_order = car_order::where( ['order_id'=>$dec_id])->first();
        // $cancel = cancelation_request::where( ['order_id'=>$dec_id])->first();
        // print_r($car_order);
        if ($car_order) {
        $car_order->status = "Canceled";
        $car_order->save();
        cancelation_request::where("order_id",  $dec_id)->update(["approve" => 1]);
        // $cancel->approve = 1;
        // $cancel->save();
            $get_user = User::find($car_order->user_id);
            $data['email'] = $get_user->email;
            $data['title'] = "NPCR";
            $data['subject'] = "Your Request has been Aproved by Admin";
            Mail::send('cancelation', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['subject']);
            });
            session()->flash('success', "Request Sent Successfully");
            return redirect()->back();
        }
        // session()->flash('danger', "Some thing went wrong!");
        // return redirect()->back();
    }

    public function send_request($id)
    {
        $dec_id = Crypt::decrypt($id);
        $get_borrow = borrowed_request::find($dec_id);
        $get_borrow->status = 1;
        $get_borrow->save();
        if ($get_borrow && $get_borrow->status == 1) {
            $domain = env('FRONT_URL');
            $url = $domain . 'booking/?token=' . Crypt::encrypt($get_borrow->user_id);
            $data['url'] = $url;
            $get_user = User::find($get_borrow->user_id);
            $data['email'] = $get_user->email;
            $data['title'] = "Confirmation Email";
            $data['subject'] = "Confirmation Email For Your Booking";
            $data['body'] = "Please Click Below Link To Confirm Booking";
            Mail::send('forget-email', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['subject']);
                // $message->to($data['email']);
            });
            session()->flash('success', "Request Sent Successfully");
            return redirect()->back();
        }
    }
    public function send_request_data(Request $request)
    {

        $dec_id = Crypt::decrypt($request->req_id);
        $get_borrow = borrowed_request::find($dec_id);
        if ($get_borrow && $get_borrow->status == 1) {

            $car = Cars::find($request->car_id);
            return response()->json(
                [
                    'success' => true,
                    'msg' => 'Successfully Found',
                    'cars' => $car
                ]
            );
            session()->flash('success', "Request Sent Successfully");
            return redirect()->back();
        }
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
