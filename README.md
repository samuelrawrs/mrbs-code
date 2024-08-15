# REP Meeting Room Booking System (MRBS)

Here lies the source code and configurations for the REP meeting room booking system.
Website link here: http://rep.000.pe/.

1. [Adding New Users](#Adding-New-Users)
2. [Documentation (aka Ramblings)](#Documentation)
3. [History](#History)


# Adding New Users
Go to Outlook and look for "Renaissance Engineering" contact lists. Instructions found [here](https://www.uab.edu/medicine/pathology/images/forms-pdfs/PathIS/HOW_TO_EXPORT_A_DISTRIBUTION_LIST_IN_OUTLOOK_TO_EXCEL.pdf) are extremely useful for exporting the distribution list to add to the mrbs_users database.


# Documentation
I'm just going to follow the [install](INSTALL) page and update this readme with special information specific to this repository.

## 1. Setting up Local Server Environment
I installed Apache, PHP and postgre-sql on my ubuntu 22.04 system and am using the phpstorm IDE to test the code.
There's a whole bunch of stuff on how to setup your local server which is a little complicated but the gist is figuring out your local directory root which should be something like `/var/www/` for ubuntu.

## 2. Downloading and Configuring MRBS
Download it or gitclone it and important things to change:
- Configure MRBS: Open the config.inc.php file within the MRBS directory. You'll need to edit this file to configure MRBS to connect to your Supabase database:
- Set the database type to PostgreSQL (pgsql).
Fill in the database connection details (host, database name, username, password) provided by Supabase. You can find these details in the "Settings" -> "Database" section of your Supabase project dashboard.
- Configure other MRBS settings as needed, following the comments and documentation within the config.inc.php file.

## 3. Setting up the Database
Use the SQL Editor in Supabase to run the MRBS database schema setup scripts. MRBS provides a specific SQL file for PostgreSQL (like tables.pg.sql), copy the contents and execute them in the Supabase SQL Editor to create the necessary tables and schema.

## 4. Importing data
Now I'm importing data from mysql to postgre and I keep getting hit with this error:
`Failed to import data: insert or update on table "mrbs_room" violates foreign key constraint "mrbs_room_area_id_fkey"
`
But I soon found out that this was because the tables were linked - meaning I had to transfer each table manually in a certain order (area first, followed by rooms, etc...) so that the relationships made sense.

`Failed to import data: invalid input syntax for type integer: "NULL"`

TIL that postgre is not a fan of NULL values which mysql is okay with. I just hid those columns and the imports worked fine.

## 5. Making it all look pretty
A feature request for the site was to bring back the floorplan into the website. I thought it was just embeding a simple png and copying the css that Caleb had written but boy was I wrong. The creators of MRBS had re-written the `index.php` file, leading to the html elements being generated differently. Furthermore, the fix that looks good on web on laptops become ugly when on mobile. Urgh. Not me at 4:28am on CNY day trying to fix this blehhh.

## 6. Help me please
Turns out, infinityfree.com (free plan) is not cool with 1. remote databases 2. postgresql databases. Enter another day of trying to deploy this on vercel using vercel-php and failing horribly.

## 7. I'm tired
What eventually worked out was reverting back to the mysql database on the infinityfree.com website, noticing the subtle name change in the database hostname url (probably meaning their servers messed up quietly).
All I had to do was link up the "new" database with the new hostname to the current code, zip it and unzip it into the file manager on infinityfree. I guess the only reason this wasn't a total waste of time was that I was able to add features to the codebase and documenting this whole process!
If anyone does read this README, thanks sm for journeying with me to this point LOL and if you have any questions do not hesitate to ask me anything.

# History
## RIP booking website (??? - 2023)
I chanced upon this framework when our poor REP north hill room booking website (http://nhrprbooking.epizy.com/) went down on 27th September 2023, possibly due to the free hosting server disappearing :cry:

Now my background is mechanical engineering and some robotics software coding (python, linux, occasional cpp). I had 0 knowledge of web-hosting, databases, hashing and salting of passwords, etc... but I really enjoy solving random problems! So my priority at the start was clear - this isn't really a time to learn and do things "properly", but rather just a quick and dirty attempt at getting the site back up, functioning again. Hence, with the help of chatgpt and some googling, I learnt that I had to find a new hosting site that'll eventually hold the php files, the database, as well as providing the domain name.

I tried many sussy websites such as byet.host, 000webhost.com. Both of which actually kind of worked albeit the terrible UIs and slow interfaces. However, upon testing the website, I noticed that the sites would crash due to the number of queries per hour being exceeded. I eventually found infinityfree.com which turned out to be quite okay. Note that throughout this whole time, I relied solely on the file manager and editor on that website and had to test my changes slowly and remotely.

By the time I had finished setting up the website, I realised there was another problem - getting the list of emails and names and importing it to the website database. I seeked help from the original creator of this (Caleb Mah) but I was told that it was manually done for each batch. Thus began the long and questionable process of scraping emails and names from the NTU outlook directory.

After a while of fixing bugs, adding rooms and renaming a bunch of things, the website seemed to function. It was by no means perfect and had a ton of features which I hadn't explored yet (such as password resetting and setting restrictions on bookings). BUT it was done and had already taken up more than 2 days, so I just left it up and didn't take a look at it again.

## It died again (08/02/2024)

On 8th February 2024, the website was down. I woke up in the morning and was all ready to book a room and was shocked to see `404 Access Denied` when I loaded up the website.

I went to check out the file manager and realised that all my files were gone. I hadn't had a backup either because I had been putting off uploading the code on github.

So that's where we are now - but this time, I want to (try to) do things the right way. I've loaded phpstorm on my linux system and I'm testing out this code on my local apache server. Most importantly, I'm committing to github for the sake of juniors probably :') Hopefully this goes well.

## Slow loading times (28/04/2024)

It's 2 days before my finals and I was procrastinating when I noticed the rep booking website taking AGES to load... possibly because everyone's tryna book rooms now.... might need to migrate to altervista.org instead hmmm.

## It's not down...yet (2024 - ???)

## 13.02.2024 Patchnotes (?)
1. Added north hill floorplan into website
2. Updated help page with rules
3. Password resetting works now under "Users" tab, clicking <your name>
4. Able to view all bookings under "<your name> tab"
5. Re-added created-by into calendar view
6. Re-added auto-fill of participants in entry

## Future Ideas
1. Using Vercel to host instead
2. Making a Telegram bot to faciliate the booking of rooms



