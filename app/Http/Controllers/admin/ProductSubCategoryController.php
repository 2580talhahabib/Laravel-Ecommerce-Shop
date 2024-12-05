<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ProductSubCategoryController extends Controller
{
  public function index(Request $req){
   if(!empty($req->categories )){
      
        $subcategories=SubCategory::where('category_id',$req->categories )->latest('name')->get();
      
        return response()->json([
            'status'=>true,
            'subCategories'=>$subcategories,
        ]);
    }else{
        return response()->json([
            'status'=>false,
            'SubCategories'=>[],
        ]);

    }
  }
}
