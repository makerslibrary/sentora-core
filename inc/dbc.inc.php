<?php

/**
 * Initiates the database driver object and debug object and registers the $zdhb and $zlo globals for the framework.
 * @package zpanelx
 * @subpackage core
 * @author Bobby Allen (ballen@zpanelcp.com)
 * @copyright ZPanel Project (http://www.zpanelcp.com/)
 * @link http://www.zpanelcp.com/
 * @license GPL (http://www.gnu.org/licenses/gpl.html)
 */
global $zlo, $zdbh;

$zlo = new debug_logger();

try {
    $zdbh = new db_driver("mysql:host=$host;dbname=$dbname", $user, $pass);
    $zdbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $zlo->method = "text";
    $zlo->logcode = "0100";
    $zlo->detail = "Unable to connect/authenticate against the database supplied!";
    $zlo->mextra = $e;
}
?>
