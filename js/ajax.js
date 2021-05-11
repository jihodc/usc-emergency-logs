function ajaxGet(endpointUrl, returnFunction){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endpointUrl, true);
    xhr.onreadystatechange = function(){
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                // When ajax call is complete, call this function, pass a string with the response
                returnFunction( xhr.responseText );
            } else {
                alert('AJAX Error.');
                console.log(xhr.status);
            }
        }
    }
    xhr.send();
};

// post requests need a little more info than a get request
function ajaxPost(endpointUrl, postData, returnFunction){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', endpointUrl, true);
    // POST requests need extra header information
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function(){
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                returnFunction( xhr.responseText );
            } else {
                alert('AJAX Error.');
                console.log(xhr.status);
            }
        }
    }
    xhr.send(postdata);
};