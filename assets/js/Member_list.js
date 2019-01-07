 const member_list=[]
 formatDate=date=>{
	var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;
return [day, month, year].join('-');
}
showlist=data=>{
var table = `<table id='table' class="table table-responsive table-hover">
    <thead>
        <th>S no.</th>
        <th>Member Name</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Occupation</th>
        <th>Relation</th>
        <th>Relation To</th>
        <th>Gotra</th>
        <th>Mobile Number</th>
        <th>image</th>
        <th>Action</th>
    </thead>`
    $.each(data,(i,item)=>{
        table+=`<tr>
        <td>${i+1}</td>
        <td>${item.member_name}</td>
        <td>${formatDate(item.member_dob)}</td>
        <td>${item.member_gender}</td>
        <td>${item.member_occupation}</td>
        <td>${item.member_relation}</td>
        <td>${item.member_relation_to}</td>
        <td>${item.member_gotra}</td>
        <td>${item.member_mobile}</td>
        <td><img class = 'img img-thumbnail'
        width = '100'
        height = '100'
        src = '${window.location.origin}/JSC/assets/images/members/${item.member_image}' > </td>
        <td><button class='btn btn-info '>Read More</td>
        `
    })
    table+=`</table>`
    $('#member_list').html(table)
}
newMember = () => {
	
	return (
        `<tr id="new_member">
            <td>
              0
            </td>
            <td>
                <input type="text" id='member_name' class='form-control' name="member_name" placeholder='Enter Member Name'>
            </td>
            <td>
                <input type="text" id='DOB' class='form-control' name="member_dob">
            </td>
            <td>
                <input type="radio" id='member_gender' name="member_gender" value='Male'> Male
                <input type="radio" id='member_gender' name="member_gender" value='Female'> Female
            </td>
            <td>
                <select  id='member_occupation' class='form-control' name="member_occupation"></select>
            </td>
            <td>
               <div id='relation'></div>
            </td>
            <td>
              <div>${member_list[0][0]['member_relation_to']}</div>
            </td>
            <td>
               <div>${member_list[0][0]['member_gotra']}</div>
            </td>
            <td>
                <input type="number" id='member_mobile' class='form-control' name="member_mobile" placeholder='Mobile Number'>
            </td>
            <td>
                <input type="file" id='member_image' class='form-control' name="member_file">
            </td>
            <td><button class='btn btn-success' type='submit' id='addMember'>Add</button></td>
        </tr><div class="clearfix"></div>`
	);
}
var occupation=['Advocate','Businessman','CA','Doctor','Engineer','Govt Job','Political','Pvt Job','Self Employee','Student','Teacher','Other'];
$(document).ready(()=>{
     $.getJSON(`${window.location.origin}/JSC/MemberList`, result => {showlist(result) ,member_list.push(result)});
     $('#newMember').click(() => {
        $('#newMember').attr("disabled", "disabled");
    	$('#table thead').append(newMember()).ready(()=>{ confirm("are u sure");
            $("#member_occupation").append(`<option>-Select Occupation-</option>`)
                $.each(occupation, (i, item) =>
			            {$("#member_occupation").append(`<option value="${item}">${item}</option>`)})
                        $( ()=>{
                            $( "#DOB" ).datepicker({maxDate: "-D",changeMonth: true,changeYear: true,dateFormat:'yy-mm-dd' });
                        } );
                        const _relation=[{gender:'Male',relation:'Son'},{gender: 'Female',relation: 'Daughter'}]
                        $("#relation").html("Chose Gender");
                        $('input[type="radio"]').click(function () {
                            if ($(this).is(':checked')) {
                                $.each(_relation.filter(item => item.gender == $(this).val()), (i, item) =>
                                $("#relation").html(item.relation))
                            }
                        });
                    $('#addMember').click(() => {
                    //    $.getJSON(`${window.location.origin}/JSC/MemberList`, result => {
                    //     	showlist(result), member_list.push(result)
                    //     });
                        var form_data = new FormData();

                        var files = $('#member_image')[0].files[0];
                        form_data.append('member_image', files);
                         form_data.append('member_name', $('#member_name').val());
                         form_data.append('member_dob', $('#DOB').val());
                         form_data.append('member_gender', $('input[name=member_gender]:checked').val());
                         form_data.append('member_occupation', $('#member_occupation').val());
                         form_data.append('member_mobile', $('#member_mobile').val());
                        $.ajax({
                                url: `${window.location.origin}/JSC/Member/addMember`,
                                type: 'post',
                                data: form_data,
                                contentType: false,
                                processData: false,
                                success: function(response){
                                    if(response != 0){
                                       $('#newMember').attr("disabled", false);
                                       $.getJSON(`${window.location.origin}/JSC/MemberList`, result => {
                                       	showlist(result), member_list.push(result)
                                       });
                                    }else{
                                        alert('Member Not Added');
                                    }
                                },
                            });
                        //  $('#add-member').iframePostForm({
                        //  	post: function () {
                         	
                        //  	},
                        //  	complete: function (response) {
                        //  		$('#newMember').attr("disabled", false);
                        //  		$.getJSON(`${window.location.origin}/JSC/MemberList`, result => {showlist(result),member_list.push(result)});
                        //  	}
                        //  });
                    // $.ajax({
                    // 	type: "POST",
                    // 	url: `${window.location.origin}/JSC/Member/AddMember`,
                    //     data: { 
                    //             member_name:$('#member_name').val(),
                    //             member_dob:$('#DOB').val(),
                    //             member_gender: $('input[name=member_gender]:checked').val(),
                    //             member_occupation: $('#member_occupation').val(),
                    //             member_mobile: $('#member_mobile').val(),
                    //             member_image:file
                    //             },
                    //             cache: false,
                    // }).done( ()=> {
                    //     alert("Member Added");
                    //     $.getJSON(`${window.location.origin}/JSC/MemberList`, result => {showlist(result),member_list.push(result)});
                    // })
                })
        })
    });
})