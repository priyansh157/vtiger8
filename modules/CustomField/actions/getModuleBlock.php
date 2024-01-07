<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class CustomField_getModuleBlock_Action extends Vtiger_Action_Controller {
	public function checkPermission(){
        return true;
    }

	public function process(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$selectModule = $request->get('selectModule');
		$paStatus = $moduleModel->getModuleBlock($selectModule);
		echo $paStatus;
	}
}
