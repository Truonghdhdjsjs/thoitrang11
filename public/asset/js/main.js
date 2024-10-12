import { translate } from './lang.js';

window.addEventListener("DOMContentLoaded", function() {
    const button_lang = document.querySelectorAll(".language-button");
    const login = document.querySelector("#login");
    login.textContent=translate.en.greeting;

    [...button_lang].forEach((item) => 
        item.addEventListener('click', function(event) {
            // const selectedLang = event.target.dataset.lang;
            
        })
    );
});



