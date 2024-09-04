<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use core\Teste;

class TesteUnitTest extends TestCase
{
    public function test_call_method_foot()
    {
        $teste = new Teste();
        $response = $teste->foo();
        @$this->assertEquals('123', $response);
    }
}
