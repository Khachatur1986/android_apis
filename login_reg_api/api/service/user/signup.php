<?php
/**
 * Created by PhpStorm.
 * User: Khach
 * Date: 04-Feb-19
 * Time: 12:49
 */

// get database connection
include_once '../../config/Database.php';

// instantiate user object
include_once '../../objects/User.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    // set user property values
    $user->username = $_POST['username'];
    $user->password = base64_encode($_POST['password']);
    $user->created = date('Y-m-d H:i:s');

// create the user
    if ($user->signup()) {
        // create response array
        $user_arr_response = successResponse("Successfully Sign up!", $user->id, $user->username);
    } else {
        $user_arr_response = errorResponse("Username already exists!");
    }
} else {
    $user_arr_response = errorResponse("Invalid params");
}


print_r(json_encode($user_arr_response));

function successResponse($message, $userId, $userName)
{
    return array(
        "status" => true,
        "message" => $message,
        "id" => $userId,
        "username" => $userName
    );
}

function errorResponse($message)
{
    return array(
        "status" => false,
        "message" => $message,
    );
}

?>