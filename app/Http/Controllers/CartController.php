<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

// public function addToCart(Request $req){
//     $product=Product::find($req->id);

//     if($product == null){
//         return response()->json([
//             'status'=>false,
//             'message'=>'product not found'
//         ]);
//     }

//         if(Cart::count() > 0){
//              echo "Product Already added in  cart ";
//              $cartContent=Cart::content();
//              $productAlreadyExist=false;
//              foreach ($cartContent as $item) {
//                  if($item->id == $product->id){
//                 $productAlreadyExist=true;
//                  }
//              }
//              if($productAlreadyExist == false){
//                 Cart::add($product->id, $product->title, 1, $product->price,['productImage'=>!empty($product->image) ? $product->image : '']);
//                 $status=true;
//                 $message= $product->title ."  added in cart";
//              }else{
//                 $status=false;
//                 $message= $product->title ." Already added in cart";
//              }
//         }else{
//             echo "cart is empty now adding a product in the cart";
//             Cart::add($product->id, $product->title, 1, $product->price,['productImage'=>!empty($product->image) ? $product->image : '']);
//             $status=true;
//             $message= $product->title ." added in cart";
//         }
//         return response()->json([
//             'status'=>$status,
//             'message'=>$message,
//         ]);
// }
    public function addToCart(Request $req){
        $product=Product::find($req->id);
 if($product == null){
    return response()->json([
        'status'=>false,
        'message'=>'product not found'
    ]);
}

    if(Cart::count() > 0){
        $cartContent=Cart::content();
        $productAlreadyExist=false;
     foreach ($cartContent as $item) {
         if($product->id == $item->id){
            $productAlreadyExist=true;
         }

     }
     if($productAlreadyExist == false){
        Cart::add($product->id,$product->title, $product->qty , $product->price,[ 'ProductImage' => !empty($product->image) ? $product->image : '']);
        $status=true;
        $message=$product->title .'Added in Cart';
     }else{
        $status=false;
        $message=$product->title .'Already Added in Cart';
     }

    }else{
        Cart::add($product->id,$product->title, $product->qty, $product->price,[ 'ProductImage' => !empty($product->image) ? $product->image : '']);


        $status=true;
        $message=$product->title .'Added in Cart';
    }
    return response()->json([
        'status'=>$status,
        'message'=>$message,
    ]);



    }
    public function Cart()
    {
    // dd(Cart::content());
    $cartContent=Cart::content();
        return view('frontant.cart',compact('cartContent'));
    }
}
