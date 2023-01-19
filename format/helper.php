<?php
/**
 * Format Class
 */
class Format{

    public function formatDate($date){
        return date('F jS, Y', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text. "";
        $text = substr($text, 0, $limit);
        $text = $text."...";
        return $text;
    }

    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function resizeProfileImage($resourceType,$image_width,$image_height) {
        $resizeWidth = 400;
        $resizeHeight = 400;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
        return $imageLayer;
    }


}




?>
