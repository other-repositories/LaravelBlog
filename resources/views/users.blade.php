@extends("layouts.app")

@section("content")
<h1>Пользователи</h1>
<table>
<tr>
	<th>Имя</th>
	<th>Фамилия</th>
	<th>Возраст</th>
</tr>
@foreach ($rows as $row)
	<tr>
		<td><a href="/user/{{$row->id}}">{{$row->name}}</a></td>
		<td>{{$row->lastname}}</td>
		<td>{{$row->age}}</td>

	</tr>
@endforeach
</table>
<p><a href="/user/add">Добавить</a></p>
@endsection
