@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Институт Илмий-амалий семинар йиғилишлари</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Илмий методологик семинар</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('methods.create') }}">Илмий методологик семинар қўшиш</a>
                </div>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>№</th>
                            <th>Семинарда кўрилган масала тури(етакчи ташкилот семинари ёки Институт ходимлари тақдимоти)</th>
                            <th>Маърузачининг ф.и.ш.</th>
                            <th>Маърузачи лавозими (докторант, таянч докторант, мустақил изланувчи, илмий ходим)</th>
                            <th>Маърузачи ишлаётган муассаса ёки ташкилот номи</th>
                            <th>Семинар санаси</th>
                            <th>Иштирок этган семинар аъзолари сони</th>
                            <th>Семинар хулосаси</th>
                            <th>Чораклар</th>
                            @if(Auth::user()->name != 'Abdixojayev')
                                <th>Action</th>  
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($methods as $trip)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $trip->type }}</td>
                                <td>{{ $trip->name }}</td>
                                <td>{{ $trip->position }}</td>
                                <td>{{ $trip->reportName }}</td>
                                <td>{{ $trip->date }}</td>
                                <td>{{ $trip->number }}</td>
                                <td>{!! $trip->conclusion !!}</td>
                                <td>{{ $trip->quarter->name }}</td>
                                @if (Auth::user()->name != 'Abdixojayev')
                                    <td>
                                        <form action="{{ route('methods.destroy',$trip->id) }}" method="POST">        
                                            <a class="btn btn-info" href="{{ route('methods.edit',$trip->id) }}">Ўзгартириш</a>
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
            </div>
        </div>
    </div>
@endsection
