<footer id="footer" class="footer" data-builder="footer">
    
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
              <span class="sitename">{{ config('app.name') }}</span>
            </a>
            <p>{{ __('Hardware and building materials retail in Dar es Salaam. Quality supplies for construction, renovation, and everyday project needs.') }}</p>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
    
          <div class="col-lg-2 col-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('pages.show', 'about') }}">About Us</a></li>
              <li><a href="{{ route('pages.show', 'services') }}">Services</a></li>
              <li><a href="{{ route('pages.show', 'products') }}">{{ __('Products') }}</a></li>
              <li><a href="{{ route('pages.show', 'contact') }}">Contact</a></li>
            </ul>
          </div>
    
          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="{{ route('pages.show', 'services') }}">Residential Building</a></li>
              <li><a href="{{ route('pages.show', 'services') }}">Commercial work</a></li>
              <li><a href="{{ route('pages.show', 'services') }}">Renovation</a></li>
              <li><a href="{{ route('pages.show', 'services') }}">Infrastructure</a></li>
              <li><a href="{{ route('pages.show', 'services') }}">Architecture</a></li>
            </ul>
          </div>
    
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>Gerezani Magharibi</p>
            <p>Gerezani Ward, Dar es Salaam</p>
            <p>Tanzania</p>
            <p class="mt-4"><strong>Phone:</strong> <a href="tel:+255789946428" class="text-reset">+255 789 946 428</a></p>
            <p><strong>Email:</strong> <a href="mailto:Suleimanomary09@gmail.com" class="text-reset">Suleimanomary09@gmail.com</a></p>
          </div>
    
        </div>
      </div>
    
      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name') }}</strong> <span>All Rights Reserved</span></p>
        
      </div>
    
    </footer>