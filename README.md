# Meta Tag Manager with Laravel 5 Hooks

# Installation

## Step 1: Composer

Add the package to your `composer.json`:

```
{
    "require": {
        "puzbie/meta": "^1.0"
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

Use middleware to assign your default meta tags for all pages:

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

Also notice that the tags have been simplified. The package will expand them to produce the correct tags. For a full list of
supported tags see the appendix. But here is an example:

```
        Meta::setTag('charset', 'utf-8');
        Meta::setTag('X-UA-Compatible', 'IE=edge');
        Meta::setTag('author', 'My Name');
```

This will expand to:

```
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content = "IE=edge"/>
        <meta name="author" content = "My Name"/>
```

If your tag of choice isn't supported, then you can build it yourself by supplying
a third parameter to setTag,

```
        Meta::setTag('mood', 'happy','status');
```

This will expand to:

```
        <meta status="mood" content = "happy"/>
```


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

# Appendix

Currently Supported Tags:

```
        $this->tagTypes = ['keywords' => 'name',
            'description' => 'name',
            'subject' => 'name',
            'copyright' => 'name',
            'language' => 'name',
            'robots' => 'name',
            'revised' => 'name',
            'abstract' => 'name',
            'topic' => 'name',
            'summary' => 'name',
            'Classification' => 'name',
            'author' => 'name',
            'designer' => 'name',
            'reply-to' => 'name',
            'owner' => 'name',
            'url' => 'name',
            'identifier-URL' => 'name',
            'directory' => 'name',
            'pagename' => 'name',
            'category' => 'name',
            'coverage' => 'name',
            'distribution' => 'name',
            'rating' => 'name',
            'revisit-after' => 'name',
            'subtitle' => 'name',
            'target' => 'name',
            'HandheldFriendly' => 'name',
            'MobileOptimized' => 'name',
            'date' => 'name',
            'search_date' => 'name',
            'DC.title' => 'name',
            'ResourceLoaderDynamicStyles' => 'name',
            'medium' => 'name',
            'syndication-source' => 'name',
            'original-source' => 'name',
            'verify-v1' => 'name',
            'y_key' => 'name',
            'pageKey' => 'name',
            'apple-mobile-web-app-title' => 'name',
            'apple-mobile-web-app-capable' => 'name',
            'apple-touch-fullscreen' => 'name',
            'apple-mobile-web-app-status-bar-style' => 'name',
            'format-detection' => 'name',
            'viewport' => 'name',
            'msapplication-starturl' => 'name',
            'msapplication-window' => 'name',
            'msapplication-navbutton-color' => 'name',
            'application-name' => 'name',
            'msapplication-tooltip' => 'name',
            'msapplication-task' => 'name',
            'msvalidate.01' => 'name',
            'msapplication-TileColor' => 'name',
            'msapplication-square150x150logo' => 'name',
            'msapplication-wide310x150logo' => 'name',
            'msapplication-square310x310logo' => 'name',
            'msapplication-notification' => 'name',
            'csrf-param' => 'name',
            'csrf-token' => 'name',
            'charset' => '',
            '+name' => 'itemprop',
            '+description' => 'itemprop',
            '+image' => 'itemprop',
            'Expires' => 'http-equiv',
            'Pragma' => 'http-equiv',
            'Cache-Control' => 'http-equiv',
            'imagetoolbar' => 'http-equiv',
            'x-dns-prefetch-control' => 'http-equiv',
            'X-UA-Compatible' => 'http-equiv',
            'twitter:card' => 'name',
            'twitter:site' => 'name',
            'twitter:site:id' => 'name',
            'twitter:creator' => 'name',
            'twitter:creator:id' => 'name',
            'twitter:description' => 'name',
            'twitter:title' => 'name',
            'twitter:image' => 'name',
            'twitter:image:width' => 'name',
            'twitter:image:height' => 'name',
            'twitter:image0' => 'name',
            'twitter:image1' => 'name',
            'twitter:image2' => 'name',
            'twitter:image3' => 'name',
            'twitter:player' => 'name',
            'twitter:player:width' => 'name',
            'twitter:player:height' => 'name',
            'twitter:player:stream' => 'name',
            'twitter:player:stream:content_type' => 'name',
            'twitter:data1' => 'name',
            'twitter:label1' => 'name',
            'twitter:data2' => 'name',
            'twitter:label2' => 'name',
            'twitter:app:name:iphone' => 'name',
            'twitter:app:id:iphone' => 'name',
            'twitter:app:url:iphone' => 'name',
            'twitter:app:name:ipad' => 'name',
            'twitter:app:id:ipad' => 'name',
            'twitter:app:url:ipad' => 'name',
            'twitter:app:name:googleplay' => 'name',
            'twitter:app:id:googleplay' => 'name',
            'twitter:app:url:googleplay' => 'name',
            'twitter:app:country' => 'name',
            'og:url' => 'property',
            'og:title' => 'property',
            'og:description' => 'property',
            'og:site_name' => 'property',
            'og:app_id' => 'property',
            'og:type' => 'property',
            'og:locale' => 'property',
            'og:video' => 'property',
            'og:video:url' => 'property',
            'og:video:secure_url' => 'property',
            'og:video:type' => 'property',
            'og:video:width' => 'property',
            'og:video:height' => 'property',
            'og:image' => 'property',
            'og:image:url' => 'property',
            'og:image:secure_url' => 'property',
            'og:image:type' => 'property',
            'og:image:width' => 'property',
            'og:image:height' => 'property',
            'fb:admins' => 'property'
        ];

```
-