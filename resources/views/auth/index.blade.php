@extends('layouts.login')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px; border-radius: 15px;">
        <h4 class="text-center mb-4" style="font-weight: 800; color: #333;">LOGIN SYSTEM</h4>

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <small>{{ $errors->first() }}</small>
                </div>
            @endif

            <button class="btn btn-primary w-100 py-2" style="font-weight: 600;">LOG IN</button>
        </form>
    </div>
</div>
@endsection