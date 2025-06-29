<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wedding Management System</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .welcome-container {
                background: white;
                padding: 3rem;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 500px;
                width: 90%;
            }

            .logo {
                font-size: 4rem;
                margin-bottom: 1rem;
            }

            .title {
                font-size: 2.5rem;
                color: #333;
                margin-bottom: 1rem;
                font-weight: 600;
            }

            .subtitle {
                color: #666;
                margin-bottom: 2rem;
                font-size: 1.1rem;
                line-height: 1.6;
            }

            .portal-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .portal-btn {
                display: inline-block;
                padding: 1rem 2rem;
                border-radius: 10px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                min-width: 150px;
            }

            .admin-btn {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            .user-btn {
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                color: white;
            }

            .portal-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .portal-btn:active {
                transform: translateY(-1px);
            }

            .portal-info {
                margin-top: 2rem;
                padding-top: 2rem;
                border-top: 1px solid #eee;
            }

            .portal-info h3 {
                color: #333;
                margin-bottom: 1rem;
            }

            .portal-info p {
                color: #666;
                font-size: 0.9rem;
                line-height: 1.5;
            }

            .features {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
                margin-top: 1rem;
            }

            .feature {
                background: #f8f9fa;
                padding: 1rem;
                border-radius: 8px;
                font-size: 0.9rem;
            }

            .feature strong {
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class="welcome-container">
            <div class="logo">💒</div>
            <h1 class="title">Wedding Management System</h1>
            <p class="subtitle">Welcome to our comprehensive wedding management platform. Choose your portal to get started.</p>

            <div class="portal-buttons">
                <a href="{{ route('portal.select') }}" class="portal-btn admin-btn">
                    Home Page
                </a>
                
            </div>

            <div class="portal-info">
                <h3>What can you do?</h3>
                <div class="features">
                    <div class="feature">
                        <strong>Admin Portal:</strong><br>
                        • Manage all orders<br>
                        • Handle payments<br>
                        • Manage venues & menu<br>
                        • Full system control
                    </div>
                    <div class="feature">
                        <strong>User Portal:</strong><br>
                        • Place orders<br>
                        • Make payments<br>
                        • Browse venues<br>
                        • View menu items
                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>
