<?php

namespace App\Http\Controllers;

use App\Models\CustomerSim;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerSimRequest;
use DB;
use Alert;
use App\Models\CateSim;
use DataTables;

class CustomerSimController extends Controller
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
            $data = DB::table('customer_sims')
                        ->join('sim', 'sim.id', 'customer_sims.id_sim')
                        ->select('customer_sims.*', 'sim.id as sim_id', 'sim.phone_number')->orderBy('id','desc')
                        ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    if ($data->status == 0) return'<div>
                        <a href="'. route('unac.customer_sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-lock-open"></i></a>
						<a href="'. route('destroy.customer_sim',$data->id) .'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>';
                    return '<div>
						<a href="'. route('ac.customer_sim',$data->id) .'" class="btn btn-primary"><i class="fas fa-lock"></i>
						<a href="'. route('destroy.customer_sim',$data->id) .'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>';
                    

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $customerSims = DB::table('customer_sims')
        //                 ->join('sim', 'sim.id', 'customer_sims.id_sim')
        //                 ->select('customer_sims.*', 'sim.id as sim_id', 'sim.phone_number')->orderBy('id','desc')
        //                 ->paginate(10);
        return view('admin.customer-sim');

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
    public function store(CustomerSimRequest $request)
    {
        //
        $customerSim = new CustomerSim();
        $customerSim->id_sim = $request->id_sim;
        $customerSim->name = $request->name;
        $customerSim->phone = $request->phone;
        $customerSim->address = $request->address;
        $customerSim->note = $request->note;
        $customerSim->payment = collect($request->payment)->implode('/');
        $customerSim->save();
        // Alert::success('Successfully','Create successfully');
        return redirect()->route('dat_hang.customer_sim');
    }
    
    public function dat_hang(){
        $cateSims = CateSim::all();
        $cuss  = CustomerSim::limit(10)->orderBy('id','desc')->get();
        $suc  = DB::table('customer_sims')
                ->join('sim','sim.id','customer_sims.id_sim')
                ->select('customer_sims.*','sim.phone_number','sim.price')
                ->limit(1)->orderBy('id','desc')->get();
        // dd($suc);
        return view('font-end.thongbao',compact('cateSims','cuss','suc'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerSim  $customerSim
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerSim $customerSim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerSim  $customerSim
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerSim $customerSim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerSim  $customerSim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerSim $customerSim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerSim  $customerSim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CustomerSim::destroy($id);
        return back()->with('thongbao','Xóa thành công!');
    }

    public function active($id){
        CustomerSim::where('id',$id)->update(['status'=>0]);
        return back()->with('thongbao','Thành công!');
    }
    public function unactive($id){
        CustomerSim::where('id',$id)->update(['status'=>1]);
        return back()->with('thongbao','Thành công!');
    }
}
