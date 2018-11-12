function send_frm()
{
	var form = $('.frm_save');
	$.ajax({
		url: './save.php',
		type: 'POST',
		data: form.serialize(),
		success: function(response)
		{
			console.log(response);
		}
	});
}

$('.add').on('click', function(){ 
	var count = $('.competitor_inputs').length;
	var html = `<div class="row competitor_inputs">
                     <div class="col-md-6 mt-5">
                        <label for="">Nombre</label>
                        <input type="text" name="competitor_name[]">
                     </div>
                     <div class="col-md-6 mt-5">
                        <label for="">Correo</label>
                        <input type="email" name="competitor_email[]">
                     </div>
                  </div>`;
    if(count <= 4)
    {
    	 $(html).appendTo('.competitors');	
    }else{
    	console.log('Solo puedes agregar 6 competidores como maximo');
    }
   
});