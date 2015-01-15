<?php
namespace ZfcBaseTest\Form\TestAsset;

use ZfcBase\Form\ProvidesEventsForm;

class ProvidesEventsWithDefaultListeners extends ProvidesEventsForm
{
    public function attachDefaultListeners()
    {
        $this->getEventManager()->attach('foo', function() {});
    }
}
