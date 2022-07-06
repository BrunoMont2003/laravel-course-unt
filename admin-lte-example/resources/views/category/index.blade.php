@extends('layout.main')
@section('title', 'Categories')
@section('content')
    <div class="p-5">
        <form action="" class="mb-5 d-flex">
            <input class="form-control mr-3" id="txtSearch" placeholder="Type to search...">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm mr-2">
                                    <i class="fa fa-edit"></i>
                                    Edit</a>
                                <a class="btn btn-danger btn-sm">
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
