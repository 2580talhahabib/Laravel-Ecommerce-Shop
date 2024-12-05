<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index(){
    $Featuredproduct=Product::where('status',1)->where('is_featured',1)->take(8)->get();
    $latestproduct=Product::where('status',1)->orderBy('id','DESC')->take(8)->get();
   return view('frontant.home',compact('Featuredproduct','latestproduct'));
   }
}
