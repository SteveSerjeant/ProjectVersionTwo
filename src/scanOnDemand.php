<?php

$forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
$forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";

include 'dbconn.php';

if (file_exists("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml")) {
    $forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
    unlink ($forDelete);
}

unlink ($forDelete);
unlink ($forDelete1);

$sql = ('UPDATE Marker SET marker = 0 WHERE ID=1');
$stmt = $con->prepare($sql);
$stmt->prepare($sql);
$stmt->execute();


//        perform scan
//        exec('c:\WINDOWS\system32\cmd.exe /B /c START C:\Users\sarge\source\vulnersScan.bat');
//exec('C:\Users\sarge\source\scanFeb.bat');
exec("C:\Program Files\Ampps\www\ProjectVersionTwo\src\scanOnDemand.bat");




function filesExist (){
}
if (strpos(file_get_contents("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml"),"</nmaprun>")){

}
else {
    sleep(60);
    filesExist();

}


filesExist();







?>
