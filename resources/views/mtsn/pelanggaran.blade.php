
@extends('form')

@section('style')
<!-- Table Style -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="section-header bg-white">
   <h1><text>Data Pelanggaran</text></h1>
   <div class="section-header-breadcrumb transparent">
   <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="/"><text><i class="fas fa-igloo"></i>Beranda</text></a></li>
      <li class="breadcrumb-item"><a href="/user/profile"><text><i class="fas fa-tachometer-alt"></i> Profil</text></a></li>
   </ol>
</div>
</div>
<div class="card card-danger ">
<div class="card-header">
<a href="{{route('mtsn.addpelanggaran')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
</div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-striped" id="table-1">
            <thead class="">
               <tr>
                  <th class="text-center">
                     #
                  </th>
                  @if(Auth::user()->level == 0)
                  <th>Nama Guru</th>
                  @endif
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Pelanggaran</th>
                  <th>Bukti</th>
                </tr>
            </thead>
        <tbody>
       @if($ada == 1)
            @foreach($data as $a)
            <tr>
               <td>
                  {{ $loop->iteration}}
               </td>
               @if(Auth::user()->level == 0)
               <td>
                  {{$a->guru->name}}
               </td>
               @endif
               <td>
                    {{$a->siswa->nisn}}
                </td>
                <td>
                  {{$a->siswa->nama}}
                </td>
                <td>
                  {{$a->siswa->kelas}}
                </td>
                <td>
                 {{!! $a->pelanggaran !!}}
                </td>
                <td>
                   @if($a->bukti != NULL)
                     <a href="{{$a->bukti}}" class="btn btn-dark" data-toggle="modal" data-keyboard="false" data-backdrop="false" data-target="#bukti{{$a->id}}">Klik untuk melihat bukti</a>
                  @endif
                </td>
            </tr>
            <div class="modal fade" id="bukti{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
               <div class="modal-dialog bg-white">
               <div class="modal-content bg-white">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
                  </button>
                  </div>
                  <div class="modal-body">
                     <img src="{{ asset($a->bukti) }}" width = "100%">
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  {{-- <a href="/user/profile/edit" class="btn btn-primary">Edit Profil</a> --}}
                  </div>
               </div>
               </div>
            </div>
            @endforeach
        @endif
        </tbody>
        </table>
       </div>
    </div>
    <div class="card-footer bg-secondary"></div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#table-1').DataTable();
	})
</script>
@endsection
