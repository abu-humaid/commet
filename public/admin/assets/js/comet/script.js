(function($){
  $(document).ready(function(){

    $('a#logout-button').click(function(e){
      e.preventDefault();

      $('form#logout-form').submit();


    });

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



  });
})(jQuery)
