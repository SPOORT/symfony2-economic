Installation
============

Step 1: Download the Symfony2EconomicBundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require symfony2-economic
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Spoort\Bundle\Symfony2EconomicBundle\Symfony2EconomicBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Set configuration
-------------------------

In config.yml add following:

```
symfony2_economic:
    wsdl_url: <economic-wsdl-url>

    # If you like to connect with username/password then set agreement_numbe, username and password
    agreement_number: <economic-agreement-number>
    username: <economic-username>
    password: <economic-password>

    # or

    # If you would like to connect via token then set token and app_token
    token: <economic-token>
    app_token: <economic-app-token>
```