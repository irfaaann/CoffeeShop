let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
   loginForm.classList.add('active');
}

document.querySelector('#close-login-form').onclick = () =>{
   loginForm.classList.remove('active');
}

//registration form modal
let regForm = document.querySelector('.reg-form');

document.querySelector('#reg-btn').onclick = () =>{
   regForm.classList.add('active');
}

document.querySelector('#close-reg-form').onclick = () =>{
   regForm.classList.remove('active');
}



let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
}

window.onscroll = () =>{
   loginForm.classList.remove('active');
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');

   if(window.scrollY > 0){
      document.querySelector('.header').classList.add('active');
   }else{
      document.querySelector('.header').classList.remove('active');
   }
}


function gotowhatsapp() {
    
   var name = document.getElementById("qname").value;
   var phone = document.getElementById("qphone").value;
   var email = document.getElementById("qemail").value;
   var service = document.getElementById("qmessage").value;

   var url = "https://wa.me/918087253635?text=" 
   + "Name: " + name + "%0a"
   + "Phone: " + phone + "%0a"
   + "Email: " + email  + "%0a"
   + "Message: " + service; 

   window.open(url, '_blank').focus();
}
