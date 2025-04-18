@extends('layouts.public')

@section('content')

    <style>
        /* Section Styling */
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .section-title h2 {
            font-weight: 700;
            font-size: 2.2rem;
            display: inline-block;
            padding-bottom: 15px;
            color: #ffffff;
            position: relative;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 3px;
            background: #ff3a3a;
            border-radius: 3px;
        }
        
        /* Section Icon Styling */
        .section-icon {
            display: block;
            margin: 0 auto 15px;
            width: 80px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            border: 2px solid rgba(255, 0, 0, 0.3);
            color: #ff3a3a;
            font-size: 36px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .section-icon i {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .content-section {
            padding: 60px 0;
            position: relative;
        }
        
        /* Service Cards */
        .service-card {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .service-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .service-card:hover .service-image img {
            transform: scale(1.1);
        }
        
        .service-icon {
            position: absolute;
            bottom: -25px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #ff3a3a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            transform: rotate(360deg);
        }
        
        .service-content {
            padding: 30px 25px;
        }
        
        .service-title {
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-title {
            color: #ff3a3a;
        }
        
        .service-description {
            color: #cccccc;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }
        
        .service-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
        }
        
        .service-price {
            font-weight: 600;
            color: #ff3a3a;
            font-size: 1.1rem;
        }
        
        .btn-service {
            background-color: #ff3a3a;
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
            text-decoration: none;
        }
        
        .btn-service:hover {
            background-color: #cc0000;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
            color: white;
            text-decoration: none;
        }
        
        /* Process Section */
        .process-section {
            padding: 60px 0; 
            margin: 40px 0;
            position: relative;
        }
        
        .process-step {
            text-align: center;
            padding: 60px;
            position: relative;
            z-index: 1;
            margin-bottom: 20px;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: #ff3a3a;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
        }
        
        .step-content {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            height: 100%;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }
        
        .step-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #ffffff;
        }
        
        .step-description {
            color: #cccccc;
            font-size: 0.95rem;
        }
        
        .process-connector {
            position: absolute;
            top: 85px;
            width: 100%;
            height: 3px;
            background-color: #ff3a3a;
            z-index: 0;
            opacity: 0.5;
        }
        
        /* FAQ Section */
        .faq-section {
            padding: 60px 0;
        }
        
        .accordion-item {
            margin: 0 auto 15px auto; /* top 0, bottom 15px, left & right auto */
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: transparent;
            width: 75%;
            position: relative; /* position can stay relative unless needed otherwise */
        }
        
        .accordion-button {
            background-color: rgba(0, 0, 0, 0.6);
            font-weight: 600;
            color: #ffffff;
            box-shadow: none;
            padding: 20px;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }
        
        .accordion-button:not(.collapsed) {
            background-color: rgba(255, 0, 0, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(255, 0, 0, 0.5);
        }
        
        .accordion-button::after {
            background-size: 16px;
            width: 16px;
            height: 16px;
            filter: invert(1);
        }
        
        .accordion-body {
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            color: #cccccc;
            border: 1px solid rgba(255, 0, 0, 0.2);
            border-top: none;
        }
        
        .intro-text {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 50px;
            line-height: 1.8;
            font-size: 1.05rem;
            color: #cccccc;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .process-connector {
                display: none !important;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .process-section, .content-section, .faq-section {
                padding: 40px 0;
            }
            
            .step-content {
                height: auto;
                margin-bottom: 20px;
            }
            
            .service-card {
                max-width: 320px;
                margin: 0 auto 30px;
            }
        }
        
    </style>

    <!-- Services Section -->
<section class="content-section">
    <div class="section-icon">
        <i class="fas fa-wrench"></i>
    </div>
    <div class="section-title">
        <h2>Our Services</h2>
    </div>
    <div class="intro-text">
        <p>Mobile Tronics Solutions was established with a simple goal: to provide fast, reliable, and affordable repair services for all electronic devices. Since our founding, we've grown to become one of the most trusted repair centers in the region.</p>
    </div>
    
    <div class="row">
        @foreach($services as $service)
        <div class="col-lg-3 col-md-6 mx-auto">
            <div class="service-card">
                <div class="service-image">
                    @if($service->serviceImage)
                        <img src="{{ asset('service_images/' . $service->serviceImage) }}" alt="{{ $service->serviceName }}">
                    @else
                        <img src="https://via.placeholder.com/600x400/1a1a1a/ff3a3a?text=Service" alt="Service Image">
                    @endif
                    <div class="service-icon">
                        <i class="fas {{ $service->icon ?? 'fa-cogs' }}"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">{{ $service->serviceName }}</h3>
                    <p class="service-description">{{ $service->description }}</p>
                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
    <!-- Our Process Section -->
    <section class="process-section">
        <div class="section-icon">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="section-title">
            <h2>Our Repair Process</h2>
        </div>

        <div class="row position-relative">
            <div class="process-connector d-none d-lg-block"></div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="step-content">
                        <h4 class="step-title">Diagnosis</h4>
                        <p class="step-description">We thoroughly examine your device to identify all issues and provide an accurate quote.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="step-content">
                        <h4 class="step-title">Repair</h4>
                        <p class="step-description">Our certified technicians perform the repair using high-quality replacement parts.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="step-content">
                        <h4 class="step-title">Testing</h4>
                        <p class="step-description">We thoroughly test your device to ensure everything is working perfectly before return.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="step-content">
                        <h4 class="step-title">Warranty</h4>
                        <p class="step-description">All our repairs come with a 90-day warranty for your peace of mind.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="section-icon">
            <i class="fas fa-question-circle"></i>
        </div>
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
        </div>

        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-clock me-2"></i> How long does a typical repair take?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Most of our repairs are completed within 1–2 hours...
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-shield-alt me-2"></i> Do you offer a warranty on repairs?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, all our repairs come with a 90-day warranty...
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-microchip me-2"></i> What quality of parts do you use?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We use only high-quality replacement parts...
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="fas fa-lock me-2"></i> Will my data be safe during the repair?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We take data security very seriously...
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <i class="fas fa-calendar-check me-2"></i> Do I need an appointment for repair services?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        While we accept walk-ins, we recommend booking an appointment...
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for section icons
            const animateIcons = document.querySelectorAll('.section-icon');
            
            animateIcons.forEach(icon => {
                icon.style.opacity = 0;
                icon.style.transform = 'scale(0.5)';
                icon.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                
                const iconObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'scale(1)';
                        }
                    });
                }, {
                    threshold: 0.1
                });
                
                iconObserver.observe(icon);
            });
        });
    </script>
@endsection