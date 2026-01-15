<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'The Barn Coworking' ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Warm, Earthy Color Palette - Inspired Design */
            --primary-color: #8B4513;
            --primary-dark: #654321;
            --primary-light: #A0522D;
            --secondary-color: #2D5016;
            --accent-orange: #FF6B35;
            --accent-green: #2D5016;
            --accent-beige: #F5E6D3;
            --text-dark: #3E2723;
            --text-medium: #5D4037;
            --text-light: #8D6E63;
            --bg-light: #FDF8F3;
            --bg-white: #FFFFFF;
            --bg-cream: #FFF8F0;
            --border-color: #E8D5C4;
            --success-color: #2D5016;
            --error-color: #C62828;
            --warning-color: #FF6B35;
            --gradient-primary: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            --gradient-secondary: linear-gradient(135deg, #2D5016 0%, #1B5E20 100%);
            --gradient-accent: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%);
            --shadow-sm: 0 2px 8px rgba(139, 69, 19, 0.1);
            --shadow-md: 0 4px 16px rgba(139, 69, 19, 0.15);
            --shadow-lg: 0 8px 32px rgba(139, 69, 19, 0.2);
            --shadow-xl: 0 12px 48px rgba(139, 69, 19, 0.25);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-light);
            overflow-x: hidden;
        }

        /* Serif font for logo */
        .logo {
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Modern animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(139, 69, 19, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(160, 82, 45, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(245, 230, 211, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
        }

        /* Header & Navigation - Transparent Overlay Design */
        header {
            background: transparent;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            padding: 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 3rem;
            position: relative;
            max-width: 1600px;
            margin: 0 auto;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border: 2px solid white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            position: relative;
        }

        .logo-icon::before {
            content: '🌿';
            font-size: 1.4rem;
            line-height: 1;
        }

        .logo-text {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.5px;
            font-family: 'Inter', sans-serif;
        }

        .logo:hover {
            transform: translateY(-2px);
        }

        .logo:hover .logo-icon {
            border-color: rgba(255, 255, 255, 0.8);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: center;
        }


        .nav-links li {
            margin: 0;
            position: relative;
        }

        .nav-links > li > a:not(.btn) {
            color: white;
            text-decoration: none;
            font-weight: 400;
            font-size: 0.95rem;
            position: relative;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
            display: block;
            letter-spacing: 0.2px;
        }

        .nav-links > li > a:not(.btn):hover {
            color: rgba(255, 255, 255, 0.8);
        }

        .nav-links .btn {
            margin-left: 2rem;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: auto;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: var(--accent-green);
            color: white;
            box-shadow: var(--shadow-md);
            font-weight: 600;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: #1B5E20;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: var(--accent-orange);
            color: white;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: #FF8C42;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-beige {
            background: var(--accent-beige);
            color: var(--text-dark);
            font-weight: 500;
            border: 1px solid var(--border-color);
            text-align: left;
        }

        .btn-beige:hover {
            background: #E8D5C4;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-login {
            background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%);
            color: white;
            font-weight: 600;
            padding: 0.85rem 2.2rem;
            border-radius: 50px;
            border: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(45, 80, 22, 0.4), 0 2px 5px rgba(45, 80, 22, 0.2);
            text-decoration: none;
            display: inline-block;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1e3a0f 0%, #2D5016 100%);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(45, 80, 22, 0.5), 0 4px 10px rgba(45, 80, 22, 0.3);
        }

        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-login:active {
            transform: translateY(-1px) scale(1);
        }

        .btn-signup {
            background: rgba(255, 255, 255, 0.95);
            color: #1a1a1a;
            font-weight: 600;
            padding: 0.85rem 2.2rem;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15), 0 2px 5px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            display: inline-block;
            overflow: hidden;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .btn-signup::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn-signup:hover {
            background: white;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2), 0 4px 10px rgba(0, 0, 0, 0.15);
            border-color: white;
        }

        .btn-signup:hover::before {
            left: 100%;
        }

        .btn-signup:active {
            transform: translateY(-1px) scale(1);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            box-shadow: none;
            font-weight: 600;
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 200px);
            padding: 0;
            position: relative;
            z-index: 1;
        }

        main > .container {
            padding: 0;
            max-width: 100%;
        }

        /* Hero Section Animation */
        .hero-section {
            animation: fadeInUp 0.8s ease-out;
            background: var(--bg-light);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #111827 0%, #1F2937 100%);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: 5rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--accent-beige);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-section a:hover {
            color: var(--accent-beige);
            transform: translateX(5px);
        }

        .footer-section p {
            line-height: 1.8;
        }

        /* Cards */
        .card {
            background: var(--bg-white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.05), transparent);
            transition: left 0.5s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .card:hover::before {
            left: 100%;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
            font-weight: 700;
            transition: transform 0.3s ease;
        }

        .card:hover .card-title {
            transform: translateX(5px);
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
            background: var(--bg-white);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:hover,
        .form-group textarea:hover,
        .form-group select:hover {
            border-color: var(--secondary-color);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: normal;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        /* Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .grid > * {
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .grid > *:nth-child(1) { animation-delay: 0.1s; }
        .grid > *:nth-child(2) { animation-delay: 0.2s; }
        .grid > *:nth-child(3) { animation-delay: 0.3s; }
        .grid > *:nth-child(4) { animation-delay: 0.4s; }
        .grid > *:nth-child(5) { animation-delay: 0.5s; }
        .grid > *:nth-child(6) { animation-delay: 0.6s; }

        /* Hour Badge - Highlight the unique selling point */
        .hour-badge {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--accent-orange);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: var(--shadow-md);
            animation: float 3s ease-in-out infinite;
            position: relative;
            letter-spacing: 0.3px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hour-badge::before {
            content: '⚡';
            margin-right: 0.5rem;
            animation: pulse 2s ease-in-out infinite;
        }

        /* Feature Highlight */
        .feature-highlight {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.08) 0%, rgba(160, 82, 45, 0.08) 100%);
            border-left: 4px solid var(--primary-color);
            padding: 2rem;
            border-radius: 16px;
            margin: 2rem 0;
            animation: slideInLeft 0.6s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Utilities */
        .text-center {
            text-align: center;
        }

        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }

        /* Loading Animation */
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }

        /* Responsive */
        @media (max-width: 968px) {
            nav {
                padding: 1rem 2rem;
            }

            .nav-links {
                gap: 2rem;
            }

            .nav-links > li > a:not(.btn) {
                font-size: 0.9rem;
            }

            .btn-login, .btn-signup {
                padding: 0.6rem 1.4rem;
                font-size: 0.85rem;
            }

            .logo-text {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 1.2rem;
                padding: 1rem 1.5rem;
            }

            .nav-links {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                width: 100%;
                gap: 1.5rem;
            }

            .nav-links > li > a:not(.btn) {
                font-size: 0.85rem;
            }

            .logo-icon {
                width: 36px;
                height: 36px;
            }

            .logo-text {
                font-size: 1.2rem;
            }

            .btn-signup {
                padding: 0.6rem 1.4rem;
                font-size: 0.85rem;
            }

            .nav-buttons {
                margin-left: 0;
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }

            .nav-buttons a:not(.btn) {
                display: none;
            }

            .grid {
                grid-template-columns: 1fr;
            }

        /* Service Cards Enhanced Styling */
        .service-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 16px 64px rgba(0,0,0,0.06) !important;
        }

        .service-card img {
            transition: transform 0.5s ease;
        }

        .service-card:hover img {
            transform: scale(1.05);
        }

        .service-card .btn-beige,
        .service-card .btn-secondary {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card .btn-beige:hover,
        .service-card .btn-secondary:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 968px) {
            .service-card {
                padding: 2rem !important;
            }
        }

        @media (max-width: 768px) {
            .service-card {
                padding: 2rem !important;
            }
        }

            .card {
                padding: 1.5rem;
            }

            .btn {
                padding: 0.65rem 1.5rem;
                font-size: 0.9rem;
            }

            .hero-section {
                min-height: 70vh !important;
                padding: 3rem 20px !important;
            }

            .hero-section h1 {
                font-size: 2.5rem !important;
            }
        }

        /* Smooth page transitions */
        main > * {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Image Gallery Styles */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            aspect-ratio: 4/3;
            background: var(--bg-white);
        }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover::after {
            opacity: 1;
        }

        /* Partners Carousel */
        .partners-section {
            margin: 4rem 0;
            padding: 3rem 0;
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(160, 82, 45, 0.05) 100%);
            border-radius: 30px;
            position: relative;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }
        
        .partners-section .btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
        }

        .partners-carousel {
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
            width: 100%;
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }

        .partners-track {
            display: flex;
            gap: 2rem;
            animation: scroll 40s linear infinite;
            will-change: transform;
            width: max-content;
        }

        .partners-track:hover {
            animation-play-state: paused;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .partner-logo {
            flex: 0 0 auto;
            width: 200px;
            height: 120px;
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid var(--border-color);
        }

        .partner-logo:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(160, 82, 45, 0.05) 100%);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .partner-logo .partner-name {
            font-weight: 600;
            color: var(--primary-color);
            text-align: center;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .partner-logo:hover .partner-name {
            color: var(--primary-dark);
        }

        /* Duplicate for seamless loop */
        .partners-track-duplicate {
            display: flex;
            gap: 2rem;
        }

        /* Hero Image Section */
        .hero-images {
            margin: 3rem 0;
        }

        .hero-images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .hero-image-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            aspect-ratio: 16/10;
            background: var(--bg-white);
            transition: all 0.4s ease;
        }

        .hero-image-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .hero-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin: 4rem 0 2rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-family: 'Georgia', serif;
        }

        .section-header p {
            font-size: 1.2rem;
            color: var(--text-light);
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    
    <main>
        <?php include __DIR__ . '/../partials/flash.php'; ?>
        <?= $content ?>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>

