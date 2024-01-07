<?php
class CustomModule_Module_Model extends Vtiger_Module_Model
{
    public function getDefaultViewName() {
        return 'Index';
    }
	public function isQuickCreateSupported(){

		return false;

	}
	
	
}