<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Wedding Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #f5576c;
        }

        .title {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        input:focus {
            outline: none;
            border-color: #f5576c;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(245, 87, 108, 0.1);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(245, 87, 108, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .error {
            background-color: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border: 1px solid #fcc;
        }

        .admin-login-link {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e1e5e9;
            color: #666;
            font-size: 0.9rem;
        }

        .admin-login-link a {
            color: #f5576c;
            text-decoration: none;
            font-weight: 500;
        }

        .admin-login-link a:hover {
            text-decoration: underline;
        }

        .user-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }

        .register-link {
            margin-top: 15px;
            color: #666;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #f5576c;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .back-home {
            margin-top: 15px;
            color: #666;
            font-size: 0.9rem;
        }

        .back-home a {
            color: #f5576c;
            text-decoration: none;
            font-weight: 500;
        }

        .back-home a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="user-badge">USER PORTAL</div>
        <div class="logo">💒</div>
        <h1 class="title">User Login</h1>
        <p class="subtitle">Wedding Management System</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">
                Login as User
            </button>
        </form>

        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </div>

        <div class="admin-login-link">
            Need to login as admin? <a href="{{ route('admin.login') }}">Admin Login</a>
        </div>

        <div class="back-home">
            <a href="{{ route('welcome') }}">← Back to Home</a>
        </div>
    </div>
</body>
</html> 