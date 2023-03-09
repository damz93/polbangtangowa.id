@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data Keperluan</p>
<p class="text-right">
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="container">
    <a href="/admin-access/keperluan/tambah-keperluan" class="btn btn-success mb-3">+ Keperluan</a>
		<div class=" table-wrapper table-responsive">
      <div style="width:100%;">
				<form autocomplete="off" action="/admin-access/keperluan/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="keperluan" placeholder="Cari Keperluan: Keperluan" value="{{ old('keperluan') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/keperluan" class="btn btn-outline-warning">Reset</a>
					</div>
				</div>

				</form>

			</div>
      <table id="tabel1" class="table table-hover table-bordered">
        <thead class="text-center bg-light header">
          <tr>
            <th>
              Jenis Keperluan
            </th>
            <th>
              Input By
            </th>
            
            <th>
              Aksi
            </th>
          </tr>
        </thead>
        <?php $a=1;?>
        @foreach ($keperluan as $kep)
         
        <tbody>
          <tr>
            <td>
              {{ $kep->keperluan }}
            </td>
            <td>
              {{ $kep->input_by }}
            </td>
            <td class="text-center">       
                <a title="Edit Keperluan" href="keperluan/edit-keperluan/{{ $kep->id }}"><i class="bi bi-pen"></i></a>
                |                
                <a title="Hapus Keperluan" onclick="return confirm('Anda yakin menghapus??')"  href="/admin-access/keperluan/hapus-keperluan/{{ $kep->id }}" method="GET"><i class="bi bi-trash3-fill"></i></a>
              </td>
          </tr>
        </tbody>
        <?php $a++; ?>
        @endforeach
      </table>
      {{ $keperluan->links() }}
    </div>
    
    
       
@endsection