<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sim;
use App\Models\CateSim;
use App\Models\CustomerSim;
use DB;
use Auth;
use DataTables;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd($sims);
        $viettels  = Sim::where([['network_sim','viettel'],['status',1]])->limit(15)->orderBy('id','desc')->get();
        $vinas  = Sim::where([['network_sim','vina'],['status',1]])->limit(15)->orderBy('id','desc')->get();
        $mobis  = Sim::where([['network_sim','mobi'],['status',1]])->limit(15)->orderBy('id','desc')->get();
        // dd($cateSims);
        return view('font-end.index',compact('viettels','vinas','mobis'));
    }

    public function detail_cate($id){
        $cate_name1 = CateSim::where('id',$id)->first();

        return view('font-end.detail-cate',compact('cate_name1'));
    }

    public function detail_catei(Request $request){

        if ($request->ajax()) {
            $data = DB::table('sim')
            ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
            ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
            ->orderBy('id','DESC')
            ->where([['id_cate_sim',$request->get('id')],['status',1]]);

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="'. route('font-end.detail',$data->id) .'" class="btn btn-warning text-white">
                <span>Mua sim</span></a>';
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('loaisim')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('loaisim');
                    $w->Where('name', 'LIKE', "%$search%");
                });
             }
             if ($request->has('dauso')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('dauso');
                    $w->Where('phone_number', 'LIKE', "$search%");
                });
             }
         })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('font-end.detail_catei');
    }

    public function detail_table_viettel(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('sim')
            ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
            ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
            ->where([['network_sim','viettel'],['status',1]]);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="'. route('font-end.detail',$data->id) .'" class="btn btn-warning text-white">
                <span>Mua sim</span></a>';
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('loaisim')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('loaisim');
                    $w->Where('name', 'LIKE', "%$search%");
                });
             }
             if ($request->has('dauso')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('dauso');
                    $w->Where('phone_number', 'LIKE', "%$search%");
                });
             }

         })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('font-end.detail-table-viettel');
    }
    public function detail_table_vina(Request $request){
        if ($request->ajax()) {
            $data = DB::table('sim')
            ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
            ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
            ->where([['network_sim','vina'],['status',1]]);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="'. route('font-end.detail',$data->id) .'" class="btn btn-warning text-white">
                <span>Mua sim</span></a>';
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('loaisim')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('loaisim');
                    $w->Where('name', 'LIKE', "%$search%");
                });
             }
             if ($request->has('dauso')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('dauso');
                    $w->Where('phone_number', 'LIKE', "%$search%");
                });
             }

         })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('font-end.detail-table-vina');
    }

    public function detail_table_mobi(Request $request){
        if ($request->ajax()) {
            $data = DB::table('sim')
            ->join('cate_sim','sim.id_cate_sim','cate_sim.id')
            ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
            ->where([['network_sim','mobi'],['status',1]]);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="'. route('font-end.detail',$data->id) .'" class="btn btn-warning text-white">
                <span>Mua sim</span></a>';
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('loaisim')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('loaisim');
                    $w->Where('name', 'LIKE', "%$search%");
                });
             }
             if ($request->has('dauso')) {
                 $instance->where(function($w) use($request){
                    $search = $request->get('dauso');
                    $w->Where('phone_number', 'LIKE', "%$search%");
                });
             }

            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('font-end.detail-table-mobi');
    }

    public function detail($id){
        // $sim= DB::table('sim')
        //         ->join('cate_sim','sim.id_cate_sim','=','cate_sim.id')
        //         ->where($id,'sim.id')
        //         ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')->first();
        $sim = Sim::find($id);
                // var_dum($sim);/
        return view('font-end.detail',compact('sim'));
    }

    public function contact(){

        return view('font-end.contact');
    }
    public function admin(){

        return view('admin.index');
    }
    
    public function login(){
        if(Auth::check()){
            return redirect()->route('admin.index');
        }
        return view('font-end.login');
    }

    public function postLogin(LoginRequest $request){

        $result = Auth::attempt([
            'email' => request()->get('email'),
            'password' =>request()->get('password',)
        ], request()->get('remember'));

        if ($result){
            return redirect()->route('admin.index');
        }
        request()->flashOnly(['email']);
        return view('font-end.login',[
            'message' =>__('auth.failed'),
        ]);
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('font-end.index');
    }
    
    //search
    public function search(Request $request){
        $data1= DB::table('sim')
        ->join('cate_sim', 'sim.id_cate_sim','cate_sim.id')
        ->select('sim.*','cate_sim.id as cate_id','cate_sim.name')
        ->where([
            ['status',1],
            ['phone_number','like','%______'.$request->search.'%'],
        ])->limit(800)->get();
        return $data1;
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
    }
}
