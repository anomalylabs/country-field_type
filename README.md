# Country Field Type

*anomaly.field_type.country*

A field type providing a dropdown selection of world countries for PyroCMS.

## Description

The country field type provides an intuitive dropdown interface for selecting countries from a comprehensive list of world nations. It includes country codes, names, and validation.

## Features

- **Complete Country List**: All countries worldwide
- **Country Codes**: ISO 3166-1 alpha-2 codes
- **Searchable Dropdown**: Easy country selection
- **Validation**: Built-in country code validation
- **Multiple Display Modes**: Dropdown or search
- **Customizable Options**: Filter or limit countries
- **Localized Names**: Translated country names

## Configuration

### Basic Configuration

```php
'country' => [
    'type' => 'anomaly.field_type.country',
],
```

### Configuration Options

#### `mode` (default: 'dropdown')
Display mode for the field.

```php
'config' => [
    'mode' => 'dropdown', // or 'search'
]
```

#### `handler`
Custom options handler.

```php
'config' => [
    'handler' => 'App\\Example\\CustomCountriesHandler@handle',
]
```

#### `top_options`
Countries to display at the top of the list.

```php
'config' => [
    'top_options' => [
        'US' => 'United States',
        'CA' => 'Canada',
        'GB' => 'United Kingdom',
    ],
]
```

## Usage Examples

### Basic Country Selector

```php
protected $fields = [
    'country' => [
        'type' => 'anomaly.field_type.country',
    ],
];
```

### With Search Mode

```php
'billing_country' => [
    'type'   => 'anomaly.field_type.country',
    'config' => [
        'mode' => 'search',
    ],
],
```

### With Top Options

```php
'shipping_country' => [
    'type'   => 'anomaly.field_type.country',
    'config' => [
        'top_options' => [
            'US' => 'United States',
            'CA' => 'Canada',
            'MX' => 'Mexico',
        ],
    ],
],
```

### Limited Country List

```php
'service_country' => [
    'type'   => 'anomaly.field_type.country',
    'config' => [
        'handler' => function ($fieldType) {
            $fieldType->setOptions([
                'US' => 'United States',
                'CA' => 'Canada',
                'GB' => 'United Kingdom',
                'AU' => 'Australia',
            ]);
        },
    ],
],
```

## Accessing Values

### Basic Output

```php
// Get country code
$code = $entry->country; // 'US'

// Get country name
$name = $entry->getFieldType('country')->getOption($entry->country);
```

### In Templates

```twig
{# Display country code #}
<p>Country: {{ entry.country }}</p>

{# Display country name #}
<p>Country: {{ entry.country_label }}</p>

{# Display with flag icon #}
<span class="flag-icon flag-icon-{{ entry.country|lower }}"></span>
{{ entry.country_label }}
```

### Presenter Output

```php
// Get full country name
echo $entry->present()->country->label();

// Get country code
echo $entry->present()->country; // US
```

## Setting Values

### By Country Code

```php
$entry->country = 'US';
$entry->save();
```

### From Form Input

```php
$entry->country = $request->input('country');
$entry->save();
```

## Database Column Type

Stores country code as VARCHAR(2):

```php
Schema::table('your_table', function (Blueprint $table) {
    $table->string('country', 2)->nullable();
});
```

## Validation

```php
'country' => [
    'type'  => 'anomaly.field_type.country',
    'rules' => [
        'required',
        'valid_country', // Ensures valid country code
    ],
],
```

## Common Use Cases

### Shipping Addresses
```php
'shipping_country' => 'anomaly.field_type.country',
```

### Billing Information
```php
'billing_country' => 'anomaly.field_type.country',
```

### User Profiles
```php
'origin_country' => 'anomaly.field_type.country',
```

### Business Location
```php
'headquarters_country' => [
    'type'   => 'anomaly.field_type.country',
    'config' => ['mode' => 'search'],
],
```

## Requirements

- PyroCMS 3.x
- Anomaly Streams Platform ^1.10

## License

This field type is open-sourced software licensed under the [MIT license](LICENSE.md).

## Authors

- **PyroCMS, Inc.** - [Website](http://pyrocms.com/) - support@pyrocms.com
- **Ryan Thompson** - [Website](http://ryanthepyro.com/)
