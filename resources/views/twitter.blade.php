@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

@if(session('flash_message'))
  <flash-message></flash-message>
@endif

<form action="{{ route('twitter')}}" method="post">
  @csrf
  <input type="submit" value="submit">
</form>

<!-- test -->
@endsection