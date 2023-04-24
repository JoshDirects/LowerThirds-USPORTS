<DOCTYPE HTML>
	<html>
	<head>
		<style type="text/css">
			body {background-color: rgba(0,0,0,0)!important;}
			@font-face {
				font-family: GROTESK;
				src: url("/fonts/NHaasGroteskTXStd-55Rg.otf") format("opentype");
			}
			@font-face {
				font-family: TIMMONS;
				src: url("/fonts/TIMMONS_NY_FINAL.otf") format("opentype");
			}
			div {display: inline-block;}
			#schoolLogo {
				width: 125px;
				height: 125px;
			}
			#school, #seasonBest, #currentHeight {
				font-family: GROTESK;
				text-transform: uppercase;
			}
			#name {
				font-family: TIMMONS;
				font-size:100px;
				text-transform: uppercase;
				margin-left:5px;
				vertical-align:top;
				
			}
			#school {
				margin-left:140px;
				margin-top: -30px;
			}
			#seasonBest {
				font-size:17px;
				font-weight: 700;
				text-align: right;
				margin-left:10px;
				position: relative;
				top: 70px;
			}
			.ALB:before {content: url("/img/ALB.png");}
			.ALBP:before {content: url("/img/ALBP.png");}
			.BRO:before {content: url("/img/BRO.png");}
			.UOFC:before {content: url("/img/UOFC.png");}
			.CAR:before {content: url("/img/CAR.png");}
			.DAL:before {content: url("/img/DAL.png");}
			.GUE:before {content: url("/img/GUE.png");}
			.LKH:before {content: url("/img/LKH.png");}
			.LAV:before {content: url("/img/LAV.png");}
			.LTH:before {content: url("/img/LTH.png");}
			.MAN:before {content: url("/img/MAN.png");}
			.MCG:before {content: url("/img/MCG.png");}
			.MCM:before {content: url("/img/MCM.png");}
			.MUN:before {content: url("/img/MUN.png");}
			.MNC:before {content: url("/img/MNC.png");}
			.UDM:before {content: url("/img/UDM.png");}
			.UNB:before {content: url("/img/UNB.png");}
			.OTT:before {content: url("/img/OTT.png");}
			.QUN:before {content: url("/img/QUN.png");}
			.UOFR:before {content: url("/img/UOFR.png");}
			.UOFS:before {content: url("/img/UOFS.png");}
			.SHR:before {content: url("/img/SHR.png");}
			.STFX:before {content: url("/img/STFX.png");}
			.SMU:before {content: url("/img/SMU.png");}
			.TOR:before {content: url("/img/TOR.png");}
			.TWU:before {content: url("/img/TWU.png");}
			.UQTR:before {content: url("/img/UQTR.png");}
			.UVIC:before {content: url("/img/UVIC.png");}
			.WAT:before {content: url("/img/WAT.png");}
			.UWO:before {content: url("/img/UWO.png");}
			.WND:before {content: url("/img/WND.png");}
			.YOR:before {content: url("/img/YOR.png");}
			.clearfix::after {
			  content: "";
			  clear: both;
			  display: table;
			}
			.topalign {
				vertical-align:top;
			}
		</style>
	</head>
	<body>
		<div class="topalign">
		<div id="SchoolLogo" class=""></div>
		<div class="topalign"><span id="name"></span>&nbsp;<span id="seasonBest"></span></div><br>
		<div id="school"></div>
		</div>
		<div class="clearfix"></div>
<script>
  // Set up an EventSource object to receive SSE updates
  const eventSource = new EventSource('/rt-update.php');

  // Update the content of the page when an SSE update is received
  eventSource.onmessage = function(event) {
	const data = JSON.parse(event.data);
	// Update the content of the page with the retrieved data
	// For example, you could update a div with an ID of "my-data"
	document.getElementById('name').innerHTML = data["name"];
	document.getElementById('school').innerHTML = data["schoolLong"];
	document.getElementById('SchoolLogo').removeAttribute("class");document.getElementById('SchoolLogo').setAttribute("class", data["school"]);
	document.getElementById('seasonBest').innerHTML = "(SB: " + data["seasonbest"] + ")";
  };
</script>
	</body>
	</html>