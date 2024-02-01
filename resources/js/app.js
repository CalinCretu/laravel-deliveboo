import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

const deleteDomEl = document.getElementById("myBtn");
const formDomEl = document.getElementById("bgForm");
const noBtnDomEl = document.getElementById("noBtn");


// console.log(formDomEl);

deleteDomEl.addEventListener('click', function () {
    // console.log('delete');
    formDomEl.classList.add("active")
})

noBtnDomEl.addEventListener('click', function () {
    formDomEl.classList.remove("active");
})