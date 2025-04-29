@extends('layouts.app-admin')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Докторантура қўшиш</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ url('doctorate') }}"> Орқага</a>
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
<form action="{{ route('doctorate.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="dokt_id" class="form-label"><b>2024 ўқув йилига докторантурага қабул</b></label>
            <select name="dokt_id" class="form-control" id="dokt_id" class="form-control" required>
                <option value="">-- 2024 докторантурага қабул --</option>
                @foreach($studentsid as $whogiven)
                    <option value="{{ $whogiven->id }}" {{ old('whogiven') == $whogiven->id ? 'selected' : '' }}>
                        {{ $whogiven->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-lg-2">
            <label for="soni"><b>Докторантурага қабул сони</b></label>
            <input type="soni" name="soni" id="soni" class="form-control" value="{{ old('soni') }}" min="0" placeholder="қабул сони" required>
        </div>

        <div class="form-group col-lg-3">
            <label for="soni"><b>Макроиқтисодиёт 08.00.02 сони</b></label>
            <input type="makro" name="makro" id="makro" class="form-control" value="{{ old('makro') }}" min="0" placeholder="Макроиқтисодиёт 08.00.02 сони">
        </div>

        <div class="form-group col-lg-3">
            <label for="soni"><b>Минтақавий иқтисодиёт 08.00.12 сони</b></label>
            <input type="minta" name="minta" id="minta" class="form-control" value="{{ old('minta') }}" min="0" placeholder="Минтақавий иқтисодиёт 08.00.12 сони">
        </div>

        {{-- <div class="form-group col-lg-2">
            <label for="interyu"><b>Ихтисослиги</b></label><br>
            <select class="form-control" name="ixtisosligi" id="ixtisosligi">
                <option value="">-- Tanlang --</option>
                <option value="-">--</option>
                <option value="макроиқтисодиёт 08.00.02">макроиқтисодиёт 08.00.02</option>
                <option value="минтақавий иқтисодиёт 08.00.12">минтақавий иқтисодиёт 08.00.12</option>
              </select>
        </div> --}}

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
