<?php
/**
 * Created by PhpStorm.
 * User: Khach
 * Date: 04-Feb-19
 * Time: 12:49
 */

// include database and object files
include_once '../../config/Database.php';
include_once '../../objects/User.php';


if (isset($_GET['username']) && isset($_GET['password'])) {
    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object
    $user = new User($db);

    // set ID property of user to be edited
    $user->username = $_GET['username'];
    $user->password = base64_encode($_GET['password']);

    // read the details of user to be edited
    $stmt = $user->login();
    if ($stmt->rowCount() > 0) {
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // create response array
        $user_arr_response = successResponse("Successfully Login!", $row['id'], $row['username']);
    } else {
        $user_arr_response = errorResponse("Invalid Username or Password!");
    }
} else {
    $user_arr_response = errorResponse("Invalid params");
}

// make it json format
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