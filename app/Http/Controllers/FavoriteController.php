<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

/**
 * Class FavoriteController
 * @package App\Http\Controllers
 */
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::paginate();

        return view('admin.favorites.index', compact('favorites'))
            ->with('i', (request()->input('page', 1) - 1) * $favorites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $favorite = new Favorite();
        return view('admin.favorites.create', compact('favorite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Favorite::$rules);

        $favorite = Favorite::create($request->all());

        return redirect()->route('favorites.index')
            ->with('success', 'Favorite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite = Favorite::find($id);

        return view('admin.favorites.show', compact('favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favorite = Favorite::find($id);

        return view('admin.favorites.edit', compact('favorite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        request()->validate(Favorite::$rules);

        $favorite->update($request->all());

        return redirect()->route('favorites.index')
            ->with('success', 'Favorite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id)->delete();

        return redirect()->route('favorites.index')
            ->with('success', 'Favorite deleted successfully');
    }
}
