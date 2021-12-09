var element = document.body;

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
