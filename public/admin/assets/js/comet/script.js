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
                $('#post_edit_modal input[name="id"]').val(data.id);
                $('#post_edit_modal textarea').text(data.content);
                $('img#post_edit_fimage_load').attr('src','media/posts/' + data.image);
                $('#post_edit_modal .cl').html(data.cat_list);
                $('#post_edit_modal').modal('show');

            }
        });
    });



  });
})(jQuery)
