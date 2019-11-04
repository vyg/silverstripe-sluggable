<?php


namespace Suilven\Sluggable\Helper;


use SilverStripe\Core\Config\Config_ForClass;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Parsers\URLSegmentFilter;

class SluggableHelper
{
    /**
     * Convert the configured field and it's associated value into a slug
     * e.g. Liverpool Football Club => liverpool-football-club
     */
    public function getSlug($fieldValue)
    {

        // use the standard SilverStripe tool for slugging URLs.  This optionally may have a different transliterator
        // associated with it
        $slugger = new URLSegmentFilter();

        /** @var string $slug */
        return $slugger->filter($fieldValue);
    }
}
