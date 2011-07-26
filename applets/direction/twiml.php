<?php
$direction = 'inbound';

if(!empty($_REQUEST['Direction']))
	$direction = $_REQUEST['Direction'];

$next = AppletInstance::getDropZoneUrl($direction);
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();
