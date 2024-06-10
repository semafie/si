@extends('admin_gudang.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
        <button type="button" class="nav-link active btn-formaa" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
            aria-selected="true">Obat</button>
    </li>
    <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
            aria-selected="false">Bahan Habis Pakai</button>
    </li>
    <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
            data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages"
            aria-selected="false">Alat Kesehatan</button>
    </li>
</ul>
    <div class="card semua_obat">
        

      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>jumlah stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td class="button_intable" >
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editobat{{ $item->id }}">Edit</button>
                            
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="editobat{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Edit Obat</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin_gudang/stok_obat/edit/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="modal-body semua_obats">
                                    <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>


                                    <input type="text" name="jumlah_stok" value="{{ $item->jumlah_stok }}" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Edit Obat</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          <div class="text-nowrap table-responsive pt-0">
            <table id="myTable1" class="datatables-basic table border-top w-100">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama Bahan</th>
                  <th>harga Bahan</th>
                  <th>jumlah stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bahan as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td class="button_intable" >
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editobats{{ $item->id }}">Edit</button>
                            
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="editobats{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Edit Bahan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin_gudang/stok_obat/edit/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="modal-body semua_obats">
                                    <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>


                                    <input type="text" name="jumlah_stok" value="{{ $item->jumlah_stok }}" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Edit Bahan</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
          <div class="text-nowrap table-responsive pt-0">
            <table id="myTable2" class="datatables-basic table border-top w-100">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama Alat</th>
                  <th>harga Alat</th>
                  <th>jumlah stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($alat as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td class="button_intable" >
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editobatss{{ $item->id }}">Edit</button>
                            
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="editobatss{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Alat Obat</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin_gudang/stok_obat/edit/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="modal-body semua_obats">
                                    <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>


                                    <input type="text" name="jumlah_stok" value="{{ $item->jumlah_stok }}" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Edit Alat</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
      </div>
        
    </div>
</div>


<script> 
    let table = new DataTable('#myTable');
    let table1 = new DataTable('#myTable1');
    let table2 = new DataTable('#myTable2');
</script>

<script>
  @if(Session::has('berhasil_edit'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data Berhasil diedit',
    icon: 'success',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('gagal_tambah'))
  Swal.fire({
    title: 'Gagal',
    text: 'Data bayi gagal di tambahkan',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('kosong_tambah'))

  Swal.fire({
    title: 'Gagal',
    text: 'tidak boleh ada data yang kosong',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('password ga sama'))

  Swal.fire({
    title: 'Gagal',
    text: 'Pastikan password dan confirm password sama',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('nik_ada'))

  Swal.fire({
    title: 'Gagal ',
    text: 'Nik tersebut sudah terdaftar di database',
    icon: 'error',
    confirmButtonText: 'Oke'
  })
  @endif

   </script>
@endsection