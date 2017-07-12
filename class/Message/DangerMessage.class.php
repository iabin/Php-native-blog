<?php
class DangerMessage extends Message{

public function getMessage($message){
    $message = strip_tags($message);  
    return "<div class='alert alert-danger' role='alert'>$message</div>";
}


}


?>