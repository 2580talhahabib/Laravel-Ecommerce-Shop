<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(){
        return view('admin.product.list');
    }
    public function create(){
        $category=Category::latest('name')->get();
        $subcategory=SubCategory::latest('name')->get();
        $Brand=Brand::latest('name')->get();
        return view('admin.product.create',compact('category', 'Brand', 'subcategory'));
    }
    public function store(Request $req)
    {
        // Define base rules
        $rules = [
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric',
            'sku' => 'required',
            'track_qty' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'is_featured' => 'required',
        ];

        $validator = Validator::make($req->all(), $rules);

    
        if ($validator->passes()) {
        //     $create=Product::create([
        //    'title' => $req->title,
        //     'description' => $req->description,
        //     // 'image' => 'optional|image',
        //     'price' =>$req->price,
        //     'sku' => $req->sku,
        //     'track_qty' => $req->track_qty,
        //     'category_id' => $req->category,
        //     'sub_category_id' => $req->sub_category,
        //     'is_featured' => $req->is_featured,
        //     ]);
        //     return redirect()->route('Product.index');
           
        }else{
       return response()->json([
        'status'=>false,
        'errors'=>$validator->errors(),
       ]);
        }

        // Validation passed, proceed with storing the product data
        // Your saving logic here
    }

}
