<?php

namespace App\Http\Controllers;

use App\Models\ProductRate;
use Illuminate\Http\Request;

/**
 * Class ProductRateController
 * @package App\Http\Controllers
 */
class ProductRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productRates = ProductRate::paginate();

        return view('admin.product_rates.index', compact('productRates'))
            ->with('i', (request()->input('page', 1) - 1) * $productRates->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productRate = new ProductRate();
        return view('admin.product_rates.create', compact('productRate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductRate::$rules);

        $productRate = ProductRate::create($request->all());

        return redirect()->route('product_rates.index')
            ->with('success', 'ProductRate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productRate = ProductRate::find($id);

        return view('admin.product_rates.show', compact('productRate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productRate = ProductRate::find($id);

        return view('admin.product_rates.edit', compact('productRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductRate $productRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRate $productRate)
    {
        request()->validate(ProductRate::$rules);

        $productRate->update($request->all());

        return redirect()->route('product_rates.index')
            ->with('success', 'ProductRate updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productRate = ProductRate::find($id)->delete();

        return redirect()->route('product_rates.index')
            ->with('success', 'ProductRate deleted successfully');
    }
}
