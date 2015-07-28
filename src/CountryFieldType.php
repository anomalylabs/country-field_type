<?php namespace Anomaly\CountryFieldType;

use Anomaly\CountryFieldType\Command\BuildOptions;
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
        'default_value' => 'US',
        'handler'       => 'Anomaly\CountryFieldType\CountryFieldTypeOptions@handle'
    ];

    /**
     * The dropdown options.
     *
     * @var null|array
     */
    protected $options = null;

    /**
     * Get the countries.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->dispatch(new BuildOptions($this));
        }

        $topOptions = array_get($this->getConfig(), 'top_options');

        if (!is_array($topOptions)) {
            $topOptions = array_filter(array_reverse(explode("\r\n", $topOptions)));
        }

        foreach ($topOptions as $iso) {
            if (isset($this->options[$iso])) {
                $this->options = [$iso => $this->options[$iso]] + $this->options;
            }
        }

        return [null => $this->getPlaceholder()] + array_unique($this->options);
    }

    /**
     * Set the options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
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
