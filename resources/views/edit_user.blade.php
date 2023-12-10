@extends("layouts.app")

@section("content")
<h1>Редактирование пользователя</h1>
<form method="POST" action="">
	@csrf

	<input type="hidden" name="id" value="{{ $user->id }}">

	<div>
		<label for="name"><div>Имя:</div></label>
			<input type="text" name="name" value="{{ old("name") ?? $user->name }}">
			@error("name")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="lastname"><div>Фамилия:</div></label>
			<input type="text" name="lastname" value="{{ old("name") ?? $user->lastname }}">
			@error("lastname")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="email"><div>Почта:</div></label>
			<input type="email" name="email" value="{{ old("email") ?? $user->email }}">
			@error("email")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="age"><div>Возраст:</div></label>
			<input type="number" name="age" value="{{ old("age") ?? $user->age }}">
			@error("age")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<button type="submit">Сохранить</button>
</form>
@endsection
