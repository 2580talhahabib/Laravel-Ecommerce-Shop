<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BrandController extends Controller
{
    public function index(){
$Brand=Brand::latest()->paginate(10);

        return view('admin.Brand.list',compact('Brand'));

    }
    public function create(){
return view('admin.Brand.create');
    }
    public function store(Request $req){
  $validator=Validator::make($req->all(),[
    'name'=>'required',
    'slug' => 'required',
  ]);
  if($validator->passes()){
    
    if(Brand::where('slug',strtolower(str_replace(' ','-',$req->slug)))->exists()){
        return redirect()->route('Brand.create')->withErrors(['slug' => 'The Brand Slug has already been Taken']);
    }
 Brand::create([
    'name'=>$req->name,
    'slug'=> strtolower(str_replace(' ', '-', $req->slug)),
    'status' => $req->status,
 ]);
 return redirect()->route('Brand.index')->with('success','Your Brand Name Created Successfully');
    }else{
        return redirect()->route('Brand.create')->withErrors($validator)->withInput();
    }
  }

public function edit(string $id){
    $Brand=Brand::find($id);
    if(!$Brand){
      return redirect()->route('Brand.index')->with('danger','Brand did not exist');
    }
 return view('admin.Brand.update',compact('Brand'));
}
public function update(Request $req, string $id){
$Brand=Brand::find($id);

  $validator= Validator::make($req->all(),
  [
    'name'=>'required',
    'slug' => 'required',
  ]);

  if($validator->passes()){

    if(Brand::where('slug',strtolower(str_replace(' ','-',$req->slug)))->exists()){
 return redirect()->route('Brand.create')->withErrors(['slug'=>'The slug is already been taken.please chose different one']);
    }

      $Brand->update([
        'name'=>$req->name,
        'slug' => strtolower(str_replace(' ', '-', $req->slug)),
      ]);

    return redirect()->route('Brand.index')->with('update','Brand Successfully Updated');

  }else{
 return redirect()->route('Brand.edit')->withErrors($validator)->withInput();
  }
}
public function destroy(string $id){
    $destroy=Brand::find($id);
    $destroy->delete();
    return redirect()->route('Brand.index')->with('Delete','Brand Deleted Successfully');
}
    }

