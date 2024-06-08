<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }
        .container {
            width: 90%;
            max-width: 800px;
            background: #f4f4f9;
            
            border-radius: 10px;
            overflow: hidden;
        }
        .header {
            background-color: #f4f4f9;
            /* height: 90px; */
            /* padding: 20px; */
            
            border-bottom: 2px solid #dee2e6;
        }
        .header h1{
            text-align: center;
            padding-top: 20px;
            font-size: 30px;
            color: #2E3D64;
        }
        .header h1 span{
            color: #0093AC;
        }
        .content {
            background-color: #fff; 
            border-radius: 7px 7px 0 0;
            border-top: 6px solid #2E3D64;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            
            text-align: center;
        }
        .content h2 {
            color: #2E3D64;
            margin-bottom: 10px;
        }
        .content p {
            color: #666;
            margin-bottom: 20px;
        }
        .content a {
            display: inline-block;
            background: #2E3D64;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .content a:hover{
            background: #4a5d8c;
        }
        .package {
            background-color: #fff; 
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-top: 2px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
        }
        .package h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .package .deskripsi{
            display: flex;
            align-items: center;
        }

        .package .deskripsi .gambar{
            width: 240px;
            height: 110px;
            margin-right: 20px;
            border-radius: 5px;
            background-color: rgb(183, 183, 183);
        }

        .package .deskripsi p {
            color: #666;
            margin: 0;
            /* margin-bottom: 5px; */
        }

        
        .contact {
            
            
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .contact div {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 0 5px;
            cursor: pointer;
        }

        .contact div:hover{
            background-color: #f4f4f4;
        }

        .contact div a {
            color: #343a40;
            text-decoration: none;
        }
        .summary {
            margin-top: 20px;
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary table th, .summary table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        .summary table th {
            background: #f4f4f9;
            color: #333;
        }
        .summary table td {
            text-align: end;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bumn<span>Muda.</span></h1>
        </div>
        <div class="content">
            <h2>Pembayaran Anda berhasil dikonfirmasi!</h2>
            <p>Halo Risky Asyam,<br>Sebagai referensi, ID Pesanan Anda adalah 1267126917. Silakan gunakan layanan mandiri kami untuk mendownload dan melihat pesanan Anda</p>
            <a href="#">Download Struk Pembayaran</a>
        </div>
        <div class="package">
            <h3>Nama Paket</h3>
            <div class="deskripsi">
                <div class="gambar"></div>
                <p>Deskripsi Paket</p>
            </div>
            <p><strong>Tanggal Pemesanan:</strong> Senin, 19 Juni 2024</p>
            <h4>Hubungi Admin</h4>
            <p>Untuk pertanyaan terkait properti, silakan hubungi properti secara langsung.</p>
            <div class="contact">
                <div>
                    <a href="tel:08912461212131">📞 08912461212131</a>
                </div>
                <div>
                    <a href="mailto:08912461212131">📧 BumnMuda@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="summary">
            <h3>Pesanan Anda sudah dibayar dan dikonfirmasi</h3>
            <table>
                <tr>
                    <th>Paket</th>
                    <td>IDR 140.000</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>IDR 140.000</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
