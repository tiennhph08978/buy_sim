<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sim;
use App\Models\CateSim;
use App\Http\Requests\SimRequest;
use DB;
use DataTables;
class SimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('sim')
                ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
                ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
                ->orderBy('id','DESC');

            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    if ($data->status == 0) return'<div>
                        <a href="'. route('admin.edit-sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="'. route('admin.destroy-sim',$data->id) .'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="'. route('admin.unac-sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-lock-open"></i></a>
                        </div>';
                    return '<div>
                        <a href="'. route('admin.edit-sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="'. route('admin.destroy-sim',$data->id) .'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="'. route('admin.ac-sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-lock"></i></a>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $sims = DB::table('sim')
        //         ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
        //         ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
        //         ->paginate(6);
        return view('admin.sim.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cateSims = CateSim::all();
        return view('admin.sim.add',compact('cateSims'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimRequest $request)
    {
        //
        $sim = new Sim();
        $sim->phone_number = $request->phone_number; 
        $sim->price = $request->price; 
        $sim->network_sim = $request->network_sim; 
        $sim->id_cate_sim = $request->id_cate_sim; 
        $sim->save();

        return redirect()->route('admin.sim')->with('thongbao','Thêm thành công!');
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
        $sim = Sim::find($id);
        $cateSims = CateSim::all();
        return view('admin.sim.edit',compact('sim','cateSims'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SimRequest $request, $id)
    {
        //
        $sim = Sim::find($id);
        $sim->phone_number = $request->phone_number; 
        $sim->price = $request->price; 
        $sim->network_sim = $request->network_sim; 
        $sim->id_cate_sim = $request->id_cate_sim; 

        $sim->update();
        return redirect()->route('admin.sim')->with('thongbao','Sửa thành công!');
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
        Sim::destroy($id);
        return redirect()->route('admin.sim')->with('thongbao','Xóa thành công!');
    }

    public function active($id){
        $sim = Sim::where('id',$id)->update(['status'=>0]);
        return back()->with('thongbao','Thành công!');
    }
    public function unactive($id){
        $sim = Sim::where('id',$id)->update(['status'=>1]);
        return back()->with('thongbao','Thành công!');
    }
}
