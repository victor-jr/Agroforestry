function translate_to_marshallese() {
	// get url into an array
	var url_parts = window.location.href.split('/');
	var newUrl = '';
	
	if (url_parts.indexOf('mh') == -1) {
		url_parts.splice(url_parts.length - 1, 0, 'mh');		
	}
	
	// recombine the url 
	new_url = url_parts.join("/");
	window.location.href = new_url;
}
