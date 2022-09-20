<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class DocumentTest extends ApiTestCase
{
    public function testCreateGreeting(): void
    {
        static::createClient()->request('GET', '/users');

        $this->assertResponseStatusCodeSame(401);
//        $this->assertJsonContains([
//            '@context' => '/contexts/Greeting',
//            '@type' => 'Greeting',
//            'name' => 'Kévin',
//        ]);
    }
}
