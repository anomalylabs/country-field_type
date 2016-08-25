<?php namespace Anomaly\CountryFieldType\Handler;

use Anomaly\CountryFieldType\CountryFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class DefaultHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DefaultHandler
{

    /**
     * Handle the options.
     *
     * @param CountryFieldType $fieldType
     * @param Repository       $config
     */
    public function handle(CountryFieldType $fieldType, Repository $config)
    {
        $countries = array_keys($config->get('anomaly.field_type.country::countries'));

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
