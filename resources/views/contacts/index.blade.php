@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-3">Contacts</span>
                        @if($isAuth)
                            <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-3 text-center" scope="col">Name</th>
                                <th class="col-3 text-center" scope="col">Email</th>
                                <th class="col-2 text-center" scope="col">Contact</th>
                                @if($isAuth)

                                    <th class="col-4 text-center" scope="col">Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="col-3 text-center align-middle">{{ $contact->name }}</td>
                                    <td class="col-3 text-center align-middle">{{ $contact->email }}</td>
                                    <td class="col-2 text-center align-middle">{{ $contact->contact }}</td>
                                    @if($isAuth)

                                        <td class="col-4 text-center align-middle">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                   class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                                   class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection