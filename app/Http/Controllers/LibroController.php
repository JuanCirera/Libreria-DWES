<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libro::with('user')->orderBy('id','desc')->paginate(10);
        // $users=User::orderBy('id')->pluck("name"); /Quito esta linea para usar carga ansiosa
        return view('libros.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores=User::all();
        return view('libros.create',compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ids=[];

        foreach(User::all() as $autor){
            array_push($ids,$autor->id);
        }

        $request->validate([
            "titulo"=>['required','string','min:2','unique:libros,titulo'],
            "user_id"=>['required','in:'.implode(",",$ids)],
            "pvp"=>['required','numeric','min:1','max:99999'],
            "stock"=>['required','integer','min:1'],
            "resumen"=>['required','min:5','string']
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('mensaje','Libro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.detalle',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $autores=User::all();
        return view('libros.edit',compact('libro','autores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $ids=[];

        foreach(User::all() as $autor){
            array_push($ids,$autor->id);
        }

        $request->validate([
            // Añadiendo el id del libro nos aseguramos que se pueda actualizar el obejto sin tener que cambiar el titulo
            //Si se deja solo el campo titulo comprueba que es igual y devuelve error
            "titulo"=>['required','string','min:2','unique:libros,titulo,'.$libro->id],
            "user_id"=>['required','in:'.implode(",",$ids)],
            "pvp"=>['required','numeric','min:1','max:99999'],
            "stock"=>['required','integer','min:1'],
            "resumen"=>['required','min:5','string']
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('mensaje','Libro actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('mensaje','Libro eliminado');
    }
}
