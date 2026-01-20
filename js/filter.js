document.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.querySelector('.filter-btn');
  const closeBtn = document.querySelector('.filters-panel__filter-modal__close');
  const modal = document.querySelector('.filters-panel__filter-modal');

  if (!openBtn || !closeBtn || !modal) return;

  openBtn.addEventListener('click', () => {
    modal.classList.add('is-open');
  });

  closeBtn.addEventListener('click', () => {
    modal.classList.remove('is-open');
  });
});
