@extends('layout.main')
@section('title', 'Edit unit')

@section('content')
    <div class="mx-5 my-1 d-flex justify-content-between align-items-center">
        <h1>Edit Unit</h1>
    </div>
    <form class="row mx-md-5" method="POST" action="{{ route('unit.update', $unit->id) }}">
        @method('put')
        @csrf
        <div class="col-6 mb-3">
            <label for="id" class="col-sm-2 col-form-label text-capitalize">id</label>
            <div class="col-sm-10">
                <input type="text" name="id" class="form-control" disabled id="id"
                    value="{{ $unit->id }}">
            </div>
        </div>
        <div class="col-6 mb-3">
            <label for="description" class="col-sm-2 col-form-label text-capitalize">description</label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description" value="{{ $unit->description }}">
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mx-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cancel') }}"class="btn btn-danger">Cancel</a>
        </div>
    </form>
@endsection
