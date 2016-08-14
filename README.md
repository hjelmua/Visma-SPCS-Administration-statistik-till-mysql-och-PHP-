# Visma SPCS Administration statistik till mysql och PHP

Vi behövde en snabbare databasmotor för att få ut statistik och speciella rapporter ur Visma SPCS Administration. 
Vi vill också använda vanliga språk som PHP för att få ut resultatet. 
Det här projektet är till för detta. Hjälp gärna till och bygg funktioner...

#1. Skapa databasen SPCS
#2. Skapa en användare med rättigheterna (SELECT, UPDATE, INSERT, DELETE, ALTER, and CREATE) till databasen.
#3. Fyll i värden i filen data.php

# dbftomysql
Nu finns dbftomysql med i paketet glöm ej att skriva $from_encoding="iso-8859-1"; 

Alternativt installera apt-get
För att flytta dbf databasen behöver använder vi dbf2mysql. Den finns tex på Debian för enkel "apt-get install dbf2mysql".

Kopiera filerna ARTGRP.DBF, ARTGRP.DBF, ARTRAD.DBF till valfri katalog på servern som har dbf2mysql

dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ARTGRP -c -f ./ARTGRP.DBF

dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ART -c -f ./ARTGRP.DBF

dbf2mysql -h localhost -U myusername -P mypassword -d SPCS -t ARTRAD -c -f ./ARTRAD.DBF

sedan (man får importera om ARTRAD när statistiken ska köras och där också indexera filen)

mysql -u myusername -p SPCS
ALTER TABLE ARTRAD ADD INDEX index_dat (dat);

ALTER TABLE ARTRAD ADD INDEX index_typ (typ);

ALTER TABLE ARTRAD ADD INDEX index_kredit_fl (kredit_fl);

ALTER TABLE ARTRAD ADD INDEX index_artnr (artnr);

exit;

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
