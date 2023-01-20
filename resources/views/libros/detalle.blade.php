@extends('layouts.plantilla')
@section('titulo')
    Detalles
@endsection
@section('cabecera')
    Detalles
@endsection
@section('contenido')
    <div class="max-w-sm mx-auto rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <h2 class="font-bold text-xl mb-2">
                {{$libro->titulo}}
            </h2>
            <p class="text-gray-700 text-base">
                {{-- Esta llamada a la clase user la puedo hacer gracias a las funciones de relacion --}}
                <b>Autor/a:</b> {{$libro->user->name}}
            </p>
            <p class="text-gray-700 text-base">
                <b>PVP:</b> {{$libro->pvp}}€
            </p>
            <p class="text-gray-700 text-base">
                <b>Stock:</b> {{$libro->stock}}
            </p>
            <p class="text-gray-700 text-base">
                <b>Resumen:</b> <br>
                {{ $libro->resumen }}
            </p>
            <div class="mt-5">
                <a href="{{route('libros.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" >
                    <i class="fas fa-backward"></i> Volver
                </a>
            </div>
            
        </div>
    </div>
@endsection
