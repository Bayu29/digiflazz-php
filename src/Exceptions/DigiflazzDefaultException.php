<?php

namespace BayuDev\Digiflazz\Exceptions;

use Exception;

class DigiflazzDefaultException extends Exception
{   
    public function getMessageAsJson()
    {
        return json_encode([
            'success' => false,
            'message' => $this->getMessage(),
        ]);
    }
}
?>