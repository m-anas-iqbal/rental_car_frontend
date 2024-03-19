$get_email = User::where('email', $request->email)->get();
if (count($get_email) > 0) {
  $token= Str::random(40);
    $domain=url('/');
    $url=$domain.'/reset-password?token='.$token;
    $data['url']=$url;
    $data['email']=$request->email;
    $data['title']="Password Reset";
    $data['body']="Please Click Below Link To Reset Password";
    mail::send('forget-email',['data'=>$data],function($message) use($data){
$message->to($data['email'])->subject($data['subject']);
    })
} else {

    return response()->json(["success" => false, "msg" => "User Not Found"]);
}