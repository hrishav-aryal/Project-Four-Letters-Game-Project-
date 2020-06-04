
<?php 
	session_start(); 
	
	if(!isset($_SESSION['fname'])){
		header('location:login.php');
	}
	
	$name = $_SESSION['fname']; 
	$score = $_SESSION['score'];
	$numgames = $_SESSION['gplayed'];
	$usname = $_SESSION['uname'];
	
	$loginFile = fopen("unpw.txt","r");
	$forscore = array();
	$forname = array();
	while(!feof($loginFile)){
		$line = fgets($loginFile);
		$words = explode(",",$line);
			
		$forscore[$words[0]] = $words[3];
		$forname[$words[0]] = $words[2];
		
	}
	
	arsort($forscore);
	fclose($loginFile);
?>

<html>
<head> 
	<title>Browser</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	
	<link rel="stylesheet" href="fourstyles.css">
	<script src="four.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	
	
</head>


<body>		

	<div id='opac'>

		<button id='stats' onclick="displayStats()"></button>	

		<div class="play">
		
			<p id='bestscore' value="">Best Score</p>
			<p id='bestscore1' value=""><?php echo $score; ?></p>
		
			<button id='play' onclick="play()">Play</button>
			
			<button id='scoreboard' onclick="sboard()">Scoreboard</button>	
			
		</div>
		
		<button id='logout' onclick="logout()"></button>	
		
		<button id='insfh' onclick="instruc()"></button>	
		
	</div>
	
	<div id='displaysboard'>
		
			<button id='close' onclick="sboard()"></button>
		
			<div id='tcontainer'>
				<table class='scoretable'>
					<thead>
						<tr>
							<th width='20%'>Rank</th>
							<th width='57%'>Name</th>
							<th width='23%'>Score</th>
						</tr>
					</thead>
				

				<?php
					$i = 1;
					$myrank = 0;
					$checkme = false;
					foreach($forscore as $key => $value){
						if($value >= 0 && $i <= 10){
							if($key == $usname){
								echo '<tr id="srow">';
								echo '<td>' . $i . '</td>';
								echo '<td>' . $forname[$key] . ' (' . $key . ')'. '</td>';
								echo '<td>' . $value . '</td>';
								echo '</tr>';
								$checkme = true;
							}else{
								echo '<tr>';
								echo '<td>' . $i . '</td>';
								echo '<td>' . $forname[$key] . ' (' . $key . ')'. '</td>';
								echo '<td>' . $value . '</td>';
								echo '</tr>';
							}
						}
						
						if($key == $usname) $myrank = $i;
						
						$i++;
					}
					
					if(!$checkme){
						echo '<tr id="srow">';
						echo '<td>' . $myrank . '</td>';
						echo '<td>' . $forname[$usname] . ' (' . $usname . ')'. '</td>';
						echo '<td>' . $forscore[$usname] . '</td>';
						echo '</tr>';
						$checkme = true;
					}
							
				?>
				
				</table>
			</div>
		
	</div>  
	
	<div id='instruction'>
			
			<button id='close' onclick="instruc()"></button>
			
			<h3 id='inshead1'>(Great experience if played on a smart phone rather than on a computer)</h2>
			<h2 id='inshead'>Instructions:</h2>
			
			<p id='insp'>- This is the home page of the game.<p><br>
				
			
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
	
	<div id="statistics">
			
			<button id='close' onclick="displayStats()"></button>
			
			<h2 id='statshead'>Player Stats</h2><br>
			
			<div id='statsdisp'>
			
			<p id='statsp'>Name: <?php echo '<label id="statspin">'.$name.'</label>';?></p>
			<p id='statsp'>Username: <?php echo '<label id="statspin">'.$usname.'</label>';?></p>
			<p id='statsp'>Best Score: <?php echo '<label id="statspin">'.$score.'</label>';?></p>
			<p id='statsp'>Games Played: <?php echo '<label id="statspin">'.$numgames.'</label>';?></p>
			
			</div>
			<button id='clearstats' onclick="clearmystats()">Clear Stats</button>
		
	</div>
	
	
	<div id='loading'>
		
	<div>
	
	
	<script>
	
		var show = 1;
		var showstats = 1;
		
		var user1 = <?php echo json_encode($usname); ?>;
		
		function play() {
		  window.open("projectfour.php", "_self");
		};
		
		function sboard(){
			if(show==1){
				document.getElementById('displaysboard').style.display = "block";
				document.getElementById('opac').style.opacity = '0.4';
				show = 0;				
			}else {
				document.getElementById('displaysboard').style.display = "none";
				document.getElementById('opac').style.opacity = '1';
				show = 1;
			}

		};
		
		function displayStats(){
			if(showstats==1){
				document.getElementById('statistics').style.display = "block";
				document.getElementById('opac').style.opacity = '0.4';
				showstats = 0;	 
				
			}else {
				document.getElementById('statistics').style.display = "none";
				document.getElementById('opac').style.opacity = '1';
				showstats = 1;
			}
		};
		
		function clearmystats(){
			//$.post('clearthestats.php',{postname1:user1}, function(data){});
			
			var clear = confirm("This cannot be undone. Are you sure you want to clear your game stats?");
			
			if(clear == true){	
				document.getElementById('loading').style.display = "block";
				document.getElementById('opac').style.opacity = '0.4';
				document.getElementById('statistics').style.opacity = '0.4';
				setTimeout(function() {
					$('#statsdisp').load('clearthestats.php', {postname1:user1});
					document.getElementById('bestscore1').innerText = 0;
					document.getElementById('loading').style.display = "none";
					document.getElementById('opac').style.opacity = '1';
					document.getElementById('statistics').style.opacity = '1';
				}, 2000);
			
				
			}
			
		};
		
		var showins = 1;
			function instruc(){
				if(showins==1){
					document.getElementById('instruction').style.display = "block";
					document.getElementById('opac').style.opacity = '0.4';
					showins = 0;				
				}else {
					document.getElementById('instruction').style.display = "none";
					document.getElementById('opac').style.opacity = '1';
					showins = 1;
				}
			};
		
		function logout(){
			window.open("login.php","_self");
		};
		
	</script>
	
 
</body>

</html>