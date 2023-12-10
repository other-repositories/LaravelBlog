@extends("layouts.app")

@section("content")
<h1>Посты</h1>
@foreach ($rows as $row)
<div>
		<p><b>{{$row->title}}</b>
		<span><a href="/user/{{ $row->user->id }}">{{$row->user->name}} {{$row->user->lastname}}</a></span>
		<p>{{$row->text}}</p>
		<p><a href="/posts/post/{{ $row->id }}">Просмотреть комментарии</a></p>
</div>
	@endforeach

@endsection
