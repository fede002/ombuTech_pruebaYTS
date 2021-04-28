<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Peliculas</title>
    
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Salida en Json</h3>
                        <hr>
                        <a href="/json" target="_blanck" class="btn btn-info">Ver salida en Json</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Listado de Peliculas</h3>
                        <hr>
                        <div class="row lista">
                            @foreach($listadoDePeliculas as $key => $v)
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="{{$v->url}}" target="_blank">
                                        <div class="card-body">
                                            <h6>{{$v->title_long}} Rating: {{$v->rating}}</h6>
                                            <img class="img-fluid" src="{{$v->medium_cover_image}}" alt="{{$v->title_long}}">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>