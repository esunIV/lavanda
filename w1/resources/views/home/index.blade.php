@extends('layouts.main')
@section('content')
<h1>silence!</h1>
<div class="conteiner">
  <div><a href="{{route('home.create')}}"class="btn btn-success mb-3"> create</a></div>
  @foreach($posts as $post)
  <div><a href="{{route('home.show',$post->id)}}">{{$post->id}}.{{$post->название}}</a></div>
  @endforeach
</div>
@endsection