
@extends('form')

@section('style')
<!-- Table Style -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="section-header bg-white">
   <h1><text>Data Siswa</text></h1>
   <div class="section-header-breadcrumb transparent">
   <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="/"><text><i class="fas fa-igloo"></i>Beranda</text></a></li>
      <li class="breadcrumb-item"><a href="/user/profile"><text><i class="fas fa-tachometer-alt"></i> Profil</text></a></li>
   </ol>
</div>
</div>
<div class="card card-danger ">
<div class="card-header">
<a href="{{route('mtsn.siswa.add')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i> Add Data</a>
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
                  <th>Tingkat</th>
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
                    {{$a->nisn}}
                </td>
                <td>
                  {{$a->nama}}
                </td>
                <td>
                  {{$a->kelas}}
                </td>
                <td>
                 {{$a->tingkat}}
                </td>
                <td class="d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-primary btn-sm text-white w-50 mr-1"
                                href="{{ route('mtsn.siswa.edit', ['id' => $a->id]) }}"
                                title="Edit"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm text-white w-50 ml-1"
                                href="{{ route('mtsn.siswa.delete', ['id' => $a->id]) }}"
                                onclick="return confirm('Yakin ingin menghapus data?')"
                                title="Delete"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
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
