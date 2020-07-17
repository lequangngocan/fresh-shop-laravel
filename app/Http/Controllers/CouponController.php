<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Coupon;
use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_coupon = DB::table('coupon')->get();
        return view('back-end.coupon.index', compact('list_coupon'));
    }
    public function add()
    {
        return view('back-end.coupon.add');
    }
    public function insertDB(Coupon $request){    
        $data=$request->all();
        unset($data['_token']);
        $coupon = DB::table('coupon')->insert($data);
        return redirect()->action('CouponController@index')->with('success','Thêm mã giảm giá thành công');
    }
    public function checkCoupon(Request $request){
        if(Auth::check()){
            $coupon_code = $request->coupon_code;
            $coupons = DB::table('coupon')->where('coupon_code','=',$coupon_code)->get();
            if(count($coupons) == 1){
                $userID = Auth::user()->id;
                $check_used = DB::table('used_coupon')->where('userID','=',$userID)->where('couponID','=',$coupons[0]->id)->get();
                if(count($check_used) == 0){
                    $used_add = DB::table('used_coupon')->insert([
                        'couponID' => $coupons[0]->id,
                        'userID' => $userID
                    ]);
                    echo "Applied";
                }else{
                    echo "You already used this coupon";
                }
            }else{
                echo "Oops, the coupon code not found !";
            }
        }else{
            echo "You must be logged in to use the coupon code !";
        }
    }
    public function editx()
    {
        return view('back-end.coupon.edit');
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
        $coupon= DB::table('coupon')->find($id);   
        return view('back-end.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Coupon $request, $id)
    {
        $data=$request->all();
        unset($data['_token']);
        $coupon = DB::table('coupon')->where('id','=',$id)->update($data);
        return redirect()->action('CouponController@index')->with('success','Cập nhật mã giảm giá thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('coupon')->where('id','=',$id)->delete(); 
        return redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }
}
