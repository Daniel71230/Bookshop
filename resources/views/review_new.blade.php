<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.new_review')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
@lang('messages.add_review_text') "<b>{{ $book->name }}" </b>:
<form method="POST"
action="{{action([App\Http\Controllers\ReviewController::class, 'store']) }}">
@csrf

<input type="hidden" name="book_id" value="{{ $book->id }}">  
<input type="hidden" name="user_id" value="{{ $user_id}}"> 
<input type="hidden" name="username" value="{{ $username}}"> 
<label for="name">@lang('messages.text'): </label>
<input type="text" name="text" id="text">
<input class="form2" type="submit" value="@lang('messages.add')">
</form>
</body>
</html>