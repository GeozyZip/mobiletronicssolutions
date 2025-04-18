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
            color:rgb(241, 241, 241);
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
            padding: 80px 0;
            position: relative;
        }
        
     
         /* Original Product Page Styling with adapted colors */
        .product-filter {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background-color: transparent;
            border: 2px solid #ff3a3a;
            color: #ff3a3a;
            padding: 8px 20px;
            border-radius: 30px;
            margin: 0 8px 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background-color: #ff3a3a;
            color: white;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
            margin-left: auto;
            margin-right: auto;
            max-width: 1400px;
            justify-content: center;
        }
        
        .product-card {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 0, 0, 0.2);
            margin: 0 auto;
            max-width: 100%;
            transform: scale(1.05);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.5);
        }
        
        .product-img-container {
            position: relative;
            height: 260px;
            overflow: hidden;
        }
        
        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.6s ease;
        }
        
        .product-card:hover .product-img {
            transform: scale(1.1);
        }
        
        .product-badge {
            position: absolute;
            top: 15px;
            right: -32px;
            background: #ff3a3a;
            color: white;
            padding: 5px 30px;
            transform: rotate(45deg);
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-category {
            font-size: 0.8rem;
            color: #cccccc;
            font-weight: 500;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .product-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #ffffff;
            transition: all 0.3s ease;
        }
        
        .product-card:hover .product-title {
            color: #ff3a3a;
        }
        
        .product-description {
            font-size: 0.9rem;
            color: #cccccc;
            margin-bottom: 15px;
        }
        
        .product-price {
            font-size: 1.6rem;
            font-weight: 700;
            color: #ff3a3a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            margin-left: 10px;
            font-weight: 400;
        }
        
        .product-actions {
            display: flex;
            justify-content: space-between;
        }
        
        .btn-product {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        
        .btn-details {
            background-color: transparent;
            border: 1px solid #ff3a3a;
            color: #ff3a3a;
        }
        
        .btn-details:hover {
            background-color: #ff3a3a;
            color: white;
        }
        
        .btn-buy {
            background-color: #ff3a3a;
            border: 1px solid #ff3a3a;
            color: white;
        }
        
        .btn-buy:hover {
            background-color: #cc0000;
        }
        
        /* Featured Section */
        .featured-section {
            padding: 80px 0;
            margin: 60px 0;
            border-radius: 20px;
        }
        
        .featured-product {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .featured-image {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        
        .featured-image img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .featured-content {
            flex: 1;
            min-width: 300px;
            padding: 30px;
        }
        
        .featured-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
        }
        
        .featured-description {
            font-size: 1rem;
            color: #cccccc;
            margin-bottom: 20px;
        }
        
        .featured-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ff3a3a;
            margin-bottom: 25px;
        }
        
        .featured-button {
            display: inline-block;
            background-color: #ff3a3a;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .featured-button:hover {
            background-color: #cc0000;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 0, 0, 0.15);
            color: white;
        }
        
        /* Testimonials */
        .testimonial-section {
            padding: 60px 0;
            
        }
        
        .testimonial-card {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 12px;
            margin: 15px;
            position: relative;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }
        
        .testimonial-card::before {
            content: '\201C';
            font-size: 80px;
            color: rgba(255, 0, 0, 0.1);
            position: absolute;
            top: 10px;
            left: 20px;
            font-family: serif;
        }
        
        .testimonial-content {
            position: relative;
            z-index: 1;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: #cccccc;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }
        
        .author-info h4 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
        }
        
        .author-info p {
            margin: 0;
            font-size: 0.85rem;
            color: #cccccc;
        }
        
        .intro-text {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 50px;
            line-height: 1.8;
            font-size: 1.05rem;
            color: #C0C0C0;
        }
      
    </style>

 <!-- Product Categories Section -->
 <section class="content-section">
    <div class="section-icon">
        <i class="fas fa-shopping-bag"></i>
    </div>
    <div class="section-title">
        <h2>Our Products</h2>
    </div>
    <div class="intro-text">
        <p>Mobile Tronics Solutions was established with a simple goal: to provide fast, reliable, and affordable repair services for all electronic devices. Since our founding, we've grown to become one of the most trusted repair centers in the region.</p>
    </div>

    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <div class="product-img-container">
                @if($product->productImage)
                    <img src="{{ asset('product_images/' . $product->productImage) }}" alt="{{ $product->productName }}" class="product-img">
                @else
                    <img src="https://via.placeholder.com/300x200/1a1a1a/ff3a3a?text=No+Image" alt="No Image" class="product-img">
                @endif
                @if($product->is_bestseller)
                    <div class="product-badge">BESTSELLER</div>
                @endif
                @if($product->is_new)
                    <div class="product-badge">NEW</div>
                @endif
            </div>
            <div class="product-info">
                <span class="product-category">{{ $product->category ?? 'Accessories' }}</span>
                <h3 class="product-title">{{ $product->productName }}</h3>
                <p class="product-description">{{ Str::limit($product->description ?? 'High quality product', 100) }}</p>
                <div class="product-price">
                    RM {{ number_format($product->price, 2) }}
                    @if($product->original_price && $product->original_price > $product->price)
                        <span class="original-price">RM {{ number_format($product->original_price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
         
       

<!-- Testimonials Section -->
<section class="testimonial-section">
    <div class="section-icon">
        <i class="fas fa-quote-right"></i>
    </div>
    <div class="section-title">
        <h2>Customer Reviews</h2>
    </div>
    <div class="row">
        @foreach($reviews as $review)
        <div class="col-md-4">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    @if($review->reviewImage)
                        <div class="testimonial-image mb-3 text-center">
                            <img src="{{ asset('review_images/' . $review->reviewImage) }}" alt="Review Image" 
                                 class="img-fluid rounded shadow" style="max-width: 200px; height: auto;">
                        </div>
                    @endif
                
                    @if($review->reviewDesc)
                        <p class="testimonial-caption text-light small text-center">
                            {{ $review->reviewDesc }}
                        </p>
                    @endif
                </div>
                
                
                
            </div>
        </div>
        @endforeach
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
     // Highlight the active menu item
     const navLinks = document.querySelectorAll('.nav-link');
     navLinks.forEach(link => {
         if (link.getAttribute('href') === 'products.html') {
             link.classList.add('active');
             link.style.fontWeight = 'bold';
             link.style.color = '#ff3a3a';
         }
     });
     
     // Filter buttons functionality
     const filterBtns = document.querySelectorAll('.filter-btn');
     
     filterBtns.forEach(btn => {
         btn.addEventListener('click', function() {
             // Remove active class from all buttons
             filterBtns.forEach(b => b.classList.remove('active'));
             
             // Add active class to clicked button
             this.classList.add('active');
             
             // Here you would typically filter the products
             // For demo purposes, we're just changing the button state
         });
     });
     
     // Animation for product cards and section icons
     const animateElements = document.querySelectorAll('.product-card, .testimonial-card');
     const animateIcons = document.querySelectorAll('.section-icon');
     
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
     
     // Special animation for section icons
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