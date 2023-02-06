<?php

namespace App\Http\Controllers;

use App\Models\Citum;
use App\Models\Mascotum;
use Illuminate\Http\Request;

/**
 * Class CitumController
 * @package App\Http\Controllers
 */
class CitumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cita = Citum::paginate();

        return view('citum.index', compact('cita'))
            ->with('i', (request()->input('page', 1) - 1) * $cita->perPage());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citum = new Citum();
        $mascota = Mascotum::pluck('identificacion','id');
        return view('citum.create', compact('citum', 'mascota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Citum::$rules);

        $citum = Citum::create($request->all());

        return redirect()->route('cita.index')
            ->with('success', 'Citum created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citum = Citum::find($id);

        return view('citum.show', compact('citum'));
    }
    
    public function calendarioDeFecha($fecha)
    {
        $fecha_inicio=$fecha." 00:00:00";
        $fecha_fin=$fecha." 23:59:59";
        $citum = Citum::whereBetween('fecha', [$fecha_inicio, $fecha_fin])->get();

        return response()->json($citum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citum = Citum::find($id);
        $mascota = Mascotum::pluck('identificacion','id');
        return view('citum.edit', compact('citum', 'mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Citum $citum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citum $citum)
    {
        request()->validate(Citum::$rules);

        $citum->update($request->all());

        return redirect()->route('cita.index')
            ->with('success', 'Citum updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $citum = Citum::find($id)->delete();

        return redirect()->route('cita.index')
            ->with('success', 'Citum deleted successfully');
    }
}
