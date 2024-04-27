<?php

namespace ievtds\Firewall\Tests\Feature;

use ievtds\Firewall\Middleware\Xss;
use ievtds\Firewall\Tests\TestCase;

class XssTest extends TestCase
{
    public function testShouldAllow()
    {
        $this->assertEquals('next', (new Xss())->handle($this->app->request, $this->getNextClosure()));
    }

    public function testShouldBlock()
    {
        $this->app->request->query->set('foo', '<script>alert(123)</script>');

        $this->assertEquals('403', (new Xss())->handle($this->app->request, $this->getNextClosure())->getStatusCode());
    }
}
