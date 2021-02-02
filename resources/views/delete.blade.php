<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Product</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
             {
  caption-side: top;
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            	<div class="links">
                    <a href="{{route('product')}}">Back</a>
                    <a href="/">Home</a>
                </div>
                </div>
            	
             <table id="myTable" class="table">
                <caption>Delete Product</caption>
 <thead class="thead-dark">
		<table>
            <tr>
                <td>Product Id</td>
                <td>{{$productId}}</td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td>{{$productName}}</td>
            </tr>
            <tr>
                <td>EXP Date</td>
                <td>{{$expdate}}</td>
            </tr>
            
            <tr>
                <td>Price</td>
                <td>{{$price}}</td>
            </tr>
            <tr>
                <td></td>
                <td>

                <form method="post">
            {{csrf_field()}} <input type="hidden" name="productId" value="{{$productId}}">
            <input type="submit" name="submit" value="Confirm" button onclick="myFunction()"> </form></td>    
            
        </table>
</table>


<script>
function myFunction() {
  alert("Are you sure? This can't be undone!");
}
</script>

           
		
</table>

    </body>
</html>
