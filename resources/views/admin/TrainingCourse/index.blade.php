@extends('layouts.app-admin')

@section('title', 'Business Trips')

@section('content')
  
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
          <div class="card-title">Training Courses</div>
        </div>
        <div class="card-body">
          <div class="card-sub">
            <a href="{{ route('training_courses.create') }}" class="btn btn-primary">Add New Training Courses</a>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Organizer</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Invite Count</th>
                        <th>List Person</th>
                        <th>Chorak</th>
                    </tr>
              </thead>
              <tbody>
                @foreach ($trainingCourses as $trip)
                    <tr>
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->type }}</td>
                        <td>{{ $trip->organizer }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->adress }}</td>
                        <td>{{ $trip->invite_count }}</td>
                        <td>{{ $trip->list_person }}</td>
                        <td>{{ $trip->quarter->name }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
