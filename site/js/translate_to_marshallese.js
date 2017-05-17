function translate_to_marshallese() {
    // get url into an array
    var url_parts = window.location.href.split("/");
    
    url_parts.forEach(function(element, i) {
        // if 'mh' not in url then add it to translate
        if (element != "mh") {
            if(element == "site") {
                // append '/mh'
                url_parts[i] = "site/mh";
            }
        } 
    });

    // recombine the url 
    new_url = url_parts.join("/");
    window.location.href = new_url;
}
