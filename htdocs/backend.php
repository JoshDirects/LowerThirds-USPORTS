<?php
if(isset($_GET['sport'])) {
	$sportvalue = $_GET['sport'];
$conn = mysqli_connect("localhost", "usports", "track", "usports_track");

$idtoupdate = 0;
if(isset($_GET['id'])) {
	//DO ID UPDATE
	$idtoupdate = $_GET['id'];
	$updateplayer = "UPDATE `current` SET `refID` = '$idtoupdate', `currentEvent` = '$sportvalue' WHERE `current`.`id` = 1;";
	$results = mysqli_query($conn, $updateplayer);
} else {}
		
switch ($sportvalue) {
	case "pent": $sport = "pent";$gender = 0;break;
	case "hept": $sport = "hept";$gender = 1;break;
	case "WHJ": $sport = "hj";$gender = 0;break;
	case "MHJ": $sport = "hj";$gender = 1;break;
	case "WLJ": $sport = "lj";$gender = 0;break;
	case "MLJ": $sport = "lj";$gender = 1;break;
	case "WPV": $sport = "pv";$gender = 0;break;
	case "MPV": $sport = "pv";$gender = 1;break;
	case "WSP": $sport = "sp";$gender = 0;break;
	case "MSP": $sport = "sp";$gender = 1;break;
	case "WTJ": $sport = "tj";$gender = 0;break;
	case "MTJ": $sport = "tj";$gender = 1;break;
	case "WWT": $sport = "wt";$gender = 0;break;
	case "MWT": $sport = "wt";$gender = 1;break;
	default: echo "Problems abound";
}
	
	$query = "SELECT * FROM master WHERE $sport > 0 AND gender = $gender";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_close($conn);
} else {$sportvalue=NULL;$data=NULL;}

?>
<!DOCTYPE HTML>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/bulma.min.css">
	</head>
	<body>
		<section class="section">
			<div class="container">
				<div class="block"><h3>Select a Gender and Sport from the list below:</h3></div>
<div class="columns block">
<div class="column is-3"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=pent';" class="button is-dark is-large is-fullwidth">PENT</button></div>
<div class="column is-3"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=hept';" class="button is-dark is-large is-fullwidth">HEPT</button></div>
<div class="column is-3"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WHJ';" class="button is-dark is-large is-fullwidth">W HJ</button></div>
<div class="column is-3"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MHJ';" class="button is-dark is-large is-fullwidth">M HJ</button></div>
</div><div class="columns">
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WLJ';" class="button is-dark is-large is-fullwidth">W LJ</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MLJ';" class="button is-dark is-large is-fullwidth">M LJ</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WPV';" class="button is-dark is-large is-fullwidth">W PV</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MPV';" class="button is-dark is-large is-fullwidth">M PV</button></div>
</div><div class="columns">
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WSP';" class="button is-dark is-large is-fullwidth">W SP</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MSP';" class="button is-dark is-large is-fullwidth">M SP</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WTJ';" class="button is-dark is-large is-fullwidth">W TJ</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MTJ';" class="button is-dark is-large is-fullwidth">M TJ</button></div>
</div><div class="columns">
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=WWT';" class="button is-dark is-large is-fullwidth">W WT</button></div>
<div class="column"><button onclick="window.location.href = window.location.href.split('?')[0] + '?sport=MWT';" class="button is-dark is-large is-fullwidth">M WT</button></div>
<div class="column"></div>
<div class="column"></div>
</div>




<br />
<?php
if($sportvalue>NULL){
	echo "<div class='block'><h3>$sportvalue - Athletes</h3></div><div class='columns block'>";
	//Proceed with buttons for each person
	$count = 0;
	foreach ($data as $row) {
		$id = $row["id"];
		$fname = $row["firstName"];
		$lname = $row["lastName"];
		$school = $row["school"];
		$combinedName = "$fname $lname";
		if($count % 3 == 0) {echo "</div><div class='columns'>";}
		if($id==$idtoupdate){$outline = "";} else {$outline = "is-outlined";}
		echo "<div class='column'><button onclick=\"window.location.href = window.location.href.split('?')[0] + '?sport=$sportvalue&id=$id';\" class=\"button is-large is-danger is-fullwidth is-clipped $outline\">$school $combinedName</button></div>";	
		$count+=1;
	}
	echo "</div>";
}
?>
			</div>
		</section>
	</body>
	</html>