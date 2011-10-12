<?php
$direction = 'inbound';

if(!empty($_REQUEST['Direction']))
	$direction = $_REQUEST['Direction'];

$response = new TwimlResponse;

$next = AppletInstance::getDropZoneUrl($direction);
if(!empty($next))
	$response->redirect($next);

$response->respond();
