<?php
 
class CustomModule_creatingModuleLanguageFile_Action extends Vtiger_Action_Controller
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
		$identField = str_replace(" ","",$_REQUEST['fieldName']);
		$identField = strtolower($identField);
		
		$MODULENAME = str_replace(" ","",$_REQUEST['moduleName']);
		$filePath = str_replace($moduleName."\actions",$MODULENAME."\\",dirname( __FILE__ )).$MODULENAME.".php";
		echo dirname( __FILE__ ));
		$fileContent = '<?php
		$languageStrings = array(
			// Basic Strings
			"'.$MODULENAME.'" => "'.trim($_REQUEST['moduleName']).'",
			"SINGLE_'.$MODULENAME.'" => "'.trim($_REQUEST['moduleName']).'",
			"LBL_ADD_RECORD" => "Add '.trim($_REQUEST['moduleName']).'",
			"LBL_RECORDS_LIST" => "'.trim($_REQUEST['moduleName']).' List",
			"LBL_'.strtoupper(trim($_REQUEST['moduleName'])).'_INFORMATION" => "Basic Information",
		);
		$jsLanguageStrings = array(
		);
		?>';
		if (!file_put_contents($filePath,$fileContent)){
			echo "Failed";
		}else{
			echo "File created.";
		}
	}
}