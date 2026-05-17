document.addEventListener('DOMContentLoaded', function() {
  const mobileNav = document.querySelector('.mobile-menu__nav');
  if (!mobileNav) return;

  // Event Delegation
  mobileNav.addEventListener('click', function(e) {
    const target = e.target.closest('a');
    if (!target) return;

    // Check if it's a drill-down trigger (link with sibling dropdown)
    const parentItem = target.parentElement;
    const submenu = parentItem.querySelector('.mobile-menu__dropdown');

    if (submenu) {
      e.preventDefault();
      openSubmenu(submenu);
    }
  });

  function openSubmenu(submenu) {
    submenu.classList.add('is-open');
    mobileNav.classList.add('has-active-submenu');
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
