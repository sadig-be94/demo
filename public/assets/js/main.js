
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//delete blog
$('.js-delete-blog').on('click',function() {
    var id=$(this).data('id');
    alertify.confirm('Məlumatı sil','Silmək İstədiyinizə Əminsiniz?', function(){
            $.ajax({
                type:'delete',
                url:"blog/"+id,
                data:{id:id},
                success:function(e){
                    alertify.success(e);
                    $('#js-delete-blog-'+id).remove();
                }
            });
        },
        function(){ alertify.error('İstək Ləğv Edildi')}).set('labels', {ok:'SİL', cancel:'İMTİNA ET'});
});

//search blog
$('#blogSearch').keyup(function (){
    let key=$(this).val();
    $.ajax({
        type:'get',
        data:{key:key},
        url:'blog',
        success:function(e){
            $('#appendBlog').html('');
            $('#appendBlog').append(e.html);
        }
    });
});



