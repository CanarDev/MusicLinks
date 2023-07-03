# Documentation

## Installation

```bash
 composer require canardev/music-links
```

## Usage

To use the package, you need to create an instance of the Api class and call the method that you want to use.
You need to pass the artist or track url as a parameter.

```php
use Canardev\MusicLinks\Api;

$api = new Api();
$api->getArtistOrTrackLinks($artistOrTrackSpotifyURL, $CountryCode);
```

With  for example:
```php
$artistOrTrackSpotifyURL = 'https://open.spotify.com/artist/4gzpq5DPGxSnKTe4SA8HAU?si=1e2e2e2e2e2e2e2e';
$CountryCode = 'US';
```

For the CountryCode, we use the [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) standard for the country code.

## Linter and tests

To run the linter and the tests, you need to run the following command:

```bash
 php vendor/bin/phpstan analyse src --level=8
```

```bash
php vendor/bin/php-cs-fixer fix src --rules=@PSR12
```

```bash
php vendor/bin/phpunit tests
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.