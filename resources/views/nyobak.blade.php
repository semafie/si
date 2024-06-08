<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Materi Logika</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


        *{
            box-sizing: border-box;
        }

        body {
            font-family: 'poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .atasan{
            background-color: #2E3D64;
            height: 200px;
            top: 0;
            width: 100%;
            position: absolute;
            z-index: -1;
        }

        .container {
            
            /* width: ; */
            max-width: 1400px;
            margin-top: 50px;
            /* background: #fff; */
            
            
            overflow: hidden;
            display: flex;
        }
        .sidebar {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background: #fff;
            margin-left: 40px;
            color: #fff;
            padding: 20px;
            width: 350px;
        }
        .sidebar h1 {
            font-size: 24px;
            margin: 0;
            color: #000;
        }
        .main-content {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            flex: 1;
            padding: 20px;
        }
        .main-content h2 {
            margin-top: 0;
        }
        .question-number {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .question-number h2 {
            margin: 0;
        }
        .question-number .number {
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .question {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .answers {
            margin-top: 20px;
        }
        .answers label {
            display: block;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .answers input {
            margin-right: 10px;
        }
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .nav-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .nav-buttons .prev {
            background: #343a40;
            color: #fff;
        }
        .nav-buttons .doubt {
            background: #FFC107;
            color: #fff;
        }
        .nav-buttons .next {
            background: #007BFF;
            color: #fff;
        }
        .timer {
            text-align: center;
            background: #FF5722;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .question-list {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .question-list button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }
        .question-list .current {
            background: #000;
        }
        .question-list .doubt {
            background: #FFC107;
        }
        .question-list .answered {
            background: #28A745;
        }
        .question-list .unanswered {
            background: #fff;
            color: #000;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="atasan"></div>
    <div class="container">
        
        <div class="main-content">
            <div class="question-number">
                <h2>Soal No.</h2>
                <div class="number">12</div>
            </div>
            <div class="question">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ab dicta, repudiandae voluptate ea, expedita eveniet eius velit tempora dolorum necessitatibus deserunt nihil in asperiores id?</p>
                <div class="answers">
                    <label><input type="radio" name="answer"> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                    <label><input type="radio" name="answer" checked> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                    <label><input type="radio" name="answer"> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                    <label><input type="radio" name="answer"> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                    <label><input type="radio" name="answer"> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                    <label><input type="radio" name="answer"> Lorem ipsum, dolor sit amet consectetur adipisicing elit.</label>
                </div>
            </div>
            <div class="nav-buttons">
                <button class="prev">Soal Sebelumnya</button>
                <button class="doubt">Ragu - Ragu</button>
                <button class="next">Soal Selanjutnya</button>
            </div>
        </div>
        <div class="sidebar">
            
            <div class="timer">
                01 : 30 : 22
            </div>
            <h1>No Soal :</h1>
            <h3>Nomor Soal :</h3>
            <div class="question-list">
                <button class="current">1</button>
                <button class="answered">2</button>
                <button class="answered">3</button>
                <button class="answered">4</button>
                <button class="answered">5</button>
                <button class="answered">6</button>
                <button class="answered">7</button>
                <button class="doubt">8</button>
                <button class="doubt">9</button>
                <button class="doubt">10</button>
                <button class="doubt">11</button>
                <button class="doubt">12</button>
                <button class="doubt">13</button>
                <button class="doubt">14</button>
                <button class="unanswered">15</button>
                <button class="unanswered">16</button>
                <button class="unanswered">17</button>
                <button class="unanswered">18</button>
                <button class="unanswered">19</button>
                <button class="unanswered">20</button>
                <button class="unanswered">21</button>
            </div>
        </div>
    </div>
</body>
</html>
