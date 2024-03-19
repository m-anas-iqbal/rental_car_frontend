<?php

namespace App\Http\Controllers;

use App\Models\borrowed_request;
use App\Models\cancelation_request;
use App\Models\car_order;
use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bo_request = borrowed_request::all();
        return view('admin.pages.borrowed_request.borrowed_request', compact('bo_request'));
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
    public function send_request($id)
    {
        $dec_id = Crypt::decrypt($id);
        $get_borrow = borrowed_request::find($dec_id);
        if ( $get_borrow ) {
            $get_borrow->status = 1;
            $get_borrow->save();
            if ($get_borrow && $get_borrow->status == 1) {
                $domain = env('FRONT_URL');
                $url = $domain . 'booking?token=' . Crypt::encrypt($get_borrow->user_id);
                $data['url'] = $url;
                $get_user = User::find($get_borrow->user_id);
                $data['email'] = $get_user->email;
                $data['title'] = "NPCR";
                $data['subject'] = "Your Request has been Aproved by Admin";
                // $data['body'] = "Please Click Below Link To Confirm Booking";
                Mail::send('borrow-approve', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['subject']);
                    // $message->to($data['email']);
                });
            session()->flash('success', "Request Sent Successfully");
            return redirect()->back();
        }
session()->flash('danger', "Some thing went wrong!");
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
