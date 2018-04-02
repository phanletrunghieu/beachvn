(function($){
  /**
   * Auto scroll to an element
   */
  var elem = $(window.location.hash);
  if (elem.length>0) {
    $('html, body').animate({
      scrollTop: elem.offset().top
    }, 1000);
  }

  /**
   * Event on press Enter comment
   */
  $(".comment-form #comment").on('keyup', e=>{
    //if press Enter, submit form
    if (e.keyCode == 13) {
      var textarea=$(e.target);
      var currenVal=textarea.val();
      textarea.val(currenVal.replace(/^\s+|\s+$/g, ""));
      textarea.disabled = true;
      $(".comment-form").submit();
    }
  });

  /**
   * Delete comment
   */
  $(".btn-delete-comment").on('click', e=>{
    var comment_ID = $(e.target).data('comment-id');
    $.ajax({
      url : post.ajax_url,
      type : 'post',
      data : {
        action : 'delete_comment',
        comment_ID : comment_ID
      },
      success : function( response ) {
        if(response === '1'){
          $("#comment-"+comment_ID).remove();
          console.log('deleted comment ', comment_ID);
        }
      }
    });
  });
})(jQuery);
