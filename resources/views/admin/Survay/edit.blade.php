@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Cўровномаларни таҳрирлаш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('survay') }}"> Орқага</a>
      </div>
  </div>
</div>
<hr>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('survay.update', $survays->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="name"><b>Сўровнома номи</b></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $survays->name) }}" required>
        </div>
        <div class="form-group col-lg-4">
            <label for="who_given_id" class="form-label"><b>Асос</b></label>
            <select name="who_given_id" class="form-control" id="who_given_id" required>
                <option value="">-- Ким томонидан берилди --</option>
                @foreach($whogivens as $whogiven)
                    <option value="{{ $whogiven->id }}" {{ old('who_given_id', $survays->who_given_id) == $whogiven->id ? 'selected' : '' }}>
                        {{ $whogiven->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2">
            <label for="assDate"><b>Топшириқ санаси(ёки хатсиз)</b></label>
            <input type="date" name="assDate" id="assDate" class="form-control" value="{{ old('assDate', $survays->assDate) }}" required>
        </div>
        <div class="form-group col-lg-2">
            <label for="assNumber"><b>Топшириқ рақами(ёки хатсиз)</b></label>
            <input type="number" name="assNumber" id="assNumber" class="form-control" value="{{ old('assNumber', $survays->assNumber) }}" required>
        </div>
        <div class="form-group col-lg-6">
            <label for="whoSend"><b>Кимга юборилди</b></label>
            <input type="text" name="whoSend" id="whoSend" class="form-control" value="{{ old('whoSend', $survays->whoSend) }}" required>
        </div>
        <div class="form-group col-lg-2">
            <label for="letterDate"><b>Хат санаси</b></label>
            <input type="date" name="letterDate" id="letterDate" class="form-control" value="{{ old('letterDate', $survays->letterDate) }}" required>
        </div>

        <div class="form-group col-lg-2">
            <label for="letterNumber"><b>Хат рақами</b></label>
            <input type="number" name="letterNumber" id="letterNumber" class="form-control" value="{{ old('letterNumber', $survays->letterNumber) }}" required>
        </div>

        <div class="form-group col-lg-6">
            <label for="shortResult"><b>Қисқа натижалари</b></label>
            <textarea name="shortResult" id="summernote" class="form-control" required>{{ old('shortResult', $survays->shortResult) }}</textarea>
        </div>

        <div class="form-group col-lg-4">
            <label for="direction"><b>Йўналиш</b></label>
            <input type="text" name="direction" id="direction" class="form-control" value="{{ old('direction', $survays->direction) }}" required>
        </div>

        <div class="form-group col-lg-2">
            <label for="regions_id" class="form-label"><b>Манзил(давлат ёки ҳудуд)</b></label>
            <select name="regions_id[]" class="form-control" id="regions_id" multiple required>
                <option value="">-- Xудуд --</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" 
                        {{ in_array($region->id, old('regions_id', $survays->regions->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $region->name }}
                    </option>
                @endforeach
            </select>
          </div>

        <div class="form-group col-lg-6">
            <label for="listPerson"><b>Иштирок этган ходимлар</b></label>
            <textarea name="listPerson" id="summernote2" class="form-control">{{ old('listPerson', $survays->listPerson) }}</textarea>
        </div>
        
        @php
            $yesNoOptions = ['Ha' => 'ҳа', 'Yo`q' => 'йўқ'];
        @endphp

        @foreach(['readyArticle' => 'Мақола тайёрланган', 'telegram' => 'Телеграм пост тайёрланган', 'pressRelis' => 'Пресс релиз тайёрланган', 'infografik' => 'Инфографика тайёрланган', 'interyu' => 'Интервью тайёрланган', 'taqdimot' => 'Тақдимот ёки видеоролик тайёрланган'] as $field => $label)
        <div class="form-group col-lg-3">
            <label for="{{ $field }}"><b>{{ $label }} (ҳа, йўқ)</b></label><br>
            <select class="form-control" name="{{ $field }}" id="{{ $field }}">
                <option value="">-- Tanlang --</option>
                @foreach($yesNoOptions as $value => $text)
                    <option value="{{ $value }}" {{ old($field, $survays->$field) == $value ? 'selected' : '' }}>{{ $text }}</option>
                @endforeach
            </select>
        </div>
        @endforeach

        <div class="form-group col-lg-2">
            <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
            <select name="quarters_id" class="form-control" id="quarters_id" required>
                <option value="">-- Чораклар --</option>
                @foreach($quarters as $quarter)
                    <option value="{{ $quarter->id }}" {{ old('quarters_id', $survays->quarters_id) == $quarter->id ? 'selected' : '' }}>
                        {{ $quarter->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="card-action">
            <button class="btn btn-success">Сақлаш</button>
        </div>
    </div>
</form>
@endsection
