@extends('layout')
@section('title', 'Libros')
@section('page', 'Libros')
@section('content')
    <div class="p-5">
        <h2 class="mb-3">Libros</h2>
        <form action="" class="mb-5 d-flex">
            <input class="form-control mr-3" id="txtSearch" placeholder="Type to search...">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr>
                            <th scope="row">{{ $libro->id }}</th>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td class="d-flex  align-items-center text-white">
                                <a class="btn btn-primary btn-sm mr-2 h-50">
                                    <i class="fa fa-edit"></i>
                                    Edit</a>
                                <a class="btn btn-danger btn-sm h-50">
                                    <i class="fa fa-trash"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
