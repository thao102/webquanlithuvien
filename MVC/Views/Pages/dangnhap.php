<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .form-container {
            background: #fff;
            padding: 3rem;
            font-size: 1.8rem;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 500px;
            height: 400px;
        }
        .form__title {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 500;
            text-align: center;
            color: #333;
            text-transform: uppercase;
        }
        .form__input-group {
            margin-bottom: 1.5rem;
        }
        .form__input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
        }
        .form__input-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .form__input-group input:focus {
            border-color: #6e8efb;
        }
        .form__forgot {
            display: block;
            text-align: right;
            margin: 0.5rem 0;
            font-size: 0.9rem;
            color: #6e8efb;
            text-decoration: none;
        }
        .form__forgot:hover {
            text-decoration: underline;
        }
        .form__button {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }
        .form__button:hover {
            background: linear-gradient(135deg, #a777e3, #6e8efb);
        }
        .form__social {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        .form__social a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 48%;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
        }
        .form__social a.facebook {
            background: #4267B2;
        }
        .form__social a.google {
            background: #DB4437;
        }
        .form__social a i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3 class="form__title">Đăng Nhập</h3>
        <form action="http://localhost/quanlithuvien/dangnhap_ctrl/dangnhap" method="post">
            <!-- CSRF token -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">

            <!-- Username -->
            <div class="form__input-group">
                <label for="username">Tài khoản</label>
                <input type="text" name="txtUsername" id="username" 
                       value="<?php echo htmlspecialchars($data['username'] ?? ''); ?>" 
                       required autocomplete="off">
            </div>

            <!-- Password -->
            <div class="form__input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="txtPassword" id="password" 
                       required autocomplete="off">
            </div>

            <!-- Forgot password -->
            <a href="#" class="form__forgot">Quên mật khẩu?</a>

            <!-- Submit button -->
            <button type="submit" class="form__button" name="btndn">Đăng Nhập</button>
        </form>

        <!-- Social login -->
        <div class="form__social">
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="google"><i class="fab fa-google"></i> Google</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
