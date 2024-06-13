<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Obat Menipis - Opname Pharmacy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            text-align: center;
        }
        .header {
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            color: #ff0000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            
        }
        th {
            background-color: #FA5951;
            border-radius: 4px;
            color: white;
            text-align: center;
        }
        td {
            
            text-align: center;
        }
        .footer {
            position: absolute;
            top: 800px;
            left: 390px;
            text-align: right;
        }
        .footer .signature {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LAPORAN STOK OBAT MENIPIS</h1>
            <h2>OPNAMEPHARMACY</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA OBAT</th>
                    <th>JUMLAH STOK DIMINTA</th>
                    <th>JUMLAH STOK DI GUDANG</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pembelian as $item)
               
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>
                        @php
                        $stok_gudang = $obat->firstWhere('id', $item->id_obat);
                        @endphp
                        {{ $stok_gudang ? $stok_gudang->jumlah_stok : 'Stok tidak ditemukan' }}
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="footer">
            <p style="margin-right: 34px;">TTD APOTEKER Menyetujui</p>
            <p>Jember, ________________________</p>
            <div class="signature">
                <p style="margin-right: 12px;">a.n. ________________________</p>
            </div>
        </div>
    </div>
</body>
</html>
