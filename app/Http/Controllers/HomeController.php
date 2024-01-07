<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomePage;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::get();
        $products = Product::orderBy('created_at', 'DESC')->take(8)->get();
        $slides = HomePage::get();

        return view('home', compact('categories', 'products', 'slides'));
    }
}
