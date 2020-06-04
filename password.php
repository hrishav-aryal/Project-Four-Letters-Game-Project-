<?php

	session_start();
	$g = $_POST['gamesp'];
	$username = $_POST['postname'];
	$_SESSION['gplayed'] = $g;
	
	$loginFile = fopen("unpw.txt","r");
	$tempfile = fopen("unpw_temp.txt","w") or die('cant open');
	ftruncate($tempfile,0);
	
	
	$fp = fopen("check.txt", 'r+');
	
	while(!feof($loginFile)){
		$line = fgets($loginFile);
		$words = explode(",",$line);
		
		if($words[0] == $username){
			$con = $words[0].','.$words[1].','.$words[2].','.$words[3].','.$g;
			fwrite($tempfile,$con."\n");
			
		}else{
			fwrite($tempfile,$line);
		}
	}
	
	copy("unpw_temp.txt","unpw.txt");
	fclose($loginFile);
	fclose($tempfile);
	
?>