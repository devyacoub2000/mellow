<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password & Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://static.stayjapan.com/assets/dashboard/application-33c1a06b7784b53cd746d479718b6295c0fcefebb696e78dcee7c68efc92fada.css">
    <style>
        /* SCSS content here */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            max-width: 800px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .progress-bar-container {
            position: relative;
            margin-bottom: 20px;
        }

        .custom-progress-bar {
            counter-reset: step;
            display: flex;
            justify-content: space-between;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .custom-progress-bar li {
            font-size: 12px;
            position: relative;
            text-align: center;
            text-transform: uppercase;
            width: 50%;
        }

        .custom-progress-bar li:before {
            background-color: white;
            border-radius: 50%;
            border: 2px solid #ccc;
            color: #ccc;
            display: block;
            height: 20px;
            line-height: 18px;
            margin: 0 auto;
            text-align: center;
            width: 20px;
            content: counter(step);
            counter-increment: step;
        }

        .custom-progress-bar li:after {
            background-color: #e5e5e5;
            content: "";
            height: 3px;
            left: -50%;
            transform: translateX(50%);
            position: absolute;
            top: 9px;
            width: 100%;
            z-index: -1;
        }

        .custom-progress-bar li:last-child:before,
        .custom-progress-bar li:last-child:after {
            display: none;
        }

        .custom-progress-bar li.active:before {
            border-color: red;
            color: red;
        }

        .custom-progress-bar li.finished:before {
            background-color: red;
            border-color: red;
            color: #fff;
            content: "\2713";
        }

        .custom-progress-line {
            height: 3px;
            position: absolute;
            content: "";
            top: 9px;
            left: 0;
            width: auto;
            background-color: red;
        }

        .horizontal-form-box {
            background-color: #fff;
            border: 1px solid #e5e5e5;
            padding: 30px;
        }

        .horizontal-info-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .horizontal-info-container img {
            height: 75px;
            margin-bottom: 20px;
        }

        .horizontal-heading {
            color: #000;
            font-size: 22px;
            font-weight: bold;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        .horizontal-subtitle {
            letter-spacing: 1px;
            margin-bottom: 20px;
            text-align: left;
        }

        .horizontal-form label,
        .horizontal-form button {
            text-transform: capitalize;
        }

        .horizontal-form label {
            color: #000;
            font-weight: normal;
            margin-bottom: 8px;
            display: block;
        }

        .horizontal-form input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .horizontal-form button {
            width: 100%;
            background: red;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .horizontal-form button:hover {
            background: darkred;
        }

        .o3-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="progress-bar-container">
                <div class="custom-progress-line" style="width: 25%;"></div>
                <ul class="custom-progress-bar clearfix">
                    <li class="active">Reset password</li>
                    <li>Login</li>
                    <li class="finish-line"></li>
                </ul>
            </div>
            <div class="horizontal-form-box">
                <div class="horizontal-info-container">
                    <img src="https://static.stayjapan.com/assets/top/icon/values-7dd5c8966d7a6bf57dc4bcd11b2156e82a4fd0da94a26aecb560b6949efad2be.svg" />
                    <p class="horizontal-heading">Reset your password</p>
                    <p class="horizontal-subtitle">Your password needs to be at least 8 characters.</p>
                </div>
             
                <form class="horizontal-form" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{old('email', $request->email)}}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <label for="password">New password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <label for="password_confirmation">Confirm new password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <button type="submit">Set new password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
