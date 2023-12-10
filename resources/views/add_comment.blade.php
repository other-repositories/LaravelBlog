@extends("layouts.app")

@section("content")
<h1>Добавление комментария</h1>
<form method="POST" action="">

	@csrf

	<div>
		<label for="name"><div>Имя:</div></label>
			<input type="text" name="name">
			@error("title")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="text"><div>Комментарий:</div></label>
			<textarea name="text"></textarea>
			@error("text")
				<span>{{ $message }}</span>
			@enderror
	</div>
	<button type="submit">Сохранить</button>
</form>
@endsection
