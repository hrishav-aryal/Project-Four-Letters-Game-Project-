<?php

	session_start();
	
	$username = $_POST['postname'];
	$sc = $_POST['postscore'];
	$_SESSION['score'] = $sc;
	
	
	$loginFile = fopen("unpw.txt","r");
	$tempfile = fopen("unpw_temp.txt","w");
	ftruncate($tempfile,0);
	
	while(!feof($loginFile)){
		$line = fgets($loginFile);
		$words = explode(",",$line);
		
		while(!flock($tempfile, LOCK_EX)){sleep(0.5);}
		
		if($words[0] == $username){
			$content = $words[0].','.$words[1].','.$words[2].','. $sc .','.$words[4];
			
			if(flock($tempfile, LOCK_EX)){
				fwrite($tempfile,$content);
				flock($tempfile, LOCK_UN);
			}
			
		}else{
			
			if(flock($tempfile, LOCK_EX)){
				fwrite($tempfile,$line);
				flock($tempfile, LOCK_UN);
			}
		}
	}
	
	copy("unpw_temp.txt","unpw.txt");
	fclose($loginFile);
	fclose($tempfile);
	
?>