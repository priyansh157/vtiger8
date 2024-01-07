<?php
class CustomField_Module_Model extends Vtiger_Module_Model
{
    public function getDefaultViewName() {
        return 'Index';
    }
	public function isQuickCreateSupported(){
		return false;
	}
	
	public function getModuleBlock($selectModule){
		global $adb;
		
		$sqlBD = "SELECT vtiger_blocks.blockid,vtiger_blocks.blocklabel FROM vtiger_blocks INNER JOIN vtiger_tab ON vtiger_blocks.tabid=vtiger_tab.tabid WHERE vtiger_tab.name=?";
		$dataBD = array($selectModule);
		$resBD = $adb->pquery($sqlBD,$dataBD);
		$detBD = array();
		$blockList = '<option value="">Select Block</option>';
		while($detBD=$adb->fetchByAssoc($resBD)){
			if(!empty($detBD['blockid'])){
				$blockList .= '<option value="'.$detBD['blocklabel'].'">'.$detBD['blocklabel'].'</option>';
			}
		}
		return $blockList;
	}
}