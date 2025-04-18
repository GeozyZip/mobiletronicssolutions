@extends('layouts.public')

@section('content')

<style>

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
        
        .content-section {
            padding: 60px 0;
            position: relative;
        }
        
        .intro-text {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 50px;
            line-height: 1.8;
            font-size: 1.05rem;
            color: #cccccc;
        }
    .hero-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
    }

    .hero-section h1 {
        color: #fff;
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.1rem;
      color: #e0e0e0;
    }

    .btn-book {
      background-color: #14A0EB;
      color: white;
      border: none;
      transition: 0.3s;
      text-align: center;
    }

    .btn-book:hover {
      background-color: #0e74af;
    }

    .modal-content {
      background-color: #fff;
      color: #333;
    }

    @media (max-width: 768px) {
      .hero-section h1 {
        font-size: 2.2rem;
      }

      .hero-section p {
        font-size: 1rem;
      }
    }
/* Base styles */
.section-partners {
    position: relative;
    width: 100%;
    min-height: 600px;
    overflow: hidden;
    padding: 100px 0;
}

/* Partners Heading */
.partners-heading {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 42px;
    line-height: 1.2;
    color: #fff;
    text-shadow: 0px 4px 8px rgba(255, 0, 0, 0.8);
    text-align: center;
    margin-bottom: 20px;
    letter-spacing: 1px;
}

/* Divider Line with animation */
.partner-divider {
    position: relative;
    width: 80%;
    max-width: 1200px;
    height: 3px;
    margin: 0 auto 60px;
    background: linear-gradient(90deg, transparent, rgba(243, 191, 192, 0.8), transparent);
    box-shadow: 0px 0px 10px rgba(255, 72, 75, 0.6);
    position: relative;
    overflow: hidden;
}

.partner-divider::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 50%;
    height: 100%;
    background: rgba(255, 255, 255, 0.3);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 200%; }
}

/* Enhanced Carousel Styling */
.carousel-container {
    position: relative;
    width: 100%;
    padding: 40px 0;
    overflow: hidden;
}

.slider-row {
    margin-bottom: 40px;
    position: relative;
}

.slider-row:last-child {
    margin-bottom: 0;
}

.slider-title {
    color: white;
    font-family: 'Outfit', sans-serif;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
    text-shadow: 0 2px 4px rgba(255, 0, 0, 0.5);
}

.brands-slider {
    position: relative;
    width: 100%;
    padding: 20px 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    mask-image: linear-gradient(to right, transparent, #000 10%, #000 90%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, #000 10%, #000 90%, transparent);
}

.slider-track {
    display: flex;
    gap: 40px;
    animation-duration: 30s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    width: fit-content;
}

.forward {
    animation-name: scrollForward;
}

.backward {
    animation-name: scrollBackward;
}

.brand-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #440202;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 72, 75, 0.3);
    flex-shrink: 0;
}

/* Different styling for phones vs laptops */
.phone-brand {
    width: 180px;
    height: 120px;
}

.laptop-brand {
    width: 220px;
    height: 140px;
}

.brand-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(255, 0, 0, 0.4);
    background: rgba(255, 72, 75, 0.2);
    border-color: rgba(255, 72, 75, 0.8);
}

.brand-logo-container {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 12px;
}

.brand-logo {
    max-width: 100%;
    max-height: 100%;
    filter: brightness(0.95) contrast(1.05);
    transition: all 0.3s ease;
}

.brand-item:hover .brand-logo {
    filter: brightness(1.1) contrast(1.1);
}

.brand-name {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 20px;
    color: #fff;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    letter-spacing: 1px;
    margin: 0;
    text-transform: uppercase;
}

/* Pause animation on hover */
.brands-slider:hover .slider-track {
    animation-play-state: paused;
}

/* Animation Keyframes */
@keyframes scrollForward {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-50% - 20px)); }
}

@keyframes scrollBackward {
    0% { transform: translateX(calc(-50% - 20px)); }
    100% { transform: translateX(0); }
}

