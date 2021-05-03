const date = new Date();

let year = date.getFullYear();

document.querySelector('.year').textContent = year;

$(function () {
	$(".modal_container").hide();
	$("#mod").on('click', function() {
		$(".modal_container").show();
	});
});
//js by pegaus for fixing accordion on recent_diarypost

const accordion = document.getElementsByClassName('notes');

for (i = 0; i < accordion.length; i++) {
	accordion[i].addEventListener('click', function () { this.classList.toggle('active') })
}
//js by pegasus for navbar fixing toggleButton
const toggleButton = document.getElementsByClassName('toggle-button')[0];
const pegas = document.getElementsByClassName('nav-bar-link')[0];
const pegay = document.getElementsByClassName('second-menu')[0];
toggleButton.addEventListener('click', () => { pegas.classList.toggle('active') });
toggleButton.addEventListener('click', () => { pegay.classList.toggle('active') });


// an other instance of the editor

ClassicEditor
	.create(document.querySelector('#update'), {
		toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
		heading: {
			options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
			]
		}
	})
	.catch(error => {
		console.error(error);
	});

ClassicEditor
	.create(document.querySelector('#amazing_text'), {
		toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
		heading: {
			options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
			]
		}
	})
	.catch(error => {
		console.error(error);
	});


