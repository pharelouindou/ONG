const header = document.getElementById('header');
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');
const contactForm = document.getElementById('contactForm');
const formNote = document.getElementById('formNote');

window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 20);
});

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

contactForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const data = new FormData(contactForm);
  const name = data.get('name');
  const email = data.get('email');
  const subject = data.get('subject') || 'Contact depuis le site ADéProG';
  const message = data.get('message');

  const mailto = `mailto:Adeprogong2@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(
    `Nom: ${name}\nEmail: ${email}\n\n${message}`
  )}`;

  window.location.href = mailto;
  formNote.textContent = 'Votre client mail va s\'ouvrir pour envoyer le message.';
  contactForm.reset();
});
