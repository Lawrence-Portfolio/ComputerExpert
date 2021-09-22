<?php namespace Bizmark\Expert;

use Backend;
use System\Classes\PluginBase;

use Bizmark\Expert\Classes\Event\ThemeData\ThemeDataModelHandler;

/**
 * ComputerExpert Plugin Information File
 * @package Bizmark\Expert
 * @author Yuri Todosienko, yuri@biz-mark.ru, Biz-Mark
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Expert',
            'description' => 'Плагин управления конфигураторами Computer Expert',
            'author'      => 'Bizmark',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // Theme Data
        \Event::subscribe(ThemeDataModelHandler::class);
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Bizmark\Expert\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'bizmark.expert.some_permission' => [
                'tab' => 'Computer Expert',
                'label' => 'Управление плагином'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'builds' => [
                'label'       => 'Сборки',
                'url'         => Backend::url('bizmark/expert/builds'),
                'icon'        => 'icon-desktop',
                'permissions' => ['bizmark.expert.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'builds' => [
                        'label'       => 'Сборки',
                        'url'         => Backend::url('bizmark/expert/builds'),
                        'icon'        => 'icon-desktop',
                        'permissions' => ['bizmark.expert.*'],
                        'order'       => 500,
                    ],
                    'collections' => [
                        'label'       => 'Коллекции',
                        'url'         => Backend::url('bizmark/expert/collections'),
                        'icon'        => 'icon-list',
                        'permissions' => ['bizmark.expert.*'],
                        'order'       => 500,
                    ],
                    'templates' => [
                        'label'       => 'Шаблоны',
                        'url'         => Backend::url('bizmark/expert/templates'),
                        'icon'        => 'icon-th',
                        'permissions' => ['bizmark.expert.*'],
                        'order'       => 500,
                    ],
                ],
            ],
            'configs' => [
                'label'       => 'Сборки сообщества',
                'url'         => Backend::url('bizmark/expert/configs'),
                'icon'        => 'icon-globe',
                'permissions' => ['bizmark.expert.*'],
                'order'       => 500,
            ],
            'games' => [
                'label'       => 'Игры',
                'url'         => Backend::url('bizmark/expert/games'),
                'icon'        => 'icon-gamepad',
                'permissions' => ['bizmark.expert.*'],
                'order'       => 500,
            ],
        ];
    }
}
