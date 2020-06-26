$(document).ready(function(){
    $('.remove-to-do').click(function(){
        const id = $(this).attr('id');
        
        $.post("app/remove.php", 
              {
                  id: id
              },
              (data)  => {
                 if(data){
                     $(this).parent().hide(600);
                 }
              }
        );
    });

    $(".check-box").click(function(e){
        const id = $(this).attr('data-todo-id');
        
        $.post('app/check.php', 
              {
                  id: id
              },
              (data) => {
                  if(data != 'error'){
                      const h2 = $(this).next();
                      if(data === '1'){
                          h2.removeClass('checked');
                      }else {
                          h2.addClass('checked');
                      }
                  }
              }
        );
    });
});