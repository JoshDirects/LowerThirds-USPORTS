<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// Connect to MySQL
$conn = mysqli_connect("localhost", "usports", "track", "usports_track");

// Send updates every 5 seconds
while (true) {
  // Retrieve data from MySQL
  $query = "SELECT * FROM current";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  $person_info = $data[0]["refID"];
  //$alternate_info = $data[0]["currentHeight"];
  $current_event = $data[0]["currentEvent"];
  
  $altquery = "SELECT * FROM master WHERE id = $person_info LIMIT 0,1";
  $result_query = mysqli_query($conn, $altquery);
  $dataperson = mysqli_fetch_all($result_query, MYSQLI_ASSOC);
  
  $finalFristName = $dataperson[0]["firstName"];
  $finalLastName = $dataperson[0]["lastName"];
  $finalName = "$finalFristName $finalLastName";
  $finalSchool = $dataperson[0]["school"];
  $gendercheck = $dataperson[0]["gender"];
{switch ($finalSchool) {
case "ALB":
if($gendercheck<1) {$finalSchool="ALBP";$finalSchoolLong="University of Alberta Pandas";} else {$finalSchoolLong="University of Alberta Golden Bears";}
break;
case "BRO":
$finalSchoolLong = "Brock Badgers";
break;
case "UOFC":
$finalSchoolLong = "University of Calgary Dinos";
break;
case "CAR":
$finalSchoolLong = "Carleton Ravens";
break;
case "DAL":
$finalSchoolLong = "Dalhousie Tigers";
break;
case "GUE":
$finalSchoolLong = "Guelph Gryphons";
break;
case "LKH":
$finalSchoolLong = "Lakehead University Thunderwolves";
break;
case "LAV":
$finalSchoolLong = "Laval Rouge-et-Or";
break;
case "LTH":
$finalSchoolLong = "Lethbridge Pronghorns";
break;
case "MAN":
$finalSchoolLong = "Manitoba Bisons";
break;
case "MCG":
if($gendercheck<1) {$finalSchoolLong="McGill Redbirds";} else {$finalSchoolLong="McGill Martlet";}
break;
case "MCM":
$finalSchoolLong = "McMaster Marauders";
break;
case "MUN":
$finalSchoolLong = "Memorial Sea-Hawks";
break;
case "MNC":
$finalSchoolLong = "Moncton Aigles Bleu";
break;
case "UDM":
$finalSchoolLong = "Montreal Carabins";
break;
case "UNB":
$finalSchoolLong = "University of New Brunswick Reds";
break;
case "OTT":
$finalSchoolLong = "Ottawa Gee-Gees";
break;
case "QUN":
$finalSchoolLong = "Queen's University";
break;
case "UOFR":
$finalSchoolLong = "University of Regina Cougars";
break;
case "UOFS":
$finalSchoolLong = "University of Saskatchewan Huskies";
break;
case "SHR":
$finalSchoolLong = "Sherbrooke Vert-et-Or";
break;
case "STFX":
if($gendercheck<1) {$finalSchoolLong="St. Francis Xavier X-Women";} else {$finalSchoolLong="St. Francis Xavier X-Men";}
break;
case "SMU":
$finalSchoolLong = "St. Mary's Huskies";
break;
case "TOR":
$finalSchoolLong = "Toronto Varsity Blues";
break;
case "TWU":
$finalSchoolLong = "Trinity Western Spartans";
break;
case "UQTR":
$finalSchoolLong = "Trois-Rivieres Patriotes";
break;
case "UVIC":
$finalSchoolLong = "University of Victoria Vikes";
break;
case "WAT":
$finalSchoolLong = "Waterloo Warriors";
break;
case "UWO":
$finalSchoolLong = "Western Mustangs";
break;
case "WND":
$finalSchoolLong = "Windsor Lancers";
break;
case "YOR":
$finalSchoolLong = "York Lions";
break;
default: $finalSchoolLong = $finalSchool;}
}
  
  switch ($current_event) {
  case "WPV":
	  	$finalStat = $dataperson[0]["pv"];
	  	break;
	case "WLJ":
	  $finalStat = $dataperson[0]["lj"];
	  break;
	case "WHJ":
	  $finalStat = $dataperson[0]["hj"];
	  break;
	case "WSP":
	  $finalStat = $dataperson[0]["sp"];
	  break;
	case "WWT":
	  $finalStat = $dataperson[0]["wt"];
	  break;
	case "WTJ":
	  $finalStat = $dataperson[0]["tj"];
	  break;
  case "MPV":
      $finalStat = $dataperson[0]["pv"];
      break;
  case "MLJ":
  $finalStat = $dataperson[0]["lj"];
  break;
  case "MHJ":
    $finalStat = $dataperson[0]["hj"];
    break;
  case "MSP":
    $finalStat = $dataperson[0]["sp"];
    break;
  case "MWT":
    $finalStat = $dataperson[0]["wt"];
    break;
  case "MTJ":
    $finalStat = $dataperson[0]["tj"];
    break;
	case "hept":
	  $finalStat = $dataperson[0]["hept"];
	  break;
	case "pent":
	  $finalStat = $dataperson[0]["pent"];
	  break;
    default:
      $finalStat = NULL;
      break;
  }
  
  $finalInfo = array("name"=>$finalName, "school"=>$finalSchool, "schoolLong"=>$finalSchoolLong, "seasonbest"=>$finalStat);
  
  var_dump($current_event);
  
  // Send the retrieved data as an SSE update
  echo "data: " . json_encode($finalInfo) . "\n\n";
  ob_flush();
  flush();

  // Wait for 2 seconds before sending the next update
  sleep(2);
}
?>