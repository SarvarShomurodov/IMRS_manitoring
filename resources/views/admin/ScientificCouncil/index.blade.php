@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev' && request()->is('scientific'))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш мажлислари</h2>
                </div>
                <div class="pull-right mb-4">
                    <form action="{{ route('scientific.index') }}" method="GET" class="d-inline-block">
                        <div class="row g-2">
                            <div class="col-auto">
                                <select name="quarters_id" id="quarters_id" class="form-control">
                                    <option value="">Барча чораклар</option>
                                    @foreach ($quarters as $quarter)
                                        <option value="{{ $quarter->id }}" {{ request('quarters_id') == $quarter->id ? 'selected' : '' }}>
                                            {{ $quarter->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Илмий даража олиш</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('scientific.create') }}">Илмий даража қўшиш</a>
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
                    <th>Илмий даража</th>
                    <th>Ф.И.Ш</th>
                    <th>Изланувчилик тури</th>
                    <th>ўқишга кирган сана</th>
                    <th>ўқишни битирган сана</th>
                    <th>Ҳимоя санаси</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($scientifics as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->scientific->name }}</td>
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->type }}</td>
                        <td>{{ $trip->start_date }}</td>
                        <td>{{ $trip->end_date }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('scientific.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('scientific.edit',$trip->id) }}">Ўзгартириш</a>
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
