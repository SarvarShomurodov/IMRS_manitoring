@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Илмий методологик семинар ўзгартириш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('methods') }}"> Орқага</a>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('methods.update',$methods->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="type"><b>Семинарда кўрилган масала тури</b></label><br>
                                {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
                                <select class="form-control" name="type" id="type">
                                    <option value="етакчи ташкилот семинари" {{ $methods->type == 'етакчи ташкилот семинари' ? 'selected' : '' }}>Етакчи ташкилот семинари</option>
                                    <option value="Институт ходимлари тақдимоти" {{ $methods->type == 'Институт ходимлари тақдимоти' ? 'selected' : '' }}>Институт ходимлари тақдимоти</option>
                                  </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Маърузачининг ф.и.ш.</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $methods->name }}" required>
                            </div>

                            {{-- <div class="form-group col-lg-6">
                                <label for="author"><b>Маърузачи лавозими</b></label>
                                <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}" required>
                            </div> --}}

                            <div class="form-group col-lg-4">
                                <label for="type"><b>Маърузачи лавозими</b></label><br>
                                {{-- <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required> --}}
                                <select class="form-control" name="position" id="position">
                                    <option value="докторант" {{ $methods->position == 'докторант' ? 'selected' : '' }}>докторант</option>
                                    <option value="таянч докторант" {{ $methods->position == 'таянч докторант' ? 'selected' : '' }}>таянч докторант</option>
                                    <option value="мустақил изланувчи" {{ $methods->position == 'мустақил изланувчи' ? 'selected' : '' }}>мустақил изланувчи</option>
                                    <option value="илмий ходим" {{ $methods->position == 'илмий ходим' ? 'selected' : '' }}>илмий ходим</option>
                                  </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Маърузачи ишлаётган муассаса ёки ташкилот номи</b></label>
                                <input type="text" name="reportName" id="reportName" class="form-control" value="{{ $methods->reportName }}" required>
                            </div>

                            <div class="form-group col-lg-2">
                                <label for="start_date"><b>Семинар санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $methods->date }}" required>
                              </div>
              
                              <div class="form-group col-lg-2">
                                <label for="letter_number"><b>Иштирок этган семинар аъзолари сони</b></label>
                                <input type="number" name="number" id="number" class="form-control" value="{{ $methods->number }}" min="0" required>
                              </div>

                              <div class="form-group col-lg-6">
                                <label for="author"><b>Семинар хулосаси</b></label>
                                <textarea type="text" name="conclusion" id="summernote" class="form-control" value="" required>{{ $methods->conclusion }}</textarea>
                              </div>

                            <div class="form-group col-lg-2">
                                <label for="quarters_id" class="form-label"><b>Чораклар</b></label>
                                <select name="quarters_id" id="quarters_id" class="form-control" required>
                                    <option value="">-- Чораклар --</option>
                                    @foreach($quarters as $quarter)
                                    <option value="{{ $quarter->id }}" 
                                        {{ (old('quarters_id', $methods->quarters_id ?? '') == $quarter->id) ? 'selected' : '' }}>
                                        {{ $quarter->name }}
                                      </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Жо`натиш</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
