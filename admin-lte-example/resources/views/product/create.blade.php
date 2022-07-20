@extends('layout.main')
@section('title', 'Create product')

@section('content')
    <div class="mx-5 my-1 d-flex justify-content-between align-items-center">
        <h1>Add Product</h1>
    </div>
    <form class="row mx-md-5" method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="col-6 mb-3">
            <label class="col-sm-2 form-label text-capitalize" for="description"
                class="col-sm-2 form-label text-capitalize">description</label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description">
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6 mb-3">
            <label class="col-sm-2 form-label text-capitalize" for="idcategory">Category</label>
            <select class='form-control ml-1' name="idcategory" id="idcategory">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mb-3">
            <label class="col-sm-2 form-label text-capitalize" for="idunit">Unit</label>
            <select class='form-control ml-1' name="idunit" id="idunit">
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mb-3">
            <label class="col-sm-2 form-label text-capitalize" for="stock"
                class="col-sm-2 form-label text-capitalize">stock</label>
            <div class="col-sm-10">
                <input type="number" min="0" max="1000"name="stock"
                    class="form-control @error('stock') is-invalid @enderror" id="stock">
                @error('stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6 mb-3">
            <label class="col-sm-2 form-label text-capitalize" for="price"
                class="col-sm-2 form-label text-capitalize">price</label>
            <div class="col-sm-10">
                <input type="text"name="price" class="form-control @error('price') is-invalid @enderror"
                    id="price">
                @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mx-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('cancel', 'product') }}"class="btn btn-danger">Cancel</a>
        </div>
    </form>
 
@endsection
