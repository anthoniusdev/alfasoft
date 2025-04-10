@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        @if (session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-success">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
        @if ($errors->any())
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-danger">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="errorModalLabel">Error</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h4 class="mt-2">Edit Contact</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name</strong></label>
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ old('name', $contact->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label"><strong>Contact</strong></label>
                        <input type="text" id="contact" name="contact" class="form-control"
                               value="{{ old('contact', $contact->contact) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email', $contact->email) }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary px-4 py-3">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success px-4 py-3">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
    @endif

    @if (session('success'))
            document.addEventListener('DOMContentLoaded', function () {
                let successModal = new bootstrap.Modal(document.getElementById('successModal'));

                const modalElement = document.getElementById('successModal');
                modalElement.addEventListener('hidden.bs.modal', function () {
                    window.location.href = "{{ route('contacts.show', [$contact->id]) }}";
                });

                successModal.show();
            });
    @endif
@endsection


