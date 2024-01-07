<?php

class CustomField_Index_View extends Vtiger_Index_View
{
    function __construct(){
        parent::__construct();
	}
    
    function process(Vtiger_Request $request){
		global $current_user,$adb;
        $mode = $request->getMode();
        if(!empty($mode)) {
            echo $this->invokeExposedMethod($mode, $request);
            return;
        }
        $moduleName = $request->getModule();
		$viewer = $this->getViewer($request);
		
		$sqlApp = "SELECT vtiger_tab.tablabel FROM vtiger_tab WHERE vtiger_tab.isentitytype=? AND vtiger_tab.presence=? ORDER BY vtiger_tab.tablabel";
		$dataApp = array(1,0);
		$resApp = $adb->pquery($sqlApp,$dataApp);
		$detApp = array();
		$appList = '';
		while($detApp=$adb->fetchByAssoc($resApp)){
			if(!empty($detApp['tablabel'])){
				$appList .= '<option value="'.$detApp['tablabel'].'">'.$detApp['tablabel'].'</option>';
			}
		}
		
		$viewer->assign('MODULE_LIST',$appList);
		$viewer->view('Index.tpl',$moduleName);
    }
}