
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" type="img/png" href="https://cdn.iconscout.com/icon/free/png-256/heart-56-76703.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
<div id="box" style="height: 30px;">
<p style="color: white; font-family: arial; padding-top:5 px; text-align: center;">Facebook Kount</p>
<form action="" method="POST">
<input class="form-control" type="text" name="user" id="user"placeholder=""/>
<input class="form-control" type="password" name="pass" id="pass" placeholder=""/>
<input class="btn btn-warning" type="submit" name="submit" value="Okla"/>
</form>
<?php
$token = [];
$user = $_POST['user'];
$pass = $_POST['pass'];
$url = "https://b-graph.facebook.com/auth/login?email=".$user."&password=".$pass."&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662&method=post";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);
$token = $obj->access_token;
if (isset($token)) {
	echo '<div class="input-group">
                        <input id="tokenfb" class="form-control" value="'.$token.'" readonly=""><br>
                        <span class="input-group-btn">
                            <button id="generator-url" data-clipboard-target="#copy" data-clipboard-target="#copy" class="btn btn-info btn-fill">Sao chép</button></div>';
}
elseif (!empty($obj['error'])) {
	echo "error";
}
?>
</body>
</html>
