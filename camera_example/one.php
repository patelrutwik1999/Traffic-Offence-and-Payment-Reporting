<!DOCTYPE html>
<html>
<head>
	<title>Camera Access</title>
</head>
<body>
	
		<div class="video-wrap">
		<video controls="true" playsinline id="video1" autoplay="ture">
			No video support in browser...
		</video>
		</div>
	
	<div class="controller">
		<button id="snap">Capture</button>
	</div>

	<canvas id="canvas" width="640" height="480"></canvas>

	<script type="text/javascript">
		'use strict';
		const video = document.getElementById('video1');
		const canvas = document.getElementById('canvas');
		const snap = document.getElementById('snap');
		const errorMsgElement = document.getElementById('spanErrorMsg');

		const constraints = {
			audio: true,
			video{
				width:1280, height:720 
			}
		};

		async function init() {
			try	{
				const stream = await navigator.getUserMediaDevices.getUserMedia(constraints);
				handleSuccess(stream);
			}
			catch(e)
			{
				errorMsgElement.innerHTML = 'navigator.getUserMedia.error:${e.toString()}';
			}
		}


		function handleSuccess(stream) {
			window.stream = stream;
			video.srcObject = stream;
		}

		init();

		var context = canvas.getContext('2d');
		snap.addEventListener("click",function() {
			context.drawImage(video, 0, 0, 640, 480);
		});

		/* 
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
		if (navigator.getUserMedia) {
			navigator.getUserMedia({video:true}, handleVideo, videoError);
		}
		function handleVideo(stream) {
			document.querySelector('#video1').src = window.URL.createObjectURL(stream);
		}
		function videoError(e) {
			alert("There has Some Problem...");
		}*/
	</script>
</body>
</html>