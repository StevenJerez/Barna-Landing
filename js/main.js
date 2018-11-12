function send_frm()
{
	var form = $('.frm_save');
	$.ajax({
		url: './send.php',
		type: 'POST',
		data: form.serialize(),
		success: function(response)
		{
			console.log(response);
		}
	});
}

$('.add').on('click', function(){
	$('.competitor_inputs').clone().appendTo('.competitors');
});