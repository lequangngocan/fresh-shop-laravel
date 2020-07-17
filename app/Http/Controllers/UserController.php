<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_user = DB::table('users')->get();
        return view('back-end.user.index', compact('list_user'));
    }

    public function add()
    {
        return view('back-end.user.add');
    }

    public function editx()
    {
        return view('back-end.user.edit');
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
    public function store(User $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $data['password']=bcrypt($request->input('password'));
        $users = DB::table('users')->insert($data);
        return redirect()->action('UserController@index')->with('success','Thêm tài khoản thành công');
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
    public function update($id)
    {
        $user = DB::table('users')->find($id);
        if($user->role == 0){
            DB::table('users')->where('id','=',$id)->update(['role'=>1]);
        }else{
            DB::table('users')->where('id','=',$id)->update(['role'=>0]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id','=',$id)->delete(); 
        return redirect()->back()->with('success','Xóa tài khoản thành công');
    }
}
