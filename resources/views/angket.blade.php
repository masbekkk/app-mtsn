@extends('form')

@section('style')
<!-- Table Style -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="section-header bg-white">
   <h1><text>Angket</text></h1>
   <div class="section-header-breadcrumb transparent">
   <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="/"><text><i class="fas fa-igloo"></i>Beranda</text></a></li>
      <li class="breadcrumb-item"><a href="/user/profile"><text><i class="fas fa-tachometer-alt"></i> Profil</text></a></li>
   </ol>
</div>
</div>
<div class="card card-danger bg-light">
<div class="card-header">
{{-- <a href="/" class="btn btn-info">Buka Presensi</a> --}}
   <div class="ml-auto w-0">
   <label class="switch">
      <input type="checkbox" class="primary" id="darkSwitch">
      <span class="slider round" data-checked="fas fa-moon"></span>
   </label>
   </div>
</div>
   <div class="card-body">
      <div class="table-responsive table-light bg-light">
         <table class="table table-striped" id="table-1">
            <thead class="bg-light">
               <tr>
                  <th class="text-center">
                     #
                  </th>
                  <th>Pertanyaan</th>
                  <th>Ya</th>
                  <th>Tidak</th>
                </tr>
            </thead>
        <tbody>
            @foreach($data as $a)
            <tr>
               <td>
                  {{ $loop->iteration}}
               </td>
               <td>
                    {{$a->angket}}
                </td>

                <td>
                {{-- @for($i=1; $i<=$jml; $i++) --}}
                    <input type="radio" id="html" name="fav_language" value="Ya">
                    <label for="html">Ya</label><br>
                {{-- @endfor --}}
                </td>
                <td>
                {{-- @for($i=1; $i<=$jml; $i++) --}}
                    <input type="radio" id="html" name="fav_language" value="Tidak">
                    <label for="html">Tidak</label><br>
                {{-- @endfor --}}
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

