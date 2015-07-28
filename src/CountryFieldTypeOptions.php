<?php namespace Anomaly\CountryFieldType;

/**
 * Class CountryFieldTypeOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CountryFieldType
 */
class CountryFieldTypeOptions
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
