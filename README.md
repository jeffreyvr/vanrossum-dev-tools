# Van Rossum dev-tools

This is a plugin that contains some handy features for WordPress development.

## Debug helpers

Contains Symfony / Laravel like dump (and die) helper functions. Also includes the [Ray package](https://github.com/spatie/ray) from Spatie.

```php
dump( $variable );
```

```php
dd( $variable );
```


```php
ray()->newScreen();
ray('Debug text')->green();
// etc.
```

## ngrok support

Adds support for a local tunnel with ngrok. Based on the [article](https://matthewshields.co.uk/sharing-local-wordpress-sites-remotely-using-ngrok) of Matthew Shields.

Add the following to `wp-config.php`.

```php
/* Check for ngrok tunnel. */
if ( isset( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) && strpos( $_SERVER['HTTP_X_ORIGINAL_HOST'], 'ngrok' ) !== false ) {
	define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );
	define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
	define( 'LOCALTUNNEL_ACTIVE', true );
}
```