<?php


namespace Suilven\Sluggable\Extension;


use SilverStripe\Core\Config\Config_ForClass;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Parsers\URLSegmentFilter;
use Suilven\Sluggable\Helper\SluggableHelper;

class Sluggable extends DataExtension
{
    /**
     * @var array $db Slug is where the slug is stored
     */
    private static $db = [
        'Slug' => 'Varchar(255)'
    ];

    private static $indexes = [
        'SlugIndex' => [
            'type' => 'unique',
            'columns' => ['Slug'],
        ],
    ];


    /**
     * Convert the configured field and it's associated value into a slug
     * e.g. Liverpool Football Club => liverpool-football-club
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        /** @var Config_ForClass $config */
        $config = $this->owner->config();

        /** @var string $fieldName */
        $fieldName = $config->get('slug');
        
        /** @var string $fieldValue */
        $fieldValue = $this->owner->$fieldName;

        $helper = new SluggableHelper();

        /** @var string $slug */
        $slug = $helper->getSlug($fieldValue);

        $count = $this->owner->get()->filter([$fieldName => $fieldValue])->count();

        if ($count > 1) {
            $i = 0;

            // @todo make this configurable
            while ($i < 1000) {
                $suffix = $i == 0 ? '' : '-' . $i;
                $slugToSave = $slug . $suffix;

                $existing = $this->owner->get()->filter(['Slug' => $slugToSave])->first();
                if (!$existing) {
                    $this->owner->Slug = $slugToSave;
                    break;
                }

                $i++;
            }
        } else {
            $this->owner->Slug = $slug;
        }




    }
}
