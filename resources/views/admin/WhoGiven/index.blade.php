@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Юқори ташкилотлар</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Юқори ташкилотлар</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('whogivens.create') }}">Юқори ташкилотлар қўшиш</a>
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
                    <th>Юқори ташкилотлар номи</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($givens as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('whogivens.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('whogivens.edit',$trip->id) }}">Ўзгартириш</a>
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
