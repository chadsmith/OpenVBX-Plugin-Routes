<?php
$invalid_option = AppletInstance::getDropZoneUrl('invalid-option');
$keys = (array) AppletInstance::getValue('keys[]');
$responses = (array) AppletInstance::getDropZoneUrl('responses[]');
$menu_items = AppletInstance::assocKeyValueCombine($keys, $responses, 'strtolower');

if(!empty($_REQUEST['FromState']))
	$state = strtolower($_REQUEST['FromState']);

$response = new TwimlResponse;

if(!empty($state) && array_key_exists($state, $menu_items) && !empty($menu_items[$state]))
	$response->redirect($menu_items[$state]);
elseif(!empty($invalid_option))
	$response->redirect($invalid_option);

$response->respond();
