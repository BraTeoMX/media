<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Subcategoria;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::where('estatus', 'A') // Filtra las categorías con estatus 'A'
        ->with(['subcategorias' => function ($query) {
            $query->where('estatus', 'A'); // Filtra las subcategorías con estatus 'A'
        }, 'subcategorias.videos' => function ($query) {
            $query->where('estatus', 'A'); // Filtra los videos con estatus 'A'
        }])->get();


        return view('inicio', compact('categorias'));
    }
}
