=== Contact Form 7 - Clockwork SMS ===
Author: Clockwork
Website: http://www.clockworksms.com/platforms/wordpress/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms
Contributors: mediaburst, martinsteel, mediaburstjohnc
Tags: SMS, Clockwork, Clockwork SMS, Mediaburst, Contact Form 7, Text Message
Text Domain: wpcf7_sms
Requires at least: 3.0.0
Tested up to: 4.2.2
Stable tag: 2.3.0

Works with the Contact Form 7 plugin to send SMS notifications when somebody 
submits your contact form, using the Clockwork API. 

== Description ==

Adds an SMS box to your Contact Form 7 options pages, fill this in and you'll 
get a text message each time somebody fills out one of your forms.

You need a [Clockwork SMS account](http://www.clockworksms.com/platforms/wordpress/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms) and some Clockwork credit to use this plugin.

= Requires =

* Wordpress 3 or higher

* [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/) 3.4 or higher

* A [Clockwork SMS account](http://www.clockworksms.com/platforms/wordpress/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms)

== Installation ==

1. Search for and install "Contact Form 7 - Clockwork SMS" through WordPress Admin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter your Clockwork API key in the 'Clockwork Options' page under 'Clockwork SMS'
4. Set your SMS options for each Contact Form

== Frequently Asked Questions ==

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

= What versions of Contact Form 7 does this work with? =

The plugin has been tested with versions of Contact Form 7 from 3.4 thorough to 4.2,
earlier versions of Contact Form 7 won't work but future releases should.

= How do I get in touch with you? =

The most reliable way to contact us is through our website [http://www.clockworksms.com/support/], it's monitored constantly during UK working hours.

== Screenshots ==

1. SMS tab added to the Contact Form 7 page

== Changelog ==

= 2.3.0 =
* Updated to work with Contact Form 7 v4.2
* Tested with WordPress 4.2.2

= 2.2.1 =
* Works with Contact Form 7 v3.9
* Tested with WordPress 3.9.1

= 2.2.0 =
* Contact Form 7 3.8 compatability
* Tested for WordPress 3.9
* Dropped support for Contact Form 7 versions earlier than 3.4

= 2.1.4 =
* WordPress 3.8 compatibility.

= 2.1.3 =
* Fixed a regression introduced in 2.1.2. 2.1.3 functionality now includes 2.1.2.

= 2.1.2 =
* Fixed an error in 2.1.1 where the CF7 SMS options would not show up.

= 2.1.1 =
* Adding Clockwork "test" functionality

= 2.1.0 =
* Added the ability to set the 'From' sender of SMS messages.

= 2.0.2 =
* Updated to the latest version of the Clockwork wrappers.

= 2.0.1 =
* Fixed issue with setting Clockwork options when your Wordpress installation is not in the root directory.

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

Fixed an error in 2.1.1 where the CF7 SMS options would not show up.
