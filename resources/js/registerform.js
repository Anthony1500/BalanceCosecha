const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); 
    const targetSection = document.querySelector(event.target.getAttribute('href'));
    targetSection.scrollIntoView({
      behavior: 'smooth',
    });
  });
});
