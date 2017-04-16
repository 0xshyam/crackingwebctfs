# Cracking Web CTFs
Riyaz Walikar | @riyazwalikar | ibreak.software




## Pre requisites
- Knowledge of the OWASP Top 10
- Curiosity and thirst to learn
- Willingness to fail and be OK with it
- Smart Googling skills


## Mindset?

<ul align="left">
<li class="fragment">Web CTFs = Simple UI + Few input params + Logic + Security skills</li>
<li class="fragment">Know your tools and your scripting languages</li>
<li class="fragment">Read, understand and learn from other CTF writeups (References at the end)</li>
<li class="fragment">Be patient. Be curious.</li>
<li class="fragment">Practice. Practice. Practice.</li>
<li class="fragment">Make your basics strong</li> 
<li class="fragment">Failure is fabulous!</li>
</ul>


## Approach?

I call them the 3 rules of Web CTFs


### Rule 1
Master your tools and stick to the basics.

<ul align="left">
<li class="fragment">Use an interception proxy</li>
<li class="fragment">Use a browser that supports addons and has a developer console</li>
<li class="fragment">Use scripting/automation where possible</li>
<li class="fragment">Google as much as you can. Google smart, don't Google hard</li>
<li class="fragment">Follow basic testing principles. Think A1, A2, A4, A5, A6 and A7</li>
</ul>
 


### Rule 2
Get familiar with encoding, hashing and encryption.

<ul align="left">
<li class="fragment">Understand and learn how to identify binary, hex, ascii, base64, base32, rot13, md5, sha128, sha256, bcrypt, wordpress, mysql, LM/NTLM, Unix Shadow</li>
<li class="fragment">Understand and learn how to encode/decode between binary, hex, ascii, base64, base32, rot13</li>
<li class="fragment">Learn how to use openssl to encrypt decrypt strings when a key is provided</li>
<li class="fragment">Collect wordlists to brute force hashes and user accounts</li>
</ul>


### Rule 3
Test every parameter.

<ul align="left">
<li class="fragment">Check GET, POST, cookies and Request/Response HEADERS</li>
<li class="fragment">Params will ideally not exceed 5 in number</li>
<li class="fragment">Inject single quotes, double quotes, tags etc</li>
<li class="fragment">Lookout for security misconfigurations and data leaks</li>
</ul>



### How to begin?
+ Access the page using a curl request
+ spider the page to find all js, css and html pages
+ view source to look for comments, file/dir names
+ robots.txt
+ Run dirbuster to find hidden directories and files
+ Run nmap --script=http-enum
+ Use Google/scripting/Burp to work with data that you find



## Let's Capture some flags!
http://ctf-server-ip/level1/



## Ending notes
- Practice. Practice. Practice.
- Collaborate, form teams and participate in international CTFs
- Bury your ego, shyness and fears and focus on learning
- Failure is fabulous!



## References
- <https://docs.python.org/2.4/lib/standard-encodings.html>
- <https://ctftime.org/>
- <https://writeups.easyctf.com/>
- <https://www.reddit.com/r/securityCTF/>
- <https://github.com/ctfs/write-ups-2017>