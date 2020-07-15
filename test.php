<?php 

include 'PhpSerial.php';

// Let's start the class
$serial = new PhpSerial;

// First we must specify the device. This works on both linux and windows (if
// your linux serial device is /dev/ttyS0 for COM1, etc)
$serial->deviceSet("COM8");

// We can change the baud rate, parity, length, stop bits, flow control
$serial->confBaudRate(2400);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

// Then we need to open it
$serial->deviceOpen();

// To write into
$serial->sendMessage("1");


// Or to read from
//$read = $serial->readPort();

// If you want to change the configuration, the device must be closed
$serial->deviceClose();


/*
$fp =fopen("COM8", "w");
fwrite($fp, chr(1));
fclose($fp);
*/
/*
$fp =fopen("COM8", "w");
fwrite($fp, "Hellow!1");
fclose($fp);
*/
$handle = @fopen("COM8", "r");

if ($handle) {
    while (($buffer = fgets($handle, 100)) !== false) {
        echo "-> ".$buffer;
		break;
    }
    if (!feof($handle)) {
        //echo "Ошибка: fgets() неожиданно потерпел неудачу\n";
    }
    fclose($handle);
}