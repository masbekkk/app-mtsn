@extends('form') 
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection 
@section('content') 
<div class="section-header bg-white">
    <h1>
        <text>Isi Pelanggaran</text>
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
        <form id="form" action="{{route('mtsn.storepelanggaran')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control js-example-basic-single" name="siswa_id" id="exampleFormControlSelect1">
                @foreach ($siswa as $a)
                <option value={{$a->id}}>{{$a->nama}} - {{$a->kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Isi Pelanggaran</label>
            <textarea class="form-control" name="pelanggaran" id="summernote"></textarea>
        </div>
        <div class="form-group">
            <div class="section-title mt-0"><text>Mungkin ada bukti foto</text></div>
            <div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
            <div class="alert-body">
                <div class="alert-title">Foto tidak wajib ya, boleh dikosongi
            </div>
            </div>
            </div>
            <label>Files</label>
            <input name="bukti" type="file" class="form-control file" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
        </div>
    <div class="text-left">
        <button type="submit" class="btn btn-primary btn-lg" id="submit" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Simpan</button>
        <button type="reset" class="btn btn-danger " name="reset">Bersihkan</button>
    </div>
        </form>
    </div>
</div>
@endsection 
@section('script') 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- // In your Javascript (external .js resource or <script> tag) --}}
    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: '',
      tabsize: 2,
      height: 500,
      codeviewFilter: false,
      codeviewIframeFilter: true,
      codeviewFilterRegex: 'custom-regex',
      codeviewIframeWhitelistSrc: ['my-own-domainname']

    });
    
  </script>
  <script>
    function MyCustomFunction(){
        $("#submit").text("Loading...");
        $(this).submit('loading').delay(1000).queue(function () {
            // $(this).button('reset');
        });
    }
</script>
@endsection