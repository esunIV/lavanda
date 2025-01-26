@extends('layouts.main')
@section('content')
<h1>silence!</h1>
<div class="conteiner">
<form action="{{route('home.update', $post->id)}}" method="post">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="название" class="form-label">название анямэ</label>
    <input type="text" class="form-control" name="название" id="название" value="{{ $post->название }}">
  </div>
  <div class="mb-3">
    <label for="студия" class="form-label">студия</label>
    <input type="text" class="form-control" name="студия" id="студия" value="{{ $post->студия }}" >
  </div>
  <div class="mb-3">
    <label for="оценка" class="form-label">оценка</label>
    <input type="text" class="form-control" name="оценка" id="оценка"  value="{{ $post->оценка }}">
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
<div><a href="{{route('home.index')}}">back</a></div>
<div id="emailHelp" class="form-text">We'll never discussion yourbrowser  story  with anyone else.</div>
</div>
@endsection