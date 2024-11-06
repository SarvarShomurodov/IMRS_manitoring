@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Институт томонидан ташкиллаштирилган музокаралар ва учрашувлар</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Учрашувлар</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('meeting.create') }}">Учрашувлар қўшиш</a>
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
                    <th>Учрашув номи ва мақсади</th>
                    <th>Ташкилот</th>
                    <th>Асос</th>
                    <th>Формат</th>
                    <th>Сана</th>
                    <th>Манзил(давлат ёки ҳудуд)</th>
                    <th>Иштирок этган Институт вакиллари рўйхати</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($meetings as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{!! $trip->nameGoal !!}</td>
                        <td>{{ $trip->organization }}</td>
                        <td>{{ $trip->basis }}</td>
                        <td>{{ $trip->format }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{!! $trip->address !!}</td>
                        <td>{!! $trip->list !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('meeting.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('meeting.edit',$trip->id) }}">Ўзгартириш</a>
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
