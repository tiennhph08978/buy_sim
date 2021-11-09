<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogs.add');
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
        $file = $request->file('image');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $filePath = $request['image']->storeAs('image',$fileName,'public');
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->summary = $request->summary;
        $blog->image = $filePath;
        $blog->description = $request->description;

        $blog->save();
        return redirect()->route('admin.blog')->with('thongbao','Them thành công!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog=Blog::find($id);
        unlink('storage/'.$blog->image);
        Blog::where('id',$blog->id)->delete();
        return redirect()->route('admin.blog')->with('thongbao','Xóa thành công!');
    }

    public function active($id)
    {
        //
        Blog::where('id', $id)->update(['status'=>1]);
        return back()->with('thongbao','Kích hoạt thành công!');
    }
    public function unactive($id)
    {
        //
        Blog::where('id', $id)->update(['status'=>0]);
        return back()->with('thongbao','Ẩn thành công!');
    }
}
