//socket setup
var	socket = io.connect('http://'+window.location.hostname+':3000');
socket.emit('join', {
    userid: document.getElementById("userid").value
});

//message_communication
socket.on('msg_send', function(data) {
    var unread_span = getObject("unread-message");
    if( !getObject("chat-content") || getObject("chat-content") == null ) {
        if(data.recieverid == getObject("userid").value || getObject("groupid").value.indexOf(data.recieverid+',') > -1) {
            unread_span.innerHTML = (unread_span.innerHTML == "") ? "1" : parseInt(unread_span.innerHTML) + 1;

            notif({
                msg: "<div style=\"width: 100%; height: auto; padding: 0 10px 0 10px;\">" +
                        "<table>" +
                            "<tr>" + 
                                "<td rowspan=\"2\">" +
                                    "<img src=\""+data.imgpath+"\" style=\"width: 50px; height: 50px;\" />"+
                                "</td>" +
                                "<td style=\"padding-left: 10px;\">" + data.sendername + "</td>" +
                            "</tr>" +
                            "<tr>" +
                                "<td style=\"padding-left: 10px;\">" + data.message+"</td>" +
                            "</tr>" +
                        "</table>" +
                    "</div>",
                type: "success",
                bgcolor: "#000000",
                color: "#FFFFFF",
                position: "right",
                width: 300,
                opacity: 0.98,
                multiline: true
            });
        }
    }
    else {
        var userDiv = getObject("user-list");
        if( (data.group > 0 && (data.senderid == getObject("userid").value || data.recieverid == getObject("id").value) ) || data.senderid == getObject("id").value || data.recieverid == getObject("id").value ) {
            getObject("chat-content").innerHTML +=
                "<div class=\"col-lg-12 chat-content-row\">"+
                    "<span style=\"position: absolute; margin-top: 5px;\">"+((data.senderid==getObject("userid").value) ? "" : "<img class=\"img-circle\" src=\""+getObject("imgpath").value+"\" style=\"width: 30px; height: 30px;\" />")+"</span>"+
                    "<span style=\"position: absolute; color: #aaaaaa; "+((data.senderid==getObject("userid").value) ? "right: 0;" : "left: 40px;")+"\">"+((data.senderid==getObject("userid").value) ? "" : data.sendername+", ")+getCurrentChatTime()+"</span>"+
                    "<span class=\""+((data.senderid==getObject("userid").value) ? "chat-content-mine" : "chat-content-other")+"\">"+
                        "<span>"+data.message+"</span>"+
                    "</span>"+
                "</div>";
        }
        if( userDiv.childNodes.length > 1 ) {
            for( var i = 1; i < userDiv.childNodes.length; i+=2 ) {
                var row = userDiv.childNodes.item(i);
                var time_span = row.childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(4);
                var message_span = row.childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(7);
                var badge_span = row.childNodes.item(1).childNodes.item(1).childNodes.item(1).childNodes.item(8);
                var senderId = ( data.group > 0 ) ? "group-"+data.senderid : "user-"+data.senderid;
                var recieverId = ( data.group > 0 ) ? "group-"+data.recieverid : "user-"+data.recieverid;
                if( senderId == row.id || recieverId == row.id ) {
                    isExist = true;
                    message_span.innerHTML = truncate(data.message, 15);
                    message_span.title = data.message;
                    time_span.innerHTML = getCurrentChatTime();
                    if( (data.group == 0 && data.recieverid == getObject("userid").value && data.senderid != getObject("id").value) || (data.group > 0 && data.recieverid != getObject("id").value) ) {    //unread message
                        badge_span.innerHTML = (badge_span.innerHTML == "") ? "1" : parseInt(badge_span.innerHTML) + 1;
                        unread_span.innerHTML = (unread_span.innerHTML == "") ? "1" : parseInt(unread_span.innerHTML) + 1;
                    }
                    break;
                }
            }
        }
        if( (data.recieverid == getObject("userid").value && data.senderid == getObject("id").value) || (data.group > 0 && data.recieverid == getObject("id").value) ) {
            httpObj = createXMLHttpRequest(viewMsgUpdateResult);
            var params = "senderid="+data.senderid+"&recieverid="+data.recieverid+"&message="+data.message+"&group="+data.group;
            if(httpObj) {
                httpObj.open("POST", "chat/update");
                httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                httpObj.send(params);
            }
        }
        getObject("chat-content").scrollTop = 10000;
        getObject("typing-info").className = "hide";
    }
});

function viewMsgUpdateResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
    }
}

function joinChat(userid) {
    socket.emit('active', {
        userid: userid
    });
    location.href = getObject("baseurl").value+"chat";
}

function awayChat(url, userid) {
    socket.emit('away', {
        userid: userid
    });
    location.href = getObject("baseurl").value+url;
}

socket.on('request', function(data) {
    httpObj = createXMLHttpRequest(viewUpdateContactResult);
    var params = "id="+data.senderid+"&group=0";
    if(httpObj) {
        httpObj.open("POST", "chat/newContact");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
});

function viewUpdateContactResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( getObject("user-list") != null ) {
            var userDiv = getObject("user-list");
            userDiv.innerHTML = httpObj.responseText;
        }
        var unread_span = getObject("unread-message");
        unread_span.innerHTML = (unread_span.innerHTML == "") ? "1" : parseInt(unread_span.innerHTML) + 1;
    }
}

function doViewMessage(obj) {
    if( obj.childNodes.item(3).innerHTML != "" ) {
        socket.emit('active', {
            userid: getObject("userid").value
        });
        location.href = getObject("baseurl").value+"chat";
    }
}

function doSignOut(userid) {
    socket.emit('leave', {
        userid: userid
    });
    location.href = getObject("baseurl").value+"signin/signout";
}
// Put variables in global scope to make them available to the browser console.
const constraints = window.constraints = {
  audio: false,
  video: true
};

socket.on('video-request', function(data) {
    if( data.recieverid == getObject("userid").value ) {
        getObject("videoResponseDiv").className = "show";
        getObject("sender-photo").src = 'http://'+window.location.hostname+data.imgpath;
        getObject("sender").innerHTML = data.sendername;
        getObject("videoSenderId").value = data.senderid;
    }
});

function doAcceptVideoCall() {
    socket.emit('video-response', {
        senderid: getObject("userid").value,
        recieverid: getObject("videoSenderId").value,
        result: 1
    });
    // getObject("videoResponseDiv").innerHTML = "<video style=\"width: 200px;\" id=\"myReqVideo\" autoplay playsinline></video>";
    try {
        const stream = navigator.mediaDevices.getUserMedia(constraints);
        getObject("myReqVideo").srcObject = stream;
        socket.emit('video-send', {
            senderid: getObject("userid").value,
            sendername: getObject("useridt").value,
            recieverid: getObject("videoSenderId").value,
            stream: stream
        });
    } catch (e) {
        console.log("error");
    }
}

function doRejectVideoCall() {
    socket.emit('video-response', {
        senderid: getObject("userid").value,
        recieverid: getObject("videoSenderId").value,
        result: -1
    });
}