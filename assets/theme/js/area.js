function add_area()
{
  save_method = 'add';
  $('#form')[0].reset()
  $('.form-control').removeClass('is-invalid is-valid')
  $('.invalid-feedback').remove()
  $('#area-modal').modal('show')
  $('.modal-title').text('Nueva Area')
  $('.btn-area').html('<i class="fas fa-plus-circle fa-sm"></i> Registrar Area')
}

function edit_area(id)
{
  save_method = 'update'
  id_update = id

  $('.form-control').removeClass('is-invalid is-valid')
  $('.invalid-feedback').remove()

  $.ajax({
    url: 'area/ajax_edit/' + id,
    type: 'GET',
    dataType: 'JSON',
    success: function(resp){
      $('[name="name"]').val(resp.name)
      $('#area-modal').modal('show')
      $('.modal-title').text('Editar Area')
      $('.btn-area').html('<i class="fas fa-edit fa-sm"></i> Editar Area')
    }
  })
}

function save()
{
  var url

  if (save_method == 'add') {
    url = 'area/ajax_add'
  } else {
    url = 'area/ajax_add/' + id_update
  }

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON',
    data: $('#form').serialize(),
    success: function(resp){
      if (resp.success) {
        $('#message').append('<div class="alert alert-success">'+
          '<i class="fas fa-check"></i> ' + resp.msg + '</div>')

        $('.alert-success').delay(1500).hide(10, function() {
          $(this).remove()
        });

        // Sets the new location of the current window.
        setTimeout(function(){
          window.location = "area"
        },2000);

      }else{
        $.each(resp.messages, function(key, value) {
          var element = $('#' + key)
          element.addClass('is-invalid')
          element.siblings('.invalid-feedback').remove()
          element.after(value)
        });
      }
    }
  })

  $('#form input').on('keyup', function () { 
    $(this).removeClass('is-invalid').addClass('is-valid');
    //$(this).parents('.form-group').find('#error').html(" ");
  });

}

function delete_area(id)
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
        url: 'area/ajax_delete/' + id,
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
              window.location = "area"
            },1800);
          }
        }
      })
    }
  })
}

