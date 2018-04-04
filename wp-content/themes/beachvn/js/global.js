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

  function addNewCommentUI(comment_ID, content, author) {
    console.log('new comment', comment_ID, content);

    var user_avatar = $('.comment-container .comment:last-child .img-fluid').attr('src');

    var comment=$('<div id="comment-' + comment_ID + '" class="comment"></div>');

    //comment left
    var comment_left=$('<div class="comment-left"></div>');

    var comment_avatar=$('<div class="comment-avatar"></div>');
    var img_fluid=$('<img alt="Avatar" class="img-fluid" />').attr('src', user_avatar);
    comment_avatar.append(img_fluid);

    comment_left.append(comment_avatar);

    comment.append(comment_left);

    //comment right
    var comment_right=$('<div class="comment-right"></div>');
    var comment_content=$('<div class="comment-content"></div>');

    //author
    var comment_author=$('<a class="comment-author"></a>').text(author).attr('href', "##");
    comment_content.append(comment_author).append('\n');

    //text
    var comment_text=$('<span class="comment-text"></span>').text(content);
    comment_content.append(comment_text);

    //time
    var comment_time=$('<div class="comment-time-container"></div>').html('<span class="comment-time">Just now</span>');
    comment_content.append(comment_time);

    //delete buttton
    var comment_actions=$('<div class="comment-actions btn-group"></div>');
    //dropdown button
    comment_actions.append($('<div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></div>'));
    //dropdown menu
    var button_delete = $('<button class="dropdown-item btn-delete-comment" type="button" data-comment-id="' + comment_ID + '">Xoá</button>');
    button_delete.on('click', clickDeleteComment);
    comment_actions.append($('<div class="dropdown-menu dropdown-menu-right"></div>').append(button_delete));

    comment_content.append(comment_actions);

    comment_right.append(comment_content);
    comment.append(comment_right);

    //add comment
    comment.insertBefore( $('.comment-container .comment:last-child') );
  }

  /**
   * Event on press Enter comment
   */
  $(".comment-form #comment").on('keyup', e=>{
    //if press Enter, submit form
    if (e.keyCode == 13) {
      var textarea=$(e.target);
      var commentForm=textarea.closest('.comment-form');

      var currenVal=textarea.val();
      textarea.val(currenVal.replace(/^\s+|\s+$/g, ""));
      var comment_content=textarea.val();

      $.ajax({
        url : commentForm.attr('action'),
        type : 'post',
        data : commentForm.serialize(),
        success : function( response, textStatus ) {
          if (textStatus==="success") {
            var comment = JSON.parse(response);
            addNewCommentUI(comment.comment_ID, comment.comment_content, comment.comment_author);
            textarea.val("");
          }
        }
      });

      //$(".comment-form").submit();
    }
  });

  /**
   * Delete comment
   */
  function clickDeleteComment(e) {
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
  }
  $(".btn-delete-comment").on('click', clickDeleteComment);

  /**
   * Event change slider
   */
  $('input.slider').on('change', e=>{
    var input=$(e.target);
    var reviewValue=input.parent(".review-item").find(".review-value");
    reviewValue.text(input.val());
  });
})(jQuery);
