<?php \OCP\Util::addStyle('user_deletion_request', 'settings-personnal'); ?>
<?php \OCP\Util::addScript('user_deletion_request', 'validator'); ?>

<form id="user_deletion_request" class="section" method='POST'>
    <h2><a name="ppe"></a><?php p($l->t('Request for deletion of account')); ?></h2>
    <p><?php p($l->t('Reason for the request for deletion : ')); ?></p>
    <p class="msg error"><?php p($l->t('Please enter the reason for your removal request')); ?></p>
    <textarea required name="deletion_reason" id="deletion_reason"></textarea>
    <input type="submit" name='deletion_request' value="<?php p($l->t('Delete my My Core account')); ?>" />
</form>
