<?php 

// ESTABLISH VARIABLES
$dbTableA="AIRTEMP";
$dbTableA_O="AIRTEMP_O";
$dbTableCO2="CO2";
$dbTableCON="CONNECTIONS";
$dbTableE="ERRORS";
$dbTableFI="FLOW_I";
$dbTableFH="FLOW_H";
$dbTableFan="FANS";
$dbTableIrrig="IRRIG";
$dbTableH="HUMIDITY";
$dbTableDH="DEHUMID";
//$dbTableH_O="HUMIDITY_O";
$dbTableMS="MENU_STATUS";
$dbTableSP="SET_POINTS";
$dbTableS="SOILTEMP";
$dbTableW="WATERTEMP";
$dbTableElec="ELECTRICITY";
$dbTableLEDS="LEDS";
$dbTableWatering="WATERING";

global $dbhost;
global $dbuser;
global $dbpassword;

// OPEN MYSQL CONNECTION

$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword");
if (! $link) die("Couldn't connect to MySQL");
mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());

// COLLECT DATA RE MIN AND MAX SETPOINTS

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '1'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $CO2_MIN = $valuesSP['MIN'];
   $CO2_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '2'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $HUMIDITY_MIN = $valuesSP['MIN'];
   $HUMIDITY_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '3'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $FLOW_I_MIN = $valuesSP['MIN'];
   $FLOW_I_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '12'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $FLOW_H_MIN = $valuesSP['MIN'];
   $FLOW_H_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '4'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $AIR_MIN = $valuesSP['MIN'];
   $AIR_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '5'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $SOIL_MIN = $valuesSP['MIN'];
   $SOIL_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '6'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $WATER_MIN = $valuesSP['MIN'];
   $WATER_MAX = $valuesSP['MAX'];
}  

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '9'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $KW_MIN = $valuesSP['MIN'];
   $KW_MAX = $valuesSP['MAX'];
} 

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '10'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $KWH_MIN = $valuesSP['MIN'];
   $KWH_MAX = $valuesSP['MAX'];
} 

$rowSP = mysql_query("SELECT * FROM $dbTableSP WHERE ID = '11'") or die ("SELECT Error: ".mysql_error());
while($valuesSP=mysql_fetch_array($rowSP)) {
   $LEDS_MIN = $valuesSP['MIN'];
   $LEDS_MAX = $valuesSP['MAX'];
} 

// VALIDATE AND CLEANSE GET ARRAY; UPDATE ERROR STATUS

