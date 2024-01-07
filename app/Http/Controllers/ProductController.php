<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function view()
    {
        $products = Product::paginate();

        return view('shop', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function category($id)
    {
        $products = Product::with(['product_comments', 'product_images', 'product_rates'])->where('category_id', $id)->get();

        return view('shop-category', compact('products'));
    }

    public function favorites()
    {
        $products = Favorite::paginate();

        return view('favorites', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function detail($id)
    {
        $products = Product::with(['product_comments', 'product_images', 'product_rates'])->find($id);

        return view('detail', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('category_name', 'id');
        return view('admin.products.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('category_name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
