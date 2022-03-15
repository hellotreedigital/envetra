@extends('layouts/cms-main')

@section('content')

    <div class="container py-4">
        <a href="{{ url('admin') }}" class="d-inline-flex mb-3">Back</a>
        <h2 class="mb-3">Upload Products</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="m-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>CSV</label>
                <input type="file" class="form-control" name="csv">
            </div>
            <div class="form-group mb-3">
                <label>Images</label>
                <input type="file" class="form-control" name="images">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

@endsection