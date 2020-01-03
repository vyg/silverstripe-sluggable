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
use Suilven\Sluggable\Tests\Model\SluggestTestObject;

class SluggableObjectTest extends SapphireTest
{
    protected static $extra_dataobjects = [
        SluggestTestObject::class
    ];

    public function testLowerCase()
    {
        $this->assertEquals('this-is-lower-case', $this->getSlugFromDataObject('this is lower case'));
    }

    public function test_upper_case()
    {
        $this->assertEquals('this-is-upper-case', $this->getSlugFromDataObject('THIS IS UPPER CASE'));
    }

    public function text_mixed_case()
    {
        $this->assertEquals('this-is-mixed-case', $this->getSlugFromDataObject('THIs-Is-Mixed-case'));
    }

    public function test_empty_string()
    {
        $this->assertEquals('', $this->getSlugFromDataObject(''));
    }

    public function test_duplicate_string()
    {
        $this->assertEquals('duplicate', $this->getSlugFromDataObject('Duplicate'));
        $this->assertEquals('duplicate-1', $this->getSlugFromDataObject('Duplicate'));
        $this->assertEquals('duplicate-2', $this->getSlugFromDataObject('Duplicate'));

    }

    private function getSlugFromDataObject($title)
    {
        $object = new SluggestTestObject();
        $object->DisplayName = $title;
        $object->write();
        return $object->Slug;
    }
}
