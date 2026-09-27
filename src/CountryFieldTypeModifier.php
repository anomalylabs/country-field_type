<?php namespace Anomaly\CountryFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;

/**
 * Class CountryFieldTypeModifier
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class CountryFieldTypeModifier extends FieldTypeModifier
{

    /**
     * Modify the value.
     *
     * @param $value
     * @return string|null
     */
    public function modify($value)
    {
        if (is_array($value) || is_object($value)) {
            return null;
        }

        return strtoupper((string)$value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return string|null
     */
    public function restore($value)
    {
        if (is_array($value) || is_object($value)) {
            return null;
        }

        return strtoupper((string)$value);
    }
}
