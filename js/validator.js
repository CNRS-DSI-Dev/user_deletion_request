$(document).ready(function(){
    $('#user_deletion_request input[type=submit]').on('click', function(event) {
        event.preventDefault();

        if($('#deletion_reason').val().trim() == '') {
        	$('#user_deletion_request .msg.error').css('display', 'block');
        	return false;
        }

        if (confirm(t('user_deletion_request', 'Do you confirm the request for deletion of your account {currentUser} ? If you agree, you will not be able to access the My CoRe service.',{'currentUser' : OC.currentUser}))) {
            $('#user_deletion_request').submit();
        }

        return false;
    });
});
