<?php
	require "auth.php";
	$secrettoken = $_POST["secrettoken"];
	//echo "debug>\$secrettoken = $secrettoken <br>\$_SESSION["nocsrftoken"]= ". $_SESSION["nocsrftoken"];
	if(!isset($secrettoken) or ($secrettoken != $_SESSION["nocsrftoken"])){
	echo "Cross site forging detected!!";
	die();
	}
	function addpost($postid,$title,$content,$time,$username){

		/*$postid = mysql_real_escape_string($postid);
		$title = mysql_real_escape_string($title);
		$content = mysql_real_escape_string($content);
		$time = mysql_real_escape_string($time);
		$username = mysql_real_escape_string($username);*/
		
		$sql = "INSERT INTO posts VALUES('$postid','$title','$content','$time','$username');";
		echo "sql=$sql";
		global $mysqli;
		$result = $mysqli->query($sql);
		if($result==TRUE){
		echo "new post has been posted";
		}else{
		echo "error adding post :". $mysqli->error;    
    		}
	}

	$postid = $_REQUEST["Postid"];
	$title = $_REQUEST["Post_title"];
	$content = $_REQUEST["Post_content"];
	$time = $_REQUEST["Time"];
	$username = $_REQUEST["Username"];
	//echo "debug> username=$username;<br>";
	
	if(isset($postid) and isset($title) and isset($content) and isset($time) and isset($username)){
		addpost($postid,$title,$content,$time,$username);
    	}
?>
