<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $req)
    {
        $product = Product::find($req->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'product Not Found',
            ]);
        }
        if (Cart::count() > 0) {
//  echo "Product Already in Cart";
$cartContent=Cart::content();
$productAlreadyExist=false;


} else {
            echo "Cart is Empty Now Adding a product in cart";
            Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => !empty($product->image) ? $product->image : '']);
            $status= true;
            $message=$product->title. 'added in cart';

        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
    public function Cart()
    {

        return view('frontant.cart');
    }
}
