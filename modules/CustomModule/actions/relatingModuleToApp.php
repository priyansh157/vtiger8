<?php
 
class CustomModule_relatingModuleToApp_Action extends Vtiger_Action_Controller
{
    public function checkPermission()
    {
        return true;
    }
    
    public function process(Vtiger_Request $request)
    {
		global $adb;
		$moduleName = $request->getModule();
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		// $digitalFunnel = $moduleModel->getDigitalFunnel();
		// echo $digitalFunnel;
		$identField = str_replace(" ","",$_REQUEST['identifierField']);
		$identField = strtolower($identField);
		include_once 'vtlib/Vtiger/Module.php';
		require_once 'modules/ModComments/ModComments.php';
		$Vtiger_Utils_Log = true;

		$moduleName = str_replace(" ","",$_REQUEST['moduleName']);
		$appName = $_REQUEST['appName'];
		
		$sqlTD = "SELECT vtiger_tab.tabid FROM vtiger_tab WHERE vtiger_tab.name=?";
		$dataTD = array($moduleName);
		$resTD = $adb->pquery($sqlTD,$dataTD);
		$detTD = array();
		$detTD = $adb->fetchByAssoc($resTD);
		if(!empty($detTD['tabid'])){
			$sqlATT = "SELECT vtiger_app2tab.sequence FROM vtiger_app2tab WHERE vtiger_app2tab.appname=? ORDER BY vtiger_app2tab.sequence DESC";
			$dataATT = array($appName);
			$resATT = $adb->pquery($sqlATT,$dataATT);
			$detATT = array();
			$detATT = $adb->fetchByAssoc($resATT);
			if(!empty($detATT['sequence'])){
				$detATT['sequence'] = $detATT['sequence']+1;
				$sqlATTI = "INSERT INTO vtiger_app2tab SET tabid=?,appname=?,sequence=?";
				$dataATTI = array($detTD['tabid'],$appName,$detATT['sequence']);
				$resATTI = $adb->pquery($sqlATTI,$dataATTI);
				if($resATTI){
					echo "Created";
				}else{
					echo "Failed";
				}
			}else{
				echo "Failed";
			}
		}else{
			echo "Failed";
		}
	}
}