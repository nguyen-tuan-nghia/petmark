@extends('layout.home')
@section('content')
<div class="container" style="width:70%;padding:5% ">
    <div><h1>{{$post->name}}</h1></div>
    <p>{{$post->created_At}}</p>
    <div>{!!$post->content!!}</div>
</div>
@endsection
