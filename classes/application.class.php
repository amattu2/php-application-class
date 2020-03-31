<?php
/*
	Produced 2019-2020
	By https://amattu.com/links/github
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

// Application Namespace
namespace Application;

/**
 * Application Shell
 */
class Application {
	/**
	 * Generate Partially-Unique Token
	 *
	 * @param integer $length
	 * @return string random string
	 * @throws TypeError
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-27T09:35:26-040
	 */
	public static function generateToken(int $length = 7) : string {
		// Variables
		$characters = '0123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$str = '';

		// Loops
		for ($i = 0; $i < $length; $i++) {
			$str .= $characters[rand(0, $charactersLength - 1)];
		}

		// Return
		return $str;
	}
}

/**
 * Application Account
 * Containerises: A Company Account
 *
 * @parent Application
 */
class Account {
	// Class Variables
	public $DT;
	protected $ID = 0;
	protected $Name = "";
	protected $BCCEmail = "";
	protected $AdminEmail = "";
	protected $TicketAPI = "";
	protected $TicketTerms = "";
	protected $APIToken = "";
	protected $Location;
	protected $User;
	protected $Options = Array();

	/**
	* Class constructor
	*
	* @param Array Account, array User, array Location
	* @return None
	* @throws TypeError
	**/
	public function __construct(array $Account, array $User, array $Location) {
		// Checks
		if ($Account["ID"] && is_numeric($Account["ID"])) {
			$this->ID = $Account["ID"];
		}
		if ($Account["Name"] && is_string($Account["Name"])) {
			$this->Name = $Account["Name"];
		}
		if ($Account["BCCEmail"] && filter_var($Account["BCCEmail"], FILTER_VALIDATE_EMAIL)) {
			$this->BCCEmail = $Account["BCCEmail"];
		}
		if ($Account["AdminEmail"] && filter_var($Account["AdminEmail"], FILTER_VALIDATE_EMAIL)) {
			$this->AdminEmail = $Account["AdminEmail"];
		}
		if ($Account["TicketAPI"] && is_string($Account["TicketAPI"])) {
			$this->TicketAPI = $Account["TicketAPI"];
		}
		if ($Account["TicketTerms"] && is_string($Account["TicketTerms"])) {
			$this->TicketTerms = $Account["TicketTerms"];
		}
		if ($Account["APIToken"] && is_string($Account["APIToken"])) {
			$this->APIToken = $Account["APIToken"];
		}

		// Variables
		$this->DT = new \DateTime();
		$this->User = new \Application\Account\User($User);
		$this->Location = new \Application\Account\Location($Location);
	}

	/**
	 * Get Account ID
	 *
	 * @return int ID
	 * @date 2020-01-01T09:03:45-050
	 */
	public function getID() : int {
		return $this->ID;
	}

	/**
	 * Get Account Option
	 *
	 * @param String option key
	 * @return Mixed option key | null
	 * @throws TypeError
	 * @date 2020-01-01T14:23:14-050
	 */
	public function getOption(string $key) {
		if ($this->Options[$key]) {
			return $this->Options[$key];
		} else {
			return null;
		}
	}

	/**
	 * Get Account User
	 *
	 * @return Application\Account\User User Class
	 * @throws TypeError
	 * @date 2020-01-01T11:49:07-050
	 */
	public function getUser() : \Application\Account\User {
		return $this->User;
	}

	/**
	 * Get Account Location
	 *
	 * @return Application\Account\Location Location Class
	 * @throws TypeError
	 * @date 2020-01-01T11:50:49-050
	 */
	public function getLocation() : \Application\Account\Location {
		return $this->Location;
	}
}
?>
