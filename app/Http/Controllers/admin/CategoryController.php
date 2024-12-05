<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\String_;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::latest();

        if(!empty($req->get('keyword'))){
            $categories=$categories->where('name','like','%'. $req->get('keyword') .'%');
        }

        // if(!empty($req->get('keyword'))){
        //     $categories=$categories->where('slug','like','%'. $req->get('keyword').'%');
        // }
        $categories = $categories->paginate(10);
        return view('admin.category.list', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'slug' => 'required',
            'image'=> 'required|image',
        ]);

        if ($validator->passes()) {
            if (Category::where('slug', strtolower(str_replace(' ', '-', $req->slug)))->exists()) {
                return redirect()->route('category.create')
                    ->withErrors(['slug' => 'The slug has already been taken.'])
                    ->withInput();
            }
            if($req->hasFile('image')){
                $image=$req->file('image');

                $ext=$image->getClientOriginalExtension();
                $orignalpath=time().'.'.$ext;
                $image->move(public_path(), $orignalpath);
            }
            $data=Category::create([
                'name' => $req->name,
                'slug' => strtolower(str_replace(' ', '-', $req->slug)),
                'status' => $req->status,
                'showonHome'=>$req->showonHome,
                'image'=>$orignalpath
            ]);
            return redirect()->route('category.index')->with('success','Your Category created Successfully');
        } else {
            return redirect()->route('category.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $category=Category::find($id);

        if(!$category){
            return redirect()->route('category.index');
        }
     return view('admin.category.update',compact('category'));
    }
    public function update(Request $req, string $id)
    {
        $category = Category::find($id);

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'slug' => 'required',
        ]);

        if ($validator->passes()) {
            if (Category::where('slug', strtolower(str_replace(' ', '-', $req->slug)))->exists()) {
                return redirect()->route('category.edit', $id)
                    ->withErrors(['slug' => 'The slug has already been taken.'])
                    ->withInput();
            }


            $orignalpath = $category->image;

            if ($req->hasFile('image')) {
                $image = $req->file('image');
                $ext = $image->getClientOriginalExtension();
                $orignalpath = time() . '.' . $ext; 
                $image->move(public_path(), $orignalpath);
            }

            if ($orignalpath && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }


            $category->update([
                'name' => $req->name,
                'slug' => strtolower(str_replace(' ', '-', $req->slug)),
                'status' => $req->status,
                'showonHome' => $req->showonHome,
                'image' => $orignalpath,
            ]);

            return redirect()->route('category.index')->with('success', 'Your Category updated Successfully');
        } else {
            return redirect()->route('category.edit', $id)->withErrors($validator)->withInput();
        }
    }

public function Destroy(String $id){
 $destory=Category::find($id);
  if($destory){
          $filepath=public_path($destory->image) ;
        //   dd($filepath);
   if($destory->image&& file_exists($filepath)){
                unlink(($filepath));
   }


          $destory->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
  }
        return redirect()->route('category.index')->with('error', 'Category not found');
}
    }


