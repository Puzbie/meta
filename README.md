# Meta Tag Manager with hooks for Laravel 5


This is a fork of https://github.com/jayhealey/Robots. It appears development
has stalled on the original repository.

The purpose of this fork is to introduce Laravel 5 compatibility and PSR-4 and
PSR-2 (for Laravel 5.1).

# Installation

## Step 1: Composer

Add the package to your `composer.json`:

```
{
    "require": {
        "puzbie/meta": "~0.1.0"
    }
}
```

## Step 2: Configuration

Add the following to your `config/app.php` in the `providers` array:

```
'Puzbie\Meta\MetaServiceProvider',
```

You can also optionally add the following to the `aliases` array:

```
'Meta' => 'Puzbie\Meta\MetaFacade',
```

# Usage

Basic Suggested Usage:

Use middleware to assign your default meta tags for all pages.

Add the following to your routes file:

```php
<?php namespace App\Http\Middleware;

use Closure;
use Meta;

class MetaDefaults
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        Meta::setTag('charset', 'utf-8');
        Meta::setTag('X-UA-Compatible', 'IE=edge');
        Meta::setTag('viewport', 'width=device-width, initial-scale=1');
        Meta::setTag('author', 'My Name');
        Meta::setTag('csrf-token', csrf_token());
        Meta::setTitle('My Site - The First Chapter');
        Meta::setTag('description', 'If you are at a loss, we have the goss.');
        return $next($request);
    }
}

```

Notice that you can also set the TITLE tag. This is because you may want to duplicate it in certain social tags.

Also notice that the tags have been simplified. The package will expand them to produce the correct tags.

Now, in your view template, add the following to the header section:

```php

<!DOCTYPE html>
<html lang="en">

<head>

    {!! Meta::dump() !!}

...

```

So far so good. Suppose you want to change the description depending on what page you are on, or add product info tags etc?

Just add them after the middleware and before the dump. You can either add individual tags, or use some of the helper methods

included to generate social tags.

```php

                Meta::clear();
                Meta::makeMozStandard(['title'=>'Your Site',
                                       'url'=>'http://www.acesite.co.uk',
                                       'description'=>'My Ace Site  - its the best.',
                                       'image'=>'http://www.acesite.co.uk/images/site.jpg',
                                       'siteName'=>'My Ace Site',
                                       'twitterId'=>'@MyTwitterId',
                                       'creatorId'=>'@MyBlurbWritersTwitterId',
                                       'fbAdmin'=>'12345678901234']);


```

The above example removes the default meta settings, and generates social tags defined in the STANDARD section
of this site: https://moz.com/blog/meta-data-templates-123

I'm not affiliated with that site in any way, I just found it a useful source of information.

# Notes

1. I will be adding more documentation shortly. The tests should give you some pointers though.
2. I have removed support for various twitter cards (product, gallery, image etc) as they are being depreciated as of July.
You can still add them manually, using settag, should you so desire. 

# License

[MIT](LICENSE)
