<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index(Request $req){
  $subcategory=SubCategory::join('categories', 'sub_categories.category_id','=','categories.id')
  ->select('sub_categories.*','categories.name as categories_name');

  if($req->get('keywords')){
     $subcategory=$subcategory->where('sub_categories.name','like','%'. $req->get('keywords').'%');
            $subcategory = $subcategory->orwhere('categories.name', 'like', '%' . $req->get('keywords') . '%');
  }
  $subcategory=$subcategory->latest('name')->paginate(10);

  return view('admin.SubCategory.list',compact('subcategory'));
    }
    public function create(){
        $category=Category::orderBy('name','ASC')->get();
        return view('admin.SubCategory.create', compact('category'));
    }
    public function store(Request $req){
 $validator=Validator::make($req->all(),
 [
                'category'=>'required',
                'name'=>'required',
                'slug' => 'required|unique:sub_categories',
 ]);
 if($validator->passes()){
if(Category::where('slug',strtolower(str_replace(' ','-',$req->slug)))->exists()){
    return redirect()->route('subcategory.create')->withErrors(['slug'=>'The slug has already taken'])->withInput();
}

SubCategory::create([
                'category_id'=>$req->category,
                'name'=>$req->name,
                'slug'=>$req->slug,
                'status' => $req->status,
                'showonHome'=>$req->showonHome,
]);

return redirect()->route('subcategory.index')->with('success','SubCategory Created Successfully');

 }else{
    return redirect()->route('subcategory.create')->withErrors($validator)->withInput();
 }


    }
    public function edit(string $id){
        $subcategory=SubCategory::find($id);
        if(empty($subcategory)){
            return redirect()->route('subcategory.index')->with('errors','Given Id did not Exist');
        }
        $category = Category::orderBy('name', 'ASC')->get();
        return view('admin.SubCategory.update',compact('subcategory'), compact('category'));
    }
    public function update(Request $req,string $id ){


        $subcategory = SubCategory::find($id);
        $validator = Validator::make(
            $req->all(),
            [
                'category' => 'required',
                'name' => 'required',
                'slug' => 'required|unique:sub_categories',
            ]
        );
        if ($validator->passes()) {
            if (Category::where('slug', strtolower(str_replace(' ', '-', $req->slug)))->exists()) {
                return redirect()->route('subcategory.update')->withErrors(['slug' => 'The slug has already taken'])->withInput();
            }

            $subcategory->update([
                'category_id' => $req->category,
                'name' => $req->name,
                'slug' => $req->slug,
                'status' => $req->status,
                'showonHome'=>$req->showonHome,
            ]);

            return redirect()->route('subcategory.index')->with('success', 'SubCategory Updated Successfully');
        } else {
            return redirect()->route('subcategory.edit',$id)->withErrors($validator)->withInput();
        }

    }
    public function  destroy(string $id){
$destroy=SubCategory::find($id);
if(!$destroy){
    return redirect()->route('subcategory.index')->with('undelete','SubCategroy Did not Deleted Successfully');
}
$destroy->delete();
return redirect()->route('subcategory.index')->with('successes','SubCategory deleted Successfully');
    }
}
