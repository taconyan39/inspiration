@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

@if(session('flash_message'))
  <flash-message></flash-message>
@endif

<form action="{{ route('share')}}" method="post">
  @csrf
  <input type="submit" value="submit">
</form>

<!-- test -->
@endsection