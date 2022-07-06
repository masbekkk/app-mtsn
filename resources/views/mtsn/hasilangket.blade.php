
@extends('form')

@section('style')
<!-- Table Style -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="section-header bg-white">
   <h1><text>Data Hasil Angket</text></h1>
   <div class="section-header-breadcrumb transparent">
   <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="/"><text><i class="fas fa-igloo"></i>Beranda</text></a></li>
      <li class="breadcrumb-item"><a href="/user/profile"><text><i class="fas fa-tachometer-alt"></i> Profil</text></a></li>
   </ol>
</div>
</div>
<div class="card card-danger ">
<div class="card-header">
<a href="{{route('mtsn.siswa.add')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-download"></i> Export Data</a>
</div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-striped" id="table-1">
            <thead class="">
               <tr>
                  <th class="text-center">
                     #
                  </th>
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Prosentase</th>
                  <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
            @foreach($data as $a)
            <tr>
               <td>
                  {{ $loop->iteration}}
               </td>
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
                 {{$a->prosentase}}
                </td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-info btn-sm text-white"
                                href="{{ route('mtsn.detail-angket', ['id' => $a->angket_id]) }}"
                                title="Detail"><i class="fas fa-info-circle"></i> Detail</a>
                </td>
            </tr>

            @endforeach
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
