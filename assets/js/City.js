var data=[];
var result=[]
$.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result => showAllCity(result));

$.getJSON(`${window.location.origin}/JSC/DropDown/`, data => {
        result=data
	$.each(result[0], (i, item) =>
		//state
        $("#selected_state").append(`<option value="${item.state_id}">${item.state_name}</option>`));
});
function showAllCity(data){
    var rows = 0;
     $('#newCity').attr("disabled",false);
        var table = `<table id='table' class='table'>
            <thead>
                <th>State</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
        `
        $.each(data.city, function (i, item) {
            rows++;
            const state = data.state.filter(items => items.state_id == item.state_id)
        	table += `<tr id='rows${rows}'>
            <td>${state[0].state_name}</td>
            <td>${item.city_name}</td>
            <td><button state=${state[0].state_id} city_name=${item.city_name} city_id=${item.city_id}  id='edit_city' class='city_edit btn btn-info'>Edit</button></td>
            <td><button state_id=${state[0].state_id} city_name=${item.city_name} city_id=${item.city_id}  id='edit_delete' class='city_delete btn btn-danger'>Delete</button></td>
            </tr>`;
            });
            `</table>`;
            if (data.city.length > 0) {
                $('#result_city').html(table);
            }
            else{$('#result_city').html(`<h3>No City Found.</h3>`)}
}
function showAFiltredCity(data,state){   
    var rows = 0;
     $('#newCity').attr("disabled",false);
        var table = `<table id='table' class='table'>
            <thead>
                <th>State</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>`;
        $.each(data.city, function (i, item) {
            rows++;
            const states = data.state.filter(items => items.state_id == state)
            if(item.state_id==state){ 
        	table += `<tr id='rows${rows}'>
            <td>${states[0].state_name}</td>
            <td>${item.city_name}</td>
            <td><button state=${states[0].state_id} city_name=${item.city_name} city_id=${item.city_id}  id='edit_city' class='city_edit btn btn-info'>Edit</button></td>
            <td><button state_id=${states[0].state_id} city_name=${item.city_name} city_id=${item.city_id}  id='edit_delete' class='city_delete btn btn-danger'>Delete</button></td>
            </tr>`;}
            });
            `</table>`;
        if (data.city.length > 0) {
            $('#result_city').html(table);
        }
        else {
        	$('#result_city').html(`<h3>No City Found.</h3>`)
        }
}
var totalrows = 0;
function newCity() {
     totalrows++;
     return (
		`<tr id="new_city">
            <td>
              <select class="form-control" id="state" name="state${totalrows}"><option>-Select State-</option></select>
            </td>
            <td>
                <input type="text" id='city' class='form-control' name="city${totalrows}" placeholder='Enter City'>
            </td>
            <td>
               <button type='btn' id="add" class='addCity btn btn-success'>Add</button>
            </td>
            <td>
            </td>
        </tr><div class="clearfix"></div>`
	);
}
function editCity($data){
    return (
        `<tr id="edit_city">
            <td>
            <input type='hidden' id="oldState" value='${$data[0].state_id}'>
            <input type='hidden' id="city_id" value='${$data[0].city_id}'>
              <select class="form-control" id="state" name="state${totalrows}"><option>-Select State-</option></select>
            </td>
            <td>
                <input type="text" id='city' value='${$data[0].city_name}' class='form-control' name="city${totalrows}" placeholder='Enter City'>
            </td>
            <td>
               <button type='btn' id="edit"    class='saveCity btn btn-success'>Edit</button>
            </td>
            <td>
               
            </td>
        </tr><div class="clearfix"></div>`
    );
}
$(document).ready(()=>{
    $('#selected_state').change(() => {
    	$("#selected_city").empty();
    	// $("#ward").empty();
    	// $("#colony").empty();
        $("#selected_city").append(`<option >-Select City-</option>`);
    	$.each(result[1].filter(item => item.state_id == $('#selected_state').val()), (i, item) =>
    		$("#selected_city").append(`<option value="${item.city_id}">${item.city_name}</option>`))
    })

    $('#result_city').on('click', '.city_delete', e => {
        const id = e.target.attributes[2].value;
       $.ajax({
                type: "POST",
                url: `${window.location.origin}/JSC/City/DeleteCity`,
                data: {city_id:id},
            }).done(function () {
                alert("City Deleted");
                $.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result => showAllCity(result));
            })
    });
    $('#result_city').on('click', '.city_edit', e => {
        // const state_id= e.target.attributes[0].value;
        // const city_name = e.target.attributes[1].value;
        // const city_id = e.target.attributes[2].value;
        $data = [{ state_id: e.target.attributes[0].value, city_name:e.target.attributes[1].value,city_id:e.target.attributes[2].value}]
        $('button ').attr("disabled", "disabled");
        $('#table thead').append(editCity($data)).ready(() => {
            $.each(result[0], (i, item) =>{
                if ($('#oldState').val()===item.state_id)
                {
                $("#state").append(`<option selected value="${item.state_id}">${item.state_name}</option>`)
                }   
                else{
                    $("#state").append(`<option value="${item.state_id}">${item.state_name}</option>`)
                }
            })
            $('#edit').click(() => {
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/JSC/City/EditCity`,
                    data: { state: $('#state').val(), city: $('#city').val(),city_id:$('#city_id').val() },
                }).done(function () {
                    alert(`City Edited `);
                    $.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result => showAllCity(result));
                })
            })
        })
    });
    $('#newCity').click(() => {
        $('#newCity').attr("disabled", "disabled");
    	$('#table thead').append(newCity()).ready(()=>{
                $.each(result[0], (i, item) =>
                	//state
                	$("#state").append(`<option value="${item.state_id}">${item.state_name}</option>`))
                $('#add').click(() => {
                    $.ajax({
                    	type: "POST",
                    	url: `${window.location.origin}/JSC/City/AddCity`,
                    	data: {state:$('#state').val(),city:$('#city').val()},
                    }).done(function () {
                        alert("City Added");
                        $.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result => showAllCity(result));
                    })
                })
        })
    });
    $.getJSON(`${window.location.origin}/JSC/City/FetchAllStateCity`, result =>data=result);
    $('#selected_state').change(()=>{
        $('#table').append(showAFiltredCity(data, $('#selected_state').val()))
    })
    
})

