<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateSim;
use App\Http\Requests\CateSimRequest;
class CateSimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cateSims = CateSim::paginate(10);
        return view('admin.danhmuc.index',compact('cateSims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.danhmuc.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateSimRequest $request)
    {
        //
        $cateSim = new CateSim();
        $cateSim->name = $request->name;
        $cateSim->save();
        return redirect()->route('admin.cate-sim')->with('thongbao','Thanh cong!');
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
        $cateSim = CateSim::find($id);
        return view('admin.danhmuc.edit',compact('cateSim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateSimRequest $request, $id)
    {
        //
        $cateSim = CateSim::find($id);
        $cateSim->name = $request->name;
        $cateSim->update();
        return redirect()->route('admin.cate-sim')->with('thongbao','Sửa thành công!');
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
        CateSim::destroy($id);
        return back()->with('thongbao','Xóa thành công!');
    }
}
