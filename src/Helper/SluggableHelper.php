<?php declare(strict_types = 1);

namespace Suilven\Sluggable\Helper;

use SilverStripe\View\Parsers\URLSegmentFilter;

class SluggableHelper
{
    /**
     * Convert the configured field and it's associated value into a slug
     * e.g. Liverpool Football Club => liverpool-football-club
     *
     * @param string $fieldValue The value of the field
     * @return string field value sluggified
     */
    public function getSlug(string $fieldValue): string
    {

        // use the standard SilverStripe tool for slugging URLs.  This optionally may have a different transliterator
        // associated with it
        $slugger = new URLSegmentFilter();

        return $slugger->filter($fieldValue);
    }
}
