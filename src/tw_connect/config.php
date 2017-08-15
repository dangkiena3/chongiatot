<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
/**
 * @file
 * A single location to store configuration.
 * setting my API key of twitter
 */

define('CONSUMER_KEY', 't4CxpS9RiA5OTlsj3pDJQ');
define('CONSUMER_SECRET', 'k9pgX0wHBShTiAqHJgPPOTuymtp1i7XHiVxlmi5NM');
define('OAUTH_CALLBACK', $INI['system']['wwwprefix'].'/callback.php');
?>