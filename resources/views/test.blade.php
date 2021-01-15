@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="l-wrapper__2colum u-site__width">

  <form action="{{route('twitter')}}" method="POST">
    <input type="submit" vavlue="送信">
  </form>
</div>
@endsection