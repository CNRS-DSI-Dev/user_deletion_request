# User Account Actions

Owncloud 7 app that allow deletion request to the admin (mail)

The actions are :
* send mail
* Add the user to a rejection group

## Config

These parameters must be configured in global owncloud `config.php`
```php
'deletion_account_request_default_admin_email' => 'admin@mail.com',
'deletion_account_request_default_exclusion_group' => 'exclusion_group_example',
```

You can also configure differents groups as follows :
```php
'deletion_account_request_admin_emails' => array(
  'group1' => 'admin_group1@mail.com',
  'group2' => 'admin_group2@mail.com',
  ...
),
'deletion_account_request_exclusion_groups' => array(
  'group1' => 'exclusion_group_1',
  'group2' => 'exclusion_group_2',
  ...
),
```

This application allows each user to request deletion of their account.

After confirmation, the user is placed in a rejection group and a email is send to the administration.

## License and authors

|                      |                                           					|
|:---------------------|:-----------------------------------------------------------|
| **Author:**          | Victor Bordage-Gorry <victor.bordage-gorry@globalis-ms.com>
| **Copyright:**       | 2015 CNRS DSI / GLOBALIS media      systems
| **License:**         | AGPL v3, see the COPYING file.
