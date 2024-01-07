<?php
 
class CustomModule_createModuleFile_Action extends Vtiger_Action_Controller
{
    public function checkPermission()
    {
        return true;
    }
    
    public function process(Vtiger_Request $request)
    {
		global $adb,$root_directory;
		$moduleName = $request->getModule();
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		// $digitalFunnel = $moduleModel->getDigitalFunnel();
		// echo $digitalFunnel;
		$identField = str_replace(" ","",$_REQUEST['fieldName']);
		$identField = strtolower($identField);
		
		$MODULENAME = str_replace(" ","",$_REQUEST['moduleName']);
		$filePath = $root_directory."modules/".$MODULENAME."/".$MODULENAME.".php";
		$fileContent = '<?php
		include_once "modules/Vtiger/CRMEntity.php";
		class '.$MODULENAME.' extends Vtiger_CRMEntity {
			var $table_name = "vtiger_'.strtolower($MODULENAME).'";
			var $table_index= "'.strtolower($MODULENAME).'id";
			/**
			 * Mandatory table for supporting custom fields.
			 */
			var $customFieldTable = Array("vtiger_'.strtolower($MODULENAME).'cf", "'.strtolower($MODULENAME).'id");

			/**
			 * Mandatory for Saving, Include tables related to this module.
			 */
			var $tab_name = Array("vtiger_crmentity", "vtiger_'.strtolower($MODULENAME).'", "vtiger_'.strtolower($MODULENAME).'cf");

			/**
			 * Mandatory for Saving, Include tablename and tablekey columnname here.
			 */
			var $tab_name_index = Array(
				"vtiger_crmentity" => "crmid",
				"vtiger_'.strtolower($MODULENAME).'" => "'.strtolower($MODULENAME).'id",
				"vtiger_'.strtolower($MODULENAME).'cf"=>"'.strtolower($MODULENAME).'id");
				
			/**
			 * Mandatory for Listing (Related listview)
			 */
			var $list_fields = Array (
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"'.trim($_REQUEST['fieldName']).'" => Array("'.strtolower($MODULENAME).'", "'.$identField.'"),
				"Assigned To" => Array("crmentity","smownerid")
			);
			var $list_fields_name = Array (
				/* Format: Field Label => fieldname */
				"'.trim($_REQUEST['fieldName']).'" => "'.$identField.'",
				"Assigned To" => "assigned_user_id",
			);

			// Make the field link to detail view
			var $list_link_field = "'.$identField.'";
			
			// For Popup listview and UI type support
			var $search_fields = Array(
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"'.trim($_REQUEST['fieldName']).'" => Array("'.strtolower($MODULENAME).'", "'.$identField.'"),
				"Assigned To" => Array("vtiger_crmentity","assigned_user_id"),
			);
			var $search_fields_name = Array (
				/* Format: Field Label => fieldname */
				"'.trim($_REQUEST['fieldName']).'" => "'.$identField.'",
				"Assigned To" => "assigned_user_id",
			);

			// For Popup window record selection
			var $popup_fields = Array ("'.$identField.'");
			
			// For Alphabetical search
			var $def_basicsearch_col = "'.$identField.'";

			// Column value to use on detail view record text display
			var $def_detailview_recname = "'.$identField.'";

			// Used when enabling/disabling the mandatory fields for the module.
			// Refers to vtiger_field.fieldname values.
			var $mandatory_fields = Array("'.$identField.'","assigned_user_id");

			var $default_order_by = "'.$identField.'";
			var $default_sort_order="ASC";
			
			
			function vtlib_handler($moduleName, $eventType) {
				if($eventType == "module.postinstall") {
					// TODO Handle actions after this module is installed.
				} else if($eventType == "module.disabled") {
					// TODO Handle actions before this module is being uninstalled.
				} else if($eventType == "module.preuninstall") {
					// TODO Handle actions when this module is about to be deleted.
				} else if($eventType == "module.preupdate") {
					// TODO Handle actions before this module is updated.
				} else if($eventType == "module.postupdate") {
					// TODO Handle actions after this module is updated.
				}
			}
		}
	?>';
		if (!file_put_contents($filePath,$fileContent)){
			echo "Failed";
		}else{
			echo "File created.";
		}
	}
}