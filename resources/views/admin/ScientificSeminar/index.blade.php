@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш хузуридаги Илмий семинар йиғилишлари</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ИИК ҳузуридаги семинарлар</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('seminar.create') }}">ИИК ҳузуридаги семинарлар қўшиш</a>
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
                    <th>Диссертантнинг ф.и.ш.</th>
                    <th>Диссертант ишлаётган  муассаса ёки ташкилот номи ва лавозими</th>
                    <th>Диссертация мавзуси</th>
                    <th>Илмий раҳбарининг ф.и.ш.</th>
                    <th>Қайси илмий даражага даъвогар (PhD/DSc)</th>
                    <th>ўтказилган ИС санаси</th>
                    <th>Иштирок этган ИС аъзолари сони</th>
                    <th>ИС хулосаси</th>
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
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->organizationName }}</td>
                        <td>{!! $trip->topic !!}</td>
                        <td>{{ $trip->leaderName }}</td>
                        <td>{{ $trip->scientific->name }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->number }}</td>
                        <td>{!! $trip->conclusion !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('seminar.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('seminar.edit',$trip->id) }}">Ўзгартириш</a>
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
