@extends('layouts.master')

@section('content')
    <div class="card card-primary w-25 m-3">
        <div class="card-header">
            <h3 class="card-title">Edit user</h3>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="first_name"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="patronymic">Patronymic</label>
                    <input type="text" name="patronymic" value="{{ $user->patronymic }}" class="form-control" id="patronymic"
                        placeholder="Enter patronymic">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" id="last_name"
                        placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="name">address</label>
                    <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="address"
                        placeholder="Enter address">
                </div>
                <div class="form-group">
                    <label for="name">gender</label>
                    <select name="gender" class="form-control">
                        <option selected disabled>Change gender</option>
                        <option value="0" @selected($user->gender == 0)>Male</option>
                        <option value="1" @selected($user->gender == 1)>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="password"
                        placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">password confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        placeholder="Enter password confirmation">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
