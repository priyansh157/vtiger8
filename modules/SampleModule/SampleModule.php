<?php
		include_once "modules/Vtiger/CRMEntity.php";
		class SampleModule extends Vtiger_CRMEntity {
			var $table_name = "vtiger_samplemodule";
			var $table_index= "samplemoduleid";
			/**
			 * Mandatory table for supporting custom fields.
			 */
			var $customFieldTable = Array("vtiger_samplemodulecf", "samplemoduleid");

			/**
			 * Mandatory for Saving, Include tables related to this module.
			 */
			var $tab_name = Array("vtiger_crmentity", "vtiger_samplemodule", "vtiger_samplemodulecf");

			/**
			 * Mandatory for Saving, Include tablename and tablekey columnname here.
			 */
			var $tab_name_index = Array(
				"vtiger_crmentity" => "crmid",
				"vtiger_samplemodule" => "samplemoduleid",
				"vtiger_samplemodulecf"=>"samplemoduleid");
				
			/**
			 * Mandatory for Listing (Related listview)
			 */
			var $list_fields = Array (
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"Sample Field" => Array("samplemodule", "samplefield"),
				"Assigned To" => Array("crmentity","smownerid")
			);
			var $list_fields_name = Array (
				/* Format: Field Label => fieldname */
				"Sample Field" => "samplefield",
				"Assigned To" => "assigned_user_id",
			);

			// Make the field link to detail view
			var $list_link_field = "samplefield";
			
			// For Popup listview and UI type support
			var $search_fields = Array(
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"Sample Field" => Array("samplemodule", "samplefield"),
				"Assigned To" => Array("vtiger_crmentity","assigned_user_id"),
			);
			var $search_fields_name = Array (
				/* Format: Field Label => fieldname */
				"Sample Field" => "samplefield",
				"Assigned To" => "assigned_user_id",
			);

			// For Popup window record selection
			var $popup_fields = Array ("samplefield");
			
			// For Alphabetical search
			var $def_basicsearch_col = "samplefield";

			// Column value to use on detail view record text display
			var $def_detailview_recname = "samplefield";

			// Used when enabling/disabling the mandatory fields for the module.
			// Refers to vtiger_field.fieldname values.
			var $mandatory_fields = Array("samplefield","assigned_user_id");

			var $default_order_by = "samplefield";
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
	?>