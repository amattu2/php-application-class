<?php
/*
	Produced 2020
	By https://amattu.com/links/github
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

// Account Namespace
namespace Application\Account\User;

/**
 * Application User Input-Output Manager
 * Handles: Database I/O
 *
 * @parent Application\Account\User
 */
class IOManager {
	// Class Variables
	protected $con;

	/**
	 * Class constructor
	 *
	 * @param String Host, String User, String Password
	 * @throws Exception
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-18T19:34:58-040
	 */
	public function __construct(string $host, string $user, string $password, string $database = "") {
		// Variables
		$this->con = new \MySQLi($host, $user, $password);

		// Checks
		if ($this->con->connect_errno) {
			throw new Exception("Cannot connect to database server");
		}
		if ($database) {
			$this->con->select_db($database);
		}
	}

	/**
	 * Class deconstructor
	 *
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-31T16:13:23-040
	 */
	public function __destruct() {
		// Checks
		if ($this->con->ping()) {
			$this->con->close();
		}
	}

	/**
	 * Get MySQLi connection instance
	 *
	 * @return MySQLi Handle
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-18T19:37:16-040
	 */
	public function getCon() : \MySQLi {
		return $this->con;
	}
}

/**
 * Account Communication Manager
 * Handles: Emails, SMS, Calls
 *
 * @parent Application\Account\User
 */
class CommunicationManager {
	public static function sendEmail() : boolean {
		return true;
	}

	public static function sendSMS() : boolean {
		return true;
	}
}
?>
