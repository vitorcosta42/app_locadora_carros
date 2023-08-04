@extends('layouts.app')

@section('content')
    <Login csrf_token="
    {{ @csrf_token() }}
    " />
@endsection
