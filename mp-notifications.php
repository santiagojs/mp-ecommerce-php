<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
//  MercadoPago\SDK::setPlatformId("PLATFORM_ID");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
// MercadoPago\SDK::setCorporationId("CORPORATION_ID");.

$fichero = 'notifications.txt';
$actual = file_get_contents($fichero);
$actual .= "=======================================";
foreach($_POST as $nombre_campo => $valor){
	$actual .= "$nombre_campo = $valor\n" ;
}
file_put_contents($fichero, $actual);

switch($_POST["type"]) {
	case "payment":
		$payment = MercadoPago\Payment.find_by_id($_POST["id"]);
		break;
	case "plan":
		$plan = MercadoPago\Plan.find_by_id($_POST["id"]);
		break;
	case "subscription":
		$plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
		break;
	case "invoice":
		$plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
		break;
}
header('HTTP/1.1 200 OK');
?>