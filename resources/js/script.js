/* Set the width of the sidebar to 250px (show it) */
console.log('funziono');

document.getElementById("open-side-nav").addEventListener("click",openNav);
document.getElementById("close-side-nav").addEventListener("click",closeNav);

function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}



// Get the button:
document.getElementById("myBtn2").addEventListener("click",topFunction);

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn2").style.display = "block";
  } else {
    document.getElementById("myBtn2").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var footer = document.getElementsByTagName('footer')[0];
var forms = document.querySelectorAll('.toBlack2');
var inputs = document.querySelectorAll('.toBlack3');
var category_cards = document.querySelectorAll('.category-card');
var cards_ann = document.querySelectorAll('.toBlack');
var SidePanel =  document.querySelector('#mySidepanel');
var Dropdowns = document.querySelectorAll('.dropdown-menu');      
var sun_class = 'icon-sun';
var moon_class = 'icon-moon';
var dark_theme_class = 'dark-theme';
var dark_theme_class2 = 'dark-theme2';
var dark_theme_class3 = 'dark-theme3';
var dark_theme_class4 = 'dark-theme4';
var side_pan = 'sidepanel';

toggle_icon.addEventListener('click', function() {
  // if per il body
  if (body.classList.contains(dark_theme_class)) {
    toggle_icon.classList.add(moon_class);
    toggle_icon.classList.remove(sun_class);
    
    body.classList.remove(dark_theme_class);
    
    setCookie('theme', 'light');
  }
  else {
    toggle_icon.classList.add(sun_class);
    toggle_icon.classList.remove(moon_class);
    
    body.classList.add(dark_theme_class);
    
    setCookie('theme', 'dark');
    
  }
  // if per il footer
  if (footer.classList.contains(dark_theme_class)) {
    toggle_icon.classList.add(moon_class);
    toggle_icon.classList.remove(sun_class);
    
    footer.classList.remove(dark_theme_class);
    
    setCookie('theme', 'light');
  }
  else {
    toggle_icon.classList.add(sun_class);
    toggle_icon.classList.remove(moon_class);
    
    footer.classList.add(dark_theme_class);
    
    setCookie('theme', 'dark');
    
  }
  // for per i riquadri delle categorie nella home
  for (const category_card of category_cards) {
    if (category_card.classList.contains(dark_theme_class)) {
      toggle_icon.classList.add(moon_class);
      toggle_icon.classList.remove(sun_class);
      
      category_card.classList.remove(dark_theme_class);
      
      setCookie('theme', 'light');
    }
    else {
      toggle_icon.classList.add(sun_class);
      toggle_icon.classList.remove(moon_class);
      
      category_card.classList.add(dark_theme_class);
      
      setCookie('theme', 'dark');
      
    }
  }
  // for per le card
  for (const card_ann of cards_ann) {
    if (card_ann.classList.contains(dark_theme_class2)) {
      toggle_icon.classList.add(moon_class);
      toggle_icon.classList.remove(sun_class);
      
      card_ann.classList.remove(dark_theme_class2);
      
      setCookie('theme', 'light');
    }
    else {
      toggle_icon.classList.add(sun_class);
      toggle_icon.classList.remove(moon_class);
      
      card_ann.classList.add(dark_theme_class2);
      
      setCookie('theme', 'dark');
      
    }
  }
  // if per la sidebar
  if (SidePanel.classList.contains(dark_theme_class3)) {
    toggle_icon.classList.add(moon_class);
    toggle_icon.classList.remove(sun_class);

    SidePanel.classList.remove(dark_theme_class3);

    SidePanel.classList.add(side_pan);
    
    
    
    setCookie('theme', 'light');
  }
  else {
    toggle_icon.classList.add(sun_class);
    toggle_icon.classList.remove(moon_class);
    
    
    
    SidePanel.classList.add(dark_theme_class3);

    SidePanel.classList.toggle(side_pan);
    
    setCookie('theme', 'dark');
    
    
  }
  //  for per i drop-down
  for (const dropdown of Dropdowns) {
    if (dropdown.classList.contains(dark_theme_class)) {
      toggle_icon.classList.add(moon_class);
      toggle_icon.classList.remove(sun_class);
      
      dropdown.classList.remove(dark_theme_class);
      
      setCookie('theme', 'light');
    }
    else {
      toggle_icon.classList.add(sun_class);
      toggle_icon.classList.remove(moon_class);
      
      dropdown.classList.add(dark_theme_class);
      
      setCookie('theme', 'dark');
      
    }
  }
  // for per i form
  for (const form of forms) {
    if (form.classList.contains(dark_theme_class2)) {
      toggle_icon.classList.add(moon_class);
      toggle_icon.classList.remove(sun_class);
      
      form.classList.remove(dark_theme_class2);
      
      setCookie('theme', 'light');
    }
    else {
      toggle_icon.classList.add(sun_class);
      toggle_icon.classList.remove(moon_class);
      
      form.classList.add(dark_theme_class2);
      
      setCookie('theme', 'dark');
      
    }
  }
  // for per gli input
  for (const input of inputs) {
    if (input.classList.contains(dark_theme_class4)) {
      toggle_icon.classList.add(moon_class);
      toggle_icon.classList.remove(sun_class);
      
      input.classList.remove(dark_theme_class4);
      
      setCookie('theme', 'light');
    }
    else {
      toggle_icon.classList.add(sun_class);
      toggle_icon.classList.remove(moon_class);
      
      input.classList.add(dark_theme_class4);
      
      setCookie('theme', 'dark');
      
    }
  }
});

function setCookie(name, value) {
  var d = new Date();
  d.setTime(d.getTime() + (365*24*60*60*1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}


if (SidePanel.classList.contains(dark_theme_class3) && SidePanel.classList.contains(side_pan)) {


  SidePanel.classList.remove(side_pan);
}