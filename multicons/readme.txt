=== Multicons [ Multiple Favicons ] ===
Contributors: Doc4
Tags: favicon, icon, apple favicon, apple icon, apple touch icon
Requires at least: 2.7
Tested up to: 6.4.3
Stable tag: 5.4
License: GPL-2.0+
License URL: http://www.gnu.org/licenses/gpl-2.0.txt


== Description ==
Now includes favicons for Android devices. Completely re-written in version 4.2 Multicons is a multi-favicon code generator which automatically inserts the necessary meta tags for both favicons (site-wide and/or dashboard) and Apple Touch / iPhone icons. Please note that it will be necessary to update your icon link locations.

Not sure what a favicon is? "A favicon (short for favorites icon), also known as a shortcut icon, website icon, URL icon, or bookmark icon is a 16×16 or 32×32 pixel square icon associated with a particular website or webpage. A web designer can create such an icon and install it into a website (or webpage) by several means, and most graphical web browsers will then make use of it. Browsers that provide favicon support typically display a page's favicon in the browser's address bar and next to the page's name in a list of bookmarks. Browsers that support a tabbed document interface  typically show a page's favicon next to the page's title on the tab. Some programs allow the user to select an icon of their own from the hard drive and associate it with a website." - Wikipedia

Favicons have a subtle, if small, role in building the branding of a website. When a user takes notice of a favicon it can often be a good indication they have come to the right place serving as visual representation of a website not only in the browser address bar but also when sifting through bookmarks. It is no secret that our eyes gravitate towards images before text and not just on the web but iPhones and iPads as well.

= The meta data output by Multicons: =

= Website Favicon: =
* Location: Website [and Dashboard if no Dashboard Favicon is specified]
* Meta tags generated:

link rel="shortcut icon" href="http://www.yoursite.com/favicon.ico"<br>
link rel="icon" type="image/png" href="http://www.yoursite.com/favicon.ico" /

= Dashboard Favicon: =
* Location: Dashboard Only
* Meta tag generated:

link rel="shortcut icon" href="http://www.yoursite.com/wp-content/favicon.ico"

= Apple Touch Original / iPhone Icon =
* Location: Website Only
* iDevice Effects Added such as Gloss and Rounded Corners
* Meta tag generated:

link rel="apple-touch-icon" href="http://www.yoursite.com/apple-touch-icon.png"

= Apple Touch Precomposed / iPhone Icon =
* Location: Website Only
* No iDevice Effects Added
* Meta tag generated:

link rel="apple-touch-icon" href="http://www.yoursite.com/apple-touch-icon.png"

= Android High Resolution Icon =
* Location: Website Only
* Meta tag generated:

link rel="icon" href="http://www.yoursite.com/icon-hires.png"

= Android Regular Icon =
* Location: Website Only
* Meta tag generated:

link rel="icon" href="http://www.yoursite.com/icon-reg.png"


If no image links are provided then no code is output thus, leaving a settings field blank will not bloat the site down with empty meta tags. If an Admin image is not provided this option will default to the Site-Wide Favicon.

This plugin includes sample files to assist in building the required images. We have included templates for the following: App Touch icons, Regular Favicons, and Android Favicons. These sample images are pre-sized and ready for a creative mind. Open these files in a graphics editor of your choice, make the necessary changes, save them in their appropriate file format and upload them.

= Plugin URL =
[Multicons](https://doc4design.com/multicons/)

= Screenshots =
[View Screenshots](https://doc4design.com/multicons/)




== Installation ==
To install the plugin just follow these simple steps:

1. Download the plugin and expand it.
2. Copy the Multicons folder into your plugins folder ( wp-content/plugins ).
3. Log-in to the WordPress administration panel and visit the Plugins page.
4. Locate the Multicons plugin and click on the 'activate' link.
5. Visit Settings > Multicons and provide links to the favicons.




== Changelog ==

= 5.4 =
* Updated code to ensure functionality with WordPress 6.4.3+
* Updated Required Headers for readme.txt
* Updated Required Headers for multicons.php

= 5.3 =
* Updated code to ensure functionality with WordPress 6.1.1+

= 5.2 =
* Updated code to ensure functionality with WordPress 5.7.1+

= 5 =
* Added support for Android favicons both high resolution and regular
* Included some additional design templates for Android favicon
* Included a default regular favicon to verify that the plugin is working
* Due to comments, removed all other default favicons, they stay blank now unless a link is added

= 4.2 =
* Removed the plugin from the main menu and added it back under Settings

= 4.1 =
* Removed an improper function call causing some users to see “Warning: call_user_func_array()”

= 4.0 =
* Rewrote the plugin code for security reasons and for WordPress approval

= 3.0 =
* Updated for security reasons
* Failed Testing

= 2.0 =
* Added Apple Precomposed Icons
* Make a distinction between Original and Precomposed Apple Icons

= 1.2 =
* Updated instructions for clarity
* Fixed file naming error. [favicon.icon] is incorrect

= 1.1 =
* Removed unlink function - causing problems

= 1.0 =
* Release candidate 1: code name 'Fapple'
