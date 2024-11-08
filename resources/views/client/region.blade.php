@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<h4 style="text-align: center">Ўзбекистон Республикаси Вазирлар Маҳкамаси ҳузуридаги Макроиқтисодий ва ҳудудий тадқиқотлар институтида 2024 йил давомида ҳудудлар кесимида амалга оширилган ишлар тўғрисида 
    МАЪЛУМОТ</h4>

    <table border="1">
        <thead>
            <tr>
                <th>№</th>
                <th>Ҳудуд номи</th>
                <th><a style="color: white" href="{{ route('higher_admin.indexAdmin') }}">Таҳлилий материаллар сони</a></th>
                <th><a style="color: white" href="{{ route('business_admin.indexAdmin') }}">Сафарлар сони</a></th>
                <th><a style="color: white" href="{{ route('ev_admin.indexAdmin') }}">Институт томонидан ташкил этилган тадбирлар сони</a></th>
                <th>Институт ходимлари иштирок этган тадбирлар сони</th>
                <th>Таклифлар сони</th>
                <th>Cўровномалар сони</th>
            </tr>
        </thead>
        <tbody>
            @foreach($higherOrganCounts as $count)
                <tr>
                    <td>{{ $count->regions_id }}</td>
                    <td>{{ $count->name }}</td>
                    <td style="text-align: center">{{ $count->higher_organs_count }}</td>
                    <td style="text-align: center">{{ $count->another_table_count }}</td>
                    <td style="text-align: center">{{ $count->third_table_count }}</td>
                    <td style="text-align: center">{{ $count->conventions_count }}</td>
                    <td style="text-align: center">{{ $count->another_table_sorov_count }}</td>
                    <td style="text-align: center">{{ $count->surveys_count }}</td>    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
