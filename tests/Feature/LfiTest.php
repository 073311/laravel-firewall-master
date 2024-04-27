<?php

namespace ievtds\Firewall\Tests\Feature;

use ievtds\Firewall\Middleware\Lfi;
use ievtds\Firewall\Tests\TestCase;

class LfiTest extends TestCase
{
    public function testShouldAllow()
    {
        $this->assertEquals('next', (new Lfi())->handle($this->app->request, $this->getNextClosure()));
    }

    public function testShouldBlock()
    {
        $this->app->request->query->set('foo', '../../../../etc/passwd');

        $this->assertEquals('403', (new Lfi())->handle($this->app->request, $this->getNextClosure())->getStatusCode());
    }
}
