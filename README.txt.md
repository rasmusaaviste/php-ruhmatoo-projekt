RepairHistory

! [alt tag] (https://www.upload.ee/image/6527365/esileht.png)

CREATE TABLE repairUsers(id INT NOT NULL PRIMARY KEY, email VARCHAR(50), password VARCHAR(128), firstname TEXT, lastname TEXT, deleted DATETIME);

CREATE TABLE repairCars(id INT NOT NULL PRIMARY KEY, UserId INT, RegPlate VARCHAR(10), Mark VARCHAR(20), Model VARCHAR(20), deleted DATE, FOREIGN KEY(UserId) REFERENCES repairUsers(id));

CREATE TABLE repairWork(id INT NOT NULL PRIMARY KEY, carId INT, Mileage INT, DoneJob VARCHAR(150), JobCost INT, Comment MEDIUMTEXT, deleted DATETIME, userId INT, FOREIGN KEY(carId) 
REFERENCES repairCars(id), FOREIGN KEY(userId) REFERENCES repairUsers(id));

Eesm�rgiks seadsime endale tuua inimestele s�idukite ajaloo silme ette. N�iteks kui kellelgi on soov minna ostma autot, siis saab ta meie lehele sisestada s�iduki numbrim�rgi ning seej�rel vaadata mida on masinal remonditud ning mis v��rtuses on see tehtud. Kasutajad saavad lihtsasti lisada tehtud t�id ning hoida meeles mida on tehtud.

Sihtr�hmaks on peamiselt s�idukiomanikud ning samuti ka inimesed, kes hakkavad omale s�idukit soetama. Samalaadseid rakedusi meie ei leidnud internetist.

Funktsionaalsuse loetelu:
�	v0.1 Saab luua kasutaja ning sisselogida
�	v0.2 Saab otsida/lisada s�idukeid
�	v0.3 Saab lisada tehtud remondit�id, l�bis�itu jne

Andmebaasi skeem
! [alt tag] (https://www.upload.ee/image/6527367/skeem.png)

Kokkuv�te
Ats � �ppisin juurde esmalt, kuidas t��d jaotada ning arvestada sellega, kui tuleb t��d teha kellegagi koos. Alguses oli k�ige raskem tehtud t��d teisele edastada kasutades putty-t, kuid l�puks sai seegi selgeks. 
Rasmus � K�ige arendavam ja samuti ka keerulisem tegevus oli kodus �ksinda koodi kirjutamine ja probleemidele lahenduste otsimine. Kindlasti oskan vastavatele erroritele n��d palju paremini lahendust leida ja kellegagi paaris t��d paremini jaotada. 
