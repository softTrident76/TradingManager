function doSelectUser(obj, group) {
    var contentDiv = obj.parentNode.parentNode.parentNode;
    for( var i = 1; i < contentDiv.childNodes.length; i+=2 )
        contentDiv.childNodes.item(i).childNodes.item(1).className = "chat-user-item";
    obj.parentNode.className = "chat-user-item active";
    getObject("user-info").innerHTML = obj.childNodes.item(1).childNodes.item(3).childNodes.item(1).value;
    getObject("id").value = obj.childNodes.item(1).childNodes.item(3).childNodes.item(2).value;
    getObject("name").value = obj.childNodes.item(1).childNodes.item(3).childNodes.item(1).value;
    getObject("group").value = group;
    getObject("imgpath").value = obj.childNodes.item(1).childNodes.item(1).childNodes.item(1).src;
    var unread_msg = parseInt(getObject("unread-message").innerHTML)-parseInt(obj.childNodes.item(1).childNodes.item(8).innerHTML);
    getObject("unread-message").innerHTML = (unread_msg > 0 ) ? unread_msg : "";
    obj.childNodes.item(1).childNodes.item(8).innerHTML = "";

    if( group == 0 ) {
        var accepted = obj.childNodes.item(1).childNodes.item(12).value;
        if( accepted == 0 ) {
            var sayDiv = document.createElement("div");
            sayDiv.className = "say-hi-div";
            var hiImag = document.createElement("div");
            hiImag.className = "say-hi-emoticon";
            sayDiv.appendChild(hiImag);
            var btnDiv = document.createElement("div");
            btnDiv.className = "say-hi-button-div";
            var btnObj = document.createElement("button");
            btnObj.className = "btn blue mt-ladda-btn ladda-button btn-circle";
            btnObj.innerHTML = getObject("sayhi").value;
            addEventHandler(btnObj, 'click', function(event) {

                socket.emit('request', {
                    senderid: getObject("userid").value,
                    recieverid: getObject("id").value
                });
            });
            btnDiv.appendChild(btnObj);
            sayDiv.appendChild(btnDiv);
            getObject("chat-content").innerHTML = "";
            getObject("chat-content").appendChild(sayDiv);
            getObject("chat-inbox").className = "hide";
        } else if( accepted == 1 ) {
            httpObj = createXMLHttpRequest(viewAcceptInfo);
            var params = "id="+getObject("id").value+"&group="+group;
            if(httpObj) {
                httpObj.open("POST", "chat/getInfo");
                httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                httpObj.send(params);
            }
        } else {
            httpObj = createXMLHttpRequest(viewSelectedChatInfo);
            var params = "id="+getObject("id").value+"&group="+group;
            if(httpObj) {
                httpObj.open("POST", "chat/getInfo");
                httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                httpObj.send(params);
            }
        }
    } else {
        httpObj = createXMLHttpRequest(viewSelectedChatInfo);
        var params = "id="+getObject("id").value+"&group="+group;
        if(httpObj) {
            httpObj.open("POST", "chat/getInfo");
            httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpObj.send(params);
        }
    }
}

function viewAcceptInfo() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        var accceptDiv = document.createElement("div");
        accceptDiv.className = "accept-div";
        var rowDiv = document.createElement("div");
        rowDiv.className = "row";
        var col1Div = document.createElement("div");
        col1Div.className = "col-lg-6";
        var col2Div = document.createElement("div");
        col2Div.className = "col-lg-6";
        var acceptBtn = document.createElement("button");
        acceptBtn.className = "btn blue mt-ladda-btn ladda-button btn-circle";
        acceptBtn.innerHTML = getObject("accept").value;
        var blockBtn = document.createElement("button");
        blockBtn.className = "btn red mt-ladda-btn ladda-button btn-circle";
        blockBtn.innerHTML = getObject("block").value;
        col1Div.appendChild(acceptBtn);
        col2Div.appendChild(blockBtn);
        rowDiv.appendChild(col1Div);
        rowDiv.appendChild(col2Div);
        accceptDiv.appendChild(rowDiv);
        getObject("chat-content").innerHTML = "";
        getObject("chat-content").appendChild(accceptDiv);
        getObject("chat-inbox").className = "hide";
        addEventHandler(acceptBtn, 'click', function(event) {
            socket.emit('response', {
                senderid: getObject("userid").value,
                recieverid: getObject("id").value,
                result: 1
            });
            getObject("chat-content").removeChild(accceptDiv);
            getObject("chat-inbox").className = "show";
        });
    }
}

function viewSelectedChatInfo() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( getObject("delete").value == 0 ) {
            getObject("chat-content").innerHTML = httpObj.responseText;
            getObject("chat-content").scrollTop = 10000;
        }
        else
            location.href = "chat";
    }
}

