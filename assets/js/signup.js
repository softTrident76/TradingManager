function doChangeMembership(chkObj) {
    if( chkObj.checked )
        chkObj.value = 1;
    else
        chkObj.value = 0;
}

function onSignUp() {
    if( getObject("password").value != getObject("confirm").value ) {
        getObject("missPass").className = "";
        return false;
    }
    if( getObject("email").value.indexOf("@") < 1 || getObject("email").value.indexOf("@") == getObject("email").value.length - 1 ||
        getObject("email").value.indexOf(".") < 0 || getObject("email").value.lastIndexOf(".") < getObject("email").value.indexOf("@") ) {
        getObject("missEmail").className = "";
        getObject("email").select();
        return false;
    }
    getObject("frm").submit();
}

function doSendSmsCode() {
    if( !getObject("phone").value || getObject("phone").value == "" )
        return false;
    httpObj = createXMLHttpRequest(viewSendCodeResult);
    var params = "phone="+getObject("phone").value;
    if(httpObj) {
        httpObj.open("POST", "signup/sendCode");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewSendCodeResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        getObject("codeResult").innerHTML = httpObj.responseText;
    }
}

function onSelectUserImage(imgObj) {
    var file = getObject("upload").files[0];
    var reader = new FileReader();
    reader.onloadend = function(){
        imgObj.parentNode.style.backgroundImage = "url(" + reader.result + ")";        
    }
    if(file){
        reader.readAsDataURL(file);
    }else{
    }
}