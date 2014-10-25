<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Competition'
);

 t3lib_div::loadTCA('tt_content');
  $TCA['tt_content']['types']['list']['subtypes_addlist']['vcompetition_pi1']='pi_flexform';  

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Competition');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vcompetition_domain_model_competition', 'EXT:v_competition/Resources/Private/Language/locallang_csh_tx_vcompetition_domain_model_competition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vcompetition_domain_model_competition');
$GLOBALS['TCA']['tx_vcompetition_domain_model_competition'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:v_competition/Resources/Private/Language/locallang_db.xlf:tx_vcompetition_domain_model_competition',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,photo,description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Competition.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vcompetition_domain_model_competition.gif'
	),
);
// Wizard for frontend plugin
if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses'][$_EXTKEY.'_pi1' . '_wizicon'] =
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Private/Php/class.comp_wizicon.php';
}

//flexforms

  t3lib_extMgm::addPiFlexFormValue('vcompetition_pi1', 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/Flexform.xml'); 
  
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vcompetition_domain_model_competitors', 'EXT:v_competition/Resources/Private/Language/locallang_csh_tx_vcompetition_domain_model_competitors.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vcompetition_domain_model_competitors');
$GLOBALS['TCA']['tx_vcompetition_domain_model_competitors'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:v_competition/Resources/Private/Language/locallang_db.xlf:tx_vcompetition_domain_model_competitors',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,file,contact,comment,competitionname,competitionid,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Competitors.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vcompetition_domain_model_competitors.gif'
	),
);

