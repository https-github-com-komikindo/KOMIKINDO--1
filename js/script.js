let menu = document.querySelector('.menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
	navbar.classList.toggle('open');
}

// mengubah icon hamburger menjadi silang
let changeIcon = function(icon){
	icon.classList.toggle('fa-xmark')
}

changeIcon = (icon) => icon.classList.toggle('fa-xmark')


function zoomIn() {
    var pic = document.getElementById("geeks");
    var width = pic.clientWidth;
    pic.style.width = width + 100 + "px";
    }
function zoomOut() {
var pic = document.getElementById("geeks");
var width = pic.clientWidth;
pic.style.width = width - 100 + "px";
}

const newspaperSpinning = [
    { transform: 'rotate(0) scale(1)' },
    { transform: 'rotate(360deg) scale(0)' }
  ];
  
  const newspaperTiming = {
    duration: 2000,
    iterations: 1,
  }
  
  const newspaper = document.querySelector(".newspaper");
  
  newspaper.addEventListener('click', () => {
    newspaper.animate(newspaperSpinning, newspaperTiming);
  });

  const body = document.querySelector('body');
  const dark = document.getElementById('lightbutton');

  dark.addEventListener('click', ()=>{
    body.classList.toggle('light');
    if(dark.innerHTML === '<i class="fa-regular fa-sun"></i>'){
      dark.innerHTML = '<i class="fa-solid fa-moon"></i>'
    }else{
      dark.innerHTML = '<i class="fa-regular fa-sun"></i>'
    }
  })
