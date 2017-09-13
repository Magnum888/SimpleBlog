$(document).ready(function(){
    $('.sub').click(function(){
        var url = $(this).prop('href');
        console.log(url);
        $.ajax({url: url, success: function(result){
            $('.reset').val('');
        }});
    });
});
//    jQuery('.sub').submit(function (e) {
//        e.preventDefault();
//        var input_name = jQuery('.form-input-name').val();
//        var input_nickname = jQuery('.form-input-nickname').val();
//        var input_email = jQuery('.form-input-email').val();
//        var input_message = jQuery('.form-input-message').val();
//        var formData = {
//            'name': input_name,
//            'nickname': input_nickname,
//            'email': input_email,
//            'message': input_message
//        };
//        jQuery.ajax({
//            type: 'POST',
//            url: $(this).prop('href'),
//            data: formData,
//            dataType: 'json',
//            encode: true,
//            success: function (res) {
//                $('.reset').val('');
//            }
//        })
//    })