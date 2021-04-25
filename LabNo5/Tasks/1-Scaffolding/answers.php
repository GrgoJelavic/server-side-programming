<?php

/*

2. Objasniti ulogu mapa model, view i control u na ovaj način
definiranoj strukturi projekta, te datoteka koje te mape sadrže.

MODEL predstavlja osnovnu poslovnu logiku i podatke. Sastoji od poslovnih podataka, poslovnih pravila, logike i funkcija ugrađenih u programsku logiku.
ULOGA MODELA je rad s podacima, odnosno komunikacija s bazom podataka, dodatna obrada dobivenih podataka, ukoliko je potrebno, te u konačnici vraćanje rezultata prema kontroleru

VIEW za ulogu ima pretvaranje jednog modela ili više modela u vizualnu reprezentaciju

CONTROLER kontrolira logiku aplikacije i djeluje kao koordinator između prikaza i modela. Kontroleri primaju ulazne informacije od korisnika putem prikaza, zatim komuniciraju sa modelom radi izvršavanja određenih operacija i prosljeđuju rezultate natrag prikazu

MODEL sadrzi datoteku MySQLiDatabase.class koja radi implementaciju sa bazom podataka, odnosno povezivanje s MYSQL serverom, odabir ili kreiranje baze i slanje upita 

VIEW sadrzi datoteku index.tpl.php koja radi implementaciju jednog ili vise modela u vizualnu reprezentaciju

CONTROL sadrzi datoteku IndexPage.class.php koja koordinira i kontrolira implementaciju poslovne logike, odnosno prima informacije od korisnika putem vizualnog prikaza, komunicira sa modelom radi izvrsenja pojedinih operacije te presljeduje rezulate u view


3. Objasni ulogu datoteke RequestHandler.class.php.

RequestHandler.class.php. je klasa za procesuiranje korisnickih zahtjeva tj. Request Handler upravlja zahtjevima na razini aplikacije, odnosno na osnovu korisnickog zahtjeva se generira neki response tj. odgovor na zahtjev, koji u pravilu nije namijenjen izravnoj upotrebi


4. Objasni ulogu datoteke .htaccess.

.htaccess je konfiguracijski file koji kontrolira kako webserver odgovara na razlicite zahtjeve odnosno request-ove. Koristi se pri preusmjeravanju stranica, zastite lozinki te prikazivanje error stranica 


5. Pojasni kako se i gdje vrši instanciranje aplikacije iz primjera.

Instanciranje aplikacije se izvrsava u trenutku pozivanja Index.php file-a, a proces se izvrsava na strani posluzitelja


6. Pojasni gdje se vrši instanciranje MySQLiDatabase klase? Zašto?

Instanciranje MySQLiDatabase klase vrši se u datoteci AppCore.class.php

*/
