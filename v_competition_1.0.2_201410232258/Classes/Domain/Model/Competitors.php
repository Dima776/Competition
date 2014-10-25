<?php
namespace Event\VCompetition\Domain\Model;


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
 * Competitors
 */
class Competitors extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * file
	 *
	 * @var string
	 */
	protected $file = '';

	/**
	 * contact
	 *
	 * @var string
	 */
	protected $contact = '';

	/**
	 * comment
	 *
	 * @var string
	 */
	protected $comment = '';

	/**
	 * competitionname
	 *
	 * @var string
	 */
	protected $competitionname = '';

	/**
	 * competitionid
	 *
	 * @var integer
	 */
	protected $competitionid = 0;

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the file
	 *
	 * @return string $file
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * Sets the file
	 *
	 * @param string $file
	 * @return void
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * Returns the contact
	 *
	 * @return string $contact
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * Sets the contact
	 *
	 * @param string $contact
	 * @return void
	 */
	public function setContact($contact) {
		$this->contact = $contact;
	}

	/**
	 * Returns the comment
	 *
	 * @return string $comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Sets the comment
	 *
	 * @param string $comment
	 * @return void
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * Returns the competitionname
	 *
	 * @return string $competitionname
	 */
	public function getCompetitionname() {
		return $this->competitionname;
	}

	/**
	 * Sets the competitionname
	 *
	 * @param string $competitionname
	 * @return void
	 */
	public function setCompetitionname($competitionname) {
		$this->competitionname = $competitionname;
	}

	/**
	 * Returns the competitionid
	 *
	 * @return integer $competitionid
	 */
	public function getCompetitionid() {
		return $this->competitionid;
	}

	/**
	 * Sets the competitionid
	 *
	 * @param integer $competitionid
	 * @return void
	 */
	public function setCompetitionid($competitionid) {
		$this->competitionid = $competitionid;
	}

}