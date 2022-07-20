@extends('layout.main')
@section('title', 'Create category')

@section('content')
    <div class="mx-5 my-1 d-flex justify-content-between align-items-center">
        <h1>Add Category</h1>
    </div>
    <form class="row mx-md-5" method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="col-6 mb-3">
            <label for="description" class="col-sm-2 col-form-label text-capitalize">description</label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description">
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mx-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('cancel', 'category') }}"class="btn btn-danger">Cancel</a>
        </div>
    </form>
@endsection
