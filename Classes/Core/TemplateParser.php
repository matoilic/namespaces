<?php

namespace MatoIlic\Namespaces\Core;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;


class TemplateParser extends \TYPO3\CMS\Fluid\Core\Parser\TemplateParser {
    /**
     * @var array
     */
    private static $globalNamespaces = array();

    /**
     * @var bool
     */
    private static $typoScriptLoaded = FALSE;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject
     */
    protected $configurationManager;

    protected function extractNamespaceDefinitions($templateString) {
        $template = parent::extractNamespaceDefinitions($templateString);

        foreach(self::$globalNamespaces as $namespace => $params) {
            if(array_key_exists($namespace, $this->namespaces)) {
                throw new \TYPO3\CMS\Fluid\Core\Parser\Exception(sprintf(
                    'Global namespace identifier "%s" in extension "%s" conflicts a local namespace. Do not re-declare namespaces!',
                    $namespace,
                    $params['extensionName']
                ));
            }

            $this->namespaces[$namespace] = $params['namespacePath'];
        }

        return $template;
    }

    private function loadNamespaces() {
        $namespaces = self::$globalNamespaces;

        if(!self::$typoScriptLoaded) {
            $typoScript = $this->configurationManager->getConfiguration(
                ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
            );

            $tsNamespaces = $typoScript['plugin.']['tx_namespaces.']['namespaces.'];
        }

        return $namespaces;
    }

    /**
     * @param string $extensionName extension from where this namespace is registered
     * @param string $namespace the namespace as used in views
     * @param string $namespacePath namespace path to the view helpers
     * @throws \TYPO3\CMS\Fluid\Core\Parser\Exception if the namespace has already been registered
     */
    public static function registerNamespace($extensionName, $namespace, $namespacePath) {
        if(array_key_exists($namespace, self::$globalNamespaces)) {
            throw new \TYPO3\CMS\Fluid\Core\Parser\Exception(sprintf(
                'Global namespace identifier "%s" is already registered in extension "%s". Do not re-declare namespaces!',
                $namespace,
                self::$globalNamespaces[$namespace]['extensionName']
            ));
        }

        self::$globalNamespaces[$namespace] = array(
            'extensionName' => $extensionName,
            'namespacePath' => $namespacePath
        );
    }
}
