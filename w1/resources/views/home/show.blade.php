@extends('layouts.main')
@section('content')
<h1>silence!</h1>
<div class="conteiner">
  <div>название: {{$post->название}}</div>
  <div>студия: {{$post->студия}}</div>
  <div> оценка: {{$post->оценка}}</div>
</div>
<div>
  <form action="{{route('home.delete', $post->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete" class="btn btn-danger">
  </form>

</div>
<div><a href="{{route('home.edit', $post->id)}}">edit</a></div>
<div><a href="{{route('home.index')}}">back</a></div>
@endsection