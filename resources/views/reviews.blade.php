<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.reviews')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
@if (count($reviews) == 0)
<p color='red'> @lang('messages.no_records')</p>
@else
<h1>@lang('messages.reviews')</h1>

@foreach ($reviews as $review)
<h3> {{$review->username}}: </h3>
<p> "{{ $review->text }}" </p>
<form method="POST"
action="{{action([App\Http\Controllers\ReviewController::class, 'destroy'],
$review->id) }}">
@csrf @method('DELETE')<input type="submit" class="form"
value="@lang('messages.del_review')"></form>
@endforeach
@endif
<p> <input  class="form" type="button" value="@lang('messages.add_review')" onclick="newReview({{$book_id}})"> </p>
@if($errors->any())
<h4 style="color: red;">{{$errors->first()}}</h4>
@endif
<script>
function newReview(bookID) {
window.location.href = "/review/book/" + bookID + "/create";
}
</script>
</body>
</html>