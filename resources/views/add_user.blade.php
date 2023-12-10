@extends("layouts.app")

@section("content")
<h1>Добавление пользователя</h1>
<form method="POST" action="">
	@csrf

	<div>
		<label for="name"><div>Имя:</div></label>
			<input type="text" name="name">
			@error("name")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="lastname"><div>Фамилия:</div></label>
			<input type="text" name="lastname">
			@error("lastname")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="email"><div>Почта:</div></label>
			<input type="email" name="email">
			@error("email")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="age"><div>Возраст:</div></label>
			<input type="number" name="age">
			@error("age")
				<span>{{ $message }}</span>
			@enderror
	</div>
	<button type="submit">Сохранить</button>
</form>
@endsection
