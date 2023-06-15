<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1>Data Apotek</h1>
    <br>
    <form action="" method="get">
        @csrf
        <input type="text" name="search" placeholder="search by apoteker...">
        <button type="submit">search</button>
    </form>
    <br>
    @if (Session::get('errors'))
    <p>{{Session::get('errors')}}</p>
    @endif
    @if (Session::get('success'))
    <p style="color: green;">{{Session::get('success')}}</p>
    @endif
    <a href="/add" class="btn btn-info">Add new data</a>&nbsp;
    <a href="{{route('trash')}}" class="btn btn-danger">Recently Delete</a>

    <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Rujukan</th>
      <th scope="col">Rumah Sakit</th>
      <th scope="col">obat</th>
      <th scope="col">harga</th>
      <th scope="col">total</th>
      <th scope="col">Apoteker</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($apotek as $data)
    <tr>
      <th scope="row">{{$data['id']}}</th>
      <td>{{ $data['nama']}}</td>
      <td>{{ $data['rujukan'] != 1 ? '-' : 1}}</td>
      <td>{{ $data['rujukan'] != 1 ? '-' : $data['rumah_sakit']}}</td>
      <td>{{ $data['obat']}}</td>
      <td>{{ $data['harga']}}</td>
      <td>{{ $data['total']}}</td>
      <td>{{ $data['apoteker']}}</td>
      <td>
        <a href="{{route('edit', $data['id'])}}" class="btn btn-outline-info">Edit</a>
        <form action="{{route('delete' , $data['id'])}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
    </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>