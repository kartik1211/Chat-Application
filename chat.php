<?php
include('db.php');
$query="SELECT * FROM `chat` ORDER BY id";
$run=$connection->query($query);
while($row=$run->fetch_array()){

?>
<div id="chatdata">
<span style="color:green"><?php echo $row['name']; ?> </span>:
<span style="color:red"><?php echo $row['message']; ?></span>
<span style="float:right; color:blue "><?php echo formatDate( $row['date']); ?></span>

</div>
<?php } ?>