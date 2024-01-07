<?php
/* Smarty version 4.3.2, created on 2023-09-12 09:31:37
  from 'C:\xampp73\htdocs\vtiger8\layouts\v7\modules\CustomField\Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65002ff905f7a4_42780885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35b4f1c43fcbf17aa5bf8517513c7c91b94dd962' => 
    array (
      0 => 'C:\\xampp73\\htdocs\\vtiger8\\layouts\\v7\\modules\\CustomField\\Index.tpl',
      1 => 1694504735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65002ff905f7a4_42780885 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="col-sm-12 col-xs-12 ">
	<input type="hidden" name="view" id="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" />
	<input type="hidden" name="cvid" value="<?php echo $_smarty_tpl->tpl_vars['VIEWID']->value;?>
" />
	<div id="table-content" class="table-container" style="border:0px;">
				<div class="detailViewInfo row-fluid">
			<div class="col-sm-12 col-xs-12 details">
				<br>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-10 col-xs-10" style="margin-bottom:5px;">
							<h3>Create Custom Field</h3>
						</div>
						<div class="col-sm-2 col-xs-2 pull-right" style="margin-bottom:5px;">
							&nbsp;
						</div>
					</div>
					<form name="createFieldForm" id="createFieldForm" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6 col-xs-6" style="margin-bottom:5px;">
							<div class="row">
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Select Module</label>&nbsp;
										<select class="select2" name="selectModule" id="selectModule" tabindex="-1" title="" style="width:50%;">
										<option value="">Select Module</option>
										<?php echo $_smarty_tpl->tpl_vars['MODULE_LIST']->value;?>

										</select>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Select Module Block</label>&nbsp;
										<select class="select2" name="selectBlock" id="selectBlock" tabindex="-1" title="" style="width:50%;" required="required">
										<option value="">Select Block</option>
										</select>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Select Field Type</label>&nbsp;
										<select class="select2" name="fieldType" id="fieldType" tabindex="-1" title="" style="width:50%;"><option value="Text" selected="selected" data-lengthsupported="1">Text</option><option value="Decimal" data-lengthsupported="1" data-decimalsupported="1" data-maxfloatingdigits="5" data-maxlength="64">Decimal</option><option value="Integer" data-lengthsupported="1">Integer</option><option value="Percent">Percent</option><option value="Currency" data-lengthsupported="1" data-decimalsupported="1" data-maxfloatingdigits="5" data-decimalreadonly="1" data-decimalhidden="1" data-maxlength="64">Currency</option><option value="Date">Date</option><option value="Email">Email</option><option value="Phone">Phone</option><option value="Picklist" data-predefinedvalueexists="1" data-predefinedvaluetype="text" data-picklistoption="1">Picklist</option><option value="URL">URL</option><option value="Checkbox">Checkbox</option><option value="TextArea">Text Area</option><option value="MultiSelectCombo" data-predefinedvalueexists="1" data-predefinedvaluetype="text">Multi-Select Combo Box</option><option value="Skype">Skype</option><option value="Time">Time</option><option value="Lookup">Lookup</option></select>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Field Name</label>&nbsp;
										<input type="text" name="fieldName" id="fieldName" class="inputElement moduleDetail" placeholder="Field Name" style="width:55%;" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;" id="fieldLengthDiv">
									<span>
										<label>Field Length</label>&nbsp;
										<input type="text" name="fieldLength" id="fieldLength" class="inputElement" placeholder="Field Length" style="width:54.2%;" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;display:none;" id="fieldDecimalDiv">
									<span>
										<label>Decimal</label>&nbsp;
										<input type="text" name="fieldDecimal" id="fieldDecimal" class="inputElement" placeholder="Field Length" style="width:54.2%;" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;display:none;" id="targetModuleDiv">
									<span>
										<label>Target Module</label>&nbsp;
										<select class="select2" name="targetModule" id="targetModule" tabindex="-1" title="" style="width:50%;">
										<option value="">Select Target Module</option>
										<?php echo $_smarty_tpl->tpl_vars['MODULE_LIST']->value;?>

										</select>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;display:none;" id="picklistValueDiv">
									<span>
										<label for="picklistValue">Picklist Value</label>&nbsp;
										<input type="text" name="picklistValue" id="picklistValue" class="inputElement" placeholder="Add values separated by comma" style="width:54.2%;" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label style="cursor:pointer;">Is Mandatory&nbsp;
										<input type="checkbox" name="isMandatory" id="isMandatory" class="inputElement moduleDetail" placeholder="Field Length" required="required" /></label>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span id="createFieldButton" class="btn btn-success pull-right">Create Field</span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6" style="margin-bottom:5px;" id="fieldCreationResponse">
						
						</div>
					</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
>
	$('.moduleDetail').keypress(function (e) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(strigChar)) {
			return true;
		}
		return false
	});
	
	$(document).on("change","#selectModule",function(){
		var selectModule = $("#selectModule").val();
		
		$.ajax({  
			type: "GET",
			url: "index.php?module=CustomField&action=getModuleBlock&selectModule="+selectModule,
			success: function(response){
				$("#selectBlock").html(response);
				$("#s2id_selectBlock span:nth-child(1)").html('Select Block');
			}
		});
		
	});
	
	$(document).on("change","#fieldType",function(){
		var fieldType = $("#fieldType").val();
		if(fieldType=="Text" || fieldType=="Decimal" || fieldType=="Integer" || fieldType=="Currency"){
			$("#fieldLengthDiv").css("display","block");
		}else if(fieldType=="TextArea" || fieldType=="Percent" || fieldType=="Date" || fieldType=="Email" || fieldType=="Phone" || fieldType=="URL" || fieldType=="Checkbox" || fieldType=="Skype" || fieldType=="Time" || fieldType=="Lookup" || fieldType=="Picklist" || fieldType=="MultiSelectCombo"){
			$("#fieldLength").val("");
			$("#fieldLengthDiv").css("display","none");
		}
		if(fieldType=="Decimal"){
			$("#fieldDecimalDiv").css("display","block");
		}else{
			$("#fieldDecimal").val("");
			$("#fieldDecimalDiv").css("display","none");
		}
		if(fieldType=="Lookup"){
			$("#targetModuleDiv").css("display","block");
		}else{
			$("#targetModule").val("");
			$("#targetModuleDiv").css("display","none");
		}
		
		if(fieldType=="Picklist" || fieldType=="MultiSelectCombo"){
			$("#picklistValueDiv").css("display","block");
		}else{
			$("#picklistValue").val("");
			$("#picklistValueDiv").css("display","none");
		}
	});
	
	$(document).on("click","#createFieldButton",function(){
		$("#fieldCreationResponse").html("");
		var selectModule = $("#selectModule").val();
		var selectBlock = $("#selectBlock").val();
		var fieldType = $("#fieldType").val();
		var fieldName = $("#fieldName").val();
		var fieldLength = $("#fieldLength").val();
		var decimalVal = '';
		var targetModule = '';
		var pickListVal = '';
		var isMandatory = '';
		if($("#isMandatory").is(':checked')){
			isMandatory = 'Yes';
		}else{
			isMandatory = 'No';
		}
		var fieldFile = '';
		var uiType = '';
		if(fieldType=="Text"){
			fieldFile = 'createTextField';
			uiType = '1';
		}else if(fieldType=="Decimal"){
			fieldFile = 'createDecimalField';
			uiType = '7';
			decimalVal = $("#fieldDecimal").val();
		}else if(fieldType=="Integer"){
			fieldFile = 'createIntegerField';
			uiType = '7';
		}else if(fieldType=="Percent"){
			fieldFile = 'createPercentField';
			uiType = '9';
		}else if(fieldType=="Currency"){
			fieldFile = 'createCurrencyField';
			uiType = '71';
		}else if(fieldType=="Date"){
			fieldFile = 'createDateField';
			uiType = '5';
		}else if(fieldType=="Email"){
			fieldFile = 'createEmailField';
			uiType = '13';
		}else if(fieldType=="Phone"){
			fieldFile = 'createPhoneField';
			uiType = '11';
		}else if(fieldType=="Picklist"){
			fieldFile = 'createPicklistField';
			uiType = '16';
			pickListVal = $("#picklistValue").val();
		}else if(fieldType=="URL"){
			fieldFile = 'createUrlField';
			uiType = '17';
		}else if(fieldType=="Checkbox"){
			fieldFile = 'createCheckboxField';
			uiType = '56';
		}else if(fieldType=="TextArea"){
			fieldFile = 'createTextAreaField';
			uiType = '21';
		}else if(fieldType=="MultiSelectCombo"){
			fieldFile = 'createMultiSelectField';
			uiType = '33';
			pickListVal = $("#picklistValue").val();
		}else if(fieldType=="Skype"){
			fieldFile = 'createSkypeField';
			uiType = '85';
		}else if(fieldType=="Time"){
			fieldFile = 'createTimeField';
			uiType = '14';
		}else if(fieldType=="Lookup"){
			fieldFile = 'createLookupField';
			uiType = '10';
			targetModule = $("#targetModule").val();
		}
		$.ajax({  
			type: "GET",
			url: "index.php?module=CustomField&action="+fieldFile+"&selectModule="+selectModule+"&selectBlock="+selectBlock+"&fieldType="+fieldType+"&fieldName="+fieldName+"&fieldLength="+fieldLength+"&isMandatory="+isMandatory+"&uiType="+uiType+"&decimal="+decimalVal+"&targetModule="+targetModule+"&pickListVal="+pickListVal,
			success: function(response){
				$("#fieldCreationResponse").html(response);
			}
		});
	});
<?php echo '</script'; ?>
>
<?php }
}
