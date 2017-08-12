<!DOCTYPE html>
<?php
include('db.php');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="style.css" rel="stylesheet"/>
<script> 

function loadDoc() {
  var xhttp = new XMLHttpRequest();// this will a new Ajax req obj
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("chatting").innerHTML = this.responseText;//innerhtml is a js command which changes content of html page to the ajax content.
    }
  };
  xhttp.open("GET", "chat.php", true);
  xhttp.send();
}
//we crete a new JS function setInterval(); for displaying the chats in 2 browsers simultaneously. otherwise it will just update on 1 browser.
setInterval(function(){loadDoc();},1000); // this will refresh the page in 1sec but we wont feel like it got refreshed. NOTE: we have to refresh the new browser 1 time.

</script>
<title> ChatRoom </title>
</head>
<body onload="loadDoc();">
<div id="container">
<div id="chat_box">

<div id="chatting"></div> <!-- this is an empty tag.. as we move the contents which were here to chat.php .. Above in line14 we have defined this chatting element-->

</div>
<form method="post" action="index.php">
<input type="text" name="name" placeholder="enter name"/>
<textarea  name="textarea1" placeholder="enter your text"></textarea>
<input type="submit" name="submit" value="Send"/>
<?php
if(isset($_POST['submit'])){	

$uname=$_POST['name'];
$umsg=$_POST['textarea1'];                  

$query="INSERT INTO `chat` ( `name`, `message`) VALUES ( '".$uname."', '".$umsg."')";
$run=$connection->query($query);//PDO
if($run){
	echo "<embed loop='false' src='sound.wav' hidden='true' autoplay='true'/>";
}

}
?>
</div>
</body>
</html>