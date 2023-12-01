@extends('app.app')
@section('content')
    @foreach ($categories as $item)
        <a href="/course/{{$item->id}}">{{$item->title}}</a>
    @endforeach
@endsection
