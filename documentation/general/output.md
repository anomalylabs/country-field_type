# Output

This field type returns the addon instance as a value. You may access the object as normal.

**Examples:**

### `name`

Get the country name

```
// Twig Usage
{{ entry.example.name }}

// API Usage
$entry->example->name();
```

### `translated`

Get the translated country name in a specified locale

```
// Twig Usage
{{ entry.example.translated('es') }}

// API Usage
$entry->example->translated('es');
```
