<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category;
use App\Http\Requests\UpdateCategory;
use Illuminate\Support\Facades\View;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $list_category = DB::table('category')->get();
        return view('back-end.category.index', compact('list_category'));
    }

    public function add(){
        return view('back-end.category.add');
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
    public function store(Category $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $file = $request->category_image;
        $url_img=$file->move('uploads/categories', $file->getClientOriginalName());
        $data['category_image'] = $url_img;
        $category = DB::table('category')->insert($data);
        return redirect()->action('CategoryController@index')->with('success','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_products = DB::table('category')->leftjoin('product', 'category.id', '=', 'product.categoryID')->where('categoryID','=',$id)->get();
        return view('front-end.category', compact('list_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate= DB::table('category')->find($id);   
        return view('back-end.category.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $data=$request->all();
        unset($data['_token']);
        if($request->hasfile('category_image')){
            $file = $request->category_image;
            $url_img=$file->move('uploads/categories', $file->getClientOriginalName());
            $data['category_image'] = $url_img;
            }
        $category = DB::table('category')->where('id','=',$id)->update($data);
        return redirect()->action('CategoryController@index')->with('success','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where('categoryID','=',$id)->delete();
        DB::table('category')->where('id','=',$id)->delete();     
        return redirect()->back()->with('success','Xóa danh mục thành công');
    }
}
