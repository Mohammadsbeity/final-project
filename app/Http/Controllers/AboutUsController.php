<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

/**
 * Class AboutUController
 * @package App\Http\Controllers
 */
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::paginate();

        return view('admin.about_us.index', compact('aboutUs'))
            ->with('i', (request()->input('page', 1) - 1) * $aboutUs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutU = new AboutUs();
        return view('admin.about_us.create', compact('aboutU'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AboutUs::$rules);

        $aboutU = AboutUs::create($request->all());

        if ($request->hasFile('image')) {
            $filename = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image'), $filename);

            AboutUs::where('id', $aboutU->id)->update(
                [
                    'image' => $filename
                ]);
        }

        return redirect()->route('about_us.index')
            ->with('success', 'AboutU created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutU = AboutUs::find($id);

        return view('admin.about_us.show', compact('aboutU'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutU = AboutUs::find($id);

        return view('admin.about_us.edit', compact('aboutU'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AboutU $aboutU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        request()->validate(AboutUs::$rules);

        $aboutUs->update($request->all());

        if ($request->hasFile('image')) {
            $filename = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image'), $filename);

            AboutUs::where('id', $aboutUs->id)->update(
                [
                    'image' => $filename
                ]);
        }

        return redirect()->route('about_us.index')
            ->with('success', 'AboutU updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aboutU = AboutUs::find($id)->delete();

        return redirect()->route('about_us.index')
            ->with('success', 'AboutU deleted successfully');
    }
}
