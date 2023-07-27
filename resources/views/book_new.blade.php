<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.new_book')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
<h3>@lang('messages.add_book_text') "<b>{{ $genre->name }}" </b>@lang('messages.genre'):</h3>
<form method="POST"
action="{{action([App\Http\Controllers\BookController::class, 'store']) }}">
@csrf

<input type="hidden" name="genre_id" value="{{ $genre->id }}">  
<label for="name">@lang('messages.name'): </label>
<input type="text" name="name" id="name">
<label for="author_name">@lang('messages.author_name'): </label>
<input type="text" name="author_name" id="author_name">
<label for="description">@lang('messages.descr'): </label>
<input type="text" name="description" id="description">
<label for="price">@lang('messages.price'): </label>
<input type="text" name="price" id="price">
<input class="form2" type="submit" value="@lang('messages.add')">
</form>
</body>
</html>