function save()
{
  $.ajax({
    url: 'login',
    type: 'POST',
    dataType: 'JSON',
    data: $('#form').serialize(),
    success: function(resp){
      if (resp.success) {
        
        window.location = resp.dashboard

      }else if (resp.error == 'error') {
        $('#message').append('<div class="alert alert-danger">'+
          '<i class="fas fa-times"></i> ' + resp.msg + '</div>')

        $('.alert-danger').delay(3500).hide(10, function() {
          $(this).remove()
        });
      }
      else{
        $.each(resp.messages, function(key, value) {
          var element = $('#' + key)
          if (value != '') {
            element.addClass('is-invalid')
            element.siblings('.invalid-feedback').remove()
            element.after(value)
          }else{
            element.removeClass('is-invalid')
            element.siblings('.invalid-feedback').remove()
          }
        });
      }
    }
  })

  $('#form input').on('keyup', function () { 
    $(this).removeClass('is-invalid').addClass('is-valid');
    //$(this).parents('.form-group').find('#error').html(" ");
  });

}

function delete_user(id)
{
  Swal.fire({
    title: '¿Estás seguro?',
    text: "No podras revertir la acción!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminarlo!'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        url: 'user/ajax_delete/' + id,
        type: 'POST',
        dataType: 'JSON',
        success: function(resp){
          if (resp.success) {
            Swal.fire({
              icon: 'success',
              title: 'Eliminado!',
              text: 'El registro ha sido eliminado.',
              showConfirmButton: false,
              timer: 1800
            })

            setTimeout(function(){
              window.location = "user"
            },1800);
          }
        }
      })
    }
  })
}

