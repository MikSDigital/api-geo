<?php
declare(strict_types = 1);

namespace App\Province\Tests\Action;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class GetAllProvincesTest extends WebTestCase
{
    public function testGetProvincesList()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/provinces');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }  
}
