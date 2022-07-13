@extends('layout.main')
@section('content')
    <div class="container">
        <h1 class="mb-5">Do you want to remove the unit?</h1>
        <div class="d-flex flex-column">
            <span class="mb-2 text-lg">ID: {{ $unit->id }}</span>
            <span class="mb-2 text-lg">Description: {{ $unit->description }}</span>
        </div>

        <form method="POST" action="{{ route('unit.destroy', $unit->id) }}" class="my-5">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mr-2">
                <i class="fas fa-check-square"></i>
                <span class="mr-1">Yes</span>
            </button>
            <a href="{{ route('cancel') }}" class="btn btn-primary">
                <i class="fas fa-times-circle m"></i>
                <span class="mr-1">No</span>
            </a>
        </form>
    </div>
@endsection
