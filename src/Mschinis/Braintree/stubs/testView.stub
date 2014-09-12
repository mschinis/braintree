<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Braintree Laravel Implementation</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
    {{-- To learn more about the drop-in UI,
     check https://developers.braintreepayments.com/javascript+php/start/hello-client --}}
	<div class="welcome">
        <form id="checkout" method="post" action="{{action('BraintreeController@postCheckout')}}">
            <div id="dropin"></div>
            <input type="submit" value="Pay $10">
        </form>
	</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    <script>
        $(function(){
            braintree.setup("{{$braintreeClientToken}}",'dropin',{
               container: 'dropin'
            });
        });
    </script>
</body>
</html>