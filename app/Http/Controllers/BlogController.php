<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Blog;
use App\Http\Requests\UpdateBlog;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('news')->paginate(5);
        return view('back-end.blog.index', compact('blogs'));
    }

    public function add()
    {
        return view('back-end.blog.add');
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
    public function store(Blog $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $file = $request->news_image;
        $url_img=$file->move('uploads/blogs', $file->getClientOriginalName());
        $data['news_image'] = $url_img;
        $pro = DB::table('news')->insert($data);
        return redirect()->action('BlogController@index')->with('success','Thêm tin tức thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newskey = 'news_'.$id;  
        if(!Session::has($newskey)){
            DB::table('news')->where('id',$id)->increment('views');
            Session::put($newskey,1);
        }
        $blogs = DB::table('news')->paginate(4);
        $news = DB::table('news')->find($id);
        return view('front-end.blog-detail', compact('blogs', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog= DB::table('news')->find($id);   
        return view('back-end.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlog $request, $id)
    {
        $data=$request->all();
        unset($data['_token']);
        if($request->hasfile('news_image')){
        $file = $request->news_image;
        $url_img=$file->move('uploads/blogs', $file->getClientOriginalName());
        $data['news_image'] = $url_img;
        }
        DB::table('news')->where('id','=',$id)->update($data);
        return redirect()->action('BlogController@index')->with('success','Cập nhật tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('news')->where('id','=',$id)->delete(); 
        return redirect()->back()->with('success','Xóa tin tức thành công');
    }
    public function listNews(Request $request){
        $key = $request->key;
        if($request->has('key')){
            $news = DB::table('news')->where('news_title', 'like', '%'.$key.'%')->paginate(4);
        }else{
            $news = DB::table('news')->paginate(4);
        }
        return view('front-end.blog', compact('news'));
    }
}
