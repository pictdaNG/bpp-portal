<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Advert\AdvertContract;

use Auth;

class MDAController extends Controller{
    protected $advert_contract;

    public function __construct(AdvertContract $advertContract){
        $this->middleware('auth');
        $this->advert_contract = $advertContract;

    }

    public function mda(Request $request){
        return view('admin/manageMDA');
    }

    public function createAdvert(Request $request){
        $adverts = $this->advert_contract->listAdvertsByUserId();
        return view('mda/createAdvert', ['adverts' => $adverts]);
    }

    public function bidRequirements(Request $request, $advertId){
        return view('mda/bidRequirements');
    }
}
