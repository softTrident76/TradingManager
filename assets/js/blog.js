function doSaveBlog(event) {
    if( !getObject("title").value && getObject("title").value == "" ) {
        alert("제목을 입력하시오.");
        getObject("title").focus();
        stopEvent(event);
        return false;
    }
    if( !getObject("desc").value && getObject("desc").value == "" ) {
        alert("설명문을 입력하시오.");
        getObject("desc").focus();
        stopEvent(event);
        return false;
    }
    return true;
    getObject("frm").submit();
}

var targets = null;
function doLikeBlog(id, tDiv) {
    targets = tDiv.childNodes.item(0);
    httpObj = createXMLHttpRequest(viewActionInResult);
    var params = "id="+id;
    if(httpObj) {
        httpObj.open("POST", "blog/like");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function doCommentBlog(id, tDiv) {
    targets = tDiv.childNodes.item(0);
    httpObj = createXMLHttpRequest(viewActionInResult);
    var params = "id="+id;
    if(httpObj) {
        httpObj.open("POST", "blog/comment");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function doReportBlog(id, tDiv) {
    targets = tDiv.childNodes.item(0);
    httpObj = createXMLHttpRequest(viewActionInResult);
    var params = "id="+id;
    if(httpObj) {
        httpObj.open("POST", "blog/report");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewActionInResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        targets.innerHTML = httpObj.responseText;
    }
}