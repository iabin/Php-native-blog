<?php
class MessageFactory {

public static function createMessage($type){
    switch ($type) {
        
        case 'warningMessage':
            return new WarningMessage();
            break;
        case 'dangerMessage':
            return new DangerMessage();  
            break; 
       
        case 'successMessage':
            return new SuccessMessage();
            break;

        default:
            return false;
            break;
    }

}


}


?>