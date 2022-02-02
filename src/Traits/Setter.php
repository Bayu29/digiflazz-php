<?php
declare(strict_types=1);

namespace BayuDev\Digiflazz\Traits;

use BayuDev\Digiflazz\Constant;

trait Setter
{
    public function setMode($environment = Constant::DEVELOPMENT)
    {
        $this->environment = $environment;
        return $this;
    }

    public function setCommand(string $command)
    {
        $this->command = $command;
        return $this;
    }

    
}

?>