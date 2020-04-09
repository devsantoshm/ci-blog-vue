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

        $('.alert-success').delay(500).show(10, function() {
          $(this).delay(3000).hide(10, function() {
            $(this).remove()
          });
        });

        $('#area-modal').delay(4000).hide(0, function() {
          $(this).modal('hide')
          window.location = "area" // Sets the new location of the current window.
        });

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