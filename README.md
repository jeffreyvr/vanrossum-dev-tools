# Van Rossum dev-tools

This is a plugin that contains some handy features for WordPress development.

## Debug helpers

Contains Symfony / Laravel like dump (and die) helper functions.

```php
dump( $variable );
```

```php
dd( $variable );
```

## ngrok support

Adds support for a local tunnel with ngrok. Based on the [article](https://matthewshields.co.uk/sharing-local-wordpress-sites-remotely-using-ngrok) of Matthew Shields.

Add the following to `wp-config.php`.

```php
if ( strpos( $_SERVER['HTTP_X_ORIGINAL_HOST'], 'ngrok' ) !== false ) {
	if ( isset( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) && $_SERVER['HTTP_X_ORIGINAL_HOST'] === 'https' ) {
		$server_proto = 'https://';
	} else {
		$server_proto = 'http://';
	}
	define( 'WP_SITEURL', $server_proto . $_SERVER['HTTP_HOST'] );
	define( 'WP_HOME', $server_proto . $_SERVER['HTTP_HOST'] );
	define( 'LOCALTUNNEL_ACTIVE', true );
}
```