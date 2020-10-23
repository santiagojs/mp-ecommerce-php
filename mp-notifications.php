<?php
require __DIR__ .  '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
//  MercadoPago\SDK::setPlatformId("PLATFORM_ID");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
// MercadoPago\SDK::setCorporationId("CORPORATION_ID");.

$body = @file_get_contents('php://input');
$data = json_decode($body);
file_put_contents('notificaciones/'.$data->id.".json", $body);
switch($data->type) {
	case "payment":
		$payment = MercadoPago\Payment::find_by_id($data->data->id);
		http_response_code(201);
		// var_dump($payment);
		break;
	case "test":
		echo "ok";
		break;
	case "plan":
		$plan = MercadoPago\Plan::find_by_id($_POST["id"]);
		break;
	case "subscription":
		$plan = MercadoPago\Subscription::find_by_id($_POST["id"]);
		break;
	case "invoice":
		$plan = MercadoPago\Invoice::find_by_id($_POST["id"]);
		break;
}