<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
<title>@lang('messages.books')</title>
</head>
<body>

<main>
<p> <input id="login" type="button" class="form" value="@lang('messages.login')" onclick="Login()"> </p>
<p> <input id="logout" type="button" class="form" value="@lang('messages.logout')" onclick="Logout()"> </p>
<p> <a id="cart" type="button" class="form" href="{{url('show_cart')}}"> Cart</a> </p>
<p> <a  style="float: left;" class="lang" href="{{route('locale',__('messages.set_lang'))}}">@lang('messages.language'): <u>@lang('messages.set_lang')</u></a></p>

<h1 style="margin-right: 200px;"><b>{{ $genre->name }} </b></h1>
<h2 style="margin-right: 150px;">@lang('messages.genres') > {{ $genre->name }}<h2>
@if (count($books) == 0)
<p color='red'> @lang('messages.no_records')</p>
@else



@if($errors->any())
<h4 style="color: red; text-align:center; font-size: 20px;">Error: {{$errors->first()}}</h4>
@endif
@foreach ($books as $b)

<h3 id='name'> <b>{{ $b->name }} </b></h3>
<h3 id="author"> @lang('messages.author'): {{ $b->author_name }} </h3>
<h3 id="price"> @lang('messages.price'): {{ $b->price }} €</h3>
<p class='input'> {{ $b->description }} </p>

<!--<form  class='input' method="get" action="{{action([App\Http\Controllers\BookController::class, 'buy' ], $b->id) }}"
>-->
<form  class='input' method="post" action="{{url('add_cart', $b->id) }}">
@csrf

<input type="submit" class="form" id='buy'
value="@lang('messages.buy')"></form>
<input  class="form" type="button" value="@lang('messages.show_reviews')"
onclick="showReviews({{ $b->id }})">

<form  class='input' method="GET"
action="{{action([App\Http\Controllers\BookController::class, 'edit' ], $b->id) }}">
<input type="submit" class="form"
value="@lang('messages.edit_book')"></form>

<form  class='input' method="POST"
action="{{action([App\Http\Controllers\BookController::class, 'destroy'],
$b->id) }}">
@csrf @method('DELETE')<input type="submit" class="form"
value="@lang('messages.delete_book')"></form>

@endforeach

@endif
<p> <input id='new' type="button" class="form" value="@lang('messages.new_book')" onclick="newBook({{ $genre_id
}})"> </p>


<script>
function newBook(genreID) {
window.location.href = "/book/genre/" + genreID + "/create";
}
function showReviews(bookID) {
window.location.href = "/review/book/" + bookID;
}
function Login() {
window.location.href = "/login";
}
function Logout() {
window.location.href = "/logout";
}
</script>
</main>
</body>
</html>
