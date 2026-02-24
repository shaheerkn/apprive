document.addEventListener('DOMContentLoaded', function () {
  var sections = [
    {
      container: '.work-proces__content',
      dots: '.work-proces__dot',
      items: '.work-proces__item'
    },
    {
      container: '.concierge-services__grid',
      dots: '.concierge-services__dot',
      items: '.concierge-services__item',
      activeItemClass: 'concierge-services__item--active'
    }
  ];

  sections.forEach(function (cfg) {
    var container = document.querySelector(cfg.container);
    var dots = document.querySelectorAll(cfg.dots);
    var items = document.querySelectorAll(cfg.items);

    if (!container || !dots.length || !items.length) return;

    function updateDots() {
      var scrollLeft = container.scrollLeft;
      var containerWidth = container.offsetWidth;
      var activeIndex = 0;
      var minDistance = Infinity;

      items.forEach(function (item, i) {
        var itemCenter = item.offsetLeft + item.offsetWidth / 2 - container.offsetLeft;
        var distance = Math.abs(itemCenter - scrollLeft - containerWidth / 2);
        if (distance < minDistance) {
          minDistance = distance;
          activeIndex = i;
        }
      });

      dots.forEach(function (dot, i) {
        dot.classList.toggle('active', i === activeIndex);
      });

      if (cfg.activeItemClass) {
        items.forEach(function (item, i) {
          item.classList.toggle(cfg.activeItemClass, i === activeIndex);
        });
      }
    }

    container.addEventListener('scroll', updateDots);

    dots.forEach(function (dot, i) {
      dot.addEventListener('click', function () {
        var item = items[i];
        var scrollTo = item.offsetLeft - (container.offsetWidth - item.offsetWidth) / 2;
        container.scrollTo({ left: scrollTo, behavior: 'smooth' });
      });
    });
  });
});
