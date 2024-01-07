<?php
		include_once "modules/Vtiger/CRMEntity.php";
		class InternalChat extends Vtiger_CRMEntity {
			var $table_name = "vtiger_internalchat";
			var $table_index= "internalchatid";
			/**
			 * Mandatory table for supporting custom fields.
			 */
			var $customFieldTable = Array("vtiger_internalchatcf", "internalchatid");

			/**
			 * Mandatory for Saving, Include tables related to this module.
			 */
			var $tab_name = Array("vtiger_crmentity", "vtiger_internalchat", "vtiger_internalchatcf");

			/**
			 * Mandatory for Saving, Include tablename and tablekey columnname here.
			 */
			var $tab_name_index = Array(
				"vtiger_crmentity" => "crmid",
				"vtiger_internalchat" => "internalchatid",
				"vtiger_internalchatcf"=>"internalchatid");
				
			/**
			 * Mandatory for Listing (Related listview)
			 */
			var $list_fields = Array (
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"Internal Chat ID" => Array("internalchat", "internalchatid"),
				"Assigned To" => Array("crmentity","smownerid")
			);
			var $list_fields_name = Array (
				/* Format: Field Label => fieldname */
				"Internal Chat ID" => "internalchatid",
				"Assigned To" => "assigned_user_id",
			);

			// Make the field link to detail view
			var $list_link_field = "internalchatid";
			
			// For Popup listview and UI type support
			var $search_fields = Array(
				/* Format: Field Label => Array(tablename, columnname) */
				// tablename should not have prefix "vtiger_"
				"Internal Chat ID" => Array("internalchat", "internalchatid"),
				"Assigned To" => Array("vtiger_crmentity","assigned_user_id"),
			);
			var $search_fields_name = Array (
				/* Format: Field Label => fieldname */
				"Internal Chat ID" => "internalchatid",
				"Assigned To" => "assigned_user_id",
			);

			// For Popup window record selection
			var $popup_fields = Array ("internalchatid");
			
			// For Alphabetical search
			var $def_basicsearch_col = "internalchatid";

			// Column value to use on detail view record text display
			var $def_detailview_recname = "internalchatid";

			// Used when enabling/disabling the mandatory fields for the module.
			// Refers to vtiger_field.fieldname values.
			var $mandatory_fields = Array("internalchatid","assigned_user_id");

			var $default_order_by = "internalchatid";
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