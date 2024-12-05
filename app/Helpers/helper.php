<?php

use App\Models\Category;

function getCategories(){
    return Category::orderBy('name','ASC')->with('subcategory')->where('showonHome','1')->where('status',1)->get();
}



