<?php

namespace App\Http\Controllers;

use App\Models\borrowed_request;
use App\Models\cancelation_request;
use App\Models\Car_addon;
use App\Models\Car_brand;
use App\Models\car_order;
use App\Models\Setting;
use App\Models\Cars;
use App\Models\coupon;
use App\Models\Offer;
use App\Models\order_payment;
use App\Models\password_reset;
use App\Models\review;
use App\Models\used_coupon;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class HomeController extends Controller
{
    public function car_list(Request $request)
    {
        $username = $request->username;
        // dd($username);
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "admin" && $password == "admin") {
                $car_list = Cars::where('status', 1)->get();
                return response()->json($car_list);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function vat_amount(Request $request)
    {
        $username = $request->username;
        // dd($username);
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "admin" && $password == "admin") {
                $vat_amount = Setting::where('type', "Vat")->first();
                return response()->json([
                    "Sucess" => true,
                    "amount" => $vat_amount
                ]);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function offers_list(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $offers = Offer::where('status', 1)->latest()->get();
                return response()->json($offers);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function order_list(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $orders = car_order::where('user_id', '=', $request->user_id)->with('get_cars', 'users', 'get_payments')->get();
                return response()->json($orders);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function brand_list(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $car_brand = Car_brand::where('status', 1)->get();
                 $max_val = Cars::where('status', 1)->orderBy('car_rent_price', 'DESC')->first();
                 $min_val = Cars::where('status', 1)->orderBy('car_rent_price', 'ASC')->first();
                 $min_val_year = Cars::where('status', 1)->orderBy('model_year', 'ASC')->first();
                 $max_val_year = Cars::where('status', 1)->orderBy('model_year', 'DESC')->first();
                 $val_seat = Cars::where('status', 1)->groupBy('no_of_seats')->orderBy('no_of_seats', 'ASC')->select("no_of_seats as name")->get();
                // $max_val1 = $max_val->car_rent_price;
                return response()->json(["min_val"=>$min_val,"min_val_year"=>$min_val_year,"max_val"=>$max_val,"max_val_year"=>$max_val_year,"val_seat"=>$val_seat,"brand"=>$car_brand]);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function get_profile_data(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $profile_data = User::where('id', $request->user_id)->first();
                $name = explode(' ', $profile_data->name);
                return response()->json([
                    'success' => true,
                    'data' => $profile_data,
                    'name' => $name,
                    'user_id' => $request->user_id,
                ]);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function update_profile_data(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // print_r($request->all());
        // die;
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $user_update = User::where('id', $request->user_id)->first();
                // $user_update->name = $request->f_name . ' ' . $request->l_name;
                $user_update->name = $request->fullname;
                // $user_update->email = $request->email;
                $user_update->contact_no = $request->contact_no;
                $user_update->country = $request->country;
                $user_update->city = $request->city;
                // $user_update->licence_no = $request->licence_no;
                $user_update->emirates_id = $request->emirates_id;
                if (!empty($request->visa_copy)) {
                    $file = $request->file('visa_copy');
                    $extension = $file->getClientOriginalName();
                    $filename = time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['visa_copy'] = 'uploads/users/' . $filename;
                    $user_update->visa_copy =  $data['visa_copy'];
                }
                if (!empty($request->international_d_licence_front)) {
                    $file = $request->file('international_d_licence_front');
                    $extension = $file->getClientOriginalName();
                    $filename = time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['international_d_licence_front'] = 'uploads/users/' . $filename;
                    $user_update->international_d_licence_front =  $data['international_d_licence_front'];
                }
                if (!empty($request->local_d_licence_front)) {
                    $file = $request->file('local_d_licence_front');
                    $extension = $file->getClientOriginalName();
                    $filename = "local_d_licence_front".time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['local_d_licence_front'] = 'uploads/users/' . $filename;
                    $user_update->local_d_licence_front =  $data['local_d_licence_front'];
                }
                if (!empty($request->local_d_licence_back)) {
                    $file = $request->file('local_d_licence_back');
                    $extension = $file->getClientOriginalName();
                    $filename = "local_d_licence_back".time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['local_d_licence_back'] = 'uploads/users/' . $filename;
                    $user_update->local_d_licence_back =  $data['local_d_licence_back'];
                }
                if (!empty($request->emirates_back)) {
                    $file = $request->file('emirates_back');
                    $extension = $file->getClientOriginalName();
                    $filename = 'emirates_back_'.time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['emirates_back'] = 'uploads/users/' . $filename;
                    $user_update->emirates_back =  $data['emirates_back'];
                }

                if (!empty($request->emirates_front)) {
                    $file = $request->file('emirates_front');
                    $extension = $file->getClientOriginalName();
                    $filename = 'emirates_back_'.time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['emirates_front'] = 'uploads/users/' . $filename;
                    $user_update->emirates_front =  $data['emirates_front'];
                }
                if (!empty($request->international_d_licence_back)) {
                    $file = $request->file('international_d_licence_back');
                    $extension = $file->getClientOriginalName();
                    $filename = time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['international_d_licence_back'] = 'uploads/users/' . $filename;
                    $user_update->international_d_licence_back =  $data['international_d_licence_back'];
                }
                if (!empty($request->passport_copy)) {
                    $file = $request->file('passport_copy');
                    $extension = $file->getClientOriginalName();
                    $filename = time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['passport_copy'] = 'uploads/users/' . $filename;
                    $user_update->passport_copy =  $data['passport_copy'];
                }
                $user_update->save();
                return response()->json([
                    'success' => true,
                    'data' => $user_update,
                ]);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function addon_car(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $addon_car = Car_addon::where('status', 1)->get();
                // dd($addon_car);
                return response()->json($addon_car);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function car_get(Request $request)
    {
        $username = $request->username;
        // dd($username);
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "admin" && $password == "admin") {
                $car_make = Cars::where('status', 1)->where('id', $request->id)->first();
                return response()->json($car_make);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function register(Request $request)
    {

            // dd($request->all());
        try {
            //Validated
            $validateUser = FacadesValidator::make(
                $request->all(),
                [
                    'f_name' => 'required',
                    'l_name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|same:confirmation_password',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $usernameapi = $request->usernameapi;
            $passwordapi = $request->passwordapi;
            if ($usernameapi != null && $passwordapi != null) {
                if ($usernameapi == "admin" && $passwordapi == "admin") {



                    $user_register = new User();
                    $user_register->name = $request->f_name . ' ' . $request->l_name;
                    $user_register->email = $request->email;
                    $user_register->contact_no = $request->contact_no;
                    $user_register->country = $request->country;
                    $user_register->city = $request->city;
                    $user_register->user_type = 'User';
                    $user_register->type = $request->type;
                    $user_register->password = Hash::make($request->password);
                    $user_register->licence_no = $request->licence_no;
                    $user_register->emirates_id = $request->emirates_id;
                    if (!empty($request->visa_copy)) {
                        $file = $request->file('visa_copy');
                        $extension = $file->getClientOriginalName();
                        $filename = "visa_copy".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['visa_copy'] = 'uploads/users/' . $filename;
                        $user_register->visa_copy =  $data['visa_copy'];
                    }
                    if (!empty($request->international_d_licence_front)) {
                        $file = $request->file('international_d_licence_front');
                        $extension = $file->getClientOriginalName();
                        $filename = "international_d_licence_front".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['international_d_licence_front'] = 'uploads/users/' . $filename;
                        $user_register->international_d_licence_front =  $data['international_d_licence_front'];
                    }
                    if (!empty($request->international_d_licence_back)) {
                        $file = $request->file('international_d_licence_back');
                        $extension = $file->getClientOriginalName();
                        $filename = "international_d_licence_back".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['international_d_licence_back'] = 'uploads/users/' . $filename;
                        $user_register->international_d_licence_back =  $data['international_d_licence_back'];
                    }
                    if (!empty($request->local_d_licence_front)) {
                        $file = $request->file('local_d_licence_front');
                        $extension = $file->getClientOriginalName();
                        $filename = "local_d_licence_front".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['local_d_licence_front'] = 'uploads/users/' . $filename;
                        $user_register->local_d_licence_front =  $data['local_d_licence_front'];
                    }
                    if (!empty($request->local_d_licence_back)) {
                        $file = $request->file('local_d_licence_back');
                        $extension = $file->getClientOriginalName();
                        $filename = "local_d_licence_back".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['local_d_licence_back'] = 'uploads/users/' . $filename;
                        $user_register->local_d_licence_back =  $data['local_d_licence_back'];
                    }

                if (!empty($request->emirates_back)) {
                    $file = $request->file('emirates_back');
                    $extension = $file->getClientOriginalName();
                    $filename = 'emirates_back_'.time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['emirates_back'] = 'uploads/users/' . $filename;
                    $user_register->emirates_back =  $data['emirates_back'];
                }

                if (!empty($request->emirates_front)) {
                    $file = $request->file('emirates_front');
                    $extension = $file->getClientOriginalName();
                    $filename = 'emirates_front'.time() . '.' . $extension;
                    $file->move(public_path('uploads/users'), $filename);
                    $data['emirates_front'] = 'uploads/users/' . $filename;
                    $user_register->emirates_front = $data['emirates_front'];
                }
                    if (!empty($request->passport_copy)) {
                        $file = $request->file('passport_copy');
                        $extension = $file->getClientOriginalName();
                        $filename = "passport_copy".time() . '.' . $extension;
                        $file->move(public_path('uploads/users'), $filename);
                        $data['passport_copy'] = 'uploads/users/' . $filename;
                        $user_register->passport_copy =  $data['passport_copy'];
                    }

                    // $user_register->passport_copy = $request->passport_copy;
                    // $user_register->international_d_licence = $request->international_d_licence;
                    $user_register->save();
                    if ($user_register) {
                        // $get_user = User::find($request->email)->get();

                        // $domain = env('BACK_URL');
                        $domain = url('/');
                        $token = Str::random(40);
                        $url = $domain . '/verify-email/' . $token;
                        // $url = $domain . '/verify-email/' . $token;
                        $data['url'] = $url;
                        $data['name'] = $request->f_name . ' ' . $request->l_name;
                        $data['email'] = $request->email;
                        $data['title'] = "Email Verification";
                        Mail::send('verify_email', ['data' => $data], function ($message) use ($data) {
                            $message->to($data['email'])->subject($data['title']);
                        });
                        User::where("id",  $user_register->id)->update(["remember_token" => $token]);
                        // $get_use = User::where('id', $user_register->id)->first();
                        // $get_use->remember_token = $token;
                        // $get_use->save();

                        return response()->json([
                            'success' => true,
                            'msg' => 'Verification Send Successfully',

                        ]);
                    }

                    // return $this->sendResponse($success, 'User register successfully.');
                    return response()->json([
                        'status' => true,
                        'message' => 'User Created Successfully',
                        'token' => $user_register->createToken($user_register->email)->plainTextToken
                    ], 200);
                    // return response()->json(['message' => 'Registration Success'], 202);

                } else {
                    return response()->json(['message' => 'Enter Credentials'], 404);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = FacadesValidator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }



            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            if ($user->is_verified == 1) {
                if ($user) {
                    $token = $user->createToken($user->email)->plainTextToken;
                    return response()->json([
                        'status' => true,
                        'message' => 'User Logged In Successfully',
                        'email' => auth()->user()->email,
                        'user_name' => auth()->user()->name,
                        'user_id' => auth()->user()->id,
                        'token' => $token
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid Credentials',
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Please Verify Your Email First',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function filter_car(Request $request)
    {

        // print_r($request->all());
        // die;
        // dd($request->all());
        // $get_orders=car_orders::whereBetween('pick_up_date', [$ageFrom, $ageTo])
        // $startDate = Carbon::parse($request->pickupdate)->format('m/d/Y');
        // $endDate = Carbon::parse($request->dropoffdate->format('m/d/Y'));
        $startDate = Carbon::parse($request->pick_up_date)->format('m/d/Y H:i:s');
        $endDate = Carbon::parse($request->drop_off_date)->format('m/d/Y H:i:s');
        // dd($endDate)

        // $cars_get = car_order::whereDate('pick_up_date', '>=', $startDate)
        //     ->whereDate('drop_off_date', '<=', $endDate)
        //     ->pluck('car_id');
        // $cars_get = car_order::whereNot(function ($query) use ($startDate, $endDate) {
        //     $query->where([
        //         ['pick_up_date', '<', $startDate],
        //         ['drop_off_date', '>', $endDate]
        //     ]);
        // })->pluck('car_id');
        $cars_get =    Cars::whereDoesntHave('carOrders', function ($query) use ($startDate, $endDate) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('pick_up_date', '<=', $endDate)
                    ->where('drop_off_date', '>=', $startDate);
            });
        })
            ->pluck('id');

        $get_filter_car_id = array_unique($cars_get->toArray());


        // dd($get_filter_car_id);
        // $arr_car = [];
        // foreach ($get_filter_car_id as $car) {
        //     $get_s_car = Cars::find($car);
        //     $arr_car[] = $get_s_car;
        // }
        // return response()->json([
        //     'sdsd' => $cars_get
        // ]);
        // print_r($get_filter_car_id);
        // print_r("data");
        // print_r( $cars_get);
        $filter_car = Cars::query();
        $filter_car = $filter_car->whereIn('id', $get_filter_car_id);

        if (isset($request->search) && $request->search != "null") {
            $filter_car = $filter_car->where('car_name', 'LIKE', '%' . $request->search . '%');
        }

        if (isset($request->r1) && isset($request->r2)) {
            $filter_car = $filter_car->whereBetween('car_rent_price', [$request->r1, $request->r2]);
        }
        if (isset($request->y1) && isset($request->y2) &&$request->y2!=""&&$request->y1!="") {
            $filter_car = $filter_car->whereBetween('model_year', [$request->y1,$request->y2]);
        }
        if (isset($request->car_brand) && $request->car_brand != "[]") {
            if ($request->car_brand != "") {
                $arr_brand = json_decode($request->car_brand);
            $filter_car = $filter_car->whereIn('car_brand', $arr_brand);
            }

        }
        if (isset($request->vechiletype) && $request->vechiletype != "[]") {
            if ($request->vechiletype != "") {
                $arr_veh = json_decode($request->vechiletype);
            $filter_car = $filter_car->whereIn('vehicle_type', $arr_veh);
            }
            $arr_veh = json_decode($request->vechiletype);
            $filter_car = $filter_car->whereIn('vehicle_type', $arr_veh);
        }
        if (isset($request->highlow) && $request->highlow != "null") {
            if ($request->highlow == "Price Low to High") {
                $filter_car = $filter_car->orderby('car_rent_price', 'asc');
            } else {
                $filter_car = $filter_car->orderby('car_rent_price', 'DESC');
            }
        }

        if (isset($request->seats) && $request->seats != "null") {
            $filter_car = $filter_car->where('no_of_seats', $request->seats);
        }

 // echo "<pre>";
        // print_r(response()->json([
        //     'filter_data' => $filter_car,
        //     'status' => 'true',
        //     'pick_up_date' => $request->pickupdate,
        //     'drop_off_date' => $request->dropoffdate,
        //     'seats' => $request->seats,
        //     'brands' => $request->car_brand,
        // ]));

        // die;
        // dd($filter_car);
        $filter_car = $filter_car->get();
        // dd($filter_car);
        // dd($filter_car);
        return   response()->json([
            'filter_data' => $filter_car,
            'status' => 'true',
            'pick_up_date' => $request->pickupdate,
            'drop_off_date' => $request->dropoffdate,
            'seats' => $request->seats,
            'brands' => $request->car_brand,
        ]);

    }
    public function car_check_out(Request $request)
    {
        // dd($request);
        // dd('adsd');
        // try {
            //Validated
            $validateUser = FacadesValidator::make(
                $request->all(),
                [
                    'car_id' => 'required',
                    'user_id' => 'required',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $usernameapi = $request->usernameapi;
            // dd($username);
            $passwordapi = $request->passwordapi;
            if ($usernameapi != null && $passwordapi != null) {
                if ($usernameapi == "admin" && $passwordapi == "admin") {



                    $user_register = new car_order();
                    $user_register->car_id = $request->car_id;
                    $get_max_id = car_order::max('id');
                    if ($get_max_id == null) {
                        $get_max_id = 1;
                    } else {
                        $get_max_id = $get_max_id + 1;
                    }

                    $user_register->order_id = 'ORD-' . date('Ymd') . '#' . $get_max_id;
                    $user_register->status = $request->status;
                    $user_register->user_id = $request->user_id;
                    $user_register->comment_box = $request->Comment;
                    $user_register->car_brand = $request->car_brand;
                    $user_register->coupon_name = $request->coupon_name;
                    $user_register->coupon_amt = $request->coupon_amt;
                    $user_register->addon_id = $request->addon_id;
                    $user_register->car_img = $request->car_img;
                    $user_register->payment_type = $request->payment_type;
                    if (isset($request->payment_type) && $request->payment_type == 'online') {
                        $user_register->stripe_id = $request->stripe_id;
                        // $user_register->payment_id = $request->payment_id;
                        $user_register->is_confirmed = 1;
                    }
                    if (isset($request->payment_type) && $request->payment_type == 'cod') {
                        $user_register->stripe_id = $request->stripe_id;
                        // $user_register->payment_id = $request->payment_id;
                        $user_register->is_confirmed = 0;
                    }
                    if ($request->coupon_name != null && $request->coupon != "") {
                        $set_coupon = new coupon();
                        $set_coupon->user_id = $request->user_id;
                        $set_coupon->coupon_name = $request->coupon_name;
                        $set_coupon->save();
                    }
                    $user_register->pick_up_date = $request->pick_up_date;
                    $user_register->drop_off_date = $request->drop_off_date;
                    $user_register->pickup_location = $request->pickup_location;
                    $user_register->dropoff_location = $request->dropoff_location;
                    $user_register->save();
                    if ($user_register) {
                        $payment = new order_payment();
                        $payment->user_id = $request->user_id;
                        $payment->is_confirmed = $request->is_confirmed;
                        $payment->amount = $request->amount;
                        $user_register->Vattax = $request->Vattax;
                        $payment->received_amount = $request->received_amount;
                        $payment->payment_type = $request->payment_type;
                        $payment->car_order_id = $user_register->id;
                        $payment->save();
                        car_order::where("id",  $user_register->id)->update(["payment_id" => $payment->id]);
                        // $user_register = car_order::find($user_register->id)->first();
                        // $user_register->payment_id = $payment->id;
                        // $user_register->save();

                    }

                    // return $this->sendResponse($success, 'User register successfully.');
                    return response()->json([
                        'status' => true,
                        'message' => 'Order Created Successfully '.$payment->id,
                    ], 200);
                    // return response()->json(['message' => 'Registration Success'], 202);

                } else {
                    return response()->json(['message' => 'Enter Credentials'], 404);
                }
            }
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => $th->getMessage()
        //     ], 500);
        // }
    }
    public function apply_coupon(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
        ]);


        $get_coupon = coupon::where('coupon_name', $request->coupon_name)->where('status', 1)->first();
        if ($get_coupon == null && $get_coupon == "") {
            $order_amt = $request->amount;
            $check_if_use = used_coupon::where(['coupon_name' => $request->coupon_name, 'user_id' => $request->user_id])->first();
            if ($check_if_use == null && $check_if_use == "") {
                if ($get_coupon->coupon_type == 'fixed') {
                    $t_amt = $order_amt - $get_coupon->coupon_amt;
                    return response()->json([
                        'status' => true,
                        'message' => "Coupon Applied Successfully",
                        'coupon_name' => $get_coupon->coupon_name,
                        'coupon_amt' => $get_coupon->coupon_amt,
                        'actual_amt' => $order_amt,
                        't_amt' => $t_amt
                    ], 201);
                } elseif ($get_coupon->coupon_type == 'percentage') {
                    $t_amt = ($order_amt * $get_coupon->coupon_amt) / 100;
                    return response()->json([
                        'status' => true,
                        'message' => "Coupon Applied Successfully",
                        'coupon_name' => $get_coupon->coupon_name,
                        'actual_amt' => $order_amt,
                        'coupon_amt' => $get_coupon->coupon_amt,
                        't_amt' => $t_amt
                    ], 201);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Coupon Already Used",

                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Coupon Not Exist"
            ], 400);
        }
    }
    public function get_days(Request $request)
    {
        $request->validate([
            'pick_up_date' => 'required',
            'drop_of_date' => 'required'
        ]);
        $cDate = Carbon::parse($request->pick_up_date)->settings(['toStringFormat' => 'm/d/Y']);
        // $cdate = strtotime($cDate);
        $get_days = $cDate->diffInDays($request->drop_of_date);
        return response()->json([
            'status' => true,
            'message' => "successfully picked up",
            'days' => $get_days,
            'pick_up_date' => $request->pick_up_date,
            'drop_off_date' => $request->drop_off_date
        ], 200);
    }
    public function find_car(Request $request)
    {

        try {
            $request->validate([
                'pick_up_date' => 'required',
                'drop_off_date' => 'required',
                // 'car_brand' => 'required',
                // 'pick_up_location' => 'required',
                // 'pick_up_location' => 'required',
            ]);

            $startDate = Carbon::parse($request->pick_up_date)->format('m/d/Y H:i:s');
            $endDate = Carbon::parse($request->drop_off_date)->format('m/d/Y H:i:s');

            $cars_get =    Cars::whereDoesntHave('carOrders', function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->where('pick_up_date', '<=', $endDate)
                        ->where('drop_off_date', '>=', $startDate);
                });
            })
                ->pluck('id');
            // $cars_get = car_order::where('pick_up_date', '>', $startDate)->where(
            //     'drop_off_date','<',$endDate
            // )->pluck('car_id');



            // $cars_get = car_order::whereNot(function ($query) use ($startDate, $endDate) {
            //     $query->whereDate([
            //         ['pick_up_date', '>', $startDate],
            //         ['drop_off_date', '<', $endDate]
            //     ]);
            // })->pluck('car_id');

            $get_filter_car_id = array_unique($cars_get->toArray());


            $filter_car = Cars::query();

            $filter_car = $filter_car->whereIn('id', $get_filter_car_id);
            if (isset($request->car_brand) && $request->car_brand == []) {
                $filter_car = $filter_car->whereIn('car_brand', $request->car_brand);
            }

            $filter_car = $filter_car->get();

            return response()->json([
                'status' => true,
                'message' => "Result Found",
                'start_date' => $startDate,
                'end_date' => $endDate,
                'cars' => $filter_car,
                'ok_cars' => $cars_get,
                'pick_up_date' => $request->pick_up_date,
                'drop_off_date' => $request->drop_off_date,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }


    public function car_check_out_borrowed(Request $request)
    {
        // dd('adsd');
        try {
            //Validated
            $validateUser = FacadesValidator::make(
                $request->all(),
                [
                    'car_id' => 'required',
                    'user_id' => 'required',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $usernameapi = $request->usernameapi;
            // dd($username);
            $passwordapi = $request->passwordapi;
            if ($usernameapi != null && $passwordapi != null) {
                if ($usernameapi == "admin" && $passwordapi == "admin") {



                    $user_register = new borrowed_request();
                    $user_register->car_id = $request->car_id;
                    $user_register->status = 0;
                    $user_register->user_id = $request->user_id;
                    $user_register->granttotal = $request->granttotal;
                    $user_register->total = $request->total;
                    $user_register->addons = $request->Addon;
                    $user_register->pick_up_date = $request->pick_up_date;
                    $user_register->code = $request->code;
                    $user_register->total_addon = $request->totaladdon;
                    $user_register->Vattax = $request->Vattax;
                    $user_register->drop_off_date = $request->drop_off_date;
                    $user_register->pick_up_location = $request->pick_up_location;
                    $user_register->drop_off_location = $request->drop_off_location;
                    $user_register->save();

                    if ($user_register) {
                        return response()->json([
                            'status' => true,
                            'message' => 'Request Send Successfully',
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Not  Send Successfully',
                        ], 200);
                    }
                    // return $this->sendResponse($success, 'User register successfully.');

                    // return response()->json(['message' => 'Registration Success'], 202);

                } else {
                    return response()->json(['message' => 'Enter Credentials'], 404);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function get_borrow_detail(Request $request)
    {
        // dd('adsd');
        try {
            //Validated
            $validateUser = FacadesValidator::make(
                $request->all(),
                [

                    'user_id' => 'required',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $usernameapi = $request->usernameapi;
            // dd($username);
            $passwordapi = $request->passwordapi;
            if ($usernameapi != null && $passwordapi != null) {
                if ($usernameapi == "admin" && $passwordapi == "admin") {

                    $dec_id = Crypt::decrypt($request->user_id);
                    $borrowed_detail = borrowed_request::where('user_id', $dec_id)->latest()->first();

                    $addon_detail = json_decode($borrowed_detail->addons);
                    $car_detail = Cars::where('id', $borrowed_detail->car_id)->latest()->first();
                    $all_addons = [];
                    foreach ($addon_detail as $addon) {
                        $get_addon = Car_addon::where('id', $addon)->first();
                        $all_addons[] = $get_addon;
                    }


                    // return $this->sendResponse($success, 'User register successfully.');
                    return response()->json([
                        'status' => true,
                        'car_detail' => $car_detail,
                        'user_id' => $dec_id,
                        'addon_detail' => $addon_detail,
                        'borrowed_detail' => $borrowed_detail,
                        'all_addons' => $all_addons,
                        'message' => 'Detail Get Successfully',
                    ], 200);
                    // return response()->json(['message' => 'Registration Success'], 202);

                } else {
                    return response()->json(['message' => 'Enter Credentials'], 404);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function forgetpassword(Request  $request)
    {
        try {
            $get_email = User::where('email', $request->email)->get()->toArray();
            if (count($get_email) > 0) {
                $token = Str::random(40);
                $domain = env('FRONT_URL');
                $url = $domain . 'reset?token=' . $token;
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['subject'] = "Password Reset";
                $data['body'] = "Please Click Below Link To Reset Password";
                Mail::send('forget-email', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['subject']);
                    // $message->to($data['email']);
                });

                $date_time = Carbon::now()->format('Y-m-d H:i:s');
                password_reset::updateOrcreate([
                    'email' => $request->email
                ], [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => $date_time,
                ]);
                return response()->json(["success" => true, "msg" => "PLease Check Your mail To reset Password"]);
            } else {

                return response()->json(["success" => false, "msg" => "User Not Found"]);
            }
        } catch (\Throwable $th) {
            return response()->json(["success" => false, "msg" => $th->getMessage()]);
        }
    }
    public function reset_password(Request  $request)
    {
        try {
            $get_token = password_reset::where('token', $request->token)->first();
            $get_token_2 = password_reset::where('id', $get_token->id)->first();

            if ($get_token) {
                $request->validate([
                    'password' => 'required'
                ]);
                $email_token = $get_token_2->email;
                $user = User::where('email', $email_token)->first();
                $get_pass = Hash::make($request->password);
                $user->password = $get_pass;
                $user->save();
                if ($user) {
                    $get_token->delete();
                    return response()->json(["success" => true, "msg" => $user]);
                }
            } else {
                return response()->json(["success" => false, "msg" => "Token Not Match"]);
            }
        } catch (\Throwable $th) {
            return response()->json(["success" => false, "msg" => 'Password Changed Successfully']);
        }
    }
    public function check_token(Request  $request)
    {
        try {
            $get_token = password_reset::where(['token' => $request->token])->first();
            if ($get_token != null && $get_token != "") {

                return response()->json(["success" => true, "msg" => "Token Match "]);
            } else {

                return response()->json(["success" => true, "msg" => "Token Match "]);
            }
        } catch (\Throwable $th) {
            return response()->json(["success" => false, "msg" => $th->getMessage()]);
        }
    }
    public function add_review(Request  $request)
    {
        $request->validate([
            'user_id' => 'required',
            'message' => 'required',
            'rating' => 'required',
            'car_id' => 'required',
        ]);
        $check_car = review::where(['user_id' => $request->user_id, 'car_id' => $request->car_id])->first();

        if (!$check_car && $check_car == "") {
            $get_review = new  review();
            $get_review->user_id = $request->user_id;
            $get_review->car_id = $request->car_id;
            $get_review->rating = $request->rating;
            $get_review->message = $request->message;
            $get_review->save();
            return response()->json([
                'success' => true,
                'msg' => "Review Submit Successfully",

            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "User Already Give Review",

            ]);
        }
    }

    public function get_reviews(Request $request)
    {
        $usernameapi = $request->usernameapi;
        // dd($username);
        $passwordapi = $request->passwordapi;
        if ($usernameapi != null && $passwordapi != null) {
            if ($usernameapi == "admin" && $passwordapi == "admin") {
                $car_reviews = review::where('car_id', $request->car_id)->get();
                return response()->json($car_reviews);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }

    public function add_cancelation_request(Request  $request)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'amount' => 'required',
            'order_id' => 'required',

        ]);



        $cancel_r = new  cancelation_request();
        $cancel_r->user_id = $request->user_id;
        $cancel_r->car_id = $request->car_id;
        $cancel_r->order_id = $request->order_id;
        $cancel_r->amount = $request->amount;
        $cancel_r->save();

        if ($cancel_r) {
            return response()->json([
                'success' => true,
                'order_id' => $request->order_id,
                'msg' => "Cancelation Request Submit Successfully",

            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "Some Thing is Wrong",

            ]);
        }
    }
}
