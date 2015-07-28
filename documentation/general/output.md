# Output

This field type returns the selected 2-digit ISO country code by default.

### `name`

Get the country name

```
// Twig Usage
{{ entry.example.name }}

// API usage
$entry->example->name();
```

### `translated`

Get the translated country name in a specified locale

```
// Twig Usage
{{ entry.example.translated('es') }}

// API usage
$entry->example->translated('es');
```
