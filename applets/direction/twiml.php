<?php
$direction = 'inbound';

if(!empty($_REQUEST['Direction']))
	$direction = $_REQUEST['Direction'];

<<<<<<< HEAD
$response = new Response();
=======
$response = new TwimlResponse;
>>>>>>> feature/openvbx_1.1

$next = AppletInstance::getDropZoneUrl($direction);
if(!empty($next))
	$response->redirect($next);

$response->respond();
