<!DOCTYPE html>
<html>
<head>
<title>@lang('messages.edit_book')</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>

<h2>@lang('messages.edit_book') "<b>{{ $book->name }}</b>" @lang('messages.book') :</h2>
<form method="GET"
action="{{action([App\Http\Controllers\BookController::class, 'update'], $book->id) }}">

@csrf

    <table>
        <tr>
            <th>@lang('messages.name'):</th>
            <td>
                <input type="text" name="name" id="name" value="{{ old('name', $book->name) }}"/>
            </td>
        </tr>

        <tr>
            <th>@lang('messages.author_name'):</th>
            <td>
                <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $book->author_name) }}"/>
                
            </td>
        </tr>

        <tr>
            <th>@lang('messages.descr'):</th>
            <td>
                <input type="description" name="description" id="description" value="{{ old('description', $book->description) }}"/>
                
            </td>
        </tr>
        <tr>
            <th>@lang('messages.price'):</th>
            <td>
                <input type="price" name="price" id="price" value="{{ old('price', $book->price) }}"/>
                
            </td>
        </tr>

        <tr>
            <td>
            <input type="hidden" name="genre_id" value="{{ $book->genre_id }}">  
                
            </td>
        </tr>
        <tr>    
            <td>
                <button class="form2" type="submit">@lang('messages.update')</button>
            </td>
        </tr>



    </table>
</form>
</body>
</html>