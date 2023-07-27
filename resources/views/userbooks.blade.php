<!DOCTYPE html>
<html>
<head>
<title>Bouhgt books</title>
<link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
</head>
<body>
@if (count($books) == 0)
<p color='red'> There are no records in the database!</p>
@else
<h1>Books</h1>
<table border="1" style="margin-left: 300px;">
<tr class="top">
<td> Book Id </td>
<td> User Id </td>
<td> Username </td>
<td> Book name </td>
</tr>
@foreach ($books as $book)
<tr>
<td> {{ $book->book_id }} </td>
<td> {{ $book->user_id }} </td>
<td> {{ $book->username }} </td>
<td> {{ $book->bookname }} </td>
</tr>
@endforeach
</table>
@endif
            <a id="home" href="/">
                Genres
            </a>
<script>
</script>
</body>
</html>