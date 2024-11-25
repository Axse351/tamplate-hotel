@extends('admin.dashboard')

@section('content')
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4>Welcome to the Admin Dashboard</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Welcome back, {{ auth()->user()->name }}!</h5>
                        <p class="text-muted">You are logged in as an admin. Here you can manage reservations, rooms, and
                            view reports.</p>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.reservasi.index') }}" class="btn btn-info btn-lg mb-3">reservasi</a>
                        <a href="{{ route('admin.kamar.index') }}" class="btn btn-success btn-lg mb-3">oprasional kamar</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Dashboard Overview</h5>
                        <p>This is your dashboard overview. Here you will find the latest updates and important actions you
                            can take.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
