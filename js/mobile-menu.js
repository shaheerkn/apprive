document.addEventListener('DOMContentLoaded', function() {
  const mobileNav = document.querySelector('.mobile-menu__nav');
  if (!mobileNav) return;

  // 1. Inject Back Buttons
  const dropdowns = mobileNav.querySelectorAll('.mobile-menu__dropdown');
  dropdowns.forEach(dropdown => {
    // Get parent title
    const parentLink = dropdown.parentElement.querySelector('.mobile-menu__link');
    const parentTitle = parentLink ? parentLink.innerText.trim() : 'Back';

    const backItem = document.createElement('li');
    backItem.className = 'mobile-menu__item mobile-menu__item--back';
    backItem.innerHTML = `
      <a href="#" class="mobile-menu__link mobile-menu__link--back">
        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="mobile-menu__back-icon">
            <path d="M0 11.6667V10.5H13.3268V11.6667H0ZM17.841 10.6123L13.0174 5.83333L17.841 1.07683L18.6667 1.90254L14.6685 5.83333L18.6667 9.78658L17.841 10.6123ZM0 6.41667V5.25H10.0065V6.41667H0ZM0 1.16667V0H13.3268V1.16667H0Z" fill="#1F1F1F"/>
        </svg>
        ${parentTitle}
      </a>
    `;
    dropdown.insertBefore(backItem, dropdown.firstChild);
  });

  // 2. Event Delegation
  mobileNav.addEventListener('click', function(e) {
    const target = e.target.closest('a');
    if (!target) return;

    // Check if it's a drill-down trigger (link with sibling dropdown)
    const parentItem = target.parentElement;
    const submenu = parentItem.querySelector('.mobile-menu__dropdown');

    if (submenu && !target.classList.contains('mobile-menu__link--back')) {
      e.preventDefault();
      openSubmenu(submenu);
    }

    // Check if it's a back button
    if (target.classList.contains('mobile-menu__link--back')) {
      e.preventDefault();
      closeSubmenu(target.closest('.mobile-menu__dropdown'));
    }
  });

  function openSubmenu(submenu) {
    submenu.classList.add('is-open');
    mobileNav.classList.add('has-active-submenu');
    
    // If opening a 3rd level, the 2nd level is already the "container" effectively
    // But our CSS structure will likely handle stacking via z-index or absolute positioning
  }

  function closeSubmenu(submenu) {
    submenu.classList.remove('is-open');
    
    // Check if any other submenus are still open (for multi-level)
    const activeSubmenus = mobileNav.querySelectorAll('.mobile-menu__dropdown.is-open');
    if (activeSubmenus.length === 0) {
      mobileNav.classList.remove('has-active-submenu');
    }
  }
});
