<?php declare(strict_types = 1);

namespace Suilven\Sluggable\Tests;

use SilverStripe\Dev\SapphireTest;
use Suilven\Sluggable\Helper\SluggableHelper;

class SluggableHelperTest extends SapphireTest
{

    public function testLowerCase(): void
    {
        $this->assertEquals('this-is-lower-case', $this->getSlug('this is lower case'));
    }


    public function testUpperCase(): void
    {
        $this->assertEquals('this-is-upper-case', $this->getSlug('THIS IS UPPER CASE'));
    }


    public function testMixedCase(): void
    {
        $this->assertEquals('this-is-mixed-case', $this->getSlug('THIs-Is-Mixed-case'));
    }


    public function testEmptyString(): void
    {
        $this->assertEquals('', $this->getSlug(''));
    }


    private function getSlug(string $title): string
    {
        $helper = new SluggableHelper();

        return $helper->getSlug($title);
    }
}
