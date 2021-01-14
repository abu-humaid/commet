(function($){
  $(document).ready(function(){

    //Datatable
    $('.data-table').DataTable();

    // CK Editor
    CKEDITOR.replace('post_editor');


    // Logout system
    $('a#logout-button').click(function(e){
      e.preventDefault();

      $('form#logout-form').submit();


    });

    // Category Edit

    $(document).on('click','a#category_edit', function(e){
      e.preventDefault();

      let id = $(this).attr('edit_id');

      $.ajax({
        url: 'post-category-edit/' + id,
        dataType: 'json',
        success: function(data){
            $('#category_modal_update form input[name="name"]').val(data.name);
            $('#category_modal_update form input[name="id"]').val(data.id);
        }
      });


    });

    // Tag edit
    $(document).on('click','a#tag_edit', function(e){
      e.preventDefault();

      let id = $(this).attr('edit_id');

      $.ajax({
        url: 'tag-edit/' + id,
        dataType: 'json',
        success: function(data){
            $('#tag_modal_update form input[name="name"]').val(data.name);
            $('#tag_modal_update form input[name="id"]').val(data.id);
        }
      });

    });

    // Featured Image change
    $(document).on('change','#fimage', function(event){
        event.preventDefault();

        let post_image_url = URL.createObjectURL(event.target.files[0]);
        $('img#post_fimage_load').attr('src', post_image_url);

    });
    // Edit Image change
    $(document).on('change','#fimage_edit', function(event){
        event.preventDefault();

        let post_image_url = URL.createObjectURL(event.target.files[0]);
        $('img#post_edit_fimage_load').attr('src', post_image_url);

    });

    //Post edit
    $(document).on('click','#post_edit', function(e){
        e.preventDefault();

        let edit_id = $(this).attr('edit_id');

        $.ajax({
            url: 'post_edit/' + edit_id,
            success: function(data){

                $('#post_edit_modal input[name="title"]').val(data.title);
                $('#post_edit_modal input[name="old_fimg"]').val(data.image);
                $('#post_edit_modal input[name="id"]').val(data.id);
                $('#post_edit_modal textarea').text(data.content);
                $('img#post_edit_fimage_load').attr('src','media/posts/' + data.image);
                $('#post_edit_modal .cl').html(data.cat_list);
                $('#post_edit_modal').modal('show');

            }
        });
    });

    //Slide scripts
    $(document).on('click','#comet-slide-button', function(){

      let rand = Math.floor(Math.random() * 10000 );

      $('.comet-slider-container').append('<div id="slider-card-'+ rand +'" class="card">\n' +
      '  <div data-toggle="collapse" data-target="#slide-'+ rand +'" class="card-header">\n' +
      '<h3>Slide-'+ rand +' <button id="comet-slide-remove-btn" remove_id="'+ rand +'" \n' +
      'class="close">&times;</button> </h3>\n' +
      '  </div>\n' +
      '  <div id="slide-'+ rand +'" class="collapse">\n' +
      '    <div  class="card-body">\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Sub-title</label>\n' +
      '        <input type="text" name="sub_title[]" class="form-control">\n' +
      '        <input type="hidden" name="slider_code[]" value="'+ rand +'" >\n' +
      '      </div>\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Title</label>\n' +
      '        <input type="text" name="title[]" class="form-control">\n' +
      '      </div>\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Button 01 Title</label>\n' +
      '        <input type="text" name="btn_01_title[]" class="form-control">\n' +
      '      </div>\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Button 01 Link</label>\n' +
      '        <input type="text" name="btn_01_link[]" class="form-control">\n' +
      '      </div>\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Button 02 Title</label>\n' +
      '        <input type="text" name="btn_02_title[]" class="form-control">\n' +
      '      </div>\n' +
      '      <div class="form-group">\n' +
      '        <label for="">Button 02 Link</label>\n' +
      '        <input type="text" name="btn_02_link[]" class="form-control">\n' +
      '      </div>\n' +
      '    </div>\n' +
      '  </div>\n' +
    '  </div>');

    return false;
    });

    // Remove slider
    $(document).on('click','#comet-slide-remove-btn', function(){

      let remove_code = $(this).attr('remove_id');
      $('#slider-card-' + remove_code ).remove();

      return false;
    });


  });
})(jQuery)
