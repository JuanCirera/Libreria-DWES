@extends('layouts.plantilla')
@section('titulo')
    Nuevo libro
@endsection
@section('cabecera')
    Nuevo libro
@endsection
@section('contenido')
<div class="w-full max-w-md mx-auto">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('libros.store')}}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                Titulo
            </label>
            <input name="titulo" value="{{old('titulo')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" type="text">
            @error('titulo')
                <p class="mt-2 text-red-800">
                    *{{$message}}    
                </p> 
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="autor">
                Autor
            </label>
            <select name="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="resumen">
                @foreach ($autores as $autor)
                    <option value="{{$autor->id}}">{{$autor->name}}</option>
                @endforeach
            </select>
            @error('autor')
                <p class="mt-2 text-red-800">
                    *{{$message}}    
                </p> 
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="pvp">
                PVP
            </label>
            <input name="pvp" value="{{old('pvp')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pvp" type="number" step="0.01" min="1" max="99999">
            @error('pvp')
                <p class="mt-2 text-red-800">
                    *{{$message}}    
                </p> 
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                Stock
            </label>
            <input name="stock" value="{{old('stock')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stock" type="number">
            @error('stock')
                <p class="mt-2 text-red-800">
                    *{{$message}}    
                </p> 
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="resumen">
                Resumen
            </label>
            <textarea name="resumen" value="{{old('resumen')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="resumen"></textarea>
            @error('resumen')
                <p class="mt-2 text-red-800">
                    *{{$message}}    
                </p> 
            @enderror
        </div>
        <div class="flex-row justify-around">
            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{route('libros.index')}}">
                <i class="fas fa-backward"></i> Volver
            </a>
            &nbsp;
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
</div>
@endsection
