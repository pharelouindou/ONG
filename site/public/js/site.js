const header = document.getElementById('header');
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');

if (header) {
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 20);
  });
}

if (navToggle && navLinks) {
  navToggle.addEventListener('click', () => {
    const open = navLinks.classList.toggle('open');
    navToggle.classList.toggle('open', open);
    navToggle.setAttribute('aria-expanded', open);
  });

  navLinks.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      navLinks.classList.remove('open');
      navToggle.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    });
  });
}
