# FulltextFinder

LibKeyClient is a PHP library for querying the [LibKey Article DOI lookup API](https://thirdiron.atlassian.net/wiki/spaces/BrowZineAPIDocs/pages/65699928/Article+DOI+Lookup+Endpoint+LibKey) from [Third Iron](https://thirdiron.com/).

## Installation

Use the package manager [composer](https://getcomposer.org/) to install LibKeyClient.

```bash
composer require bclibraries/libkey-client:^0.1
```

LibKeyClient is currently a 0.* release, so things will change drastically with any minor release.

## Usage

```php
use BCLib\LibKeyClient\LibKeyClient;

require_once __DIR__ . '/vendor/autoload.php';

// LibKey API identifiers.
$libkey_apikey = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
$libkey_id = 'xxx';
$doi = '10.1371/journal.pone.0193984';

$libkey = LibKeyClient::build($libkey_id, $libkey_apikey);

// Send request.
$http_response = $libkey->request($doi);

// Parse
if ($libkey_response = $libkey->parse($http_response)) {
    echo "Fulltext for {$libkey_response->getTitle()} is at {$libkey_response->getFullTextFile()}\n";
} else {
    echo "Could not find LibKey entry for '$doi'\n";
}

// Fulltext for Differential resilience of Amazonian otters along the Rio Negro in the aftermath of the 20th century
// international fur trade is at https://libkey.io/libraries/431/articles/195287219/full-text-file?utm_source=api_536
```

### The HTTPClient

LibKey client uses the [Symfony HTTPClient](https://symfony.com/doc/current/components/http_client.html) component to
handle HTTP requests. The Symfony client was chosen instead of a PSR-18—compliant implementation because the original
use case required concurrent requests, which PSR-18 does not support.

## Running tests

[PHPUnit](https://phpunit.de/) is used for testing. You may need to enable the sockets extension.

```bash
./vendor/bin/phpunit 
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
