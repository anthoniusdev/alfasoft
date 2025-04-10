@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-success">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Contact</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input id="contact" type="contact"
                                       class="form-control @error('contact') is-invalid @enderror"
                                       name="contact" value="{{ old('contact') }}" required>

                                @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    Back
                                </a>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (session('success'))
        document.addEventListener('DOMContentLoaded', function () {
        let successModal = new bootstrap.Modal(document.getElementById('successModal'));

        const modalElement = document.getElementById('successModal');
        modalElement.addEventListener('hidden.bs.modal', function () {
        window.location.href = "{{ route('contacts.show', [session('contact')]) }}";
        });

        successModal.show();
        });
    @endif
@endsection