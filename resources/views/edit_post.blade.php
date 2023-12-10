@extends("layouts.app")

@section("content")
<h1>Редактирование поста</h1>

<form method="POST" action="">
	@csrf

	<input type="hidden" name="id" value="{{ $edit_post->id }}">

	<div>
		<label for="title"><div>Тема:</div></label>
		<input type="text" name="title" value="{{ old('title') ?? $edit_post->title }}">
		@error("title")
			<span>{{ $message }}</span>
		@enderror
	</div>

	<div>
		<label for="text"><div>Пост:</div></label>
		<textarea name="text" value="{{ old('text') ?? $edit_post->text }}"></textarea>
		@error("text")
			<span>{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="datetime"><div>Публикация:</div></label>
			<input type="datetime-local" name="datetime" value="{{ old('text') ?? $edit_post->publish_datetime }}"></input>
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
