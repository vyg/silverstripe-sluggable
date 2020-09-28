<?php declare(strict_types = 1);

namespace Suilven\Sluggable\Extension;

use SilverStripe\ORM\DataExtension;
use Suilven\Sluggable\Helper\SluggableHelper;

// @phpcs:disable SlevomatCodingStandard.Commenting.DisallowCommentAfterCode.DisallowedCommentAfterCode
class Sluggable extends DataExtension
{
    /** @var array<string,string> $db Slug is where the slug is stored */
    private static $db = [
        'Slug' => 'Varchar(255)',
    ];

    /** @var array<string, array<string, array<int, string>|string>> */
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
    public function onBeforeWrite(): void
    {
        parent::onBeforeWrite();

        /** @var \SilverStripe\Core\Config\Config_ForClass $config */
        $config = $this->getOwner()->config();

        /** @var string $fieldName */
        $fieldName = $config->get('slug');

        /** @var string $fieldValue */
        $fieldValue = $this->getOwner()->$fieldName; // @phpstan-ignore-line

        $helper = new SluggableHelper();

        /** @var string $slug */
        $slug = $helper->getSlug($fieldValue);
        $count = $this->getOwner()->get()->filter([$fieldName => $fieldValue])->count();

        if ($count >= 1) {
            $i = 0;

            // @todo make this configurable
            while ($i < 1000) {
                $suffix = $i === 0
                    ? ''
                    : '-' . $i;
                $slugToSave = $slug . $suffix;

                $existing = $this->getOwner()->get()->filter(['Slug' => $slugToSave])->first();
                if (!isset($existing)) {
                    $this->getOwner()->Slug = $slugToSave;

                    break;
                }

                $i++;
            }
        } else {
            $this->getOwner()->Slug = $slug;
        }
    }
}
