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
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function extensionperm_civicrm_xmlMenu(&$files) {
  _extensionperm_civix_civicrm_xmlMenu($files);
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
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function extensionperm_civicrm_uninstall() {
  _extensionperm_civix_civicrm_uninstall();
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
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function extensionperm_civicrm_disable() {
  _extensionperm_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function extensionperm_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _extensionperm_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function extensionperm_civicrm_managed(&$entities) {
  _extensionperm_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function extensionperm_civicrm_caseTypes(&$caseTypes) {
  _extensionperm_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function extensionperm_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _extensionperm_civix_civicrm_alterSettingsFolders($metaDataFolders);
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