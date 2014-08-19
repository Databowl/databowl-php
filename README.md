# Databowl PHP Library

PHP Library for interacting with the Databowl Leadgen Platform.

## Requirements

* PHP 5.4+

## Installation

We recommend you use [Composer](http://getcomposer.org) to install the library.

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Then, add the Databowl Library to your project's composer.json:

```javascript
{
    "require": {
        "databowl/databowl-php": "0.1.*"
    }
}
```

## Examples

### Submitting Leads

```php
/* Create a client, passing the name of the instance to use */
$client = new Databowl\Client('instance-name');
/* Create a new Lead with a campaign ID of 1 and a supplier ID of 5 */
$lead = new Databowl\Leads\Lead(1, 5);

/* Create an array of lead data in the format <fieldName> => <value> */
$data = [
    'f_18_title' => '[title]',
    'f_19_firstname' => '[firstname]',
    'f_20_lastname' => 'Jones',
    'f_17_email' => '[email]',
];

/* Set the lead data */
$lead->getData()->exchangeArray($data);

/* Submit the lead, it returns a new lead */
$newLead = $client->submitLead($lead);

/* Fetch the lead ID and result */
$leadId = $newLead->getLeadId();
$result = $newLead->getResult()->getMessage();
```