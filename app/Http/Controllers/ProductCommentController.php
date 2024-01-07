<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;

/**
 * Class ProductCommentController
 * @package App\Http\Controllers
 */
class ProductCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productComments = ProductComment::paginate();

        return view('admin.product_comments.index', compact('productComments'))
            ->with('i', (request()->input('page', 1) - 1) * $productComments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productComment = new ProductComment();
        $products = Product::pluck('product_name', 'id');

        return view('admin.product_comments.create', compact('productComment', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductComment::$rules);

        $productComment = ProductComment::create($request->all());

        return redirect()->route('product_comments.index')
            ->with('success', 'ProductComment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productComment = ProductComment::find($id);

        return view('admin.product_comments.show', compact('productComment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productComment = ProductComment::find($id);

        return view('admin.product_comments.edit', compact('productComment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductComment $productComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductComment $productComment)
    {
        request()->validate(ProductComment::$rules);

        $productComment->update($request->all());

        return redirect()->route('product_comments.index')
            ->with('success', 'ProductComment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productComment = ProductComment::find($id)->delete();

        return redirect()->route('product_comments.index')
            ->with('success', 'ProductComment deleted successfully');
    }
}
