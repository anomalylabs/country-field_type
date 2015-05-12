<?php namespace Anomaly\CountryFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class CountryFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CountryFieldType
 */
class CountryFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var CountryFieldType
     */
    protected $object;

    /**
     * Get the value for country key.
     *
     * @param null $key
     * @return null|string
     */
    public function value($key = null)
    {
        if (!$key) {
            $key = $this->object->getValue();
        }

        return array_get($this->object->getOptions(), $key);
    }

    /**
     * Get the translated value for country key.
     *
     * @param null $key
     * @return null|string
     */
    public function translated($key = null)
    {
        if (!$key) {
            $key = $this->object->getValue();
        }

        return trans('anomaly.field_type.country::country.' . $key);
    }
}
