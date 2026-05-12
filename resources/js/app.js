/* ================================================================
   app.js — DÉMÉ Laravel
   Gère : menu mobile, galerie (filtre), don (montant/récurrence),
          scroll-reveal, animations délayées
   ================================================================ */

document.addEventListener('DOMContentLoaded', () => {

  /* ── 1. Menu mobile ────────────────────────────────────────── */
  const menuBtn  = document.getElementById('mobile-menu-btn');
  const menuEl   = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('icon-menu-open');
  const iconClose= document.getElementById('icon-menu-close');

  if (menuBtn && menuEl) {
    menuBtn.addEventListener('click', () => {
      const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
      menuBtn.setAttribute('aria-expanded', String(!expanded));
      menuEl.classList.toggle('hidden');
      iconOpen ?.classList.toggle('hidden');
      iconClose?.classList.toggle('hidden');
    });

    // Fermer en cliquant un lien
    menuEl.querySelectorAll('a').forEach(a =>
      a.addEventListener('click', () => {
        menuEl.classList.add('hidden');
        menuBtn.setAttribute('aria-expanded', 'false');
        iconOpen ?.classList.remove('hidden');
        iconClose?.classList.add('hidden');
      })
    );
  }

  /* ── 2. Scroll-reveal (IntersectionObserver) ───────────────── */
  const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.scroll-reveal').forEach(el => revealObserver.observe(el));

  /* ── 3. Galerie — filtre par catégorie ─────────────────────── */
  const filterBtns = document.querySelectorAll('[data-filter-btn]');
  const galleryItems = document.querySelectorAll('[data-cat]');

  if (filterBtns.length) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const cat = btn.dataset.filterBtn;

        // Styles boutons
        filterBtns.forEach(b => {
          b.classList.remove('gradient-cta', 'text-white', 'border-transparent', 'shadow-soft');
          b.classList.add('bg-white', 'border-[var(--color-border)]', 'text-[var(--color-foreground)]');
        });
        btn.classList.add('gradient-cta', 'text-white', 'border-transparent', 'shadow-soft');
        btn.classList.remove('bg-white', 'border-[var(--color-border)]', 'text-[var(--color-foreground)]');

        // Filtrer les items
        galleryItems.forEach((item, i) => {
          const match = cat === 'Toutes' || item.dataset.cat === cat;
          if (match) {
            item.style.display = '';
            item.style.animationDelay = `${i * 60}ms`;
            item.classList.remove('animate-fade-up');
            void item.offsetWidth; // reflow
            item.classList.add('animate-fade-up');
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  }

  /* ── 4. Page Don — montant & récurrence ────────────────────── */
  const donForm    = document.getElementById('don-form');
  const presetBtns = document.querySelectorAll('[data-preset]');
  const customInput= document.getElementById('don-custom');
  const donDisplay = document.getElementById('don-display');
  const recBtns    = document.querySelectorAll('[data-recurrence]');
  const recInput   = document.getElementById('don-recurrent');

  let currentAmount   = 25;
  let currentRecurrent= false;

  function updateDonDisplay() {
    if (donDisplay) {
      donDisplay.textContent = `Donner ${currentAmount} €${currentRecurrent ? ' / mois' : ''}`;
    }
  }

  presetBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      currentAmount = parseInt(btn.dataset.preset, 10);
      if (customInput) customInput.value = currentAmount;
      presetBtns.forEach(b => {
        b.classList.remove('gradient-cta', 'text-white', 'border-transparent', 'shadow-soft');
        b.classList.add('bg-[var(--color-background)]', 'border-[var(--color-border)]');
      });
      btn.classList.add('gradient-cta', 'text-white', 'border-transparent', 'shadow-soft');
      btn.classList.remove('bg-[var(--color-background)]', 'border-[var(--color-border)]');
      updateDonDisplay();
    });
  });

  if (customInput) {
    customInput.addEventListener('input', () => {
      const v = parseInt(customInput.value, 10) || 0;
      currentAmount = v;
      presetBtns.forEach(b => {
        b.classList.remove('gradient-cta', 'text-white', 'border-transparent', 'shadow-soft');
        b.classList.add('bg-[var(--color-background)]', 'border-[var(--color-border)]');
      });
      updateDonDisplay();
    });
  }

  recBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      currentRecurrent = btn.dataset.recurrence === '1';
      if (recInput) recInput.value = currentRecurrent ? '1' : '0';
      recBtns.forEach(b => {
        b.classList.remove('gradient-cta', 'text-white', 'border-transparent');
        b.classList.add('bg-[var(--color-background)]', 'border-[var(--color-border)]');
      });
      btn.classList.add('gradient-cta', 'text-white', 'border-transparent');
      btn.classList.remove('bg-[var(--color-background)]', 'border-[var(--color-border)]');
      updateDonDisplay();
    });
  });

  updateDonDisplay();

  /* ── 5. Formulaire contact (validation client) ─────────────── */
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', e => {
      const name    = contactForm.querySelector('[name=name]').value.trim();
      const email   = contactForm.querySelector('[name=email]').value.trim();
      const message = contactForm.querySelector('[name=message]').value.trim();
      const status  = document.getElementById('contact-status');

      if (!name) { showStatus(status, 'Nom requis.', false); e.preventDefault(); return; }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showStatus(status, 'Email invalide.', false); e.preventDefault(); return; }
      if (message.length < 5) { showStatus(status, 'Message trop court.', false); e.preventDefault(); return; }
    });
  }

  /* ── 6. Formulaire question anonyme ────────────────────────── */
  const anonForm = document.getElementById('anon-form');
  if (anonForm) {
    anonForm.addEventListener('submit', e => {
      const q = anonForm.querySelector('[name=question]').value.trim();
      const status = document.getElementById('anon-status');
      if (q.length < 10) { showStatus(status, 'Au moins 10 caractères.', false); e.preventDefault(); return; }
    });
  }

  /* ── 7. Auto-hide flash messages ───────────────────────────── */
  document.querySelectorAll('.flash-msg').forEach(el => {
    setTimeout(() => { el.style.opacity = '0'; setTimeout(() => el.remove(), 400); }, 5000);
  });

  /* ── 8. Utilitaire d'affichage de status ───────────────────── */
  function showStatus(el, msg, ok) {
    if (!el) return;
    el.textContent = msg;
    el.className = `text-sm mt-2 ${ok ? 'text-green-600' : 'text-red-500'}`;
  }

});
