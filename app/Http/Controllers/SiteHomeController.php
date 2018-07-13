<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;

class SiteHomeController extends Controller
{
    //
    public function index(){
      $carousels=Carousel::all();
      return view('site.home',compact('carousels'));
    }
}
