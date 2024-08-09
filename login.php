<html>
<head>
    <title>Seed Connect - Login</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }
        .hero {
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('background.png');
            background-position: center;
            background-size: cover;
            position: absolute;
        }
        .form-box {
            width: 380px;
            height: 480px;
            position: relative;
            margin: 6% auto;
            background: #34353a;
            padding: 5px;
            overflow: hidden;
            border-radius: 10px;
        }
        .button-box {
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #30fe6c3d;
            border-radius: 30px;
        }
        .toggle-btn {
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            color: #fff;
        }
        #btn {
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: #30fe6c;
            border-radius: 30px;
            transition: .5s;
        }
        .input-group {
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .input-field {
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
            color: #fff;
        }
        .submit-btn {
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: #30fe6c;
            border: 0;
            outline: none;
            border-radius: 30px;
            color: #222;
            font-weight: bold;
        }
        .check-box {
            margin: 30px 10px 30px 0;
        }
        span {
            color: #777;
            font-size: 12px;
            bottom: 68px;
            position: absolute;
        }
        #login {
            left: 50px;
        }
        #register {
            left: 450px;
        }
        .form-box h2 {
            text-align: center;
            color: #30fe6c;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <h2>Seed Connect</h2>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" action="login_process.php" method="post" class="input-group">
                <input type="text" id="login_username" name="username" placeholder="Username" class="input-field" required>
                <input type="password" id="password" name="password" placeholder="Enter Password" class="input-field" required>
                <input type="checkbox" class="check-box"><span>Remember me</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form id="register" action="register_process.php" method="post" class="input-group">
                <input type="text" id="register_username" name="username" placeholder="Username" class="input-field" required>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                <input type="email" id="email" name="email" placeholder="Email" class="input-field" required>
                <input type="text" id="location" name="location" placeholder="Location" class="input-field" required>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>
</html>