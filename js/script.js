let navbar = document.querySelector('.header .flex .navbar');
let profil = document.querySelector('.header .flex .profil');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profil.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   navbar.classList.remove('active');
   profil.classList.toggle('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profil.classList.remove('active');
}

let mainImage = document.querySelector('.fiche-produit .box .row .image-container .main-image img');
let subImages = document.querySelectorAll('.fiche-produit .box .row .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});