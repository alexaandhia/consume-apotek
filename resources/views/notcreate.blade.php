<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
  </head>
  <body class="p-3 mb-2 bg-info-subtle text-emphasis-info">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <div class="card position-absolute top-50 start-50 translate-middle">
  <div class="card-body">
   <h3> Add Pharmacy Data </h3>
   @if (Session::get('errors'))
    <p>{{Session::get('errors')}}</p>
    @endif
    @if (Session::get('success'))
    <p style="color: green;">{{Session::get('success')}}</p>
    @endif

    <form action="/add/send" method="post" class="grid gap-0 row-gap-3">
        @csrf

        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" placeholder="ketik nama pasien"> <br>

        <label for="rujukan">Ada Rujukan?: </label>
        <!-- <select name="rujukan" id="rujukan" onchange="show()">
        <option value="" selected>Pilih ya/tidak</option>
        <option value="1">ya</option>
        <option value="0">tidak</option>
        </select><br> -->
        <!-- <input type="radio" name="rujukan" value="1" onchange="show()" id="rujukan"> ya
        <input type="radio" name="rujukan" value="0" onchange="show()" id="rujukan"> tydak -->

        <input type="text" name="rumah_sakit" id="rs" placeholder="Tulis rumah sakit rujukan" hidden> <br>
        <br>

        <div id="input-container" style="display: none;">
          <input type="text" id="input">
        </div>

        <label for="obat">obat: </label>
        <input type="text" name="obat" id="obat" placeholder="Tulis dengan koma"><br>

        <label for="harga">harga: </label>
        <input type="text" name="harga" id="harga" placeholder="Tulis dengan koma"><br>

        <label for="apoteker">apoteker: </label>
        <input type="text" name="apoteker" id="apoteker" placeholder=""><br><br>

        <button type="submit" class="btn btn-success">save</button>
        <a href="/index" class="btn btn-danger">cancel</a>
    </form>
  </div>
</div>
      <script>
        function show(){
          let rujuk = document.querySelector('#rujukan')
          let rumah_sakit = document.querySelector('#rs')

          if (rujuk.value == true) {
            rumah_sakit.removeAttribute("hidden");
          }else{
            rumah_sakit.setAttribute("hidden", true);
          }

        }
      </script>
  </body>
</html>