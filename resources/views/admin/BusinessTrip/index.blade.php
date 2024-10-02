@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Business Trips</h1>
        <a href="{{ route('business_trips.create') }}" class="btn btn-primary">Add New Business Trip</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Goal</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Address</th>
                <th>List Person</th>
                <th>Invite Count</th>
                <th>Ball</th>
                <th>Chorak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businessTrips as $trip)
                <tr>
                    <td>{{ $trip->name }}</td>
                    <td>{{ $trip->type }}</td>
                    <td>{{ $trip->goal }}</td>
                    <td>{{ $trip->start_date }}</td>
                    <td>{{ $trip->end_date }}</td>
                    <td>{{ $trip->adress }}</td>
                    <td>{{ $trip->list_person }}</td>
                    <td>{{ $trip->invite_count }}</td>
                    <td>{{ $trip->ball }}</td>
                    <td>{{ $trip->quarter }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
