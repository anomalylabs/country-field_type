# Configuration

- [Basic Configuration](#basic)
- [Extra Configuration](#extra)
- [Option Handlers](#handlers)
- [Customizing Country Options](#customizing)

<hr>

Below is the full configuration available with defaults.

    {% code php %}
    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.country",
            "config" => [
                "default_value" => null,
                "top_options"   => null,
                "handler"       => "Anomaly\CountryFieldType\Handler\DefaultHandler@handle"
            ]
        ]
    ];
    {% endcode %}

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

{{ code('php', '"default_type" => "US"') }}

The `default_value` is a core option. This field type accepts any available country from the options.

### Top Options

{{ code('php', '"top_options" => ["US", "CA"]') }}

Specify the country options that are pushed to the top of the dropdown. This is helps prevent users from having to scroll through less common options.

<a name="handlers"></a>
## Option Handlers

Option handlers are responsible for setting the available country options on the field type. You can define your own option handler to add your own logic to available dropdown options.

### Defining Custom Handlers

Custom handlers can be defined as a callable string.

{{ code('php', '"handler" => "App/Example/MyCountries@handle"') }}

You can also define custom handlers as a closure.

<div class="alert alert-info">
<strong>Remember:</strong> Closures can not be stored in the database so you need to define closures in the form builder.
</div>

    {% code php %}
    protected $fields = [
        "example" => [
            "config" => [
                "handler" => function (CountryFieldType $fieldType) {
                    $fieldtype->setOptions(
                        [
                            "US" => "anomaly.field_type.country::country.us",
                            "CA" => "anomaly.field_type.country::country.ca"
                        ]
                    );
                }
            ]
        ]
    ];
    {% endcode %}

### Building Custom Handlers

Building custom option handlers could not be easier. Simply create the class with the method you defined in the config option.

{{ code('php', '"handler" => "App/Example/MyCountries@handle"') }}

The callable string is called via Laravel's service container. The {{ code('php', '$fieldType') }} is passed as an argument.

<div class="alert alert-primary">
<strong>Note:</strong> Because handlers are called through Laravel's service container, you can automatically inject dependencies into the construct and method.
</div>

    {% code php %}
    class MyCountries
    {
        public function handle(CountryFieldType $fieldType)
        {
            $fieldtype->setOptions(
                [
                    "foo" => "FOO",
                    "bar" => "BAR"
                ]
            );
        }
    }
    {% endcode %}

<hr>

<a name="customizing"></a>
## Customizing Country Options

The country dropdown options are controlled by the country field type's `countries.php` configuration file by default.

You can override these options by overloading the configuration file with a config file of your own at `/resources/{reference}/config/addons/country-field_type/countries.php`

<div class="alert alert-success">
<strong>Contribute:</strong> If you have options to add or have found an error, submit a pull request to <a href="https://github.com/anomalylabs/country-field_type" target="_blank">https://github.com/anomalylabs/country-field_type</a>
</div>