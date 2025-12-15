<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - 页面不见了哦~</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #141414;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e0e0e0;
        }
        .container {
            text-align: center;
            background: rgba(30, 30, 30, 0.8);
            padding: 50px 70px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
            max-width: 600px;
            backdrop-filter: blur(5px);
        }
        .cat {
            width: 220px;
            height: 220px;
            background: #D8B9A4; /* 小猫毛色用主题色 */
            border-radius: 50%;
            margin: 0 auto 40px;
            position: relative;
            animation: float 4s ease-in-out infinite;
        }
        .cat::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 50px;
            width: 50px;
            height: 60px;
            background: #D8B9A4;
            border-radius: 50%;
            transform: rotate(-25deg);
        }
        .cat::after {
            content: '';
            position: absolute;
            top: 40px;
            right: 50px;
            width: 50px;
            height: 60px;
            background: #D8B9A4;
            border-radius: 50%;
            transform: rotate(25deg);
        }
        .eyes {
            position: absolute;
            top: 80px;
            left: 55px;
            width: 35px;
            height: 45px;
            background: white;
            border-radius: 50%;
            box-shadow: 75px 0 white;
        }
        .pupils {
            position: absolute;
            top: 15px;
            left: 12px;
            width: 12px;
            height: 18px;
            background: #333;
            border-radius: 50%;
            box-shadow: 75px 0 #333;
            animation: blink 5s infinite;
        }
        .nose {
            position: absolute;
            top: 130px;
            left: 95px;
            width: 30px;
            height: 20px;
            background: #f0cac0;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        .sign {
            position: absolute;
            bottom: -50px;
            left: 40px;
            width: 140px;
            height: 90px;
            background: #f0f0f0;
            border: 4px solid #D8B9A4;
            border-radius: 15px;
            font-size: 60px;
            font-weight: bold;
            color: #D8B9A4;
            line-height: 90px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        h1 {
            font-size: 48px;
            color: #D8B9A4;
            margin: 20px 0;
        }
        p {
            font-size: 20px;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        a {
            display: inline-block;
            padding: 14px 35px;
            background: #D8B9A4;
            color: #141414;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }
        a:hover {
            background: #e0c9b8;
            transform: translateY(-3px);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        @keyframes blink {
            0%, 85%, 100% { height: 18px; }
            90% { height: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cat">
            <div class="eyes">
                <div class="pupils"></div>
            </div>
            <div class="nose"></div>
            <div class="sign">404</div>
        </div>
        <h1>哎呀~ 页面走丢啦！</h1>
        <p>小猫咪找了好久也没找到这个页面...<br>它有点困惑，但还是想带你回家哦~</p>
        <a href="/">返回首页</a>
    </div>
</body>
</html>