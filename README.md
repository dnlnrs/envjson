# EnvJson

Loads `env.json` file contents into php `$_ENV` global variable.

## Installation
Simply add the library to your `composer.json`
```
composer require dnlnrs/envjson
```

## Usage
Create a new instance of `Loader` class, passing the path of the `env.json` file and the name (default to `env.json`) and then call the `load` method.

Example:
```
use dnlrs\envjson\Loader;

$loader = new Loader(__DIR__);
$loader->load();
```
Now your `$_ENV` contaons the `env.json` contents.

## Changelog
- [v0.0.1 - First release](https://github.com/dnlnrs/envjson/releases/tag/0.1.0)