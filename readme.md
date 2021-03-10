![logo](assets/images/logoGithub.svg)

## Introduction
Harmoni is a featured packed WordPress theme, that is meant be used as a parent when developing. Every option available is completely opt-in, making sure your site build isn't getting flooded with unnecessary
performance bottlenecks.

Besides, a healthy dose of practical PHP helpers, there are various Twig add-ons available to make life easier using [Upstatements Timber plugin](https://www.upstatement.com/timber/).

Please keep in mind that there will be breaking changes occurring until 1.0 has been reached.

## Setup
Installing Harmoni is easy, simply download the repo as a .zip and install it in your WordPress install. It is recommended to use a [child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/) for customisations on your build.

## File structure
Some functions will attempt to load a file from your child theme, for example a stylesheet or favicons. All of those files should be located within the /assets folder of your child theme root.

## Applying settings
Settings are applied using the [init WordPress hook](https://developer.wordpress.org/reference/hooks/init/).

## Classes
All PHP classes are namespaced with *harmoni*. An example configuration can look like this:

```php
use harmoni\init;
use harmoni\remove;

add_action( 'init', function () {
	init::css();
	init::twig();
	init::favIcon();
	init::bodyClassSlug();
	remove::jquery();
	remove::embed();
	remove::emojis();
	remove::gutenberg();
} );
```

### harmoni\init
This class sets up most of the files that need to be enqueued in order for the development to start.

#### harmoni\init::twig
Enables Twig. Needs [Timber](https://www.upstatement.com/timber/) to work.

#### harmoni\init::css
Enqueues a *style.css* file from the *assets/css* folder into the header.

#### harmoni\init::js
Enqueues a *scripts.js* file from the *assets/js* folder into the footer.

#### harmoni\init::favIcon
Loads favicons into the head just like WP core. Filenames are *favicon-32x32.png*, *favicon-180x180.png* and *favicon-32x32.png* and will be loaded from *assets/images*.

#### harmoni\init::bodyClassSlug
Adds the page slug to the body as a class name, e.g. *page-services*.

### harmoni\get
Gets useful blocks of markup that are used frequently.

#### harmoni\get::head
Inserts a head block. Includes [wp_head()](https://developer.wordpress.org/reference/functions/wp_head/) function.

#### harmoni\get::inter
Inserts [Inter](https://rsms.me/inter/) font into the head.

### harmoni\remove
Removes unnecessary files from loading on your site. 

#### harmoni\remove::jquery
Removes jQuery from the frontend.

#### harmoni\remove::embed
Removes oEmbed scripts from the frontend.

#### harmoni\remove::emojis
Removes emojis from the frontend.

#### harmoni\remove::gutenberg
Removes Gutenberg CSS from the frontend.

#### harmoni\remove::extraRss
Removes RSS feeds from the frontend.

#### harmoni\remove::recentCommentsCss
Removes recent comments CSS from the frontend.

#### harmoni\remove::galleryCss
Removes gallery CSS from the frontend.

#### harmoni\remove::wordpress
Removes all other obscure WordPress things from the frontend. Check source code for a full list.

## Twig
Harmoni adds various little Twig goodies to make developing faster and more efficient.

### Filters
[Filters](https://timber.github.io/docs/v2/guides/filters/#general-filters) are used to modify content.

Usage: 
```twig
{{ source|filter }}
```

#### shuffle
Shuffles an array using PHPs [shuffle](https://www.php.net/manual/en/function.shuffle.php) function.

#### slugify
Slugifies a string, e.g. *I am a string* -> *i-am-a-string*

### Global variables
Variables in the [global context](https://timber.github.io/docs/v2/guides/context/) are used to get content dynamic content.

Usage: 
```twig
{{ variable }}
```

#### head
Outputs the harmoni\get::head class.

#### postLatest
Gets the latest post.

#### currentYear
Outputs the current year.

#### themeRoot
Gets the theme root directory.

#### themeRootUri
Gets the theme root directory URI.