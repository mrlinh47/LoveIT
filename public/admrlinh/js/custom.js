$(window).load(function(){
    $('a#chang-status').click(function(){
        var id = $(this).attr('data-id');
        var token = $('input[name="_token"]').val();
        $.ajax({
            type: "GET",
            url: 'edit-status/'+id,
            dataType : 'json', 
            data: {'id':id, _token: token },
            success: function( data) {
               //console.log(data);
               if(data.active == 1){
                    $('a#chang-status i#id-'+id).removeClass('fa-times icon-inactive').addClass('fa-check icon-active');
               }else{
                    $('a#chang-status i#id-'+id).removeClass('fa-check icon-active').addClass('fa-times icon-inactive');
               }
            }

   
        });
    });

    $('a#chang-status-news').click(function(){
        var id = $(this).attr('data-id');
        var token = $('input[name="_token"]').val();
        //alert(id);
        $.ajax({
            type: "GET",
            url: 'edit-status-news/'+id,
            dataType : 'json', 
            data: {'id':id, _token: token },
            success: function( data) {
               //console.log(data);
               if(data.publish == 1){
                    $('a#chang-status-news i#id-'+id).removeClass('fa-times icon-inactive').addClass('fa-check icon-active');
               }else{
                    $('a#chang-status-news i#id-'+id).removeClass('fa-check icon-active').addClass('fa-times icon-inactive');
               }
            }

   
        });
    });

    //change status category

    $('a#chang-status-cate').click(function(){
        var id = $(this).attr('data-id');
        var token = $('input[name="_token"]').val();
        //alert(id);
        $.ajax({
            type: "GET",
            url: 'edit-status-cate/'+id,
            dataType : 'json', 
            data: {'id':id, _token: token },
            success: function( data) {
               //console.log(data);
               if(data.publish == 1){
                    $('a#chang-status-cate i#id-'+id).removeClass('fa-times icon-inactive').addClass('fa-check icon-active');
               }else{
                    $('a#chang-status-cate i#id-'+id).removeClass('fa-check icon-active').addClass('fa-times icon-inactive');
               }
            }

   
        });
    });


});

function xacnhanxoa(msg){
    if(window.confirm(msg)){
      return true;
    }
    return false;
  }

