<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Angket Siswa MTsN</title>
  </head>
  <body style="background-color : #f0ebf9;">
    <form action="{{route('mtsn.angket.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="container">
      @include('sweetalert::alert')
        <br>
        <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  @if($pilihan == 'kelas7' || $pilihan == 'default')
                  <a class="nav-link active" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas7'])}}">Kelas 7</a>
                  @else <a class="nav-link" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas7'])}}">Kelas 7</a>
                  @endif
                </li>
                <li class="nav-item">
                  @if($pilihan == 'kelas8' || $pilihan == 'default')
                  <a class="nav-link active" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas8'])}}">Kelas 8</a>
                  @else <a class="nav-link" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas8'])}}">Kelas 8</a>
                  @endif
                </li>
                <li class="nav-item">
                  @if($pilihan == 'kelas9' || $pilihan == 'default')
                  <a class="nav-link active" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas9'])}}">Kelas 9</a>
                  @else <a class="nav-link" aria-current="true" href="{{route('mtsn.angket', ['pilihan' => 'kelas9'])}}">Kelas 9</a>
                  @endif
                </li>
                <li class="nav-item ml-auto">
                  <a class="nav-link" aria-current="true" href="{{route('mtsn.hasilangket')}}">Admin</a>
                </li>
              </ul>
              
            </div>
            
            <div class="card-body">
             
              <h5 class="card-title">Silahkan pilih namamu</h5>
              <p class="card-text">Jangan sampai salah yaa! Kamu bisa mencari datamu dengan menggunakan fitur cari</p>
              <div class="form-group">
                {{-- <label>Nama Siswa</label> --}}
              
                <select class="form-control form-control-lg js-example-basic-single" name="siswa_id" aria-placeholder="Pilih Namamu!" required>
                  <option selected>Pilih Namamu</option>
                  @if($pilihan == 'kelas7' || $pilihan == 'default')
                    @foreach ($kls7 as $a)
                    <option value={{$a->id}}>{{$a->nama}} {{$a->kelas}}</option>
                    @endforeach
                  @elseif($pilihan == 'kelas8')
                    @foreach ($kls8 as $a)
                    <option value={{$a->id}}>{{$a->nama}} {{$a->kelas}}</option>
                    @endforeach
                  @elseif($pilihan == 'kelas9')
                    @foreach ($kls9 as $a)
                    <option value={{$a->id}}>{{$a->nama}} {{$a->kelas}}</option>
                    @endforeach
                  @endif
                </select>
              
              </div>
              
            </div>
          </div>
        <br>
        @foreach ($data as $a)
        @if($a->id % 2 == 0)
        <div class="card border-danger">
            
            <div class="card-body text-dark">
              <p class="card-text font-weight-bold">{{$a->angket}}</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Ya"> 
                <label class="form-check-label" for="flexRadioDefault1">
                  Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault2" value="Tidak">
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
                <input class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault1" value="Ya">
                <label class="form-check-label" for="flexRadioDefault1">
                  Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban_{{$a->id}}" id="flexRadioDefault2" value="Tidak">
                <label class="form-check-label" for="flexRadioDefault2">
                  Tidak
                </label>
              </div>
            </div>
        </div>
        <br>
        @endif
      @endforeach  
      <div class="text-left">
        <button type="submit" class="btn btn-primary btn-lg" id="submit" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Simpan</button>
        <button type="reset" class="btn btn-danger " name="reset">Bersihkan</button>
    </div>
    </div>
    
  </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
          
        });
    });
    </script>
  </body>
</html>