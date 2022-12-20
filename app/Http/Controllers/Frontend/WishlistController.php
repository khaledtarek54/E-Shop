<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('frontend.wishlist', compact('wishlist'));
    }
    public function add(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('product_id');
            $prod_check = Product::where('id', $prod_id)->first();
            if ($prod_check) {
                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "  Already Added to cart"]);
                } else {
                    if (Product::find($prod_id)) {
                        $wish = new Wishlist();
                        $wish->prod_id = $prod_id;
                        $wish->user_id = Auth::id();
                        $wish->save();
                        return response()->json(['status' =>  "Product Added to Wishlist"]);
                    } else {
                        return response()->json(['status' => "Product is not Exist"]);
                    }
                }
            } else {
                return response()->json(['status' => "Login to Continue"]);
            }
        }
    }

    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "  Already Added to cart"]);
                } else {
                    $cartitem = new Cart();
                    $cartitem->prod_id = $product_id;
                    $cartitem->user_id = Auth::id();
                    $cartitem->prod_qty = $product_qty;
                    $cartitem->save();


                    $wishlist = Wishlist::where('prod_id', $product_id)->first();
                    $wishlist->delete();
                    return response()->json(['status' => $prod_check->name . "  Added to cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function destroy(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $wishlist = Wishlist::where('prod_id', $product_id)->first();
            $wishlist->delete();
            return response()->json(['status' => " Removed Successfuly From Wishlist"]);
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistcount]);
    }
}
