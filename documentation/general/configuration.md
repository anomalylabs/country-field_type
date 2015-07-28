# Configuration

**Example Definition:**

```
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
```

### `default_value`

The default country selected. Any valid 2-digit ISO country code can be used. The default value is `'US'`. 

### `top_options`

An array of countries to put at the top of the country dropdown. Any array of valid 2-digit ISO country codes can be used. There are no top options by default.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\CountryFieldType\CountryFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be through the GUI configuration. 
