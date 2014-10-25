<?php
namespace Event\VCompetition\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * CompetitionController
 */
class CompetitionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * competitionRepository
	 *
	 * @var \Event\VCompetition\Domain\Repository\CompetitionRepository
	 * @inject
	 */
	protected $competitionRepository = NULL;
	

	public  function __construct(){
	
		$objectManager  =  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this -> competitiorsRepository  =  $objectManager->get('Event\VCompetition\Domain\Repository\CompetitiorsRepository');

	}
	/**
	 * action competition
	 *
	 * @return void
	 */
	public function competitionAction() {

		//	echo var_dump($tsSettings['settings']);	//settings from setup.txt
					
		/*	$originalSettings = $this->configurationManager->getConfiguration(
						\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS
					);					
		*/

		$settings = $this->settings;	
		
		if ($settings ["competition_id"] =='0'){echo var_dump("alle was chosee");}
		
		$competitions = $this -> competitionRepository -> getCompetition( (int) $settings[ 'competition_id' ] );

		$this->view->assign('competitions', $competitions);
	}

	/**
	 * action show
	 *
	 * @param \Event\VCompetition\Domain\Model\Competition $competition
	 * @return void
	 */
	public function showAction(\Event\VCompetition\Domain\Model\Competition $competition) {
		$this->view->assign('competition', $competition);
	}
	
	/**
	 * action successfulSend
	 *
	 * @return void
	 */
	public function successfulSendAction(){
	
		if( $post_data = \TYPO3\CMS\Core\Utility\GeneralUtility::_POST ( 'tx_vcompetition_pi1' )){ 
				 
				if ( !empty( $_FILES ) AND isset( $_FILES[ 'tx_vcompetition_pi1' ] ) ) {
						$basicFileFunctions = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance ( 't3lib_basicFileFunctions' );
						if ( !is_dir ( \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName ( 'uploads/tx_vcompetition/' ) ) ) {
							\TYPO3\CMS\Core\Utility\GeneralUtility::mkdir_deep ( \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName ( 'uploads/' ), 'tx_vcompetition' );
						}

						$fileName = $basicFileFunctions->getUniqueName (
							$_FILES[ 'tx_vcompetition_pi1' ][ 'name' ][ 'file' ],
							\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName ( 'uploads/tx_vcompetition/' ) );
						
						\TYPO3\CMS\Core\Utility\GeneralUtility::upload_copy_move (
							$_FILES[ 'tx_vcompetition_pi1' ][ 'tmp_name' ][ 'file' ],
							$fileName );
						
							
				}
				
			$settings = $this->settings;		
			$data = array();

			$data['pid'] = $settings['folder'];
			$data['user_name'] = $post_data['user_name' ];
			$data['file'] = 'uploads/tx_vcompetition/'.$_FILES[ 'tx_vcompetition_pi1' ][ 'name' ][ 'file' ];
			
			if( $settings["contact"]== "1" ){
				$data['contact']  = $post_data[ 'comp_contact' ];		
			}
			
			$data['comment'] = $post_data[ 'comp_comment' ];
			$data['competition_id'] = $post_data['comp_comment_id' ];		
			$data['competition_name'] = $this -> competitionRepository -> findByUid( $data['competition_id'] ) -> getName() ;

			
			if( $settings["send_mail"]== "1" ){
			
				$from['email'] = $settings['mail'];
				$from['name']  = $data['user_name'];
				$subj =  'Competition : '.$data['competition_name'];

				
				$body =  '<html><head></head><body>' .
							 '<strong> Competition :</strong> '.$data['competition_name'].' <br /><br />'.
							 '<strong> Competitor : </strong> '.$data['user_name'].' <br /><br />'. 
							 '<strong> Contact :    </strong> '.$data['contact'].'   <br /><br />'. 
							 '<strong> Comment :    </strong> '.$data['comment'].'   <br /><br />'.
					   ' </body></html>';
	   
				
				$message =  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
				$message->setFrom(array($from['email'] => $from['name']));
				$message->setTo(array($from['email'] => $from['email']));
				$message->setSubject($subj);
				$message->setBody($body, 'text/html');  //Mark the content-type as HTML
				
				if ( $_FILES[ 'tx_vcompetition_pi1' ][ 'name' ] [ 'file' ]!= '' ){	
		
					$attachment = \Swift_Attachment::fromPath($data['file'], 'image/jpg');
					$message->attach($attachment);				
				}
				
				$message->send(); //send a message
				
		  }
			
		$res = $this -> competitiorsRepository -> AddRecord($data); // add  the record to  comp-ors repository
		$successfulSend['name'] = $data['user_name'];		
		$this->view->assign('successfulSend', $successfulSend);
		
		}
	
	}

}