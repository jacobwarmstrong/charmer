//spinner is in html already visible
//when image is finished loading, hide the spinner
//gracefully transition/fade image into view



var image = document.getElementById('image');
var spinner = document.getElementById('spinner');

function loaded() {
    spinner.style.display = 'none';
}

if (image.complete) {
  loaded()
} else {
  image.addEventListener('load', loaded)
  image.addEventListener('error', function() {
      alert('error')
  })
}