<?php
/**
 * Created by PhpStorm.
 * User: Khach
 * Date: 09-Feb-19
 * Time: 12:47
 */


class FileHandler
{

    private $con;

    public function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';

        $db = new DbConnect();
        $this->con = $db->connect();
    }


    public function saveFile($file, $extension, $desc)
    {
        $name = round(microtime(true) * 1000) . '.' . $extension;
        $filedest = dirname(__FILE__) . UPLOAD_PATH . $name;
        move_uploaded_file($file, $filedest);

        $url = $server_ip = gethostbyname(gethostname());

        $stmt = $this->con->prepare("INSERT INTO images (description, image,  url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $desc, $name, $url);
        if ($stmt->execute())
            return true;
        return false;
    }

    public function getAllFiles()
    {
        $stmt = $this->con->prepare("SELECT id, description, url FROM images ORDER BY id DESC");
        $stmt->execute();
        $stmt->bind_result($id, $desc, $url);

        $images = array();

        while ($stmt->fetch()) {

            $temp = array();
            $absurl = 'http://' . gethostbyname(gethostname()) . '/android_apis/file_upload_api' . UPLOAD_PATH . $url;
            $temp['id'] = $id;
            $temp['desc'] = $desc;
            $temp['url'] = $absurl;
            array_push($images, $temp);
        }

        return $images;
    }

}