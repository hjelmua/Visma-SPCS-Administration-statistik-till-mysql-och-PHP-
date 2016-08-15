# Visma SPCS Administration statistik till mysql och PHP

Vi behövde en snabbare databasmotor för att få ut statistik och speciella rapporter ur Visma SPCS Administration. 
Vi vill också använda vanliga språk som PHP för att få ut resultatet. 
Det här projektet är till för detta. Hjälp gärna till och bygg funktioner...

#1. Skapa databasen SPCS
#2. Skapa en användare med rättigheterna (SELECT, UPDATE, INSERT, DELETE, ALTER, and CREATE) till databasen.
#3. Fyll i samma värden i filen data.php

# dbftomysql
Nu finns dbftomysql med i paketet. OBS! glöm ej att fylla i $from_encoding="iso-8859-1"; 

(Alternativt installera med apt-get på debian med flera)


Kopiera filerna ARTGRP.DBF, ARTGRP.DBF, ARTRAD.DBF och KUND.DBF till valfri katalog på servern (fyll platsen på i katalogen i filen config.php.sample i katalogen DBFToMySQL och byt sedan namn på filen till config.php.

$db_uname = 'username';

$db_passwd = 'password';

$db_name = 'database';

$db_host = 'localhost';

$xbase_dir = '/home/user/path/to/dbf/files';

$die_on_mysql_error = false; // when investigating errors, set this to true

$from_encoding="iso-8859-1"; //Encoding of database, e.g. CP866 or empty, if convert is not required

Kör "php dbf-import.php"


#Alternativt om man använder apt-get för att installera dbf2mysql
dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ARTGRP -c -f ./ARTGRP.DBF

dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ART -c -f ./ARTGRP.DBF

dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ARTRAD -c -f ./ARTRAD.DBF

sedan (man får importera om ARTRAD när statistiken ska köras och där också indexera filen)

# skapa index (oavsett metod ovan) 
mysql -u myusername -p SPCS
ALTER TABLE ARTRAD ADD INDEX index_dat (dat);

ALTER TABLE ARTRAD ADD INDEX index_typ (typ);

ALTER TABLE ARTRAD ADD INDEX index_kredit_fl (kredit_fl);

ALTER TABLE ARTRAD ADD INDEX index_artnr (artnr);

ALTER TABLE KUND ADD INDEX index_postnr (postnr);
exit;

#Lägg till tabellen SE som ligger i katalogen mysqldb 
Innehållet i filen kommer från www.geonames.org. Jag har modifierat länskoderna för att passa detta tex är AB ändrat till SE-AB (för Stockholm)

# lite om att kopiera filer från Windows till Linux
1. Installera ett par bibliotek

apt-get install samba-client samba-common

apt-get install cifs-utils

Skapa en katalog tex: mkdir -p /mnt/win

Mount disk genom följande:

smbclient //maskinensipnummer/SPCS_Administration -U dinwindowsanvändare

mount -t cifs -o username=dinwindowsanvändare,password=dinwindowsanvändareslösenord //maskinensipnummer/SPCS_Administration /mnt/win

kolla att det funkar: ls /mnt/win
gå till rätt företag tex: cd /mnt/win/Före*/FTG1

kopiera filerna till din hemkatalog:

cp ARTGRP.DBF /home/mittnamn/ARTGRP.DBF

cp ARTRAD.DBF /home/mittnamn/ARTRAD.DBF (brukar ta någon minut om filen är stor)

cp ART.DBF /home/mittnamn/ART.DBF

# vi använder AdminLTE för att köra bootstrap
https://github.com/almasaeed2010/AdminLTE/tree/be11566d9539370b196ac85f22a6baf9f42c87cb

##Screenshots
________

![Startpage](screenshot.jpg?raw=true "The start page")
