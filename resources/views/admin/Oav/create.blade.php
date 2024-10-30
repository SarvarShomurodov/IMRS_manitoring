@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ОАВ нашриёт ишлари қўшиш</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('oavpublish') }}"> Орқага</a>
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
                    <form action="{{ route('oavpublish.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name"><b>Ишлар номи</b></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('author') }}" required>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="oav_id"><b>Ишлар тури</b></label>
                                <select name="oav_id" id="oav_id" class="form-control" required>
                                    <option value="">-- Ишлар турлари --</option>
                                    @foreach($whogivens as $type)
                                    <option value="{{ $type->id }}" {{ old('oav_id', $type->oav_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>  

                            <div class="form-group col-lg-4">
                                <label for="author"><b>Ходим ФИО (бир нечта бўлса)</b></label>
                                <input type="fio" name="fio" id="fio" class="form-control" value="{{ old('author') }}" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="jurnal_name"><b>ОАВ номи</b></label>
                                <input type="oav_name" name="oav_name" id="oav_name" class="form-control" value="{{ old('author') }}" required>
                            </div>                

                            <div class="form-group col-lg-6">
                                <label for="number"><b>Ҳавола</b></label>
                                <textarea type="link" name="link" id="summernote2" class="form-control" value="{{ old('jurnal_name') }}" required></textarea>
                            </div>   

                            <div class="form-group col-lg-2">
                                <label for="date"><b>Нашр этилган санаси</b></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
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
