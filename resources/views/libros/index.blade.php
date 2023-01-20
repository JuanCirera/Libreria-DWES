@extends('layouts.plantilla')
@section('titulo')
    Libros
@endsection
@section('cabecera')
    Lista de libros
@endsection
@section('contenido')

<a href="{{route('libros.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    <i class="fas fa-add"></i> Nuevo
</a>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Info
                </th>
                <th scope="col" class="px-6 py-3">
                    Titulo
                </th>
                <th scope="col" class="px-6 py-3">
                    Autor
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route('libros.show',$libro)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-info"></i>
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{$libro->titulo}}
                    </td>
                    <td class="px-6 py-4">
                        {{$libro->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$libro->pvp}}€
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('libros.destroy',$libro)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('libros.edit',$libro)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                            &nbsp;
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-trash"></i> 
                            </button>
                        </form>                
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4 mb-4">
    {{$libros->links()}}
    {{-- Paginacion --}}
</div>

@endsection
@section('js')
    @if (session('mensaje'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{session('mensaje')}}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection

{{-- Juan Fco Cirera --}}

{{-- Todo es hecho desde cero, no se ha copiado nada --}}