$(document).ready(() => {
const _relation=[{gender:'Male',relation:'Son'},{gender: 'Male',relation: 'Brother'},{gender: 'Male',relation: 'Father'},{gender:'Male',relation: 'Husband'},{gender: 'Female',relation: 'Daughter'},{gender: 'Female',relation: 'Sister'},{gender: 'Female',relation: 'Mother'},{gender: 'Female',relation: 'Wife'},]
   
$('input[type="radio"]').click(function () {
	if ($(this).is(':checked')) {
		 console.log($(this).val());
             $("#relation").empty();
             $("#relation").append(`<option >-Select-</option>`)
		     $.each(_relation.filter(item => item.gender == $(this).val()), (i, item) =>
		     $("#relation").append(`<option value="${item.relation}">${item.relation}</option>`))
	}
});


});