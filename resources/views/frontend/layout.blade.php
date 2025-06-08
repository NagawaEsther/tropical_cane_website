<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tropical Cane Juice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css?v=5" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        :root {
            --primary-green: #00C851;
            --neutral-800: #1A1A1A;
        }

        * {
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
            background: #f8fffe !important;
        }

        .navbar {
            background: var(--neutral-800) !important;
            width: 100% !important;
            z-index: 1000 !important;
            height: 140px !important; /* Increased desktop height */
            position: fixed !important;
            top: 0 !important;
            padding: 0.5rem 0 !important;
        }

        .navbar-container {
            max-width: 1200px !important;
            margin: 0 auto !important;
            padding: 0 2rem !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            height: 100% !important;
        }

        .navbar-brand {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-decoration: none !important;
        }

        .brand-logo {
            width: 80px !important;
            height: 80px !important;
            border-radius: 16px !important;
            margin-bottom: 0.5rem !important;
            object-fit: cover !important;
            display: block !important;
        }

        .brand-text {
            display: flex !important;
            flex-direction: column !important;
            gap: 0.25rem !important;
            text-align: center !important;
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 1.5rem !important;
            font-weight: 700 !important;
            color: #FFFFFF !important;
            line-height: 1.2 !important;
        }

        .brand-tagline {
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            color: var(--primary-green) !important;
            text-transform: uppercase !important;
            display: block !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 1rem !important;
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .nav-item {
            display: inline-block !important;
        }

        .nav-link {
            font-size: 1rem !important;
            font-weight: 500 !important;
            color: #FFFFFF !important;
            text-decoration: none !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px !important;
            transition: background 0.3s, color 0.3s !important;
        }

        .nav-link:hover {
            color: var(--primary-green) !important;
            background: rgba(0, 200, 81, 0.1) !important;
        }

        .nav-link.active {
            color: white !important;
            background: var(--primary-green) !important;
        }

        .cta-button {
            background: var(--primary-green) !important;
            color: white !important;
            font-weight: 600容量: 0.5rem 1rem !important;
            border-radius: 8px !important;
            text-decoration: none !important;
            transition: background 0.3s !important;
        }

        .cta-button:hover {
            background: #33D474 !important;
        }

        .container {
            max-width: 1200px !important;
            margin: 140px auto 0 !important; /* Matches increased desktop height */
            padding: 2rem !important;
        }

        footer {
            background: var(--neutral-800) !important;
            color: #FFFFFF !important;
            text-align: center !important;
            padding: 1rem 0 !important;
            margin-top: 2rem !important;
        }

        @media (max-width: 768px) {
            .navbar {
                height: 120px !important; /* Increased mobile height */
            }

            .navbar-container {
                padding: 0 1rem !important;
            }

            .brand-logo {
                width: 60px !important;
                height: 60px !important;
            }

            .brand-name {
                font-size: 1.2rem !important;
            }

            .brand-tagline {
                font-size: 0.7rem !important;
            }

            .navbar-nav {
                gap: 0.5rem !important;
            }

            .nav-link {
                font-size: 0.9rem !important;
                padding: 0.5rem 0.75rem !important;
            }

            .cta-button {
                padding: 0.4rem 0.8rem !important;
                font-size: 0.9rem !important;
            }

            .container {
                margin-top: 120px !important; /* Matches increased mobile height */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/TC_LOGO.jpg') }}" alt="Tropical Cane Logo" class="brand-logo">
                <div class="brand-text">
                    <div class="brand-name">Tropical Cane</div>
                    <div class="brand-tagline">Fresh • Natural • Pure</div>
                </div>
            </a>
            <div class="d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('juices') ? 'active' : '' }}" href="{{ url('/juices') }}">Our Juices</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('tips') ? 'active' : '' }}" href="{{ url('/tips') }}">Healthy Tips</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
                </ul>
                <a href="{{ url('/contact') }}" class="cta-button ms-2">Get Fresh Juice</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>© {{ date('Y') }} Tropical Cane Juice. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>