// navigator.getUserMedia({video: true, audio: true}, function(stream) {
// 	getObject("yourVideo").srcObject = stream
// 	getObject("yourVideo").play()

//     socket.emit('videochat', {
//         id: getObject("userid").value,
//         stream: stream
//     })

// }, function(err) {
// 	console.error(err)
// })


// socket.on('videochat', function(data) {
// 	getObject("otherVideo").srcObject = data.stream
// 	getObject("otherVideo").play()
// });

var constraints = { audio: true, video: { width: 500, height: 400 } }; 

if (navigator.mediaDevices === undefined) {
	navigator.mediaDevices = {};
}

if (navigator.mediaDevices.getUserMedia === undefined) {
	navigator.mediaDevices.getUserMedia = function(constraints) {

    // First get ahold of the legacy getUserMedia, if present
    var getUserMedia = ( navigator.getUserMedia ||
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

    // Some browsers just don't implement it - return a rejected promise with an error
    // to keep a consistent interface
    if (!getUserMedia) {
		return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
    }

    // Otherwise, wrap the call to the old navigator.getUserMedia with a Promise
    return new Promise(function(resolve, reject) {
		getUserMedia.call(navigator, constraints, resolve, reject);
    });
  }
}

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
	var video = getObject("yourVideo")
	video.srcObject = mediaStream
	video.onloadedmetadata = function(e) {
		video.play();

	    socket.emit('videochat', {
	        id: getObject("userid").value,
	        stream: mediaStream
	    })
	};
})
.catch(function(err) { console.log(err.name + ": " + err.message); });