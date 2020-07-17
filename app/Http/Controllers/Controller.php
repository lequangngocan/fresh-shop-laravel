<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Forgot;
use Illuminate\Support\Facades\Hash;
use Auth;
use Cart;
use Mail;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
        $categories = DB::table('category')->get();
        return view()->share(['categories' => $categories]);
    }
    public function index(){
        $slider = DB::table('slider')->get();
        $categories2 = DB::table('category')->paginate(3);
        $products1 = DB::table('product')->orderBy('quantity_sold', 'desc')->paginate(4);
        $products2 = DB::table('product')->orderBy('views', 'desc')->paginate(4);
        $news = DB::table('news')->paginate(3);
        return view('front-end.index', compact('slider','categories2','products1','products2','news'));
    }
    public function about(){
        $categories = DB::table('category')->get();
        return view('front-end.about', compact('categories'));
    }
    public function category(){
        return view('front-end.category');
    }
    public function contact(){
        return view('front-end.contact');
    }
    public function blog(){
        return view('front-end.blog');
    }
    public function checkout(){
        return view('front-end.checkout');
    }
    public function dashboard(){
        return view('back-end.index');
    }
    public function loginFrontend(){
        $categories = DB::table('category')->get();
        return view('front-end.login', compact('categories'));
    }
    public function loginBackend(){
        return view('back-end.login');
    }
    public function registerBackend(){
        return view('back-end.register');
    }
    public function postLoginBackend(Request $request)
    {
        if(Auth::attempt(["user_name"=>$request->user_name,"password"=>$request->password])){
            return redirect()->action('Controller@dashboard');
        }else{
            return redirect()->back()->with('success','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function postLoginFrontend(Request $request)
    {
        if(Auth::attempt(["user_name"=>$request->user_name,"password"=>$request->password])){
            return redirect()->action('Controller@index');
        }else{
            return redirect()->back()->with('success','Username or password is incorrect !');
        }
    }
    public function logoutBackend(Request $request) {
        Auth::logout();
        return redirect('/login-back-end');
    }
    public function logoutFrontend(Request $request) {
        Auth::logout();
        return redirect()->action('Controller@index');
    }
    public function forgotPassword(){
        return view('front-end.forgot-password');
    }
    public function forgot(Request $request){
        $user = DB::table('users')->where('email','=',$request->email)->first();
        $users = DB::table('users')->where('email','=',$request->email)->get();
        $email = $request->email;
        if(count($users) == 0){
            return redirect()->back()->with(['error' => 'Email not exists !']);
        }else{
            $verify_code = bcrypt(time().$email);
            $user->verify_code = $verify_code;
            $user->verify_code_time = Carbon::now();
            DB::table('users')->where('email','=',$request->email)->update(['verify_code'=>$verify_code]);
            $url = route('changePassword',['verify_code'=>$user->verify_code,'email'=>$email,'username'=>$user->full_name]);
            $data=[
                'route' => $url
            ];
            Mail::send('front-end.emails.hello', $data, function($message) use ($email){
                $message->to($email, 'Reset Password')->subject('Reset password your account of Fresh Shop');
            });
            return back()->with('success', 'Reset code sent to your email !');
        }
    }
    public function changePassword(Request $request){
        $verify_code = $request->verify_code;
        return view('front-end.reset-password', compact('verify_code'));
    }
    public function postChangePassword(Forgot $request){
        $verify_code = $request->verify_code;
        $user = DB::table('users')->where('verify_code', '=', $verify_code)->first();
        $userID = $user->id;
        $password =Hash::make($request->password);
        DB::table('users')->where('id','=',$userID)->update(['password'=>$password]);
        return back()->with('success', 'Password has been changed !');
    }
}
