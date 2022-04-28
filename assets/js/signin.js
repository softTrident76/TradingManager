function doSignIn() {

	username = getObject("username");
	if( username == null || username == "") {
		$('#username').focus();
		return;
	}

	password = getObject("password");
	if( password == null || password == "") {
		$('#password').focus();
		return;
	}
		
	httpObj = createXMLHttpRequest(viewSignInResult);
    var params = "username="+getObject("username").value+"&password="+getObject("password").value+"&lang="+getObject("lang").value;
    if(httpObj) {
        httpObj.open("POST", "/index.php/signin/submit");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		httpObj.send(params);
    }
}

function viewSignInResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( httpObj.responseText == "success" ) {
			location.href = "/index.php/home";			
        } else
			getObject("invalid").childNodes.item(0).innerHTML = httpObj.responseText;
    }
}

function doFocusPassword(event) {
    if( event.keyCode == 13 )
        getObject("password").select();
}

function doReadySignIn(event) {
    if( event.keyCode == 13 )
        doSignIn();
}
