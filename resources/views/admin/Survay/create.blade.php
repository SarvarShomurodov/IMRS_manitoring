@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Cўровномалар қўшиш</h2>
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
<form action="{{ route('survay.store') }}" method="POST">
    @csrf
    <div class="row">
    <div class="form-group col-lg-6">
          <label for="date"><b>Сўровнома номи</b></label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group col-lg-4">
        <label for="who_given_id" class="form-label"><b>Асос</b></label>
        <select name="who_given_id" class="form-control" id="who_given_id" class="form-control" required>
            <option value="">-- Ким томонидан берилди --</option>
            @foreach($whogivens as $whogiven)
                <option value="{{ $whogiven->id }}" {{ old('whogiven') == $whogiven->id ? 'selected' : '' }}>
                    {{ $whogiven->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-lg-2">
      <label for="date"><b>Топшириқ санаси(ёки хатсиз)</b></label>
      <input type="date" name="assDate" id="assDate" class="form-control" value="{{ old('assDate') }}" required>
    </div>
    <div class="form-group col-lg-2">
        <label for="assNumber"><b>Топшириқ рақами(ёки хатсиз)</b></label>
        <input type="number" name="assNumber" id="assNumber" class="form-control" value="{{ old('assNumber') }}" required>
    </div>
    <div class="form-group col-lg-6">
        <label for="whoSend"><b>Кимга юборилди</b></label>
        <input type="text" name="whoSend" id="whoSend" class="form-control" value="{{ old('whoSend') }}" required>
    </div>
    <div class="form-group col-lg-2">
        <label for="letterDate"><b>Хат санаси</b></label>
        <input type="date" name="letterDate" id="letterDate" class="form-control" value="{{ old('letterDate') }}" required>
    </div>

    <div class="form-group col-lg-2">
        <label for="letterNumber"><b>Хат рақами</b></label>
        <input type="number" name="letterNumber" id="letterNumber" class="form-control" value="{{ old('letterNumber') }}" required>
    </div>

    <div class="form-group col-lg-6">
        <label for="shortResult"><b>Қисқа натижалари</b></label>
        <textarea name="shortResult" id="summernote" class="form-control" required>{{ old('shortResult') }}</textarea>
    </div>

    <div class="form-group col-lg-4">
        <label for="direction"><b>	Йўналиш</b></label>
        <input type="text" name="direction" id="direction" class="form-control" value="{{ old('direction') }}" required>
    </div>

    <div class="form-group col-lg-2">
        <label for="regions_id" class="form-label"><b>Манзил (давлат ёки ҳудуд)</b></label>
        <select name="regions_id[]" class="form-control" id="regions_id" multiple required>
            @foreach($regions as $region)
                <option value="{{ $region->id }}" 
                    {{ (collect(old('regions_id'))->contains($region->id)) ? 'selected' : '' }}>
                    {{ $region->name }}
                </option>
            @endforeach
        </select>
      </div>

    <div class="form-group col-lg-2">
        <label for="readyArticle"><b>Мақола тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="readyArticle" id="readyArticle">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>
    <div class="form-group col-lg-3">
        <label for="telegram"><b>Телеграм пост тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="telegram" id="telegram">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>
    <div class="form-group col-lg-2">
        <label for="pressRelis"><b>Пресс релиз тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="pressRelis" id="pressRelis">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>
    <div class="form-group col-lg-3">
        <label for="infografik"><b>Инфографика тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="infografik" id="infografik">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>
    <div class="form-group col-lg-2">
        <label for="interyu"><b>Интервью тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="interyu" id="interyu">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>

    <div class="form-group col-lg-6">
        <label for="listPerson"><b>Иштирок этган ходимлар</b></label>
        <textarea name="listPerson" id="summernote2" class="form-control">{{ old('listPerson') }}</textarea>
    </div>

    <div class="form-group col-lg-3">
        <label for="taqdimot"><b>Тақдимот ёки видеоролик тайёрланган (ҳа, йўқ)</b></label><br>
        <select class="form-control" name="taqdimot" id="taqdimot">
            <option value="">-- Tanlang --</option>
            <option value="Ha">ҳа</option>
            <option value="Yo`q">йўқ</option>
          </select>
    </div>

      <div class="form-group col-lg-2">
        <label for="quarters_id" class="form-label"><b>Қайси чоракда</b></label>
        <select name="quarters_id" class="form-control" id="quarters_id" class="form-control" required>
            <option value="">-- Чораклар --</option>
            @foreach($quarters as $quarter)
                <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
                    {{ $quarter->name }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="card-action">
        <button class="btn btn-success">Жо`натиш</button>
      </div>
  </div>
</form>
@endsection
