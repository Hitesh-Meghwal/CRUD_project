<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
      <h3 class="text-white text-center">Simple CRUD Project</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.create')}}" class="btn bg-dark text-white"> Create </a>
            </div>
        </div>
      <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-10  my-2">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-10">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white"> Products </h3>
                </div>
            </div>
        </div>
    </div>
  </div>
  </body>
</html>