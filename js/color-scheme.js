const menuToggle = document.querySelector('.header__menu-toggle');
const mobileMenu = document.querySelector('.mobile-menu');
const mobileMenuBack = document.querySelector('.mobile-menu__back');
const mobileMenuOverlay = document.querySelector('.mobile-menu__overlay');

if (menuToggle) {
  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.add('mobile-menu--active');
    document.body.style.overflow = 'hidden';
  });
}

if (mobileMenuBack) {
  mobileMenuBack.addEventListener('click', () => {
    mobileMenu.classList.remove('mobile-menu--active');
    document.body.style.overflow = '';
  });
}

if (mobileMenuOverlay) {
  mobileMenuOverlay.addEventListener('click', () => {
    mobileMenu.classList.remove('mobile-menu--active');
    document.body.style.overflow = '';
  });
}

// Season Toggle Switch
const headerToggle = document.querySelector('.header__season-toggle .header__toggle-input');
const mobileToggle = document.querySelector('.mobile-menu__season-toggle .header__toggle-input');

function updateColorScheme(isChecked) {
  if (isChecked) {
    document.body.classList.remove('color-scheme-summer');
    document.body.classList.add('color-scheme-winter');
  } else {
    document.body.classList.remove('color-scheme-winter');
    document.body.classList.add('color-scheme-summer');
  }
}

function syncToggles(sourceToggle, targetToggle) {
  if (targetToggle) {
    targetToggle.checked = sourceToggle.checked;
  }
}

if (headerToggle) {
  headerToggle.addEventListener('change', (e) => {
    updateColorScheme(e.target.checked);
    syncToggles(headerToggle, mobileToggle);
  });
}

if (mobileToggle) {
  mobileToggle.addEventListener('change', (e) => {
    updateColorScheme(e.target.checked);
    syncToggles(mobileToggle, headerToggle);
  });
}

// Initialize based on current body class
const isWinter = document.body.classList.contains('color-scheme-winter');
if (headerToggle) headerToggle.checked = isWinter;
if (mobileToggle) mobileToggle.checked = isWinter;