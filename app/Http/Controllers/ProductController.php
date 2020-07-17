<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product;
use App\Http\Requests\UpdateProduct;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')->get();
        $products = DB::table('product')->paginate(5);
        return view('back-end.product.index', compact('products','categories'));
    }
    public function add()
    {
        $category = DB::table('category')->get();
        return view('back-end.product.add', compact('category'));
        
    }
    public function list(Request $request){
        $filter = $request->filter;
        if($filter == 1){
            $products = DB::table('product')->orderBy('views', 'desc')->paginate(9);
        }else if($filter == 2){
            $products = DB::table('product')->orderBy('sale_price', 'desc')->paginate(9);
        }else if($filter == 3){
            $products = DB::table('product')->orderBy('sale_price', 'asc')->paginate(9);
        }else if($filter == 4){
            $products = DB::table('product')->orderBy('quantity_sold', 'desc')->paginate(9);
        }else{
            $products = DB::table('product')->paginate(9);
        }
        return view('front-end.product', compact('products'));
    }
    public function filter(Request $request){
        $filter = $request->filter;
        if($filter == 1){
            $products = DB::table('product')->orderBy('views', 'desc')->paginate(9);
        }else if($filter == 2){
            $products = DB::table('product')->orderBy('sale_price', 'desc')->paginate(9);
        }else if($filter == 3){
            $products = DB::table('product')->orderBy('sale_price', 'asc')->paginate(9);
        }else if($filter == 4){
            $products = DB::table('product')->orderBy('quantity_sold', 'desc')->paginate(9);
        }else{
            $products = DB::table('product')->paginate(9);
        }
        return view('front-end.product', compact('products'));
    }
    public function detail($id){
        $productkey = 'product_'.$id;  
        if(!Session::has($productkey)){
            DB::table('product')->where('id',$id)->increment('views');
            Session::put($productkey,1);
        }
        $categories = DB::table('category')->get();
        $product = DB::table('product')->find($id);
        $products = DB::table('product')->get();
        $comments = DB::table('comment')->leftjoin('users', 'comment.userID', '=', 'users.id')->where('productID','=',$id)->get();
        return view('front-end.product-detail', compact('product','products','categories','comments'));
    }
    public function search(Request $request){
        $keyword = $request->keyword;
        $products = DB::table('product')->where('product_name', 'like', '%'.$keyword.'%')->get();
        return view('front-end.search', compact('products','keyword'));
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
    public function store(Product $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $file = $request->product_image;
        $url_img=$file->move('uploads/products', $file->getClientOriginalName());
        $data['product_image'] = $url_img;
        $pro = DB::table('product')->insert($data);
        return redirect()->action('ProductController@index')->with('success','Thêm sản phẩm thành công');
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
        $category = DB::table('category')->get();
        $pro= DB::table('product')->find($id);   
        return view('back-end.product.edit', compact('pro','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $data=$request->all();
        unset($data['_token']);
        if($request->hasfile('product_image')){
        $file = $request->product_image;
        $url_img=$file->move('uploads/products', $file->getClientOriginalName());
        $data['product_image'] = $url_img;
        }
        DB::table('product')->where('id','=',$id)->update($data);
        return redirect()->action('ProductController@index')->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where('id','=',$id)->delete(); 
        return redirect()->back()->with('success','Xóa sản phẩm thành công');
    }
}
