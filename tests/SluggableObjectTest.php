<?php declare(strict_types = 1);

namespace Suilven\Sluggable\Tests;

use SilverStripe\Dev\SapphireTest;
use Suilven\Sluggable\Tests\Model\SluggestTestObject;

class SluggableObjectTest extends SapphireTest
{
    protected static $extra_dataobjects = [
        SluggestTestObject::class,
    ];

    public function testLowerCase(): void
    {
        $this->assertEquals('this-is-lower-case', $this->getSlugFromDataObject('this is lower case'));
    }


    public function testUpperCase(): void
    {
        $this->assertEquals('this-is-upper-case', $this->getSlugFromDataObject('THIS IS UPPER CASE'));
    }


    public function testMixedCase(): void
    {
        $this->assertEquals('this-is-mixed-case', $this->getSlugFromDataObject('THIs-Is-Mixed-case'));
    }


    public function testEmptyString(): void
    {
        $this->assertEquals('', $this->getSlugFromDataObject(''));
    }


    public function testDupicateString(): void
    {
        $this->assertEquals('duplicate', $this->getSlugFromDataObject('Duplicate'));
        $this->assertEquals('duplicate-1', $this->getSlugFromDataObject('Duplicate'));
        $this->assertEquals('duplicate-2', $this->getSlugFromDataObject('Duplicate'));
    }


    /** @throws \SilverStripe\ORM\ValidationException */
    private function getSlugFromDataObject(string $title): string
    {
        $object = new SluggestTestObject();
        $object->DisplayName = $title;
        $object->write();

        return $object->Slug;
    }
}
