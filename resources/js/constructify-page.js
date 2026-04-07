// Auto-extracted from test.html
try {
(()=>{ /**
     * Animation on scroll function and init
     */
    function aosInit() {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
    window.addEventListener('load', aosInit);
    })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
      const selectBody = document.querySelector('body');
      const selectHeader = document.querySelector('#header');
      if (! selectHeader) return;
      if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
      window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
    }
    
    document.addEventListener('scroll', toggleScrolled);
    window.addEventListener('load', toggleScrolled);
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Scroll up sticky header to headers with .scroll-up-sticky class
     */
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
      const selectHeader = document.querySelector('#header');
      if (! selectHeader || ! selectHeader.classList.contains('scroll-up-sticky')) return;
      
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      
      if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
        selectHeader.style.setProperty('position', 'sticky', 'important');
        selectHeader.style.top = `-${selectHeader.offsetHeight + 50}px`;
      } else if (scrollTop > selectHeader.offsetHeight) {
        selectHeader.style.setProperty('position', 'sticky', 'important');
        selectHeader.style.top = "0";
      } else {
        selectHeader.style.removeProperty('top');
        selectHeader.style.removeProperty('position');
      }
      lastScrollTop = scrollTop;
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
    * Mobile nav toggle
    */
    const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
    function mobileNavToogle() {
      document.querySelector('body').classList.toggle('mobile-nav-active');
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }
    if( mobileNavToggleBtn) {
      mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
    }
    
    /**
    * Hide mobile nav on same-page/hash links
    */
    document.querySelectorAll('#navmenu a').forEach(navmenu => {
      navmenu.addEventListener('click', () => {
        if( document.querySelector('.mobile-nav-active') && !navmenu.classList.contains('toggle-dropdown')) {
          mobileNavToogle();
        }
      });
    
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
    * Toggle mobile nav dropdowns
    */
    document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
      navmenu.addEventListener('click', function(e) {
        e.preventDefault();
        this.parentNode.classList.toggle('active');
        this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
        e.stopImmediatePropagation();
      });
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Scroll top button
     */
    const scrollTopBtn = document.querySelector('.scroll-top');
    if (! scrollTopBtn) {
      return;
    }
    function toggleScrollTop() {
      window.scrollY > 100 ? scrollTopBtn.classList.add('active') : scrollTopBtn.classList.remove('active');
    }
    scrollTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Initiate Pure Counter
     */
    new PureCounter();
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Init isotope layout and filters
     */
    document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
      let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
      let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
      let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

      let container = isotopeItem.querySelector('.isotope-container');
      if (!container) {
        return;
      }

      let initIsotope;
      imagesLoaded(container, function() {
        initIsotope = new Isotope(container, {
          itemSelector: '.isotope-item',
          layoutMode: layout,
          filter: filter,
          sortBy: sort
        });

        isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
          filters.addEventListener('click', function(){
            var active = isotopeItem.querySelector('.isotope-filters .filter-active');
            if (active) active.classList.remove('filter-active');
            this.classList.add('filter-active');
            if (initIsotope) {
              initIsotope.arrange({ filter: this.getAttribute('data-filter') });
            }
            if (typeof aosInit === 'function') {
              aosInit();
            }
          }, false);
        });

        isotopeItem.querySelectorAll('[data-isotope-filter]').forEach(function(trigger) {
          trigger.addEventListener('click', function(e) {
            e.preventDefault();
            var sel = trigger.getAttribute('data-isotope-filter');
            var li = isotopeItem.querySelector('.isotope-filters li[data-filter="' + sel + '"]');
            if (li) {
              li.click();
            }
          });
        });
      });
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
    * Initiate glightbox
    */
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Init swiper sliders
     */
    function initSwiper() {
      document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
        let config = JSON.parse(
          swiperElement.querySelector(".swiper-config").innerHTML.trim()
        );
    
        new Swiper(swiperElement, config);
      });
    }
    
    window.addEventListener("load", initSwiper);
     })();
} catch (e) { console.warn('constructify script block', e); }

try {
(()=>{ /**
     * Frequently Asked Questions Toggle
     */
    document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach((faqItem) => {
      faqItem.addEventListener('click', () => {
        faqItem.parentNode.classList.toggle('faq-active');
      });
    });
     })();
} catch (e) { console.warn('constructify script block', e); }

