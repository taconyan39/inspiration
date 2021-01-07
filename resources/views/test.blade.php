@extends('layouts.app')

@section('content')

<form action="{{ route('mail') }}">
  <button>送信</button>
</form>

@endsection