<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.new_genre')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
<b>@lang('messages.add_genre_text')</b>:
<form method="POST"
action="{{action([App\Http\Controllers\GenreController::class, 'store']) }}">
@csrf
<label for="name">@lang('messages.genre_name'): </label>
<input type="text" name="name" id="name">
<input class="form2" type="submit" value="@lang('messages.add')">
</form>
</body>
</html>