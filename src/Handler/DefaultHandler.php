<?php namespace Anomaly\CountryFieldType\Handler;

use Anomaly\CountryFieldType\CountryFieldType;

/**
 * Class DefaultHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CountryFieldType\Handler
 */
class DefaultHandler
{

    /**
     * Handle the options.
     *
     * @param CountryFieldType $fieldType
     */
    public function handle(CountryFieldType $fieldType)
    {
        $countries = config('anomaly.field_type.country::countries');

        $names = array_map(
            function ($iso) {
                return 'anomaly.field_type.country::country.' . $iso;
            },
            $countries
        );

        $options = array_combine($countries, $names);

        asort($options);

        $fieldType->setOptions($options);
    }
}
