function translate_to_marshallese() {
	// get url into an array
	var url_parts = window.location.href.split('/');
	var newUrl = '';
    console.log(url_parts);
    
	if (url_parts.includes('mh')) {
		url_parts.splice(url_parts.length - 1, 1);		
	}
	
	// recombine the url 
	new_url = url_parts.join("/");
	// window.location.href = new_url;
}
