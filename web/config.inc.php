<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

use IntlDateFormatter;

require_once 'lib/autoload.inc';

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/

// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Asia/Singapore";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
//$db_port = 5432;
// Database name:
$db_database = "";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "";
// Database login password:
$db_password = "";
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.
$db_persist = false;




/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

$mrbs_company = "North Hill REP";


// General settings
// If you want only administrators to be able to make and delete bookings,
// set this variable to TRUE
$auth['only_admin_can_book'] = FALSE;
// If you want only administrators to be able to make repeat bookings,
// set this variable to TRUE
$auth['only_admin_can_book_repeat'] = TRUE;
// If you want only administrators to be able to make bookings spanning
// more than one day, set this variable to TRUE.
$auth['only_admin_can_book_multiday'] = FALSE;
// If you want only administrators to be able to select multiple rooms
// on the booking form then set this to TRUE.  (It doesn't stop ordinary users
// making separate bookings for the same time slot, but it does slow them down).
$auth['only_admin_can_select_multiroom'] = TRUE;
// If you don't want ordinary users to be able to see the other users'
// details then set this to TRUE.  (Only relevant when using 'db' authentication]
$auth['only_admin_can_see_other_users'] = TRUE;
// If you want to prevent the public (ie un-logged in users) from
// being able to view bookings, set this variable to TRUE
$auth['deny_public_access'] = FALSE;
// Set to TRUE if you want admins to be able to perform bulk deletions
// on the Report page.  (It also only shows up if JavaScript is enabled)
$auth['show_bulk_delete'] = FALSE;

$mrbs_admin = "Samuel Ang";
$mrbs_admin_email = "sang035@e.ntu.edu.sg";
$auth['allow_local_part_email'] = true;

// Default description for new bookings
// Didnt work, changed edit_entry.php instead
//$default_description = $user;

// Use the $custom_css_url to override the standard MRBS CSS.
$custom_css_url = 'css/custom.css';

// Set a maximum duration for bookings
$max_duration_enabled = TRUE; // Set to TRUE if you want to enforce a maximum duration
$max_duration_secs = 60*60*2;  // (seconds) - when using "times"

$max_per_interval_global_enabled['week']   = TRUE;
$max_per_interval_global['week'] = 10;     // max 10 bookings per week in total

$is_mandatory_field['entry.description'] = TRUE;
//TODO: make bookings only be made on the sunday before the coming week


// The default settings below (along with the 30 minute resolution above)
// give you 24 half-hourly slots starting at 07:00, with the last slot
// being 18:30 -> 19:00

// The beginning of the first slot of the day (DEFAULT VALUES FOR NEW AREAS)
$morningstarts         = 0;   // must be integer in range 0-23
$morningstarts_minutes = 0;   // must be integer in range 0-59

// The beginning of the last slot of the day (DEFAULT VALUES FOR NEW AREAS)
$eveningends           = 23;  // must be integer in range 0-23
$eveningends_minutes   = 30;   // must be integer in range 0-59

// To display the mini calendars at the bottom of the day week and month views
// set this value to TRUE
$display_calendar_bottom = FALSE;

// 'auth_db' configuration settings
// The highest level of access (0=none; 1=user; 2+=admin).    Used in edit_users.php
// In the future we might want a higher level of granularity, eg to distinguish between
// different levels of admin
$max_level = 2;
// The lowest level of admin allowed to edit other users
$min_user_viewing_level = 2;
// The lowest level of admin allowed to edit other users
$min_user_editing_level = 2;;

// $auth["type"] = "imap_php";
// $auth["imap_php"]["hostname"] = "outlook.office365.com";
// $auth["imap_php"]["port"] = 993;
// $auth["imap_php"]["ssl"] = TRUE;

$auth["session"] = "php"; // How to get and keep the user ID. One of
// "http" "php" "cookie" "ip" "host" "nt" "omni"
// "remote_user"

//$auth["type"] = "db"; // How to validate the user/password. One of "none"
// "config" "db" "db_ext" "pop3" "imap" "ldap" "nis"
// "nw" "ext".

// 'auth_imap' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the IMAP server
//$imap_host = "imap-mail.outlook.com";
// The IMAP server port
//$imap_port = "993";

// 'auth_imap_php' configuration settings
//$auth["imap_php"]["hostname"] = "localhost";
// You can also specify any of the following options:
//$auth["imap_php"]["port"] = 993;
// Specifies the port number to connect to
// Use SSL
//$auth["imap_php"]["ssl"] = TRUE;
// Use TLS
//$auth["imap_php"]["tls"] = TRUE;
// Turn off SSL/TLS certificate validation
//$auth["imap_php"]["novalidate-cert"] = TRUE;

// 'auth_pop3' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the POP3 server
$pop3_host = "outlook.office365.com";
// The POP3 server port
$pop3_port = "995";

// This is to fix URL problems when using a proxy in the environment.
// If links inside MRBS appear broken, then specify here the URL of
// your MRBS root directory, as seen by the users. For example:
// $url_base =  "http://webtools.uab.ericsson.se/oam";
// It is also recommended that you set this if you intend to use email
// notifications, to ensure that the correct URL is displayed in the
// notification.
$url_base =  "http://rep.000.pe/";

