@extends('form') 

@section('content') 
<div class="section-header bg-white">
    <h1>
        <text>Tambah Data Siswa</text>
    </h1>
    <div class="section-header-breadcrumb transparent">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item">
                <a href="/">
                <i class="fas fa-igloo"></i> Beranda </a>
            </li>
            <li class="breadcrumb-item">
                <a href="/">
                <i class="fas fa-tachometer-alt"></i> Profil </a>
            </li>
        </ol>
    </div>
</div>
<div class="card card-danger bg-white">
        {{-- <div class="ml-auto w-0">
            <label class="switch">
                <input type="checkbox" class="primary" id="darkSwitch">
                <span class="slider round" data-checked="fas fa-moon"></span>
            </label>
        </div> --}}
    <div class="card-body bg-white">
        <form action="{{route('mtsn.siswa.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data" >
        @csrf
        {{method_field('PUT')}}
        <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required value="{{$data->nisn}}">
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="nama" class="form-control" required value="{{$data->nama}}">
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" required value="{{$data->kelas}}">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label>Tingkat</label>
                    <select class="form-control" name="tingkat" value="{{$data->tingkat}}">
                        <option selected value="{{$data->tingkat}}">{{$data->tingkat}}</option>
                        <option value=7> 7 (Tujuhh)</option>
                        <option value=8> 8 (Delapan)</option>
                        <option value=9> 9 (Sembilan)</option>
                    </select>
                </div>
            </div>
        </div>
       
    <div class="text-left">
        <button type="submit" class="btn btn-primary btn-lg" id="submit" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Simpan</button>
        <button type="reset" class="btn btn-danger " name="reset">Bersihkan</button>
    </div>
        </form>
    </div>
</div>
@endsection 

