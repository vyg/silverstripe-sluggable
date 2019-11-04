<?php


namespace Suilven\Sluggable\Extension;


use SilverStripe\Core\Config\Config_ForClass;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Parsers\URLSegmentFilter;

class Sluggable extends DataExtension
{
    /**
     * @var array $db Slug is where the slug is stored
     */
    private static $db = [
        'Slug' => 'Varchar(255)'
    ];


    /**
     * Convert the configured field and it's associated value into a slug
     * e.g. Liverpool Football Club => liverpool-football-club
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        // use the standard SilverStripe tool for slugging URLs.  This optionally may have a different transliterator
        // associated with it
        $slugger = new URLSegmentFilter();

        /** @var Config_ForClass $config */
        $config = $this->owner->config();

        /** @var string $fieldName */
        $fieldName = $config->get('slug');

        /** @var string $fieldValue */
        $fieldValue = $this->owner->$fieldName;

        /** @var string $slug */
        $slug = $slugger->filter($fieldValue);

        // save the slug in the Slug field
        $this->owner->Slug = $slug;
    }
}
