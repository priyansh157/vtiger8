{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{* modules/Vtiger/views/Index.php *}

{* START YOUR IMPLEMENTATION FROM BELOW. Use {debug} for information *}
{*include file="modules/AdvancedReports/ListViewPreProcess.tpl"*}

<div class="col-sm-12 col-xs-12 ">
	<input type="hidden" name="view" id="view" value="{$VIEW}" />
	<input type="hidden" name="cvid" value="{$VIEWID}" />
	<div id="table-content" class="table-container" style="border:0px;">
		{* Added By Parag on 18 June 2018 *}
		<div class="detailViewInfo row-fluid">
			<div class="col-sm-12 col-xs-12 details">
				<br>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-10 col-xs-10" style="margin-bottom:5px;">
							<h3>Create Custom Module</h3>
						</div>
						<div class="col-sm-2 col-xs-2 pull-right" style="margin-bottom:5px;">
							&nbsp;
						</div>
					</div>
					<form name="createModuleForm" id="createModuleForm" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6 col-xs-6" style="margin-bottom:5px;">
							<div class="row">
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Module Name</label>&nbsp;
										<input type="text" name="moduleName" id="moduleName" class="inputElement moduleDetail" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>Identifier Field Name</label>&nbsp;
										<input type="text" name="identifierField" id="identifierField" class="inputElement moduleDetail" required="required" />
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<span>
										<label>App to link Module</label>&nbsp;
										<select name="appName" id="appName" class="select2" required="required">
											{$APP_LIST}
										</select>
									</span>
								</div>
								<div class="col-sm-12 col-xs-12" style="margin-bottom:5px;">
									<button id="createModuleButton" type="submit" class="btn btn-success pull-right">Create Module</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6" style="margin-bottom:5px;" id="moduleCreationResponse">
						
						</div>
					</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
{literal}
<script>
	 $('.moduleDetail').keypress(function (e) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(strigChar)) {
			return true;
		}
		return false
	  });
	$(document).ready(function (e) {
		var request;
		// Bind to the submit event of our form
		$("#createModuleForm").submit(function(event){
			$("#createModuleButton").prop("disabled", true);
			$("#moduleCreationResponse").html('');
			$("#moduleCreationResponse").html('<p>Creating Module</p>');
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			$.ajax({
				url: "index.php?module=CustomModule&action=createCustomModule",
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				enctype: 'multipart/form-data',
				processData: false,
				success: function (response) {
					if(response == "Module already present - choose a different name."){
						$("#moduleCreationResponse").append("<p>"+response+"</p>");
						$("#createModuleButton").prop("disabled", false);
					}else{
						var respSpl = response.split("|~|");
						if(respSpl[1]=="OK"){
							 $("#moduleCreationResponse").append("<p>Module Creation Executed.</p>");
							 $("#moduleCreationResponse").append("<p>Creating Module File.</p>");
							 $.ajax({    
								type: "GET",
								url: "index.php?module=CustomModule&action=createModuleFile&moduleName="+$("#moduleName").val()+"&fieldName="+$("#identifierField").val(),  
								success: function(response){
									if(response=="Failed"){
										$("#moduleCreationResponse").append("<p>Module File Creation Failed.</p>");
										$("#moduleCreationResponse").append("<p>Module Creation Failed.</p>");
										$("#createModuleButton").prop("disabled", false);
									}else{
										$("#moduleCreationResponse").append("<p>Module File Created.</p>");
										$("#moduleCreationResponse").append("<p>Relating Module To App.</p>");
										$.ajax({    
											type: "GET",
											url: "index.php?module=CustomModule&action=relatingModuleToApp&moduleName="+$("#moduleName").val()+"&appName="+$("#appName").val(),  
											success: function(response){
												if(response=="Failed"){
													$("#moduleCreationResponse").append("<p>Module File Creation Failed.</p>");
													$("#moduleCreationResponse").append("<p>Module Creation Failed.</p>");
													$("#createModuleButton").prop("disabled", false);
												}else{
													$("#moduleCreationResponse").append("<p>Module Related To App.</p>");
													$("#moduleCreationResponse").append("<p>Module Created.</p>");
													$("#moduleCreationResponse").append("<p>Please Reload The Page.</p>");
													$("#createModuleButton").prop("disabled", false);
													/*
													$("#moduleCreationResponse").append("<p>Creating Module Langauge File.</p>");
													$.ajax({    
														type: "GET",
														url: "index.php?module=CustomModule&action=creatingModuleLanguageFile&moduleName="+$("#moduleName").val(),  
														success: function(response){
															if(response=="Failed"){
																$("#moduleCreationResponse").append("<p>Language File Creation Failed.</p>");
																$("#moduleCreationResponse").append("<p>Module Created.</p>");
																$("#moduleCreationResponse").append("<p>Please Reload The Page.</p>");
																$("#createModuleButton").prop("disabled", false);
															}else{
																$("#moduleCreationResponse").append("<p>Language File Created.</p>");
																$("#moduleCreationResponse").append("<p>Module Created.</p>");
																$("#moduleCreationResponse").append("<p>Please Reload The Page.</p>");
																$("#createModuleButton").prop("disabled", false);
															}
														}
													});
													*/
												}
											}
										});
									}
								}
							});
						}else{
							$("#moduleCreationResponse").append("<p>Module Creation Failed.</p>");
							$("#createModuleButton").prop("disabled", false);
						}
					}
					
				}
			});
			return false;
		});
	});
</script>
{/literal}