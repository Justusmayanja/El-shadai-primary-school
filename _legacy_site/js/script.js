/**
 * Kisugu Pre-Paratory School — Shared JavaScript
 * Kasubi, Kampala, Uganda | Nav, scroll effects, lightbox, carousel, back-to-top
 */

(function () {
  'use strict';

  /* ========== Hero background rotation (home page) ========== */
  const heroSlides = document.querySelectorAll('.hero__bg-slide');
  if (heroSlides.length > 1) {
    let heroIndex = 0;
    setInterval(function () {
      heroSlides[heroIndex].classList.remove('active');
      heroIndex = (heroIndex + 1) % heroSlides.length;
      heroSlides[heroIndex].classList.add('active');
    }, 4500);
  }

  /* ========== Navigation: scroll effect & hamburger ========== */
  const nav = document.querySelector('.nav');
  const navToggle = document.querySelector('.nav__toggle');
  const navLinks = document.querySelector('.nav__links');

  if (nav) {
    let lastScroll = 0;
    window.addEventListener('scroll', function () {
      const scrollY = window.scrollY || window.pageYOffset;
      if (scrollY > 50) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
      lastScroll = scrollY;
    }, { passive: true });
  }

  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
      const expanded = navToggle.getAttribute('aria-expanded') === 'true';
      navToggle.setAttribute('aria-expanded', !expanded);
      navLinks.classList.toggle('open');
      document.body.style.overflow = expanded ? '' : 'hidden';
    });

    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        navToggle.setAttribute('aria-expanded', 'false');
        navLinks.classList.remove('open');
        document.body.style.overflow = '';
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navLinks.classList.contains('open')) {
        navToggle.setAttribute('aria-expanded', 'false');
        navLinks.classList.remove('open');
        document.body.style.overflow = '';
      }
    });
  }

  /* ========== Active nav link (current page) ========== */
  const currentPath = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav__links a').forEach(function (a) {
    const href = a.getAttribute('href');
    if (href === currentPath || (currentPath === '' && href === 'index.html')) {
      a.classList.add('active');
    }
  });

  /* ========== Intersection Observer: fade-in on scroll ========== */
  const fadeElements = document.querySelectorAll('.fade-in');
  if (fadeElements.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      },
      { rootMargin: '0px 0px -40px 0px', threshold: 0.1 }
    );
    fadeElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ========== Lightbox (gallery) ========== */
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightbox = document.querySelector('.lightbox');
  const lightboxImg = lightbox ? lightbox.querySelector('.lightbox__content img') : null;
  const lightboxClose = lightbox ? lightbox.querySelector('.lightbox__close') : null;

  if (galleryItems.length && lightbox && lightboxImg) {
    galleryItems.forEach(function (item) {
      const img = item.querySelector('img');
      if (!img || !img.src) return;
      item.addEventListener('click', function () {
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt || 'Gallery image';
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
      });
    });

    function closeLightbox() {
      lightbox.classList.remove('active');
      document.body.style.overflow = '';
    }

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) closeLightbox();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
    });
  }

  /* ========== Testimonials carousel ========== */
  const testimonialsTrack = document.querySelector('.testimonials-track');
  const testimonialSlides = document.querySelectorAll('.testimonial-slide');
  const testimonialDots = document.querySelector('.testimonials-dots');

  if (testimonialsTrack && testimonialSlides.length) {
    let currentIndex = 0;
    const total = testimonialSlides.length;

    function buildDots() {
      if (!testimonialDots) return;
      testimonialDots.innerHTML = '';
      for (let i = 0; i < total; i++) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.setAttribute('aria-label', 'Go to testimonial ' + (i + 1));
        if (i === 0) btn.classList.add('active');
        btn.addEventListener('click', function () {
          goToSlide(i);
        });
        testimonialDots.appendChild(btn);
      }
    }

    function goToSlide(index) {
      currentIndex = (index + total) % total;
      testimonialsTrack.style.transform = 'translateX(-' + currentIndex * 100 + '%)';
      if (testimonialDots) {
        testimonialDots.querySelectorAll('button').forEach(function (btn, i) {
          btn.classList.toggle('active', i === currentIndex);
        });
      }
    }

    buildDots();

    setInterval(function () {
      goToSlide(currentIndex + 1);
    }, 5000);
  }

  /* ========== Accordion ========== */
  document.querySelectorAll('.accordion__header').forEach(function (header) {
    header.addEventListener('click', function () {
      const item = header.closest('.accordion__item');
      const content = item ? item.querySelector('.accordion__content') : null;
      const isOpen = item && item.classList.contains('open');

      document.querySelectorAll('.accordion__item').forEach(function (other) {
        other.classList.remove('open');
        const c = other.querySelector('.accordion__content');
        if (c) c.style.maxHeight = null;
      });

      if (!isOpen && content) {
        item.classList.add('open');
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    });
  });

  /* ========== Back to top ========== */
  const backToTop = document.querySelector('.back-to-top');
  if (backToTop) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    }, { passive: true });

    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ========== Form: demo submit ========== */
  document.querySelectorAll('form[data-static]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Thank you for your message. We will get back to you soon! (This is a demo form.)');
    });
  });
})();
