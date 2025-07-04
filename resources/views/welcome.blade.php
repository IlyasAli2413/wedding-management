<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wedding Management System</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                min-height: 100vh;
                margin: 0;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%), url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
                background-blend-mode: overlay;
                display: flex;
                flex-direction: column;
            }
            .hero {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .welcome-container {
                background: rgba(255,255,255,0.95);
                padding: 3rem 2.5rem;
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.12);
                text-align: center;
                max-width: 520px;
                width: 95%;
                animation: fadeIn 1.2s;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(40px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .logo {
                font-size: 4.5rem;
                margin-bottom: 1rem;
                animation: popIn 1s;
            }
            @keyframes popIn {
                0% { transform: scale(0.7); opacity: 0; }
                80% { transform: scale(1.1); opacity: 1; }
                100% { transform: scale(1); }
            }
            .title {
                font-size: 2.7rem;
                color: #4b2994;
                margin-bottom: 0.7rem;
                font-weight: 700;
                letter-spacing: 1px;
            }
            .subtitle {
                color: #6c63ff;
                margin-bottom: 2.2rem;
                font-size: 1.15rem;
                line-height: 1.6;
            }
            .portal-btn {
                display: inline-block;
                padding: 1.1rem 2.3rem;
                border-radius: 12px;
                text-decoration: none;
                font-weight: 700;
                font-size: 1.15rem;
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                color: white;
                box-shadow: 0 6px 18px rgba(246, 83, 144, 0.15);
                transition: all 0.25s;
                margin: 0 0.5rem;
            }
            .portal-btn:hover {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                transform: translateY(-4px) scale(1.04);
                box-shadow: 0 12px 24px rgba(102, 126, 234, 0.18);
            }
            @media (max-width: 600px) {
                .welcome-container {
                    padding: 1.5rem 0.7rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="hero">
            <div class="welcome-container">
                <div class="logo">💒</div>
                <h1 class="title">Wedding Management System</h1>
                <p class="subtitle">Plan, manage, and celebrate your dream wedding with ease. Choose your portal to get started!</p>
                <a href="{{ route('portal.select') }}" class="portal-btn">Enter Portal</a>
            </div>
        </div>
        <footer>
            &copy; {{ date('Y') }} Wedding Management System. Crafted with <span style="color: #f5576c;">&#10084;</span> for your special day.
        </footer>
    </body>
</html>
