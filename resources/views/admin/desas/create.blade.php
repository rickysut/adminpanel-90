@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.desa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.desas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kd_kec_id">{{ trans('cruds.desa.fields.kd_kec') }}</label>
                <select class="form-control select2 {{ $errors->has('kd_kec') ? 'is-invalid' : '' }}" name="kd_kec_id" id="kd_kec_id" required>
                    @foreach($kd_kecs as $id => $entry)
                        <option value="{{ $id }}" {{ old('kd_kec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kd_kec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.kd_kec_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_desa">{{ trans('cruds.desa.fields.kd_desa') }}</label>
                <input class="form-control {{ $errors->has('kd_desa') ? 'is-invalid' : '' }}" type="number" name="kd_desa" id="kd_desa" value="{{ old('kd_desa', '') }}" step="1" required>
                @if($errors->has('kd_desa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_desa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.kd_desa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nm_desa">{{ trans('cruds.desa.fields.nm_desa') }}</label>
                <input class="form-control {{ $errors->has('nm_desa') ? 'is-invalid' : '' }}" type="text" name="nm_desa" id="nm_desa" value="{{ old('nm_desa', '') }}" required>
                @if($errors->has('nm_desa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_desa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.nm_desa_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection