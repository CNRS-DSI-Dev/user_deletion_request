<?php
/**
 * ownCloud - User Deletion Request
 *
 * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
 * @copyright 2015 CNRS DSI / GLOBALIS media systems
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

    $l = $_['overwriteL10N'];
    p($l->t('Hello,'));
    p($l->t('User %s has requested the deletion of his account for the following reason : ',
	array($_['requesterUid'])
    ));
    echo $_['reason'];
    p($l->t('Delete this account in user function "Trash" in the user management GUI.'));
?>


--
<?php p($theme->getName() . ' - ' . $theme->getSlogan()); ?>
<?php print_unescaped("\n".$theme->getBaseUrl());
