@extends('admin_gudang.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card beli_obat">
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id_pembelian  </th>
                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>jumlah beli</th>
                  <th>stok obat gudang</th>
                  <th>sub total</th>
                  <th>status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detail_pembelian as $item)
               
                <tr>
                    <td>{{ $item->id_pembelian }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->harga_obat }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>
                        @php
                        $stok_gudang = $obat_gudang->firstWhere('id', $item->id_obat);
                        @endphp
                        {{ $stok_gudang ? $stok_gudang->jumlah_stok : 'Stok tidak ditemukan' }}
                    </td>
                    <td>{{ $item->sub_total }}</td>
                    <td >
                        <p class="status_verifikasi">
                        @php
                            $stok_gudang = $obat_gudang->firstWhere('id', $item->id_obat);
                        @endphp
                        @if ($stok_gudang && $item->jumlah_stok > $stok_gudang->jumlah_stok)
                        Stok Kurang
                    @else
                        Stok Tersedia
                    @endif
                </p>
                        {{-- {{ $stok_gudang ? $stok_gudang->jumlah_stok : 'Stok tidak ditemukan' }} --}}
                    </td>
                  </tr>

                @endforeach
              </tbody>
            </table>
        </div>

        <form action="/admin/verifikasi/tambah/{{ $pembelian->id }}" method="POST">
        @csrf
        @method('put')

        <div class="dua_label mt-3" >
          <label for="defaultFormControlInput" class="form-label">ID</label>
          <label  for="defaultFormControlInput" class="form-label">Tanggal Pembelian</label>
        </div>
        <div class="dua_input">
          <input type="text" class="form-control" readonly value="{{ $pembelian->id }}" name="id_pembelian"  placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
          <input id="tanggal_pembelian" readonly type="text" value="{{ $pembelian->tanggal }}" name="tanggal" class="form-control" aria-describedby="defaultFormControlHelp" />
        </div>
        <div class="dua_label" >
          <label  for="defaultFormControlInput" class="form-label">Jam</label>
          <label  for="defaultFormControlInput" class="form-label">Total Harga</label>
        </div>
        
        <div class="dua_input">
          <input id="jam" type="text" class="form-control" value="{{ $pembelian->jam }}" name="jam" placeholder="Masukkan Jam" aria-describedby="defaultFormControlHelp" />
          <input id="total_harga" type="text" name="total_harga" value="" readonly class="form-control" placeholder="Masukkan Total Harga" aria-describedby="defaultFormControlHelp" />
        </div>
        <a class="dua_obat"></a>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahobat">Verifikasi Pembelian</button>
      </form>
    </div>
</div>


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
  document.addEventListener('DOMContentLoaded', function () {

    


      const buttons = document.querySelectorAll('.pilih-obat');
      buttons.forEach(button => {
          button.addEventListener('click', function () {
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


        jumlahStokInput.addEventListener('input', function () {
            const jumlahStok = parseInt(jumlahStokInput.value);
            const hargaObat = parseFloat(hargaObatInput.value);

            if (!isNaN(jumlahStok) && !isNaN(hargaObat)) {
                const subTotal = jumlahStok * hargaObat;
                subTotalInput.value = subTotal;
            } else {
                subTotalInput.value = '';
            }
        });

        jumlahStokInput.addEventListener('input', function () {
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
  let table = new DataTable('#haloobat');
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function calculateTotalHarga() {
            let totalHarga = 0;
            document.querySelectorAll("tbody tr").forEach(function(row) {
                const statusCell = row.querySelector("td:nth-child(7)");
                const subTotalCell = row.querySelector("td:nth-child(6)");
                if (statusCell && statusCell.textContent.trim() === 'Stok Tersedia') {
                    const subTotal = parseFloat(subTotalCell.textContent.trim());
                    if (!isNaN(subTotal)) {
                        totalHarga += subTotal;
                    }
                }
            });
            document.getElementById("total_harga").value = totalHarga.toFixed(2);
        }
    
        // Calculate total on page load
        calculateTotalHarga();
    });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateStatusCellBackground() {
                document.querySelectorAll(".status_verifikasi").forEach(function(cell) {
                    const status = cell.textContent.trim();
                    if (status === 'Stok Tersedia') {
                        cell.style.backgroundColor = 'green';
                        cell.style.color = 'white';
                    } else {
                        cell.style.backgroundColor = 'red';
                        cell.style.color = 'white';
                    }
                });
            }
        
            // Update cell backgrounds on page load
            updateStatusCellBackground();
        });
        </script>
        
@endsection