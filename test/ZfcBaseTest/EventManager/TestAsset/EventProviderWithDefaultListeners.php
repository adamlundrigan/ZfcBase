<?php
namespace ZfcBaseTest\EventManager\TestAsset;

use ZfcBase\EventManager\EventProvider;

class EventProviderWithDefaultListeners extends EventProvider
{
    public function attachDefaultListeners()
    {
        $this->getEventManager()->attach('foo', function() {});
    }
}
