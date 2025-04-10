@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary align-items-center text-white">
                <h4 class="mt-2">Contact Detail</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $contact->id }}</p>
                <p><strong>Name:</strong> {{ $contact->name }}</p>
                <p><strong>Contact:</strong> {{ $contact->contact }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
            </div>
            <div class="card-footer justify-content-center d-flex">
                <div class="d-flex col-md-6 justify-content-between">
                    <a href="{{ route('home') }}" class="btn px-4 py-3  btn-secondary">
                        Back
                    </a>

                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this contact?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn px-4 py-3 btn-danger">
                            Delete
                        </button>
                    </form>

                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn px-4 py-3 btn-warning">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection