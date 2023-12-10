@extends("layouts.app")

@section("content")
<div>
	<h1>{{$post->title}}</h1>
	<p>{{$post->text}}</p>
</div>
@foreach ($rows as $row)
	<div>
		<h4>{{$row->name}}</h4>
		<p>{{$row->text}}</p>
	</div>
@endforeach

<p><a href="/posts/post/{{ $post->id }}/comment/add">Новый комментарий</a></p>

@endsection
