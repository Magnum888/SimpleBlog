$(document).ready(function() {
    // Добавляем новую запись, когда произошел клик по кнопке
    $(".del-btn-profile").click(function (e) {

        e.preventDefault();

        var myData =  $(this).attr('id'); //post variables

        jQuery.ajax({
            type: "POST", // HTTP метод  POST или GET
            url: "profile.php", //url-адрес, по которому будет отправлен запрос
            data:{id:myData}, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){
                location.reload();
            },
            error:function (){
                alert("Error!"); //выводим ошибку
            }
        });
    });
});