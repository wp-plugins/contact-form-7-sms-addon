=== Contact Form 7 - Clockwork SMS ===
Author: Clockwork
Website: http://www.clockworksms.com/platforms/wordpress/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms
Contributors: mediaburst, jamesinman
Tags: SMS, Clockwork, Clockwork SMS, Mediaburst, Contact Form 7, Text Message
Text Domain: wpcf7_sms
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 2.0.0

Works with the Contact Form 7 plugin to send SMS notifications when somebody 
submits your contact form, using the Clockwork API. 

== Description ==

Adds an SMS box to your Contact Form 7 options pages, fill this in and you'll 
get a text message each time somebody fills out one of your forms.

You need a [Clockwork SMS account][1] and some Clockwork credit to use this plugin.

= Requires =

* Wordpress 3 or higher

* [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/) 2.4 or higher

* A [Clockwork SMS account][1]

== Installation ==

1. Upload the 'contact-form-7-sms-addon' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter your Clockwork API key in the 'Clockwork Options' page under 'Clockwork SMS'
4. Set your SMS options for each Contact Form

== Frequently Asked Questions ==

= How do I upgrade if I use an old version of this plugin with a Mediaburst username and password? =

If you already have forms set up using your Mediaburst username and password, just upgrade this
plugin from inside your Wordpress admin panel, or delete your existing 'contact-form-7-sms-addon'
directory and follow the installation instructions above. Your API key will automatically be set
up for you.

= What is a Clockwork API key? = 

To send SMS you will need to sign up for a [Clockwork SMS account][1]
and purchase some SMS credit. When you sign up you'll be given an API key.

= Can I send to multiple mobile numbers? =

Yes, separate each mobile number with a comma.

= What format should the mobile number be in? =

All mobile numbers should be entered in international format without a 
leading + symbol or international dialing prefix.  

For example a UK number should be entered 447123456789, and a Republic 
of Ireland number would be entered 353870123456.

== Screenshots ==

1. SMS box added to the Contact Form 7 page

2. SMS settings in detail

== Changelog ==

= 2.0.0 =
* New version with Clockwork API compatibility. 

= 1.5.4 =
* Adding link to sign up for an account if you don't already have one.

= 1.5.3 =
* Update mediaburst API wrapper for character compatibility on older PHP installs
* Rename mediaburst API wrapper class so it works correctly when eCommerce plugin 
  is installed

= 1.5.2 =
* Update mediaburst API Wrapper to fix character encoding of & sign

= 1.5.1 = 
* Further tweaks for SSL compatibility on servers with missing CA bundles

= 1.5 =
* Use WordPress HTTP POST function for the call to the mediaburst API, should
  hopefully make it work more reliably on Windows and older Linux installs.
* Change the Admin text function to use built in WordPress AJAX functions

= 1.4 = 
* Fix merge field compatability with Contact Form 7 version 3.1

= 1.3.1 = 
* Nudge version number as Wordpress plugins site seems to have missed the last
  update.  No changes in this release.

= 1.3 =
* Fix test button on settings page. The previous release was missing an
  important bit of javascript.

= 1.2 =
* New Test button when entering settings.  See if your your username,password
  and phone number all work.

= 1.1 = 
* Allow SMS messages up to 459 characters.
* Truncate message text if it is over 459 characters (was failing before).

= 1.0 =
* Initial public release

= 0.1 = 
* Beta release

== Upgrade Notice ==

Install this version for compatibility with the new Clockwork SMS API.

[1]: http://www.clockworksms.com/platforms/wordpress/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms