@extends('layouts.app-admin')

@section('title', 'Create Business Trip')

@section('content')
    <h1>Create a New Business Trip</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('business_trips.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label><br>
            {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
            <select name="type" id="type">
                <option value="hududiy">Hududlarga</option>
                <option value="xorijiy">Xorijiy</option>
              </select>
        </div>

        <div class="form-group">
            <label for="goal">Goal</label>
            <textarea name="goal" id="goal" class="form-control" required>{{ old('goal') }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
        </div>

        <div class="form-group">
            <label for="adress">Address</label>
            <input type="text" name="adress" id="adress" class="form-control" value="{{ old('adress') }}" required>
        </div>

        <div class="form-group">
            <label for="list_person">List Person</label>
            <textarea name="list_person" id="list_person" class="form-control" required>{{ old('list_person') }}</textarea>
        </div>

        <div class="form-group">
            <label for="data_name">Data Name</label>
            <input type="text" name="data_name" id="data_name" class="form-control" value="{{ old('data_name') }}" required>
        </div>

        <div class="form-group">
            <label for="invite_count">Invite Count</label>
            <input type="number" name="invite_count" id="invite_count" class="form-control" value="{{ old('invite_count') }}" required>
        </div>

        <div class="form-group">
            <label for="ball">Ball</label>
            <input type="number" name="ball" id="ball" class="form-control" value="{{ old('ball') }}" required>
        </div>

        <div class="form-group">
            <label for="quarter">Type</label><br>
            {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
            <select name="quarter" id="quarter">
                <option value="chorak_one">1-chorak</option>
                <option value="chorak_two">2-chorak</option>
                <option value="chorak_three">3-chorak</option>
                <option value="chorak_four">4-chorak</option>
              </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Business Trip</button>
    </form>
@endsection
