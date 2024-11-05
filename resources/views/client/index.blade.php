@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<style>
   .grid-container {
            display: grid;
            grid-template-columns: 0.5fr 3fr 1fr 1fr 1fr 1fr 1fr; /* Adjusted width for the first column */
            gap: 10px;
            padding: 10px;
            /* border: 1px solid #ddd; */
        }
        .grid-container div {
            padding: 10px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center; /* Vertically centers the content */
            justify-content: center;
            text-align: center;
        }
        .grid-container .left-align {
            justify-content: flex-start; /* Align to the beginning of the screen (left) */
            text-align: left; /* Align text to the left */
        }
        .header {
            font-weight: bold;
        }
        .id{
          font-weight: bold;
        }
</style>
<div class="row">
  <div class="col-lg-12 margin-tb">
      <h4 class="text-center">Ўзбекистон Республикаси Вазирлар Маҳкамаси ҳузуридаги Макроиқтисодий ва ҳудудий тадқиқотлар институтида 2024 йил давомида амалга оширилган ишлар тўғрисида 
        МАЪЛУМОТ</h4>
  </div>
</div>
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        {{-- <table class="table table-bordered">
          <thead>
            <tr>
                <tr>
                    <th>№</th>
                    <th>Ко`рсаткич номи</th>
                    <th>1-чорак</th>
                    <th>2-чорак</th>
                    <th>3-чорак</th>
                    <th>4-чорак</th>
                </tr>
          </thead>
          <tbody>
                <tr>
                     <td>1</td>
                     <td><a style="color: rgb(48, 48, 48)" href="{{ url('business_trips') }}">Хизмат сафарлари</a></td>
                     <td>{{$businessTripCounts[0]->first_quater}}</td>
                     <td>{{$businessTripCounts[0]->second_quater}}</td>
                     <td>{{$businessTripCounts[0]->third_quater}}</td>
                     <td>{{$businessTripCounts[0]->fourth_quater}}</td>
                </tr>
          </tbody>
        </table> --}}
        <div class="grid-container">
          <div class="header">№</div>
          <div class="header text-start">КО`РСАТКИЧ НОМИ</div>
          <div class="header">1-ЧОРАК</div>
          <div class="header">2-ЧОРАК</div>
          <div class="header">3-ЧОРАК</div>
          <div class="header">4-ЧОРАК</div>
          <div class="header">Йил бўйича Режа</div>
          
          @foreach($higherOrganCounts as $higherOrganCount)
            @if ($higherOrganCount->id == 6)
              <div class="id">1</div>
              <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 6]) }}"><b>{{$higherOrganCount->issuer_name}}</b></a></div>
              <div>{{$higherOrganCount->first_quarter}}</div>
              <div>{{$higherOrganCount->second_quarter}}</div>
              <div>{{$higherOrganCount->third_quarter}}</div>
              <div>{{$higherOrganCount->fourth_quarter}}</div>
              <div>{{$higherOrganCount->year_number}}</div>
             @endif              
          @endforeach

          @foreach($higherOrganCounts as $higherOrganCount)
            @if ($higherOrganCount->id == 8)
              <div class="id">2</div>
              <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 8]) }}"><b>{{$higherOrganCount->issuer_name}}</b></a></div>
              <div>{{$higherOrganCount->first_quarter}}</div>
              <div>{{$higherOrganCount->second_quarter}}</div>
              <div>{{$higherOrganCount->third_quarter}}</div>
              <div>{{$higherOrganCount->fourth_quarter}}</div>
              <div>{{$higherOrganCount->year_number}}</div>
             @endif              
          @endforeach

          <div class="id">3</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('higher_organs') }}"><b>Юқори ташкилотларнинг топшириқларга  мувофиқ бажарилган ишлар сони, шундан</b></a></div>
          <div>{{$higherOrgans[0]->first_quater}}</div>
          <div>{{$higherOrgans[0]->second_quater}}</div>
          <div>{{$higherOrgans[0]->third_quater}}</div>
          <div>{{$higherOrgans[0]->fourth_quater}}</div>
          <div>160</div>

          @foreach($higherOrganCounts as $higherOrganCount)
            @if($higherOrganCount->id != 6 && $higherOrganCount->id != 8 && $higherOrganCount->id != 10)
            <div>3. {{$higherOrganCount->id}}</div>
            <div class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => $higherOrganCount->id]) }}">
                    {{$higherOrganCount->issuer_name}}
                </a>
            </div>
            <div>{{$higherOrganCount->first_quarter}}</div>
            <div>{{$higherOrganCount->second_quarter}}</div>
            <div>{{$higherOrganCount->third_quarter}}</div>
            <div>{{$higherOrganCount->fourth_quarter}}</div>
            <div>{{$higherOrganCount->year_number}}</div>
            @endif
          @endforeach

          <div class="id">5</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('business_trips') }}"><b>Хизмат сафарлар</b></a></div>
          <div>{{$businessTripCounts[0]->first_quater}}</div>
          <div>{{$businessTripCounts[0]->second_quater}}</div>
          <div>{{$businessTripCounts[0]->third_quater}}</div>
          <div>{{$businessTripCounts[0]->fourth_quater}}</div>
          <div>154</div>

          @foreach($higherOrganCounts as $higherOrganCount)
            @if ($higherOrganCount->id == 10)
              <div class="id">6</div>
              <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 10]) }}">
                <b>{{$higherOrganCount->issuer_name}}</b>
              </a></div>
              <div>{{$higherOrganCount->first_quarter}}</div>
              <div>{{$higherOrganCount->second_quarter}}</div>
              <div>{{$higherOrganCount->third_quarter}}</div>
              <div>{{$higherOrganCount->fourth_quarter}}</div>
              <div>{{$higherOrganCount->year_number}}</div>
             @endif              
          @endforeach

          <div class="id">7</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('training_courses') }}"><b>Тренинглар, ўқув курслари (сертификат билан)</b></a></div>
          <div>{{$trainingCourseCounts[0]->first_quater}}</div>
          <div>{{$trainingCourseCounts[0]->second_quater}}</div>
          <div>{{$trainingCourseCounts[0]->third_quater}}</div>
          <div>{{$trainingCourseCounts[0]->fourth_quater}}</div>
          <div>154</div>
          <div class="id">8</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('publishes') }}"><b>Илмий нашриёт ишлари сони</b></a></div>
          <div>{{$publish[0]->first_quater}}</div>
          <div>{{$publish[0]->second_quater}}</div>
          <div>{{$publish[0]->third_quater}}</div>
          <div>{{$publish[0]->fourth_quater}}</div>
          <div>198</div>

          @foreach($publishCounts as $publishCount)
            <div>8.{{$publishCount->id}}</div>
            <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('publishes.index',['type_id' => $publishCount->id]) }}">
              {{$publishCount->issuer_name}}
            </a></div>
            <div>{{$publishCount->first_quarter}}</div>
            <div>{{$publishCount->second_quarter}}</div>
            <div>{{$publishCount->third_quarter}}</div>
            <div>{{$publishCount->fourth_quarter}}</div>
            <div>{{$publishCount->year_number}}</div>
          @endforeach

          <div class="id">9</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('oavpublish') }}"><b>ОАВ нашриёт ишлари сони</b></a></div>
          <div>{{$opublishes[0]->first_quarter}}</div>
          <div>{{$opublishes[0]->second_quarter}}</div>
          <div>{{$opublishes[0]->third_quarter}}</div>
          <div>{{$opublishes[0]->fourth_quarter}}</div>
          <div>198</div>

          @foreach($opublishCounts as $publishCount)
            <div>9.{{$publishCount->id}}</div>
            <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('oavpublish.index',['oav_id' => $publishCount->id]) }}">
              {{$publishCount->issuer_name}}
            </a></div>
            <div>{{$publishCount->first_quarter}}</div>
            <div>{{$publishCount->second_quarter}}</div>
            <div>{{$publishCount->third_quarter}}</div>
            <div>{{$publishCount->fourth_quarter}}</div>
            <div>{{$publishCount->year_number}}</div>
          @endforeach
          
          <div class="id">10</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('conventions') }}"><b>Юқори ташкилотларнинг топшириқларга  мувофиқ семинарлар, вебинарлар, давра сухбатлар, конференциялар, форумлар ва бошқа тадбирларда иштирок этиш (публикациясиз)</b></a></div>
          <div>{{$conventions[0]->first_quarter}}</div>
          <div>{{$conventions[0]->second_quarter}}</div>
          <div>{{$conventions[0]->third_quarter}}</div>
          <div>{{$conventions[0]->fourth_quarter}}</div>
          <div>148</div>

          <div class="id">11</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('scientific') }}"><b>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш мажлислари</b></a></div>
          <div>{{$scientifics[0]->first_quarter}}</div>
          <div>{{$scientifics[0]->second_quarter}}</div>
          <div>{{$scientifics[0]->third_quarter}}</div>
          <div>{{$scientifics[0]->fourth_quarter}}</div>
          <div>113</div>

          <div class="id">12</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('seminar') }}"><b>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш хузуридаги Илмий семинар йиғилишлари</b></a></div>
          <div>{{$seminars[0]->first_quarter}}</div>
          <div>{{$seminars[0]->second_quarter}}</div>
          <div>{{$seminars[0]->third_quarter}}</div>
          <div>{{$seminars[0]->fourth_quarter}}</div>
          <div>111</div>

          <div class="id">13</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('methods') }}"><b>Институт Илмий-амалий семинар йиғилишлари</b></a></div>
          <div>{{$methods[0]->first_quarter}}</div>
          <div>{{$methods[0]->second_quarter}}</div>
          <div>{{$methods[0]->third_quarter}}</div>
          <div>{{$methods[0]->fourth_quarter}}</div>
          <div>211</div>

          <div class="id">14</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('young_economists') }}"><b>Институт Ёш иқтисодчилар мажлислари сони</b></a></div>
          <div>{{$youngEconomistCounts[0]->first_quater}}</div>
          <div>{{$youngEconomistCounts[0]->second_quater}}</div>
          <div>{{$youngEconomistCounts[0]->third_quater}}</div>
          <div>{{$youngEconomistCounts[0]->fourth_quater}}</div>
          <div>173</div>

          <div class="id">16</div>
          <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('scientific') }}"><b>Илмий даражага эга бўлиш учун ҳимояга чиққан илмий изланувчилар сони</b></a></div>
          <div>{{$nullScientifics[0]->first_quarter}}</div>
          <div>{{$nullScientifics[0]->second_quarter}}</div>
          <div>{{$nullScientifics[0]->third_quarter}}</div>
          <div>{{$nullScientifics[0]->fourth_quarter}}</div>
          <div>281</div>
    
          @foreach($nullScientificCounts as $publishCount)
            <div></div>
            <div class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('scientific.index',['degree_id' => $publishCount->id, 'quarters_id' => request('quarters_id')]) }}">
              {{$publishCount->issuer_name}}
            </a></div>
            <div>{{$publishCount->first_quarter}}</div>
            <div>{{$publishCount->second_quarter}}</div>
            <div>{{$publishCount->third_quarter}}</div>
            <div>{{$publishCount->fourth_quarter}}</div>
            <div>{{$publishCount->year_number}}</div>
          @endforeach
          
      </div>
      </div>
    </div>
  </div>
@endsection
