<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpnamePharmacy Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <style>

        *{
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            
            height: 100vh;
            background-color: #FA5951;
        }
        .container {
            display: flex;
            width: 50%;
            max-width: 1200px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-direction: row;
        }


        .container > img{
            width: 680px;
            position: absolute;
            top: 90px;
            left: 670px;
        }
        .left, .right {
            padding: 130px;
            flex: 1;
        }

        .left {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .left h1, .left h2 {
            text-align: center;
        }
        .left h1 {
            font-size: 30px;
            margin: 0 0 10px 0;
        }
        .left h2 {
            color: #FA5951;
            font-size: 30px
            margin-bottom: 20px;
            margin: 0 0 50px 0;
        }
        .left .form-group {
            margin-bottom: 20px;
        }
        .left .form-group input {
            width: 100%;
            padding: 15px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .left .form-group input:focus {
            outline: none;
            border-color: #FA5951;
        }
        .left .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }
        .left .forgot-password a {
            
            color: #999;
            text-decoration: none;
        }
        .left .forgot-password a:hover {
            text-decoration: underline;
        }
        .left .login-btn {
            width: 100%;
            margin-top: 100px;
            padding: 20px 10px;
            border: none;
            border-radius: 5px;
            background-color: #FA5951;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .left .login-btn:hover {
            background-color: #e04545;
        }
        .left .or {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .left .or::before, .left .or::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ccc;
        }
        .left .or span {
            margin: 0 10px;
            color: #999;
        }
        .left .google-btn {
            width: 100%;
            padding: 20px 10px;
            border: none;
            border-radius: 5px;
            background-color: #4285F4;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left .google-btn:hover{
            background-color: #195cc7;
        }
        .left .google-btn img {
            margin-right: 10px;
        }
        .right {
            background: url('/mnt/data/Login.png') no-repeat center center;
            background-size: cover;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .right {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/logo_login.png') }}" alt="">
        <div class="left">
            <h1>OpnamePharmacy</h1>
            <h2>Welcome Back</h2>
            <form action="/login" method="POST">
            @csrf
        
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Masukan email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Masukan Password">
            </div>
            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>
            <button class="login-btn">Login</button>
        </form>
            {{-- <div class="or">
                <span>or</span>
            </div>
            <button class="google-btn">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Icon" width="20"> Masuk / Daftar dengan Google
            </button> --}}
        </div>
        
    </div>
    <div class="right">

    </div>

    <script>
        @if(Session::has('gagal_login'))
        Swal.fire({
          title: 'Gagal Login',
          text: 'Coba cek email atau password kembali',
          icon: 'error',
          confirmButtonText: 'Oke'
        })
      
        @elseif(Session::has('login_dulu'))
        Swal.fire({
          title: 'Anda Belum Login',
          text: 'Coba login terlebih dahulu',
          icon: 'error',
          confirmButtonText: 'Oke'
        })
      
        @elseif(Session::has('success_delete'))
      
        Swal.fire({
          title: 'Berhasil',
          text: 'Data anda berhasil di Dihapus',
          icon: 'success',
          confirmButtonText: 'Oke'
        })
        @elseif(Session::has('berhasil register'))
      
        Swal.fire({
          title: 'Berhasil',
          text: 'Anda berhasil registrasi',
          icon: 'success',
          confirmButtonText: 'Oke'
        })
        @endif
        </script>
</body>
</html>
