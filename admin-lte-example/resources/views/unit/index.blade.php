@extends('layout.main')
@section('title', 'List Units')
@section('content')
    <div class="mx-5 my-1 d-flex justify-content-between align-items-center">
        <h1>List Units</h1>
        <a class="btn btn-success " href="{{ route('unit.create') }}">Add Unit</a>
    </div>
    <div class="p-5">
        <form action="" class="mb-5 d-flex" method="GET">
            <input class="form-control mr-3" name="description" id="txtSearch" placeholder="Type to search..."
                value="{{ $description }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        @if (session('alert'))
            <div id="message" class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show"
                role="alert">
                {{ session('alert')['message'] }}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>
        @endif
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
                    @if (!count($units))
                        <tr>
                            <td colspan="3">No units</td>
                        </tr>
                    @else
                        @foreach ($units as $unit)
                            <tr>
                                <th scope="row">{{ $unit->id }}</th>
                                <td>{{ $unit->description }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm mr-2"
                                        href="{{ route('unit.edit', $unit->id) }}">
                                        <i class="fa fa-edit"></i>
                                        Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('unit.confirm', $unit->id) }}">
                                        <i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $units->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        setTimeout(() => {
            document.querySelector('#message').remove();
        }, 10000);
    </script>
@endsection
