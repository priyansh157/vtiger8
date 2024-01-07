<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class CustomField_createTextAreaField_Action extends Vtiger_Action_Controller {
	public function checkPermission(){
        return true;
    }

	public function process(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$selectModule = $request->get('selectModule');
		$selectBlock = $request->get('selectBlock');
		$fieldType = $request->get('fieldType');
		$fieldName = $request->get('fieldName');
		$fieldLength = $request->get('fieldLength');
		$isMandatory = $request->get('isMandatory');
		$uiType = $request->get('uiType');
		$moduleTable = '';
		if($selectModule=='Accounts'){
			$moduleTable = 'vtiger_accountscf';
		}else if($selectModule=='Contacts'){
			$moduleTable = 'vtiger_contactscf';
		}else if($selectModule=='Leads'){
			$moduleTable = 'vtiger_leadscf';
		}else if($selectModule=='Campaigns'){
			$moduleTable = 'vtiger_campaign';
		}else if($selectModule=='Potentials'){
			$moduleTable = 'vtiger_potentialscf';
		}else if($selectModule=='Quotes'){
			$moduleTable = 'vtiger_quotescf';
		}else if($selectModule=='SalesOrder'){
			$moduleTable = 'vtiger_salesordercf';
		}else if($selectModule=='PurchaseOrder'){
			$moduleTable = 'vtiger_purchaseordercf';
		}else if($selectModule=='Invoice'){
			$moduleTable = 'vtiger_invoicecf';
		}else if($selectModule=='HelpDesk'){
			$moduleTable = 'vtiger_ticketcf';
		}else if($selectModule=='Faq'){
			$moduleTable = 'vtiger_faqcf';
		}else if($selectModule=='Documents'){
			$moduleTable = 'vtiger_notescf';
		}else if($selectModule=='Products'){
			$moduleTable = 'vtiger_productcf';
		}else if($selectModule=='PriceBooks'){
			$moduleTable = 'vtiger_pricebook';
		}else if($selectModule=='Vendors'){
			$moduleTable = 'vtiger_vendorcf';
		}else if($selectModule=='Project'){
			$moduleTable = 'vtiger_projectcf';
		}else if($selectModule=='ProjectMilestone'){
			$moduleTable = 'vtiger_projectmilestonecf';
		}else if($selectModule=='ProjectTask'){	
			$moduleTable = 'vtiger_projecttaskcf';
		}else if($selectModule=='Services'){	
			$moduleTable = 'vtiger_servicecf';
		}else if($selectModule=='ServiceContracts'){
			$moduleTable = 'vtiger_servicecontractscf';
		}else if($selectModule=='Assets'){
			$moduleTable = 'vtiger_assetscf';
		}else{
			$moduleTable = 'vtiger_'.strtolower($selectModule).'cf';
		}
		
		
		// Turn on debugging level
		$Vtiger_Utils_Log = true;
		// Include necessary classes
		include_once('vtlib/Vtiger/Module.php');
		// Define instances
		$users = Vtiger_Module::getInstance($selectModule);
		// Nouvelle instance pour le nouveau bloc
		$block = Vtiger_Block::getInstance($selectBlock, $users);
		// Add field
		$fieldInstance = new Vtiger_Field();
		//Field Name
		$fieldInstance->name = str_replace(" ","_",strtolower($fieldName));
		$fieldInstance->table = $moduleTable;
		$fieldInstance->column = str_replace(" ","_",strtolower($fieldName));
		$fieldInstance->label = $fieldName;
		$fieldInstance->columntype = 'TEXT';
		$fieldInstance->uitype = $uiType;
		if($isMandatory=="Yes"){
			$fieldInstance->typeofdata = 'V~M';
		}else{
			$fieldInstance->typeofdata = 'V~O';
		}
		
		$fieldResult = $block->addField($fieldInstance);
		if($fieldResult){
			echo 'Field created';
		}else{
			echo 'Unable to create field. Please try again later.';
		}
		// echo 11223344;
		/**/
	}
}
