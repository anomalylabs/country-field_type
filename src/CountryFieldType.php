<?php namespace Anomaly\CountryFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class CountryFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CountryFieldType
 */
class CountryFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.country::input';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'default_value' => 'US'
    ];

    /**
     * Get the countries.
     *
     * @return array
     */
    public function getOptions()
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

        $topOptions = array_get($this->getConfig(), 'top_options');

        if (!is_array($topOptions)) {
            $topOptions = array_filter(array_reverse(explode("\r\n", $topOptions)));
        }

        foreach ($topOptions as $iso) {
            if (isset($options[$iso])) {
                $options = [$iso => $options[$iso]] + $options;
            }
        }

        return [null => $this->getPlaceholder()] + array_unique($options);
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return $this->placeholder ?: 'anomaly.field_type.country::input.placeholder';
    }
}
