@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ИИК ҳузуридаги семинарлар қўшиш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('seminar') }}"> Орқага</a>
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
                    <form action="{{ route('seminar.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="author"><b>Диссертантнинг ф.и.ш.</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Диссертант ишлаётган  муассаса ёки ташкилот номи ва лавозими</b></label>
                                <input type="text" name="organizationName" id="organizationName" class="form-control" value="{{ old('organizationName') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Диссертация мавзуси</b></label>
                                <textarea type="text" name="topic" id="summernote" class="form-control" value="{{ old('topic') }}" required></textarea>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="author"><b>Илмий раҳбарининг ф.и.ш.</b></label>
                                <input type="text" name="leaderName" id="leaderName" class="form-control" value="{{ old('leaderName') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="type_id"><b>Қайси илмий даражага даъвогар (PhD/DSc)</b></label>
                                <select name="degree_id" id="degree_id" class="form-control" required>
                                    <option value="">-- илмий даража турлари --</option>
                                    @foreach($scientificIds as $type)
                                    <option value="{{ $type->id }}" {{ old('degree_id', $type->degree_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>                  

                            <div class="form-group col-lg-2">
                                <label for="start_date"><b>ўтказилган ИС санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                              </div>
              
                              <div class="form-group col-lg-2">
                                <label for="letter_number"><b>Иштирок этган ИС аъзолари сони</b></label>
                                <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}" min="0" required>
                              </div>

                              <div class="form-group col-lg-6">
                                <label for="author"><b>ИС хулосаси</b></label>
                                <textarea type="text" name="conclusion" id="summernote2" class="form-control" value="{{ old('conclusion') }}" required></textarea>
                              </div>

                            <div class="form-group col-lg-2">
                                <label for="quarters_id" class="form-label"><b>Чораклар</b></label>
                                <select name="quarters_id" id="quarters_id" class="form-control" required>
                                    <option value="">-- Чораклар --</option>
                                    @foreach($quarters as $quarter)
                                    <option value="{{ $quarter->id }}" {{ old('quarters_id') == $quarter->id ? 'selected' : '' }}>
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
