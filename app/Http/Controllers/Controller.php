<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Sim;
use App\Models\CateSim;
use App\Models\CustomerSim;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
	{
		$countvt = Sim::where([['network_sim','viettel'],['status',1]])->count('id');
        $cateSims = CateSim::all();
        $cuss  = CustomerSim::limit(10)->orderBy('id','desc')->get();

        view()->share(["countvt"=>$countvt,'cateSims'=>$cateSims,'cuss'=>$cuss]);
	}
}
