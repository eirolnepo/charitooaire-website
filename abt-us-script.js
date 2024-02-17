let slideIndex = 0;
showSlides();

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n === undefined) { n = ++slideIndex; } // Increment slideIndex if n is not defined
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

function openNewModal() {
  document.getElementById('sign-in-modal').style.display='none';
  document.getElementById('not-customer-modal').style.display='block';
}

function goBack() {
  document.getElementById('not-customer-modal').style.display='none';
  document.getElementById('sign-in-modal').style.display='block';
}

function closeNewModal() {
  document.getElementById('not-customer-modal').style.display='none';
}

function openAdminModal() {
  document.getElementById('not-customer-modal').style.display='none';
  document.getElementById('admin-modal').style.display='block';
}

function goBackAdmin() {
  document.getElementById('admin-modal').style.display='none';
  document.getElementById('not-customer-modal').style.display='block';
}

function openEmployeeModal() {
  document.getElementById('not-customer-modal').style.display='none';
  document.getElementById('employee-modal').style.display='block';
}

function goBackEmployee() {
  document.getElementById('employee-modal').style.display='none';
  document.getElementById('not-customer-modal').style.display='block';
}