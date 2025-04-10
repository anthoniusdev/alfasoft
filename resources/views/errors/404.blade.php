@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="display-4">404</h1>
        <p class="lead">Oops! Page not found...</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection
