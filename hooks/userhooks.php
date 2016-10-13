<?php
/**
 * ownCloud - User Deletion Request
 *
 * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
 * @copyright 2015 CNRS DSI / GLOBALIS media systems
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\User_Deletion_Request\Hooks;

class UserHooks {

    protected $userManager;
    protected $groupManager;
    protected $config;

    public function __construct($userManager, $groupManager, $config){
        $this->userManager = $userManager;
        $this->groupManager = $groupManager;
        $this->config = $config;
    }

    /**
     * Registration of different hooks
     *
     * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
     * @copyright 2015 CNRS DSI / GLOBALIS media systems
     *
     */
    public function register() {
        $myself = $this;

        $this->userManager->listen('\OC\User', 'postLogin', function(\OC\User\User $user) use ($myself) {
            return $this->postLogin($user);
        });
    }

    /**
     * Action after user's authentification : if he is on the rejected group, he is logout and redirect to main page
     *
     * @author Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
     * @copyright 2015 CNRS DSI / GLOBALIS media systems
     *
     * @param     string   $user user's Uid
     */
    public function postLogin ($user) {
        // Verify default group
        $defaultGroup = $this->config->getSystemValue('deletion_account_request_default_exclusion_group');
        $group = $this->groupManager->get($defaultGroup);
        if ($group && $group->searchUsers($user->getUid())) {
            \OCP\User::logout();
            \OC_Util::redirectToDefaultPage();
            exit();
       }

        // Verify configuration groups
        $configGroups = $this->config->getSystemValue('deletion_account_request_exclusion_groups');
        if (!empty($configGroups)) {
            foreach($configGroups as $groupKey => $groupValue) {
               if ($this->groupManager->get($groupValue)->searchUsers($user->getUid())) {
                    \OCP\User::logout();
                    \OC_Util::redirectToDefaultPage();
                    exit();
               }
            }
        }
    }

}
