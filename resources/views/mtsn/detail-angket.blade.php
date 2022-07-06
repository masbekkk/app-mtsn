<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hasil Angket Siswa MTsN</title>
  </head>
  <body style="background-color : #f0ebf9;">
    <form action="{{route('mtsn.angket.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="container">
      @include('sweetalert::alert')
        <br>
        <div class="card text-center">
            <div class="card-body">
             
              <h5 class="card-title">Nama Siswa</h5>

              <div class="form-group">
                <select class="form-control form-control-lg js-example-basic-single" name="siswa_id" aria-placeholder="Pilih Namamu!" required>
                  <option selected>{{$data->siswa->nisn}} - {{$data->siswa->nama}} {{$data->siswa->kelas}}  </option>
                </select>
              
              </div>
              
            </div>
          </div>
        <br>
        @foreach ($angket as $a)
        @if($a->id % 2 == 0)
        <div class="card border-danger">
            
            <div class="card-body text-dark">
              <p class="card-text font-weight-bold">{{$a->angket}}</p>
              <div class="form-check">
                @if($data->{'jawaban' . $a->id} === "Ya")
                <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" checked value="Ya"> 
                @else <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Ya"> 
                @endif
                <label class="form-check-label" for="flexRadioDefault1">
                  Ya
                </label>
              </div>
              <div class="form-check">
                @if($data->{'jawaban' . $a->id} === "Tidak")
                <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" checked value="Tidak"> 
                @else <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Tidak"> 
                @endif
                <label class="form-check-label" for="flexRadioDefault2">
                  Tidak
                </label>
              </div>
            </div>
        </div>
        <br>
        @else
        <div class="card border-warning">
            
            <div class="card-body text-dark">
              
              <p class="card-text font-weight-bold">{{$a->angket}}</p>
              <div class="form-check">
                @if($data->{'jawaban' . $a->id} === "Ya")
                <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" checked value="Ya"> 
                @else <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Ya"> 
                @endif
                <label class="form-check-label" for="flexRadioDefault1">
                  Ya
                </label>
              </div>
              <div class="form-check">
                @if($data->{'jawaban' . $a->id} === "Tidak")
                <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" checked value="Tidak"> 
                @else <input disabled class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Tidak"> 
                @endif
                <label class="form-check-label" for="flexRadioDefault2">
                  Tidak
                </label>
              </div>
            </div>
        </div>
        <br>
        @endif
      @endforeach  
    </div>
    
  </form>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>