@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Давлат ёки ҳудуд</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Давлат ёки ҳудуд</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('region.create') }}">Давлат ёки ҳудуд қўшиш</a>
                </div>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Давлат ёки ҳудуд</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('region.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info" href="{{ route('region.edit',$trip->id) }}">Ўзгартириш</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ўчириш</button>
                                </form>
                            </td> 
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
