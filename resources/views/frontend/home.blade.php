@extends('frontend.layout')

@section('content')

<style>
    html, body {
        background: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        height: 100%;
        overflow-x: hidden;
    }

    /* Override any parent layout margins/padding */
    .wrapper, .content-wrapper, .main-content, .page-content,
    .container-fluid, .row, .col, [class*="col-"] {
        background: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .container {
        background: transparent !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: 100% !important;
    }

    /* Hero Section Styles */
    .hero-section {
        position: relative;
        min-height: 100vh;
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        z-index: 1;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-background.active {
        opacity: 1;
    }

    .hero-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 50, 0, 0.5);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
        width: 90%;
        text-align: left;
        padding: 2rem;
        margin: 0 auto !important;
        transform: translateY(-30px);
        opacity: 0;
        animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    .hero-subtitle {
        color: #FFFFFF;
        font-size: 1.6em;
        font-weight: 600;
        margin-bottom: -20px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hero-main-title {
        color: #FFFFFF;
        text-shadow: 2px 2px 4px rgba(144, 238, 144, 0.5), 0 0 15px rgba(0, 100, 0, 0.3);
        font-size: 3.5em;
        font-weight: 900;
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.3;
        white-space: normal;
    }

    .hero-description {
        color: #e0e0e0;
        font-size: 1.1em;
        margin: 15px 0;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(-10px);
        }
    }

    #rotating-text {
        overflow: hidden;
        position: relative;
        min-height: 180px !important;
        margin-bottom: 1.5rem;
    }

    .wave-container {
        display: flex;
        flex-wrap: wrap;
        gap: 12px !important;
        opacity: 0;
        transform: translateY(40px);
        animation: slideInLeft 0.8s ease-out forwards;
        margin-bottom: 15px !important;
    }

    .flavor-description {
        color: #FFFFFF;
        font-size: 1.6rem;
        font-weight: bold;
        font-family: 'Plus Jakarta Sans', sans-serif;
        opacity: 0;
        transform: translateX(-20px);
        animation: slideInLeft 0.8s ease-out 0.8s forwards;
        text-shadow: 2px 2px 4px rgba(144, 238, 144, 0.5), 0 0 15px rgba(0, 100, 0, 0.3);
    }

    .wave-word {
        display: inline-block;
        opacity: 0;
        transform: scale(0.9);
        animation: popIn 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        color: #FFFFFF;
        transition: transform 0.2s ease;
        white-space: nowrap;
    }

    .wave-word:hover {
        transform: scale(1.2);
    }

    /* Button styles */
    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }

    .hero-btn {
        padding: 15px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1.2em;
        font-weight: bold;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-align: center;
    }

    .hero-btn-primary {
        background: linear-gradient(45deg, #006400, #00C851);
        color: #FFFFFF;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4);
        animation: pulse 2s infinite;
    }

    .hero-btn-secondary {
        background: transparent;
        color: #FFFFFF;
        border: 2px solid #00C851;
        margin-top: 30px;
        padding: 18px 40px;
        font-size: 1.3em;
    }

    /* CTA Button Style */
    .hero-btn-cta {
        position: absolute;
        bottom: 90px;
        right: 50px;
        background: #FFFFFF;
        color: #006400;
        border: none;
        padding: 22px 60px 22px 50px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1.7em;
        font-weight: bold;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        z-index: 2;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 200px;
    }

    .hero-btn-cta::after {
        content: '→';
        font-size: 0.9em;
        margin-left: 10px;
        color: #006400;
        transition: transform 0.3s ease;
    }

    .hero-btn-cta:hover {
        background: #F0F0F0;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 102, 0, 0.4);
    }

    .hero-btn-cta:hover::after {
        transform: translateX(5px);
    }

    @keyframes popIn {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }
        50% {
            opacity: 0.7;
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes popOut {
        0% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.5;
            transform: scale(0.95);
        }
        100% {
            opacity: 0;
            transform: scale(0.9);
        }
    }

    @keyframes containerFade {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideOutRight {
        0% {
            opacity: 1;
            transform: translateX(0);
        }
        100% {
            opacity: 0;
            transform: translateX(20px);
        }
    }

    .wave-particle {
        position: absolute;
        width: 8px;
        height: 8px;
        background: radial-gradient(circle, #90EE90, rgba(144, 238, 144, 0.3));
        border-radius: 50%;
        pointer-events: none;
        animation: particleWave 2s ease-out forwards;
    }

    @keyframes particleWave {
        0% {
            opacity: 0;
            transform: translateY(0) translateX(0) scale(0.5);
        }
        20% {
            opacity: 1;
            transform: translateY(-25px) translateX(-10px) scale(1);
        }
        40% {
            opacity: 0.8;
            transform: translateY(-50px) translateX(10px) scale(0.8);
        }
        60% {
            opacity: 0.6;
            transform: translateY(-75px) translateX(-5px) scale(0.6);
        }
        80% {
            opacity: 0.3;
            transform: translateY(-100px) translateX(15px) scale(0.4);
        }
        100% {
            opacity: 0;
            transform: translateY(-125px) translateX(0) scale(0.2);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 102, 0, 0.5);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .hero-main-title {
            font-size: 3.2em;
        }
        .hero-subtitle {
            font-size: 1.4em;
        }
        .flavor-description {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 992px) {
        .hero-main-title {
            font-size: 2.8em;
        }
        #rotating-text {
            min-height: 160px !important;
        }
        .hero-btn-cta {
            padding: 18px 50px 18px 40px;
            font-size: 1.4em;
            min-width: 180px;
        }
        .hero-btn-secondary {
            margin-top: 25px;
            padding: 16px 35px;
            font-size: 1.2em;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 100vh;
        }
        .hero-content {
            transform: translateY(-20px);
            padding: 1.5rem;
        }
        .hero-main-title {
            font-size: 2.4em;
        }
        .hero-subtitle {
            font-size: 1.2em;
            margin-bottom: -15px;
        }
        .flavor-description {
            font-size: 1.2rem;
        }
        .hero-description {
            font-size: 1em;
        }
        #rotating-text {
            min-height: 140px !important;
        }
        .wave-container {
            gap: 10px !important;
        }
        .hero-btn {
            padding: 12px 25px;
            font-size: 1.1em;
        }
        .hero-btn-secondary {
            margin-top: 20px;
            padding: 14px 30px;
            font-size: 1.1em;
        }
        .hero-btn-cta {
            padding: 16px 45px 16px 35px;
            font-size: 1.3em;
            bottom: 15px;
            right: 15px;
            min-width: 160px;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            min-height: 100vh;
        }
        .hero-content {
            padding: 1.5rem;
            transform: translateY(-15px);
        }
        .hero-main-title {
            font-size: 2em;
        }
        .hero-subtitle {
            font-size: 1em;
            margin-bottom: -10px;
        }
        .flavor-description {
            font-size: 1rem;
        }
        .hero-description {
            font-size: 0.9em;
            margin: 12px 0;
        }
        #rotating-text {
            min-height: 120px !important;
        }
        .wave-container {
            gap: 8px !important;
            flex-direction: column;
            align-items: flex-start;
        }
        .hero-buttons {
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }
        .hero-btn {
            width: 100%;
            max-width: 280px;
            padding: 10px 18px;
            font-size: 0.9em;
        }
        .hero-btn-secondary {
            margin-top: 15px;
            padding: 12px 25px;
            font-size: 1em;
            max-width: 300px;
        }
        .hero-btn-cta {
            position: static;
            width: 100%;
            max-width: 300px;
            padding: 14px 40px 14px 30px;
            font-size: 1.2em;
            margin-top: 12px;
            min-width: 140px;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            min-height: 100vh;
            padding: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-content {
            padding: 2rem 1rem; /* Reduced side padding to prevent overflow */
            width: 100%;
            max-width: 440px;
            transform: translateY(0);
            text-align: center;
            margin: 0 auto;
            overflow-wrap: break-word; /* Prevent text cutoff */
        }
        .hero-subtitle {
            font-size: 1.2em;
            margin-bottom: 15px;
            padding-bottom: 0;
            text-align: center;
            font-weight: 600;
        }
        .hero-main-title {
            font-size: 2.2em;
            line-height: 1.1;
            text-align: center;
            margin-bottom: 20px;
        }
        #rotating-text {
            min-height: 180px !important;
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .wave-container {
            gap: 8px !important;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px !important;
            padding: 0 15px; /* Added padding to prevent cutoff */
            min-height: 80px;
            display: flex;
        }
        .wave-word {
            white-space: nowrap;
            display: inline-block;
            text-align: center;
            margin: 3px 5px;
            font-size: 1.5em;
            line-height: 1;
            max-width: 100%;
            overflow: visible;
        }
        .flavor-description {
            font-size: 1rem;
            line-height: 1.4;
            margin-top: 15px;
            text-align: center;
            padding: 0 20px; /* Increased padding to prevent cutoff */
            max-width: 100%;
            word-wrap: break-word;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-description {
            font-size: 0.95em;
            margin: 25px 0;
            line-height: 1.5;
            padding: 0 20px; /* Adjusted padding */
            max-width: 100%;
            text-align: center;
        }
        .hero-buttons {
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
            width: 100%;
        }
        .hero-btn {
            width: 100%;
            max-width: 320px;
            padding: 16px 24px;
            font-size: 1.1em;
            border-radius: 30px;
            margin: 0;
            min-height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-btn-secondary {
            margin-top: 15px;
            padding: 14px 30px;
            font-size: 1.1em;
            max-width: 320px;
        }
        .hero-btn-cta {
            position: static;
            width: 100%;
            max-width: 320px;
            padding: 16px 45px 16px 35px;
            font-size: 1.2em;
            margin-top: 10px;
            border-radius: 30px;
            min-height: 58px;
            min-width: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Ensure proper text rendering */
        .wave-word,
        .flavor-description,
        .hero-description {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* Better animations for mobile */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Optimize particle effects */
        .wave-particle {
            width: 5px;
            height: 5px;
        }
        /* Touch-friendly interactions */
        .wave-word:hover {
            transform: scale(1.05);
        }
        .hero-btn:active {
            transform: scale(0.96);
        }
        .hero-btn-cta:active {
            transform: scale(0.96);
        }
        /* Prevent text overflow */
        * {
            box-sizing: border-box;
        }
        .hero-content * {
            max-width: 100%;
            overflow-wrap: break-word;
        }
    }

    @media (max-width: 320px) {
        .hero-section {
            min-height: 100vh;
        }
        .hero-content {
            padding: 0.8rem;
            width: 95%;
            transform: translateY(-5px);
        }
        .hero-main-title {
            font-size: 1.5em;
        }
        .hero-subtitle {
            font-size: 0.8em;
            padding-bottom: 5px;
        }
        .flavor-description {
            font-size: 0.8rem;
            padding: 0 15px;
        }
        #rotating-text {
            min-height: 80px !important;
        }
        .wave-container {
            gap: 4px !important;
            padding: 0 10px;
        }
        .wave-word {
            font-size: 1.4em;
            margin-bottom: 4px;
        }
        .hero-description {
            font-size: 0.8em;
            padding: 0 15px;
        }
        .hero-btn {
            max-width: 220px;
            padding: 8px 12px;
            font-size: 0.8em;
        }
        .hero-btn-secondary {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 0.9em;
            max-width: 220px;
        }
        .hero-btn-cta {
            max-width: 220px;
            padding: 12px 30px 12px 20px;
            font-size: 1em;
            min-width: 120px;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    }
</style>

<!-- Preload images for performance -->
<link rel="preload" href="{{ asset('images/heronew.png') }}" as="image">
<link rel="preload" href="{{ asset('images/ginger_lemon.jpg') }}" as="image">
<link rel="preload" href="{{ asset('images/ginger_tangerine1.jpg') }}" as="image">

<div class="hero-section">
    <div class="hero-background" id="bg-0" style="background-image: url('{{ asset('images/hero2.jpg') }}');"></div>
    <div class="hero-background" id="bg-1" style="background-image: url('{{ asset('images/ginger_lemon.jpg') }}');"></div>
    <div class="hero-background" id="bg-2" style="background-image: url('{{ asset('images/ginger_tangerine1.jpg') }}');"></div>
    <div class="hero-content">
        <h2 class="hero-subtitle">Explore Our Fresh Juices</h2>
        <h1 id="rotating-text" class="hero-main-title">
            <div class="wave-container" id="wave-container">
                <!-- Words will be dynamically inserted here -->
            </div>
            <div class="flavor-description" id="flavor-description">
                <!-- Flavor description will be dynamically inserted here -->
            </div>
        </h1>
        <p class="hero-description">
            "Available in 420ml bottles – perfect for retail sales! We also take custom orders for events and parties."
        </p>
        <div class="hero-buttons">
            <a href="{{ url('/juices') }}" class="hero-btn hero-btn-secondary"
               onmouseover="this.style.background='#00C851'; this.style.color='#FFFFFF';"
               onmouseout="this.style.background='transparent'; this.style.color='#FFFFFF';">
                Our Juices
            </a>
        </div>
    </div>
    <a href="{{ url('/order') }}" class="hero-btn-cta">
        Order
    </a>
</div>

<script>
    const phrases = [
        { text: "Pure Sugarcane", flavor: "Nothing But Fresh-Pressed Cane Juice" },
        { text: "Lemon Ginger Cane", flavor: "Sugarcane Juice Infused with Lemon & Ginger" },
        { text: "Tangerine Ginger Cane", flavor: "Sugarcane Juice Infused with Tangerine & Ginger" }
    ];

    const backgrounds = [
        document.getElementById('bg-0'),
        document.getElementById('bg-1'),
        document.getElementById('bg-2')
    ];

    let index = 0;
    const container = document.getElementById('wave-container');
    const flavorContainer = document.getElementById('flavor-description');

    function createWaveParticles() {
        const rect = container.getBoundingClientRect();
        for (let i = 0; i < 12; i++) {
            const particle = document.createElement('div');
            particle.className = 'wave-particle';
            particle.style.left = Math.random() * rect.width + 'px';
            particle.style.top = Math.random() * rect.height + 'px';
            container.appendChild(particle);

            setTimeout(() => {
                if (particle.parentNode) {
                    particle.remove();
                }
            }, 2000);
        }
    }

    function animateWordsOut() {
        const words = container.querySelectorAll('.wave-word');
        words.forEach((word, i) => {
            setTimeout(() => {
                word.style.animation = `popOut 0.5s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards`;
            }, i * 50);
        });

        // Animate flavor description out
        flavorContainer.style.animation = 'slideOutRight 0.5s ease-out forwards';
    }

    function createWaveText(text) {
        container.innerHTML = '';
        const words = text.split(' ');

        words.forEach((word, i) => {
            const wordElement = document.createElement('div');
            wordElement.className = 'wave-word';
            wordElement.textContent = word + (i < words.length - 1 ? ' ' : '');
            wordElement.style.setProperty('--delay', `${i * 0.1}s`);
            wordElement.style.animationDelay = `${i * 0.15}s`;
            container.appendChild(wordElement);
        });

        setTimeout(() => {
            createWaveParticles();
        }, 500);
    }

    function updateFlavorDescription(flavor) {
        flavorContainer.textContent = flavor;
        flavorContainer.style.animation = 'slideInLeft 0.8s ease-out 0.8s forwards';
    }

    function updateBackground() {
        backgrounds.forEach(bg => bg.classList.remove('active'));
        backgrounds[index].classList.add('active');
    }

    function changeContent() {
        animateWordsOut();
        setTimeout(() => {
            index = (index + 1) % phrases.length;
            createWaveText(phrases[index].text);
            updateFlavorDescription(phrases[index].flavor);
            updateBackground();
        }, 600);
    }

    // Initialize
    createWaveText(phrases[index].text);
    updateFlavorDescription(phrases[index].flavor);
    backgrounds[index].classList.add('active');
    setInterval(changeContent, 8000);
    setInterval(() => {
        if (Math.random() < 0.5) {
            createWaveParticles();
        }
    }, 2500);
</script>

@endsection