function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

let slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}

function functionSlides(){
  showSlides(slideIndex);
}

window.onload = function() {
  L.mapquest.key = 'Bui7uH3bVdNGr9T7VUVDx4iPEFjokPWV';

  L.mapquest.geocoding().geocode('50.806352, 3.282571', createMap);

  function createMap(error, response) {
    var location = response.results[0].locations[0];
    var latLng = location.displayLatLng;
    var map = L.mapquest.map('map', {
      center: latLng,
      layers: L.mapquest.tileLayer('map'),
      zoom: 16
    });

    var customIcon = L.mapquest.icons.circle({
      primaryColor: '#3b5998'
    });

    L.marker(latLng, { icon: customIcon }).addTo(map);
  }
}