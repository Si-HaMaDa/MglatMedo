document.getElementsByTagName('select')[0].addEventListener('change', function(){
	if (document.getElementById('cats').querySelector('input[type="checkbox"]:disabled') != null) {
		document.getElementById('cats').querySelector('input[type="checkbox"]:disabled').disabled = false;
	}
	var jkjk = document.getElementsByTagName('select')[0].querySelector('option:checked').value;
	document.getElementById('cats').querySelector('input[type="checkbox"][value="'+jkjk+'"]').disabled =true;
	document.getElementById('cats').querySelector('input[type="checkbox"][value="'+jkjk+'"]').checked =false;
})