<?php 
?> 
<form method="POST" enctype="multipart/form-data" action="down.php">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
<?php 
$files=scandir("uploads");
for($a = 2 ; $a < count($files) ; $a++){
    ?>
    <a download="<?php echo $files[$a] ?>" href="uploads/<?php echo $files[$a] ?>" ><?php echo $files[$a] ?></a>
<?php } ?>