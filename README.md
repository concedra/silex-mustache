# MustacheServiceProvider

Provides integration with [Mustache.php](https://github.com/bobthecow/mustache.php) for the
[Silex](http://silex.sensiolabs.org/) microframework.

## Parameters

*  **mustache.extension**: Extension for template and partials files. Defaults to `mustache`.
*  **mustache.options**: An array of options to be passed to the `Mustache_Engine` constructor.
*  **mustache.templates_path** (optional): Path to directory containing the templates.
*  **mustache.partials_path** (optional): Path to the directory containing partials.

If `mustache.templates_path` or `mustache.partials_path` are set and no corresponding
loader is defined in `mustache.options`, filesystem loaders will be created automatically.

## Services

*  **mustache**: The Mustache instance.

