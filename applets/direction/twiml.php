<?php
$direction = 'inbound';

if(isset($_REQUEST['Direction']) && !in_array($_REQUEST['Direction'], array('inbound', 'incoming')))
  $direction = 'outbound';

$response = new TwimlResponse;

$next = AppletInstance::getDropZoneUrl($direction);
if(!empty($next))
	$response->redirect($next);

$response->respond();