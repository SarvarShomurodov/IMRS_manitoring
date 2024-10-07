<!-- resources/views/publishes/create.blade.php -->

@extends('layouts.app-admin')

@section('content')
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
            <div class="card-header">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h3>Илмий нашриёт ишлари қўшиш</h3>
                    <a href="{{ url('publishes') }}" class="btn btn-primary text-light ms-auto">Орқага</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('publishes.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6 mx-5">
                            <div class="form-group">
                                <label for="name"><b>Илмий иши номи</b></label>
                                <textarea type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="author"><b>Муаллифи</b></label>
                                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="type_id"><b>Илмий иш тури</b></label>
                                <select name="type_id" id="type_id" class="form-control" required>
                                    <option value="">-- Илмий иш турлари --</option>
                                    @foreach($publishTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('type_id', $type->type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="jurnal_name"><b>Журнал/анжуман ёки нашриёт номи</b></label>
                                <textarea type="text" name="jurnal_name" id="jurnal_name" class="form-control" value="{{ old('jurnal_name') }}" required></textarea>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="date"><b>Чоп этилган санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="number"><b>Журнал сони рақами</b></label>
                                <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}" min="0" required>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="pages"><b>Журнал/анжуман материаллар тўпламида бетлар</b></label>
                                <input type="number" name="pages" id="pages" class="form-control" value="{{ old('pages') }}" min="0" required>
                            </div>

                            <div class="form-group">
                                <label for="link"><b>Ҳавола</b></label>
                                <textarea type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" required></textarea>
                            </div>

                            <div class="form-group col-lg-4">
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
