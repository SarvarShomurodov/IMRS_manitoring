@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cўровномалар</h2>
                </div>
            </div>
        </div>       
    @else
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cўровномалар</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('survay.create') }}">Cўровномалар қўшиш</a>
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
                    <th>Сўровнома номи</th>
                    <th>Асос</th>
                    <th>Топшириқ санаси(ёки хатсиз)</th>
                    <th>Топшириқ рақами(ёки хатсиз)</th>
                    <th>Кимга юборилди</th>
                    <th>Хат санаси</th>
                    <th>Хат рақами</th>
                    <th>Йўналиш</th>
                    <th>Манзил(давлат ёки ҳудуд)</th>
                    <th>Қисқа натижалари</th>
                    {{-- <th>Мақола тайёрланган (ҳа, йўқ)</th>
                    <th>Телеграм пост тайёрланган (ҳа, йўқ)</th>
                    <th>Пресс релиз тайёрланган (ҳа, йўқ)</th>
                    <th>Инфографика тайёрланган (ҳа, йўқ)</th>
                    <th>Интервью тайёрланган (ҳа, йўқ)</th>
                    <th>Тақдимот ёки видеоролик тайёрланган (ҳа, йўқ)</th> --}}
                    <th>Иштирок этган ходимлар</th>
                    <th>Чораклар</th>
                    @if(Auth::user()->name != 'Abdixojayev')
                        <th>Action</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($survays as $trip)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $trip->name }}</td>
                        <td>{{ $trip->whoGiven->name }}</td>
                        <td>{{ $trip->assDate }}</td>
                        <td>{{ $trip->assNumber }}</td>
                        <td>{{ $trip->whoSend }}</td>
                        <td>{{ $trip->letterDate }}</td>
                        <td>{{ $trip->letterNumber }}</td>
                        <td>{{ $trip->direction }}</td>
                        <td>
                            @foreach($trip->regions as $region)
                            {{ $region->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{!! $trip->shortResult !!}</td>
                        {{-- <td>{{ $trip->readyArticle }}</td>
                        <td>{{ $trip->telegram }}</td>
                        <td>{{ $trip->pressRelis }}</td>
                        <td>{{ $trip->infografik }}</td>
                        <td>{{ $trip->interyu }}</td>
                        <td>{{ $trip->taqdimot }}</td> --}}
                        <td>{!! $trip->listPerson !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                        @if (Auth::user()->name != 'Abdixojayev')
                            <td>
                                <form action="{{ route('survay.destroy',$trip->id) }}" method="POST">        
                                    <a class="btn btn-info mb-1" href="{{ route('survay.edit',$trip->id) }}">Ўзгартириш</a>
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
