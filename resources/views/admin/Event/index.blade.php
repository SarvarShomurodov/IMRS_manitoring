@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Институт томонидан ташкиллаштирилган семинарлар, давра суҳбатлар, конференциялар, форумлар</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Институт тадбирлари</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('event.create') }}">Институт тадбирлари қўшиш</a>
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
                    <th>Тадбир номи</th>
                    <th>Тадбир тури</th>
                    <th>Асос</th>
                    <th>Ташкилотчи</th>
                    <th>Максад</th>
                    <th>Тадбир санаси</th>
                    <th>Тадбир ўтказилган жой</th>
                    <th>Иштирокчилар сони (маҳаллий)</th>
                    <th>Иштирокчилар сони (чет эл вакиллари)</th>
                    <th>Натижа</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->type }}</td>
                        <td>{{ $trip->basis }}</td>
                        <td>{{ $trip->organizer }}</td>
                        <td>{!! $trip->goal !!}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->regionsVal->name }}</td>
                        <td>{{ $trip->foreignNum }}</td>
                        <td>{{ $trip->localNum }}</td>
                        <td>{!! $trip->result !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('event.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('event.edit',$trip->id) }}">Ўзгартириш</a>
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
