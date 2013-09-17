$(function() {
	calender();
	
	$('#zipcode').keyup(function(){
		$("#zipcode_id").val('');			
		$.post(baseUrl + 'users/get_zipcode',{value : $(this).val()},function(data){
			
			var availableTags = [];	
				$.each(data, function(x,y) {			
					availableTags.push({value: x, label: y});				
				});			
		
				$( "#zipcode" ).autocomplete({
					minLength: 0,
					source: availableTags,
					focus: function( event, ui ) {
						$( "#zipcode" ).val( ui.item.label );
						return false;
					},
					select: function( event, ui ) {
						$( "#zipcode" ).val( ui.item.label );
						$( "#zipcode_id" ).val( ui.item.value );
						return false;
					}
				});
		});	
	});

	function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    
	$('#SurveyState').keyup(function(){
		
		if($(this).val()!=''){

			$.post(baseUrl + 'zipcodes/get_state',{value : $(this).val()},function(data){
				
				var availableTags = [];	
				$.each(data, function(x,y) {			
					availableTags.push({value: x, label: y});				
				});			
		
				$("#SurveyState").autocomplete({
					minLength: 0,
					source: function( request, response ) {
			          // delegate back to autocomplete, but extract the last term
			          response( $.ui.autocomplete.filter(
			            availableTags, extractLast( request.term ) ) );
			        },
					focus: function( event, ui ) {
						//$( "#state" ).val( ui.item.label );
						return false;
					},
					select: function( event, ui ) {
						
						var terms = split( this.value );
						// remove the current input
						terms.pop();
						// add the selected item
						terms.push( ui.item.label );
						// add placeholder to get the comma-and-space at the end
						terms.push( "" );
						this.value = terms.join( ", " );
						return false;
					}
				});
			});	
		}//close if null value
	});
	
	// to fetch counties of states
	$('#SurveyCounty').keyup(function(){
		if($(this).val()!=""){
			if($('#SurveyState').val()!=""){
				$.post(baseUrl + 'zipcodes/get_county',{value : $(this).val(),state:$('#SurveyState').val()},function(data){
					
					var availableTags = [];	
					$.each(data, function(x,y) {			
						availableTags.push({value: x, label: y});				
					});			
			
					$( "#SurveyCounty" ).autocomplete({
						minLength: 0,
						source: function( request, response ) {
				          // delegate back to autocomplete, but extract the last term
				          response( $.ui.autocomplete.filter(
				            availableTags, extractLast( request.term ) ) );
				        },
						focus: function( event, ui ) {
							return false;
						},
						select: function( event, ui ) {
							
							var terms = split( this.value );
							// remove the current input
							terms.pop();
							// add the selected item
							terms.push( ui.item.label );
							// add placeholder to get the comma-and-space at the end
							terms.push( "" );
							this.value = terms.join( ", " );
							return false;
						}
					});
				});	
			}
			else{
				alert('Please select state');
				$('#SurveyCounty').val('');
				$('#SurveyState').focus();
			}
		}
	}); // end county
	
	// to fetch cities of states
	$('#SurveyCity').keyup(function(){
		if($(this).val()!=""){
			if($('#SurveyState').val()!=""){
				$.post(baseUrl + 'zipcodes/get_city',{value : $(this).val(),state:$('#SurveyState').val()},function(data){
					
					var availableTags = [];	
					$.each(data, function(x,y) {			
						availableTags.push({value: x, label: y});				
					});			
			
					$( "#SurveyCity" ).autocomplete({
						minLength: 0,
						source: function( request, response ) {
				          // delegate back to autocomplete, but extract the last term
				          response( $.ui.autocomplete.filter(
				            availableTags, extractLast( request.term ) ) );
				        },
						focus: function( event, ui ) {
							return false;
						},
						select: function( event, ui ) {
							
							var terms = split( this.value );
							// remove the current input
							terms.pop();
							// add the selected item
							terms.push( ui.item.label );
							// add placeholder to get the comma-and-space at the end
							terms.push( "" );
							this.value = terms.join( ", " );
							return false;
						}
					});
				});	
			}
			else{
				alert('Please select state');
				$('#SurveyCity').val('');
				$('#SurveyState').focus();
			}
		}
	});
	
	// to fetch zipcodes of cities
	$('#SurveyZipcode').keyup(function(){
		if($(this).val()==""){
			$( "#zipcode_id" ).val('');
		} else {
			if($('#SurveyCity').val()!=""){
				$.post(baseUrl + 'zipcodes/get_zipcodes',{value : $(this).val(), state : $('#SurveyState').val(), city : $('#SurveyCity').val()},function(data){
					
					var availableTags = [];	
					$.each(data, function(x,y) {			
						availableTags.push({value: x, label: y});				
					});			
			
					$( "#SurveyZipcode" ).autocomplete({
						minLength: 0,
						source: function( request, response ) {
				          // delegate back to autocomplete, but extract the last term
				          response( $.ui.autocomplete.filter(
				            availableTags, extractLast( request.term ) ) );
				        },
						focus: function( event, ui ) {
							return false;
						},
						select: function( event, ui ) {
							
							var stateIdVal = $( "#zipcode_id" ).val();
							var idVal = ui.item.value;

							if(stateIdVal==""){
								var idVal = stateIdVal + idVal;
							} else{
								var idVal = stateIdVal +','+ idVal;
							}
							
							$( "#zipcode_id" ).val( idVal );

							var terms = split( this.value );
							// remove the current input
							terms.pop();
							// add the selected item
							terms.push( ui.item.label );
							// add placeholder to get the comma-and-space at the end
							terms.push( "" );
							this.value = terms.join( ", " );
							return false;
						}
					});
				});	
			}
			else{
				alert('Please select city');
				$('#SurveyZipcode').val('');
				$('#SurveyCity').focus();
			}
		}
	});
	//end fun SurveyZipcode


	//$("#SurveySurveyChallengeId").closest('.control-group').addClass('hide');
	//$("#SurveyLocalSearchTypeId").closest('.control-group').addClass('hide');
	$("#SurveySurveyTypeId").change(function() {		
        if ($("#SurveySurveyTypeId option:selected").val() == 2) {
        	$("#SurveySurveyChallengeId").closest('.control-group').removeClass('hide');
        }
		else{
			$("#SurveySurveyChallengeId").closest('.control-group').addClass('hide');
		}
		if ($("#SurveySurveyTypeId option:selected").val() == 3) {
        	$("#SurveyLocalSearchTypeId").closest('.control-group').removeClass('hide');
        	$("#SurveyIsPaid").closest('.control-group').addClass('hide');
        	$("#SurveyAmount").closest('.control-group').addClass('hide');
        	$("#SurveyAmount").val(0);
        	$("#SurveyIsPaid").attr('checked',false);
        }
		else{
			$("#SurveyLocalSearchTypeId").closest('.control-group').addClass('hide');
			$("#SurveyIsPaid").closest('.control-group').removeClass('hide');
        	$("#SurveyAmount").closest('.control-group').removeClass('hide');
		}
	});
	
	
	$("#btn_send_money").click(function(){
		
		var uid = $("#userid").val();
		var servername = $("#servername").val();
		var sid = '';
		var amt = 0;
		
		var chk1 = $("#PaymentSendmoney1").attr('checked');
		var chk2 = $("#PaymentSendmoney2").attr('checked');
		var chk3 = $("#PaymentSendmoney3").attr('checked');
		
		if(chk1){
			amt++;
			sid = sid + '1_';
		}
		if(chk2){
			amt++;zipcode
			sid = sid + '2_';
		}
		if(chk3){
			amt++;
			sid = sid + '3';
		}
		
		if(sid==""){
			alert('Please select atleast one survey');
			return false;
		}
		
		var linkpath = "http://"+servername+"/survey/admin/users/payment_process_multiple/"+uid+"/"+sid+"/"+amt+"/";
		window.location=linkpath;

	});
	
	$("#chk_sendmoneyall").click(function(){
		var chk = $(this).attr('checked');
		if(this.checked) {
			$("#sendmoney_default").show();
			$("#PaymentSendmoney1").attr('checked',true);
			$("#PaymentSendmoney2").attr('checked',true);
			$("#PaymentSendmoney3").attr('checked',true);
		} else {
			$("#sendmoney_default").hide();
			$("#PaymentSendmoney1").attr('checked',false);
			$("#PaymentSendmoney2").attr('checked',false);
			$("#PaymentSendmoney3").attr('checked',false);
		}
		
	});
	
	$(".chk_sendmoney").click(function(){
		var chk1 = $("#PaymentSendmoney1").attr('checked');
		var chk2 = $("#PaymentSendmoney2").attr('checked');
		var chk3 = $("#PaymentSendmoney3").attr('checked');
		if(chk1 || chk2 || chk3 ){
			$("#sendmoney_default").show();
		} else {
			$("#sendmoney_default").hide();
		}
	});
	
	$("#SurveyIsPaid").click(function(){
		
		if(this.checked) {
			$("#spnamount").show();
			$("#SurveyAmount").val(realval);
		} else {
			$("#spnamount").hide();
			$("#SurveyAmount").val('0');
		}
		
	});
	
	$('#SurveyCountry').change(function(){
		
		if($(this).val() != ''){
			$("#statediv").load(baseUrl+'zipcodes/ajax_state_list/'+$(this).val());
		}
	});
	/*
	$('#SurveyState').live("change", function(){
		
		if($(this).val() != ''){
			$("#citydiv").load(baseUrl+'zipcodes/ajax_city_list/'+$(this).val());
		}
	});
	
	$('#SurveyCity').live("change", function(){
		
		if($(this).val() != ''){
			$("#zipcodediv").load(baseUrl+'zipcodes/ajax_zipcode_list/'+$(this).val());
		}
	});
	*/
});

function calender(){	 
			var d = new Date();
			var max_date = d.getFullYear()-13;
			var min_date = 1940;

			$("#datedob" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: min_date+":"+max_date
			});
}
