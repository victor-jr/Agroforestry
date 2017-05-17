function translate_to_english() {
    // get url into an array
    var url_parts = window.location.href.split("/");
    
    url_parts.forEach(function(element, i) {
        // if 'mh' in url then remove it to translate
        if (element == "mh") {
            url_parts.splice(i,1);
        } 
    });

    // recombine the url 
    new_url = url_parts.join("/");
    window.location.href = new_url;
}
