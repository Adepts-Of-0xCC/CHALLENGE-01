<?php


function sandboxinfo(){
    $all = get_defined_functions();
    foreach ($all["internal"] as $func){
        if (function_exists($func)){
            echo "[+] ".$func." <font color=green>enabled</font><br/>\n";
        }
        else {
            echo "[+] ".$func." <font color=red>disabled</font><br/>\n";
        }
    }
}

function upload(){
    $filename = bin2hex(random_bytes(16)).".php";
    if (!file_exists(sha1($_SERVER['REMOTE_ADDR']))){
        mkdir("/var/www/html/files/".sha1($_SERVER['REMOTE_ADDR']), 0777);
    }
    $path = "/var/www/html/files/".sha1($_SERVER['REMOTE_ADDR'])."/".$filename;
    if(move_uploaded_file($_FILES['owl']['tmp_name'], $path)){
        echo "<p> File uploaded to <b>".$path."</b>";
    }
}
?>

<html>
<head>
  <title>Adepts of 0xCC - Challenge 01</title>
</head>
<body>
<?php
$banner = "\n<br/>".str_repeat("=", 30) . "<br/>\n";


echo $banner."\t\tINFORMATION".$banner;
echo "<p>You can find the source code at https://github.com/Adepts-Of-0xCC/CHALLENGE-01 .</p><p>1. No bruteforce/race condition, just upload your file.</p><p>2. Get RCE and retrieve the flag at <b>/flag</b>.</p><p>Send the flag to <b>@TheXC3LL</b> via DM and publish the write up as gists. If you believe you solved it in an unintended way, please notify it so we can fix it <b>:D</b></p>";


if (!empty($_FILES['owl'])){
    upload();
}





echo $banner."\t\t OPEN BASE_DIR".$banner;
echo ini_get('open_basedir')."<br/>\n";
echo $banner."\t\tSANDBOX STATUS".$banner;
sandboxinfo();
?>

</body>
</html>

