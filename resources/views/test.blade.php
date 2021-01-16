@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

@if(session('flash_message'))
  <flash-message></flash-message>
@endif

<form action="{{ route('test')}}" method="post">
  @csrf
  <input type="submit" value="submit">
</form>

@endsection