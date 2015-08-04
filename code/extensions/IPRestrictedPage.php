<?php
class IPRestrictedPage extends DataExtension
{
	private static $db = array(
		'IPAddresses' => 'Text'
	);
	
	public function updateSettingsFields(FieldList $fields) {
    	$fields->addFieldToTab("Root.Settings", TextareaField::create('IPAddresses', 'Allowed IP Addresses')->setDescription('Put each IP address on a new line'), 'EditorGroups');
    	return $fields;
	}

	// Return array of valid IP addresses
	public function IPAddresses(){
		$returnArray = array();
		$ip = explode("\n",$this->owner->IPAddresses);
		
		if(is_array($ip)){
			foreach($ip as $ipAddress){
				if(filter_var($ipAddress, FILTER_VALIDATE_IP)){
					$returnArray[$ipAddress] = $ipAddress;
				}
			}
		}
		
		else {
			if(filter_var($ip, FILTER_VALIDATE_IP)){
				$returnArray[$ip] = $ip;
			}
		}

		if (!empty($returnArray)) {
			return $returnArray;
		}

		return false;
	}
}

class IPRestrictedPage_Controller extends DataExtension {
	
	public function onAfterInit() {
		if($this->owner->ipAddresses()){
			$ip = $_SERVER['REMOTE_ADDR'];
			if(!in_array($ip, $this->owner->IPAddresses())){
				return $this->owner->redirect('/');
			}
		}
	}
}
