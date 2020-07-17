<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Slider;
use App\Http\Requests\UpdateSlider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('slider')->get();
        return view('back-end.slider.index', compact('slider'));
    }

    public function add()
    {
        return view('back-end.slider.add');
    }
    public function change($id){
        $slide = DB::table('slider')->find($id);
        if($slide->status == 0){
            DB::table('slider')->where('id','=',$id)->update(['status'=>1]);
        }else{
            DB::table('slider')->where('id','=',$id)->update(['status'=>0]);
        }
        return redirect()->back();
    }
    // public function showFrontend(){
    //     return view('front-end.index', compact('slider'));
    // }
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
    public function store(Slider $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $file = $request->slide_image;
        $url_img=$file->move('uploads/slider', $file->getClientOriginalName());
        $data['slide_image'] = $url_img;
        DB::table('slider')->insert($data);
        return redirect()->action('SliderController@index')->with('success','Thêm slide thành công');
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
        $slide= DB::table('slider')->find($id);   
        return view('back-end.slider.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlider $request, $id)
    {
        $data=$request->all();
        unset($data['_token']);
        if($request->hasfile('slide_image')){
            $file = $request->slide_image;
            $url_img=$file->move('uploads/slider', $file->getClientOriginalName());
            $data['slide_image'] = $url_img;
        }
        DB::table('slider')->where('id','=',$id)->update($data);
        return redirect()->action('SliderController@index')->with('success','Cập nhật slide thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('slider')->where('id','=',$id)->delete(); 
        return redirect()->back()->with('success','Xóa slide thành công');
    }
}
