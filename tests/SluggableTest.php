<?php
namespace Suilven\Sluggable\Tests;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Kernel;
use SilverStripe\Core\Startup\ScheduledFlushDiscoverer;
use SilverStripe\Dev\SapphireTest;
use Suilven\Sluggable\Extension\Sluggable;
use Suilven\Sluggable\Helper\SluggableHelper;

class SluggableTest extends SapphireTest
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        /**
         * @todo How does one add an extension during tests?
        \Page::add_extension(Sluggable::class);
        $kernel = Injector::inst()->get(Kernel::class);
        ScheduledFlushDiscoverer::scheduleFlush($kernel);
         * */
    }

    public function testLowerCase()
    {
        $this->assertEquals('this-is-lower-case', $this->getSlug('this is lower case'));
    }

    public function testUpperCase()
    {
        $this->assertEquals('this-is-upper-case', $this->getSlug('THIS IS UPPER CASE'));
    }

    public function textMixedCase()
    {
        $this->assertEquals('this-is-mixed-case', $this->getSlug('THIs-Is-Mixed-case'));
    }

    public function testEmptyString()
    {
        $this->assertEquals('', $this->getSlug(''));
    }

    private function getSlug($title)
    {
        $helper = new SluggableHelper();
        return $helper->getSlug($title);
    }
}
