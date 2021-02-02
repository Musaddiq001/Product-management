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

            <form method="post" enctype="multipart/form-data">
        {{csrf_field()}}

            <div class="content">
            	<div class="links">
                    <a href="{{route('product')}}">All Products</a>
                    <a href="/">Home</a>
                </div>
                </div>

            	
            <table id="myTable" class="table">
                <caption>Add New Product</caption>
 <thead class="thead-dark">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>EXP DATE</td>
				<td><input type="DATE" name="exp" ></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Create"></td>
			</tr>
		</table>
</table>

    </body>
</html>
