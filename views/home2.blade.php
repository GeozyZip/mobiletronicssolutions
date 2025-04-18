@extends('layouts.app')

@section('content')


    <style>
        .hero-section {
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-shape {
            position: absolute;
            background: linear-gradient(45deg, #6c5ce7, #a363d9);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.1;
            z-index: 1;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            top: -200px;
            right: -200px;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            bottom: -150px;
            left: -150px;
            background: linear-gradient(45deg, #a363d9, #6c5ce7);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            background: linear-gradient(45deg, #2d3436 0%,rgb(225, 18, 18) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color:rgb(35, 39, 42);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons .btn {
            padding: 0.8rem 2rem;
            font-weight: 500;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg,rgb(3, 1, 20),rgb(217, 99, 99));
            border: none;
            box-shadow: 0 5px 15px rgba(108,92,231,0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108,92,231,0.3);
        }

        .btn-outline {
            border: 2px solid #2d3436;
            color: #fff;
            background: transparent;
        }

        .btn-outline:hover {
            background: linear-gradient(45deg, #2d3436,rgb(0, 0, 0));
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108,92,231,0.3);
        }

        .hero-stats {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color:rgb(35, 39, 42);
            font-weight: 500;
        }

        .hero-image {
            padding-top:3px;
            position: relative;
            z-index: 2;
        }

        .hero-image-main {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
            transition: all 0.3s ease;
        }

        .hero-image-main:hover {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg);
        }

        .floating-card {
            position: absolute;
            background: white;
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: float 3s ease-in-out infinite;
        }

        .card-1 {
            top: 10%;
            left: -10%;
            animation-delay: 0s;
        }

        .card-2 {
            bottom: 10%;
            right: -10%;
            animation-delay: 1.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-image {
                margin-top: 3rem;
            }
            
            .floating-card {
                display: none;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <!-- Background Shapes -->
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>

        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Content -->
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Tech Trouble?<br>Let's Make It Gone.</h1>
                    <p class="hero-subtitle">We fix your tech with skill — and a smile, because we believe great service means not just repairing your devices, but making your day a little better too.</p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-buttons">
                        <a href="{{ route('booking2') }}" class="btn btn-primary me-3 mb-2">Repair with Us</a>
                        <a href="https://www.facebook.com/p/Mobile-Tronics-Solutions-100068087839201/" target=_blank class="btn btn-outline mb-2">OUR FACEBOOK <i class="bi bi-facebook ms-2"></i>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="hero-stats row">
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">5K+</div>
                                <div class="stat-label">Customers</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">98%</div>
                                <div class="stat-label">Satisfaction</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <div class="stat-number">2019</div>
                                <div class="stat-label">Established</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="col-lg-6 hero-image">
                    <img src="{{ asset('uploads/front_image.png') }}" alt="Image Device" class="hero-image-main">
                    <!-- Floating Cards -->
                    <div class="floating-card card-1">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Problem solved</span>
                        </div>
                    </div>
                    
                    <div class="floating-card card-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning me-2"></i>
                            <span>5.0 Rating</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


@endsection