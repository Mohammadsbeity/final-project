<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSold;
use Illuminate\Http\Request;

/**
 * Class ProductSoldController
 * @package App\Http\Controllers
 */
class ProductSoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSolds = ProductSold::paginate();

        return view('admin.product_solds.index', compact('productSolds'))
            ->with('i', (request()->input('page', 1) - 1) * $productSolds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productSold = new ProductSold();
        $products = Product::pluck('product_name', 'id');

        return view('admin.product_solds.create', compact('productSold', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductSold::$rules);

        $productSold = ProductSold::create($request->all());

        return redirect()->route('product_solds.index')
            ->with('success', 'ProductSold created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productSold = ProductSold::find($id);

        return view('admin.product_solds.show', compact('productSold'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSold = ProductSold::find($id);

        return view('admin.product_solds.edit', compact('productSold'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductSold $productSold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSold $productSold)
    {
        request()->validate(ProductSold::$rules);

        $productSold->update($request->all());

        return redirect()->route('product_solds.index')
            ->with('success', 'ProductSold updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productSold = ProductSold::find($id)->delete();

        return redirect()->route('product_solds.index')
            ->with('success', 'ProductSold deleted successfully');
    }
}
