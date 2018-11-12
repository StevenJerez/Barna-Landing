function send_frm()
{
	var form = $('.frm_save');
    if(form.valid())
    {
            $.ajax({
            url: './save.php',
            type: 'POST',
            data: form.serialize(),
            success: function(response)
            {
                if(response == 'ok')
                {
                    swal(
                          'Felicidades!',
                          'Ya estas participando',
                          'success'
                        )
                    $('.frm_save')[0].reset();
                    location.reload();
                }else{
                   swal(
                          'error',
                          'Hubo un error al procesar tu solicitud, trata de nuevo mas tarde.',
                          'warning'
                        ) 
               }
            }
        });
        }else{
            swal(
              'error',
              'Completa los campos requeridos.',
              'warning'
            ) 
        }
}

$('.add').on('click', function(){ 
	var count = $('.competitor_inputs').length;
	var html = `<div class="row competitor_inputs">
                     <div class="col-md-6 mt-5">
                        <label for="">Nombre</label>
                        <input type="text" name="competitor_name[]" required="required">
                     </div>
                     <div class="col-md-6 mt-5">
                        <label for="">Correo</label>
                        <input type="email" name="competitor_email[]" required="required">
                     </div>
                     <button class="btn btn-danger btn-sm mt-2" style="margin-top: 5px;margin-left: 15px;" onclick="delc($(this))">Eliminar</button>
                  </div>`;
    if(count <= 4)
    {
    	 $(html).appendTo('.competitors');	
    }else{
        swal(
              'error',
              'Solo puedes agregar 5 competidores como maximo.',
              'warning'
            );
    }
});

function delc(dom)
{
    $(dom).parents('.competitor_inputs').remove();
}