<?php
namespace Event\VCompetition\Domain\Repository;


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
 * The repository for Competitions
 */
class CompetitiorsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function AddRecord($data){

		if ( $data[ 'contact' ] != NULL){
				$contact_data = $data[ 'contact' ];
		}
		
		if ( $data[ 'pid' ] != NULL){
				$pid = $data[ 'pid' ];
		}
		else { $pid = ""; }
		
		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_vcompetition_domain_model_competitors', array(
		
			'pid' => $data[ 'pid' ],
			'name' => $data[ 'user_name' ],
			'file' => $data[ 'file' ],
			'contact' =>  $contact_data,
			'comment' =>$data[ 'comment' ],
			'competitionname' => $data[ 'competition_name' ],
			'competitionid' => $data[ 'competition_id' ],
			
		  )
		);
		return $GLOBALS['TYPO3_DB']->sql_insert_id();	
	
	}
	
	
}