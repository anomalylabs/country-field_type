# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You must set the country field type value with a valid ISO-2 country code from the available options.

{{ code('php', '$entry->example = "US";') }}

<div class="alert alert-info">
<strong>Note: </strong> The value is case insensitive and is changed to uppercase when set.
</div>

<hr>

<a name="output"></a>
## Basic Output

The country field type returns `null` or the selected ISO-2 country code.

{% code php %}
$entry->example; // "US"
{% endcode %}

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the country field type presenter is returned instead.

#### Name

Return the selected country's name, optionally translated into a different locale.

<div class="alert alert-success">
<strong>Contribute:</strong> To submit alternative translations for country names submit a pull request to <a href="https://github.com/anomalylabs/country-field_type" target="_blank">https://github.com/anomalylabs/country-field_type</a>
</div>

{% code php %}
$entry->example->name();     // "United States"
$entry->example->name("es"); // "Estados Unidos"
{% endcode %}

#### Code

Return the selected country's ISO-2 code.

{% code php %}
$entry->example->code(); // "US"
{% endcode %}
