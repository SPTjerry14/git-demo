# KiddiHub

Set up

```
./setup.sh --os=[mac|ubuntu] --arch=[architecture]
```

## add php executablePath to setting.json (or can find by typing: which php)
```
    "php.validate.executablePath": "/usr/bin/php"
```
## install phpcs extension
Launch VS Code Quick Open (Ctrl+P), paste the following command, and press enter.

```
ext install ikappas.phpcs
```
## add phpcs config to setting.json
```
    "phpcs.executablePath": "/usr/bin/local/phpcs",
    "phpcs.standard": "PSR2"
```
