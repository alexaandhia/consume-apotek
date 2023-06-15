<div class="formbold-main-wrapper">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
    
    <img src="{{asset('assets/img/illustrations/hero-header.png')}}" width="500px">

    @if (Session::get('errors'))
<p style="color: red;">{{Session::get('errors')}}</p>
@endif

    <form action="{{route('update' , $apotek['id'])}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="formbold-form-title">
        <h2 class="">Edit Data Pasien</h2>
      </div>

      <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label">
          Nama
        </label>
        <input
          type="text"
          name="nama"
          id="nama"
          class="formbold-form-input"
          value="{{ $apotek['nama']}}"
        />
      </div>

      <div class="formbold-mb-3">
        <label for="address2" class="formbold-form-label">
          Rujukan
        </label>
        <select name="rujukan" id="rujukan" onchange="show()" class="formbold-form-input">
        <option value="" selected disabled>Pilih ya/tidak</option>
        <option value="{{$apotek['rujukan'] == '1' ? 'selected' : ''}}">ya</option>
        <option value="{{$apotek['rujukan'] == '0' ? 'selected' : ''}}">tidak</option>
        </select>
        <input
          type="text"
          name="rumah_sakit" id="rs" placeholder="Tulis rumah sakit rujukan" hidden
          class="formbold-form-input"
          value="{{ $apotek['rumah_sakit']}}"
        />
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="state" class="formbold-form-label"> Obat </label>
          <input
            type="text"
            name="obat" id="obat" placeholder="Tulis dengan koma"
            class="formbold-form-input"
            value="{{ $apotek['obat'] }}"
          />
        </div>
        <div>
          <label for="country" class="formbold-form-label"> Harga </label>
          <input
            type="text"
            name="harga" id="harga" placeholder="Tulis dengan koma"
            class="formbold-form-input"
            value="{{$apotek['harga']}}"
          />
        </div>
      </div>

      <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label">
          Apoteker
        </label>
        <input
          type="text"
          name="apoteker"
          id="apoteker"
          class="formbold-form-input"
          value="{{ $apotek['apoteker']}}"
        />
      </div>

      <button class="formbold-btn" type="submit">Simpan</button>
      <a href="/index" class="formbold-btn" style="color: red;">cancel</a>
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
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }
  .formbold-relative {
    position: relative;
  }
  .formbold-opacity-0 {
    opacity: 0;
  }
  .formbold-stroke-current {
    stroke: currentColor;
  }
  #supportCheckbox:checked ~ div span {
    opacity: 1;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-img {
    margin-bottom: 45px;
  }

  .formbold-form-title {
    margin-bottom: 30px;
  }
  .formbold-form-title h2 {
    font-weight: 600;
    font-size: 28px;
    line-height: 34px;
    color: #07074d;
  }
  .formbold-form-title p {
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    margin-top: 12px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    text-align: center;
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #536387;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }

  .formbold-checkbox-label {
    display: flex;
    cursor: pointer;
    user-select: none;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-checkbox-label a {
    margin-left: 5px;
    color: #6a64f1;
  }
  .formbold-input-checkbox {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
  .formbold-checkbox-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    margin-right: 16px;
    margin-top: 2px;
    border: 0.7px solid #dde3ec;
    border-radius: 3px;
  }

  .formbold-btn {
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
</style>