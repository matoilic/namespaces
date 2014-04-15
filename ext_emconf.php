<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Global Namespaces in Fluid',
	'description' => 'Adds the possibility to register a namespace globally in fluid so you don\'t have to declare it in every file.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.0.0',
	'dependencies' => 'fluid',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Mato Ilic',
	'author_email' => 'info@matoilic.ch',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.7-0.0.0',
			'typo3' => '6.1.0-6.2.99',
            'fluid' => '6.1.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
	'suggests' => array(
	),
);

?>
