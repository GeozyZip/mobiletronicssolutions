@extends('layouts.public')

@section('content')

    <style>
        /* Section Styling from Service Page */
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
        
      /* About Card Styling with Service Page Design Elements */
      .about-card {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 35px 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            margin: 0 auto 30px;
            max-width: 400px;
            border: 1px solid rgba(255, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            justify-content: center;
        }
        
        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .about-card h3 {
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .about-card:hover h3 {
            color: #ff3a3a;
            transform: translateY(-5px);
        }
        
        .about-card p {
            color: #cccccc;
            font-size: 0.95rem;
            text-align: center;
        }
        
        /* Service Icons */
        .service-icon {
            width: 85px;
            height: 85px;
            background: rgba(255, 58, 58, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #ff3a3a;
            font-size: 30px;
            transition: all 0.4s ease;
            position: relative;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2);
        }
        
        .about-card:hover .service-icon {
            background: #ff3a3a;
            color: white;
            transform: scale(1.1) rotate(360deg);
        }
        
        /* About Card Styling with Service Page Design Elements */
      .about-cards {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 35px 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            
            margin: 0 auto 30px;
            max-width: 400px;
            border: 1px solid rgba(255, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            justify-content: center;
        }
        
        .about-cards:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .about-cards h3 {
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .about-cards:hover h3 {
            color: #ff3a3a;
            transform: translateY(-5px);
        }
        
        .about-cards p {
            color: #cccccc;
            font-size: 0.95rem;
            text-align: center;
        }
        
        /* Service Icons */
        .service-icon {
            width: 85px;
            height: 85px;
            background: rgba(255, 58, 58, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #ff3a3a;
            font-size: 30px;
            transition: all 0.4s ease;
            position: relative;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2);
        }
        
        .about-cards:hover .service-icon {
            background: #ff3a3a;
            color: white;
            transform: scale(1.1) rotate(360deg);
        }
       
            /* Location Card Styling */
            .location-card {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 35px 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            margin: 0 auto 30px;
            max-width: 400px;
            border: 1px solid rgba(255, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .location-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .location-card h3 {
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .location-card:hover h3 {
            color: #ff3a3a;
            transform: translateY(-5px);
        }
        
        .location-card p {
            color: #cccccc;
            font-size: 0.95rem;
            text-align: center;
            margin-bottom: 5px;
        }
        
        .location-card .contact {
            margin-top: 15px;
        }
        
        .location-icon {
            width: 85px;
            height: 85px;
            background: rgba(255, 58, 58, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #ff3a3a;
            font-size: 30px;
            transition: all 0.4s ease;
            position: relative;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2);
        }
        
        .location-card:hover .location-icon {
            background: #ff3a3a;
            color: white;
            transform: scale(1.1) rotate(360deg);
        }
        
        /* Map Container */
        .map-container {
            position: relative;
            width: 100%;
            margin: 0 auto 50px;
            max-width: 900px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 0, 0, 0.3);
        }

        #googleMap {
    border-radius: 20px;
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
}
        
        .map-overlay {
            position: relative;
            width: 100%;
        }
        
        .map-overlay img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
        }
        
        .map-location {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: #ff3a3a;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            box-shadow: 0 0 15px rgba(255, 58, 58, 0.7);
            transition: all 0.3s ease;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            border: 2px solid white;
        }
        
        .map-location:hover, .map-location.active {
            transform: translate(-50%, -50%) scale(1.3);
            z-index: 3;
        }
        
        .location-tooltip {
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            white-space: nowrap;
            z-index: 4;
            border: 1px solid #ff3a3a;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Hours Section */
        .hours-table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.2);
        }
        
        .hours-table thead th {
            background: rgba(255, 0, 0, 0.2);
            color: white;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
        }
        
        .hours-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .hours-table tbody tr:last-child {
            border-bottom: none;
        }
        
        .hours-table tbody tr:hover {
            background: rgba(255, 0, 0, 0.1);
        }
        
        .hours-table td {
            padding: 15px;
            color: #cccccc;
            text-align: center;
        }
        
        .hours-table td:first-child {
            font-weight: 600;
            color: white;
        }
        
        .hours-note {
            text-align: center;
            max-width: 750px;
            margin: 30px auto 0;
            font-size: 0.95rem;
            color: #cccccc;
            font-style: italic;
            background: rgba(255, 0, 0, 0.1);
            padding: 15px;
            border-radius: 10px;
            border: 1px dashed rgba(255, 0, 0, 0.3);
        }
        
        .hours-note i {
            color: #ff3a3a;
            margin-right: 5px;
        }
        
        /* Holiday Notice */
        .holiday-notice {
            background: rgba(255, 0, 0, 0.15);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 10px;
            padding: 15px;
            margin: 30px auto;
            max-width: 800px;
            text-align: center;
            color: #ffffff;
            position: relative;
        }
        
        .holiday-notice h4 {
            color: #ff3a3a;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        
        .holiday-icon {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.7);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff3a3a;
            font-size: 20px;
            border: 2px solid rgba(255, 0, 0, 0.5);
        }

        .facebook-link {
  color: #14A0EB;
  text-decoration: none;
}

.facebook-link:hover {
  color: #14A0EB; /* optional hover effect */
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
        
       

    </style>





    <!-- Our Story Section -->
    <section class="content-section">
    <div class="section-icon">
    <i class="fas fa-users"></i>
    </div>
    <div class="section-title">
        <h2>About Us</h2>
    </div>
            <div class="intro-text">
                <p>Mobile Tronics Solutions was established with a simple goal: to provide fast, reliable, and affordable repair services for all electronic devices. Since our founding, we've grown to become one of the most trusted repair centers in the region.</p>
            </div>
            <div class="row cards">
                <div class="col-md-3 mx-auto">
                    <div class="about-card">
                        <div class="service-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3 class="text-center">Our Beginning</h3>
                        <p>Started in 2019 as a small shop with just two technicians, we've grown through word-of-mouth and our commitment to quality service.</p>
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="about-card">
                        <div class="service-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="text-center">Our Mission</h3>
                        <p>To provide exceptional repair services that extend the life of electronic devices, reduce e-waste, and save our customers money.</p>
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="about-card">
                        <div class="service-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="text-center">Our Vision</h3>
                        <p>To become the most trusted and reliable electronic repair service in Malaysia, known for our expertise and customer satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="content-section">
    <div class="section-icon">
    <i class="fas fa-clipboard-check"></i>
    </div>
    <div class="section-title">
        <h2>Why Choose Us</h2>
    </div>
            <div class="row cards">
                <div class="col-md-6">
                    <div class="about-cards">
                        <h3><i class="fas fa-tools"></i> Expert Technicians</h3>
                        <p>Our team consists of certified professionals with years of experience in repairing various electronic devices.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-cards">
                        <h3><i class="fas fa-bolt"></i> Quick Turnaround</h3>
                        <p>Most repairs are completed within the same day, minimizing the time you're without your important devices.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-cards">
                        <h3><i class="fas fa-shield-alt"></i> Quality Guarantee</h3>
                        <p>We use only high-quality parts and provide warranty on all our repair services for your peace of mind.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-cards">
                        <h3><i class="fas fa-dollar-sign"></i> Competitive Pricing</h3>
                        <p>We offer transparent pricing with no hidden fees, ensuring you get the best value for your money.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

       <!-- Hours Section -->
       <section class="content-section">
      
      <div class="section-icon">
          <i class="fas fa-clock"></i>
      </div>
      <div class="section-title">
          <h2>Business Hours</h2>
      </div>
      <div class="intro-text">
          <p>We're open 6 days a week to ensure you can get your devices repaired at a time that suits your schedule. Please note that hours may vary slightly during public holidays.</p>
      </div>
      
      <table class="hours-table">
          <thead>
              <tr>
                  <th>Day</th>
                  <th>Working Hours</th>
                  
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Monday-Friday</td>
                  <td>10:00 AM - 7:00 PM</td>
                  
              </tr>
              <tr>
                  <td>Saturday</td>
                  <td>10:00 AM - 5:00 PM</td>
                 
              </tr>
              <tr>
                  <td>Sunday</td>
                  <td>Closed</td>
                  
              </tr>
              
          </tbody>
      </table>
      
      <div class="hours-note">
          <i class="fas fa-info-circle"></i> For emergency repairs outside of business hours, please call our 24/7 hotline at +60-123-456-789.
      </div>
      
      <!-- Holiday Notice -->
      <div class="holiday-notice">
          <div class="holiday-icon">
              <i class="fas fa-calendar-alt"></i>
          </div>
          <h4>Holiday Hours</h4>
          <p>Our hours may vary during Malaysian public holidays. Please check our <a href="https://www.facebook.com/p/Mobile-Tronics-Solutions-100068087839201/" target="_blank" rel="noopener noreferrer" class="facebook-link">social media</a> channels or call ahead to confirm our operating hours during holidays.
          </p>
      </div>
  </div>
</section>

     <!-- Locations Section -->
     <section class="content-section">
      
            <div class="section-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="section-title">
                <h2>Our Locations</h2>
            </div>
            <div class="intro-text">
                <p>Visit Mobile Tronics Solutions at any of our convenient locations across Malaysia. Each center offers the full range of our repair services with experienced technicians ready to help.</p>
            </div>
            
            <!-- Interactive Map -->
            <div class="map-container" style="position: relative; width: 100%; max-width: 800px; margin: auto;">
                <div class="map-overlay">
                    <!-- Google Maps Embed -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2049422126674!2d101.4114298!3d3.039654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc5580b83cf03b%3A0x31c80c1ed1a711fa!2sMobile%20Tronics%20Solutions!5e0!3m2!1sen!2smy!4v1712917000000!5m2!1sen!2smy" 
                        width="100%" 
                        height="500" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            
                <!-- Bonus Tip: Button to Google Maps -->
                <a href="https://www.google.com/maps/place/Mobile+Tronics+Solutions/@3.039654,101.4114298,17z" 
                   target="_blank" 
                   class="btn btn-primary mt-3 d-block text-center" 
                   style="max-width: 800px; margin: 0 auto;">
                    View on Google Maps
                </a>
            </div>
            
</section>
            
            
    
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap"></script>

    <script>
          document.addEventListener('DOMContentLoaded', function() {
            // Highlight the active menu item
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === 'locations.html') {
                    link.classList.add('active');
                    link.style.fontWeight = 'bold';
                    link.style.color = '#ff3a3a';
                }
            });
            
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
            
            // Enhanced scroll animation with staggered effect
            const animateElements = document.querySelectorAll('.location-card, .hours-table, .holiday-notice');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        // Add a small delay for each element based on its index
                        setTimeout(() => {
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100); // 100ms delay between each element
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });
            
            animateElements.forEach(element => {
                element.style.opacity = 0;
                element.style.transform = 'translateY(30px)';
                element.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                observer.observe(element);
            });
            
            // Interactive Map Functionality
            const mapLocations = document.querySelectorAll('.map-location');
            const locationCards = document.querySelectorAll('.location-card');
            
            // Show tooltip on hover
            mapLocations.forEach(location => {
                const locationId = location.getAttribute('data-location');
                const tooltip = document.getElementById(${locationId}-tooltip);
                
                location.addEventListener('mouseenter', function() {
                    // Position the tooltip above the pin
                    const pinRect = location.getBoundingClientRect();
                    const mapRect = document.querySelector('.map-overlay').getBoundingClientRect();
                    
                    tooltip.style.bottom = ${mapRect.height - (pinRect.top - mapRect.top) + 10}px;
                    tooltip.style.left = ${pinRect.left - mapRect.left}px;
                    tooltip.style.opacity = '1';
                    
                    // Highlight corresponding card
                    document.getElementById(${locationId}-card).classList.add('active');
                });
                
                location.addEventListener('mouseleave', function() {
                    tooltip.style.opacity = '0';
                    document.getElementById(${locationId}-card).classList.remove('active');
                });
                
                // Click to scroll to the location card
                location.addEventListener('click', function() {
                    document.getElementById(${locationId}-card).scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                });
            });
            
            // Adding hover effects for location cards
            locationCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const locationId = this.id.replace('-card', '');
                    const pin = document.querySelector(.map-location[data-location="${locationId}"]);
                    if (pin) pin.classList.add('active');
                });
                
                card.addEventListener('mouseleave', function() {
                    const locationId = this.id.replace('-card', '');
                    const pin = document.querySelector(.map-location[data-location="${locationId}"]);
                    if (pin) pin.classList.remove('active');
                });
            });
        });
    </script>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 7,
                center: { lat: 3.1390, lng: 101.6869 }, // KL as center
            });
    
            // Marker: Mobiletronic KL
            const marker1 = new google.maps.Marker({
                position: { lat: 3.1390, lng: 101.6869 },
                map,
                title: "Kuala Lumpur Flagship Store"
            });
    
            marker1.addListener("click", () => {
                window.open("https://www.google.com/maps?q=Mobiletronic Kuala Lumpur", "_blank");
            });
    
            // Marker: Penang
            const marker2 = new google.maps.Marker({
                position: { lat: 5.4141, lng: 100.3288 },
                map,
                title: "Penang Branch"
            });
    
            marker2.addListener("click", () => {
                window.open("https://www.google.com/maps?q=Mobiletronic Penang", "_blank");
            });
    
            // Marker: Johor Bahru
            const marker3 = new google.maps.Marker({
                position: { lat: 1.4927, lng: 103.7414 },
                map,
                title: "Johor Bahru Branch"
            });
    
            marker3.addListener("click", () => {
                window.open("https://www.google.com/maps?q=Mobiletronic Johor", "_blank");
            });
        }
    </script>
    
@endsection