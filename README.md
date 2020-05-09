<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

---
# Browsersync Reloading + Laravel Mix Blade Reload

## [BrowserSync Reloading](https://browsersync.io/)

[BrowserSync](https://browsersync.io/) can automatically monitor your files for changes, and inject your changes into the browser without requiring a manual refresh. You may enable support by calling the mix.browserSync() method:


    mix.browserSync('my-domain.test');

// Or...

// https://browsersync.io/docs/options

    mix.browserSync({
        proxy: 'my-domain.test'
    });

## [Laravel Mix Blade Reload](https://www.npmjs.com/package/laravel-mix-blade-reload)

Laravel Mix extension to auto-reload browser when you change the blade views.

## [Installation](https://www.npmjs.com/package/laravel-mix-blade-reload#installation)

Install the extension:

    npm install laravel-mix-blade-reload

  Or if you prefer yarn:

    yarn add laravel-mix-blade-reload

Next require the extension inside your Laravel Mix config and call bladeReload() in your pipeline:

    // webpack.mix.js
    const mix = require('laravel-mix');
    require('laravel-mix-blade-reload');

    mix.js('resources/js/app.js', 'public/js')
       .bladeReload();

**Note**

Works only when running HMR - Hot Module Replacement script (npm run hot).
PS.: Incluir a "FLAG" --disableHostCheck=true ao final da linha no atributo "hot" do script no package.json.

    "scripts": {
        ...
        "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js --disableHostCheck=true"
        ...
    }

## [Options](https://www.npmjs.com/package/laravel-mix-blade-reload#options)

**Default options**

If nothing is passed to the extension inside your Laravel Mix config, the following options will be used:

    {
        path: 'resources/views/\*_/_.blade.php',
        debug: false
    }

### [Option details](https://www.npmjs.com/package/laravel-mix-blade-reload#option-details)

- path (string or array of strings). Path to files, directories to be watched recursively, or glob patterns.
- debug (boolean). Whenever to log extension event messages to the console.

---

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[British Software Development](https://www.britishsoftware.co)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   [UserInsights](https://userinsights.com)
-   [Fragrantica](https://www.fragrantica.com)
-   [SOFTonSOFA](https://softonsofa.com/)
-   [User10](https://user10.com)
-   [Soumettre.fr](https://soumettre.fr/)
-   [CodeBrisk](https://codebrisk.com)
-   [1Forge](https://1forge.com)
-   [TECPRESSO](https://tecpresso.co.jp/)
-   [Runtime Converter](http://runtimeconverter.com/)
-   [WebL'Agence](https://weblagence.com/)
-   [Invoice Ninja](https://www.invoiceninja.com)
-   [iMi digital](https://www.imi-digital.de/)
-   [Earthlink](https://www.earthlink.ro/)
-   [Steadfast Collective](https://steadfastcollective.com/)
-   [We Are The Robots Inc.](https://watr.mx/)
-   [Understand.io](https://www.understand.io/)
-   [Abdel Elrafa](https://abdelelrafa.com)
-   [Hyper Host](https://hyper.host)
-   [Appoly](https://www.appoly.co.uk)
-   [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
