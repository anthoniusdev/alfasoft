@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="display-4">405</h1>
        <p class="lead">Oops! Method Not Allowed...</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection
