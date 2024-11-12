@extends('layouts.app-admin')

@section('title', 'Higher Organ')

@section('content')
<!-- Display filter form only if the user is 'Abdixojayev' -->
    @if (Auth::user()->name == 'Abdixojayev')
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cўровномалар сонини ҳудудлар бўйича филтрлаш</h2>
            </div>
            <div class="pull-right mb-4">
                <form action="{{ route('sorov_admin.indexAdmin') }}" method="GET" class="d-inline-block">
                    <div class="row g-2">
                        <div class="col-auto">
                            <select name="regions_id" id="regions_id" class="form-control">
                                <option value="">Барча ҳудудлар</option>
                                @foreach ($regions as $quarter)
                                    <option value="{{ $quarter->id }}" {{ request('regions_id') == $quarter->id ? 'selected' : '' }}>
                                        {{ $quarter->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-auto">
                            <select name="quarters_id" id="quarters_id" class="form-control">
                                <option value="">Барча кварталлар</option>
                                @foreach ($quarters as $quarter)
                                    <option value="{{ $quarter->id }}" {{ request('quarters_id') == $quarter->id ? 'selected' : '' }}>
                                        {{ $quarter->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
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
                        <td>{{ $trip->regionsVal->name }}</td>
                        <td>{!! $trip->shortResult !!}</td>
                        {{-- <td>{{ $trip->readyArticle }}</td>
                        <td>{{ $trip->telegram }}</td>
                        <td>{{ $trip->pressRelis }}</td>
                        <td>{{ $trip->infografik }}</td>
                        <td>{{ $trip->interyu }}</td>
                        <td>{{ $trip->taqdimot }}</td> --}}
                        <td>{!! $trip->listPerson !!}</td>
                        <td>{{ $trip->quarter->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
