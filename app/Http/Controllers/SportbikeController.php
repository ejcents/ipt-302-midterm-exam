<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sportbike;

class SportbikeController extends Controller
{
    public function index()
    {
        $sportbikes = Sportbike::all();
        return view('pages.records', compact('sportbikes'));
    }

    public function create()
    {
        return view('pages.createSportbike');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
            'engine' => 'required',
            'color' => 'required',
        ]);

        Sportbike::create($request->all());

        return redirect()->route('records')->with('success', 'Sportbike added successfully!');
    }

    public function edit($id)
{
    $sportbike = Sportbike::findOrFail($id);
    return view('pages.editSportbike', compact('sportbike'));
}

public function update(Request $request, $id)
{
    $sportbike = Sportbike::findOrFail($id);
    $sportbike->update($request->all());

    return redirect()->route('records')->with('success', 'Sportbike updated successfully!');
}


    public function destroy(Sportbike $sportbike)
    {
        $sportbike->delete();
        return redirect()->route('records')->with('success', 'Sportbike deleted successfully!');
    }
}
