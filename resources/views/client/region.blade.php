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
                <th>Таҳлилий материаллар сони</th>
                <th>Сафарлар сони</th>
                <th>Институт томонидан ташкил этилган тадбирлар сони</th>
                <th>Институт ходимлари иштирок этган тадбирлар сони</th>
                <th>Таклифлар сони</th>
            </tr>
        </thead>
        <tbody>
            @foreach($higherOrganCounts as $count)
                <tr>
                    <td>{{ $count->regions_id }}</td>
                    <td>{{ $count->name }}</td>
                    <td>{{ $count->higher_organs_count }}</td>
                    <td>{{ $count->another_table_count }}</td>
                    <td>{{ $count->third_table_count }}</td>
                    <td>{{ $count->conventions_count }}</td>
                    <td>{{ $count->another_table_sorov_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
