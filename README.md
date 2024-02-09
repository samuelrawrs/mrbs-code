# REP Meeting Room Booking System (MRBS)

1. [Install](#Install)
2. [Background](#Background)



# Install
Honestly, I'm just going to follow the [install](INSTALL) page and update this readme with special information specific to this repository.

# Background
## RIP booking website (?-2023)
I chanced upon this framework when our poor REP north hill room booking website (http://nhrprbooking.epizy.com/) went down on 27th September 2023, possibly due to the free hosting server disappearing :cry:

Now my background is mechanical engineering and some robotics software coding (python, linux, occasional cpp). I had 0 knowledge of web-hosting, databases, hashing and salting of passwords, etc... but I really enjoy solving random problems! So my priority at the start was clear - this isn't really a time to learn and do things "properly", but rather just a quick and dirty attempt at getting the site back up, functioning again. Hence, with the help of chatgpt and some googling, I learnt that I had to find a new hosting site that'll eventually hold the php files, the database, as well as providing the domain name.

I tried many sussy websites such as byet.host, 000webhost.com. Both of which actually kind of worked albeit the terrible UIs and slow interfaces. However, upon testing the website, I noticed that the sites would crash due to the number of queries per hour being exceeded. I eventually found infinityfree.com which turned out to be quite okay. Note that throughout this whole time, I relied solely on the file manager and editor on that website and had to test my changes slowly and remotely.

By the time I had finished setting up the website, I realised there was another problem - getting the list of emails and names and importing it to the website database. I seeked help from the original creator of this (Caleb Mah) but I was told that it was manually done for each batch. Thus began the long and questionable process of scraping emails and names from the NTU outlook directory.

After a while of fixing bugs, adding rooms and renaming a bunch of things, the website seemed to function. It was by no means perfect and had a ton of features which I hadn't explored yet (such as password resetting and setting restrictions on bookings). BUT it was done and had already taken up more than 2 days, so I just left it up and didn't take a look at it again.

## It died again???

On 8th February 2024, the website was down. I woke up in the morning and was all ready to book a room and was shocked to see `404 Access Denied` when I loaded up the website.

I went to check out the file manager and realised that all my files were gone. I hadn't had a backup either because I had been putting off uploading the code on github.

So that's where we are now - but this time, I want to (try to) do things the right way. I've loaded phpstorm on my linux system and I'm testing out this code on my local apache server. Most importantly, I'm committing to github for the sake of juniors probably :') Hopefully this goes well.






