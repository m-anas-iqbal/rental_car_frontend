<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin.pages.offers.offers', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.offers.add_offers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'offer_name' => 'Required',
            'offer_discount' => 'Required|integer',
            'discount_code' => 'Required',
            'discription' => 'Required',
        ]);
        Offer::create($request->except('token'));
        session()->flash('success', 'Offer created successfully');
        return redirect('/admin/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dec = Crypt::decrypt($id);
        $offer = Offer::find($dec);
        return view('admin.pages.offers.edit_offers', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'offer_name' => 'Required',
            'offer_discount' => 'Required|integer',
            'discount_code' => 'Required',
            'discription' => 'Required',
        ]);
        $dec = Crypt::decrypt($id);
        $offer = Offer::find($dec);
        $offer->offer_name = $request->offer_name;
        $offer->offer_discount = $request->offer_discount;
        $offer->discount_code = $request->discount_code;
        $offer->discription = $request->discription;
        $offer->update();
        session()->flash('success', 'Offer Updated successfully');
        return redirect('/admin/offers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dec = Crypt::decrypt($id);
        offer::find($dec)->delete();
        session()->flash('success', 'Delete Successfully');
        return redirect('/admin/offers');
    }
    public function offers_status($id, $status)
    {

        $dec_id = Crypt::decrypt($id);
        $add_stat = Offer::find($dec_id);
        if ($status == 1) {
            $add_stat->status = 1;
            $add_stat->save();
            session()->flash('success', "Status Active Sucessfully");
            return redirect('admin/offers');
        } elseif ($status == 0) {
            $add_stat->status = 0;
            $add_stat->save();
            session()->flash('success', "Status Deactive Sucessfully");
            return redirect('admin/offers');
        } else {
            session()->flash('error', "Some Thing Went Wrong");
            return redirect('admin/offers');
        }



        //   return redirect('admin/category');




    }
}
