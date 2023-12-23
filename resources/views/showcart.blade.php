<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="{{ asset('/css/style.css?v=').time() }}" rel="stylesheet" type="text/css" >
    <title>Cart</title>
</head>
<body>
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{ session()->get('message') }}
</div>
@endif
<main>
    <p> <input id="login" type="button" class="form" value="@lang('messages.login')" onclick="Login()"> </p>
    <p> <input id="logout" type="button" class="form" value="@lang('messages.logout')" onclick="Logout()"> </p>
    <p> <a id="cart" type="button" class="form" href="{{url('show_cart')}}"> Cart</a> </p>
    <p> <a  style="float: left;" class="lang" href="{{route('locale',__('messages.set_lang'))}}">@lang('messages.language'): <u>@lang('messages.set_lang')</u></a></p>

    <div class="center">
        <table class="cart-table">
            <tr>
                <th class="cart-th">Book title</th>
                <th class="cart-th">Book price</th>
                <th class="cart-th">Action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{ $cart->book_title }}</td>
                <td>{{ $cart->price }}</td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('remove_cart', $cart->id)}}">Remove</a>
                </td>
            </tr>
            <?php $totalprice+=$cart->price; ?>
            @endforeach

        </table>
        <div>
            <h2 class="total-price">Total price: {{$totalprice}}</h2>
        </div>

        <div>
            <h2 class="proceed">Proceed to Order</h2>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="" class="btn btn-danger">Pay Using Card</a>
        </div>
    </div>
</main>
</body>
</html>

<script>
function Login() {
window.location.href = "/login";
}
function Logout() {
window.location.href = "/logout";
}
</script>
