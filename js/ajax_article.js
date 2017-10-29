$(document).ready(function () {
    function showEditBox(editobj,id) {
        $('.comments-ajax').hide();
        $('.btnDeleteAction').hide();
        $('.btnEditAction').hide();
        $(editobj).prop('disabled','true');
        var currentMessage = $("#comment_" + id + " .text-comment").html();
        var editMarkUp = '<div class="form-group"><div class="input-group"><textarea rows="6" cols="20" id="txtmessage_'+id+'" class="form-control">'+currentMessage+'</textarea></div></div><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
        $("#comment_" + id + " .text-comment").html(editMarkUp);

    }
    function cancelEdit(message,id) {
        $("#comment_" + id + " .text-comment").html(message);
        $('.comments-ajax').show();
        $('.btnDeleteAction').show();
        $('.btnEditAction').show();
    }
    function callCrudAction(action,id) {
        $("#loaderIcon").show();
        $('.btnDeleteAction').show();
        $('.btnEditAction').show();
        var queryString;
        switch(action) {
            case "edit":
                queryString = 'action='+action+'&comment_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
                break;
            case "delete":
                queryString = 'action='+action+'&comment_id='+ id;
                break;
        }
        jQuery.ajax({
            url: "models/crudActionModel.php",
            dataType:"text",
            data:queryString,
            type: "POST",
            success:function(data){
                switch(action) {
                    case "edit":
                        $("#comment_" + id + " .text-comment").html(data);
                        $('.comments-ajax').show();
                        $("#comment_"+id+" .btnEditAction").prop('disabled','');
                        break;
                    case "delete":
                        $('#comment_'+id).fadeOut();
                        break;
                }
                $("#txtmessage").val('');
                $("#txtnickname").val('');
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
});