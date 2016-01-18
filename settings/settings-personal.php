<?php

/**
 * ownCloud - User Deletion Request
 *
 * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
 * @copyright 2015 CNRS DSI / GLOBALIS media systems
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Deletion_Request;

use \OCA\User_Deletion_Request\App\User_Deletion_Request;

$app = new User_Deletion_Request;
$c = $app->getContainer();

$tmpl = new \OCP\Template($c->query('AppName'), 'personnal');

// Form traitment
if (!empty($_POST)) {
    if (isset($_POST['deletion_reason']) && trim($_POST['deletion_reason']) !== '') {
        $c->query('MailService')->mailDeleteAccount(\OCP\User::getUser());
    }
}

return $tmpl->fetchPage();
