@extends("layouts.app")

@section("content")
<h1>{{$user->name}} {{$user->lastname}}</h1>
<p>
	<a href="/user/{{ $user->id }}/edit">Редактировать</a> | <a href="/user/{{ $user->id }}/delete">Удалить</a>
</p>
<p>
	Почта: {{$user->email}}
</p>
<p>
	Возраст: {{$user->age}}
</p>
<p>
	<a href="/user/{{ $user->id }}/post/add">Создать пост</a> 
</p>
<h3>Посты:</h3>

	@foreach ($user->posts as $row)
<div>
		<p><h4>{{$row->title}}</h4> <a href="/user/{{ $user->id }}/post/{{ $row->id }}/edit">Редактировать</a> | <a href="/user/{{ $user->id }}/post/{{ $row->id }}/delete">Удалить</a>
		<p>{{$row->text}}</p>
</div>
	@endforeach


@endsection