if (!is_numeric($_GET['A_1T'])) { 
//UPDATE ERRORS SET NEWBAD= CASE WHEN Bad=1 THEN now() END WHERE Sensor='HUMIDITY'
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_1T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1T'");
	$A_1T = "NULL";
	} else {
		if ($_GET['A_1T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_1T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_1T'");
			$A_1T = $_GET['A_1T'];
			} else {
				if ($_GET['A_1T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_1T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_1T'");
				$A_1T = $_GET['A_1T'];
				} else { 
					$A_1T = $_GET['A_1T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1T'");
					}
			}
		}

if (!is_numeric($_GET['A_1M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_1M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1M'");
	$A_1M = "NULL";
	} else {
		if ($_GET['A_1M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_1M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_1M'");
			$A_1M = $_GET['A_1M'];
			} else {
				if ($_GET['A_1M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_1M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_1M'");
				$A_1M = $_GET['A_1M'];
				} else { 
					$A_1M = $_GET['A_1M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1M'");
					}
			}
		}

if (!is_numeric($_GET['A_1B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_1B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1B'");
	$A_1B = "NULL";
	} else {
		if ($_GET['A_1B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_1B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_1B'");
			$A_1B = $_GET['A_1B'];
			} else {
				if ($_GET['A_1B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_1B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_1B'");
				$A_1B = $_GET['A_1B'];
				} else { 
					$A_1B = $_GET['A_1B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_1B'");
					}
			}
		}
		
if (!is_numeric($_GET['A_2T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_2T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2T'");
	$A_2T = "NULL";
	} else {
		if ($_GET['A_2T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_2T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_2T'");
			$A_2T = $_GET['A_2T'];
			} else {
				if ($_GET['A_2T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_2T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_2T'");
				$A_2T = $_GET['A_2T'];
				} else { 
					$A_2T = $_GET['A_2T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2T'");
					}
			}
		}

if (!is_numeric($_GET['A_2M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_2M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2M'");
	$A_2M = "NULL";
	} else {
		if ($_GET['A_2M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_2M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_2M'");
			$A_2M = $_GET['A_2M'];
			} else {
				if ($_GET['A_2M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_2M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_2M'");
				$A_2M = $_GET['A_2M'];
				} else { 
					$A_2M = $_GET['A_2M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2M'");
					}
			}
		}

if (!is_numeric($_GET['A_2B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_2B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2B'");
	$A_2B = "NULL";
	} else {
		if ($_GET['A_2B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_2B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_2B'");
			$A_2B = $_GET['A_2B'];
			} else {
				if ($_GET['A_2B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_2B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_2B'");
				$A_2B = $_GET['A_2B'];
				} else { 
					$A_2B = $_GET['A_2B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_2B'");
					}
			}
		}
		
if (!is_numeric($_GET['A_3T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_3T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3T'");
	$A_3T = "NULL";
	} else {
		if ($_GET['A_3T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_3T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_3T'");
			$A_3T = $_GET['A_3T'];
			} else {
				if ($_GET['A_3T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_3T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_3T'");
				$A_3T = $_GET['A_3T'];
				} else { 
					$A_3T = $_GET['A_3T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3T'");
					}
			}
		}
		
if (!is_numeric($_GET['A_3M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_3M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3M'");
	$A_3M = "NULL";
	} else {
		if ($_GET['A_3M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_3M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_3M'");
			$A_3M = $_GET['A_3M'];
			} else {
				if ($_GET['A_3M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_3M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_3M'");
				$A_3M = $_GET['A_3M'];
				} else { 
					$A_3M = $_GET['A_3M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3M'");
					}
			}
		}

if (!is_numeric($_GET['A_3B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_3B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3B'");
	$A_3B = "NULL";
	} else {
		if ($_GET['A_3B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_3B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_3B'");
			$A_3B = $_GET['A_3B'];
			} else {
				if ($_GET['A_3B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_3B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_3B'");
				$A_3B = $_GET['A_3B'];
				} else { 
					$A_3B = $_GET['A_3B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_3B'");
					}
			}
		}

if (!is_numeric($_GET['A_4T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_4T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4T'");
	$A_4T = "NULL";
	} else {
		if ($_GET['A_4T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_4T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_4T'");
			$A_4T = $_GET['A_4T'];
			} else {
				if ($_GET['A_4T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_4T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_4T'");
				$A_4T = $_GET['A_4T'];
				} else { 
					$A_4T = $_GET['A_4T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4T'");
					}
			}
		}

if (!is_numeric($_GET['A_4M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_4M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4M'");
	$A_4M = "NULL";
	} else {
		if ($_GET['A_4M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_4M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_4M'");
			$A_4M = $_GET['A_4M'];
			} else {
				if ($_GET['A_4M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_4M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_4M'");
				$A_4M = $_GET['A_4M'];
				} else { 
					$A_4M = $_GET['A_4M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4M'");
					}
			}
		}

if (!is_numeric($_GET['A_4B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='AIR_4B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4B'");
	$A_4B = "NULL";
	} else {
		if ($_GET['A_4B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='AIR_4B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='AIR_4B'");
			$A_4B = $_GET['A_4B'];
			} else {
				if ($_GET['A_4B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='AIR_4B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='AIR_4B'");
				$A_4B = $_GET['A_4B'];
				} else { 
					$A_4B = $_GET['A_4B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='AIR_4B'");
					}
			}
		}

if (!is_numeric($_GET['S_1T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_1T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1T'");
	$S_1T = "NULL";
	} else {
		if ($_GET['S_1T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_1T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_1T'");
			$S_1T = $_GET['S_1T'];
			} else {
				if ($_GET['S_1T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_1T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_1T'");
				$S_1T = $_GET['S_1T'];
				} else { 
					$S_1T = $_GET['S_1T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1T'");
					}
			}
		}

if (!is_numeric($_GET['S_1M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_1M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1M'");
	$S_1M = "NULL";
	} else {
		if ($_GET['S_1M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_1M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_1M'");
			$S_1M = $_GET['S_1M'];
			} else {
				if ($_GET['S_1M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_1M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_1M'");
				$S_1M = $_GET['S_1M'];
				} else { 
					$S_1M = $_GET['S_1M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1M'");
					}
			}
		}

if (!is_numeric($_GET['S_1B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_1B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1B'");
	$S_1B = "NULL";
	} else {
		if ($_GET['S_1B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_1B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_1B'");
			$S_1B = $_GET['S_1B'];
			} else {
				if ($_GET['S_1B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_1B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_1B'");
				$S_1B = $_GET['S_1B'];
				} else { 
					$S_1B = $_GET['S_1B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_1B'");
					}
			}
		}

if (!is_numeric($_GET['S_2T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_2T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2T'");
	$S_2T = "NULL";
	} else {
		if ($_GET['S_2T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_2T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_2T'");
			$S_2T = $_GET['S_2T'];
			} else {
				if ($_GET['S_2T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_2T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_2T'");
				$S_2T = $_GET['S_2T'];
				} else { 
					$S_2T = $_GET['S_2T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2T'");
					}
			}
		}

if (!is_numeric($_GET['S_2M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_2M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2M'");
	$S_2M = "NULL";
	} else {
		if ($_GET['S_2M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_2M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_2M'");
			$S_2M = $_GET['S_2M'];
			} else {
				if ($_GET['S_2M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_2M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_2M'");
				$S_2M = $_GET['S_2M'];
				} else { 
					$S_2M = $_GET['S_2M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2M'");
					}
			}
		}

if (!is_numeric($_GET['S_2B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_2B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2B'");
	$S_2B = "NULL";
	} else {
		if ($_GET['S_2B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_2B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_2B'");
			$S_2B = $_GET['S_2B'];
			} else {
				if ($_GET['S_2B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_2B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_2B'");
				$S_2B = $_GET['S_2B'];
				} else { 
					$S_2B = $_GET['S_2B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_2B'");
					}
			}
		}
		
if (!is_numeric($_GET['S_3T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_3T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3T'");
	$S_3T = "NULL";
	} else {
		if ($_GET['S_3T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_3T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_3T'");
			$S_3T = $_GET['S_3T'];
			} else {
				if ($_GET['S_3T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_3T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_3T'");
				$S_3T = $_GET['S_3T'];
				} else { 
					$S_3T = $_GET['S_3T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3T'");
					}
			}
		}

if (!is_numeric($_GET['S_3M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_3M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3M'");
	$S_3M = "NULL";
	} else {
		if ($_GET['S_3M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_3M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_3M'");
			$S_3M = $_GET['S_3M'];
			} else {
				if ($_GET['S_3M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_3M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_3M'");
				$S_3M = $_GET['S_3M'];
				} else { 
					$S_3M = $_GET['S_3M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3M'");
					}
			}
		}

if (!is_numeric($_GET['S_3B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_3B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3B'");
	$S_3B = "NULL";
	} else {
		if ($_GET['S_3B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_3B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_3B'");
			$S_3B = $_GET['S_3B'];
			} else {
				if ($_GET['S_3B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_3B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_3B'");
				$S_3B = $_GET['S_3B'];
				} else { 
					$S_3B = $_GET['S_3B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_3B'");
					}
			}
		}

if (!is_numeric($_GET['S_4T'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_4T'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4T'");
	$S_4T = "NULL";
	} else {
		if ($_GET['S_4T'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_4T'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_4T'");
			$S_4T = $_GET['S_4T'];
			} else {
				if ($_GET['S_4T'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_4T'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_4T'");
				$S_4T = $_GET['S_4T'];
				} else { 
					$S_4T = $_GET['S_4T'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4T'");
					}
			}
		}

if (!is_numeric($_GET['S_4M'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_4M'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4M'");
	$S_4M = "NULL";
	} else {
		if ($_GET['S_4M'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_4M'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_4M'");
			$S_4M = $_GET['S_4M'];
			} else {
				if ($_GET['S_4M'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_4M'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_4M'");
				$S_4M = $_GET['S_4M'];
				} else { 
					$S_4M = $_GET['S_4M'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4M'");
					}
			}
		}

if (!is_numeric($_GET['S_4B'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='SOIL_4B'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4B'");
	$S_4B = "NULL";
	} else {
		if ($_GET['S_4B'] < $AIR_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='SOIL_4B'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='SOIL_4B'");
			$S_4B = $_GET['S_4B'];
			} else {
				if ($_GET['S_4B'] > $AIR_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='SOIL_4B'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='SOIL_4B'");
				$S_4B = $_GET['S_4B'];
				} else { 
					$S_4B = $_GET['S_4B'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='SOIL_4B'");
					}
			}
		}

if (!is_numeric($_GET['INLET'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='INLET'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='INLET'");
	$INLET = "NULL";
	} else {
		if ($_GET['INLET'] < $WATER_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='INLET'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='INLET'");
			$INLET = $_GET['INLET'];
			} else {
				if ($_GET['INLET'] > $WATER_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='INLET'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='INLET'");
				$INLET = $_GET['INLET'];
				} else { 
					$INLET = $_GET['INLET'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='INLET'");
					}
			}
		}

if (!is_numeric($_GET['OUTLET'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='OUTLET'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='OUTLET'");
	$OUTLET = "NULL";
	} else {
		if ($_GET['OUTLET'] < $WATER_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='OUTLET'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='OUTLET'");
			$OUTLET = $_GET['OUTLET'];
			} else {
				if ($_GET['OUTLET'] > $WATER_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='OUTLET'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='OUTLET'");
				$OUTLET = $_GET['OUTLET'];
				} else { 
					$OUTLET = $_GET['OUTLET'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='OUTLET'");
					}
			}
		}

if (!is_numeric($_GET['CO2']) || ($_GET['CO2'] > 3000) || ($_GET['CO2'] < 0)) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='CO2'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='CO2'");
	$CO2 = "NULL";
	} else {
		if ($_GET['CO2'] < $CO2_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='CO2'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='CO2'");
			$CO2 = $_GET['CO2'];
			} else {
				if ($_GET['CO2'] > $CO2_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='CO2'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='CO2'");
				$CO2 = $_GET['CO2'];
				} else { 
					$CO2 = $_GET['CO2'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='CO2'");
					}
			}
		}

if (!is_numeric($_GET['FLOW_H'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FLOW_H'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FLOW_H'");
	$FLOW_H = "NULL";
	} else {
		if ($_GET['FLOW_H'] < $FLOW_H_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='FLOW_H'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='FLOW_H'");
			$FLOW_H = $_GET['FLOW_H'];
			} else {
				if ($_GET['FLOW_H'] > $FLOW_H_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='FLOW_H'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='FLOW_H'");
				$FLOW_H = $_GET['FLOW_H'];
				} else { 
					$FLOW_H = $_GET['FLOW_H'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FLOW_H'");
					}
			}
		}

if (!is_numeric($_GET['FLOW_I'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FLOW_I'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FLOW_I'");
	$FLOW_I = "NULL";
	} else {
		if ($_GET['FLOW_I'] < $FLOW_I_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='FLOW_I'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='FLOW_I'");
			$FLOW_I = $_GET['FLOW_I'];
			} else {
				if ($_GET['FLOW_I'] > $FLOW_I_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='FLOW_I'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='FLOW_I'");
				$FLOW_I = $_GET['FLOW_I'];
				} else { 
					$FLOW_I = $_GET['FLOW_I'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FLOW_I'");
					}
			}
		}

if (!is_numeric($_GET['HUMIDITY_R1H2'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='HUMIDITY_1'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='HUMIDITY_1'");
	$HUMIDITY_1 = "NULL";
	} else {
		if ($_GET['HUMIDITY_R1H2'] < $HUMIDITY_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='HUMIDITY_1'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='HUMIDITY_1'");
			$HUMIDITY_1 = $_GET['HUMIDITY_R1H2'];
			} else {
				if ($_GET['HUMIDITY_R1H2'] > $HUMIDITY_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='HUMIDITY_1'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='HUMIDITY_1'");
				$HUMIDITY_1 = $_GET['HUMIDITY_R1H2'];
				} else { 
					$HUMIDITY_1 = $_GET['HUMIDITY_R1H2'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='HUMIDITY_1'");
					}
			}
		}

if (!is_numeric($_GET['HUMIDITY_3H2'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='HUMIDITY_3'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='HUMIDITY_3'");
	$HUMIDITY_3 = "NULL";
	} else {
		if ($_GET['HUMIDITY_3H2'] < $HUMIDITY_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='HUMIDITY_3'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='HUMIDITY_3'");
			$HUMIDITY_3 = $_GET['HUMIDITY_3H2'];
			} else {
				if ($_GET['HUMIDITY_3H2'] > $HUMIDITY_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='HUMIDITY_3'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='HUMIDITY_3'");
				$HUMIDITY_3 = $_GET['HUMIDITY_3H2'];
				} else { 
					$HUMIDITY_3 = $_GET['HUMIDITY_3H2'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='HUMIDITY_3'");
					}
			}
		}

if (!is_numeric($_GET['KW'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='KW'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='KW'");
	$KW = "NULL";
	} else {
		if ($_GET['KW'] < $KW_MIN) {
			mysql_query("UPDATE $dbTableE SET NEWLOW= CASE WHEN Low=0 THEN now() ELSE NEWLOW END WHERE Sensor='KW'");
			mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=1, Stale=0 WHERE Sensor='KW'");
			$KW = $_GET['KW'];
			} else {
				if ($_GET['KW'] > $KW_MAX) {
				mysql_query("UPDATE $dbTableE SET NEWHIGH= CASE WHEN HIGH=0 THEN now() ELSE NEWHIGH END WHERE Sensor='KW'");
				mysql_query("UPDATE $dbTableE SET Bad=0, High=1, Low=0, Stale=0 WHERE Sensor='KW'");
				$KW = $_GET['KW'];
				} else { 
					$KW = $_GET['KW'];
					mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='KW'");
					}
			}
		}

if (!is_numeric($_GET['KWH'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='KWH'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='KWH'");
	$KWH = "NULL";
	} else {
		$KWH = $_GET['KWH'];
		mysql_query("UPDATE $dbTableE SET Bad=0, Stale=0 WHERE Sensor='KWH'");
		}

if (!is_numeric($_GET['LEDS'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='LEDS'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='LEDS'");
	$LEDS = "NULL";
	} else {
		$LEDS = $_GET['LEDS'];
		mysql_query("UPDATE $dbTableE SET Bad=0, Stale=0 WHERE Sensor='LEDS'");
		}
	
if (!is_numeric($_GET['AIRTEMP_O'])) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='O_AIRTEMP'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='O_AIRTEMP'");
	$AIRTEMP_O = "NULL";
	} else {
		$AIRTEMP_O = $_GET['AIRTEMP_O'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='O_AIRTEMP'");
		}

if (($_GET['FAN_1']!=0) && ($_GET['FAN_1'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FAN_1'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FAN_1'");
	$FAN_1 = "NULL";
	} else {
		$FAN_1 = $_GET['FAN_1'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FAN_1'");
		}

if (($_GET['FAN_2']!=0) && ($_GET['FAN_2'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FAN_2'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FAN_2'");
	$FAN_2 = "NULL";
	} else {
		$FAN_2 = $_GET['FAN_2'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FAN_2'");
		}

if (($_GET['FAN_3']!=0) && ($_GET['FAN_3'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FAN_3'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FAN_3'");
	$FAN_3 = "NULL";
	} else {
		$FAN_3 = $_GET['FAN_3'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FAN_3'");
		}
		
if (($_GET['FAN_4']!=0) && ($_GET['FAN_4'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='FAN_4'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='FAN_4'");
	$FAN_4 = "NULL";
	} else {
		$FAN_4 = $_GET['FAN_4'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='FAN_4'");
		}		

if (($_GET['IRRIG_1']!=0) && ($_GET['IRRIG_1'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='IRRIG_1'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_1'");
	$IRRIG_1 = "NULL";
	} else {
		$IRRIG_1 = $_GET['IRRIG_1'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_1'");
		$Vrow = mysql_query("SELECT * FROM $dbTableWatering WHERE ID = '1'") or die ("SELECT Error: ".mysql_error());
		while($Vvalues=mysql_fetch_array($Vrow)) {
   			$Vstatus = $Vvalues['STATUS'];
   			}  		
		if (($Vstatus == 0) && ($_GET['IRRIG_1']==1)) {
			mysql_query("UPDATE $dbTableWatering SET LASTSTATUSON=now() WHERE ID=1");
		    } else {
			if (($Vstatus == 1) && ($_GET['IRRIG_1']==0)) {
				mysql_query("UPDATE $dbTableWatering SET LASTSTATUSOFF=now() WHERE ID=1");
		 	   }
			}
		mysql_query("UPDATE $dbTableWatering SET STATUS=$IRRIG_1 WHERE ID=1");
		}

if (($_GET['IRRIG_2']!=0) && ($_GET['IRRIG_2'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='IRRIG_2'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_2'");
	$IRRIG_2 = "NULL";
	} else {
		$IRRIG_2 = $_GET['IRRIG_2'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_2'");
		$Vrow = mysql_query("SELECT * FROM $dbTableWatering WHERE ID = '2'") or die ("SELECT Error: ".mysql_error());
		while($Vvalues=mysql_fetch_array($Vrow)) {
   			$Vstatus = $Vvalues['STATUS'];
   			}  		
		if (($Vstatus == 0) && ($_GET['IRRIG_2']==1)) {
			mysql_query("UPDATE $dbTableWatering SET LASTSTATUSON=now() WHERE ID=2");
		    } else {
			if (($Vstatus == 1) && ($_GET['IRRIG_2']==0)) {
				mysql_query("UPDATE $dbTableWatering SET LASTSTATUSOFF=now() WHERE ID=2");
		 	   }
			}
		mysql_query("UPDATE $dbTableWatering SET STATUS=$IRRIG_2 WHERE ID=2");
		}

if (($_GET['IRRIG_3']!=0) && ($_GET['IRRIG_3'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='IRRIG_3'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_3'");
	$IRRIG_3 = "NULL";
	} else {
		$IRRIG_3 = $_GET['IRRIG_3'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_3'");
		$Vrow = mysql_query("SELECT * FROM $dbTableWatering WHERE ID = '3'") or die ("SELECT Error: ".mysql_error());
		while($Vvalues=mysql_fetch_array($Vrow)) {
   			$Vstatus = $Vvalues['STATUS'];
   			}  		
		if (($Vstatus == 0) && ($_GET['IRRIG_3']==1)) {
			mysql_query("UPDATE $dbTableWatering SET LASTSTATUSON=now() WHERE ID=3");
		    } else {
			if (($Vstatus == 1) && ($_GET['IRRIG_3']==0)) {
				mysql_query("UPDATE $dbTableWatering SET LASTSTATUSOFF=now() WHERE ID=3");
		 	   }
			}
		mysql_query("UPDATE $dbTableWatering SET STATUS=$IRRIG_3 WHERE ID=3");
		}
		
if (($_GET['IRRIG_4']!=0) && ($_GET['IRRIG_4'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='IRRIG_4'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_4'");
	$IRRIG_4 = "NULL";
	} else {
		$IRRIG_4 = $_GET['IRRIG_4'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='IRRIG_4'");
		$Vrow = mysql_query("SELECT * FROM $dbTableWatering WHERE ID = '4'") or die ("SELECT Error: ".mysql_error());
		while($Vvalues=mysql_fetch_array($Vrow)) {
   			$Vstatus = $Vvalues['STATUS'];
   			}  		
		if (($Vstatus == 0) && ($_GET['IRRIG_4']==1)) {
			mysql_query("UPDATE $dbTableWatering SET LASTSTATUSON=now() WHERE ID=4");
		    } else {
			if (($Vstatus == 1) && ($_GET['IRRIG_4']==0)) {
				mysql_query("UPDATE $dbTableWatering SET LASTSTATUSOFF=now() WHERE ID=4");
		 	   }
			}
		mysql_query("UPDATE $dbTableWatering SET STATUS=$IRRIG_4 WHERE ID=4");
		}		

if (($_GET['DEHUMID']!=0) && ($_GET['DEHUMID'])!=1) { 
	mysql_query("UPDATE $dbTableE SET NEWBAD= CASE WHEN Bad=0 THEN now() ELSE NEWBAD END WHERE Sensor='DEHUMID'");
	mysql_query("UPDATE $dbTableE SET Bad=1, High=0, Low=0, Stale=0 WHERE Sensor='DEHUMID'");
	$DEHUMID = "NULL";
	} else {
		$DEHUMID = $_GET['DEHUMID'];
		mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='DEHUMID'");
		}			
		
// CALCULATE MEAN

$airarray = array($A_1T, $A_2T, $A_3T, $A_4T, $A_1M, $A_2M, $A_3M, $A_4M, $A_1B, $A_2B, $A_3B, $A_4B); 
$airarray_without_nulls = array_filter($airarray, "is_numeric");
if (count($airarray_without_nulls) != 0) { $AIRMEAN = (array_sum($airarray_without_nulls) / count($airarray_without_nulls)); } else { $AIRMEAN = 0; } 
if (($AIRMEAN == 0) || is_nan($AIRMEAN)) { $AIRMEAN = "NULL"; }

$soilarray = array($S_1T, $S_2T, $S_3T, $S_4T, $S_1M, $S_2M, $S_3M, $S_4M, $S_1B, $S_2B, $S_3B, $S_4B); 
$soilarray_without_nulls = array_filter($soilarray, "is_numeric");
if (count($soilarray_without_nulls) != 0) { $SOILMEAN = (array_sum($soilarray_without_nulls) / count($soilarray_without_nulls)); } else { $SOILMEAN = 0; } 
if (($SOILMEAN == 0) || is_nan($SOILMEAN)) { $SOILMEAN = "NULL"; }

$waterarray = array($INLET, $OUTLET); 
$waterarray_without_nulls = array_filter($waterarray, "is_numeric");
if (count($waterarray_without_nulls) != 0) { $WATERMEAN = (array_sum($waterarray_without_nulls) / count($waterarray_without_nulls)); } else { $WATERMEAN = 0; } 
if (($WATERMEAN == 0) || is_nan($WATERMEAN)) { $WATERMEAN = "NULL"; }

$humidityarray = array($HUMIDITY_1, $HUMIDITY_3); 
$humidityarray_without_nulls = array_filter($humidityarray, "is_numeric");
if (count($humidityarray_without_nulls) != 0) { $HUMIDITYMEAN = (array_sum($humidityarray_without_nulls) / count($humidityarray_without_nulls)); } else { $HUMIDITYMEAN = 0; } 
if (($HUMIDITYMEAN == 0) || is_nan($HUMIDITYMEAN)) { $HUMIDITYMEAN = "NULL"; }

// INSERT SENSOR DATA

mysql_query("INSERT INTO $dbTableA VALUES (NULL, CURRENT_TIMESTAMP, $A_1T, $A_1M, $A_1B, $A_2T, $A_2M, $A_2B, $A_3T, $A_3M, $A_3B, $A_4T, $A_4M, $A_4B, $AIRMEAN)");
mysql_query("INSERT INTO $dbTableA_O VALUES (NULL, CURRENT_TIMESTAMP, $AIRTEMP_O)");
mysql_query("INSERT INTO $dbTableCO2 VALUES (NULL, CURRENT_TIMESTAMP, $CO2)");
mysql_query("INSERT INTO $dbTableFI VALUES (NULL, CURRENT_TIMESTAMP, $FLOW_I)");
mysql_query("INSERT INTO $dbTableFH VALUES (NULL, CURRENT_TIMESTAMP, $FLOW_H)");
mysql_query("INSERT INTO $dbTableDH VALUES (NULL, CURRENT_TIMESTAMP, $DEHUMID)");
mysql_query("INSERT INTO $dbTableH VALUES (NULL, CURRENT_TIMESTAMP, $HUMIDITY_1, $HUMIDITY_3, $HUMIDITYMEAN)");
mysql_query("INSERT INTO $dbTableFan VALUES (NULL, CURRENT_TIMESTAMP, $FAN_1, $FAN_2, $FAN_3, $FAN_4)");
mysql_query("INSERT INTO $dbTableIrrig VALUES (NULL, CURRENT_TIMESTAMP, $IRRIG_1, $IRRIG_2, $IRRIG_3, $IRRIG_4)");
mysql_query("INSERT INTO $dbTableS VALUES (NULL, CURRENT_TIMESTAMP, $S_1T, $S_1M, $S_1B, $S_2T, $S_2M, $S_2B, $S_3T, $S_3M, $S_3B, $S_4T, $S_4M, $S_4B, $SOILMEAN)");
mysql_query("INSERT INTO $dbTableW VALUES (NULL, CURRENT_TIMESTAMP, $INLET, $OUTLET, $WATERMEAN)");
mysql_query("INSERT INTO $dbTableElec VALUES (NULL, CURRENT_TIMESTAMP, $KW, $KWH)");
mysql_query("INSERT INTO $dbTableLEDS VALUES (NULL, CURRENT_TIMESTAMP, $LEDS)");

// INSERT CONNECTION DATA

mysql_query("UPDATE $dbTableCON SET TIMESTAMP=now() WHERE ID = 1");
mysql_query("UPDATE $dbTableE SET Bad=0, High=0, Low=0, Stale=0 WHERE Sensor='1_ARDUINO_MEGA_1'");  


?>
