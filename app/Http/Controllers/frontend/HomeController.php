<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\review;
use App\Models\User;
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
        $vendors = User::with('products')
        ->whereHas('roles', fn ($q) => $q->where('name', 'vendor'))
        ->withCount('products') // يحسب عدد المنتجات لكل مستخدم
        ->orderBy('products_count', 'desc') // أو asc للترتيب تصاعديًا
        ->get()->take(4);
        return view('home.home', compact('fproduct', 'categories','showedCategories', 'vendors'));
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

    public function vendorList(){
        return view('home.vendor.vendor-list');
    }

    public function vendorDetails($id){
        return view('home.vendor.vendor-details', ['id' => $id]);
    }
}
