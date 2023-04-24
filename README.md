# LowerThirds-USPORTS

Easy to use lower thirds overlay for USPORTS Track and Field events.

1. Simply add the contents of htdocs into htdocs in your local MAMP instance.
2. Update mysqli connect with your settings in backend.php and rt-update.php
3. Load localhost/PHPMyAdmin5/ and navigate to the import tab. Load [usports_track.sql](usports_track.sql) as the file which will set up the database structure
4. Convert your HY-Tek data using the same format/columns as the SQL database.

![](/screenshot.png)

You can save this is as a CSV file and then upload that information into PHPMyAdmin. Any entries in columns for field events will show that athlete on the backend.php page when switching between events. Gender 0 = Female, Gender 1 = Male. School short codes can be found in [shortcodes.txt](shortcodes.txt)

# Operating
Load localhost/backend.php (or **IPADDRESS**/backend.php if using a remote computer) when you want to change the current athlete.

If you want it to update faster than every two seconds, change line 183 in [htdocs/rt-update.php](htdocs/rt-update.php) from 2 to 1. (This is how many seconds between update checks)

# OBS Settings
>Grab these when back in the office
