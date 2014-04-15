<?php

if (!defined ('TYPO3_MODE')) die ('Access denied.');

$script = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('SCRIPT_FILENAME');

if (substr($script, -32) !== 'sysext/install/Start/Install.php') {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Fluid\\Core\\Parser\\TemplateParser'] =
        array('className' => 'MatoIlic\\Namespaces\\Core\\TemplateParser');
}
