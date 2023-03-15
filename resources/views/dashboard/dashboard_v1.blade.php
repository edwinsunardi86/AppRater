@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    @if('loginSuccess')
        {{ session('loginSuccess') }}
    @endif
    @if('change')
        {{ session('change') }}
    @endif
</div>
@endsection