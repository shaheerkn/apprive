document.querySelector('.chalet-about__text a').addEventListener('click', function(e) {
  e.preventDefault();
  this.classList.toggle('active');
  this.textContent = this.classList.contains('active') ? 'Show Less' : 'Show More';
});