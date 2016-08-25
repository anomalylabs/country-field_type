<?php namespace Anomaly\CountryFieldType;

use Anomaly\CountryFieldType\Command\BuildOptions;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class CountryFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class CountryFieldType extends FieldType
{

    /**
     * The field class.
     *
     * @var string
     */
    protected $class = 'c-select form-control';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.country::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.country::filter';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'handler' => 'Anomaly\CountryFieldType\Handler\DefaultHandler@handle',
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

        return array_unique($this->options);
    }

    /**
     * Set the options.
     *
     * @param  array $options
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
        if (!$this->placeholder && !$this->isRequired()) {
            return 'anomaly.field_type.country::input.placeholder';
        }

        return $this->placeholder;
    }
}
