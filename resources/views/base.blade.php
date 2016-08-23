<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: Arial;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: left;
                display: inline-block;
                padding: 150px;
                font-size: 1.2em;
            }

            .title {
                font-size: 96px;
            }
            h3 > span {
                color: red;
                box-shadow: 0px 0px 30px 14px rgba(61, 95, 33, 0.38);
                font-weight: bold;
                border-radius: 5px;
                padding: 2px;
            }

            section {
                border-radius: 5px;
                border: 2px solid black;
                margin: 20px;
            }
            section p {
                font-size: 1em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
