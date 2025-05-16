<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['product', 'subcategories'])->get();
        $fproduct = Product::with(['photos', 'category', 'vendor'])->where('featured', 1)->whereNotNull('discount_price')->inRandomOrder()->get();
        $showedCategories = Category::with(['product', 'subcategories'])->where('isShownHomePage', 1)->get();
        return view('home.home', compact('fproduct', 'categories','showedCategories'));
    }

    public function productPage($id)
    {
        $product = product::with('vendor', 'category', 'photos')->where('id', $id)->first();
        $name = implode(' ', array_slice(explode(' ', $product->name), 0, 4));
        $photos = [$product->thambnail];
        $photos = array_merge($photos, $product->photos?->pluck('src')?->toArray());
        $reviews = review::all();
        return view('home.product', compact('product', 'name', 'photos', 'reviews'));
    }

    public function wishlistPage(){
        return view('home.wishlist');
    }
}
