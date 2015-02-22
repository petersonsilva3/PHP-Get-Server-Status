<?php
/*
 * PHP Get Server Status
 * Powered By : Aria Jahangiri Far
 */

function GetServerStatus($site, $port) {
	$status = array(
		"<span class='class_offline'>Offline</span>",
		"<span class='class_online'>Online</span>",
	);
	$fp = @fsockopen($site, $port, $errno, $errstr, 2);
	if (!$fp) {
		return $status[0];
	} else {
		return $status[1];
	}
}

$localhost = GetServerStatus('127.0.0.1',80);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Server Status</title>
	<style type="text/css">
		*{margin:0; padding:0;}
		div.class_server{padding:10px;}
		div.class_server div.class_text p.text{font-family:Tahoma; font-size:12px; padding-bottom:2px;}
		div.class_server div.class_text p.text span.class_online{background-color:#D9FFB3;}
		div.class_server div.class_text p.text span.class_offline{background-color:#FFB6B6;}
	</style>
</head>

<body>
	<div class="class_server">
		<div class="class_text">
			<p class="text">LocalHost : <?php echo $localhost; ?></p>
		</div>
	</div>
	<script type="text/javascript">
	setInterval(function(){
		window.location = 'status.php';
	},10000)
	</script>
</body>
</html>
