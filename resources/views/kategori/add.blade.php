<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Kategori</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>
    <div class="container">
      <br><h3>Add Kategori</h3>
      <hr>

      <form action="{{route('kategori.store')}}" method="post">
        {{csrf_field()}}

      <div class="row">
        <div class="col-md-4">
            <label>Nama Kategori</label>
            <input type="text" name="nk" required class="form-control"><br>
            <a href="{{route('kategori.index')}}" class="btn btn-danger">Back</a>
            <button type="submit" name="button" class="btn btn-primary">Save</button>
        </div>

        <div class="col-md-4">

        </div>

        <div class="col-md-4">

        </div>
      </div>
      </form>
    </div>
  </body>
</html>
