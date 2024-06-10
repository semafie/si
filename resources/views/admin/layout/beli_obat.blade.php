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
        

        <div style="padding: 0;" class="card beli_obat">

          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                <a class="dua_obat"><button id="resetButton" type="submit" class="btn btn-primary">Reset</button><button
                    type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cariobat">Cari
                    Obat</button></a>
            <div class="text-nowrap table-responsive pt-0">
                <table id="myTable" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>id_pembelian </th>
                            <th>nama obat</th>
                            <th>harga obat</th>
                            <th>jumlah beli</th>
                            <th>sub total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_pembelianobat as $item)
                            <tr>
                                <td>{{ $item->id_pembelian }}</td>
                                <td>{{ $item->nama_obat }}</td>
                                <td>{{ $item->harga_obat }}</td>
                                <td>{{ $item->jumlah_stok }}</td>
                                <td class="sub-total">{{ $item->sub_total }}</td>
                                <form action="/admin/detail_pemebelian/hapus/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="/admin/pembelian/tambahobat" method="POST">
                @csrf

                <div class="dua_label mt-3">
                    <label for="defaultFormControlInput" class="form-label">ID</label>
                    <label for="defaultFormControlInput" class="form-label">Tanggal Pembelian</label>
                </div>
                <div class="dua_input">
                    <input type="text" class="form-control" disabled placeholder="ID dibuat otomatis"
                        aria-describedby="defaultFormControlHelp" />
                    <input id="tanggal_pembelian" type="text" name="tanggal" class="form-control"
                        aria-describedby="defaultFormControlHelp" />
                </div>
                <div class="dua_label">
                    <label for="defaultFormControlInput" class="form-label">Jam</label>
                    <label for="defaultFormControlInput" class="form-label">Total Harga</label>
                </div>
                <div class="dua_input">
                    <input id="jam" type="text" value="" class="form-control" name="jam"
                        placeholder="Masukkan Jam" aria-describedby="defaultFormControlHelp" />
                    <input id="total_harga" type="text" name="total_harga" value="" readonly class="form-control"
                        placeholder="Masukkan Total Harga" aria-describedby="defaultFormControlHelp" />
                </div>
                <a class="dua_obat"><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahobat">Buat Transaksi</button></a>
            </form>
        </div>

        <div class="modal fade" id="cariobat" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Pilih Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-nowrap table-responsive pt-0">
                            <table id="haloobat" class=" table border-top table-hover">
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
                                            <td>
                                                <button type="button" class="btn btn-warning pilih-obat"
                                                    data-id="{{ $item->id }}" data-nama="{{ $item->nama_obat }}"
                                                    data-harga="{{ $item->harga_obat }}" data-bs-toggle="modal"
                                                    data-bs-target="#masukkansubtotal">Pilih Obat</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="masukkansubtotal" aria-labelledby="modalToggleLabel" tabindex="-1"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Beli Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/detail_pembelian/tambahobat" method="POST">
                        @csrf

                        <div class="modal-body beli_obat">
                            <div class="dua_label">
                                <label for="defaultFormControlInput" class="form-label">Nama Obat</label>
                                <label for="defaultFormControlInput" class="form-label">Harga Obat</label>
                            </div>
                            <div class="dua_input">
                                <input type="text" readonly name="nama_obat" value="" class="form-control"
                                    id="nama_obat" placeholder="Jumlah stok Yang Akan dibeli"
                                    aria-describedby="defaultFormControlHelp" />
                                <input type="hidden" value="" name="id_obat" class="form-control" id="id_obats"
                                    placeholder="id" aria-describedby="defaultFormControlHelp" />
                                <input type="text" readonly value="" name="harga_obat" id="harga_obat"
                                    class="form-control" placeholder="Hasil Sub Total"
                                    aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="dua_label">
                                <label for="defaultFormControlInput" class="form-label">Jumlah stok Yang Akan
                                    dibeli</label>
                                <label for="defaultFormControlInput" class="form-label">Sub Total</label>
                            </div>
                            <div class="dua_input">
                                <input type="text" name="jumlah_stok" value="" class="form-control"
                                    id="jumlah_stok" placeholder="isi angka" aria-describedby="defaultFormControlHelp" />
                                <input type="text" name="sub_total" value="" class="form-control"
                                    id="sub_total" placeholder="sub total" aria-describedby="defaultFormControlHelp" />
                            </div>
                            NB : Jika obat sudah ada di tabel maka stok yang akan di edit sesuai isian terakhir,
                            <br>
                            Sub total akan otomatis terisi setelah mengisi jumlah yang akan di beli
                        </div>
                        <div class="modal-footer">
                            <button id="jumlah-sesuai-btn" type="submit" class="btn btn-primary">Jumlah sudah sesuai</button>
                        </div>
                    </form>
                </div>
            </div>
        
            </div>



            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">


              <a class="dua_obat"><button id="resetButton" type="submit" class="btn btn-primary">Reset</button><button
                type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#caribahan">Cari
                BHP</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable1" class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th>id_pembelian </th>
                        <th>nama Bahan</th>
                        <th>harga Bahan</th>
                        <th>jumlah beli</th>
                        <th>sub total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_pembelianbahan as $item)
                        <tr>
                            <td>{{ $item->id_pembelian }}</td>
                            <td>{{ $item->nama_obat }}</td>
                            <td>{{ $item->harga_obat }}</td>
                            <td>{{ $item->jumlah_stok }}</td>
                            <td class="sub-totals">{{ $item->sub_total }}</td>
                            <form action="/admin/detail_pemebelian/hapus/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="/admin/pembelian/tambahbahan" method="POST">
            @csrf

            <div class="dua_label mt-3">
                <label for="defaultFormControlInput" class="form-label">ID</label>
                <label for="defaultFormControlInput" class="form-label">Tanggal Pembelian</label>
            </div>
            <div class="dua_input">
                <input type="text" class="form-control" disabled placeholder="ID dibuat otomatis"
                    aria-describedby="defaultFormControlHelp" />
                <input id="tanggal_pembelians" type="text" name="tanggal" class="form-control"
                    aria-describedby="defaultFormControlHelp" />
            </div>
            <div class="dua_label">
                <label for="defaultFormControlInput" class="form-label">Jam</label>
                <label for="defaultFormControlInput" class="form-label">Total Harga</label>
            </div>
            <div class="dua_input">
                <input id="jams" type="text" value="" class="form-control" name="jam"
                    placeholder="Masukkan Jam" aria-describedby="defaultFormControlHelp" />
                <input id="total_hargas" type="text" name="total_harga" value="" readonly class="form-control"
                    placeholder="Masukkan Total Harga" aria-describedby="defaultFormControlHelp" />
            </div>
            <a class="dua_obat"><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#tambahobat">Buat Transaksi</button></a>
        </form>
    </div>

    <div class="modal fade" id="caribahan" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Pilih Bhp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-nowrap table-responsive pt-0">
                        <table id="haloobat1" class=" table border-top table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nama bahan</th>
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
                                        <td>
                                            <button type="button" class="btn btn-warning pilih-obat"
                                                data-ids="{{ $item->id }}" data-namas="{{ $item->nama_obat }}"
                                                data-hargas="{{ $item->harga_obat }}" data-bs-toggle="modal"
                                                data-bs-target="#masukkansubtotals">Pilih Obat</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="masukkansubtotals" aria-labelledby="modalToggleLabel" tabindex="-1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Beli BHP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/detail_pembelian/tambahbahan" method="POST">
                    @csrf

                    <div class="modal-body beli_obat">
                        <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">Nama BHP</label>
                            <label for="defaultFormControlInput" class="form-label">Harga BHP</label>
                        </div>
                        <div class="dua_input">
                            <input type="text" readonly name="nama_obat" value="" class="form-control"
                                id="nama_obats" placeholder="Jumlah stok Yang Akan dibeli"
                                aria-describedby="defaultFormControlHelp" />
                            <input type="hidden" value="" name="id_obat" class="form-control" id="id_obatss"
                                placeholder="id" aria-describedby="defaultFormControlHelp" />
                            <input type="text" readonly value="" name="harga_obat" id="harga_obats"
                                class="form-control" placeholder="Hasil Sub Total"
                                aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">Jumlah stok Yang Akan
                                dibeli</label>
                            <label for="defaultFormControlInput" class="form-label">Sub Total</label>
                        </div>
                        <div class="dua_input">
                            <input type="text" name="jumlah_stok" value="" class="form-control"
                                id="jumlah_stoks" placeholder="isi angka" aria-describedby="defaultFormControlHelp" />
                            <input type="text" name="sub_total" value="" class="form-control"
                                id="sub_totals" placeholder="sub total" aria-describedby="defaultFormControlHelp" />
                        </div>
                        NB : Jika obat sudah ada di tabel maka stok yang akan di edit sesuai isian terakhir,
                        <br>
                        Sub total akan otomatis terisi setelah mengisi jumlah yang akan di beli
                    </div>
                    <div class="modal-footer">
                        <button id="jumlah-sesuai-btns" type="submit" class="btn btn-primary">Jumlah sudah sesuai</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
              <a class="dua_obat"><button id="resetButton" type="submit" class="btn btn-primary">Reset</button><button
                type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cariobatss">Cari
                Alat</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable2" class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th>id_pembelian </th>
                        <th>nama alat</th>
                        <th>harga alat</th>
                        <th>jumlah beli</th>
                        <th>sub total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_pembelianalat as $item)
                        <tr>
                            <td>{{ $item->id_pembelian }}</td>
                            <td>{{ $item->nama_obat }}</td>
                            <td>{{ $item->harga_obat }}</td>
                            <td>{{ $item->jumlah_stok }}</td>
                            <td class="sub-totalss">{{ $item->sub_total }}</td>
                            <form action="/admin/detail_pemebelian/hapus/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="/admin/pembelian/tambahalat" method="POST">
            @csrf

            <div class="dua_label mt-3">
                <label for="defaultFormControlInput" class="form-label">ID</label>
                <label for="defaultFormControlInput" class="form-label">Tanggal Pembelian</label>
            </div>
            <div class="dua_input">
                <input type="text" class="form-control" disabled placeholder="ID dibuat otomatis"
                    aria-describedby="defaultFormControlHelp" />
                <input id="tanggal_pembelianss" type="text" name="tanggal" class="form-control"
                    aria-describedby="defaultFormControlHelp" />
            </div>
            <div class="dua_label">
                <label for="defaultFormControlInput" class="form-label">Jam</label>
                <label for="defaultFormControlInput" class="form-label">Total Harga</label>
            </div>
            <div class="dua_input">
                <input id="jamss" type="text" value="" class="form-control" name="jam"
                    placeholder="Masukkan Jam" aria-describedby="defaultFormControlHelp" />
                <input id="total_hargass" type="text" name="total_harga" value="" readonly class="form-control"
                    placeholder="Masukkan Total Harga" aria-describedby="defaultFormControlHelp" />
            </div>
            <a class="dua_obat"><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#tambahobat">Buat Transaksi</button></a>
        </form>
    </div>

    <div class="modal fade" id="cariobatss" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Pilih Alat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-nowrap table-responsive pt-0">
                        <table id="haloobat2" class=" table border-top table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nama alat</th>
                                    <th>harga alat</th>
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
                                        <td>
                                            <button type="button" class="btn btn-warning pilih-obat"
                                                data-idss="{{ $item->id }}" data-namass="{{ $item->nama_obat }}"
                                                data-hargass="{{ $item->harga_obat }}" data-bs-toggle="modal"
                                                data-bs-target="#masukkansubtotalss">Pilih Obat</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="masukkansubtotalss" aria-labelledby="modalToggleLabel" tabindex="-1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Beli Alat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/detail_pembelian/tambahalat" method="POST">
                    @csrf

                    <div class="modal-body beli_obat">
                        <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">Nama Alat</label>
                            <label for="defaultFormControlInput" class="form-label">Harga Alat</label>
                        </div>
                        <div class="dua_input">
                            <input type="text" readonly name="nama_obat" value="" class="form-control"
                                id="nama_obatss" placeholder="Jumlah stok Yang Akan dibeli"
                                aria-describedby="defaultFormControlHelp" />
                            <input type="hidden" value="" name="id_obat" class="form-control" id="id_obatsss"
                                placeholder="id" aria-describedby="defaultFormControlHelp" />
                            <input type="text" readonly value="" name="harga_obat" id="harga_obatss"
                                class="form-control" placeholder="Hasil Sub Total"
                                aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">Jumlah stok Yang Akan
                                dibeli</label>
                            <label for="defaultFormControlInput" class="form-label">Sub Total</label>
                        </div>
                        <div class="dua_input">
                            <input type="text" name="jumlah_stok" value="" class="form-control"
                                id="jumlah_stokss" placeholder="isi angka" aria-describedby="defaultFormControlHelp" />
                            <input type="text" name="sub_total" value="" class="form-control"
                                id="sub_totalss" placeholder="sub total" aria-describedby="defaultFormControlHelp" />
                        </div>
                        NB : Jika obat sudah ada di tabel maka stok yang akan di edit sesuai isian terakhir,
                        <br>
                        Sub total akan otomatis terisi setelah mengisi jumlah yang akan di beli
                    </div>
                    <div class="modal-footer">
                        <button id="jumlah-sesuai-btnss" type="submit" class="btn btn-primary">Jumlah sudah sesuai</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
          </div>
        </div>
            


    </div>

    <script>
      @if(Session::has('berhasil_tambah'))
    
      Swal.fire({
        title: 'Berhasil',
        text: 'Data Transaksi Berhasil ditambahkan',
        icon: 'success',
        confirmButtonText: 'Oke'
      })
    
      @elseif(Session::has('gagal_tambah'))
      Swal.fire({
        title: 'Gagal',
        text: 'Data Transaksi gagal di tambahkan',
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





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahStokInput = document.getElementById('jumlah_stok');
            const jumlahSesuaiBtn = document.getElementById('jumlah-sesuai-btn');

            // Function to check if jumlah_stok is empty and enable/disable the button
            function checkJumlahStok() {
                if (jumlahStokInput.value.trim() === '') {
                    jumlahSesuaiBtn.disabled = true;
                } else {
                    jumlahSesuaiBtn.disabled = false;
                }
            }
            jumlahStokInput.addEventListener('keyup', checkJumlahStok);

            // Initial check in case the input already has a value on page load
            checkJumlahStok();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahStokInput = document.getElementById('jumlah_stoks');
            const jumlahSesuaiBtn = document.getElementById('jumlah-sesuai-btns');

            // Function to check if jumlah_stok is empty and enable/disable the button
            function checkJumlahStok() {
                if (jumlahStokInput.value.trim() === '') {
                    jumlahSesuaiBtn.disabled = true;
                } else {
                    jumlahSesuaiBtn.disabled = false;
                }
            }
            jumlahStokInput.addEventListener('keyup', checkJumlahStok);

            // Initial check in case the input already has a value on page load
            checkJumlahStok();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahStokInput = document.getElementById('jumlah_stokss');
            const jumlahSesuaiBtn = document.getElementById('jumlah-sesuai-btnss');

            // Function to check if jumlah_stok is empty and enable/disable the button
            function checkJumlahStok() {
                if (jumlahStokInput.value.trim() === '') {
                    jumlahSesuaiBtn.disabled = true;
                } else {
                    jumlahSesuaiBtn.disabled = false;
                }
            }
            jumlahStokInput.addEventListener('keyup', checkJumlahStok);

            // Initial check in case the input already has a value on page load
            checkJumlahStok();
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {




            const buttons = document.querySelectorAll('.pilih-obat');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaObat = this.getAttribute('data-nama');
                    const hargaObat = this.getAttribute('data-harga');
                    const idObat = this.getAttribute('data-id');

                    document.getElementById('jumlah_stok').value = '';
                    document.getElementById('sub_total').value = '';
                    document.getElementById('nama_obat').value = namaObat;
                    document.getElementById('harga_obat').value = hargaObat;
                    document.getElementById('id_obats').value = idObat;
                });
            });
            const jumlahStokInput = document.getElementById('jumlah_stok');
            const subTotalInput = document.getElementById('sub_total');
            const hargaObatInput = document.getElementById('harga_obat');


            jumlahStokInput.addEventListener('input', function() {
                const jumlahStok = parseInt(jumlahStokInput.value);
                const hargaObat = parseFloat(hargaObatInput.value);

                if (!isNaN(jumlahStok) && !isNaN(hargaObat)) {
                    const subTotal = jumlahStok * hargaObat;
                    subTotalInput.value = subTotal;
                } else {
                    subTotalInput.value = '';
                }
            });

            jumlahStokInput.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
            });



            function updateTotalHarga() {
                const table = document.getElementById('myTable').querySelector('tbody');
                let totalHarga = 0;

                table.querySelectorAll('tr').forEach(row => {
                    const subTotalCell = row.cells[4];
                    totalHarga += parseFloat(subTotalCell.innerText);
                });

                document.getElementById('total_harga').value = totalHarga.toFixed(2);
            }

            function getCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();

                // Tambahkan leading zero jika nilai jam, menit, atau detik kurang dari 10
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                return hours + ':' + minutes + ':' + seconds;
            }

            // Fungsi untuk mengupdate nilai input jam setiap detik
            function updateJamInput() {
                const jamInput = document.getElementById('jam');
                jamInput.value = getCurrentTime();
            }

            // Jalankan fungsi updateJamInput setiap detik
            setInterval(updateJamInput, 900);

            var tanggalSaatIni = new Date();

            // Mengambil tahun, bulan, dan tanggal
            var tahun = tanggalSaatIni.getFullYear();
            var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
            var tanggal = tanggalSaatIni.getDate();

            // Format tanggal ke dalam bentuk yyyy-mm-dd
            var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);

            // Menetapkan nilai tanggal ke input
            document.getElementById("tanggal_pembelian").value = tanggalFormat;

            // Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
            function pad(number, length) {
                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {




            const buttons = document.querySelectorAll('.pilih-obat');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaObat = this.getAttribute('data-namas');
                    const hargaObat = this.getAttribute('data-hargas');
                    const idObat = this.getAttribute('data-ids');

                    document.getElementById('jumlah_stoks').value = '';
                    document.getElementById('sub_totals').value = '';
                    document.getElementById('nama_obats').value = namaObat;
                    document.getElementById('harga_obats').value = hargaObat;
                    document.getElementById('id_obatss').value = idObat;
                });
            });
            const jumlahStokInput = document.getElementById('jumlah_stoks');
            const subTotalInput = document.getElementById('sub_totals');
            const hargaObatInput = document.getElementById('harga_obats');


            jumlahStokInput.addEventListener('input', function() {
                const jumlahStok = parseInt(jumlahStokInput.value);
                const hargaObat = parseFloat(hargaObatInput.value);

                if (!isNaN(jumlahStok) && !isNaN(hargaObat)) {
                    const subTotal = jumlahStok * hargaObat;
                    subTotalInput.value = subTotal;
                } else {
                    subTotalInput.value = '';
                }
            });

            jumlahStokInput.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
            });



            // function updateTotalHarga() {
            //     const table = document.getElementById('myTable1').querySelector('tbody');
            //     let totalHarga = 0;

            //     table.querySelectorAll('tr').forEach(row => {
            //         const subTotalCell = row.cells[4];
            //         totalHarga += parseFloat(subTotalCell.innerText);
            //     });

            //     document.getElementById('total_hargas').value = totalHarga.toFixed(2);
            // }

            function getCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();

                // Tambahkan leading zero jika nilai jam, menit, atau detik kurang dari 10
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                return hours + ':' + minutes + ':' + seconds;
            }

            // Fungsi untuk mengupdate nilai input jam setiap detik
            function updateJamInput() {
                const jamInput = document.getElementById('jams');
                jamInput.value = getCurrentTime();
            }

            // Jalankan fungsi updateJamInput setiap detik
            setInterval(updateJamInput, 900);

            var tanggalSaatIni = new Date();

            // Mengambil tahun, bulan, dan tanggal
            var tahun = tanggalSaatIni.getFullYear();
            var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
            var tanggal = tanggalSaatIni.getDate();

            // Format tanggal ke dalam bentuk yyyy-mm-dd
            var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);

            // Menetapkan nilai tanggal ke input
            document.getElementById("tanggal_pembelians").value = tanggalFormat;

            // Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
            function pad(number, length) {
                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {




            const buttons = document.querySelectorAll('.pilih-obat');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaObat = this.getAttribute('data-namass');
                    const hargaObat = this.getAttribute('data-hargass');
                    const idObat = this.getAttribute('data-idss');

                    document.getElementById('jumlah_stokss').value = '';
                    document.getElementById('sub_totalss').value = '';
                    document.getElementById('nama_obatss').value = namaObat;
                    document.getElementById('harga_obatss').value = hargaObat;
                    document.getElementById('id_obatsss').value = idObat;
                });
            });
            const jumlahStokInput = document.getElementById('jumlah_stokss');
            const subTotalInput = document.getElementById('sub_totalss');
            const hargaObatInput = document.getElementById('harga_obatss');


            jumlahStokInput.addEventListener('input', function() {
                const jumlahStok = parseInt(jumlahStokInput.value);
                const hargaObat = parseFloat(hargaObatInput.value);

                if (!isNaN(jumlahStok) && !isNaN(hargaObat)) {
                    const subTotal = jumlahStok * hargaObat;
                    subTotalInput.value = subTotal;
                } else {
                    subTotalInput.value = '';
                }
            });

            jumlahStokInput.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
            });



            // function updateTotalHarga() {
            //     const table = document.getElementById('myTable2').querySelector('tbody');
            //     let totalHarga = 0;

            //     table.querySelectorAll('tr').forEach(row => {
            //         const subTotalCell = row.cells[4];
            //         totalHarga += parseFloat(subTotalCell.innerText);
            //     });

            //     document.getElementById('total_hargass').value = totalHarga.toFixed(2);
            // }

            function getCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();

                // Tambahkan leading zero jika nilai jam, menit, atau detik kurang dari 10
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                return hours + ':' + minutes + ':' + seconds;
            }

            // Fungsi untuk mengupdate nilai input jam setiap detik
            function updateJamInput() {
                const jamInput = document.getElementById('jamss');
                jamInput.value = getCurrentTime();
            }

            // Jalankan fungsi updateJamInput setiap detik
            setInterval(updateJamInput, 900);

            var tanggalSaatIni = new Date();

            // Mengambil tahun, bulan, dan tanggal
            var tahun = tanggalSaatIni.getFullYear();
            var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
            var tanggal = tanggalSaatIni.getDate();

            // Format tanggal ke dalam bentuk yyyy-mm-dd
            var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);

            // Menetapkan nilai tanggal ke input
            document.getElementById("tanggal_pembelianss").value = tanggalFormat;

            // Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
            function pad(number, length) {
                var str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            calculateTotalHarga();
        });

        function calculateTotalHarga() {
            let totalHarga = 0;
            document.querySelectorAll('.sub-total').forEach(function(element) {
                totalHarga += parseFloat(element.textContent);
            });
            document.getElementById('total_harga').value = totalHarga;
        }

        function removeRow(button) {
            let row = button.closest('tr');
            row.remove();
            calculateTotalHarga();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            calculateTotalHargas();
        });

        function calculateTotalHargas() {
            let totalHarga = 0;
            document.querySelectorAll('.sub-totals').forEach(function(element) {
                totalHarga += parseFloat(element.textContent);
            });
            document.getElementById('total_hargas').value = totalHarga;
        }

        function removeRows(button) {
            let row = button.closest('tr');
            row.remove();
            calculateTotalHargas();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            calculateTotalHargass();
        });

        function calculateTotalHargass() {
            let totalHarga = 0;
            document.querySelectorAll('.sub-totalss').forEach(function(element) {
                totalHarga += parseFloat(element.textContent);
            });
            document.getElementById('total_hargass').value = totalHarga;
        }

        function removeRowss(button) {
            let row = button.closest('tr');
            row.remove();
            calculateTotalHargass();
        }
    </script>

    <script>
        let table = new DataTable('#haloobat');
        let table1 = new DataTable('#haloobat1');
        let table2 = new DataTable('#haloobat2');
    </script>
@endsection
