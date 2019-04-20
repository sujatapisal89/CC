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
	
    if ((($_FILES["file"]["type"] == "audio/mp3")
    || ($_FILES["file"]["type"] == "audio/mp4")
    || ($_FILES["file"]["type"] == "audio/wav"))
    && ($_FILES["file"]["size"] < 1000000000))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

            if (file_exists("upload/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " already exists. ";
            }
			else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
        }
    }
    else
    {
        echo "Invalid file";
    }
?>