// WHO TO EMAIL
// ------------
// The following settings determine who should be emailed when a booking is made,
// edited or deleted (though the latter two events depend on the "When" settings below).
// Set to TRUE or FALSE as required
// (Note:  the email addresses for the room and area administrators are set from the
// edit_area_room.php page in MRBS)
$mail_settings['admin_on_bookings']      = TRUE;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = FALSE;  // the area administrator
$mail_settings['room_admin_on_bookings'] = FALSE;  // the room administrator
$mail_settings['booker']                 = TRUE;  // the person making the booking
$mail_settings['book_admin_on_approval'] = FALSE;  // the booking administrator when booking approval is enabled
// (which is the MRBS admin, but this setting allows MRBS
// to be extended to have separate booking approvers)

// WHEN TO EMAIL
// -------------
// These settings determine when an email should be sent.
// Set to TRUE or FALSE as required
//
// (Note:  (a) the variables $mail_settings['admin_on_delete'] and
// $mail_settings['admin_all'], which were used in MRBS versions 1.4.5 and
// before are now deprecated.   They are still supported for reasons of backward
// compatibility, but they may be withdrawn in the future.  (b)  the default
// value of $mail_settings['on_new'] is TRUE for compatibility with MRBS 1.4.5
// and before, where there was no explicit config setting, but mails were always sent
// for new bookings if there was somebody to send them to)

$mail_settings['on_new']    = TRUE;   // when an entry is created
$mail_settings['on_change'] = TRUE;  // when an entry is changed
$mail_settings['on_delete'] = TRUE;  // when an entry is deleted

// WHAT TO EMAIL
// -------------
// These settings determine what should be included in the email
// Set to TRUE or FALSE as required
$mail_settings['details']   = TRUE; // Set to TRUE if you want full booking details;
// otherwise you just get a link to the entry
$mail_settings['html']      = TRUE; // Set to true if you want HTML mail
$mail_settings['icalendar'] = TRUE; // Set to TRUE to include iCalendar details
// which can be imported into a calendar.  (Note:
// iCalendar details will not be sent for areas
// that use periods as there isn't a mapping between
// periods and time of day, so the calendar would not
// be able to import the booking)

// HOW TO EMAIL - LANGUAGE
// -----------------------------------------

// Set the language used for emails (choose an available lang.* file).
$mail_settings['admin_lang'] = 'en';   // Default is 'en'.


// HOW TO EMAIL - ADDRESSES
// ------------------------
// The email addresses of the MRBS administrator are set in the config file, and
// those of the room and area administrators are set though the edit_area_room.php
// in MRBS.    But if you have set $mail_settings['booker'] above to TRUE, MRBS will
// need the email addresses of ordinary users.   If you are using the "db"
// authentication method then MRBS will be able to get them from the users table.  But
// if you are using any other authentication scheme then the following settings allow
// you to specify a domain name that will be appended to the username to produce a
// valid email address (eg "@domain.com").
//$mail_settings['domain'] = '';
// If you use $mail_settings['domain'] above and username returned by mrbs contains extra
// strings appended like domain name ('username.domain'), you need to provide
// this extra string here so that it will be removed from the username.
//$mail_settings['username_suffix'] = '';


// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp', 'sendmail' or 'qmail'. Default is 'mail'.
$mail_settings['admin_backend'] = 'mail';

// EMAIL - MISCELLANEOUS
// ---------------------

// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = "re.club.ntu@gmail.com";

// The address to be used for the ORGANIZER in an iCalendar event.   Do not make
// this email address the same as the admin email address or the recipients
// email address because on some mail systems, eg IBM Domino, the iCalendar email
// notification is silently discarded if the organizer's email address is the same
// as the recipient's.  On other systems you may get a "Meeting not found" message.
$mail_settings['organizer'] = '';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = '';

// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
$mail_settings['cc'] = '';

// Set to TRUE if you want the cc addresses to be appended to the to line.
// (Some email servers are configured not to send emails if the cc or bcc
// fields are set)
$mail_settings['treat_cc_as_to'] = FALSE;

// The filename to be used for iCalendar attachments.   Will always have the
// extension '.ics'
$mail_settings['ics_filename'] = "booking";

// Set this to TRUE if you want MRBS to output debug information when you are sending email.
// If you are not getting emails it can be helpful by telling you (a) whether the mail functions
// are being called in the first place (b) whether there are addresses to send email to and (c)
// the result of the mail sending operation.
$mail_settings['debug'] = FALSE;
// Where to send the debug output.  Can be 'browser' or 'log' (for the error_log)
$mail_settings['debug_output'] = 'log';

// Set this to TRUE if you do not want any email sent, whatever the rest of the settings.
// This is a global setting that will override anything else.   Useful when testing MRBS.
$mail_settings['disabled'] = FALSE;

// Vocab overrides
// ---------------

// You can override the text strings that appear in the lang.* files by setting
// $vocab_override[LANG][TOKEN] in your config file, where LANG is the language,
// for example 'en' and TOKEN is the key of the $vocab array.  For example to
// alter the string "Meeting Room Booking System" in English set
//
$vocab_override['en']['namebooker'] = "Purpose of booking";
$vocab_override['en']['fulldescription'] = "People involved:\n(Names of people\nand batch)";
$vocab_override['en']['type'] = "Internal/External to REP";
$vocab_override['en']['description'] = "People involved";
$vocab_override['en']['users.email'] = "NTU email address";
//
// Applying vocab overrides in the config file rather than editing the lang files
// mean that your changes will be preserved when you upgrade to the next version of
// MRBS and you won't have to re-edit the lang file.
