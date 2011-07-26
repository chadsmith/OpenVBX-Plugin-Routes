<?php
$allowed = AppletInstance::getUserGroupPickerValue('user_or_group');
$is_user = false;

if(!empty($allowed) && !empty($_REQUEST['From'])) {
	$from = normalize_phone_to_E164($_REQUEST['From']);
	switch(get_class($allowed)) {
		case 'VBX_User':
			foreach($allowed->devices as $device)
				if($from == $device->value)
					$is_user = true;
			break;
		case 'VBX_Group':
			foreach($allowed->users as $user) {
				$user = VBX_User::get($user->user_id);
				foreach($user->devices as $device)
					if($from == $device->value)
						$is_user = true;
			}
	}
}

$response = new Response();

$next = AppletInstance::getDropZoneUrl($is_user ? 'is_user' : 'not_user');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();
