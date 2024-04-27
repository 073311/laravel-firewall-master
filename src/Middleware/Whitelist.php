<?php

namespace ievtds\Firewall\Middleware;

use ievtds\Firewall\Abstracts\Middleware;

class Whitelist extends Middleware
{
    public function check($patterns)
    {
        return ($this->isWhitelist() === false);
    }
}
