<?php
 
class CustomModule_addingCommentModule_Action extends Vtiger_Action_Controller
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
		$moduleName = str_replace(" ","",$_REQUEST['moduleName']);
		
		require_once 'vtlib/Vtiger/Module.php';
		$vtiger_utils_log = true;

		$modulename = $moduleName;
		$moduleinstance = vtiger_module::getinstance($modulename);

		require_once 'modules/ModComments/ModComments.php';
		$commentsmodule = vtiger_module::getinstance( 'ModComments' );
		$fieldinstance = vtiger_field::getinstance( 'related_to', $commentsmodule );
		$fieldinstance->setrelatedmodules( array($modulename) );
		$detailviewblock = modcomments::addwidgetto( $modulename );
		// echo "comment widget for module $modulename has been created";
		
		echo "OK";
	}
}