function doSelectUserFromSearch(obj, group) {
    var contentDiv = obj.parentNode.parentNode.parentNode;
    for( var i = 1; i < contentDiv.childNodes.length; i+=2 )
        contentDiv.childNodes.item(i).childNodes.item(1).className = "chat-user-item";
    obj.parentNode.className = "chat-user-item active";
    getObject("user-info").innerHTML = obj.childNodes.item(1).childNodes.item(3).childNodes.item(1).value;
    getObject("id").value = obj.childNodes.item(1).childNodes.item(3).childNodes.item(2).value;
    getObject("group").value = group;
    getObject("imgpath").value = obj.childNodes.item(1).childNodes.item(1).childNodes.item(1).src;
    // var unread_msg = parseInt(getObject("unread-message").innerHTML)-parseInt(obj.childNodes.item(1).childNodes.item(8).innerHTML);
    // getObject("unread-message").innerHTML = (unread_msg > 0 ) ? unread_msg : "";
    // obj.childNodes.item(1).childNodes.item(8).innerHTML = "";

    httpObj = createXMLHttpRequest(viewContactResult);
    var params = "id="+getObject("id").value+"&group="+group;
    if(httpObj) {
        httpObj.open("POST", "chat/contactInfo");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewContactResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( parseInt(httpObj.responseText) != 0 ) {
            getObject("chat-content").innerHTML = "";
            getObject("chat-content").innerHTML = httpObj.responseText;
            getObject("chat-content").scrollTop = 10000;
        } else {
            var sayDiv = document.createElement("div");
            sayDiv.className = "say-hi-div";
            var hiImag = document.createElement("div");
            hiImag.className = "say-hi-emoticon";
            sayDiv.appendChild(hiImag);
            var btnDiv = document.createElement("div");
            btnDiv.className = "say-hi-button-div";
            var btnObj = document.createElement("button");
            btnObj.className = "btn blue mt-ladda-btn ladda-button btn-circle";
            btnObj.innerHTML = getObject("sayhi").value;
            addEventHandler(btnObj, 'click', function(event) {
                alert("add");
                httpObj = createXMLHttpRequest(viewAddContactResult);
                var params = "id="+getObject("id").value+"&group="+getObject("group").value;
                if(httpObj) {
                    httpObj.open("POST", "chat/addContact");
                    httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    httpObj.send(params);
                }
                socket.emit('request', {
                    senderid: getObject("userid").value,
                    recieverid: getObject("id").value
                });
            });
            btnDiv.appendChild(btnObj);
            sayDiv.appendChild(btnDiv);
            getObject("chat-content").innerHTML = "";
            getObject("chat-content").appendChild(sayDiv);
            getObject("chat-inbox").className = "hide";
        }
    }
}

function viewAddContactResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
    }
}

function doViewDetailSearch() {
    getObject("searchDiv").innerHTML =
        "<div class=\"input-icon right\">"+
            "<i class=\"fa fa-remove\" style=\"cursor: pointer;\" onclick=\"javascript:doViewNormalSearch();\"></i>"+
            "<input type=\"text\" class=\"form-control input-circle\" id=\"search\" onkeypress=\"javascript:doSearchPeople(event, this);\" placeholder=\""+getObject("msgSearch").value+"\">"+
        "</div>";
    getObject("search").focus();
}

function doViewNormalSearch() {
    if( getObject("search").value != "" ) {
        httpObj = createXMLHttpRequest(viewPeopleResult);
        var params = "id="+getObject("id").value;
        if(httpObj) {
            httpObj.open("POST", "chat/search");
            httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpObj.send(params);
        }
    }
    getObject("searchDiv").innerHTML =
        "<div class=\"input-icon\">"+
            "<i class=\"fa fa-search\"></i>"+
            "<input type=\"text\" class=\"form-control input-circle\" onclick=\"javascript:doViewDetailSearch();\" placeholder=\""+getObject("msgSearch").value+"\">"+
        "</div>";
}

function doSearchPeople(evt, txtObj) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if( charCode == 13 && txtObj.value != "" ) {
        httpObj = createXMLHttpRequest(viewPeopleResult);
        var params = "searchValue="+txtObj.value+"&ownid="+getObject("userid").value;
        if(httpObj) {
            httpObj.open("POST", "chat/search");
            httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpObj.send(params);
        }
    }
}

function viewPeopleResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        getObject("user-list").innerHTML = httpObj.responseText;
    }
}

function sendMessage(evt, txtObj) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if( charCode == 13 && getObject("id").value != "" ) {
        httpObj = createXMLHttpRequest(viewMsgSendResult);
        var params = "id="+getObject("id").value+"&message="+txtObj.value+"&group="+getObject("group").value;
        txtObj.value = "";
        if(httpObj) {
            httpObj.open("POST", "chat/send");
            httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpObj.send(params);
        }
    } else if(getObject("id").value != "") {
        socket.emit('typing', {
            senderid: getObject("userid").value,
            recieverid: getObject("id").value
        });
    }
}

function viewMsgSendResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        var jsonData = JSON.parse(httpObj.responseText);
        socket.emit('msg_send', {
            senderid: jsonData.senderid,
            sendername: jsonData.sendername,
            recieverid: jsonData.recieverid,
            group: jsonData.group,
            userids: jsonData.userids,
            message: jsonData.message,
            imgpath: getObject("imgpath").value
        });
    }
}

function doViewGroupEdit() {
    getObject("bgDiv").className = "show";
    getObject("group-content").className = "group-edit show";
}

function doCloseGroupEdit() {
    getObject("upload").parentNode.style.backgroundImage = "url('')";
    getObject("groupName").value = "";
    getObject("bgDiv").className = "hide";
    getObject("group-content").className = "group-edit hide";
    getObject("sel-users").innerHTML = "";
    for( var i = 0; i < document.getElementsByName("chkUsers").length; i++ )
        document.getElementsByName("chkUsers")[i].checked = false;
}

function doSelectUserToGroup(chkObj) {
    if( chkObj.checked ) {
        var divTag = document.createElement("div");
        divTag.id = "group-user-"+chkObj.parentNode.parentNode.previousSibling.previousSibling.childNodes.item(2).value;
        divTag.className = "group-user-img";
        var imgTag = document.createElement("img");
        imgTag.className = "img-circle";
        imgTag.width = 50;
        imgTag.height = 50;
        imgTag.src = chkObj.nextSibling.nextSibling.childNodes.item(0).value;
        divTag.appendChild(imgTag);
        var spanTag = document.createElement("span");
        spanTag.className = "group-user-span";
        spanTag.innerHTML = chkObj.parentNode.parentNode.previousSibling.previousSibling.childNodes.item(1).value;
        divTag.appendChild(spanTag);
        getObject("sel-users").appendChild(divTag);
    } else {
        var target = getObject("group-user-"+chkObj.parentNode.parentNode.previousSibling.previousSibling.childNodes.item(2).value);
        getObject("sel-users").removeChild(target);
    }
}

function doSaveGroupInfo(event) {
    if( getObject("groupName").value == "" || !getObject("groupName").value ) {
        alert(getObject("msg_input_groupname").value);
        getObject("groupName").focus();
        stopEvent(event);
        return false;
    }
    if( getObject("sel-users").innerHTML == "" ) {
        alert(getObject("msg_select_user").value);
        stopEvent(event);
        return false;
    }
    var userids = getObject("userid").value + ',';
    for( var i = 0; i < document.getElementsByName("chkUsers").length; i++ ) {
        if( document.getElementsByName("chkUsers")[i].checked ) {
            userids += document.getElementsByName("chkUsers")[i].value + ',';
        }
    }
    httpObj = createXMLHttpRequest(viewGroupResult);
    var image_file = getObject("upload").files[0];

    var formData = new FormData();
    formData.append("name", getObject("groupName").value);
    formData.append("upload", image_file);
    formData.append("userids", userids.substring(0, userids.length-1));
    if(httpObj) {
        httpObj.open("POST", "chat/group");
        httpObj.send(formData);
    }
}

function viewGroupResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        getObject("upload").parentNode.style.backgroundImage = "url('')";
        getObject("sel-users").innerHTML = "";
        getObject("groupName").value = "";
        getObject("bgDiv").className = "hide";
        getObject("group-content").className = "group-edit hide";
        var datas = httpObj.responseText.split("!@#");
        getObject("groupid").value += datas[0]+',';
        socket.emit('group', {
            userids: datas[1]
        });
    }
}

function onChangeGroupImage(imgObj) {
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

function onHoverUser(obj, group) {
    obj.childNodes.item(1).childNodes.item(10).childNodes.item(0).className = "chat-delete-btn";
}

function onHouterUser(obj, group) {
    obj.childNodes.item(1).childNodes.item(10).childNodes.item(0).className = "hide";
}

function doDeleteUser(obj, event, id, group) {
    if( obj.className != "hide" ) {
        if( !confirm(getObject("msg_confirm_delete").value) ) {
            stopEvent(event);
            return false;
        } else {
            getObject("delete").value = 1;
            httpObj = createXMLHttpRequest(viewDeleteResult);
            var params = "dataId="+id+"&group="+group;
            if(httpObj) {
                httpObj.open("POST", "chat/delete");
                httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                httpObj.send(params);
            }
        }
    }
}

function viewDeleteResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        getObject("chat-content").innerHTML = "";
        location.href = "chat";
    }
}

function viewAcceptResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        var userDiv = getObject("user-list");
        if( userDiv.childNodes.length > 1 ) {
            for( var i = 1; i < userDiv.childNodes.length; i+=2 ) {
                var row = userDiv.childNodes.item(i);
                if( row.id == "user-"+getObject("id").value ) {
                    getObject("chat-content").innerHTML = "";
                    getObject("chat-inbox").className = "show";
                    getObject("message-input").focus();
                    break;
                }
            }
        }
        userDiv.innerHTML = httpObj.responseText;
        if( getObject("group").value == 0 )
            getObject("user-"+getObject("id").value).childNodes.item(1).className = "chat-user-item active";
        else
            getObject("group-"+getObject("id").value).childNodes.item(1).className = "chat-user-item active";
    }
}

function doVideoCall(event) {
    if( !getObject("id").value || getObject("id").value == "" ) {
        alert("Select user");
        stopEvent(event);
        return false;
    }
    getObject("chat-content").className = "chat-panel-content hide";
    getObject("chat-video-content").className = "videoCallDiv show";
    showVideo(event);
}

function handleSuccess(stream) {
    const myVideo = getObject('myVideo');
    const otherVideo = getObject('otherVideo');
    const videoTracks = stream.getVideoTracks();
    // console.log('Got stream with constraints:', constraints);
    // console.log(`Using video device: ${videoTracks[0].label}`);
    // window.stream = stream; // make variable available to browser console
    myVideo.srcObject = stream;
    // otherVideo.srcObject = stream;

    var imagepath = getObject("my-photo").src;
    imagepath = replaceAll(imagepath, 'http://'+window.location.hostname, '');
    socket.emit('video-request', {
        senderid: getObject("userid").value,
        sendername: getObject("useridt").value,
        recieverid: getObject("id").value,
        imgpath: imagepath
    });
}

function handleError(error) {
    if (error.name === 'ConstraintNotSatisfiedError') {
        let v = constraints.video;
        errorMsg(`The resolution ${v.width.exact}x${v.height.exact} px is not supported by your device.`);
    } else if (error.name === 'PermissionDeniedError') {
        errorMsg('Permissions have not been granted to use your camera and ' +
                  'microphone, you need to allow the page access to your devices in ' +
                  'order for the demo to work.');
    }
    errorMsg(`getUserMedia error: ${error.name}`, error);
}

function errorMsg(msg, error) {
    // const errorElement = document.querySelector('#errorMsg');
    // errorElement.innerHTML += `<p>${msg}</p>`;
    if (typeof error !== 'undefined') {
        console.log(error);
    }
}

async function showVideo(e) {
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
        e.target.disabled = true;
    } catch (e) {
        handleError(e);
    }
}

function doAudioCall() {
    getObject("chat-content").className = "chat-panel-content hide";
    getObject("chat-video-content").className = "videoCallDiv show";
}

socket.on('active', function(data) {
    var userlist = getObject("user-list");
    for( var i = 1; i < userlist.childNodes.length; i+=2 ) {
        if( userlist.childNodes.item(i).id == "user-"+data.userid ) {
            userlist.childNodes.item(i).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(3).className = "chat-user-active";
            break;
        }
    }
    getObject("typing-info").className = "hide";
});

socket.on('away', function(data) {
    var userlist = getObject("user-list");
    for( var i = 1; i < userlist.childNodes.length; i+=2 ) {
        if( userlist.childNodes.item(i).id == "user-"+data.userid ) {
            userlist.childNodes.item(i).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(3).className = "chat-user-away";
            break;
        }
    }
    getObject("typing-info").className = "hide";
});

socket.on('typing', function(data) {
    if( data.senderid == getObject("id").value && data.recieverid == getObject("userid").value ) {
        getObject("sendername").innerHTML = getObject("name").value;
        getObject("typing-info").className = "show";
    }
});

socket.on('group', function(data) {
    getObject("groupid").value += data.recieverid+',';
    getObject("typing-info").className = "hide";
    doViewNormalSearch();
});

socket.on('response', function(data) {
    if( data.result == 1 ) {
        getObject("typing-info").className = "hide";
        httpObj = createXMLHttpRequest(viewAcceptResult);
        var params = "senderid="+data.senderid+"&recieverid="+data.recieverid;
        if(httpObj) {
            httpObj.open("POST", "chat/accept");
            httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpObj.send(params);
        }
    }
});

socket.on('leave', function(data) {
    var userlist = getObject("user-list");
    for( var i = 1; i < userlist.childNodes.length; i+=2 ) {
        if( userlist.childNodes.item(i).id == "user-"+data.userid ) {
            userlist.childNodes.item(i).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(3).className = "";
            break;
        }
    }
    getObject("typing-info").className = "hide";
});

socket.on('video-response', function(data) {
    if( data.result == 1 ) {
    }
});

socket.on('video-send', function(data) {
    getObject("otherVideo").srcObject = data.stream;
});