/* Red glow effect underneath sliders */
.glow-effect {
    position: absolute;
    width: 70%;
    height: 20px;
    left: 15%;
    bottom: 0;
    background: radial-gradient(circle, rgba(255, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 70%);
    filter: blur(15px);
    pointer-events: none;
}

.btn-outline {
            border: 2px solid #fff;
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

/* Responsive adjustments */
@media (max-width: 992px) {
    .partners-heading {
        font-size: 36px;
        padding: 0 20px;
    }
    
    .brand-item {
        padding: 15px;
    }
    
    .phone-brand {
        width: 150px;
        height: 110px;
    }
    
    .laptop-brand {
        width: 180px;
        height: 130px;
    }
    
    .brand-name {
        font-size: 18px;
    }
    
    .brand-logo-container {
        width: 50px;
        height: 50px;
        margin-top: 10px;
    }
}

@media (max-width: 768px) {
    .section-partners {
        padding: 60px 0;
        min-height: 500px;
    }
    
    .partners-heading {
        font-size: 32px;
    }
    
    .partner-divider {
        width: 90%;
        margin-bottom: 40px;
    }
    
    .slider-title {
        font-size: 20px;
    }
    
    .phone-brand {
        width: 130px;
        height: 100px;
    }
    
    .laptop-brand {
        width: 150px;
        height: 120px;
    }
    
    .brand-name {
        font-size: 16px;
    }
    
    .brands-slider {
        gap: 20px;
    }
    
    .brand-logo-container {
        width: 45px;
        height: 45px;
        margin-top: 8px;
    }
}

@media (max-width: 480px) {
    .partners-heading {
        font-size: 28px;
    }
    
    .phone-brand {
        width: 110px;
        height: 90px;
    }
    
    .laptop-brand {
        width: 130px;
        height: 110px;
    }
    
    .brand-name {
        font-size: 14px;
    }
    
    .slider-track {
        gap: 20px;
    }
    
    .brand-logo-container {
        width: 40px;
        height: 40px;
        margin-top: 6px;
    }
}
</style>
{{-- <div class="container hero-section"> --}}
    {{-- <div class="row align-items-center">
      <div class="col-12 col-md-6 col-xl-7 mb-lg-0 py-5">
        <div class="mb-3 mb-md-5 lh-1">
          <h1>Fix your own with US</h1>
        </div>
        <div>
          <button class="btn btn-book btn-lg me-2" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
        </div>
      </div>
    </div> --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <section class="content-section">
        
            <div class="section-icon">
                <i class="bi bi-clipboard"></i>

                </div>
    <div class="section-title">
        
        


        <h2>Repair Now!</h2>
    </div>
            <div class="intro-text">
                <p>Mobile Tronics Solutions was established with a simple goal: to provide fast, reliable, and affordable repair services for all electronic devices. Since our founding, we've grown to become one of the most trusted repair centers in the region.</p>
            </div>
            
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                @auth
                    <!-- If user is logged in -->
                    <button class="btn btn-book btn-lg" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
                    <a href="{{ route('history') }}" class="btn btn-outline btn-lg">View Booking History</a>
                @else
                    <!-- If user is NOT logged in -->
                    <a href="{{ route('login') }}" class="btn btn-book btn-lg">Book Now</a>
                @endauth
            </div>
            
            
            
            
            
</section>

  
  
 <!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm" action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="service" class="form-label">Service Type</label>
                            <select id="service" name="bookingName" class="form-select" required>
                                <option selected disabled>Choose...</option>
                                <option value="Repair">Repair</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Consultation">Consultation</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Preferred Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="time" class="form-label">Preferred Hour</label>
                            <select class="form-select" id="time" name="time" required>
                                <option selected disabled>Choose hour...</option>
                                @for ($i = 0; $i < 24; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        {{-- <div class="col-12">
                            <label for="message" class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any extra details..."></textarea>
                        </div> --}}
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-book">Submit Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<section class="section-partners">
    <h1 class="partners-heading">SUPPORTED DEVICES</h1>
    <div class="partner-divider"></div>
    
    <div class="carousel-container">
        <!-- Phone Brands Row -->
        <div class="slider-row">
            <h3 class="slider-title">Smartphones</h3>
            <div class="brands-slider">
                <div class="slider-track forward">
                    <!-- Original items -->
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">iPhone</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/iphone.png') }}" alt="Samsung Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Samsung</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/samsung.png') }}" alt="Samsung Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Xiaomi</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/xiaomi.png') }}" alt="Xiaomi Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Oppo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/oppo.png') }}" alt="Oppo Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Vivo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/vivo.png') }}" alt="Vivo Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Huawei</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/huawei.png') }}" alt="Huawei Logo">
                        </div>
                    </div>
                    
                    <!-- Duplicated items for seamless loop -->
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">iPhone</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/iphone.png') }}" alt="iPhone Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Samsung</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/samsung.png') }}" alt="Samsung Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Xiaomi</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/xiaomi.png') }}" alt="Xiaomi Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Oppo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/oppo.png') }}" alt="Oppo Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Vivo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/vivo.png') }}" alt="Vivo Logo">
                        </div>
                    </div>
                    <div class="brand-item phone-brand">
                        <h3 class="brand-name">Huawei</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/huawei.png') }}" alt="Huawei Logo">
                        </div>
                    </div>
                </div>
                <div class="glow-effect"></div>
            </div>
        </div>
        
        <!-- Laptop Brands Row -->
        <div class="slider-row">
            <h3 class="slider-title">Laptops & Computers</h3>
            <div class="brands-slider">
                <div class="slider-track backward">
                    <!-- Original items -->
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Macbook</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/iphone.png') }}" alt="Apple Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">HP</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/hp.png') }}" alt="HP Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Acer</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/acer.png') }}" alt="Acer Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Asus</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/asus.png') }}" alt="Asus Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Lenovo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/lenovo.png') }}" alt="Lenovo Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">MSI</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/msi.png') }}" alt="MSI Logo">
                        </div>
                    </div>
                    
                    <!-- Duplicated items for seamless loop -->
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Macbook</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/iphone.png') }}" alt="Apple Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">HP</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/hp.png') }}" alt="HP Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Acer</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/acer.png') }}" alt="Acer Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Asus</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/asus.png') }}" alt="Asus Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">Lenovo</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/lenovo.png') }}" alt="Lenovo Logo">
                        </div>
                    </div>
                    <div class="brand-item laptop-brand">
                        <h3 class="brand-name">MSI</h3>
                        <div class="brand-logo-container">
                            <img class="brand-logo" src="{{ asset('uploads/msi.png') }}" alt="MSI Logo">
                        </div>
                    </div>
                </div>
                <div class="glow-effect"></div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript to ensure slider is properly initialized on page load -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all slider tracks
    const tracks = document.querySelectorAll('.slider-track');
    
    // Reset animation on window resize for smoother experience
    window.addEventListener('resize', function() {
        tracks.forEach(track => {
            const animation = track.style.animation;
            track.style.animation = 'none';
            setTimeout(() => {
                track.style.animation = animation;
            }, 10);
        });
    });
});
</script>



@endsection