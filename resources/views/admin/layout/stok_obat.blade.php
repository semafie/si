@extends('admin.template.template-header')
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
        <div class="card">

            
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <a><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahobat">Tambah Obat Baru</button></a>
                    <div class="text-nowrap table-responsive pt-0">
                        <table id="myTable" class="datatables-basic table border-top w-100">
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
                                        <td class="button_intable">
                                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editobat{{ $item->id }}">Edit</button>
                                            <form action="/admin/obat/hapus/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editobat{{ $item->id }}"
                                        aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalToggleLabel">Edit Obat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="/admin/obat/edit/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body semua_obats">
                                                        <div class="dua_label">
                                                            <label for="defaultFormControlInput"
                                                                class="form-label">ID</label>
                                                            <label for="defaultFormControlInput" class="form-label">Nama
                                                                Obat</label>
                                                        </div>
                                                        <div class="dua_input">
                                                            <input type="text" value="{{ $item->id }}"
                                                                class="form-control" disabled id="defaultFormControlInput"
                                                                placeholder="ID dibuat otomatis"
                                                                aria-describedby="defaultFormControlHelp" />
                                                            <input type="text" name="nama_obat"
                                                                value="{{ $item->nama_obat }}" name="nama_obat"
                                                                class="form-control" id="defaultFormControlInput"
                                                                placeholder="Masukkan nama obat"
                                                                aria-describedby="defaultFormControlHelp" />
                                                        </div>
                                                        <div class="dua_label">
                                                            <label for="defaultFormControlInput" class="form-label">Harga
                                                                Obat</label>
                                                            <label for="defaultFormControlInput" class="form-label">JUmlah
                                                                stok</label>
                                                        </div>
                                                        <div class="dua_input">
                                                            <input type="text" name="harga_obat"
                                                                value="{{ $item->harga_obat }}" name="harga_obat"
                                                                class="form-control" id="defaultFormControlInput"
                                                                placeholder="Masukkan harga obat"
                                                                aria-describedby="defaultFormControlHelp" />
                                                            <input type="text" name="jumlah_stok"
                                                                value="{{ $item->jumlah_stok }}" name="jumlah_stok"
                                                                class="form-control" id="defaultFormControlInput"
                                                                placeholder="Masukkan jumlah stok"
                                                                aria-describedby="defaultFormControlHelp" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Edit Obat</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="tambahobat" aria-labelledby="modalToggleLabel" tabindex="-1"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalToggleLabel">Tambah bahan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="/admin/obat/tambahobat" method="POST">
                                    @csrf
                                    <div class="modal-body semua_obats">
                                        <div class="dua_label">
                                            <label for="defaultFormControlInput" class="form-label">ID</label>
                                            <label for="defaultFormControlInput" class="form-label">Nama
                                                Obat</label>
                                        </div>
                                        <div class="dua_input">
                                            <input type="text" value="" class="form-control" disabled
                                                id="defaultFormControlInput" placeholder="ID dibuat otomatis"
                                                aria-describedby="defaultFormControlHelp" />
                                            <input type="text" name="nama_obat" value="" name="nama_obat"
                                                class="form-control" id="defaultFormControlInput"
                                                placeholder="Masukkan nama obat"
                                                aria-describedby="defaultFormControlHelp" />
                                        </div>
                                        <div class="dua_label">
                                            <label for="defaultFormControlInput" class="form-label">Harga
                                                Obat</label>
                                            <label for="defaultFormControlInput" class="form-label">JUmlah
                                                stok</label>
                                        </div>
                                        <div class="dua_input">
                                            <input type="text" name="harga_obat" value="" name="harga_obat"
                                                class="form-control" id="defaultFormControlInput"
                                                placeholder="Masukkan harga obat"
                                                aria-describedby="defaultFormControlHelp" />
                                            <input type="text" name="jumlah_stok" value="" name="jumlah_stok"
                                                class="form-control" id="defaultFormControlInput"
                                                placeholder="Masukkan jumlah stok"
                                                aria-describedby="defaultFormControlHelp" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah Obat</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <a><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahbph">Tambah bhp Baru</button></a>
                    <div class="text-nowrap table-responsive pt-0">
                    <table id="myTable1" class="datatables-basic table border-top w-100">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nama Bahan</th>
                                <th>harga bahan</th>
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
                                    <td class="button_intable">
                                        <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editobat{{ $item->id }}">Edit</button>
                                        <form action="/admin/obat/hapus/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                    
                                <div class="modal fade" id="editobat{{ $item->id }}"
                                    aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalToggleLabel">Edit Bahan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                    
                                            <form action="/admin/obat/edit/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body semua_obats">
                                                    <div class="dua_label">
                                                        <label for="defaultFormControlInput"
                                                            class="form-label">ID</label>
                                                        <label for="defaultFormControlInput" class="form-label">Nama
                                                            Bahan</label>
                                                    </div>
                                                    <div class="dua_input">
                                                        <input type="text" value="{{ $item->id }}"
                                                            class="form-control" disabled id="defaultFormControlInput"
                                                            placeholder="ID dibuat otomatis"
                                                            aria-describedby="defaultFormControlHelp" />
                                                        <input type="text" name="nama_obat"
                                                            value="{{ $item->nama_obat }}" name="nama_obat"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan nama obat"
                                                            aria-describedby="defaultFormControlHelp" />
                                                    </div>
                                                    <div class="dua_label">
                                                        <label for="defaultFormControlInput" class="form-label">Harga
                                                            Bahan</label>
                                                        <label for="defaultFormControlInput" class="form-label">JUmlah
                                                            stok</label>
                                                    </div>
                                                    <div class="dua_input">
                                                        <input type="text" name="harga_obat"
                                                            value="{{ $item->harga_obat }}" name="harga_obat"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan harga obat"
                                                            aria-describedby="defaultFormControlHelp" />
                                                        <input type="text" name="jumlah_stok"
                                                            value="{{ $item->jumlah_stok }}" name="jumlah_stok"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan jumlah stok"
                                                            aria-describedby="defaultFormControlHelp" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit Obat</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="modal fade" id="tambahbph" aria-labelledby="modalToggleLabel" tabindex="-1"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel">Tambah bahan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin/tambahbahan" method="POST">
                                @csrf
                                <div class="modal-body semua_obats">
                                    <div class="dua_label">
                                        <label for="defaultFormControlInput" class="form-label">ID</label>
                                        <label for="defaultFormControlInput" class="form-label">Nama
                                            Bahan</label>
                                    </div>
                                    <div class="dua_input">
                                        <input type="text" value="" class="form-control" disabled
                                            id="defaultFormControlInput" placeholder="ID dibuat otomatis"
                                            aria-describedby="defaultFormControlHelp" />
                                        <input type="text" name="nama_obat" value="" name="nama_obat"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan nama obat"
                                            aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="dua_label">
                                        <label for="defaultFormControlInput" class="form-label">Harga
                                            Bahan</label>
                                        <label for="defaultFormControlInput" class="form-label">JUmlah
                                            stok</label>
                                    </div>
                                    <div class="dua_input">
                                        <input type="text" name="harga_obat" value="" name="harga_obat"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan harga obat"
                                            aria-describedby="defaultFormControlHelp" />
                                        <input type="text" name="jumlah_stok" value="" name="jumlah_stok"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan jumlah stok"
                                            aria-describedby="defaultFormControlHelp" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah Obat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                    <a><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahalat">Tambah Alat Baru</button></a>
                <div class="text-nowrap table-responsive pt-0">
                    <table id="myTable2" class="datatables-basic table border-top w-100" >
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nama alat</th>
                                <th>harga alat</th>
                                <th>jumlah alat</th>
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
                                    <td class="button_intable">
                                        <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editobat{{ $item->id }}">Edit</button>
                                        <form action="/admin/obat/hapus/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editobat{{ $item->id }}"
                                    aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalToggleLabel">Edit Obat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="/admin/obat/edit/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body semua_obats">
                                                    <div class="dua_label">
                                                        <label for="defaultFormControlInput"
                                                            class="form-label">ID</label>
                                                        <label for="defaultFormControlInput" class="form-label">Nama
                                                            alat</label>
                                                    </div>
                                                    <div class="dua_input">
                                                        <input type="text" value="{{ $item->id }}"
                                                            class="form-control" disabled id="defaultFormControlInput"
                                                            placeholder="ID dibuat otomatis"
                                                            aria-describedby="defaultFormControlHelp" />
                                                        <input type="text" name="nama_obat"
                                                            value="{{ $item->nama_obat }}" name="nama_obat"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan nama obat"
                                                            aria-describedby="defaultFormControlHelp" />
                                                    </div>
                                                    <div class="dua_label">
                                                        <label for="defaultFormControlInput" class="form-label">Harga
                                                            alat</label>
                                                        <label for="defaultFormControlInput" class="form-label">JUmlah
                                                            stok</label>
                                                    </div>
                                                    <div class="dua_input">
                                                        <input type="text" name="harga_obat"
                                                            value="{{ $item->harga_obat }}" name="harga_obat"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan harga obat"
                                                            aria-describedby="defaultFormControlHelp" />
                                                        <input type="text" name="jumlah_stok"
                                                            value="{{ $item->jumlah_stok }}" name="jumlah_stok"
                                                            class="form-control" id="defaultFormControlInput"
                                                            placeholder="Masukkan jumlah stok"
                                                            aria-describedby="defaultFormControlHelp" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit alat</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="tambahalat" aria-labelledby="modalToggleLabel" tabindex="-1"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel">Tambah alat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="/admin/tambahalat" method="POST">
                                @csrf
                                <div class="modal-body semua_obats">
                                    <div class="dua_label">
                                        <label for="defaultFormControlInput" class="form-label">ID</label>
                                        <label for="defaultFormControlInput" class="form-label">Nama
                                            Alat</label>
                                    </div>
                                    <div class="dua_input">
                                        <input type="text" value="" class="form-control" disabled
                                            id="defaultFormControlInput" placeholder="ID dibuat otomatis"
                                            aria-describedby="defaultFormControlHelp" />
                                        <input type="text" name="nama_obat" value="" name="nama_obat"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan nama obat"
                                            aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="dua_label">
                                        <label for="defaultFormControlInput" class="form-label">Harga
                                            ALat</label>
                                        <label for="defaultFormControlInput" class="form-label">JUmlah
                                            stok</label>
                                    </div>
                                    <div class="dua_input">
                                        <input type="text" name="harga_obat" value="" name="harga_obat"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan harga obat"
                                            aria-describedby="defaultFormControlHelp" />
                                        <input type="text" name="jumlah_stok" value="" name="jumlah_stok"
                                            class="form-control" id="defaultFormControlInput"
                                            placeholder="Masukkan jumlah stok"
                                            aria-describedby="defaultFormControlHelp" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah Obat</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    @if(Session::has('berhasil_tambah'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data Berhasil ditambahkan',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('gagal_tambah'))
    Swal.fire({
      title: 'Gagal',
      text: 'Data gagal di tambahkan',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('berhasil_edit'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data Berhasil di edit',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('berhsail_hapus'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data Berhasil dihapus',
      icon: 'success',
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
