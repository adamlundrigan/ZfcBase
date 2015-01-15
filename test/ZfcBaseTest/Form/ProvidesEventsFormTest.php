<?php
namespace ZfcBaseTest\Form;

use PHPUnit_Framework_TestCase;
use ZfcBase\Form\ProvidesEventsForm;
use Zend\EventManager\EventManager;

class ProvidesEventsFormTest extends PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->form = new ProvidesEventsForm;
    }

    public function testGetEventManagerSetsDefaultIdentifiers()
    {
        $em = $this->form->getEventManager();
        $this->assertInstanceOf('Zend\EventManager\EventManager', $em);
        $this->assertContains('ZfcBase\Form\ProvidesEventsForm', $em->getIdentifiers());
    }

    public function testSetEventManagerWorks()
    {
        $em = new EventManager();
        $this->form->setEventManager($em);
        $this->assertSame($this->form->getEventManager(), $em);
    }

    public function testSetEventManagerAttachesDefaultListenersWhenSpecified()
    {
        $object = new TestAsset\ProvidesEventsWithDefaultListeners();
        $this->assertInstanceOf('Zend\EventManager\EventManagerInterface', $object->getEventManager());
        $this->assertCount(1, $object->getEventManager()->getListeners('foo'));
    }

    public function testSetEventManagerBehavesAsNormalWhenNoDefaultListenersSupplied()
    {
        $object = new TestAsset\ProvidesEventsWithNoDefaultListeners();
        $this->assertInstanceOf('Zend\EventManager\EventManagerInterface', $object->getEventManager());
        $this->assertCount(0, $object->getEventManager()->getEvents());
    }

}

