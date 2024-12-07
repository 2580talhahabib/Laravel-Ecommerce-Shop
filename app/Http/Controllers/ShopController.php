<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $req, $categoryslug = null, $subcategoryslug = null)
    {
        $categoryselected="";
        $subcategoryselected="";
        $brandArray=[];
        if(!empty($req->get('brand'))){
            $brandArray=explode(',',$req->get('brand'));
        }

        $categories = Category::orderBy('name', 'ASC')
            ->with('subcategory')
            ->where('status', 1)
            ->get();

        $Brand = Brand::orderBy('name', 'ASC')
            ->where('status', 1)
            ->get();

        $products = Product::where('status', 1);

        // Apply filters here
        if (!empty($categoryslug)) {
            $category = Category::where('slug', $categoryslug)->first();
            $products = $products->where('category_id', $category->id);
            $categoryselected=$category->id;
        }
        if (!empty($subcategoryslug)) {
            $subcategory = SubCategory::where('slug', $subcategoryslug)->first();
            $products = $products->where('sub_category_id', $subcategory ->id);
            $subcategoryselected=$subcategory->id;

        }
          if (!empty($brandArray)) {
            $brandArray=explode(',',$req->get('brand'));
            $products = $products->whereIn('brand_id', $brandArray);
        }
        $min=$req->get('min_price');
        $max=$req->get('max_price');

        if($min != '' && $max != ''){
            if($max == 1000){
                $products=$products->whereBetween('price',[intval($min),1000]);
            }else{
                $products=$products->whereBetween('price',[intval($min),intval($max)]);

            }
        }
               $sort=$req->get('sort');
        if($sort != '') {
            if($sort == 'price_latest') {
                $products = $products->latest('id');
            } elseif($sort== 'price_high') {
                $products = $products->orderBy('price', 'DESC');
            } elseif($sort== 'price_low') {
                $products = $products->orderBy('price', 'ASC');
            }
        } else {
            $products = $products->orderBy('id', 'DESC');
        }



        $products = $products->orderBy('id', 'DESC')->paginate(2);


        return view('frontant.shop', compact(['categories', 'Brand', 'products','categoryselected','subcategoryselected','brandArray','min','max'], 'sort'));

    }
}

