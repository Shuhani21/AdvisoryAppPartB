@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <a href="/listing/create" class="btn btn-dark">Add a place</a>

                    

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('My List') }}</div>

                <div class="card-body">
                

                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Distance</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($listings as $listing )
                                <tr>
                                    <td>{{ $listing->list_name }}</td>
                                    <td>{{ $listing->distance }}</td>
                                    <td>
                                    <form action="/listing/{{ $listing->id }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                            
                        </table>
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
