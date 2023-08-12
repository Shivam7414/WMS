@extends('layouts.app')

@section('content')
    <div class="row page-heading">
        <div class="col-md-6">
            <h2>Profile</h2>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-end">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 col-lg-5 my-3 p-5 bg-white shadow-sm rounded-3">
            <form action="{{ url('store') }}" method="POST">
                @csrf
                <div class="my-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="my-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="my-3">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="my-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <input type="Submit" value="Submit" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                const passwordValue = $('input[name="password"]').val();
                const confirmPasswordValue = $('input[name="confirm_password"]').val();
                if (passwordValue) {
                    if (confirmPasswordValue) {
                        if (passwordValue === confirmPasswordValue) {
                        } else {
                            event.preventDefault();
                            alert('Passwords do not match.');
                        }
                    } else {
                        event.preventDefault();
                        alert('Please confirm your password.');
                    }
                }
            });
        });
    </script>
@endsection
