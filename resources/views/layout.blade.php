<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>@yield('title') </title>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                	@yield('content')
                </div>
            </div>
        </div>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
       
    </body>
</html>