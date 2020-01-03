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

class SluggableHelperTest extends SapphireTest
{

    public function test_lower_case()
    {
        $this->assertEquals('this-is-lower-case', $this->getSlug('this is lower case'));
    }

    public function test_upper_case()
    {
        $this->assertEquals('this-is-upper-case', $this->getSlug('THIS IS UPPER CASE'));
    }

    public function text_mixed_case()
    {
        $this->assertEquals('this-is-mixed-case', $this->getSlug('THIs-Is-Mixed-case'));
    }

    public function test_empty_string()
    {
        $this->assertEquals('', $this->getSlug(''));
    }

    private function getSlug($title)
    {
        $helper = new SluggableHelper();
        return $helper->getSlug($title);
    }
}
