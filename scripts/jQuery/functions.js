/* Javascript Functions */

 /* Slide out WelcomePage Steptwo */



 $('#errorbar').ready(function(){
	$('#errorbar').show();
	$('#errorbar').slideToggle(450);
	
 });
 
 
/* Search autoComplete */

function lookup(inputString){
    if(inputString.length = 0){
        $('#suggestion').hide();
    }else{
        $.post("inc/autocomplete.php",{queryString:""+inputString+""},
                function(data){
                    if(data.length>0){
                        $('#suggestion').show();
                        $('#autoSuggestionList').html(data);
                    }
                });
    }
}
function fill(thisValue){
    $('#inputString').val(thisValue);
    $('#suggestion').hide();
}

/*request Friendship*/
$('.friendRequest').live('click',function(){
    var req = 1;
    var friendId = $("input.friendId").val();
    var sentData = 'request=' + req + '&friendId=' + friendId;
    $.ajax({
        type: "POST",
        url: "inc/addFriend.php",
        data:sentData,
        success: function(){
            $('#waitingforconfirm').show();
        }
    });
    return false;
});