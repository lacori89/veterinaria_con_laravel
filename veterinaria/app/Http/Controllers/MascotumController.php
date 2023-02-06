<?php

namespace App\Http\Controllers;

use App\Models\Mascotum;
use App\Models\Cliente;
use App\Models\Tipomascotum;
use Illuminate\Http\Request;

/**
 * Class MascotumController
 * @package App\Http\Controllers
 */
class MascotumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascota = Mascotum::paginate();

        return view('mascotum.index', compact('mascota'))
            ->with('i', (request()->input('page', 1) - 1) * $mascota->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascotum = new Mascotum();
        $cliente = Cliente::pluck('nombres', 'id');
        $tipo = Tipomascotum::pluck('nombre', 'id');
        return view('mascotum.create', compact('mascotum','cliente', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mascotum::$rules);

        $mascotum = Mascotum::create($request->all());

        return redirect()->route('mascota.index')
            ->with('success', 'Mascotum created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascotum = Mascotum::find($id);

        return view('mascotum.show', compact('mascotum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascotum = Mascotum::find($id);
        $cliente = Cliente::pluck('nombres', 'id');
        $tipo = Tipomascotum::pluck('nombre', 'id');
        return view('mascotum.edit', compact('mascotum', 'cliente', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mascotum $mascotum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascotum $mascotum)
    {
        request()->validate(Mascotum::$rules);

        $mascotum->update($request->all());

        return redirect()->route('mascota.index')
            ->with('success', 'Mascotum updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mascotum = Mascotum::find($id)->delete();

        return redirect()->route('mascota.index')
            ->with('success', 'Mascotum deleted successfully');
    }
}
