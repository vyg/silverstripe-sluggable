<?php


namespace Suilven\Sluggable\Tests\Model;


use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;
use Suilven\Sluggable\Extension\Sluggable;

class SluggestTestObject extends DataObject implements TestOnly
{
    private static $table_name = 'Test_SluggableObject';

    private static $db= [
      'DisplayName' => 'Varchar'
    ];

    private static $extensions = [
        Sluggable::class,
    ];

    private static $slug = 'DisplayName';

}
