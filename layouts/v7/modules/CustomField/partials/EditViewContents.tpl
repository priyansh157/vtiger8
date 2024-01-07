{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
********************************************************************************/
-->*}
{strip}
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}

	<div name='editContent'>
		{foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE name=blockIterator}
			{if $BLOCK_FIELDS|@count gt 0}
				
				{if ($MODULE eq 'Accounts') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Customer Information'}
				<div class='fieldBlockContainer' id='CustomerInformation' style="display:none;">
					{literal}
						<script>
							var fieldName = $('#Accounts_accounttype').val();
							 if (fieldName == 'Customer-Direct' || fieldName == 'Customer-Channel'){
								$("#CustomerInformation").css("display","block");
								}else{
								$("#CustomerInformation").css("display","none");
							}
						</script>
					{/literal}
				{elseif ($MODULE eq 'Accounts') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Account Whitespace Information'}
				<div class='fieldBlockContainer' id='WhitespaceInformation' style="display:none;">
					{literal}
						<script>
							var fieldName = $('#Accounts_accounttype').val();
							 if (fieldName == 'Customer-Direct' || fieldName == 'Customer-Channel'){
								$("#WhitespaceInformation").css("display","block");
								}else{
								$("#WhitespaceInformation").css("display","none");
							}
						</script>
					{/literal}
				{elseif ($MODULE eq 'Potentials') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Transition'}
				<div class='fieldBlockContainer' id='TransitionBlock' style="display:none;">
					{literal}
						<script>
							var tansition = $('#Potentials_cf_1063').val();
							 if (tansition == 'L2 - In Transition'){
								$("#TransitionBlock").css("display","block");
								}else{
								$("#TransitionBlock").css("display","none");
							}
						</script>
					{/literal}	
				{elseif ($MODULE eq 'Potentials') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Bid Request Sent'}
				<div class='fieldBlockContainer' id='BidRequestBlock' style="display:none;">
					{literal}
						<script>
							var bidRequest = $('#Potentials_cf_1067').val();
							 if (bidRequest == 'Bid Type - RFI/RFP/RFQ'){
								$("#BidRequestBlock").css("display","block");
								}else{
								$("#BidRequestBlock").css("display","none");
							}
						</script>
					{/literal}	
				{elseif ($MODULE eq 'Accounts') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Present Customer Landscape'}
				<div class='fieldBlockContainer' id='PresentCustomerLandscape'>
				{elseif ($MODULE eq 'Accounts') && vtranslate($BLOCK_LABEL, $MODULE) eq 'PresentCustomer Satisfaction rating'}
				<div class='fieldBlockContainer' id='PresentCustomerSatisfactionrating'>
				{elseif ($MODULE eq 'Potentials') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Bid Request Received'}
				<div class='fieldBlockContainer' id='BidReceivedBlock' style="display:none;">
					{literal}
						<script>
							var bidRequest = $('#Potentials_cf_1067').val();
							 if (bidRequest == 'Bid Type - RFI/RFP/RFQ'){
								$("#BidReceivedBlock").css("display","block");
								}else{
								$("#BidReceivedBlock").css("display","none");
							}
						</script>
					{/literal}
				{elseif ($MODULE eq 'Potentials') && vtranslate($BLOCK_LABEL, $MODULE) eq 'Solution/Bid Stage'}
				<div class='fieldBlockContainer' id='BidStageBlock' style="display:none;">
					{literal}
						<script>
							var perType = $('#Potentials_cf_1067').val();
							var oppStage = $('#Potentials_cf_1063').val();
							 if (perType == 'Bid Type - RFI/RFP/RFQ' && oppStage == 'L6 - Solutioning'){
								$("#BidStageBlock").css("display","block");
								}else{
								$("#BidStageBlock").css("display","none");
							}
						</script>
					{/literal}	
				{else}
				<div class='fieldBlockContainer'>
				{/if}
			
					<h4 class='fieldBlockHeader'>{vtranslate($BLOCK_LABEL, $MODULE)}</h4>
					<hr>
					<table class="table table-borderless">
						<tr>
							{assign var=COUNTER value=0}
							{foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS name=blockfields}
								{assign var="isReferenceField" value=$FIELD_MODEL->getFieldDataType()}
								{assign var="refrenceList" value=$FIELD_MODEL->getReferenceList()}
								{assign var="refrenceListCount" value=count($refrenceList)}
								{if $FIELD_MODEL->isEditable() eq true}
									{if $FIELD_MODEL->get('uitype') eq "19"}
										{if $COUNTER eq '1'}
											<td></td><td></td></tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									{if $COUNTER eq 2}
									</tr><tr>
										{assign var=COUNTER value=1}
									{else}
										{assign var=COUNTER value=$COUNTER+1}
									{/if}
									<td class="fieldLabel alignMiddle" id="{$FIELD_NAME}_{$MODULE}_LBL">{* $FIELD_MODEL->get('uitype')} / {$FIELD_MODEL->getName()} / {vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE) *}
									
										<span id="{$FIELD_MODEL->getFieldName()}_help" title="{vtranslate($FIELD_MODEL->get('label'), $MODULE)}" style="cursor:pointer;" class="customtooltip"><img src="layouts/v7/skins/images/help_field.png" /></span>&nbsp;
										<span>
										{if $isReferenceField eq "reference"}
											{if $refrenceListCount > 1}
												{assign var="DISPLAYID" value=$FIELD_MODEL->get('fieldvalue')}
												{assign var="REFERENCED_MODULE_STRUCTURE" value=$FIELD_MODEL->getUITypeModel()->getReferenceModule($DISPLAYID)}
												{if !empty($REFERENCED_MODULE_STRUCTURE)}
													{assign var="REFERENCED_MODULE_NAME" value=$REFERENCED_MODULE_STRUCTURE->get('name')}
												{/if}
												<select style="width: 140px;" class="select2 referenceModulesList">
													{foreach key=index item=value from=$refrenceList}
														<option value="{$value}" {if $value eq $REFERENCED_MODULE_NAME} selected {/if}>{vtranslate($value, $value)}</option>
													{/foreach}
												</select>
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{else if $FIELD_MODEL->get('uitype') eq "83"}
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE) COUNTER=$COUNTER MODULE=$MODULE}
											{if $TAXCLASS_DETAILS}
												{assign 'taxCount' count($TAXCLASS_DETAILS)%2}
												{if $taxCount eq 0}
													{if $COUNTER eq 2}
														{assign var=COUNTER value=1}
													{else}
														{assign var=COUNTER value=2}
													{/if}
												{/if}
											{/if}
										{else}
											{if $MODULE eq 'Documents' && $FIELD_MODEL->get('label') eq 'File Name'}
												{assign var=FILE_LOCATION_TYPE_FIELD value=$RECORD_STRUCTURE['LBL_FILE_INFORMATION']['filelocationtype']}
												{if $FILE_LOCATION_TYPE_FIELD}
													{if $FILE_LOCATION_TYPE_FIELD->get('fieldvalue') eq 'E'}
														{vtranslate("LBL_FILE_URL", $MODULE)}&nbsp;<span class="redColor">*</span>
													{else}
														{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
													{/if}
												{else}
													{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
												{/if}
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{/if}
										&nbsp;{if $FIELD_MODEL->isMandatory() eq true} <span class="redColor">*</span> {/if}
										{if vtranslate($FIELD_MODEL->get('label'), $MODULE) eq 'Opportunity Name'}
											{*
											<br /><span style="font-weight:bold !important;color:#3055CC;font-size:10px;">Please add Opportunity Name as</span>
											<br /><span style="font-weight:bold !important;color:#3055CC;font-size:10px;">Ex.Offering_FTE_Count_50</span>
											*}
										{/if}
										</span>
									</td>
									{if $FIELD_MODEL->get('uitype') neq '83'}
										<td class="fieldValue" {if $FIELD_MODEL->getFieldDataType() eq 'boolean'} style="width:25%" {/if} {if $FIELD_MODEL->get('uitype') eq '19'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}>
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE)}
										</td>
									{/if}
								{/if}
							{/foreach}
							{*If their are odd number of fields in edit then border top is missing so adding the check*}
							{if $COUNTER is odd}
								<td></td>
								<td></td>
							{/if}
						</tr>
					</table>
				
				</div>
			{/if}
		{/foreach}
	</div>
{/strip}
<style>
			.customtooltip{
				display: inline;
				position: relative;
			}
			.customtooltip:hover:after{
				background: #856AB9;
				/*background: rgba(133,106,185,1);*/
				border-radius: 5px;
				bottom: 26px;
				color: #fff;
				content: attr(title);
				left: 20%;
				padding: 5px 15px;
				position: absolute;
				z-index: 98;
				width: 300px;
			}
			.customtooltip:hover:before{
				border: solid;
				border-color: #856AB9 transparent;
				border-width: 6px 6px 0 6px;
				bottom: 20px;
				content: "";
				left: 50%;
				position: absolute;
				z-index: 99;
			}
		</style>