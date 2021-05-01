const date = new Date();

let year = date.getFullYear();

document.querySelector('.year').textContent = year;

//$(function() {
	// jquery code goes here!
//});
//js by pegaus for fixing accordion on recent_diarypost

const accordion = document.getElementsByClassName ('notes');

for(i=0;i<accordion.length;i++){
	accordion[i].addEventListener('click',function(){this.classList.toggle('active')})
}
//js by pegasus for navbar fixing toggleButton
const toggleButton = document.getElementsByClassName('toggle-button')[0];
const pegas = document.getElementsByClassName('nav-bar-link')[0];
const pegay = document.getElementsByClassName('second-menu')[0];
toggleButton.addEventListener('click',() => {pegas.classList.toggle('active')});
toggleButton.addEventListener('click',() => {pegay.classList.toggle('active')});


