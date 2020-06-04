<?php

	session_start();
	$un = $_POST['postname1'];
	$x = 0;
	$_SESSION['score'] = 0;
	$_SESSION['gplayed'] = 0;
	
	$LF = fopen("unpw.txt","r")or die("can’t open file ".E_WARNING);
	$TF = fopen("unpw_temp.txt","w");
	ftruncate($TF,0);
	
	while(!flock($TF, LOCK_EX)){sleep(0.5);}
	
	while(!feof($LF)){
		$line = fgets($LF);
		$words = explode(",",$line);
		
		if($words[0] == $un){
			$con = $words[0].','.$words[1].','.$words[2].','.$x.','.$x;
			
			if(flock($TF, LOCK_EX)){
				fwrite($TF,$con."\n");
				flock($TF, LOCK_UN);
			}
			
			echo "<p id='statsp'>Name: <label id='statspin'>".$words[2]."</label></p>";
			echo "<p id='statsp'>Username: <label id='statspin'>".$words[0]."</label></p>";
			echo "<p id='statsp'>Best Score: <label id='statspin'>".$x."</label></p>";
			echo "<p id='statsp'>Games Played: <label id='statspin'>".$x."</label></p>";
			
		}else{
			
			if(flock($TF, LOCK_EX)){
				fwrite($TF,$line);
				flock($TF, LOCK_UN);
			}
		}
	}
	
	copy("unpw_temp.txt","unpw.txt");
	fclose($LF);
	fclose($TF);

?>