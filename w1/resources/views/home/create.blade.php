@extends('layouts.main')
@section('content')
<h1>silence!</h1>
<div class="conteiner">
<form action="{{route('home.store')}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="название" class="form-label">название анямэ</label>
    <input type="text" class="form-control" name="название" id="название">
  </div>
  <div class="mb-3">
    <label for="студия" class="form-label">студия</label>
    <input type="text" class="form-control" name="студия" id="студия">
  </div>
  <div class="mb-3">
    <label for="оценка" class="form-label">оценка</label>
    <input type="text" class="form-control" name="оценка" id="оценка">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
<div><a href="{{route('home.index')}}">back</a></div>
<div id="emailHelp" class="form-text">We'll never discussion yourbrowser  story  with anyone else.</div>
</div>
@endsection