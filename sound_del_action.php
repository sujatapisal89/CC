<body>
    <div><h1>Redirecting to index.php in <span id="time">00:00:10</span></h1></div>
	
	<script>
		function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);
		hours = parseInt(timer/3600,10);
		hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = hours + ":" + minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}
setTimeout(function () {
   window.location.href= 'index.php'; 

},10000);

window.onload = function () {
    var fiveMinutes = 10,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
	</script>
</body>

<?php
$dir = "upload/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
	chmod($dir,0777);
    while (($file = readdir($dh)) !== false){
		echo chmod($dir.$file,0777);
		echo unlink($dir.$file);
    }
    closedir($dh);
  }
}
?>