<?php

namespace Test;

final class IndexActionTest extends ApiTestCase
{
    public function testHandle(): void
    {
        $response = $this->request('GET', '/');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(['app' => 'Slim'], $this->getResponseContent($response));
    }
}
