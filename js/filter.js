document.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.querySelector('.filters__filter-btn');
  const closeBtn = document.querySelector('.filters__modal-close');
  const modal = document.querySelector('.filters__modal');
  const overlay = document.querySelector('.overlay');

  if (!openBtn || !closeBtn || !modal) return;

  openBtn.addEventListener('click', () => {
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  });

  closeBtn.addEventListener('click', () => {
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
  });

  overlay.addEventListener('click', () => {
    modal.classList.remove('is-open');
    overlay.classList.remove('is-open');
    document.body.style.overflow = '';
  });
});
