# Colorpicker Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.country`

The country field type provides a dropdown input of countries.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.country',
            'config' => [
                'default_value' => 'US',
                'top_options'   => [
                    'US',
                    'CA',
                    'UK'
                ],
                'handler'       => 'Anomaly\CountryFieldType\CountryFieldTypeOptions@handle'
            ]
        ]
    ];

### `default_value`

The default country selected. Any valid 2-digit ISO country code can be used. The default value is `'US'`. 

### `top_options`

An array of countries to put at the top of the country dropdown. Any array of valid 2-digit ISO country codes can be used. There are no top options by default.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\CountryFieldType\CountryFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be set through the GUI configuration.


<a name="output"></a>
## Output

This field type returns the selected 2-digit ISO country code by default.

### `name)_`

Returns the country name

    // Twig Usage
    {{ entry.example.name }}
    
    // API usage
    $entry->example->name();

### `translated($locale = null)`

`locale` - Any valid i18n language code. If none is provided the `config('app.locale')` value will be used.

Returns the translated country name in a specified locale.

    // Twig Usage
    {{ entry.example.translated('es') }}
    
    // API usage
    $entry->example->translated('es');
