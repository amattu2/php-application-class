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
 * Test generateToken
 *
 * @status Working using FDN
 */
//echo Application\Application::generateToken();

/**
 * Test Account Initialization
 *
 * @status Working as expected
 */
$prop1 = Array(
	"ID" => 1,
	"Name" => "Name",
	"BCCEmail" => "example@example.com",
	"AdminEmail" => "example@example.com",
	"TicketAPI" => "",
	"TicketTerms" => "",
	"APIToken" => "",
);
$prop2 = Array(
	"ID" => 1,
	"Username" => "Username",
	"Name" => "Name",
	"Initials" => "IN",
	"IP" => "192.168.1.1",
	"Email" => "example@example.com",
	"Phone" => "",
	"Notes" => "",
	"ThemeID" => 1,
	"Active" => 1,
	"Permissions" => Array(),
);
$prop3 = Array(
	"ID" => 1,
	"Street1" => "",
	"Street2" => "",
	"City" => "",
	"State" => "",
	"Zip" => 0,
	"Country" => "USA",
	"Email" => "example@example.com",
	"Phone" => "",
);

// Account (Super Parent)
$account = new Application\Account($prop1, $prop2, $prop3);

// User (Account->User)
$user = $account->getUser();

// Location (Account->Location)
$location = $account->getLocation();

// Managers (User->IO, User->CM)
$io = $user->getIO();
$cm = $user->getCM();

// MySQLi Handle (User->IO->Handle)
$con = $io->getCon();

// Store In Session
session_start();
$_SESSION['Account'] = $account;
?>
