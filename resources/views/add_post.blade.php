@extends("layouts.app")

@section("content")
<h1>Добавление поста</h1>
<form method="POST" action="">

	@csrf

	<div>
		<label for="title"><div>Тема:</div></label>
			<input type="text" name="title">
			@error("title")
				<span>{{ $message }}</span>
			@enderror
	</div>

	<div>
		<label for="text"><div>Пост:</div></label>
			<textarea name="text"></textarea>
			@error("text")
				<span>{{ $message }}</span>
			@enderror
	</div>
	
	<div>
		<label for="datetime"><div>Публикация:</div></label>
			<input type="datetime-local" name="datetime"></input>
			@error("datetime")
				<span>{{ $message }}</span>
			@enderror
	</div>
	<div>
      		<label>Опубликовать</label>
     		<input type="checkbox" name="is_published" value="1">
	</div>
	<button type="submit">Сохранить</button>
</form>
@endsection
