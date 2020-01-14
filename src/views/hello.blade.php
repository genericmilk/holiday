
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Genericmilk">
    <title>Holiday</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .hero h1{
          font-weight: bold;
      }

      .slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%; 
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}


    </style>

  </head>
  <body class="bg-light">
    <div class="container">
        <div class="py-5 hero">
            <h1>🏝 Holiday</h1>
            <h2>By Genericmilk</h2>
            <hr>
            @if($Api->canSeeDb)
                <div class="alert alert-success" role="alert">
                    ✅ Connected to {{env('DB_DATABASE').'@'.env('DB_HOST')}}
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    ❌ Unable to connect to {{env('DB_DATABASE').'@'.env('DB_HOST')}}. Please ensure you can reach your database before running Holiday (Error 01)
                </div>
            @endif
        </div>

        @if($Api->canSeeDb)
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3">Migration manager</h4>

                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your migrations</span>
                    <span class="badge badge-secondary badge-pill">{{count($Api->Migrations)}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($Api->Migrations as $Migration)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$Migration->class}}</h6>
                        <small class="text-muted">{{$Migration->date}}</small>
                    </div>
                    </li>
                    @endforeach
                </ul>
                </div>

            </div>
        @endif

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; {{date('Y')}} Genericmilk</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="https://github.com/genericmilk/holiday">GitHub</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>
