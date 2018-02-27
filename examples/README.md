# Yii 2 Coreui example

We explain what is to do if you want to use gulp instead of normal yii2 assets.

In the example theme we use the [Yii 2.0 Advanced Application Template](https://github.com/yiisoft/yii2-app-advanced) and [Yii2 User Module](https://github.com/dektrium/yii2-user).

1. You have to install [Node.js](https://nodejs.org) on your machine to use the ``npm`` package manager.
2. Copy ``themes`` folder from ``vendor/kmergen/yii2-coreui-gulp/examples/themes`` to your application ``backend`` directory.
3. Run from console the following commands (ensure that you are in the directory where your ``gulpfile.js`` is in normally ``backend/themes/coreui``):
- ``npm install --save`` that can take a few minutes
- ``gulp serve``

4. In component section of your config file, map your view files to your theme directory for e.g.

```php
'view' => [
            'theme' => [
                'basePath' => '@backend/themes/coreui',
                'pathMap' => [
                    '@app/views' => '@backend/themes/coreui/views',
                    '@dektrium/user/views' => '@backend/themes/coreui/views/user',
                    '@dektrium/rbac/views' => '@backend/themes/coreui/views/rbac',
                ],
            ],
        ],
```
Now you are ready to go and you should see the login page if you request your backend Url.



