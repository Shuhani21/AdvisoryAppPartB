@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new place') }}</div>

                <div class="card-body">
                    <form action="/listing" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="list_name">Name</label>
                        <input name="list_name" type="text" class="form-control" id="distance" placeholder="Enter Name">
                        <small id="list_name" class="form-text text-muted">Enter Name</small>

                        @error('list_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="distance">Distance</label>
                        <input name="distance" type="number" step="0.01" class="form-control" id="distance" placeholder="Enter Distance">
                        <small id="distance" class="form-text text-muted">Enter Distance</small>

                        @error('distance')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
