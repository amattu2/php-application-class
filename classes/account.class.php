<?php
/*
	Produced 2020
	By https://amattu.com/links/github
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

// Account Namespace
namespace Application\Account;

/**
 * Account Location Class
 * Containerises: Account Location
 *
 * @parent Application\Account
 */
class Location {
	// Class Variables
	protected $ID = 0;
	protected $Street1 = "";
	protected $Street2 = "";
	protected $City = "";
	protected $State = "";
	protected $Zip = "";
	protected $Country = "";
	protected $Email = "";
	protected $Phone = "";

	/**
	* Class constructor
	*
	* @param Array
	* @return None
	* @throws TypeError
	**/
	public function __construct(Array $Location) {
		if ($Location["ID"] && is_numeric($Location["ID"])) {
			$this->ID = $Location["ID"];
		}
		if ($Location["Street1"] && is_string($Location["Street1"])) {
			$this->Street1 = $Location["Street1"];
		}
		if ($Location["Street2"] && is_string($Location["Street2"])) {
			$this->Street2 = $Location["Street2"];
		}
		if ($Location["City"] && is_string($Location["City"])) {
			$this->City = $Location["City"];
		}
		if ($Location["State"] && is_string($Location["State"])) {
			$this->State = $Location["State"];
		}
		if ($Location["Zip"] && is_numeric($Location["Zip"])) {
			$this->Zip = $Location["Zip"];
		}
		if ($Location["Country"] && is_string($Location["Country"])) {
			$this->Country = $Location["Country"];
		}
		if ($Location["Email"] && filter_var($Location["Email"], FILTER_VALIDATE_EMAIL)) {
			$this->Email = $Location["Email"];
		}
		if ($Location["Phone"] && is_string($Location["Phone"])) {
			$this->Phone = $Location["Phone"];
		}
	}

	/**
	* Get Location ID
	*
	* @param None
	* @return int ID
	* @throws None
	* @date 2020-01-01T09:03:45-050
	*/
	public function getID() : int {
		return $this->ID;
	}
}

/**
 * Account User Class
 * Containerises: Account User
 *
 * @parent Application\Account
 */
class User {
	// Class Variables
	protected $ID = 0;
	protected $Username = "";
	protected $Name = "";
	protected $Initials = "";
	protected $IP = "";
	protected $Email = "";
	protected $Phone = "";
	protected $Notes = "";
	protected $ThemeID = 1;
	protected $Active = 0;
	protected $Permissions = Array(
		"Customer" => 0,
		"Schedule" => 0,
		"Invoice" => 0,
		"Settings" => 0
	);
	protected $IOManager;
	protected $CommunicationManager;

	/**
	* Class constructor
	*
	* @param Array
	* @return None
	* @throws TypeError
	**/
	public function __construct(array $User) {
		if ($User["ID"] && is_numeric($User["ID"])) {
			$this->ID = $User["ID"];
		}
		if ($User["Username"] && is_string($User["Username"])) {
			$this->Username = $User["Username"];
		}
		if ($User["Name"] && is_string($User["Name"])) {
			$this->Name = $User["Name"];
		}
		if ($User["Initials"] && is_string($User["Initials"])) {
			$this->Initials = $User["Initials"];
		}
		if ($User["IP"] && is_string($User["IP"])) {
			$this->IP = $User["IP"];
		}
		if ($User["Email"] && filter_var($User["Email"], FILTER_VALIDATE_EMAIL)) {
			$this->Email = $User["Email"];
		}
		if ($User["Phone"] && is_string($User["Phone"])) {
			$this->Phone = $User["Phone"];
		}
		if ($User["Notes"] && is_string($User["Notes"])) {
			$this->Notes = $User["Notes"];
		}
		if ($User["ThemeID"] && is_numeric($User["ThemeID"])) {
			$this->ThemeID = $User["ThemeID"];
		}
		if ($User["Active"] && is_numeric($User["Active"])) {
			$this->Active = $User["Active"];
		}
		if ($User["Permissions"] && is_array($User["Permissions"])) {
			foreach ($User["Permissions"] as $key => $value) {
				$this->Permissions[$key] = $value;
			}
		}

		// Variables
		$this->IOManager = new \Application\Account\User\IOManager("localhost", "test03312020", "test03312020");
		$this->CommunicationManager = new \Application\Account\User\CommunicationManager();
	}

	/**
	 * Get User ID
	 *
	 * @param None
	 * @return int UserID
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-01-01T09:03:45-050
	 */
	public function getID() : int {
		return $this->ID;
	}

	/**
	 * Get User Phone
	 *
	 * @param None
	 * @return String Phone Number
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-17T17:38:28-040
	 */
	public function getPhone() : string {
		return $this->Phone;
	}

	/**
	 * Get User Physical IP-Based Location
	 *
	 * @param None
	 * @return Array City, State, Zip, Country
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-17T17:39:06-040
	 */
	public function getLocation() : array {
		return Array("City" => "", "State" => "", "Zip" => 0, "Country" => "");
	}

	/**
	 * Get User IO Instance
	 *
	 * @return ApplicationAccountIOManager
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-17T17:39:42-040
	 */
	public function getIO() : \Application\Account\User\IOManager {
		return $this->IOManager;
	}

	/**
	 * Get User CommunicationManager Instance
	 *
	 * @return CommunicationManager
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-31T16:05:41-040
	 */
	public function getCM() : \Application\Account\User\CommunicationManager {
		return $this->CommunicationManager;
	}
}
?>
