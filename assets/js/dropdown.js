var data = []
var occupation=['Advocate','Businessman','CA','Doctor','Engineer','Govt Job','Political','Pvt Job','Self Employee','Teacher'];
$.getJSON(`${window.location.origin}/JSC/DropDown/`, result => {
	data=result
	$.each(result[0], (i, item) =>
		//state
		$("#state").append(`<option value="${item.state_id}">${item.state_name}</option>`))
	//subcast
		$.each(result[4], (i, item) =>
			$("#subcast").append(`<option value="${item.subcast_id}">${item.subcast_name}</option>`))
	//ocupation
			$.each(occupation, (i, item) =>
			$("#occupation").append(`<option value="${item}">${item}</option>`))

});
$(document).ready(()=>{
	
	//fill city dropdown
	$('#state').change(() => {
		$("#city").empty();
		$("#ward").empty();
		$("#colony").empty();
		$("#city").append(`<option >-Select City-</option>`);
		$.each(data[1].filter(item => item.state_id == $('#state').val()), (i, item) =>
			$("#city").append(`<option value="${item.city_id}">${item.city_name}</option>`))
	})
	//fill ward
	$('#city').change(() => {
		$("#ward").empty();
		$("#colony").empty();
		$("#ward").append(`<option >-Select ward-</option>`);
		$.each(data[2].filter(item => item.city_id == $('#city').val()), (i, item) =>
			$("#ward").append(`<option value="${item.ward_id}">${item.ward_name}</option>`))
	})
	//colony
	$('#ward').change(() => {
		$("#colony").empty();
		$("#colony").append(`<option >-Select colony-</option>`);
		$.each(data[3].filter(item => item.ward_id == $('#ward').val()), (i, item) =>
			$("#colony").append(`<option value="${item.colony_id}">${item.colony_name}</option>`))
	})
	//gotra
	$('#subcast').change(() => {
		$("#gotra").empty();
		$("#gotra").append(`<option >-Select gotra-</option>`);
		$.each(data[5].filter(item => item.subcast_id == $('#subcast').val()), (i, item) =>
			$("#gotra").append(`<option value="${item.gotra_id}">${item.gotra_name}</option>`))
	})

})
