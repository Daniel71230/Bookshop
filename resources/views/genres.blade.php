<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.bookshop')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
@if (count($genres) == 0)
<p color='red'> @lang('messages.no_records')</p>
@else
<img id='img' src="https://png.pngtree.com/png-vector/20200330/ourlarge/pngtree-open-book-design-png-image_2167425.jpg" alt="bookshop" width="100px" height="100px">
<h1>@lang('messages.bookshop')</h1>
<h2>@lang('messages.genres'):</h2>
<p> <a  class="lang" href="{{route('locale',__('messages.set_lang'))}}">@lang('messages.language'): <u>@lang('messages.set_lang')</u></a></p>
@if($errors->any())
<h4 style="color: red; text-align:center; font-size: 20px;">Error: {{$errors->first()}}</h4>
@endif
<table>

@foreach ($genres as $genre)
<tr>
<td> {{ $genre->name }} </td>
<td> <input class="form" type="button" value="@lang('messages.show')"
onclick="showBooks({{ $genre->id }})"> </td>
<td><form  class='input' method="POST"
action="{{action([App\Http\Controllers\GenreController::class, 'destroy'],
$genre->id) }}">
@csrf @method('DELETE')<input type="submit" class="form"
value="@lang('messages.del_genre')"></form></td>
</tr>
@endforeach
</table>
@endif
<p> <input  class="form" type="button" value="@lang('messages.new_genre')" onclick="newGenre()"> </p>
<footer>
  <p>@lang('messages.contact'):</p>
  <p><a href="mailto:test@gmail.com">test@gmail.com</a></p>
</footer>
<script>
function newGenre() {
window.location.href = "/genre/create/";
}
function showBooks(genreID) {
window.location.href = "/book/genre/" + genreID;
}
</script>
</body>
</html>