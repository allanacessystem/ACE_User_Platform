@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Route::has('registerEmployee'))
                        <a class="nav-link" href="{{ route('registerEmployee') }}">Add an Employee</a>
                    @endif
                    @if (Route::has('registerCustomer'))
                        <a class="nav-link" href="{{ route('registerCustomer') }}">Add a Customer</a>
                    @endif
                    @if (Route::has('registerSuperAdmin'))
                        <a class="nav-link" href="{{ route('registerSuperAdmin') }}">Add a SuperAdmin</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
