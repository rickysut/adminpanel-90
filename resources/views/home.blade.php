@extends('layouts.admin')

@section('page_title')
    HOME
@endsection

@section('content')

@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif



@endsection
@section('scripts')
@parent

@endsection