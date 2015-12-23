<?php

/**
 * ownCloud - User Deletion Request
 *
 * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
 * @copyright 2015 CNRS DSI / GLOBALIS media systems
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Deletion_Request\App;

use \OCP\AppFramework\App;
use \OCA\User_Deletion_Request\Service\MailService;
use \OCA\User_Deletion_Request\Hooks\UserHooks;

class User_Deletion_Request extends App {

    public function __construct(array $urlParams=array()) {
        parent::__construct('user_deletion_request', $urlParams);

        $container = $this->getContainer();

        /**
         * Controllers
         */
        $container->registerService('UserHooks', function($c){
            return new UserHooks(
                $c->query('UserManager'),
                $c->query('GroupManager'),
                $c->query('Config')
            );
        });

        /**
         * Service
         */
        $container->registerService('MailService', function($c) {
            return new MailService(
                $c->query('AppName'),
                $c->query('L10N'),
                $c->query('Config'),
                $c->query('UserManager'),
                $c->query('GroupManager')
            );
        });

        /**
         * Core
         */

        $container->registerService('Config', function($c) {
            return $c->query('ServerContainer')->getConfig();
        });

        $container->registerService('L10N', function($c) {
            return $c->query('ServerContainer')->getL10N($c->query('AppName'));
        });
        $container->registerService('Logger', function($c) {
            return $c->query('ServerContainer')->getLogger();
        });

        $container->registerService('UserManager', function($c) {
            return $c->query('ServerContainer')->getUserManager();
        });

        $container->registerService('GroupManager', function($c) {
            return $c->query('ServerContainer')->getGroupManager();
        });
    }
}
