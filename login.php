<?php
	session_start();
	$_SESSION = array();
	session_destroy();
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="fourstyles.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		
		<?php
			session_start();
			$loginFile = fopen("unpw.txt","r");
			
			if(isset($_POST['login'])){
				$username = $_POST['un'];
				$password = $_POST['pw'];
				
				if($username != "" && $password != ""){
					
					while(!feof($loginFile)){
						$line = fgets($loginFile);
						$words = explode(",",$line);
						
						if($username == $words[0] && $password == $words[1]){
							
							$_SESSION['fname'] = $words[2];
							$_SESSION['score'] = $words[3];
							$_SESSION['gplayed'] = $words[4];
							$_SESSION['uname'] = $words[0];
							header("location: fourhome.php");
							
							break;
						}else{
							$_SESSION['error'] = '<p id="error">Inavlid Username or Password!</p>';
						}
					}
					
				}else{
					$_SESSION['error'] = '<p id="error">Fields cannot be empty!</p>';
				}
			}
			
			fclose($loginFile);
		?>
		
	</head>
	
	<body>
		
		<div id='bg'>
		
			<div class= "Loginbox">
				<button class ="picture"></button>
				<h2 id='h1'> Login </h2>
				
				
				<form class="checking" action="login.php" method="post">
				
					<div class="container">
						<p id='p1'>Username</p>
						<input id="i1" type='text' name='un' placeholder="Enter Username" value="">
						<p id='p1'>Password</p>
						<input id="i1" type='password' name='pw' placeholder="Enter Password" value="">
						
						<?php 
						
							if(isset($_SESSION['error'])) {
								echo $_SESSION['error'];
								unset($_SESSION["error"]);
							}
							
						?>
						
						<button id="loginb" type="submit" name="login">Login</button><br><br>
						<p id='a' onclick="changePage()">Don't have an account? Sign Up!</p>
					</div>
					
				</form>
				
				<button id='ins' onclick="instruc()">Instructions</button>	
					
			</div>
			
			
		
		</div>
		
		<div id='instruction'>
			
			<button id='close' onclick="instruc()"></button>
			
			<h3 id='inshead1'>(Great experience if played on a smart phone rather than on a computer)</h2>
			<h2 id='inshead'>Instructions:</h2>
			
			<p id='insp'>- This is the login page.<p>
			<p id='insp'>- Enter your username and password to login.</p>
			<p id='insp'>- If you don't have one, please create an account by clicking on 
				"Dont have an account? Sign Up!" link.</p><br>
				
			
			<h2 id='inshead'>About the interface of the game:</h2>
			
			<p id='insp'>- After logging in to the game, you will be directed to
					the home page.<p>
			<p id='insp'>- In the home page, we can simply click on play button 
				to start the game.<p>
			<p id='insp'>- Also, there is a logout button on the top right corner (to logout), 
				a statistics button on the top left corner (to view your stats), a scoreboard 
				button at the buttom of the screen (to view the top 10 ranking, even if you are not in 
				the top 10 your ranking will still be displayed.)<p>
			
			<p id='insp'>- On the stats view (after clicking on stats button), we can find a button
				named clear stats. Clicking on it we permanently clear your game stats.</p><br>
			
			
			
			<h2 id='inshead'>Instructions to play the game:</h2>
			
			<p id='insp'>- Once the game is started (after clicking on the play button),
				there will be four letters displayed in jumbled order. We need to click or touch
				on the letters to make correct four letters word.<p>
			<p id='insp'>- We can attempt multiple times to get the right word until we run out of time.<p>
			<p id='insp'>- There is a count-down timer displayed on the screen. It is basically a line that is constantly decreasing.<p>
			<p id='insp'>- Once we run out of time, the game is over.<p>
			<p id='insp'>- We will be credited with more time if we come up with the correct word.<p>
			
			<p id='insp'>- The score increases by one on every correct word we make.<p>
			
			<p id='insp'>- We can also click on the same letter twice to remove it, if we make any mistake (similar to UNDO).<p>
			
			<p id='insp'>- Once the game is over, we will be directed to game over screen where we can see our score and the correct word that we could have made.<p>
			
			<p id='insp'>- On the game over screen, there is a home button (to go to the home screen) and play button (to play again), located at the button of the screen. </p>
			
		</div>
		
		
		
		
		<script>
		
			function changePage(){
				window.open("signin.php","_self");
			};
			
			
			var showins = 1;
			function instruc(){
				if(showins==1){
				document.getElementById('instruction').style.display = "block";
				document.getElementById('bg').style.opacity = '0.3';
				showins = 0;				
				}else {
					document.getElementById('instruction').style.display = "none";
					document.getElementById('bg').style.opacity = '1';
					showins = 1;
				}
			};
		
		</script>
	
	</body>

</html>