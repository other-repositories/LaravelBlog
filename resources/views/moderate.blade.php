@extends("layouts.app")

@section("content")
<h1>Пользователи</h1>
<table>
<tr>
	<th>Имя</th>
	<th>Комментарий</th>
	<th>Одобрение</th>
	<th>Удаление</th>
</tr>
@foreach ($rows as $row)
	<tr>
		<td>{{$row->name}}</a></td>
		<td>{{$row->text}}</td>
     		<td><p><a href="/moderate/{{$row->id}}/approve">Одобрить</a></p></td>
     		<td><p><a href="/moderate/{{$row->id}}/delete">Удалить</a></p></td>


	</tr>
@endforeach
</table>

@endsection
