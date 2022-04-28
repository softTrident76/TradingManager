function addNew() {
	getObject("frm").action = "letter/edit";
	getObject("frm").submit();
}

function doDelete(event, type) {
	if( !confirm(getObject("msg_confirm_delete").value) ) {
		stopEvent(event);
		return false;
	}
}

function doViewInbox() {
	getObject("plis").value = 0;
	getObject("frm").action = getObject("baseurl").value+"letter";
	getObject("frm").submit();
}

function doViewSentbox() {
	getObject("plis").value = 1;
	getObject("frm").action = getObject("baseurl").value+"letter";
	getObject("frm").submit();
}

function doViewDraft() {
	getObject("plis").value = 2;
	getObject("frm").action = getObject("baseurl").value+"letter";
	getObject("frm").submit();
}

function doViewDetail(plis, id) {
    httpObj = createXMLHttpRequest(viewLetterInfo);
    var params = "plis="+getObject("plis").value+"&id="+id;
    if(httpObj) {
        httpObj.open("POST", "letter/info");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewLetterInfo() {
    if( httpObj.readyState == 4 && httpObj.status ) {
    	getObject("letter-info").innerHTML = httpObj.responseText;
    }
}