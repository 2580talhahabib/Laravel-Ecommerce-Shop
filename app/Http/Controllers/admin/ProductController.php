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

    public function index(Request $req){
        $product=Product::latest('id');
        if(!empty($req->get('search'))){
           $product= $product->where('title','like','%'.$req->get('search') .'%');
        }

      $product=$product->paginate(10);
        return view('admin.product.list',compact('product'));
    }
    public function create(){
        $category=Category::latest('name')->get();

        $Brand=Brand::latest('name')->get();
        return view('admin.product.create',compact('category', 'Brand'));
    }
    public function store(Request $req)
    {
        // Define base rules
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'qty' => 'required',
            'category' => 'required',
            // 'sub_category' => 'required',
            'is_featured' => 'required',
            // 'image'=>'required',
        ];
$imageName=null;
    // Handle file upload for image
    if ($req->hasFile('image')) {
        $image = $req->file('image');
        $ext=$image->getClientOriginalExtension();
        $imageName =  time() . '.' . $ext;
        $image->move(public_path('/storage/product/'),$imageName);

    }



        $validator = Validator::make($req->all(), $rules);
        if ($validator->passes()) {

            $slug = str_replace(' ', '-', $req->slug);
            $create=Product::create([
           'title' => $req->title,
           'slug' => $slug,
            'description' => $req->description,
            'image'=>$imageName,
            'price' =>$req->price,
            'compare_price' => $req->compare_price,
            'sku' => $req->sku,
            'barcode' => $req->barcode,
            'qty' => $req->qty,
            'status' => $req->status,
            'category_id' => $req->category,
            'sub_category_id' => $req->sub_category,
            'brand_id' => $req->brand,
            'is_featured' => $req->is_featured ,
            ]);

            // return redirect()->route('Product.index')->with('success','Product Added Successfully');
            return response()->json([
                'status'=>true,
                'message'=>'Product Added Successfully'
            ]);


        }else{
       return response()->json([
        'status'=>false,
        'errors'=>$validator->errors(),
        'message'=>"some fields has some error"
       ]);



        }

        // Validation passed, proceed with storing the product data
        // Your saving logic here
    }

    public function edit( string $id){
 $edit=Product::where('id',$id)->first();
 $category=Category::latest('name')->get();
 $subcategory=SubCategory::where('category_id',$edit->category_id)->get();

 $Brand=Brand::latest('name')->get();
 return view('admin.product.update',compact('category', 'Brand','edit','subcategory'));

    }

    public function update( Request $req,string $id){
        $update=Product::find($id);
        $validator=validator::make($req->all(),[
            'title' => 'required',
           'slug' => 'required',
            'price' => 'required|unique:products',
            'sku' => 'required|unique:products',
            'qty' => 'required',
            'category' => 'required',
            'is_featured' => 'required',
        ]);

        if($validator->passes()){
            $imageName=$req->image;

            // Handle file upload for image
            if ($req->hasFile('image')) {
                $image = $req->file('image');
                $ext=$image->getClientOriginalExtension();
                $imageName =  time() . '.' . $ext;
                $image->move(public_path('/storage/product/'),$imageName);

            }
                if ($validator->passes()) {
                   $update->update([
                   'title' => $req->title,
                   'slug' => $req->slug,
                    'description' => $req->description,
                    'image'=>$imageName,
                    'price' =>$req->price,
                    'compare_price' => $req->compare_price,
                    'sku' => $req->sku,
                    'barcode' => $req->barcode,
                    'qty' => $req->qty,
                    'status' => $req->status,
                    'category_id' => $req->category,
                    'sub_category_id' => $req->sub_category,
                    'brand_id' => $req->brand,
                    'is_featured' => $req->is_featured ,
                    ]);

            return response()->json([
                'status'=>true,
                'message'=>'Product Updated Successfully'
            ]);
        }
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),
            ]);
    }

}
public function delete(string  $id){
$delete=Product::find($id);
if($delete){
    $filepath = public_path('storage/product/' . $delete->image);
    // dd($filepath);

    if($delete->image && file_exists($filepath)){
        unlink($filepath);
    }
    $delete->delete();
    return redirect()->route('Product.index')->with('success', 'Product deleted successfully');
}
return redirect()->route('Product.index')->with('error', 'product not found');

}

}
