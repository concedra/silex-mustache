<?php
namespace Concedra\Silex;

use Silex\ServiceProviderInterface;
use Silex\Application;

/**
 * Mustache.php integration for Silex.
 *
 * @author Christian Schorn <schorn@concedra.de>
 */
class MustacheServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mustache.options'] = array(
            'charset' => $app['charset'],
        );

        $app['mustache.extension'] = 'mustache';

        $app['mustache'] = $app->share(function ($app) {
            $opts = $app['mustache.options'];

            $loader_options = array(
                'extension' => $app['mustache.extension'],
            );

            if (isset($app['mustache.templates_path']) && !isset($opts['loader'])) {
                $opts['loader'] = new \Mustache_Loader_FilesystemLoader(
                    $app['mustache.templates_path'],
                    $loader_options
                );
            }
            
            if (isset($app['mustache.partials_path']) && !isset($opts['partials_loader'])) {
                $opts['partials_loader'] = new \Mustache_Loader_FilesystemLoader(
                    $app['mustache.partials_path'],
                    $loader_options
                );
            }

            return new \Mustache_Engine($opts);
        });
    }

    public function boot(Application $app)
    {
    }
}
