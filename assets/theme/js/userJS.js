function add_user()
{
  save_method = 'add';
  $('#form')[0].reset()
  $('.form-control').removeClass('is-invalid is-valid')
  $('.invalid-feedback').remove()
  $('#user-modal').modal('show')
  $('.modal-title').text('Nuevo usuario')
  $('.btn-user').html('<i class="fas fa-plus-circle fa-sm"></i> Registrar Usuario')
}

function edit_user(id)
{
  save_method = 'update'
  id_update = id

  $('.form-control').removeClass('is-invalid is-valid')
  $('.invalid-feedback').remove()

  $.ajax({
    url: 'user/ajax_edit/' + id,
    type: 'GET',
    dataType: 'JSON',
    success: function(resp){
      $('[name="name"]').val(resp.name)
      $('#user-modal').modal('show')
      $('.modal-title').text('Editar user')
      $('.btn-user').html('<i class="fas fa-edit fa-sm"></i> Editar user')
    }
  })
}

function save()
{
  var url

  if (save_method == 'add') {
    url = 'user/ajax_add'
    id_update = 0
  } else {
    url = 'user/ajax_add/' + id_update
  }

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON',
    data: $('#form').serialize() + '&id=' + id_update,
    success: function(resp){
      if (resp.success) {
        $('#message').append('<div class="alert alert-success">'+
          '<i class="fas fa-check"></i> ' + resp.msg + '</div>')

        $('.alert-success').delay(1500).hide(10, function() {
          $(this).remove()
        });

        // Sets the new location of the current window.
        setTimeout(function(){
          window.location = "user"
        },2000);

      }else{
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

