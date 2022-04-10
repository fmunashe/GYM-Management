<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::query()->latest()->paginate(10);
        return view('adverts.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $advert = new Advert();

        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $name = Carbon::now() . "-" . $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/adverts');
            $image->move($destinationPath, $name);
            $advert->image_name = $name;
        }
        $advert->title = $request->get('title');
        $advert->description = $request->get('description');

        $advert->save();
        Alert::success('Banner Upload', 'Banner Successfully uploaded');
        return redirect()->route('adverts');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        $advert->update([
            'publish' => $request->input('publish')
        ]);
        Alert::success('Advert', 'Advert Successfully updated');
        return redirect()->route('adverts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        $file_path = public_path('/uploads/adverts/' . $advert->image_name);
        if (File::exists($file_path)) {
            unlink($file_path);
        }
        $advert->delete();
        Alert::success('Advert', 'Advert Successfully removed from the system');
        return redirect()->route('adverts');
    }
}
