<?php

namespace App\Http\Controllers;

use App\Models\Car_addon;
use App\Models\Car_brand;
use App\Models\car_order;
use App\Models\Cars;
use App\Models\order_payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{

    public function __construct()
    {
        // auth()->logout();
        // return redirect()->route('login');
    }
    public function dashboard()
    {

        return view('admin.pages.dashboard');
    }
    public function logout()
    {
        auth()->logout();
        session()->flash('success', 'You have been logged out!');
        return redirect()->route('login');
    }
    public function login()
    {


        if (auth()->check()) {
            // dd("Sdsds");
            return redirect()->route('admin.dashboard');
        }
        // dd("DD");
        return view('admin.auth.login');
    }
    public function login_post(Request $req)
    {
        // print_r($req->all());
        // die;
        // $req->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:3',
        // ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->flash('success', 'You are logged in!');
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Invalid username or password');
            return redirect()->route('login');
        }
    }
    public function car_addons()
    {
        $car_addon = Car_addon::all();
        return view('admin.pages.car_addons.car_addons', compact('car_addon'));
    }
    public function car_addons_edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $edit_addon = Car_addon::find($dec_id);
        return view('admin.pages.car_addons.editcaraddon', compact('edit_addon'));
    }
    public function car_addons_view($id)
    {
        $dec_id = Crypt::decrypt($id);
        $view_addon = Car_addon::find($dec_id);
        return view('admin.pages.car_addons.viewcaraddon', compact('view_addon'));
    }

    public function car_addons_edit_post(Request $req)
    {

        $req->validate([
            'addon_name' => 'required',
            'rent_price' => 'required',
            'stock' => 'required'
        ]);
        $dec_id = Crypt::decrypt($req->ad_id);
        $edit_addon = Car_addon::find($dec_id);
        $edit_addon->addon_name = $req->addon_name;
        $edit_addon->stock = $req->stock;
        $edit_addon->rent_price = $req->rent_price;
        $edit_addon->buying_price = $req->buying_price;
        $edit_addon->description = $req->description;
        $edit_addon->update();
        session()->flash('success', 'Car Addon Updated Successfully');
        return redirect('admin/car_addons');
        return view('admin.pages.car_addons.editcaraddon', compact('edit_addon'));
    }
    public function car_addons_add()
    {

        $emp = [];
        $designation = [];
        return view('admin.pages.car_addons.addcaraddon', compact('emp', 'designation'));
    }
    public function car_addons_add_post(Request $req)
    {
        $req->validate([
            'addon_name' => 'required|unique:car_addons',
            'rent_price' => 'required',
            'stock' => 'required'
        ]);

        $addon = new Car_addon();
        $addon->addon_name = $req->addon_name;
        $addon->stock = $req->stock;
        $addon->rent_price = $req->rent_price;
        $addon->buying_price = $req->buying_price;
        $addon->description = $req->description;
        $addon->status = 0;
        $addon->save();
        session()->flash('success', 'Car Addon Added Successfully');
        return redirect('admin/car_addons');
        return view('admin.pages.car_addons.addcaraddon', compact('emp', 'designation'));
    }

    public function status($id, $status)
    {

        $dec_id = Crypt::decrypt($id);
        $add_stat = Car_addon::find($dec_id);
        if ($status == 1) {
            $add_stat->status = 1;
            $add_stat->save();
            session()->flash('success', "Status Active Sucessfully");
            return redirect('admin/car_addons');
        } elseif ($status == 0) {
            $add_stat->status = 0;
            $add_stat->save();
            session()->flash('success', "Status Deactive Sucessfully");
            return redirect('admin/car_addons');
        } else {
            session()->flash('error', "Some Thing Went Wrong");
            return redirect('admin/car_addons');
        }



        //   return redirect('admin/category');

    }

    // Brands Route
    public function car_brands()
    {
        $car_brand = Car_brand::all();
        return view('admin.pages.car_brands.brands', compact('car_brand'));
    }
    public function car_brands_edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $edit_brand = Car_brand::find($dec_id);
        return view('admin.pages.car_brands.editbrands', compact('edit_brand'));
    }
    public function car_brands_edit_post(Request $req)
    {

        $req->validate([
            'Brand_name' => 'required|unique:car_brands',

        ]);
        $dec_id = Crypt::decrypt($req->b_id);
        $edit_brand =  Car_brand::find($dec_id);
        $edit_brand->brand_name = $req->Brand_name;
        $edit_brand->update();
        session()->flash('success', 'Car Brand Updated Successfully');
        return redirect('admin/car_brands');
        return view('admin.pages.car_brands.editcaraddon', compact('edit_brand'));
    }
    public function car_brands_add()
    {

        $emp = [];
        $designation = [];
        return view('admin.pages.car_brands.addbrands', compact('emp', 'designation'));
    }
    public function car_brands_add_post(Request $req)
    {

        $req->validate([
            'Brand_name' => 'required|unique:car_brands',

        ]);

        $addon = new Car_brand();
        $addon->brand_name = $req->Brand_name;
        $addon->status = 1;
        $addon->save();
        session()->flash('success', 'Car Brand Added Successfully');
        return redirect('admin/car_brands');
    }

    public function brands_status($id, $status)
    {

        $dec_id = Crypt::decrypt($id);
        $add_stat = Car_brand::find($dec_id);
        if ($status == 1) {
            $add_stat->status = 1;
            $add_stat->save();
            session()->flash('success', "Status Active Sucessfully");
            return redirect('admin/car_brands');
        } elseif ($status == 0) {
            $add_stat->status = 0;
            $add_stat->save();
            session()->flash('success', "Status Deactive Sucessfully");
            return redirect('admin/car_brands');
        } else {
            session()->flash('error', "Some Thing Went Wrong");
            return redirect('admin/car_brands');
        }



        //   return redirect('admin/category');




    }
    // cars Routes
    public function cars_add()
    {
        $get_brands = Car_brand::where('status', 1)->get();
        return view('admin.pages.cars.add_car', compact('get_brands'));
    }
    public function cars_add_post(Request $req)
    {
        // dd($req);
        $req->validate([
            'car_name' => 'required|unique:cars',
            'rent_price' => 'required',
            'car_image' => 'required',
            'registration_number' => 'required',
        ]);

        $addon = new Cars();
        $files = [];
        if ($req->hasfile('car_image')) {
            foreach ($req->file('car_image') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path('uploads'), $name);
                $files[] = $name;
            }
        }
        // dd($files);
        $addon->car_name = $req->car_name;
        $addon->car_rent_price = $req->rent_price;
        $addon->discount = $req->discount;
        $addon->after_discount = ($req->discount / 100) * $req->rent_price;
        $addon->car_rent_type = "day";
        $addon->car_vin = $req->vin_number;
        $addon->car_registration_no = $req->registration_number;
        $addon->car_images = json_encode($files);
        $addon->car_brand = $req->car_brand;
        $addon->car_make = $req->car_make;
        $addon->car_model = $req->car_model;
        $addon->model_year = $req->model_year;
        $addon->product_type = $req->product_type;
        $addon->body = $req->car_body;
        $addon->series = $req->car_series;
        $addon->drive = $req->car_drive;
        $addon->fuel_type_primary = $req->fuel_type_primary;
        $addon->manufacturer = $req->manufacturer;
        $addon->no_of_doors = $req->no_of_doors;
        $addon->no_of_seats = $req->no_of_seats;
        $addon->max_trunk_capacity = $req->max_trunk_capacity;
        $addon->abs = $req->abs;
        $addon->is_borrowed = $req->is_borrowed;
        $addon->vehicle_type = $req->vehicle_type;
        $addon->car_description = $req->description;
        $addon->status = 1;
        $addon->save();
        session()->flash('success', 'Car Added Successfully');
        return redirect('admin/cars');
    }
    public function cars_edit($id)
    {

        $get_brands = Car_brand::where('status', 1)->get();
        $dec_id = Crypt::decrypt($id);
        $get_car = Cars::find($dec_id);

        return view('admin.pages.cars.edit_car', compact('get_car', 'get_brands'));
    }
    public function cars_view($id)
    {

        $get_brands = Car_brand::where('status', 1)->get();
        $dec_id = Crypt::decrypt($id);
        $get_car = Cars::find($dec_id);

        return view('admin.pages.cars.view_car', compact('get_car', 'get_brands'));
    }
    public function cars_edit_post(Request $req)
    {
        // dd($req);
        $req->validate([
            'car_name' => 'required',
            'rent_price' => 'required',
            'registration_number' => 'required',
        ]);

        // print_r($req->hasfile('car_image'));
        // die;
        $files = [];
        if ($req->hasfile('car_image')) {
            foreach ($req->file('car_image') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path('uploads'), $name);
                $files[] = $name;
            }
        }
        // dd($files);
        // dd($req->car_name);
        $up_car = Cars::find($req->car_id);
        $up_car->car_name = $req->car_name;
        $up_car->discount = $req->discount;
        $up_car->after_discount = ($req->discount / 100) * $req->rent_price;
        $up_car->car_rent_price = $req->rent_price;
        $up_car->car_rent_type = "day";
        $up_car->car_vin = $req->vin_number;
        $up_car->car_registration_no = $req->registration_number;
        if (count($files)>0) {
             $up_car->car_images = json_encode($files);
        }

        $up_car->car_brand = $req->car_brand;
        $up_car->car_make = $req->car_make;
        $up_car->car_model = $req->car_model;
        $up_car->model_year = $req->model_year;
        $up_car->product_type = $req->product_type;
        $up_car->body = $req->car_body;
        $up_car->series = $req->car_series;
        $up_car->drive = $req->car_drive;
        $up_car->fuel_type_primary = $req->fuel_type_primary;
        $up_car->manufacturer = $req->manufacturer;
        $up_car->no_of_doors = $req->no_of_doors;
        $up_car->no_of_seats = $req->no_of_seats;
        $up_car->max_trunk_capacity = $req->max_trunk_capacity;
        $up_car->abs = $req->abs;
        $up_car->car_description = $req->description;
        $up_car->is_borrowed = $req->is_borrowed;
        $up_car->vehicle_type = $req->vehicle_type;
        $up_car->status = 1;
        $up_car->update();
        session()->flash('success', 'Car Updated  Successfully');
        return redirect('admin/cars');
    }
    public function cars($id = null)
    {
        if ($id != null) {
            $dec_id = Crypt::decrypt($id);
        }

        if ($id != null) {
            $get_cars = Cars::where('id', $dec_id)->get();
        } else {

            $get_cars = Cars::all();
        }

        return view('admin.pages.cars.cars', compact('get_cars'));
    }
    public function local_users()
    {
        $get_users = User::where('type', 'local')->get();

        return view('admin.pages.users.local_user', compact('get_users'));
    }
    public function international_users()
    {
        $get_users = User::where('type', 'international')->get();

        return view('admin.pages.users.international_user', compact('get_users'));
    }
    public function orders()
    {
        $orders = [];

        return view('admin.pages.order.orders', compact('orders'));
    }
    public function cars_status($id, $status)
    {

        $dec_id = Crypt::decrypt($id);
        $add_stat = Cars::find($dec_id);
        if ($status == 1) {
            $add_stat->status = 1;
            $add_stat->save();
            session()->flash('success', "Status Active Sucessfully");
            return redirect('admin/cars');
        } elseif ($status == 0) {
            $add_stat->status = 0;
            $add_stat->save();
            session()->flash('success', "Status Deactive Sucessfully");
            return redirect('admin/cars');
        } else {
            session()->flash('error', "Some Thing Went Wrong");
            return redirect('admin/cars');
        }



        //   return redirect('admin/category');




    }
    public function vin_fetch()
    {
        // dd(request()->vin_no);
        $apiPrefix = "https://api.vindecoder.eu/3.2";
        $apiKey = "ab189969d61d";   // Your API key
        $secretKey = "dce8a75379";  // Your secret key
        $id = "decode";
        $vin = mb_strtoupper(request()->vin_no);
        $controlSum = substr(sha1("$vin|$id|$apiKey|$secretKey"), 0, 10);

        $data = file_get_contents("$apiPrefix/$apiKey/$controlSum/decode/$vin.json", false);
        $result = json_decode($data);
        return response([
            'result' => $result,
        ]);
    }
    public function order_list()
    {
        $get_orders = car_order::all();
        return view('admin.pages.order.orders', compact('get_orders'));
    }
    public function order_view($id)
    {

        $dec_id = Crypt::decrypt($id);

        $get_order = car_order::where('id', $dec_id)->first();
        // dd($get_order);
        return view('admin.pages.order.view_order', compact('get_order'));
    }
    public function payment_list($id = null)
    {
        if ($id != null) {
            $dec_id = Crypt::decrypt($id);
        }

        if ($id != null) {
            $order_payments = order_payment::where('id', $dec_id)->get();
        } else {

            $order_payments = order_payment::all();
        }
        return view('admin.pages.payments.payments', compact('order_payments'));
    }
    public function order_status($id, $status)
    {

        $dec_id = Crypt::decrypt($id);
        $add_stat = car_order::find($dec_id);
        if ($status == 'approve') {
            $add_stat->status = 'approve';
            $add_stat->save();
            session()->flash('success', "Status Updated Sucessfully");
            return redirect('Orders');
        } elseif ($status == 'in_process') {
            $add_stat->status = 'In Process';
            $add_stat->save();
            session()->flash('success', "Status Updated Sucessfully");
            return redirect('Orders');
        } elseif ($status == 'pending') {
            $add_stat->status = 'pending';
            $add_stat->save();
            session()->flash('success', "Status Updated Sucessfully");
            return redirect('Orders');
        } elseif ($status == 'disapprove') {
            $add_stat->status = 'disapprove';
            $add_stat->save();
            session()->flash('success', "Status Updated Sucessfully");
            return redirect('Orders');
        } elseif ($status == 'done') {
            $add_stat->status = 'done';
            $add_stat->save();
            session()->flash('success', "Status Updated Sucessfully");
            return redirect('Orders');
        } else {
            session()->flash('error', "Status Updated Sucessfully");
            return redirect('Orders');
        }



        //   return redirect('admin/category');

    }

    public function verify_email_submit($token)
    {

        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $date_time = Carbon::now()->format('Y-m-d H:i:s');
            User::where("id",  $user['id'])->update(["remember_token" => '',"email_verified_at" => $date_time,"is_verified" => 1]);
            return redirect(env("FRONT_URL_LOGIN"));
        } else {
            abort(404);
        }
    }
}
