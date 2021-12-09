$(document).ready(function(){
    $('.burger').click(function(){
        $('.mobile nav').slideToggle();
    });
//---------------------------------------------------------------------------
    $(".account").click(function(){
        $('.account_menu').slideToggle();
    });

});

//---------------------------------------------------------------------------

var element = document.body;

if((localStorage.getItem('dark-mode')) != null){

function dark_mode(){
    if(localStorage.getItem('dark-mode') == 'light'){
        element.classList.toggle("light-mode");
        localStorage.setItem('dark-mode', 'dark');
    } else if(localStorage.getItem('dark-mode') == 'dark'){
        element.classList.toggle("light-mode");
        localStorage.setItem('dark-mode', 'light');
    }
}

if(localStorage.getItem('dark-mode') == 'light'){
    element.classList.toggle("light-mode");
}

}else{
    localStorage.setItem('dark-mode', 'dark')
}

//---------------------------------------------------------------------------

const burger = document.querySelector('.burger');
var current_rotation = 0;

burger.addEventListener('click', function(){
    if (current_rotation == 0){
        current_rotation += 90;
        burger.style.transform = 'rotate(' + current_rotation + 'deg)';
    }
    else{
        current_rotation -= 90;
        burger.style.transform = 'rotate(' + current_rotation + 'deg)';
    }
});

//---------------------------------------------------------------------------