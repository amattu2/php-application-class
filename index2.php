<?php
/*
	Produced 2020
	By https://amattu.com/links/github
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

// Files
require(__DIR__ . "/classes/application.class.php");
require(__DIR__ . "/classes/account.class.php");
require(__DIR__ . "/classes/user.class.php");

/**
 * Test Session Storage
 *
 * @status
 */
session_start();

echo "Started session at " . $_SESSION['Account']->DT->format("G:i:s");
?>
