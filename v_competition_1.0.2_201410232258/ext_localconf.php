<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Event.' . $_EXTKEY,
	'Pi1',
	array(
		'Competition' => 'competition, successfulSend, show',
		
	),
	// non-cacheable actions
	array(
		'Competition' => 'competition, successfulSend, show',
		
	)
);
