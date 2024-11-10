<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
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
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'sku' => 'required',
            'track_qty' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'is_featured' => 'required',
        ];

        $validator = Validator::make($req->all(), $rules);

    
        if ($validator->fails()) {
            return redirect()->route('Product.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Validation passed, proceed with storing the product data
        // Your saving logic here
    }

}
