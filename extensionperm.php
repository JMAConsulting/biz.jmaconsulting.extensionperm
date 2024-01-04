<?php

require_once 'extensionperm.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function extensionperm_civicrm_config(&$config) {
  _extensionperm_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function extensionperm_civicrm_install() {
  _extensionperm_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function extensionperm_civicrm_enable() {
  _extensionperm_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_permission
 *
 * @param $files array(string)
 */
function extensionperm_civicrm_permission(&$permissions) {
  $prefix = ts('CiviCRM') . ': ';
  $permissions['administer extensions'] = array(
    $prefix . ts('administer Extensions'),
    ts('Administer Extensions in CiviCRM'),
  );
}

/**
 * Implementation of hook_civicrm_permission
 *
 * @param $files array(string)
 */
function extensionperm_civicrm_pageRun(&$page) {
  if (get_class($page) == "CRM_Admin_Page_Extensions") {
    if (!CRM_Core_Permission::check('administer extensions')) {
      CRM_Utils_System::permissionDenied();
      return NULL;
    }
  }
}
