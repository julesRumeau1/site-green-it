(() => {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.getElementById('site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('is-open');
    });
  }

  // Helpers
  const qs = (sel) => document.querySelector(sel);
  const csrf = () => (qs('meta[name="csrf-token"]')?.getAttribute('content') || '');

  // Produits: chargement async
  const productsRoot = qs('[data-products]');
  if (productsRoot) {
    fetch('api/products.php', { headers: { 'Accept': 'application/json' } })
      .then((r) => r.json())
      .then((data) => {
        if (!data.ok) throw new Error(data.message || 'Erreur');
        const frag = document.createDocumentFragment();
        data.items.forEach((p) => {
          const card = document.createElement('article');
          card.className = 'card';

          const pic = document.createElement('picture');
          const source = document.createElement('source');
          source.type = 'image/webp';
          source.srcset = `assets/img/${p.img_basename}.webp`;
          const img = document.createElement('img');
          img.loading = 'lazy';
          img.decoding = 'async';
          img.width = 600;
          img.height = 400;
          img.alt = '';
          img.src = `assets/img/${p.img_basename}.jpg`;
          pic.appendChild(source);
          pic.appendChild(img);

          const body = document.createElement('div');
          body.className = 'card__body';
          const h = document.createElement('h2');
          h.textContent = p.titre;
          const d = document.createElement('p');
          d.textContent = p.descr;
          body.appendChild(h);
          body.appendChild(d);

          card.appendChild(pic);
          card.appendChild(body);
          frag.appendChild(card);
        });
        productsRoot.innerHTML = '';
        productsRoot.appendChild(frag);
      })
      .catch(() => {
        productsRoot.innerHTML = '<p class="notice">Impossible de charger les produits pour le moment.</p>';
      });
  }

  // Contact: envoi async
  const contactForm = qs('form[data-contact]');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const out = qs('#contact-status');
      const fd = new FormData(contactForm);
      fd.set('csrf', csrf());

      fetch('api/contact.php', { method: 'POST', body: fd, headers: { 'Accept': 'application/json' } })
        .then((r) => r.json())
        .then((data) => {
          if (out) out.textContent = data.message || '';
          if (data.ok) contactForm.reset();
        })
        .catch(() => {
          if (out) out.textContent = 'Erreur réseau.';
        });
    });
  }

  // Connexion / inscription: async
  const authForm = qs('form[data-auth="login"]');
  if (authForm) {
    authForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const out = qs('#auth-status');
      const fd = new FormData(authForm);
      fd.set('csrf', csrf());

      fetch('api/auth.php', { method: 'POST', body: fd, headers: { 'Accept': 'application/json' } })
        .then((r) => r.json())
        .then((data) => {
          if (data.ok) {
            window.location.href = 'index.php';
            return;
          }
          if (out) out.textContent = data.message || 'Connexion impossible.';
        })
        .catch(() => {
          if (out) out.textContent = 'Erreur réseau.';
        });
    });
  }

  const signupForm = qs('form[data-auth="signup"]');
  if (signupForm) {
    signupForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const out = qs('#signup-status');
      const fd = new FormData(signupForm);
      fd.set('csrf', csrf());

      fetch('api/signup.php', { method: 'POST', body: fd, headers: { 'Accept': 'application/json' } })
        .then((r) => r.json())
        .then((data) => {
          if (out) out.textContent = data.message || '';
          if (data.ok) signupForm.reset();
        })
        .catch(() => {
          if (out) out.textContent = 'Erreur réseau.';
        });
    });
  }
})();
