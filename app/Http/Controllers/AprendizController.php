<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index()
{
    $aprendices = Aprendiz::paginate(10); // Muestra 10 aprendices por página
    return view('aprendices.index', compact('aprendices'));
}

    public function create()
    {
        return view('aprendices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'documento' => 'required',
            'email' => 'required|email',
        ]);

        Aprendiz::create($request->all());

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz agregado con éxito');
    }
}
