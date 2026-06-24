/* -------- Spotlight -------- */
    const spotlight = document.getElementById('spotlight');
    if (spotlight) {
      document.addEventListener('mousemove', (e) => {
        spotlight.style.left = e.clientX + 'px';
        spotlight.style.top  = e.clientY + 'px';
      });
    }

    /* -------- Nav Scroll -------- */
    const nav = document.getElementById('main-nav');

    function updateNavState() {
      if (!nav) return;
      nav.classList.toggle('scrolled', window.scrollY > 72);
    }

    if (nav) {
      window.addEventListener('scroll', updateNavState, { passive: true });
      window.addEventListener('resize', updateNavState);
      window.addEventListener('hashchange', updateNavState);
      updateNavState();
      window.addEventListener('load', updateNavState);
    }

    /* -------- Hamburger / Mobile Menu -------- */
    const hamburger = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    let menuOpen = false;

    function toggleMenu(open) {
      menuOpen = open;
      hamburger.classList.toggle('active', open);
      mobileMenu.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', String(open));
      document.body.style.overflow = open ? 'hidden' : '';
    }

    hamburger.addEventListener('click', () => toggleMenu(!menuOpen));

    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => toggleMenu(false));
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menuOpen) toggleMenu(false);
    });

    /* -------- Intersection Observer — Reveal -------- */
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealEls.forEach(el => revealObserver.observe(el));

    /* -------- Counter Animation -------- */
    function animateCounter(el) {
      const target = parseInt(el.dataset.target, 10);
      const suffix = el.dataset.suffix || '';
      const duration = 1600;
      const start = performance.now();

      function update(now) {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        // Ease out cubic
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.round(eased * target);
        el.textContent = current.toLocaleString() + suffix;
        if (progress < 1) requestAnimationFrame(update);
      }

      requestAnimationFrame(update);
    }

    const counterEls = document.querySelectorAll('[data-target]');
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counterEls.forEach(el => counterObserver.observe(el));

    /* -------- Form: basic client-side validation -------- */
    const quickForm = document.querySelector('.contact-form-mini form');
    if (quickForm) {
      quickForm.addEventListener('submit', function(e) {
        const name    = document.getElementById('quick-name');
        const email   = document.getElementById('quick-email');
        const message = document.getElementById('quick-message');
        let valid = true;

        [name, email, message].forEach(field => {
          field.style.borderColor = '';
          if (!field.value.trim()) {
            field.style.borderColor = '#ff5555';
            valid = false;
          }
        });

        if (email.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
          email.style.borderColor = '#ff5555';
          valid = false;
        }

        if (!valid) {
          e.preventDefault();
          const firstInvalid = quickForm.querySelector('[style*="ff5555"]');
          if (firstInvalid) firstInvalid.focus();
        }
      });
    }

    /* -------- Benefit stat counters (in-section) -------- */
    document.querySelectorAll('.benefit-stat[data-target]').forEach(el => {
      const obs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.6 });
      obs.observe(el);
    });

    /* -------- Media rotator (pod experience) -------- */
    document.querySelectorAll('[data-media-rotator]').forEach(rotator => {
      const slides = rotator.querySelectorAll('.media-rotator__slide');
      const tabs = rotator.querySelectorAll('[data-rotator-go]');
      const autoBtn = rotator.querySelector('.media-rotator__auto');
      let current = 0;
      let autoPlay = true;
      let timer = null;
      const interval = 6000;

      function pauseVideos(exceptIndex) {
        slides.forEach((slide, i) => {
          const video = slide.querySelector('video');
          if (!video) return;
          if (i === exceptIndex) {
            video.play().catch(() => {});
          } else {
            video.pause();
          }
        });
      }

      function goTo(index) {
        current = (index + slides.length) % slides.length;
        slides.forEach((slide, i) => {
          const active = i === current;
          slide.classList.toggle('is-active', active);
          slide.setAttribute('aria-hidden', active ? 'false' : 'true');
        });
        tabs.forEach((tab, i) => {
          const active = i === current;
          tab.classList.toggle('is-active', active);
          tab.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        pauseVideos(current);
      }

      function startAuto() {
        clearInterval(timer);
        if (!autoPlay) return;
        timer = setInterval(() => goTo(current + 1), interval);
      }

      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          goTo(parseInt(tab.dataset.rotatorGo, 10));
          startAuto();
        });
      });

      if (autoBtn) {
        autoBtn.addEventListener('click', () => {
          autoPlay = !autoPlay;
          autoBtn.setAttribute('aria-pressed', String(autoPlay));
          autoBtn.setAttribute('aria-label', autoPlay ? 'Pause automatic rotation' : 'Resume automatic rotation');
          autoBtn.querySelector('.media-rotator__auto-icon').textContent = autoPlay ? '⏸' : '▶';
          autoBtn.querySelector('.media-rotator__auto-label').textContent = autoPlay ? 'Auto-rotating' : 'Paused';
          startAuto();
        });
      }

      const rotatorObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            goTo(current);
            startAuto();
          } else {
            clearInterval(timer);
            pauseVideos(-1);
          }
        });
      }, { threshold: 0.35 });
      rotatorObs.observe(rotator);

      goTo(0);
    });

    /* -------- Smooth anchor scrolling -------- */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });