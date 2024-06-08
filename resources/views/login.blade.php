<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine B&S - Login</title>
    <style>

        *{
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            height: 100vh;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            /* max-width: 1000px; */
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .form-container {
            flex: 1;
            padding: 50px 150px;
            display: flex;
            max-width: 53%;
            flex-direction: column;
            justify-content: center;
            background-color: #fff;
        }
        .form-container label {
            margin-bottom: 5px;
            color: #666;
        }
        .form-container h2 {
            font-size: 25px;
            text-align: center;
            margin-bottom: 80px;
            color: #333;
        }
        .form-container input {
            margin-bottom: 10px;
            padding: 15px 10px;
            font-size: 16px;
            background-color: #E5F5FA;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            padding: 15px 0;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .form-container .google-login {
            /* margin-top: 20px; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container .google-login button{
            width: 100%;
        }
        .form-container .google-login img {
            /* margin: 3px 10px 0 0; */
        }

        .form-container a{
            text-decoration: none;
            color: grey;
        }

        .form-container p{
            margin: 10px 0;
            text-align: center;
            color: grey;
        }
        
        .form-container a:hover{
            text-decoration: none;
            color: rgb(79, 79, 79);
        }

        .image-container {
            flex: 1;
            background: url('https://path-to-your-image.png') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: #def0ff; */
        }
        .image-container img {
            width: 95%;
            max-width: 670px;
        }

        @media (max-width: 1366px) {
            .form-container{
                max-width: 100%;
                padding: 100px;
            }

            .image-container img {
                max-width: 550px;
            }
        }
        @media (max-width: 900px) {

            .form-container{
                max-width: 100%;
                padding: 100px;
            }

            .container {
                
                flex-direction: column;
            }
            .image-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Sign in to your account</h2>
            <label for=""></label>
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Masukan username" required>
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Masukan Password" required>
            <a href="#" style="margin-top: 10px; text-align: right; display: block;">Forgot your password?</a>
            <button>Login</button>
            <p>or</p>
            <div class="google-login">
                
                <button><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">Masuk / Daftar dengan Google</button>
            </div>
        </div>
        <div class="image-container">
            <img src="img/foto_login.png" alt="Medicine B&S">
        </div>
    </div>
</body>
</html>
