# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.colorpicker',
        'config' => [
            'default_value' => 'US',
            'top_options'   => [
                'US',
                'CA',
                'UK'
            ]
        ]
    ]
];
```

### `default_value`

The default country for the country select.

### `top_options`

An array of countries to put at the top of the country select.
