// external js: masonry.pkgd.js, imagesloaded.pkgd.js
// init Masonry
var grid = document.querySelector('.masonry-grid');
var msnry = new Masonry( grid, {
  itemSelector: '.masonry-grid-item',
  percentPosition: true
});
imagesLoaded( grid ).on( 'progress', function() {
  // layout Masonry after each image loads
  msnry.layout();
});