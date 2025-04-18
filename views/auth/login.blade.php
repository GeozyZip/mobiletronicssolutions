@extends('layouts.auth')

@section('content')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      margin: 0;
      background-color: #f6f5f7;
      overflow-x: hidden;
      padding: 15px;
    }

    /* Animated particles */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
      pointer-events: none;
    }

    .particle {
      position: absolute;
      display: block;
      background: rgba(255, 75, 43, 0.4);
      border-radius: 50%;
      animation: float 15s infinite linear;
    }

    @keyframes float {
      0% {
        transform: translateY(0) translateX(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
      }
      100% {
        transform: translateY(-1000px) translateX(1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
      }
    }

    .logo-container {
      margin-bottom: 20px;
      width: 100px;
      height: 100px;
      overflow: hidden;
      border-radius: 50%;
      box-shadow: 0 8px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      background-color: white;
      padding: 3px;
      border: 2px solid #FF4B2B;
    }
    
    .logo-container:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 20px rgba(0,0,0,0.2);
    }
    
    .logo-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 0.3s ease;
      border-radius: 50%;
    }
    
    .logo-image:hover {
      transform: rotate(5deg);
    }

    h1 {
      font-weight: 700;
      color: #222;
      margin: 0 0 15px;
      font-size: 28px;
      text-align: center;
    }

    h2 {
      text-align: center;
      font-weight: 500;
    }

    p {
      font-size: 14px;
      font-weight: 400;
      line-height: 1.5;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
      color: #fff;
      max-width: 80%;
      text-align: center;
    }

    a {
      color: #FF4B2B;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
      transition: all 0.3s ease;
    }

    a:hover {
      color: #FF416C;
      text-decoration: underline;
    }

    button {
      border-radius: 50px;
      border: none;
      background: linear-gradient(45deg, #FF4B2B, #FF416C);
      color: #FFFFFF;
      font-size: 13px;
      font-weight: 600;
      padding: 14px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: all 0.3s ease;
      cursor: pointer;
      margin-top: 15px;
      box-shadow: 0 5px 15px rgba(255, 75, 43, 0.3);
      position: relative;
      overflow: hidden;
    }

    button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(255, 75, 43, 0.4);
    }

    button:active {
      transform: translateY(0);
      box-shadow: 0 2px 10px rgba(255, 75, 43, 0.3);
    }

    button:focus {
      outline: none;
    }

    button::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, #FF416C, #FF4B2B);
      opacity: 0;
      transition: all 0.3s ease;
      z-index: -1;
    }

    button:hover::after {
      opacity: 1;
    }

    button.ghost {
      background: transparent;
      border: 2px solid #FFFFFF;
      box-shadow: none;
    }

    button.ghost:hover {
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
    }

    form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    .input-group {
      position: relative;
      width: 100%;
      margin-bottom: 15px;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #999;
      transition: all 0.3s ease;
    }

    input {
      background-color: #f5f5f5;
      border: none;
      border-radius: 50px;
      padding: 14px 15px 14px 45px;
      margin: 8px 0;
      width: 100%;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      transition: all 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05) inset;
    }

    input:focus {
      background-color: #ffffff;
      outline: none;
      box-shadow: 0 0 10px rgba(255, 75, 43, 0.2);
    }

    input:focus + i {
      color: #FF4B2B;
    }

    /* Container styles with responsiveness */
    .container {
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1), 
                0 10px 15px rgba(0,0,0,0.05);
      position: relative;
      overflow: hidden;
      width: 100%;
      max-width: 800px;
      min-height: 550px;
    }

    /* Form container styles with responsiveness */
    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }

    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {
      0%, 49.99% {
        opacity: 0;
        z-index: 1;
      }
      
      50%, 100% {
        opacity: 1;
        z-index: 5;
      }
    }

    /* Overlay container styles with responsiveness */
    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container.right-panel-active .overlay-container{
      transform: translateX(-100%);
    }

    .overlay {
      background: #FF416C;
      background: linear-gradient(135deg, #FF4B2B, #FF416C);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #FFFFFF;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-container {
      margin: 20px 0;
      display: flex;
      justify-content: center;
    }

    .social-container a {
      border: 1px solid #ddd;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
      transition: all 0.3s ease;
    }

    .social-container a:hover {
      border-color: #FF4B2B;
      transform: translateY(-2px);
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }

    .forgot-password {
      color: #888;
      font-size: 13px;
      transition: all 0.3s ease;
    }

    .forgot-password:hover {
      color: #FF4B2B;
    }

    .overlay::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 65, 108, 0.2);
      transform: skewX(-5deg);
      z-index: -1;
    }

    /* Subtle glow effect */
    @keyframes glow {
      0% {
        box-shadow: 0 0 10px rgba(255, 75, 43, 0.5);
      }
      50% {
        box-shadow: 0 0 20px rgba(255, 75, 43, 0.8);
      }
      100% {
        box-shadow: 0 0 10px rgba(255, 75, 43, 0.5);
      }
    }

    .container {
      animation: glow 5s infinite;
    }
    
    /* Simple fade-in animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    form > * {
      animation: fadeIn 0.5s ease-out forwards;
    }

    form > *:nth-child(2) { animation-delay: 0.1s; }
    form > *:nth-child(3) { animation-delay: 0.2s; }
    form > *:nth-child(4) { animation-delay: 0.3s; }
    form > *:nth-child(5) { animation-delay: 0.4s; }

    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
      .container {
        min-height: 500px;
      }

      form {
        padding: 0 25px;
      }

      .overlay-container {
        display: none;
      }
      
      .sign-in-container, .sign-up-container {
        width: 100%;
      }
      
      .container.right-panel-active .sign-in-container {
        transform: translateX(-100%);
      }
      
      .sign-up-container {
        opacity: 1;
        transform: translateX(100%);
      }
      
      .container.right-panel-active .sign-up-container {
        transform: translateX(0);
      }
      
      /* Mobile navigation buttons */
      .mobile-toggle {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 20px;
      }
      
      .mobile-toggle button {
        padding: 10px 25px;
        font-size: 12px;
        margin: 0 5px;
      }
      
      h1 {
        font-size: 24px;
      }
      
      input {
        padding: 12px 15px 12px 40px;
      }

      p {
        margin: 15px 0 20px;
      }
    }
    
    /* Tablets and small laptops */
    @media (min-width: 769px) and (max-width: 1024px) {
      .container {
        max-width: 700px;
      }
      
      form {
        padding: 0 35px;
      }
      
      p {
        font-size: 13px;
      }
    }
    
    /* Hide the mobile toggle by default for desktop */
    .mobile-toggle {
      display: none;
    }
  </style>

  <!-- Floating particles -->
  <div class="particles" id="particles"></div>
  
  <div class="container" id="container">
    {{-- Register (Sign Up) --}}
    <div class="form-container sign-up-container">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="logo-container">
              <img src="{{ asset('uploads/mtt.jpg') }}" alt="Logo" class="logo-image" /> 
            </div>
            <h1>Create Account</h1>

            {{-- Display Register Validation Errors --}}
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            @endif

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required />
                <i class="fas fa-lock"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    {{-- Login (Sign In) --}}
    <div class="form-container sign-in-container">
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="logo-container">
                 <img src="{{ asset('uploads/mtt.jpg') }}" alt="Logo" class="logo-image" /> 
            </div>
            <h1>Sign in</h1>

            {{-- Display Login Error --}}
            @if($errors->has('login_error'))
                <p style="color: red;">{{ $errors->first('login_error') }}</p>
            @endif

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required />
                <i class="fas fa-lock"></i>
            </div>

            {{-- <a href="#" class="forgot-password">Forgot your password?</a> --}}
            <button type="submit">Sign In</button>
        </form>
    </div>

    {{-- Slider Panel --}}
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

  
  <!-- Mobile Toggle Buttons (only visible on mobile) -->
  <div class="mobile-toggle">
    <button id="mobileSignIn" class="ghost">Sign In</button>
    <button id="mobileSignUp">Sign Up</button>
  </div>

  <script>
    // Create animated particles
    document.addEventListener('DOMContentLoaded', function() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 25;
      
      for (let i = 0; i < particleCount; i++) {
        createParticle();
      }
      
      function createParticle() {
        const particle = document.createElement('span');
        particle.classList.add('particle');
        
        // Random size between 5 and 25px
        const size = Math.random() * 20 + 5;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        const posX = Math.random() * 100;
        const posY = Math.random() * 100;
        particle.style.left = `${posX}%`;
        particle.style.top = `${posY}%`;
        
        // Random opacity between 0.1 and 0.5
        particle.style.opacity = Math.random() * 0.4 + 0.1;
        
        // Random animation duration between 15 and 45 seconds
        const duration = Math.random() * 30 + 15;
        particle.style.animationDuration = `${duration}s`;
        
        // Random animation delay
        const delay = Math.random() * 5;
        particle.style.animationDelay = `${delay}s`;
        
        particlesContainer.appendChild(particle);
        
        // Remove and recreate particles after animation ends
        setTimeout(() => {
          particle.remove();
          createParticle();
        }, duration * 1000);
      }
      
      // Add focus and blur events for form inputs
      const inputs = document.querySelectorAll('input');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentElement.querySelector('i').style.color = '#FF4B2B';
        });
        
        input.addEventListener('blur', function() {
          if (!this.value) {
            this.parentElement.querySelector('i').style.color = '#999';
          }
        });
      });
      
      // Handle responsive behavior
      function handleResponsive() {
        const container = document.getElementById('container');
        const mobileToggle = document.querySelector('.mobile-toggle');
        
        if (window.innerWidth <= 768) {
          mobileToggle.style.display = 'flex';
        } else {
          mobileToggle.style.display = 'none';
        }
      }
      
      // Run on load and resize
      handleResponsive();
      window.addEventListener('resize', handleResponsive);
    });

    // Wait for DOM to be fully loaded before adding event listeners
    document.addEventListener('DOMContentLoaded', function() {
      const signUpButton = document.getElementById('signUp');
      const signInButton = document.getElementById('signIn');
      const mobileSignUpButton = document.getElementById('mobileSignUp');
      const mobileSignInButton = document.getElementById('mobileSignIn');
      const container = document.getElementById('container');

      if (signUpButton) {
        signUpButton.addEventListener('click', () => {
          container.classList.add("right-panel-active");
        });
      }

      if (signInButton) {
        signInButton.addEventListener('click', () => {
          container.classList.remove("right-panel-active");
        });
      }
      
      // Mobile buttons
      if (mobileSignUpButton) {
        mobileSignUpButton.addEventListener('click', () => {
          container.classList.add("right-panel-active");
        });
      }

      if (mobileSignInButton) {
        mobileSignInButton.addEventListener('click', () => {
          container.classList.remove("right-panel-active");
        });
      }
    });
  </script>

@endsection
