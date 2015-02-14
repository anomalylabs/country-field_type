# Country Field Type

*anomaly.field_type.country*

#### A country dropdown field type.

The country field type provides a list of countries in an HTML select input.

## Configuration

- `top_options` - an array of options to move to the top of the list 

Countries that are anticipated can be moved to the top in order to lessen the time needed to select common countries.  

#### Example

	config => [
	    'top_options' => [
	        'US',
	        'GB'
	    ]
	]
