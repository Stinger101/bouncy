<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Delivery;
use Auth;

class FarmerDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (! Gate::allows('farmer_manage')) {
            return abort(401);
        }
        $deliveries=Delivery::where('user_id',Auth::id())->get();
        return view('admin.delivery.index',compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
