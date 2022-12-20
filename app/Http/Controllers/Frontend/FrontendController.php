<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular' ,'1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_category'));
    }
    public function category()
    {
        $category = Category::where('status','1')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else
        {
            return redirect('/')->with('status',"Slug Doesn't exists");
        }
        
    }
    public function productview($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $product = Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view',compact('product'));
            }
            else
            {
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else
        {
            return redirect('/')->with('status',"No such category found");
        }
        
    }
}
