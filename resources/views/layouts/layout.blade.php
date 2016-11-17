<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                width: 100%;
                position: absolute;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


            .m-b-md {
                margin-bottom: 30px;
            }

            ul {
                width:100%;
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                float:left;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            /* Change the link color to #111 (black) on hover */
            li a:hover {
                background-color: #111;
            }
            #exp{
                float:right;
            }

        </style>
    @yield('header')
</head>
<body>
	@yield('content')
	@yield('footer')
</body>
</html>