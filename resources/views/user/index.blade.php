@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('user.index') }}">user</a>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Create users</a>
            </h3>
            <div class="card-tools">
                @include('includes.search')
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Patronymic</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{ route('user.show', $user->id) }}">{{ $user->first_name }}</a></td>
                            <td>{{ $user->patronymic }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->genderTitle() }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
