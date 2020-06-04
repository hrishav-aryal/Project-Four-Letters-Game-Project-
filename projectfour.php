<html>
<head> 
	<title>Browser</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	
	<link rel="stylesheet" href="fourstyles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
</head>


<body onload=run()>

	<?php
		session_start();
		$usname = $_SESSION['uname'];
		$bscore = $_SESSION['score'];
		$gamesplayed = $_SESSION['gplayed'];
	?>
	
	
	
	<div id="game">

		<div class='slabel'>
			<p id="score1">Score</p>
			<p id="score">0</p>
		</div>
	
		<div id="timeprogress">
			<div id="timebar"></div>
		</div>
		
		<div id='displayw'>
			<button id='d1'></button>
			<button id='d2'></button>
			<button id='d3'></button>
			<button id='d4'></button>
		</div>
		
		<div class="fourbuttons">
			<div class="fourgridtop">
				<button id='dummy'>1</button>
				<button id='b1' onclick='fourclick(this.id)'>1</button>
				<button id='dummy'>1</button>
			</div>
			<div class="fourgridmiddle">
				<button id='b2' onclick='fourclick(this.id)'>2</button>
				<button id='dummy'>2</button>
				<button id='b3' onclick='fourclick(this.id)'>3</button>
			</div>
			<div class="fourgridbottom">
				<button id='dummy'>4</button>
				<button id='b4' onclick='fourclick(this.id)'>4</button>
				<button id='dummy'>4</button>
			</div>
		</div>
		
	</div>
	
	<div id="display">
		
		<p id="gop1">You could have made</p>
		
		<div id='displayf'>
			<button id='f1'></button>
			<button id='f2'></button>
			<button id='f3'></button>
			<button id='f4'></button>
		</div>
		
		
		<p id="gop3">You scored</p>
		<p id="gop4">Zero</p>
		
		<div class="homeplay">
			<button id='homebutton' onclick=home()>Home</button>
			<button id='playbutton' onclick=play()>Play</button>
		</div>
		
	</div>
	
	
	
	
	<script>
		hardwords = ['AAHS', 'AALS', 'ABAC', 'ABAS', 'ABBA', 'ABBE', 'ABBS', 'ABED', 'ABET', 'ABID', 'ABLY', 'ABOS', 'ABRI', 'ABUT', 'ABYE', 'ABYS', 'ACAI', 'ACCA', 'ACED', 'ACER', 'ACES', 'ACHE', 'ACHY', 'ACME', 'ACNE', 'ACRE', 'ACTA', 'ACTS', 'ACYL', 'ADAW', 'ADDS', 'ADDY', 'ADIT', 'ADOS', 'ADRY', 'ADZE', 'AEON', 'AERO', 'AERY', 'AESC', 'AFAR', 'AFFY', 'AFRO', 'AGAR', 'AGAS', 'AGEE', 'AGEN', 'AGER', 'AGES', 'AGHA', 'AGIN', 'AGIO', 'AGLU', 'AGLY', 'AGMA', 'AGOG', 'AGON', 'AGUE', 'AHED', 'AHEM', 'AHIS', 'AHOY', 'AIAS', 'AIDE', 'AIDS', 'AIGA', 'AILS', 'AIMS', 'AINE', 'AINS', 'AIRN', 'AIRS', 'AIRT', 'AIRY', 'AITS', 'AITU', 'AJAR', 'AJEE', 'AKED', 'AKEE', 'AKES', 'AKIN', 'ALAE', 'ALAN', 'ALAP', 'ALAR', 'ALAS', 'ALAY', 'ALBA', 'ALBE', 'ALBS', 'ALCO', 'ALEC', 'ALEE', 'ALEF', 'ALES', 'ALEW', 'ALFA', 'ALFS', 'ALGA', 'ALIF', 'ALIT', 'ALKO', 'ALKY', 'ALLS', 'ALLY', 'ALMA', 'ALME', 'ALMS', 'ALOD', 'ALOE', 'ALOW', 'ALPS', 'ALTO', 'ALTS', 'ALUM', 'AMAH', 'AMAS', 'AMBO', 'AMEN', 'AMIA', 'AMID', 'AMIE', 'AMIN', 'AMIR', 'AMIS', 'AMLA', 'AMMO', 'AMOK', 'AMPS', 'AMUS', 'AMYL', 'ANAL', 'ANAN', 'ANAS', 'ANCE', 'ANDS', 'ANES', 'ANEW', 'ANGA', 'ANIL', 'ANIS', 'ANKH', 'ANNA', 'ANNO', 'ANNS', 'ANOA', 'ANON', 'ANOW', 'ANSA', 'ANTA', 'ANTE', 'ANTI', 'ANTS', 'ANUS', 'APAY', 'APED', 'APER', 'APES', 'APEX', 'APOD', 'APOS', 'APPS', 'APSE', 'APSO', 'APTS', 'AQUA', 'ARAK', 'ARAR', 'ARBA', 'ARBS', 'ARCH', 'ARCO', 'ARCS', 'ARDS', 'ARED', 'AREG', 'ARES', 'ARET', 'AREW', 'ARFS', 'ARIA', 'ARID', 'ARIL', 'ARIS', 'ARKS', 'ARLE', 'ARMS', 'ARNA', 'AROW', 'ARPA', 'ARSE', 'ARSY', 'ARTI', 'ARTS', 'ARTY', 'ARUM', 'ARVO', 'ARYL', 'ASAR', 'ASCI', 'ASEA', 'ASHY', 'ASKS', 'ASPS', 'ATAP', 'ATES', 'ATMA', 'ATOC', 'ATOK', 'ATOM', 'ATOP', 'ATUA', 'AUFS', 'AUKS', 'AULA', 'AULD', 'AUNE', 'AUNT', 'AURA', 'AUTO', 'AVAL', 'AVAS', 'AVEL', 'AVER', 'AVES', 'AVID', 'AVOS', 'AVOW', 'AWDL', 'AWED', 'AWEE', 'AWES', 'AWLS', 'AWNS', 'AWNY', 'AWOL', 'AWRY', 'AXAL', 'AXED', 'AXEL', 'AXES', 'AXIL', 'AXIS', 'AXLE', 'AXON', 'AYAH', 'AYES', 'AYIN', 'AYRE', 'AYUS', 'AZAN', 'AZON', 'AZYM', 'BAAL', 'BAAS', 'BABA', 'BABE', 'BABU', 'BACH', 'BACS', 'BADE', 'BADS', 'BAEL', 'BAFF', 'BAFT', 'BAGH', 'BAGS', 'BAHT', 'BAIL', 'BAIT', 'BAJU', 'BAKE', 'BALD', 'BALE', 'BALK', 'BALM', 'BALS', 'BALU', 'BAMS', 'BANC', 'BANE', 'BANG', 'BANI', 'BANS', 'BANT', 'BAPS', 'BAPU', 'BARB', 'BARD', 'BARE', 'BARF', 'BARK', 'BARM', 'BARN', 'BARP', 'BARS', 'BASH', 'BASK', 'BASS', 'BAST', 'BATE', 'BATS', 'BATT', 'BAUD', 'BAUK', 'BAUR', 'BAWD', 'BAWL', 'BAWN', 'BAWR', 'BAYE', 'BAYS', 'BAYT', 'BEAD', 'BEAK', 'BEAM', 'BEAN', 'BEAU', 'BECK', 'BEDE', 'BEDS', 'BEDU', 'BEEF', 'BEEP', 'BEES', 'BEET', 'BEGO', 'BEGS', 'BEIN', 'BELS', 'BEMA', 'BEND', 'BENE', 'BENI', 'BENJ', 'BENS', 'BENT', 'BERE', 'BERG', 'BERK', 'BERM', 'BETA', 'BETE', 'BETH', 'BETS', 'BEVY', 'BEYS', 'BHAT', 'BHEL', 'BHUT', 'BIAS', 'BIBB', 'BIBS', 'BICE', 'BIDE', 'BIDI', 'BIDS', 'BIEN', 'BIER', 'BIFF', 'BIGA', 'BIGG', 'BIGS', 'BIKE', 'BILE', 'BILK', 'BIMA', 'BIND', 'BINE', 'BING', 'BINK', 'BINS', 'BINT', 'BIOG', 'BIOS', 'BIRK', 'BIRL', 'BIRO', 'BIRR', 'BISE', 'BISH', 'BISK', 'BIST', 'BITE', 'BITO', 'BITS', 'BITT', 'BIZE', 'BLAB', 'BLAD', 'BLAE', 'BLAG', 'BLAH', 'BLAM', 'BLAT', 'BLAW', 'BLAY', 'BLEB', 'BLED', 'BLEE', 'BLET', 'BLEW', 'BLEY', 'BLIN', 'BLIP', 'BLOB', 'BLOC', 'BLOG', 'BLOT', 'BLUB', 'BLUR', 'BOAB', 'BOAK', 'BOAR', 'BOAS', 'BOBA', 'BOBS', 'BOCK', 'BODE', 'BODS', 'BOEP', 'BOET', 'BOFF', 'BOGS', 'BOGY', 'BOHO', 'BOHS', 'BOIL', 'BOIS', 'BOKE', 'BOKO', 'BOKS', 'BOLA', 'BOLD', 'BOLE', 'BOLL', 'BOLO', 'BOLT', 'BOMA', 'BONA', 'BONG', 'BONK', 'BONY', 'BOOB', 'BOOH', 'BOOL', 'BOON', 'BOOR', 'BOOS', 'BOOT', 'BOPS', 'BORA', 'BORD', 'BORE', 'BORK', 'BORM', 'BORS', 'BORT', 'BOSH', 'BOSK', 'BOTA', 'BOTS', 'BOTT', 'BOUK', 'BOUN', 'BOUT', 'BOWR', 'BOWS', 'BOXY', 'BOYF', 'BOYG', 'BOYO', 'BOYS', 'BOZO', 'BRAD', 'BRAE', 'BRAG', 'BRAK', 'BRAN', 'BRAS', 'BRAT', 'BRAW', 'BRAY', 'BRED', 'BREE', 'BREI', 'BREN', 'BRER', 'BREW', 'BREY', 'BRIE', 'BRIG', 'BRIK', 'BRIM', 'BRIN', 'BRIO', 'BRIS', 'BRIT', 'BROD', 'BROG', 'BROO', 'BROS', 'BROW', 'BRRR', 'BRUS', 'BRUT', 'BRUX', 'BUAT', 'BUBA', 'BUBO', 'BUBS', 'BUBU', 'BUCK', 'BUDA', 'BUDI', 'BUDO', 'BUDS', 'BUFF', 'BUFO', 'BUGS', 'BUHL', 'BUHR', 'BUIK', 'BUKE', 'BULB', 'BULL', 'BUMF', 'BUMP', 'BUMS', 'BUNA', 'BUND', 'BUNG', 'BUNK', 'BUNN', 'BUNS', 'BUNT', 'BUOY', 'BURA', 'BURB', 'BURD', 'BURG', 'BURK', 'BURL', 'BURP', 'BURR', 'BURS', 'BURY', 'BUSK', 'BUSS', 'BUST', 'BUTE', 'BUTS', 'BUTT', 'BUYS', 'BUZZ', 'BYDE', 'BYES', 'BYKE', 'BYRE', 'BYRL', 'BYTE', 'CAAS', 'CABA', 'CABS', 'CACA', 'CADE', 'CADI', 'CADS', 'CAFE', 'CAFF', 'CAGE', 'CAGS', 'CAGY', 'CAID', 'CAIN', 'CAKE', 'CAKY', 'CALF', 'CALK', 'CALO', 'CALP', 'CALX', 'CAMA', 'CAMO', 'CAMS', 'CANE', 'CANG', 'CANN', 'CANS', 'CANT', 'CANY', 'CAPA', 'CAPE', 'CAPH', 'CAPI', 'CAPO', 'CAPS', 'CARB', 'CARK', 'CARL', 'CARN', 'CARP', 'CARR', 'CARS', 'CART', 'CASA', 'CASK', 'CATE', 'CATS', 'CAUF', 'CAUK', 'CAUL', 'CAUM', 'CAUP', 'CAVA', 'CAVE', 'CAVY', 'CAWK', 'CAWS', 'CAYS', 'CEAS', 'CECA', 'CEDE', 'CEDI', 'CEES', 'CEIL', 'CELS', 'CELT', 'CENS', 'CENT', 'CEPE', 'CEPS', 'CERE', 'CERO', 'CERT', 'CESS', 'CETE', 'CHAD', 'CHAI', 'CHAL', 'CHAM', 'CHAO', 'CHAP', 'CHAR', 'CHAS', 'CHAV', 'CHAW', 'CHAY', 'CHEF', 'CHER', 'CHEW', 'CHEZ', 'CHIA', 'CHIB', 'CHIC', 'CHID', 'CHIK', 'CHIN', 'CHIS', 'CHIT', 'CHIV', 'CHIZ', 'CHOC', 'CHOG', 'CHON', 'CHOP', 'CHOU', 'CHOW', 'CHUB', 'CHUG', 'CHUM', 'CHUT', 'CIAO', 'CIDE', 'CIDS', 'CIEL', 'CIGS', 'CILL', 'CINE', 'CION', 'CIRE', 'CIRL', 'CIST', 'CITE', 'CITO', 'CITS', 'CIVE', 'CLAD', 'CLAG', 'CLAM', 'CLAN', 'CLAP', 'CLAT', 'CLAW', 'CLAY', 'CLEF', 'CLEG', 'CLEM', 'CLEW', 'CLIP', 'CLOD', 'CLOG', 'CLON', 'CLOP', 'CLOT', 'CLOU', 'CLOW', 'CLOY', 'CLUE', 'COAX', 'COBB', 'COBS', 'COCA', 'COCH', 'COCK', 'COCO', 'CODA', 'CODS', 'COED', 'COFF', 'COFT', 'COGS', 'COHO', 'COIF', 'COIL', 'COIN', 'COIR', 'COIT', 'COKE', 'COKY', 'COLA', 'COLE', 'COLL', 'COLS', 'COLT', 'COLY', 'COMA', 'COMB', 'COMM', 'COMP', 'COMS', 'COND', 'CONE', 'CONF', 'CONI', 'CONK', 'CONN', 'CONS', 'CONY', 'COOF', 'COOM', 'COON', 'COOP', 'COOS', 'COOT', 'COPS', 'CORD', 'CORE', 'CORF', 'CORK', 'CORM', 'CORN', 'CORS', 'CORY', 'COSE', 'COSH', 'COSS', 'COSY', 'COTE', 'COTH', 'COTS', 'COTT', 'COUP', 'COUR', 'COVE', 'COWK', 'COWL', 'COWP', 'COWS', 'COWY', 'COXA', 'COXY', 'COYS', 'COZE', 'COZY', 'CRAB', 'CRAG', 'CRAM', 'CRAN', 'CRAP', 'CRAW', 'CRAY', 'CRED', 'CREE', 'CREM', 'CRIB', 'CRIM', 'CRIS', 'CRIT', 'CROC', 'CROG', 'CROW', 'CRUD', 'CRUE', 'CRUS', 'CRUX', 'CUBE', 'CUBS', 'CUDS', 'CUED', 'CUES', 'CUFF', 'CUIF', 'CUIT', 'CUKE', 'CULL', 'CULM', 'CULT', 'CUNT', 'CUPS', 'CURB', 'CURD', 'CURE', 'CURF', 'CURL', 'CURN', 'CURR', 'CURS', 'CURT', 'CUSH', 'CUSK', 'CUSP', 'CUSS', 'CUTE', 'CUTS', 'CWMS', 'CYAN', 'CYMA', 'CYME', 'CYST', 'CYTE', 'CZAR', 'DABS', 'DACE', 'DACK', 'DADA', 'DADO', 'DADS', 'DAES', 'DAFF', 'DAFT', 'DAGO', 'DAGS', 'DAHL', 'DAHS', 'DAIS', 'DAKS', 'DALE', 'DALI', 'DALS', 'DALT', 'DAME', 'DAMN', 'DAMP', 'DAMS', 'DANG', 'DANK', 'DANS', 'DANT', 'DAPS', 'DARB', 'DARE', 'DARG', 'DARI', 'DARN', 'DART', 'DASH', 'DATO', 'DAUB', 'DAUD', 'DAUR', 'DAUT', 'DAVY', 'DAWD', 'DAWK', 'DAWS', 'DAWT', 'DAZE', 'DEAF', 'DEAW', 'DEBE', 'DEBS', 'DECK', 'DECO', 'DEED', 'DEEK', 'DEEM', 'DEEN', 'DEER', 'DEES', 'DEET', 'DEEV', 'DEFI', 'DEFT', 'DEFY', 'DEGS', 'DEID', 'DEIF', 'DEIL', 'DEKE', 'DELE', 'DELF', 'DELI', 'DELL', 'DELO', 'DELS', 'DELT', 'DEME', 'DEMO', 'DEMY', 'DENE', 'DENI', 'DENS', 'DENT', 'DERE', 'DERM', 'DERN', 'DERO', 'DERV', 'DESI', 'DEUS', 'DEVA', 'DEVS', 'DEWS', 'DEWY', 'DEXY', 'DEYS', 'DHAK', 'DHAL', 'DHOL', 'DHOW', 'DIBS', 'DICE', 'DICH', 'DICT', 'DIDO', 'DIDY', 'DIEB', 'DIED', 'DIEL', 'DIES', 'DIFF', 'DIFS', 'DIGS', 'DIKA', 'DIKE', 'DILL', 'DIME', 'DIMP', 'DIMS', 'DINE', 'DING', 'DINK', 'DINO', 'DINS', 'DINT', 'DIOL', 'DIPS', 'DIPT', 'DIRE', 'DIRK', 'DIRL', 'DIRT', 'DISA', 'DISH', 'DISS', 'DITA', 'DITE', 'DITS', 'DITT', 'DITZ', 'DIVA', 'DIVE', 'DIVI', 'DIVS', 'DIXI', 'DIXY', 'DJIN', 'DOAB', 'DOAT', 'DOBS', 'DOBY', 'DOCK', 'DOCO', 'DOCS', 'DODO', 'DODS', 'DOEK', 'DOEN', 'DOER', 'DOFF', 'DOGE', 'DOGS', 'DOGY', 'DOHS', 'DOIT', 'DOJO', 'DOLE', 'DOLL', 'DOLS', 'DOLT', 'DOME', 'DOMS', 'DOMY', 'DONA', 'DONG', 'DONS', 'DOOB', 'DOOK', 'DOOL', 'DOOM', 'DOON', 'DOOS', 'DOPA', 'DOPE', 'DOPS', 'DOPY', 'DORB', 'DORE', 'DORK', 'DORM', 'DORP', 'DORR', 'DORS', 'DORT', 'DORY', 'DOSH', 'DOSS', 'DOST', 'DOTE', 'DOTH', 'DOTS', 'DOTY', 'DOUC', 'DOUK', 'DOUM', 'DOUN', 'DOUP', 'DOUR', 'DOUT', 'DOUX', 'DOVE', 'DOWD', 'DOWF', 'DOWL', 'DOWP', 'DOWS', 'DOWT', 'DOXY', 'DOYS', 'DOZE', 'DOZY', 'DRAB', 'DRAC', 'DRAD', 'DRAG', 'DRAM', 'DRAP', 'DRAT', 'DRAY', 'DREE', 'DREG', 'DREK', 'DREY', 'DRIB', 'DRIP', 'DROW', 'DRUB', 'DRUM', 'DRYS', 'DSOS', 'DUAD', 'DUAN', 'DUAR', 'DUBS', 'DUCE', 'DUCI', 'DUCK', 'DUCT', 'DUDE', 'DUDS', 'DUED', 'DUEL', 'DUES', 'DUET', 'DUFF', 'DUGS', 'DUIT', 'DUKA', 'DULE', 'DULL', 'DULY', 'DUMA', 'DUMB', 'DUMP', 'DUNE', 'DUNG', 'DUNK', 'DUNS', 'DUNT', 'DUOS', 'DUPE', 'DUPS', 'DURA', 'DURE', 'DURN', 'DURO', 'DURR', 'DUSH', 'DUSK', 'DWAM', 'DYAD', 'DYED', 'DYER', 'DYES', 'DYKE', 'DYNE', 'DZHO', 'DZOS', 'EALE', 'EANS', 'EARD', 'EARL', 'EARS', 'EATH', 'EATS', 'EAUS', 'EAUX', 'EAVE', 'EBBS', 'EBON', 'ECAD', 'ECCE', 'ECCO', 'ECHE', 'ECHO', 'ECHT', 'ECOD', 'ECOS', 'ECRU', 'ECUS', 'EDDO', 'EDDY', 'EDGY', 'EDHS', 'EDIT', 'EECH', 'EELS', 'EELY', 'EERY', 'EEVN', 'EFFS', 'EFTS', 'EGAD', 'EGAL', 'EGER', 'EGGS', 'EGGY', 'EGIS', 'EGMA', 'EGOS', 'EHED', 'EIDE', 'EIKS', 'EILD', 'EINA', 'EINE', 'EISH', 'EKED', 'EKES', 'EKKA', 'ELAN', 'ELDS', 'ELFS', 'ELHI', 'ELKS', 'ELLS', 'ELMS', 'ELMY', 'ELTS', 'EMES', 'EMEU', 'EMIC', 'EMIR', 'EMIT', 'EMMA', 'EMMY', 'EMOS', 'EMPT', 'EMUS', 'EMYD', 'EMYS', 'ENDS', 'ENES', 'ENEW', 'ENGS', 'ENOL', 'ENOW', 'ENUF', 'ENVY', 'EOAN', 'EONS', 'EORL', 'EPEE', 'EPHA', 'EPIC', 'EPOS', 'ERAS', 'ERED', 'ERES', 'EREV', 'ERGO', 'ERGS', 'ERIC', 'ERKS', 'ERNE', 'ERNS', 'EROS', 'ERRS', 'ERST', 'ERUV', 'ESES', 'ESKY', 'ESNE', 'ESPY', 'ESSE', 'ESTS', 'ETAS', 'ETAT', 'ETCH', 'ETEN', 'ETHE', 'ETHS', 'ETIC', 'ETNA', 'ETUI', 'EUGE', 'EUGH', 'EUKS', 'EUOI', 'EURO', 'EVES', 'EVET', 'EVOE', 'EVOS', 'EWER', 'EWES', 'EWKS', 'EWTS', 'EXAM', 'EXEC', 'EXED', 'EXES', 'EXON', 'EXPO', 'EXUL', 'EYAS', 'EYED', 'EYEN', 'EYER', 'EYES', 'EYNE', 'EYOT', 'EYRA', 'EYRE', 'EYRY', 'FAAN', 'FAAS', 'FABS', 'FADE', 'FADO', 'FADS', 'FADY', 'FAFF', 'FAGS', 'FAHS', 'FAIK', 'FAIN', 'FAIX', 'FAKE', 'FALX', 'FAME', 'FAND', 'FANE', 'FANG', 'FANK', 'FANO', 'FANS', 'FARD', 'FARE', 'FARL', 'FARO', 'FARS', 'FART', 'FASH', 'FATS', 'FAUN', 'FAUR', 'FAUT', 'FAUX', 'FAVA', 'FAVE', 'FAWN', 'FAWS', 'FAYS', 'FAZE', 'FEAL', 'FEAT', 'FECK', 'FEDS', 'FEEB', 'FEEN', 'FEER', 'FEES', 'FEGS', 'FEHM', 'FEHS', 'FEIS', 'FEME', 'FEMS', 'FEND', 'FENI', 'FENS', 'FENT', 'FEOD', 'FERE', 'FERM', 'FERN', 'FESS', 'FEST', 'FETA', 'FETE', 'FETS', 'FETT', 'FEUD', 'FEUS', 'FEYS', 'FIAR', 'FIAT', 'FIBS', 'FICE', 'FICO', 'FIDO', 'FIDS', 'FIEF', 'FIER', 'FIFE', 'FIFI', 'FIGO', 'FIGS', 'FIKE', 'FIKY', 'FILA', 'FILO', 'FILS', 'FINI', 'FINK', 'FINO', 'FINS', 'FIRK', 'FIRN', 'FIRS', 'FISC', 'FISK', 'FIST', 'FITS', 'FITT', 'FIXT', 'FIZZ', 'FLAB', 'FLAG', 'FLAK', 'FLAM', 'FLAN', 'FLAP', 'FLAW', 'FLAX', 'FLAY', 'FLEA', 'FLED', 'FLEE', 'FLEG', 'FLEW', 'FLEX', 'FLEY', 'FLIC', 'FLIM', 'FLIP', 'FLIR', 'FLIT', 'FLIX', 'FLOC', 'FLOE', 'FLOG', 'FLOP', 'FLOR', 'FLUB', 'FLUE', 'FLUS', 'FLUX', 'FOAL', 'FOAM', 'FOBS', 'FOCI', 'FOEN', 'FOES', 'FOGS', 'FOGY', 'FOHN', 'FOHS', 'FOID', 'FOIL', 'FOIN', 'FOLD', 'FOLK', 'FOND', 'FONE', 'FONS', 'FONT', 'FOOL', 'FOPS', 'FORA', 'FORB', 'FORE', 'FORK', 'FOSS', 'FOUD', 'FOUL', 'FOUS', 'FOWL', 'FOXY', 'FOYS', 'FOZY', 'FRAB', 'FRAE', 'FRAG', 'FRAP', 'FRAS', 'FRAT', 'FRAU', 'FRAY', 'FRET', 'FRIB', 'FRIG', 'FRIS', 'FRIT', 'FRIZ', 'FROE', 'FROG', 'FROS', 'FROW', 'FRUG', 'FUBS', 'FUCI', 'FUCK', 'FUDS', 'FUFF', 'FUGS', 'FUGU', 'FUJI', 'FUME', 'FUMS', 'FUMY', 'FUNG', 'FUNK', 'FUNS', 'FURL', 'FURR', 'FURS', 'FURY', 'FUSC', 'FUSE', 'FUSS', 'FUST', 'FUTZ', 'FUZE', 'FUZZ', 'FYCE', 'FYKE', 'FYLE', 'FYRD', 'GABS', 'GABY', 'GADE', 'GADI', 'GADS', 'GAED', 'GAEN', 'GAES', 'GAFF', 'GAGA', 'GAGE', 'GAGS', 'GAID', 'GAIR', 'GAIT', 'GAJO', 'GALA', 'GALE', 'GALL', 'GALS', 'GAMA', 'GAMB', 'GAMP', 'GAMS', 'GAMY', 'GANE', 'GANG', 'GANS', 'GANT', 'GAOL', 'GAPE', 'GAPO', 'GAPS', 'GAPY', 'GARB', 'GARE', 'GARI', 'GARS', 'GART', 'GASH', 'GASP', 'GAST', 'GATH', 'GATS', 'GAUD', 'GAUM', 'GAUN', 'GAUP', 'GAUR', 'GAUS', 'GAWD', 'GAWK', 'GAWP', 'GAYS', 'GAZE', 'GAZY', 'GEAL', 'GEAN', 'GEAT', 'GECK', 'GEDS', 'GEED', 'GEEK', 'GEEP', 'GEES', 'GEEZ', 'GEIT', 'GELD', 'GELS', 'GELT', 'GEMS', 'GENA', 'GENS', 'GENT', 'GENU', 'GEOS', 'GERE', 'GERM', 'GERT', 'GEST', 'GETA', 'GETS', 'GEUM', 'GHAT', 'GHEE', 'GHIS', 'GIBE', 'GIBS', 'GIDS', 'GIED', 'GIEN', 'GIES', 'GIGA', 'GIGS', 'GILA', 'GILD', 'GILL', 'GILT', 'GIMP', 'GING', 'GINK', 'GINN', 'GINS', 'GIOS', 'GIPS', 'GIRD', 'GIRN', 'GIRO', 'GIRR', 'GIRT', 'GISM', 'GIST', 'GITE', 'GITS', 'GIZZ', 'GJUS', 'GLAM', 'GLED', 'GLEE', 'GLEG', 'GLEI', 'GLEN', 'GLEY', 'GLIA', 'GLIB', 'GLID', 'GLIM', 'GLIT', 'GLOB', 'GLOM', 'GLOP', 'GLOW', 'GLUE', 'GLUG', 'GLUM', 'GLUT', 'GNAR', 'GNAT', 'GNAW', 'GNOW', 'GNUS', 'GOAD', 'GOAF', 'GOAS', 'GOAT', 'GOBO', 'GOBS', 'GOBY', 'GODS', 'GOEL', 'GOER', 'GOEY', 'GOFF', 'GOGO', 'GOLE', 'GOLF', 'GOLP', 'GONG', 'GONK', 'GONS', 'GOOF', 'GOOG', 'GOOK', 'GOOL', 'GOON', 'GOOP', 'GOOR', 'GOOS', 'GORA', 'GORE', 'GORI', 'GORM', 'GORP', 'GORY', 'GOSH', 'GOSS', 'GOTH', 'GOUK', 'GOUT', 'GOVS', 'GOWD', 'GOWF', 'GOWK', 'GOWL', 'GOWN', 'GOYS', 'GRAB', 'GRAD', 'GRAM', 'GRAN', 'GRAT', 'GRAV', 'GREE', 'GREN', 'GREX', 'GRID', 'GRIG', 'GRIM', 'GRIN', 'GRIP', 'GRIS', 'GRIT', 'GROG', 'GROK', 'GROT', 'GRUB', 'GRUE', 'GRUM', 'GUAN', 'GUAR', 'GUBS', 'GUCK', 'GUDE', 'GUES', 'GUFF', 'GUGA', 'GUID', 'GULA', 'GULE', 'GULL', 'GULP', 'GULS', 'GULY', 'GUMP', 'GUMS', 'GUNG', 'GUNK', 'GUNS', 'GUPS', 'GURL', 'GURN', 'GURS', 'GURU', 'GUSH', 'GUST', 'GUTS', 'GUVS', 'GUYS', 'GYAL', 'GYBE', 'GYMP', 'GYMS', 'GYNY', 'GYPS', 'GYRE', 'GYRI', 'GYRO', 'GYTE', 'GYVE', 'HAAF', 'HAAR', 'HABU', 'HACK', 'HADE', 'HADJ', 'HADS', 'HAED', 'HAEM', 'HAEN', 'HAES', 'HAET', 'HAFF', 'HAFT', 'HAGG', 'HAGS', 'HAHA', 'HAHS', 'HAIK', 'HAIL', 'HAIN', 'HAJI', 'HAJJ', 'HAKA', 'HAKE', 'HAKU', 'HALE', 'HALM', 'HALO', 'HALT', 'HAME', 'HAMS', 'HANK', 'HANT', 'HAPS', 'HAPU', 'HARE', 'HARK', 'HARL', 'HARN', 'HARO', 'HARP', 'HART', 'HASH', 'HASK', 'HASP', 'HAST', 'HATH', 'HATS', 'HAUD', 'HAUF', 'HAUL', 'HAUT', 'HAWK', 'HAWM', 'HAWS', 'HAYS', 'HAZE', 'HAZY', 'HEAL', 'HEAP', 'HEBE', 'HECH', 'HECK', 'HEED', 'HEEL', 'HEFT', 'HEHS', 'HEID', 'HEIL', 'HEIR', 'HELE', 'HELM', 'HELO', 'HEME', 'HEMP', 'HEMS', 'HEND', 'HENS', 'HENT', 'HEPS', 'HEPT', 'HERB', 'HERD', 'HERL', 'HERM', 'HERN', 'HERS', 'HERY', 'HESP', 'HEST', 'HETE', 'HETH', 'HETS', 'HEWN', 'HEWS', 'HEYS', 'HICK', 'HIDE', 'HIED', 'HIES', 'HIKE', 'HILA', 'HILD', 'HILI', 'HILT', 'HIMS', 'HIND', 'HING', 'HINS', 'HINT', 'HIOI', 'HIPS', 'HIPT', 'HISH', 'HISN', 'HISS', 'HIST', 'HITS', 'HIVE', 'HIYA', 'HIZZ', 'HOAR', 'HOAS', 'HOAX', 'HOBO', 'HOBS', 'HOCK', 'HODS', 'HOED', 'HOER', 'HOES', 'HOGG', 'HOGH', 'HOGS', 'HOHA', 'HOHS', 'HOIK', 'HOKA', 'HOKE', 'HOKI', 'HOLK', 'HOLM', 'HOLP', 'HOLS', 'HOLT', 'HOMA', 'HOMO', 'HOMS', 'HOMY', 'HOND', 'HONE', 'HONG', 'HONK', 'HONS', 'HOOD', 'HOOF', 'HOOK', 'HOON', 'HOOP', 'HOOT', 'HOPS', 'HORA', 'HORE', 'HORI', 'HORN', 'HORS', 'HOSE', 'HOSS', 'HOTE', 'HOTS', 'HOUF', 'HOUT', 'HOVE', 'HOWE', 'HOWF', 'HOWK', 'HOWL', 'HOWS', 'HOYA', 'HOYS', 'HUBS', 'HUCK', 'HUED', 'HUER', 'HUES', 'HUFF', 'HUGS', 'HUGY', 'HUHU', 'HUIA', 'HUIC', 'HUIS', 'HULA', 'HULE', 'HULK', 'HULL', 'HUMA', 'HUMF', 'HUMP', 'HUMS', 'HUNH', 'HUNK', 'HUNS', 'HUPS', 'HURL', 'HUSH', 'HUSK', 'HUSO', 'HUSS', 'HUTS', 'HWAN', 'HWYL', 'HYED', 'HYEN', 'HYES', 'HYKE', 'HYLA', 'HYLE', 'HYMN', 'HYPE', 'HYPO', 'HYPS', 'HYTE', 'IAMB', 'IBEX', 'IBIS', 'ICED', 'ICER', 'ICES', 'ICHS', 'ICKY', 'ICON', 'IDEE', 'IDEM', 'IDES', 'IDLE', 'IDLY', 'IDOL', 'IDYL', 'IFFY', 'IGAD', 'IGGS', 'IGLU', 'IKAN', 'IKAT', 'IKON', 'ILEA', 'ILEX', 'ILIA', 'ILKA', 'ILKS', 'ILLS', 'ILLY', 'IMAM', 'IMID', 'IMMY', 'IMPI', 'IMPS', 'INBY', 'INFO', 'INGO', 'INIA', 'INKS', 'INKY', 'INLY', 'INNS', 'INRO', 'INTI', 'IONS', 'IOTA', 'IRED', 'IRES', 'IRID', 'IRIS', 'IRKS', 'ISBA', 'ISIT', 'ISLE', 'ISMS', 'ISNA', 'ISOS', 'ITAS', 'ITCH', 'IURE', 'IWIS', 'IXIA', 'IZAR', 'JAAP', 'JABS', 'JADE', 'JAFA', 'JAGA', 'JAGG', 'JAGS', 'JAIL', 'JAKE', 'JAKS', 'JAMB', 'JAMS', 'JANN', 'JAPE', 'JAPS', 'JARK', 'JARL', 'JARP', 'JARS', 'JASP', 'JASS', 'JASY', 'JATO', 'JAUK', 'JAUP', 'JAVA', 'JAWS', 'JAXY', 'JAYS', 'JAZY', 'JAZZ', 'JEAT', 'JEDI', 'JEED', 'JEEL', 'JEEP', 'JEER', 'JEES', 'JEEZ', 'JEFE', 'JEFF', 'JEHU', 'JELL', 'JEON', 'JERK', 'JESS', 'JEST', 'JETE', 'JETS', 'JEUX', 'JEWS', 'JIAO', 'JIBB', 'JIBE', 'JIBS', 'JIFF', 'JIGS', 'JILL', 'JILT', 'JIMP', 'JINK', 'JINN', 'JINS', 'JINX', 'JIRD', 'JISM', 'JIVE', 'JIVY', 'JIZZ', 'JOBE', 'JOBS', 'JOCK', 'JOCO', 'JOES', 'JOEY', 'JOGS', 'JOKE', 'JOKY', 'JOLE', 'JOLL', 'JOLS', 'JOLT', 'JOMO', 'JONG', 'JOOK', 'JORS', 'JOSH', 'JOSS', 'JOTA', 'JOTS', 'JOUK', 'JOUR', 'JOWL', 'JOWS', 'JOYS', 'JUBA', 'JUBE', 'JUCO', 'JUDO', 'JUDS', 'JUDY', 'JUGA', 'JUGS', 'JUJU', 'JUKE', 'JUKU', 'JUNK', 'JUPE', 'JURA', 'JURE', 'JUTE', 'JUTS', 'JUVE', 'JYNX', 'KAAL', 'KAAS', 'KABS', 'KADE', 'KADI', 'KAED', 'KAES', 'KAFS', 'KAGO', 'KAGU', 'KAID', 'KAIE', 'KAIF', 'KAIK', 'KAIL', 'KAIM', 'KAIN', 'KAIS', 'KAKA', 'KAKI', 'KAKS', 'KALE', 'KALI', 'KAMA', 'KAME', 'KAMI', 'KANA', 'KANE', 'KANG', 'KANS', 'KANT', 'KAON', 'KAPA', 'KAPH', 'KARA', 'KARK', 'KARN', 'KARO', 'KART', 'KATA', 'KATI', 'KATS', 'KAVA', 'KAWA', 'KAWS', 'KAYO', 'KAYS', 'KAZI', 'KBAR', 'KEAS', 'KEBS', 'KECK', 'KEDS', 'KEEF', 'KEEK', 'KEEL', 'KEET', 'KEFS', 'KEGS', 'KEIR', 'KEKS', 'KELL', 'KELP', 'KELT', 'KEMB', 'KEMP', 'KENO', 'KENS', 'KEPI', 'KEPS', 'KERB', 'KERF', 'KERN', 'KERO', 'KESH', 'KEST', 'KETA', 'KETE', 'KETO', 'KETS', 'KEWL', 'KEYS', 'KHAF', 'KHAN', 'KHAT', 'KHET', 'KHIS', 'KHOR', 'KHUD', 'KIBE', 'KIDS', 'KIEF', 'KIER', 'KIFF', 'KIFS', 'KIKE', 'KILD', 'KILN', 'KILO', 'KILP', 'KILT', 'KINA', 'KINE', 'KINK', 'KINO', 'KINS', 'KIPE', 'KIPP', 'KIPS', 'KIRK', 'KIRN', 'KIRS', 'KISH', 'KISS', 'KIST', 'KITE', 'KITH', 'KITS', 'KIVA', 'KIWI', 'KLAP', 'KLIK', 'KNAG', 'KNAP', 'KNAR', 'KNIT', 'KNOB', 'KNOP', 'KNOT', 'KNUB', 'KNUR', 'KNUT', 'KOAN', 'KOAP', 'KOAS', 'KOBO', 'KOBS', 'KOEL', 'KOFF', 'KOHA', 'KOHL', 'KOIS', 'KOJI', 'KOLA', 'KOLO', 'KOND', 'KONK', 'KONS', 'KOOK', 'KOPH', 'KOPS', 'KORA', 'KORE', 'KORO', 'KORS', 'KORU', 'KOSS', 'KOTO', 'KOWS', 'KRAB', 'KRIS', 'KSAR', 'KUDO', 'KUDU', 'KUEH', 'KUES', 'KUFI', 'KUIA', 'KUKU', 'KULA', 'KUNA', 'KUNE', 'KURI', 'KURU', 'KUTA', 'KUTI', 'KUTU', 'KUZU', 'KVAS', 'KYAK', 'KYAR', 'KYAT', 'KYBO', 'KYES', 'KYLE', 'KYND', 'KYNE', 'KYPE', 'KYTE', 'KYUS', 'LABS', 'LACE', 'LACS', 'LACY', 'LADE', 'LADS', 'LAER', 'LAGS', 'LAHS', 'LAIC', 'LAIK', 'LAIN', 'LAIR', 'LAKH', 'LAKY', 'LALL', 'LAMA', 'LAMB', 'LAME', 'LAMP', 'LAMS', 'LANA', 'LANG', 'LANK', 'LANT', 'LANX', 'LAPS', 'LARD', 'LARE', 'LARI', 'LARK', 'LARN', 'LARS', 'LASE', 'LASH', 'LASS', 'LATH', 'LATI', 'LATS', 'LATU', 'LAUD', 'LAUF', 'LAVA', 'LAVE', 'LAVS', 'LAWK', 'LAWN', 'LAWS', 'LAYS', 'LAZE', 'LAZO', 'LAZY', 'LEAF', 'LEAK', 'LEAL', 'LEAM', 'LEAN', 'LEAP', 'LEAR', 'LEAS', 'LEAT', 'LECH', 'LEED', 'LEEK', 'LEEP', 'LEER', 'LEES', 'LEET', 'LEGS', 'LEHR', 'LEIR', 'LEIS', 'LEKE', 'LEKS', 'LEKU', 'LEME', 'LEND', 'LENG', 'LENO', 'LENS', 'LENT', 'LEPS', 'LEPT', 'LERE', 'LERP', 'LEST', 'LETS', 'LEUD', 'LEVA', 'LEVE', 'LEVO', 'LEVY', 'LEWD', 'LEYS', 'LEZZ', 'LIAR', 'LIAS', 'LIBS', 'LICE', 'LICH', 'LICK', 'LIDO', 'LIDS', 'LIED', 'LIEF', 'LIEN', 'LIER', 'LIES', 'LIEU', 'LIGS', 'LILL', 'LILO', 'LILT', 'LILY', 'LIMA', 'LIMB', 'LIME', 'LIMN', 'LIMO', 'LIMP', 'LIMY', 'LIND', 'LING', 'LINN', 'LINO', 'LINS', 'LINT', 'LINY', 'LION', 'LIPA', 'LIPE', 'LIPO', 'LIPS', 'LIRA', 'LIRE', 'LIRI', 'LIRK', 'LISK', 'LISP', 'LITE', 'LITH', 'LITS', 'LITU', 'LOAF', 'LOAM', 'LOBE', 'LOBI', 'LOBO', 'LOBS', 'LOCA', 'LOCH', 'LOCI', 'LOCO', 'LODE', 'LODS', 'LOFT', 'LOGE', 'LOGS', 'LOGY', 'LOID', 'LOIN', 'LOIR', 'LOKE', 'LOLL', 'LOMA', 'LOME', 'LONE', 'LOOF', 'LOOM', 'LOON', 'LOOP', 'LOOR', 'LOOS', 'LOOT', 'LOPE', 'LOPS', 'LORE', 'LORN', 'LORY', 'LOSH', 'LOTA', 'LOTE', 'LOTH', 'LOTI', 'LOTO', 'LOTS', 'LOUD', 'LOUN', 'LOUP', 'LOUR', 'LOUS', 'LOUT', 'LOWE', 'LOWN', 'LOWP', 'LOWS', 'LOWT', 'LOYS', 'LUAU', 'LUBE', 'LUCE', 'LUDE', 'LUDO', 'LUDS', 'LUES', 'LUFF', 'LUGE', 'LUGS', 'LUIT', 'LUKE', 'LULL', 'LULU', 'LUMA', 'LUMP', 'LUMS', 'LUNA', 'LUNE', 'LUNG', 'LUNK', 'LUNT', 'LUNY', 'LURE', 'LURK', 'LURS', 'LUSH', 'LUSK', 'LUST', 'LUTE', 'LUTZ', 'LUVS', 'LUXE', 'LWEI', 'LYAM', 'LYCH', 'LYES', 'LYME', 'LYMS', 'LYNE', 'LYNX', 'LYRA', 'LYRE', 'LYSE', 'LYTE', 'MAAR', 'MAAS', 'MABE', 'MACE', 'MACH', 'MACK', 'MACS', 'MADS', 'MAES', 'MAGE', 'MAGG', 'MAGI', 'MAGS', 'MAID', 'MAIK', 'MAIM', 'MAIR', 'MAKI', 'MAKO', 'MAKS', 'MALA', 'MALI', 'MALL', 'MALM', 'MALS', 'MALT', 'MAMA', 'MAMS', 'MANA', 'MAND', 'MANE', 'MANG', 'MANI', 'MANO', 'MANS', 'MAPS', 'MARA', 'MARC', 'MARD', 'MARE', 'MARG', 'MARK', 'MARL', 'MARM', 'MARS', 'MART', 'MARY', 'MASA', 'MASE', 'MASH', 'MASK', 'MAST', 'MASU', 'MATE', 'MATH', 'MATS', 'MATY', 'MAUD', 'MAUL', 'MAUN', 'MAUT', 'MAWK', 'MAWN', 'MAWR', 'MAWS', 'MAXI', 'MAYA', 'MAYO', 'MAYS', 'MAZE', 'MAZY', 'MEAD', 'MECK', 'MEDS', 'MEED', 'MEEK', 'MEER', 'MEES', 'MEFF', 'MEGA', 'MEGS', 'MEIN', 'MELA', 'MELD', 'MELL', 'MELS', 'MELT', 'MEME', 'MEMO', 'MEMS', 'MEND', 'MENE', 'MENG', 'MENO', 'MENT', 'MEOU', 'MEOW', 'MERC', 'MERI', 'MERK', 'MERL', 'MESA', 'MESE', 'MESH', 'MESS', 'META', 'METE', 'METH', 'METS', 'MEUS', 'MEVE', 'MEWL', 'MEWS', 'MEZE', 'MEZZ', 'MHOS', 'MIBS', 'MICA', 'MICE', 'MICH', 'MICK', 'MICO', 'MICS', 'MIDI', 'MIDS', 'MIEN', 'MIFF', 'MIGG', 'MIGS', 'MIHA', 'MIHI', 'MILD', 'MILO', 'MILS', 'MILT', 'MIME', 'MINA', 'MING', 'MINI', 'MINK', 'MINO', 'MINT', 'MINX', 'MINY', 'MIPS', 'MIRE', 'MIRI', 'MIRK', 'MIRO', 'MIRS', 'MIRV', 'MIRY', 'MISE', 'MISO', 'MIST', 'MITE', 'MITT', 'MITY', 'MIXT', 'MIXY', 'MIZZ', 'MNAS', 'MOAI', 'MOAN', 'MOAS', 'MOAT', 'MOBE', 'MOBS', 'MOBY', 'MOCH', 'MOCK', 'MOCS', 'MODI', 'MODS', 'MOER', 'MOES', 'MOFO', 'MOGS', 'MOHR', 'MOIL', 'MOIT', 'MOJO', 'MOKE', 'MOKI', 'MOKO', 'MOLA', 'MOLD', 'MOLE', 'MOLL', 'MOLS', 'MOLT', 'MOLY', 'MOME', 'MOMI', 'MOMS', 'MONA', 'MONG', 'MONK', 'MONO', 'MONS', 'MONY', 'MOOI', 'MOOK', 'MOOL', 'MOOP', 'MOOR', 'MOOS', 'MOOT', 'MOPE', 'MOPS', 'MOPY', 'MORA', 'MORN', 'MORS', 'MORT', 'MOSE', 'MOSH', 'MOSK', 'MOSS', 'MOTE', 'MOTH', 'MOTI', 'MOTS', 'MOTT', 'MOTU', 'MOUE', 'MOUP', 'MOUS', 'MOWA', 'MOWN', 'MOWS', 'MOXA', 'MOYA', 'MOYL', 'MOYS', 'MOZE', 'MOZO', 'MOZZ', 'MUCK', 'MUDS', 'MUFF', 'MUGG', 'MUGS', 'MUID', 'MUIL', 'MUIR', 'MULE', 'MULL', 'MUMM', 'MUMP', 'MUMS', 'MUMU', 'MUNG', 'MUNI', 'MUNS', 'MUNT', 'MUON', 'MURA', 'MURE', 'MURK', 'MURL', 'MURR', 'MUSE', 'MUSH', 'MUSK', 'MUSO', 'MUSS', 'MUTE', 'MUTI', 'MUTS', 'MUTT', 'MUZZ', 'MYAL', 'MYCS', 'MYNA', 'MYTH', 'MYXO', 'MZEE', 'NAAM', 'NAAN', 'NABE', 'NABK', 'NABS', 'NACH', 'NADA', 'NADS', 'NAFF', 'NAGA', 'NAGS', 'NAIF', 'NAIK', 'NAIL', 'NAIN', 'NALA', 'NAMS', 'NAMU', 'NANA', 'NANE', 'NANS', 'NAOI', 'NAOS', 'NAPA', 'NAPE', 'NAPS', 'NARC', 'NARD', 'NARE', 'NARK', 'NARY', 'NATS', 'NAVE', 'NAYS', 'NAZE', 'NAZI', 'NEAL', 'NEAP', 'NEAT', 'NEBS', 'NEDS', 'NEEM', 'NEEP', 'NEFS', 'NEGS', 'NEIF', 'NEKS', 'NEMA', 'NEMN', 'NENE', 'NEON', 'NEPS', 'NERD', 'NERK', 'NESH', 'NESS', 'NEST', 'NETE', 'NETS', 'NETT', 'NEUK', 'NEUM', 'NEVE', 'NEVI', 'NEWT', 'NIBS', 'NIDE', 'NIDI', 'NIDS', 'NIED', 'NIEF', 'NIES', 'NIFE', 'NIFF', 'NIGH', 'NILL', 'NILS', 'NIMB', 'NIMS', 'NIPA', 'NIPS', 'NIRL', 'NISH', 'NISI', 'NITE', 'NITS', 'NIXE', 'NIXY', 'NOAH', 'NOBS', 'NOCK', 'NODE', 'NODI', 'NODS', 'NOEL', 'NOES', 'NOGG', 'NOGS', 'NOIL', 'NOIR', 'NOLE', 'NOLL', 'NOLO', 'NOMA', 'NOME', 'NOMS', 'NONA', 'NONG', 'NONI', 'NOOK', 'NOON', 'NOOP', 'NOPE', 'NORI', 'NORK', 'NORM', 'NOSH', 'NOSY', 'NOTA', 'NOTT', 'NOUL', 'NOUN', 'NOUP', 'NOUS', 'NOUT', 'NOVA', 'NOWL', 'NOWN', 'NOWS', 'NOWT', 'NOWY', 'NOYS', 'NUBS', 'NUDE', 'NUFF', 'NUKE', 'NULL', 'NUMB', 'NUNS', 'NURD', 'NURL', 'NURR', 'NURS', 'NUTS', 'NYAS', 'NYED', 'NYES', 'OAFS', 'OAKS', 'OAKY', 'OARS', 'OARY', 'OAST', 'OATH', 'OATS', 'OBAS', 'OBES', 'OBEY', 'OBIA', 'OBIS', 'OBIT', 'OBOE', 'OBOL', 'OBOS', 'OCAS', 'OCCY', 'OCHE', 'OCTA', 'ODAH', 'ODAL', 'ODAS', 'ODDS', 'ODEA', 'ODES', 'ODIC', 'ODOR', 'ODSO', 'ODYL', 'OFAY', 'OFFS', 'OGAM', 'OGEE', 'OGLE', 'OGRE', 'OHED', 'OHIA', 'OHMS', 'OHOS', 'OIKS', 'OILS', 'OILY', 'OINK', 'OINT', 'OKAS', 'OKEH', 'OKES', 'OKRA', 'OKTA', 'OLDS', 'OLDY', 'OLEA', 'OLEO', 'OLES', 'OLID', 'OLIO', 'OLLA', 'OLMS', 'OLPE', 'OMBU', 'OMEN', 'OMER', 'OMIT', 'OMOV', 'ONER', 'ONES', 'ONIE', 'ONOS', 'ONST', 'ONUS', 'ONYX', 'OOFS', 'OOFY', 'OOHS', 'OOMS', 'OONS', 'OONT', 'OOPS', 'OOSE', 'OOSY', 'OOTS', 'OOZE', 'OOZY', 'OPAH', 'OPAL', 'OPED', 'OPES', 'OPPO', 'OPTS', 'OPUS', 'ORAD', 'ORBS', 'ORBY', 'ORCA', 'ORCS', 'ORDO', 'ORDS', 'ORES', 'ORFE', 'ORFS', 'ORGY', 'ORLE', 'ORRA', 'ORTS', 'ORYX', 'ORZO', 'OSAR', 'OSES', 'OSSA', 'OTIC', 'OTTO', 'OUCH', 'OUDS', 'OUKS', 'OULD', 'OULK', 'OUMA', 'OUPA', 'OUPH', 'OUPS', 'OURN', 'OURS', 'OUST', 'OUTS', 'OUZO', 'OVAL', 'OVEL', 'OVEN', 'OVUM', 'OWED', 'OWER', 'OWES', 'OWLS', 'OWLY', 'OWNS', 'OWRE', 'OWSE', 'OWTS', 'OXEN', 'OXER', 'OXES', 'OXID', 'OXIM', 'OYER', 'OYES', 'OYEZ', 'PAAL', 'PACA', 'PACO', 'PACS', 'PACT', 'PACY', 'PADI', 'PADS', 'PAHS', 'PAIK', 'PAIL', 'PAIS', 'PALE', 'PALL', 'PALP', 'PALS', 'PALY', 'PAMS', 'PAND', 'PANE', 'PANG', 'PANS', 'PANT', 'PAPA', 'PAPE', 'PAPS', 'PARA', 'PARD', 'PARE', 'PARP', 'PARR', 'PARS', 'PASE', 'PASH', 'PATE', 'PATS', 'PATU', 'PATY', 'PAUA', 'PAUL', 'PAVE', 'PAVS', 'PAWA', 'PAWK', 'PAWL', 'PAWN', 'PAWS', 'PAYS', 'PEAG', 'PEAL', 'PEAN', 'PEAR', 'PEAS', 'PEAT', 'PEBA', 'PECH', 'PECK', 'PECS', 'PEDS', 'PEED', 'PEEK', 'PEEL', 'PEEN', 'PEEP', 'PEER', 'PEES', 'PEGH', 'PEGS', 'PEHS', 'PEIN', 'PEKE', 'PELA', 'PELE', 'PELF', 'PELL', 'PELT', 'PEND', 'PENE', 'PENI', 'PENK', 'PENS', 'PENT', 'PEON', 'PEPO', 'PEPS', 'PERE', 'PERI', 'PERK', 'PERM', 'PERN', 'PERP', 'PERT', 'PERV', 'PESO', 'PEST', 'PETS', 'PEWS', 'PFFT', 'PFUI', 'PHAT', 'PHEW', 'PHIS', 'PHIZ', 'PHOH', 'PHON', 'PHOS', 'PHOT', 'PHUT', 'PIAL', 'PIAN', 'PIAS', 'PICA', 'PICE', 'PICS', 'PIED', 'PIER', 'PIES', 'PIET', 'PIGS', 'PIKA', 'PIKE', 'PIKI', 'PILA', 'PILE', 'PILI', 'PILL', 'PILY', 'PIMA', 'PIMP', 'PINA', 'PINE', 'PING', 'PINS', 'PINT', 'PINY', 'PION', 'PIOY', 'PIPA', 'PIPI', 'PIPS', 'PIPY', 'PIRL', 'PIRN', 'PIRS', 'PISE', 'PISH', 'PISO', 'PISS', 'PITA', 'PITH', 'PITS', 'PITY', 'PIUM', 'PIXY', 'PIZE', 'PLAP', 'PLAT', 'PLEA', 'PLEB', 'PLED', 'PLEW', 'PLEX', 'PLIE', 'PLIM', 'PLOD', 'PLOP', 'PLOW', 'PLOY', 'PLUE', 'PLUM', 'POAS', 'POCK', 'POCO', 'PODS', 'POEM', 'POEP', 'POET', 'POGO', 'POGY', 'POIS', 'POKE', 'POKY', 'POLE', 'POLK', 'POLO', 'POLS', 'POLT', 'POLY', 'POME', 'POMO', 'POMP', 'POMS', 'POND', 'PONE', 'PONG', 'PONK', 'PONS', 'PONT', 'PONY', 'POOD', 'POOF', 'POOH', 'POOK', 'POON', 'POOP', 'POOS', 'POOT', 'POPE', 'POPS', 'PORE', 'PORK', 'PORN', 'PORY', 'POSE', 'POSH', 'POSS', 'POSY', 'POTE', 'POTS', 'POTT', 'POUF', 'POUK', 'POUR', 'POUT', 'POWN', 'POWS', 'POXY', 'POZZ', 'PRAD', 'PRAM', 'PRAO', 'PRAT', 'PRAU', 'PRAY', 'PREE', 'PREM', 'PREP', 'PREX', 'PREY', 'PREZ', 'PRIG', 'PRIM', 'PROA', 'PROB', 'PROD', 'PROF', 'PROG', 'PROM', 'PROO', 'PROP', 'PROS', 'PROW', 'PRUH', 'PRYS', 'PSIS', 'PSST', 'PTUI', 'PUBE', 'PUBS', 'PUCE', 'PUCK', 'PUDS', 'PUDU', 'PUER', 'PUFF', 'PUGH', 'PUGS', 'PUHA', 'PUIR', 'PUJA', 'PUKA', 'PUKE', 'PUKU', 'PULA', 'PULE', 'PULI', 'PULK', 'PULP', 'PULS', 'PULU', 'PULY', 'PUMA', 'PUMP', 'PUMY', 'PUNA', 'PUNG', 'PUNK', 'PUNS', 'PUNT', 'PUNY', 'PUPA', 'PUPS', 'PUPU', 'PURI', 'PURL', 'PURR', 'PURS', 'PUSS', 'PUTS', 'PUTT', 'PUTZ', 'PUYS', 'PYAS', 'PYAT', 'PYES', 'PYET', 'PYIC', 'PYIN', 'PYNE', 'PYOT', 'PYRE', 'PYRO', 'QADI', 'QAID', 'QATS', 'QOPH', 'QUAD', 'QUAG', 'QUAI', 'QUAT', 'QUAY', 'QUEP', 'QUEY', 'QUID', 'QUIM', 'QUIN', 'QUIP', 'QUIT', 'QUIZ', 'QUOD', 'QUOP', 'RABI', 'RACA', 'RACH', 'RACK', 'RACY', 'RADE', 'RADS', 'RAFF', 'RAFT', 'RAGA', 'RAGE', 'RAGG', 'RAGI', 'RAGS', 'RAHS', 'RAIA', 'RAID', 'RAIK', 'RAIS', 'RAIT', 'RAJA', 'RAKE', 'RAKI', 'RAKU', 'RALE', 'RAMI', 'RAMP', 'RAMS', 'RANA', 'RAND', 'RANG', 'RANI', 'RANT', 'RAPE', 'RAPS', 'RAPT', 'RARK', 'RASE', 'RASH', 'RASP', 'RAST', 'RATA', 'RATH', 'RATO', 'RATS', 'RATU', 'RAUN', 'RAVE', 'RAWN', 'RAWS', 'RAYA', 'RAYS', 'RAZE', 'RAZZ', 'REAK', 'REAM', 'REAN', 'REAP', 'REBS', 'RECK', 'RECS', 'REDD', 'REDE', 'REDO', 'REDS', 'REED', 'REEF', 'REEK', 'REEL', 'REEN', 'REES', 'REFS', 'REFT', 'REGO', 'REGS', 'REHS', 'REIF', 'REIK', 'REIN', 'REIS', 'REKE', 'REMS', 'REND', 'RENK', 'RENS', 'RENY', 'REOS', 'REPO', 'REPP', 'REPS', 'RESH', 'RETE', 'RETS', 'REVS', 'REWS', 'RHEA', 'RHOS', 'RHUS', 'RIAL', 'RIAS', 'RIBA', 'RIBS', 'RICK', 'RICY', 'RIDS', 'RIEL', 'RIEM', 'RIFE', 'RIFF', 'RIFS', 'RIFT', 'RIGG', 'RIGS', 'RILE', 'RILL', 'RIMA', 'RIME', 'RIMS', 'RIMU', 'RIMY', 'RIND', 'RINE', 'RINK', 'RINS', 'RIOT', 'RIPE', 'RIPP', 'RIPS', 'RIPT', 'RISP', 'RITE', 'RITS', 'RITT', 'RITZ', 'RIVA', 'RIVE', 'RIVO', 'RIZA', 'ROAM', 'ROAN', 'ROAR', 'ROBE', 'ROBS', 'ROCH', 'ROCS', 'RODE', 'RODS', 'ROED', 'ROES', 'ROIL', 'ROIN', 'ROJI', 'ROKE', 'ROKS', 'ROKY', 'ROLF', 'ROMA', 'ROMP', 'ROMS', 'RONE', 'RONG', 'RONT', 'ROOD', 'ROOK', 'ROON', 'ROOP', 'ROOS', 'ROPE', 'ROPY', 'RORE', 'RORT', 'RORY', 'ROST', 'ROSY', 'ROTA', 'ROTE', 'ROTI', 'ROTL', 'ROTO', 'ROTS', 'ROUE', 'ROUL', 'ROUM', 'ROUP', 'ROUT', 'ROUX', 'ROVE', 'ROWS', 'ROWT', 'RUBE', 'RUBS', 'RUBY', 'RUCK', 'RUCS', 'RUDD', 'RUDE', 'RUDS', 'RUED', 'RUER', 'RUES', 'RUFF', 'RUGA', 'RUGS', 'RUIN', 'RUKH', 'RULY', 'RUME', 'RUMP', 'RUMS', 'RUND', 'RUNE', 'RUNG', 'RUNS', 'RUNT', 'RURP', 'RURU', 'RUSA', 'RUSE', 'RUSK', 'RUST', 'RUTS', 'RYAL', 'RYAS', 'RYES', 'RYFE', 'RYKE', 'RYND', 'RYOT', 'RYPE', 'SABE', 'SABS', 'SACK', 'SACS', 'SADE', 'SADI', 'SADO', 'SADS', 'SAFT', 'SAGA', 'SAGE', 'SAGO', 'SAGS', 'SAGY', 'SAIC', 'SAIL', 'SAIM', 'SAIN', 'SAIR', 'SAIS', 'SAKI', 'SALL', 'SALP', 'SALS', 'SAMA', 'SAMP', 'SAMS', 'SANE', 'SANG', 'SANK', 'SANS', 'SANT', 'SAPS', 'SARD', 'SARI', 'SARK', 'SARS', 'SASH', 'SASS', 'SATE', 'SATI', 'SAUL', 'SAUT', 'SAVS', 'SAWN', 'SAWS', 'SAXE', 'SAYS', 'SCAB', 'SCAD', 'SCAG', 'SCAM', 'SCAN', 'SCAR', 'SCAT', 'SCAW', 'SCOG', 'SCOP', 'SCOT', 'SCOW', 'SCRY', 'SCUD', 'SCUG', 'SCUL', 'SCUM', 'SCUP', 'SCUR', 'SCUT', 'SCYE', 'SEAL', 'SEAM', 'SEAN', 'SEAR', 'SEAS', 'SECH', 'SECO', 'SECS', 'SECT', 'SEEL', 'SEEP', 'SEER', 'SEES', 'SEGO', 'SEGS', 'SEIF', 'SEIK', 'SEIL', 'SEIR', 'SEIS', 'SEKT', 'SELD', 'SELE', 'SELS', 'SEME', 'SEMI', 'SENA', 'SENE', 'SENS', 'SEPS', 'SERA', 'SERE', 'SERF', 'SERK', 'SERR', 'SERS', 'SESE', 'SESH', 'SESS', 'SETA', 'SETS', 'SETT', 'SEWN', 'SEWS', 'SEXT', 'SEXY', 'SEYS', 'SHAD', 'SHAG', 'SHAH', 'SHAM', 'SHAN', 'SHAT', 'SHAW', 'SHAY', 'SHEA', 'SHED', 'SHES', 'SHET', 'SHEW', 'SHIM', 'SHIN', 'SHIR', 'SHIT', 'SHIV', 'SHMO', 'SHOD', 'SHOE', 'SHOG', 'SHOO', 'SHRI', 'SHUL', 'SHUN', 'SHWA', 'SIAL', 'SIBB', 'SIBS', 'SICE', 'SICH', 'SICS', 'SIDA', 'SIDH', 'SIEN', 'SIES', 'SIFT', 'SIGH', 'SIJO', 'SIKA', 'SIKE', 'SILD', 'SILE', 'SILK', 'SILL', 'SILO', 'SILT', 'SIMA', 'SIMI', 'SIMP', 'SIMS', 'SIND', 'SINE', 'SING', 'SINH', 'SINK', 'SINS', 'SIPE', 'SIPS', 'SIRE', 'SIRI', 'SIRS', 'SISS', 'SIST', 'SITH', 'SITS', 'SITZ', 'SIZY', 'SJOE', 'SKAG', 'SKAS', 'SKAT', 'SKAW', 'SKEE', 'SKEG', 'SKEN', 'SKEO', 'SKEP', 'SKER', 'SKET', 'SKEW', 'SKID', 'SKIM', 'SKIO', 'SKIP', 'SKIS', 'SKIT', 'SKOL', 'SKRY', 'SKUA', 'SKUG', 'SKYF', 'SKYR', 'SLAB', 'SLAE', 'SLAG', 'SLAM', 'SLAP', 'SLAT', 'SLAW', 'SLAY', 'SLED', 'SLEE', 'SLEW', 'SLEY', 'SLID', 'SLIM', 'SLIT', 'SLOB', 'SLOE', 'SLOG', 'SLOP', 'SLOT', 'SLUB', 'SLUE', 'SLUG', 'SLUM', 'SLUR', 'SLUT', 'SMEE', 'SMEW', 'SMIR', 'SMIT', 'SMOG', 'SMUG', 'SMUR', 'SMUT', 'SNAB', 'SNAG', 'SNAP', 'SNAR', 'SNAW', 'SNEB', 'SNED', 'SNEE', 'SNIB', 'SNIG', 'SNIP', 'SNIT', 'SNOB', 'SNOD', 'SNOG', 'SNOT', 'SNUB', 'SNUG', 'SNYE', 'SOAK', 'SOAP', 'SOAR', 'SOBA', 'SOBS', 'SOCA', 'SOCK', 'SOCS', 'SODA', 'SODS', 'SOFA', 'SOGS', 'SOHO', 'SOHS', 'SOJA', 'SOKE', 'SOLA', 'SOLI', 'SOLO', 'SOLS', 'SOMA', 'SOMS', 'SOMY', 'SONE', 'SONS', 'SOOK', 'SOOL', 'SOOM', 'SOOP', 'SOOT', 'SOPH', 'SOPS', 'SORA', 'SORB', 'SORD', 'SORE', 'SORI', 'SORN', 'SOSS', 'SOTH', 'SOTS', 'SOUK', 'SOUM', 'SOUP', 'SOUR', 'SOUS', 'SOUT', 'SOVS', 'SOWF', 'SOWL', 'SOWM', 'SOWN', 'SOWP', 'SOWS', 'SOYA', 'SOYS', 'SPAE', 'SPAG', 'SPAM', 'SPAN', 'SPAR', 'SPAS', 'SPAT', 'SPAW', 'SPAY', 'SPAZ', 'SPEC', 'SPED', 'SPEK', 'SPET', 'SPEW', 'SPIC', 'SPIE', 'SPIF', 'SPIK', 'SPIM', 'SPIN', 'SPIT', 'SPIV', 'SPOD', 'SPRY', 'SPUD', 'SPUE', 'SPUG', 'SPUN', 'SPUR', 'SRIS', 'STAB', 'STAG', 'STAP', 'STAT', 'STAW', 'STED', 'STEM', 'STEN', 'STET', 'STEW', 'STEY', 'STIE', 'STIM', 'STIR', 'STOA', 'STOB', 'STOT', 'STOW', 'STUB', 'STUD', 'STUM', 'STUN', 'STYE', 'SUBA', 'SUBS', 'SUCK', 'SUDD', 'SUDS', 'SUED', 'SUER', 'SUES', 'SUET', 'SUGH', 'SUID', 'SUKH', 'SUKS', 'SULK', 'SULU', 'SUMO', 'SUMP', 'SUMS', 'SUMY', 'SUNG', 'SUNK', 'SUNN', 'SUNS', 'SUPE', 'SUPS', 'SUQS', 'SURA', 'SURD', 'SURF', 'SUSS', 'SUSU', 'SWAB', 'SWAD', 'SWAG', 'SWAM', 'SWAN', 'SWAP', 'SWAT', 'SWAY', 'SWEE', 'SWEY', 'SWIG', 'SWIM', 'SWIZ', 'SWOB', 'SWOP', 'SWOT', 'SWUM', 'SYBO', 'SYCE', 'SYED', 'SYEN', 'SYES', 'SYKE', 'SYLI', 'SYNC', 'SYND', 'SYNE', 'SYPE', 'SYPH', 'TAAL', 'TABI', 'TABS', 'TABU', 'TACE', 'TACH', 'TACK', 'TACO', 'TACT', 'TADS', 'TAED', 'TAEL', 'TAES', 'TAGS', 'TAHA', 'TAHR', 'TAIG', 'TAIL', 'TAIN', 'TAIS', 'TAIT', 'TAKA', 'TAKI', 'TAKS', 'TAKY', 'TALA', 'TALC', 'TALI', 'TAME', 'TAMP', 'TAMS', 'TANA', 'TANE', 'TANG', 'TANH', 'TANS', 'TAOS', 'TAPA', 'TAPS', 'TAPU', 'TARA', 'TARE', 'TARN', 'TARO', 'TARP', 'TARS', 'TART', 'TASH', 'TASS', 'TATE', 'TATH', 'TATS', 'TATT', 'TATU', 'TAUS', 'TAUT', 'TAVA', 'TAVS', 'TAWA', 'TAWS', 'TAWT', 'TAXA', 'TAXI', 'TAYS', 'TEAD', 'TEAK', 'TEAL', 'TEAR', 'TEAS', 'TEAT', 'TECS', 'TEDS', 'TEDY', 'TEED', 'TEEK', 'TEEL', 'TEEM', 'TEEN', 'TEER', 'TEES', 'TEFF', 'TEFS', 'TEGG', 'TEGS', 'TEGU', 'TEHR', 'TEIL', 'TELA', 'TELD', 'TELE', 'TELS', 'TELT', 'TEME', 'TEMP', 'TEMS', 'TENE', 'TENS', 'TENT', 'TEPA', 'TERF', 'TERN', 'TETE', 'TETH', 'TETS', 'TEWS', 'THAE', 'THAR', 'THAW', 'THEE', 'THEW', 'THIG', 'THIO', 'THIR', 'THON', 'THOU', 'THRO', 'THRU', 'THUD', 'THUG', 'TIAR', 'TICE', 'TICH', 'TICK', 'TICS', 'TIDE', 'TIDS', 'TIDY', 'TIED', 'TIER', 'TIES', 'TIFF', 'TIFT', 'TIGE', 'TIGS', 'TIKA', 'TIKE', 'TIKI', 'TILE', 'TILS', 'TILT', 'TIND', 'TINE', 'TING', 'TINK', 'TINS', 'TINT', 'TIPI', 'TIPS', 'TIPT', 'TIRE', 'TIRL', 'TIRO', 'TIRR', 'TITE', 'TITI', 'TITS', 'TIVY', 'TIZZ', 'TOAD', 'TOBY', 'TOCK', 'TOCO', 'TOCS', 'TODS', 'TODY', 'TOEA', 'TOED', 'TOES', 'TOEY', 'TOFF', 'TOFT', 'TOFU', 'TOGA', 'TOGE', 'TOGS', 'TOHO', 'TOIL', 'TOIT', 'TOKE', 'TOKO', 'TOLA', 'TOLE', 'TOLT', 'TOLU', 'TOMB', 'TOME', 'TOMO', 'TOMS', 'TONG', 'TONK', 'TONS', 'TOOM', 'TOON', 'TOOT', 'TOPE', 'TOPH', 'TOPI', 'TOPO', 'TOPS', 'TORA', 'TORC', 'TORE', 'TORI', 'TORN', 'TORO', 'TORR', 'TORS', 'TORT', 'TORY', 'TOSA', 'TOSE', 'TOSH', 'TOSS', 'TOST', 'TOTE', 'TOTS', 'TOUK', 'TOUN', 'TOUT', 'TOWS', 'TOWT', 'TOWY', 'TOYO', 'TOYS', 'TOZE', 'TRAD', 'TRAM', 'TRAP', 'TRAT', 'TRAY', 'TREF', 'TREK', 'TRES', 'TRET', 'TREW', 'TREY', 'TREZ', 'TRIE', 'TRIG', 'TRIM', 'TRIN', 'TRIO', 'TROD', 'TROG', 'TRON', 'TROP', 'TROT', 'TROW', 'TROY', 'TRUG', 'TRYE', 'TRYP', 'TSAR', 'TSKS', 'TUAN', 'TUBA', 'TUBE', 'TUBS', 'TUCK', 'TUFA', 'TUFF', 'TUFT', 'TUGS', 'TUIS', 'TULE', 'TUMP', 'TUMS', 'TUNA', 'TUND', 'TUNG', 'TUNS', 'TUNY', 'TUPS', 'TURD', 'TURF', 'TURK', 'TURM', 'TUSH', 'TUSK', 'TUTS', 'TUTU', 'TUZZ', 'TWAE', 'TWAL', 'TWAS', 'TWAT', 'TWAY', 'TWEE', 'TWIG', 'TWIT', 'TWOS', 'TYDE', 'TYED', 'TYEE', 'TYER', 'TYES', 'TYGS', 'TYIN', 'TYKE', 'TYMP', 'TYND', 'TYNE', 'TYPO', 'TYPP', 'TYPY', 'TYRE', 'TYRO', 'TYTE', 'TZAR', 'UDAL', 'UDON', 'UDOS', 'UEYS', 'UFOS', 'UGHS', 'UGLY', 'UKES', 'ULAN', 'ULES', 'ULEX', 'ULNA', 'ULUS', 'ULVA', 'UMBO', 'UMPH', 'UMPS', 'UMPY', 'UNAI', 'UNAU', 'UNBE', 'UNCE', 'UNCI', 'UNCO', 'UNDE', 'UNDO', 'UNDY', 'UNIS', 'UNTO', 'UPAS', 'UPBY', 'UPDO', 'UPGO', 'UPSY', 'UPTA', 'URAO', 'URBS', 'URDE', 'URDS', 'URDY', 'UREA', 'URES', 'URGE', 'URIC', 'URNS', 'URPS', 'URSA', 'URUS', 'URVA', 'USES', 'UTAS', 'UTES', 'UTIS', 'UTUS', 'UVAE', 'UVAS', 'UVEA', 'VACS', 'VADE', 'VAES', 'VAGI', 'VAGS', 'VAIL', 'VAIN', 'VAIR', 'VALE', 'VALI', 'VAMP', 'VANE', 'VANG', 'VANS', 'VANT', 'VARA', 'VARE', 'VARS', 'VASA', 'VASE', 'VATS', 'VATU', 'VAUS', 'VAUT', 'VAVS', 'VAWS', 'VEAL', 'VEEP', 'VEER', 'VEES', 'VEGA', 'VEGO', 'VEHM', 'VEIL', 'VEIN', 'VELA', 'VELD', 'VELE', 'VELL', 'VENA', 'VEND', 'VENT', 'VERA', 'VERB', 'VERD', 'VERS', 'VERT', 'VEST', 'VETO', 'VETS', 'VEXT', 'VIAE', 'VIAL', 'VIAS', 'VIBE', 'VIBS', 'VIDE', 'VIDS', 'VIED', 'VIER', 'VIES', 'VIGA', 'VIGS', 'VILD', 'VILE', 'VILL', 'VIMS', 'VINA', 'VINE', 'VINO', 'VINS', 'VINT', 'VINY', 'VIOL', 'VIRE', 'VIRL', 'VISA', 'VISE', 'VITA', 'VITE', 'VIVA', 'VIVE', 'VIVO', 'VIZY', 'VLEI', 'VOAR', 'VOES', 'VOID', 'VOLA', 'VOLE', 'VOLK', 'VOLS', 'VOLT', 'VORS', 'VOWS', 'VRIL', 'VROT', 'VROU', 'VROW', 'VUGG', 'VUGH', 'VUGS', 'VULN', 'VUMS', 'WAAC', 'WABS', 'WACK', 'WADD', 'WADE', 'WADI', 'WADS', 'WADT', 'WADY', 'WAES', 'WAFF', 'WAFT', 'WAGS', 'WAID', 'WAIF', 'WAIL', 'WAIN', 'WAIR', 'WAIS', 'WAKA', 'WAKF', 'WALD', 'WALE', 'WALI', 'WALY', 'WAME', 'WAND', 'WANE', 'WANG', 'WANK', 'WANS', 'WANY', 'WAPS', 'WAQF', 'WARB', 'WARE', 'WARK', 'WARN', 'WARP', 'WARS', 'WART', 'WARY', 'WASE', 'WASM', 'WASP', 'WAST', 'WATE', 'WATS', 'WATT', 'WAUK', 'WAUL', 'WAUR', 'WAVY', 'WAWA', 'WAWE', 'WAWL', 'WAWS', 'WAXY', 'WEAL', 'WEAN', 'WEBS', 'WEDS', 'WEED', 'WEEL', 'WEEM', 'WEEN', 'WEEP', 'WEER', 'WEES', 'WEET', 'WEFT', 'WEID', 'WEIL', 'WEIR', 'WEKA', 'WELD', 'WELK', 'WELT', 'WEMB', 'WEMS', 'WENA', 'WEND', 'WENS', 'WEPT', 'WERO', 'WERT', 'WETA', 'WETS', 'WEXE', 'WEYS', 'WHAE', 'WHAM', 'WHAP', 'WHEE', 'WHET', 'WHEW', 'WHEY', 'WHID', 'WHIG', 'WHIM', 'WHIN', 'WHIO', 'WHIP', 'WHIR', 'WHIT', 'WHIZ', 'WHOA', 'WHOP', 'WHOT', 'WHOW', 'WHUP', 'WHYS', 'WICE', 'WICH', 'WICK', 'WIEL', 'WIGS', 'WILE', 'WILI', 'WILT', 'WILY', 'WIMP', 'WINK', 'WINN', 'WINO', 'WINS', 'WINY', 'WIPE', 'WIRY', 'WISP', 'WISS', 'WIST', 'WITE', 'WITS', 'WIVE', 'WOAD', 'WOCK', 'WOES', 'WOFS', 'WOGS', 'WOKE', 'WOKS', 'WOLD', 'WOLF', 'WOMB', 'WONK', 'WONS', 'WONT', 'WOOF', 'WOOL', 'WOON', 'WOOS', 'WOOT', 'WOPS', 'WORM', 'WORN', 'WORT', 'WOST', 'WOTS', 'WOVE', 'WOWF', 'WOWS', 'WRAP', 'WREN', 'WRIT', 'WUDS', 'WUDU', 'WULL', 'WUSS', 'WYCH', 'WYES', 'WYLE', 'WYND', 'WYNN', 'WYNS', 'WYTE', 'XYST', 'YAAR', 'YABA', 'YACK', 'YADS', 'YAFF', 'YAGI', 'YAGS', 'YAHS', 'YAKS', 'YALD', 'YALE', 'YAMS', 'YANG', 'YANK', 'YAPP', 'YAPS', 'YARE', 'YARK', 'YARN', 'YARR', 'YATE', 'YAUD', 'YAUP', 'YAWL', 'YAWN', 'YAWP', 'YAWS', 'YAWY', 'YAYS', 'YBET', 'YEAD', 'YEAN', 'YEAS', 'YEBO', 'YECH', 'YEDE', 'YEED', 'YEGG', 'YELD', 'YELK', 'YELL', 'YELM', 'YELP', 'YELT', 'YENS', 'YEPS', 'YERD', 'YERK', 'YESK', 'YEST', 'YETI', 'YETT', 'YEUK', 'YEVE', 'YEWS', 'YGOE', 'YIDS', 'YIKE', 'YILL', 'YINS', 'YIPE', 'YIPS', 'YIRD', 'YIRK', 'YIRR', 'YITE', 'YLEM', 'YLKE', 'YMPE', 'YMPT', 'YOBS', 'YOCK', 'YODE', 'YODH', 'YODS', 'YOGA', 'YOGH', 'YOGI', 'YOKE', 'YOKS', 'YOLD', 'YOLK', 'YOMP', 'YOND', 'YONI', 'YONT', 'YOOF', 'YOOP', 'YORE', 'YORK', 'YORP', 'YOUK', 'YOUS', 'YOWE', 'YOWL', 'YOWS', 'YUAN', 'YUCA', 'YUCH', 'YUCK', 'YUFT', 'YUGA', 'YUGS', 'YUKE', 'YUKO', 'YUKS', 'YUKY', 'YULE', 'YUMP', 'YUNX', 'YUPS', 'YURT', 'YUTZ', 'YUZU', 'YWIS', 'ZACK', 'ZAGS', 'ZANY', 'ZAPS', 'ZARF', 'ZATI', 'ZEAL', 'ZEAS', 'ZEBU', 'ZEDS', 'ZEES', 'ZEIN', 'ZEKS', 'ZELS', 'ZEPS', 'ZERK', 'ZEST', 'ZETA', 'ZEZE', 'ZHOS', 'ZIFF', 'ZIGS', 'ZILA', 'ZILL', 'ZIMB', 'ZINC', 'ZINE', 'ZING', 'ZINS', 'ZIPS', 'ZITE', 'ZITI', 'ZITS', 'ZIZZ', 'ZOBO', 'ZOBU', 'ZOEA', 'ZOIC', 'ZOLS', 'ZONA', 'ZONK', 'ZOOM', 'ZOON', 'ZOOS', 'ZOOT', 'ZORI', 'ZOUK', 'ZULU', 'ZUPA', 'ZURF', 'ZYGA', 'ZYME', 'ZZZS'];
		words = ['ABLE', 'ACID', 'AGED', 'ALSO', 'AREA', 'ARMY', 'AWAY', 'BABY', 'BACK', 'BALL', 'BAND', 'BANK', 'BASE', 'BATH', 'BEAR', 'BEAT', 'BEEN', 'BEER', 'BELL', 'BELT', 'BEST', 'BILL', 'BIRD', 'BLOW', 'BLUE', 'BOAT', 'BODY', 'BOMB', 'BOND', 'BONE', 'BOOK', 'BOOM', 'BORN', 'BOSS', 'BOTH', 'BOWL', 'BULK', 'BURN', 'BUSH', 'BUSY', 'CALL', 'CALM', 'CAME', 'CAMP', 'CARD', 'CARE', 'CASE', 'CASH', 'CAST', 'CELL', 'CHAT', 'CHIP', 'CITY', 'CLUB', 'COAL', 'COAT', 'CODE', 'COLD', 'COME', 'COOK', 'COOL', 'COPE', 'COPY', 'CORE', 'COST', 'CREW', 'CROP', 'DARK', 'DATA', 'DATE', 'DAWN', 'DAYS', 'DEAD', 'DEAL', 'DEAN', 'DEAR', 'DEBT', 'DEEP', 'DENY', 'DESK', 'DIAL', 'DICK', 'DIET', 'DISC', 'DISK', 'DOES', 'DONE', 'DOOR', 'DOSE', 'DOWN', 'DRAW', 'DREW', 'DROP', 'DRUG', 'DUAL', 'DUKE', 'DUST', 'DUTY', 'EACH', 'EARN', 'EASE', 'EAST', 'EASY', 'EDGE', 'ELSE', 'EVEN', 'EVER', 'EVIL', 'EXIT', 'FACE', 'FACT', 'FAIL', 'FAIR', 'FALL', 'FARM', 'FAST', 'FATE', 'FEAR', 'FEED', 'FEEL', 'FEET', 'FELL', 'FELT', 'FILE', 'FILL', 'FILM', 'FIND', 'FINE', 'FIRE', 'FIRM', 'FISH', 'FIVE', 'FLAT', 'FLOW', 'FOOD', 'FOOT', 'FORD', 'FORM', 'FORT', 'FOUR', 'FREE', 'FROM', 'FUEL', 'FULL', 'FUND', 'GAIN', 'GAME', 'GATE', 'GAVE', 'GEAR', 'GENE', 'GIFT', 'GIRL', 'GIVE', 'GLAD', 'GOAL', 'GOES', 'GOLD', 'GOLF', 'GONE', 'GOOD', 'GRAY', 'GREW', 'GREY', 'GROW', 'GULF', 'HAIR', 'HALF', 'HALL', 'HAND', 'HANG', 'HARD', 'HARM', 'HATE', 'HAVE', 'HEAD', 'HEAR', 'HEAT', 'HELD', 'HELL', 'HELP', 'HERE', 'HERO', 'HIGH', 'HILL', 'HIRE', 'HOLD', 'HOLE', 'HOLY', 'HOME', 'HOPE', 'HOST', 'HOUR', 'HUGE', 'HUNG', 'HUNT', 'HURT', 'IDEA', 'INCH', 'INTO', 'IRON', 'ITEM', 'JACK', 'JANE', 'JEAN', 'JOHN', 'JOIN', 'JUMP', 'JURY', 'JUST', 'KEEN', 'KEEP', 'KENT', 'KEPT', 'KICK', 'KILL', 'KIND', 'KING', 'KNEE', 'KNEW', 'KNOW', 'LACK', 'LADY', 'LAID', 'LAKE', 'LAND', 'LANE', 'LAST', 'LATE', 'LEAD', 'LEFT', 'LESS', 'LIFE', 'LIFT', 'LIKE', 'LINE', 'LINK', 'LIST', 'LIVE', 'LOAD', 'LOAN', 'LOCK', 'LOGO', 'LONG', 'LOOK', 'LORD', 'LOSE', 'LOSS', 'LOST', 'LOVE', 'LUCK', 'MADE', 'MAIL', 'MAIN', 'MAKE', 'MALE', 'MANY', 'MARK', 'MASS', 'MATT', 'MEAL', 'MEAN', 'MEAT', 'MEET', 'MENU', 'MERE', 'MIKE', 'MILE', 'MILK', 'MILL', 'MIND', 'MINE', 'MISS', 'MODE', 'MOOD', 'MOON', 'MORE', 'MOST', 'MOVE', 'MUCH', 'MUST', 'NAME', 'NAVY', 'NEAR', 'NECK', 'NEED', 'NEWS', 'NEXT', 'NICE', 'NICK', 'NINE', 'NONE', 'NOSE', 'NOTE', 'OKAY', 'ONCE', 'ONLY', 'ONTO', 'OPEN', 'ORAL', 'OVER', 'PACE', 'PACK', 'PAGE', 'PAID', 'PAIN', 'PAIR', 'PALM', 'PARK', 'PART', 'PASS', 'PAST', 'PATH', 'PEAK', 'PICK', 'PINK', 'PIPE', 'PLAN', 'PLAY', 'PLOT', 'PLUG', 'PLUS', 'POLL', 'POOL', 'POOR', 'PORT', 'POST', 'PULL', 'PURE', 'PUSH', 'RACE', 'RAIL', 'RAIN', 'RANK', 'RARE', 'RATE', 'READ', 'REAL', 'REAR', 'RELY', 'RENT', 'REST', 'RICE', 'RICH', 'RIDE', 'RING', 'RISE', 'RISK', 'ROAD', 'ROCK', 'ROLE', 'ROLL', 'ROOF', 'ROOM', 'ROOT', 'ROSE', 'RULE', 'RUSH', 'RUTH', 'SAFE', 'SAID', 'SAKE', 'SALE', 'SALT', 'SAME', 'SAND', 'SAVE', 'SEAT', 'SEED', 'SEEK', 'SEEM', 'SEEN', 'SELF', 'SELL', 'SEND', 'SENT', 'SEPT', 'SHIP', 'SHOP', 'SHOT', 'SHOW', 'SHUT', 'SICK', 'SIDE', 'SIGN', 'SITE', 'SIZE', 'SKIN', 'SLIP', 'SLOW', 'SNOW', 'SOFT', 'SOIL', 'SOLD', 'SOLE', 'SOME', 'SONG', 'SOON', 'SORT', 'SOUL', 'SPOT', 'STAR', 'STAY', 'STEP', 'STOP', 'SUCH', 'SUIT', 'SURE', 'TAKE', 'TALE', 'TALK', 'TALL', 'TANK', 'TAPE', 'TASK', 'TEAM', 'TECH', 'TELL', 'TEND', 'TERM', 'TEST', 'TEXT', 'THAN', 'THAT', 'THEM', 'THEN', 'THEY', 'THIN', 'THIS', 'THUS', 'TILL', 'TIME', 'TINY', 'TOLD', 'TOLL', 'TONE', 'TONY', 'TOOK', 'TOOL', 'TOUR', 'TOWN', 'TREE', 'TRIP', 'TRUE', 'TUNE', 'TURN', 'TWIN', 'TYPE', 'UNIT', 'UPON', 'USED', 'USER', 'VARY', 'VAST', 'VERY', 'VICE', 'VIEW', 'VOTE', 'WAGE', 'WAIT', 'WAKE', 'WALK', 'WALL', 'WANT', 'WARD', 'WARM', 'WASH', 'WAVE', 'WAYS', 'WEAK', 'WEAR', 'WEEK', 'WELL', 'WENT', 'WERE', 'WEST', 'WHAT', 'WHEN', 'WHOM', 'WIDE', 'WIFE', 'WILD', 'WILL', 'WIND', 'WINE', 'WING', 'WIRE', 'WISE', 'WISH', 'WITH', 'WOOD', 'WORD', 'WORE', 'WORK', 'YARD', 'YEAH', 'YEAR', 'YOUR', 'ZERO', 'ZONE'];

		
        count = words.length;
		var whichword = 0;
		
		var bs = <?php echo $bscore; ?>;
		var gp = <?php echo $gamesplayed; ?>;
		var user = <?php echo json_encode($usname); ?>;
		
        var score = 0;
        var checkfour = "";
        var chosenindex = [];
        var timenow = 0;
		var timebarchange = true;
		
		var colors = ['#921fde','#58afed','#a6f037','#31d629','#8a4bcc','#edda09','#9114A4','#EB9486','#0E7DCB','#EE6055','#5A5EA0','#B1CC74','#FCAA67'];
		var bcolor = colors[0];
		btncolorback(bcolor);
		
		var alreadyclickedbtn = [];
        
        window.onload = function(){
        	timeout();
            var t = setInterval(timeout, 1);
            run();
        };
		
		document.addEventListener('keydown', function(event) {
			if(event.keyCode == 37) {
				alert('Left was pressed');
			}
			else if(event.keyCode == 39) {
				alert('Right was pressed');
			}
		});
        
        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
              let j = Math.floor(Math.random() * (i + 1));
              [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
		};
        
        function run(){            
            
        	checkfour = '';
            
            var i = Math.floor(Math.random() * count);
            while(chosenindex.includes(i) && chosenindex.length < count){
            	i = Math.floor(Math.random() * count);
            }
            chosenindex.push(i);
			whichword = i;
            var chars = words[i].split('');
            chars = shuffle(chars);
            
            document.getElementById('b1').innerHTML = chars[0];
            document.getElementById('b2').innerHTML = chars[1];
            document.getElementById('b3').innerHTML = chars[2];
            document.getElementById('b4').innerHTML = chars[3];
			
            
        };
        
        function fourclick(id){
			
			if(alreadyclickedbtn.includes(id)){
				
				letter = document.getElementById(id).innerHTML;
				chs = checkfour.split('');
				var j = chs.indexOf(letter);
				chs.splice(j,1);
				checkfour = '';
				for(var x=0;x<chs.length;x++){
					checkfour += chs[x];
				}
				
				document.getElementById(id).style.backgroundColor = bcolor;
				
				displaychange();
				
				
				var i = alreadyclickedbtn.indexOf(id);
				alreadyclickedbtn.splice(i,1);
				
				
			}else {
				alreadyclickedbtn.push(id);
				checkfour += document.getElementById(id).innerHTML;
				document.getElementById(id).style.backgroundColor = "#FFEFD3";
				
				displaychange();
				
			}
		
			
            if(checkfour.length == 4){
				alreadyclickedbtn = [];
            	checkword(checkfour);
            }
			
			
        };
		
		function displaychange(){
			btncolorback1();
			var cars = checkfour.split('');
				if(checkfour.length !== -1){
					var c = bcolor;
					if(checkfour.length == 1){
						document.getElementById('d1').innerHTML = cars[0];
						document.getElementById('d1').style.backgroundColor = c;
					}
					else if(checkfour.length == 2){
						document.getElementById('d1').innerHTML = cars[0];
						document.getElementById('d2').innerHTML = cars[1];
						document.getElementById('d1').style.backgroundColor = c;
						document.getElementById('d2').style.backgroundColor = c;
					}
					else if(checkfour.length == 3){
						document.getElementById('d1').innerHTML = cars[0];
						document.getElementById('d2').innerHTML = cars[1];
						document.getElementById('d3').innerHTML = cars[2];
						document.getElementById('d1').style.backgroundColor = c;
						document.getElementById('d2').style.backgroundColor = c;
						document.getElementById('d3').style.backgroundColor = c;
					}
					else if(checkfour.length == 4){
						document.getElementById('d1').innerHTML = cars[0];
						document.getElementById('d2').innerHTML = cars[1];
						document.getElementById('d3').innerHTML = cars[2];
						document.getElementById('d4').innerHTML = cars[3];
						document.getElementById('d1').style.backgroundColor = c;
						document.getElementById('d2').style.backgroundColor = c;
						document.getElementById('d3').style.backgroundColor = c;
						document.getElementById('d4').style.backgroundColor = c;
					}
					
				}
		}
        
        function checkword(word){
			
        	if(words.includes(word) || hardwords.includes(word)){
				
				var j = Math.floor(Math.random() * colors.length);
				var co = colors[j];
				bcolor = co;
				
				document.getElementById("displayw").style.transform = "scale(1.09)"; 
				setTimeout(function() {
				  document.getElementById("displayw").style.transform = "scale(1)";
					btncolorback1();					  
				}, 200);
				
				setTimeout(function() {

					btncolorback(bcolor);
					run();
				}, 100);
				
                score++;
                timenow -= 1300;
                document.getElementById('score').innerHTML = score;
				
				
            }else{
				 
				shake();
				var x = setInterval(shake, 1);
				
				btncolorback(bcolor);
				setTimeout(function() {
					clearInterval(x);
				  btncolorback1();
				}, 500);
				checkfour = '';
            }
        };
		
		function shake(){
			document.getElementById("displayw").style.transform = "translateX(-5px)";
			setTimeout(function() {
				  document.getElementById("displayw").style.transform = "translateX(5px)";
				}, 5);
			setTimeout(function() {
				  document.getElementById("displayw").style.transform = "translateX(0px)";
				}, 5);
			
			
		}
		
		function btncolorback(co){
			document.getElementById('b1').style.backgroundColor = co;
            document.getElementById('b2').style.backgroundColor = co;
            document.getElementById('b3').style.backgroundColor = co;
            document.getElementById('b4').style.backgroundColor = co;
			
		};
		
		function btncolorback1(){
			var c = '#FFEFD3';
			document.getElementById('d1').style.backgroundColor = c;
			document.getElementById('d2').style.backgroundColor = c;
			document.getElementById('d3').style.backgroundColor = c;
			document.getElementById('d4').style.backgroundColor = c;
			
			document.getElementById('d1').innerHTML = '';
			document.getElementById('d2').innerHTML = '';
			document.getElementById('d3').innerHTML = '';
			document.getElementById('d4').innerHTML = '';
		};
        
        function gameover(){
			
			
			if(score > bs){
				$.post('updatescoredb.php',{postname:user,postscore:score}, function(data){});
			}
			
			updategames();
			
			document.getElementById('display').style.display = 'block';
			document.getElementById('game').style.display = 'none';
			check();
			//window.open("gameover.php", "_self");
			
        };
		
		function updategames(){
			gpp = gp + 1;
			$.post('password.php',{postname:user,gamesp:gpp}, function(data){});
		}
        
        function timeout(){
        	var c = 4500 - timenow;
            if(c>4500) {
				c=4500;
				timenow = 0;
			}
			
			
			if(timebarchange==true && c<1800){
				finishingtime();
				window.d = setInterval(finishingtime, 300);
				timebarchange = false;
				exe = true;
			}
			if(c>1800){
				clearInterval(window.d);
				document.getElementById("timebar").style.backgroundColor = "#646165";
				timebarchange = true;
				exe = false;
			} 
            
            var elem = document.getElementById('timebar');
            var width = Math.floor((c)/45);
            elem.style.width = width + '%';
            
            if(c == 0){
				gameover();
            	clearInterval(t);
            }
            
            
            timenow += 1;
        };
		
		var sh = 1;
		function finishingtime(){
			
			if(sh==1) {
				document.getElementById('timebar').style.backgroundColor = '#ff0000';
				sh=0;
			}else{
				document.getElementById('timebar').style.backgroundColor = '#646165';
				sh=1;
			}
			
		};
		
		
		
		function check() {
			document.getElementById('gop4').innerHTML = score;
			
			var cword = words[whichword];
			cws = cword.split('');
			document.getElementById('f1').innerHTML = cws[0];
			document.getElementById('f2').innerHTML = cws[1];
			document.getElementById('f3').innerHTML = cws[2];
			document.getElementById('f4').innerHTML = cws[3];
		};
		
		function home(){
			window.open("fourhome.php", "_self");
		};
		
		function play(){
			window.open("projectfour.php", "_self");
		};
        
    
    </script>
	
	
    
	
</body>

</html>