@extends('layouts.client')

@section('title', 'Asosiy')

@section('content')
<style>
  .left-align{
    text-align: left;
    width: 66%;
  }
  table tr td{
      text-align: center;
      font-size: 17px;
  }
  .left-align a{
    text-decoration: none;
  }
</style>
<div class="row">
  <div class="col-lg-12 margin-tb">
      <h4 class="text-center">Ўзбекистон Республикаси Вазирлар Маҳкамаси ҳузуридаги Макроиқтисодий ва ҳудудий тадқиқотлар институтида 2024 йил давомида амалга оширилган ишлар тўғрисида 
        МАЪЛУМОТ</h4>
  </div>
</div>
<table>
  <thead>
    <tr>
      <th>№</th>
      <th>КО`РСАТКИЧ НОМИ</th>
      <th>1-ЧОРАК</th>
      <th>2-ЧОРАК</th>
      <th>3-ЧОРАК</th>
      <th>4-ЧОРАК</th>
      {{-- <th>Yillik</th> --}}
    </tr>
  </thead>
  <tbody>
      <tr style="background-color: #ffffff">
        @foreach($higherOrganCounts as $higherOrganCount)
          @if ($higherOrganCount->id == 13)
            <td>1</td>
            <td class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 13]) }}"><b>{{$higherOrganCount->issuer_name}}</b></a></td>
            <td>{{$higherOrganCount->first_quarter}} </td>
            <td>{{$higherOrganCount->second_quarter}}</td> 
            <td>{{$higherOrganCount->third_quarter}} </td>
            <td>{{$higherOrganCount->fourth_quarter}}</td>
            {{-- <td>{{ $higherOrganCount->first_quarter + $higherOrganCount->second_quarter +$higherOrganCount->third_quarter + $higherOrganCount->fourth_quarter}}</td> --}}
          @endif
        @endforeach
      </tr>
      <tr style="background-color: #ffffff">
        @foreach($higherOrganCounts as $higherOrganCount)
            @if ($higherOrganCount->id == 14)
              <td>2</td>
              <td class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 14]) }}"><b>{{$higherOrganCount->issuer_name}}</b></a></td>
              <td>{{$higherOrganCount->first_quarter}} </td>
              <td>{{$higherOrganCount->second_quarter}}</td> 
              <td>{{$higherOrganCount->third_quarter}} </td>
              <td>{{$higherOrganCount->fourth_quarter}}</td>
              {{-- <td>{{ $higherOrganCount->first_quarter + $higherOrganCount->second_quarter + $higherOrganCount->third_quarter + $higherOrganCount->fourth_quarter}}</td> --}}
            @endif              
        @endforeach 
      </tr>
      <tr style="background-color: #ffffff">
          <td>3</td>
          <td class="left-align"><a style="color: rgb(48, 48, 48)" href="{{ url('higher_organs') }}"><b>Юқори ташкилотларнинг топшириқларга  мувофиқ бажарилган ишлар сони, шундан</b></a></td>
          <td>{{$higherOrgans[0]->first_quater}} </td>
          <td>{{$higherOrgans[0]->second_quater}}</td> 
          <td>{{$higherOrgans[0]->third_quater}} </td>
          <td>{{$higherOrgans[0]->fourth_quater}}</td> 
          {{-- <td>{{ $higherOrgans[0]->first_quater + $higherOrgans[0]->second_quater +$higherOrgans[0]->third_quater + $higherOrgans[0]->fourth_quater}}</td>  --}}
      </tr>
      @foreach($higherOrganCounts as $higherOrganCount)
        <tr style="background-color: #ffffff">
          @if($higherOrganCount->id != 13 && $higherOrganCount->id != 14 && $higherOrganCount->id != 12)
            <td>3.{{ $higherOrganCount->id }}</td>
            <td class="left-align">
              <a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => $higherOrganCount->id]) }}">
                {{$higherOrganCount->issuer_name}}
              </a>
            </td>
            <td>{{$higherOrganCount->first_quarter}} </td>
            <td>{{$higherOrganCount->second_quarter}}</td> 
            <td>{{$higherOrganCount->third_quarter}} </td>
            <td>{{$higherOrganCount->fourth_quarter}}</td>  
          @endif
        </tr>
      @endforeach
      <tr style="background-color: #ffffff">
        <td class="id">5</td>
        <td class="left-align">
            <a style="color: rgb(48, 48, 48)" href="{{ url('business_trips') }}">
                <b>Хизмат сафарлар</b>
            </a>
        </td>
        <td>{{$businessTripCounts[0]->first_quater}}</td>
        <td>{{$businessTripCounts[0]->second_quater}}</td>
        <td>{{$businessTripCounts[0]->third_quater}}</td>
        <td>{{$businessTripCounts[0]->fourth_quater}}</td>
      </tr>
      @foreach($higherOrganCounts as $higherOrganCount)
        @if ($higherOrganCount->id == 12)
          <tr style="background-color: #ffffff">
              <td class="id">6</td>
              <td class="left-align">
                  <a style="color: rgb(48, 48, 48)" href="{{ route('higher_organs.index', ['who_given_id' => 12]) }}">
                      <b>{{$higherOrganCount->issuer_name}}</b>
                  </a>
              </td>
              <td>{{$higherOrganCount->first_quarter}}</td>
              <td>{{$higherOrganCount->second_quarter}}</td>
              <td>{{$higherOrganCount->third_quarter}}</td>
              <td>{{$higherOrganCount->fourth_quarter}}</td>
              {{-- <td>{{$higherOrganCount->year_number}}</td> --}}
          </tr>
        @endif
      @endforeach
      <tr style="background-color: #ffffff">
        <td class="id">7</td>
        <td class="left-align">
            <a style="color: rgb(48, 48, 48)" href="{{ url('training_courses') }}">
                <b>Тренинглар, ўқув курслари (сертификат билан)</b>
            </a>
        </td>
        <td>{{$trainingCourseCounts[0]->first_quater}}</td>
        <td>{{$trainingCourseCounts[0]->second_quater}}</td>
        <td>{{$trainingCourseCounts[0]->third_quater}}</td>
        <td>{{$trainingCourseCounts[0]->fourth_quater}}</td>
      </tr>
      <tr style="background-color: #ffffff">
        <td class="id">8</td>
        <td class="left-align">
            <a style="color: rgb(48, 48, 48)" href="{{ url('publishes') }}">
                <b>Илмий нашриёт ишлари сони</b>
            </a>
        </td>
        <td>{{$publish[0]->first_quater}}</td>
        <td>{{$publish[0]->second_quater}}</td>
        <td>{{$publish[0]->third_quater}}</td>
        <td>{{$publish[0]->fourth_quater}}</td>
      </tr>
      @foreach($publishCounts as $publishCount)
        <tr style="background-color: #ffffff">
          <td>8.{{$publishCount->id}}</td>
          <td class="left-align">
              <a style="color: rgb(48, 48, 48)" href="{{ route('publishes.index', ['type_id' => $publishCount->id]) }}">
                  {{$publishCount->issuer_name}}
              </a>
          </td>
          <td>{{$publishCount->first_quarter}}</td>
          <td>{{$publishCount->second_quarter}}</td>
          <td>{{$publishCount->third_quarter}}</td>
          <td>{{$publishCount->fourth_quarter}}</td>
          {{-- <td>{{$publishCount->year_number}}</td> --}}
        </tr>
      @endforeach
      <tr style="background-color: #ffffff">
        <td class="id">9</td>
        <td class="left-align">
            <a style="color: rgb(48, 48, 48)" href="{{ url('oavpublish') }}">
                <b>ОАВ нашриёт ишлари сони</b>
            </a>
        </td>
        <td>{{$opublishes[0]->first_quarter}}</td>
        <td>{{$opublishes[0]->second_quarter}}</td>
        <td>{{$opublishes[0]->third_quarter}}</td>
        <td>{{$opublishes[0]->fourth_quarter}}</td>
      </tr>
      @foreach($opublishCounts as $publishCount)
          <tr style="background-color: #ffffff">
              <td>9.{{$publishCount->id}}</td>
              <td class="left-align">
                  <a style="color: rgb(48, 48, 48)" href="{{ route('oavpublish.index', ['oav_id' => $publishCount->id]) }}">
                      {{$publishCount->issuer_name}}
                  </a>
              </td>
              <td>{{$publishCount->first_quarter}}</td>
              <td>{{$publishCount->second_quarter}}</td>
              <td>{{$publishCount->third_quarter}}</td>
              <td>{{$publishCount->fourth_quarter}}</td>
              {{-- <td>{{$publishCount->year_number}}</td> --}}
          </tr>
      @endforeach
        @foreach($conventions as $convention)
        <tr style="background-color: #ffffff">
            <td>10</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('conventions') }}">
                    <b>Юқори ташкилотларнинг топшириқларга  мувофиқ семинарлар, вебинарлар, давра сухбатлар, конференциялар, форумлар ва бошқа тадбирларда иштирок этиш (публикациясиз)</b>
                </a>
            </td>
            <td>{{$convention->first_quarter}}</td>
            <td>{{$convention->second_quarter}}</td>
            <td>{{$convention->third_quarter}}</td>
            <td>{{$convention->fourth_quarter}}</td>
        </tr>
        @endforeach
    
        @foreach($scientifics as $scientific)
        <tr style="background-color: #ffffff">
            <td>11</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('scientific') }}">
                    <b>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш мажлислари</b>
                </a>
            </td>
            <td>{{$scientific->first_quarter}}</td>
            <td>{{$scientific->second_quarter}}</td>
            <td>{{$scientific->third_quarter}}</td>
            <td>{{$scientific->fourth_quarter}}</td>
        </tr>
        @endforeach
    
        @foreach($seminars as $seminar)
          <tr style="background-color: #ffffff">
            <td>12</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('seminar') }}">
                    <b>Илмий даражаларни ва унвонларни берувчи Илмий Кенгаш хузуридаги Илмий семинар йиғилишлари</b>
                </a>
            </td>
            <td>{{$seminar->first_quarter}}</td>
            <td>{{$seminar->second_quarter}}</td>
            <td>{{$seminar->third_quarter}}</td>
            <td>{{$seminar->fourth_quarter}}</td>
          </tr>
        @endforeach
    
        @foreach($methods as $method)
        <tr style="background-color: #ffffff">
            <td>13</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('methods') }}">
                    <b>Институт Илмий-амалий семинар йиғилишлари</b>
                </a>
            </td>
            <td>{{$method->first_quarter}}</td>
            <td>{{$method->second_quarter}}</td>
            <td>{{$method->third_quarter}}</td>
            <td>{{$method->fourth_quarter}}</td>
        </tr>
        @endforeach
    
        @foreach($youngEconomistCounts as $youngEconomist)
          <tr style="background-color: #ffffff">
            <td>14</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('young_economists') }}">
                    <b>Институт Ёш иқтисодчилар мажлислари сони</b>
                </a>
            </td>
            <td>{{$youngEconomist->first_quater}}</td>
            <td>{{$youngEconomist->second_quater}}</td>
            <td>{{$youngEconomist->third_quater}}</td>
            <td>{{$youngEconomist->fourth_quater}}</td>
          </tr>
        @endforeach
    
        @foreach($studentCounts as $studentCount)
          <tr style="background-color: #ffffff">
            <td>15</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('doctorate') }}">
                   <b>Ўқув йилида докторантурага қабул қилинганларнинг сони:</b>
                </a>
            </td>
            <td>{{$studentCount->quarter_1}}</td>
            <td>{{$studentCount->quarter_2}}</td>
            <td>{{$studentCount->quarter_3}}</td>
            <td>{{$studentCount->quarter_4}}</td>
          </tr>
        @endforeach

        @foreach($students as $student)
          <tr style="background-color: #ffffff">
            <td>
              @if($student->dokt_id == 4 || $student->dokt_id == 5)
                  
              @else
                  15.{{ $student->dokt_id }}
              @endif
            </td>
            <td class="left-align">
              @if($student->dokt_id == 3)
                  <span style="color: rgb(48, 48, 48)">{{$student->dokt_name}}</span>
              @else
                  <a style="color: rgb(48, 48, 48)" 
                     href="{{ route('doctorate.index', ['dokt_id' => $student->dokt_id]) }}">
                      {{$student->dokt_name}}
                  </a>
              @endif
          </td>
            {{-- <td>{{ $student->dokt_id }}</td> --}}
            <td>{{ $student->quarter_1 }}</td>
            <td>{{ $student->quarter_2 }}</td>
            <td>{{ $student->quarter_3 }}</td>
            <td>{{ $student->quarter_4 }}</td>
          </tr>
        @endforeach
    
        {{-- @foreach($studentCounts as $publishCount)
          <tr>
            <td></td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ route('doctorate.index',['dokt_id' => $publishCount->id]) }}">
                    {{$publishCount->issuer_name}}
                </a>
            </td>
            <td>{{$publishCount->first_quarter}}</td>
            <td>{{$publishCount->second_quarter}}</td>
            <td>{{$publishCount->third_quarter}}</td>
            <td>{{$publishCount->fourth_quarter}}</td>
          </tr>
        @endforeach --}}
    
        @foreach($nullScientifics as $nullScientific)
        <tr style="background-color: #ffffff">
            <td>16</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('scientific') }}">
                    <b>Илмий даражага эга бўлиш учун ҳимояга чиққан илмий изланувчилар сони</b>
                </a>
            </td>
            <td>{{$nullScientific->first_quarter}}</td>
            <td>{{$nullScientific->second_quarter}}</td>
            <td>{{$nullScientific->third_quarter}}</td>
            <td>{{$nullScientific->fourth_quarter}}</td>
        </tr>
        @endforeach
    
        @foreach($nullScientificCounts as $publishCount)
          <tr style="background-color: #ffffff">
            <td></td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ route('scientific.index',['degree_id' => $publishCount->id, 'quarters_id' => request('quarters_id')]) }}">
                    {{$publishCount->issuer_name}}
                </a>
            </td>
            <td>{{$publishCount->first_quarter}}</td>
            <td>{{$publishCount->second_quarter}}</td>
            <td>{{$publishCount->third_quarter}}</td>
            <td>{{$publishCount->fourth_quarter}}</td>
          </tr>
        @endforeach
    
        @foreach($events as $event)
          <tr style="background-color: #ffffff">
            <td>17</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('event') }}">
                    <b>Институт томонидан ташкиллаштирилган семинарлар, давра суҳбатлар, конференциялар, форумлар</b>
                </a>
            </td>
            <td>{{$event->first_quarter}}</td>
            <td>{{$event->second_quarter}}</td>
            <td>{{$event->third_quarter}}</td>
            <td>{{$event->fourth_quarter}}</td>
          </tr>
        @endforeach
    
        @foreach($meetings as $meeting)
          <tr>
            <td>18</td>
            <td class="left-align">
                <a style="color: rgb(48, 48, 48)" href="{{ url('meeting') }}">
                    <b>Институт томонидан ташкиллаштирилган музокаралар ва учрашувлар</b>
                </a>
            </td>
            <td>{{$meeting->first_quarter}}</td>
            <td>{{$meeting->second_quarter}}</td>
            <td>{{$meeting->third_quarter}}</td>
            <td>{{$meeting->fourth_quarter}}</td>
          </tr>
        @endforeach 
  </tbody>
</table>
@endsection
