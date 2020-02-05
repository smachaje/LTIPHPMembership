<?PHP

require __DIR__ . '/vendor/autoload.php';

use ceLTIc\LTI\Service;
use ceLTIc\LTI\DataConnector;
use ceLTIc\LTI;

$db_user="your_user";
$db_password="your_pwd+";
$db_server="localhost";
$db_schema="db_name";

$db = mysqli_connect($db_server, $db_user, $db_password);
mysqli_select_db($db, $db_schema);

$db_connector = DataConnector\DataConnector::getDataConnector($db, '');

//initialize a valid consumer data
$consumer = new LTI\ToolConsumer('a', $db_connector);
$consumer->name = 'a';
$consumer->secret = 'b';
$consumer->enabled = true;
$consumer->save();

class App1ToolProvider extends LTI\ToolProvider {

    function onLaunch() {


        // Insert code here to handle incoming connections - use the user,
        // context and resourceLink properties of the class instance
        // to access the current user, context and resource link.

//	$this->reason = 'Incomplete data';
//      $this->ok = false;
//	$users = $context->getMemberships();

    }

}

$tool = new App1ToolProvider($db_connector);
$tool->handleRequest();
//var_dump($tool->resourceLink->getId());
//var_dump(get_class_methods(App1ToolProvider));
//var_dump(get_class_methods(get_class($tool->resourceLink))); //get list of methods

foreach($tool->context->getMemberships() as $user)
        {

        echo $user->firstname;
        echo $user->lastname;
        echo $user->fullname;
        echo $user->email;
        echo $user->image;
        var_dump( $user->roles[0] );
        }


?>
