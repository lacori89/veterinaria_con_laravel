<?php

namespace App\Http\Controllers;

use App\Models\Tipomascotum;
use Illuminate\Http\Request;

/**
 * Class TipomascotumController
 * @package App\Http\Controllers
 */
class TipomascotumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipomascota = Tipomascotum::paginate();

        return view('tipomascotum.index', compact('tipomascota'))
            ->with('i', (request()->input('page', 1) - 1) * $tipomascota->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipomascotum = new Tipomascotum();
        return view('tipomascotum.create', compact('tipomascotum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipomascotum::$rules);

        $tipomascotum = Tipomascotum::create($request->all());

        return redirect()->route('tipomascota.index')
            ->with('success', 'Tipomascotum created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipomascotum = Tipomascotum::find($id);

        return view('tipomascotum.show', compact('tipomascotum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipomascotum = Tipomascotum::find($id);

        return view('tipomascotum.edit', compact('tipomascotum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipomascotum $tipomascotum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipomascotum $tipomascotum)
    {
        request()->validate(Tipomascotum::$rules);

        $tipomascotum->update($request->all());

        return redirect()->route('tipomascota.index')
            ->with('success', 'Tipomascotum updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipomascotum = Tipomascotum::find($id)->delete();

        return redirect()->route('tipomascota.index')
            ->with('success', 'Tipomascotum deleted successfully');
    }
}
