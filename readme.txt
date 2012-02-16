=== Contact Form 7 - SMS Addon ===
Author: Mediaburst Ltd
Website: http://www.mediaburst.co.uk/wordpress/contact-form-7-sms-addon/
Contributors: mediaburst, martinsteel
Tags: SMS, Mediaburst, Contact Form 7, Text Message
Text Domain: wpcf7_sms
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 1.5.1

Works with the Contact Form 7 plugin to send SMS notifications when somebody 
submits your contact form. 

== Description ==

Adds an SMS box to your contact form settings page, fill this in and you'll 
get a text message each time somebody fills out one of your forms.

You need a [Mediaburst SMS API Account](http://www.mediaburst.co.uk/api/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms) and some SMS 
credits to use this plugin.

= Requires =

* Wordpress 3 or higher

* [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/) 2.4 or higher

* A [Mediaburst SMS API Account](http://www.mediaburst.co.uk/api/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms)

== Installation ==

1. Upload the 'contact-form-7-sms-addon' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Setup you SMS options for each form

== Frequently Asked Questions ==

= What is a Mediaburst username and password? = 

To send SMS you will need to sign up for a [Mediaburst SMS API Account](http://www.mediaburst.co.uk/api/?utm_source=wordpress&utm_medium=plugin&utm_campaign=contact-form-7-sms)
and purchase some SMS credits.  When you sign up you'll be given a username
and password to put in these boxes.

= Can I send to multiple mobile numbers? =

Yes, separate each mobile number with a comma.

= What format should the mobile number be in? =

All mobile numbers should be entered in international format without a 
leading + symbol or international dialing prefix.  

For example a UK number should be entered 447123456789, and a Republic 
of Ireland number would be entered 353870123456.

= Can I test my settings? = 

On the settings page click the Test button just below your username and
password.  This will send a text message to the configured mobile number(s)
using the username and password you entered.

== Screenshots ==

1. SMS box added to the Contact Form 7 page

2. SMS settings in detail

== Changelog ==

= 1.5.1 = 
* Further tweaks for SSL compatability on servers with missing CA bundles

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

Install this version if you have updated Contact Form 7 to version 3.1. It
fixes an issue with merged fields.
