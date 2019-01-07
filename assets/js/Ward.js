var data=[]
$.getJSON(`${window.location.origin}/JSC/Ward/FetchAllStateCityWard`, result => {
    data = result 
    showAllWard(result)
});
function showAllWard(data) {
	var rows = 0;
	$('#newWard').attr("disabled", false);
	var table = `<table id='table' class='table'>
            <thead>
                <th>State</th>
                <th>City</th>
                <th>Ward</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
        `
	$.each(data.ward, function (i, item) {
		rows++;
        const city = data.city.filter(items => items.city_id == item.city_id)
        const state = data.state.filter(items => items.state_id == city[0].state_id)
        // console.log(city[0]);
        
		table += `<tr id='rows${rows}'>
            <td>${state[0].state_name}</td>
            <td>${city[0].city_name}</td>
            <td>${item.ward_name}</td>
            <td><button state=${state[0].state_id} city=${city[0].city_id} ward_name=${item.ward_name} ward_id=${item.ward_id}  id='edit_ward' class='city_ward btn btn-info'>Edit</button></td>
            <td><button  ward_id=${item.ward_id}  id='delete_ward' class='ward_delete btn btn-danger'>Delete</button></td>
            </tr>`;
	});
	`</table>`;
	if (data.ward.length > 0) {
		$('#result_ward').html(table);
	} else {
		$('#result_ward').html(`<h3>No Ward Found.</h3>`)
	}
}
//New 
function newWard() {
	totalrows++;
	return (
		`<tr id="new_ward">
            <td>
              <select class="form-control" id="state" name="state${totalrows}"><option>-Select State-</option></select>
            </td>
            <td>
            <select class="form-control" id="city" name="city${totalrows}"><option>-Select City-</option></select>
            </td>
            <td>
                <input type="text" id='ward' class='form-control' name="ward${totalrows}" placeholder='Enter Ward'>
            </td>
            <td>
               <button type='btn' id="add" class='addWard btn btn-success'>Add</button>
            </td>
            <td>
            </td>
        </tr><div class="clearfix"></div>`
	);
}

$(document).ready(()=>{
$('#newWard').click(() => {
	alert("add ward")
	$('#newWard').attr("disabled", "disabled");
	$('#table thead').append(newWard()).ready(() => {
		$.each(result[0], (i, item) =>{
		    $("#state").append(`<option value="${item.state_id}">${item.state_name}</option>`)
        })
        $('#state').change(() => {
        	$('#city').empty();
        	console.log(result[0]);

        	$.each(result[1].filter(items => items.state_id == $('#state').val()), (i, items) =>
        		$("#city").append(`<option value="${items.city_id}">${items.city_name}</option>`))
        })
		$('#add').click(() => {
			$.ajax({
				type: "POST",
				url: `${window.location.origin}/JSC/City/AddCity`,
				data: {
					state: $('#state').val(),
					city: $('#city').val()
				},
			}).done(function () {
				alert("City Added");
				$.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result => showAllCity(result));
			})
		})
	})
});
})