<?php

namespace ZfcBaseTest\EventManager;

use PHPUnit_Framework_TestCase;

class EventProviderTest extends PHPUnit_Framework_TestCase
{
    public function testSetEventManagerAttachesDefaultListenersWhenSpecified()
    {
        $object = new TestAsset\EventProviderWithDefaultListeners();
        $this->assertInstanceOf('Zend\EventManager\EventManagerInterface', $object->getEventManager());
        $this->assertCount(1, $object->getEventManager()->getListeners('foo'));
    }

    public function testSetEventManagerBehavesAsNormalWhenNoDefaultListenersSupplied()
    {
        $object = new TestAsset\EventProviderWithNoDefaultListeners();
        $this->assertInstanceOf('Zend\EventManager\EventManagerInterface', $object->getEventManager());
        $this->assertCount(0, $object->getEventManager()->getEvents());
    }
}
