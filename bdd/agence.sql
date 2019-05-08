drop database voyage;

create database voyage;

use voyage;

create table administrateur (
	id int primary key,
	login varchar(30),
	mdp varchar(30),
	nom varchar(30)
);

create table client (
	login varchar(30) primary key,
	mdp varchar(30),
	nom varchar(30),
	contact varchar(20)
);

create table categorie (
	id int primary key,
	nom varchar(30)
);

create table chauffeur (
	id int primary key,
	nom varchar(30),
	contact varchar(20),
	img varchar(100)
);

create table circuit (
	id int primary key,
	nom varchar(100),
	durree int,
	prix int,
	img varchar(100),
	latitude float,
	longitude float
);


create table sitetouristique(
	id int primary key,
	nom varchar(30),
	img varchar(100),
	description varchar(200)
);

-- create table hotel (
	-- id int primary key,
	-- nom varchar(30),
	-- img varchar(100)
-- );

create table reservationcircuit (
	id int primary key,
	idclient varchar(30),
	idcircuit int,
	nbpersonne int,
	datedepart varchar(20),
	foreign key (idclient) references client(login),
	foreign key (idcircuit) references circuit(id)
);

create table reservationvoyage (
	id int primary key,
	idclient int,
	idsite int,
	dateallee varchar(14),
	dateretour varchar(14),
	foreign key (idclient) references client(idclient),
	foreign key (idsite) references sitetouristique(idclient)
);

insert into administrateur values(1, 'Test', 'test', 'Test');
insert into administrateur values(2, 'Za', 'za', 'Joh');
insert into administrateur values(3, 'Lery', 'lery', 'Harf');
insert into administrateur values(4, 'Tazy', 'tazy', 'Heggy');

insert into client values('Test1', 'test', 'Rakoto', '034 00 000 00');
insert into client values('Test2', 'test', 'Rabe', '034 11 111 11');
insert into client values('Test3', 'test', 'Raseta', '034 22 222 22');
insert into client values('Test4', 'test', 'Ralava', '034 33 333 33');
insert into client values('Test5', 'test', 'Raly', '034 44 444 44');
insert into client values('Test6', 'test', 'Rajoh', '034 55 555 55');
insert into client values('Test7', 'test', 'Raharf', '034 66 666 66');
insert into client values('Test8', 'test', 'Raheggy', '034 77 777 77');
insert into client values('Test9', 'test', 'Rambo', '034 88 888 88');
insert into client values('Test10', 'test', 'Ramanavy', '034 99 999 99');

insert into categorie values(1, 'Hotel');
insert into categorie values(2, 'Circuit');

insert into chauffeur values(1, 'Zily', '034 10 101 01', 'chauf_1.png');
insert into chauffeur values(2, 'Zefq', '034 20 202 02', 'chauf_2.png');
insert into chauffeur values(3, 'Zandry', '034 30 303 03', 'chauf_3.png');
insert into chauffeur values(4, 'Zama', '034 40 404 04', 'chauf_4.png');
insert into chauffeur values(5, 'Zano', '034 50 505 05', 'chauf_5.png');
insert into chauffeur values(6, 'Za', '034 60 606 06', 'chauf_6.png');
insert into chauffeur values(7, 'Zyta', '034 70 707 07', 'chauf_7.png');
insert into chauffeur values(8, 'Zean', '034 80 808 08', 'chauf_8.png');
insert into chauffeur values(9, 'Zoo', '034 90 909 09', 'chauf_9.png');



insert into circuit values(1, 'ANDASIBE ET SAINTE MARIE', '10','5780','39',-16.894338, 49.905920);
insert into circuit values(2, 'DESCENTE DE LA TSIRIBIHINA EN PIROGUE TRADITIONNELLE', '10','2790','40',-19.686008, 44.542260);
insert into circuit values(3, 'DESCENTE DU FLEUVE MANAMBOLO', '10','3408','41',-18.432772, 44.719095);
insert into circuit values(4, 'DESCENTE TSIRIBIHINA ET TSINGY', '10','7780','10',-19.686008, 44.542260);
insert into circuit values(5, 'IFATY ET NOSY BE', '10','7000','30',-23.125866, 43.607992);
insert into circuit values(6, 'DIEGO SUAREZ et ses ENVIRONS', '10','2680','35',-12.272992, 49.291791);
insert into circuit values(7, 'RANDONNEE AMBOSITRA', '10','1780','20',-20.527104, 47.244840);
insert into circuit values(8, 'RANDONNEE ANDRINGITRA et RANOMAFANA', '10','8780','22',-21.320142, 47.396071);
insert into circuit values(9, 'RANDONNEE ANDRINGITRA', '10','1790','24',-22.199880, 46.889957);
insert into circuit values(10, 'TRAIN POUR MANAKARA', '10','3000','25',-22.139876, 48.013453);

insert into circuit values(11, 'ANDASIBE ET TSINGY DE BEMARAHA', '20','7002','23',-18.897650, 44.829531);
insert into circuit values(12, 'ANKANIN’NY NOFY ET SAINTE MARIE', '20','4000','46',-16.894338, 49.905920);
insert into circuit values(13, 'DESCENTE TSIRIBIHINA COMBINEE AVEC LE SUD', '20','5000','22',-19.686008, 44.542260);
insert into circuit values(14, 'BOUCLE', '20','3060','32',-20.527104, 47.244840);
insert into circuit values(15, 'TSIRIBIHINA EN PIROGUE TRADITIONNELLE ET RANDONNEE A ANDRINGITRA', '20','3000','43',-19.686008, 44.542260);
insert into circuit values(16, 'DESCENTE DU FLEUVE MANAMBOLO ET LA PARTIE EST', '20','5900','26',-18.432772, 44.719095);
insert into circuit values(17, 'MAHAJANGA', '20','6000','28',-15.727956, 46.304386);
insert into circuit values(18, 'NORD ET SUD', '20','2040','44',-23.692823, 47.075147);
insert into circuit values(19, 'REMONTEE DE LA PARTIE SUD', '20','3045','38',-23.350751, 43.672224);

insert into circuit values(20, 'BOUCLE ET AMPEFY', '22','1290','45',-19.040807, 46.736607);
insert into circuit values(21, 'GRANDE BOUCLE JUSQU’A FORT DAUPHIN', '25','4059','12',-25.033322, 46.990360);
insert into circuit values(22, 'ANDRINGITRA jusqu’à MAJUNGA', '24','8956','13',-15.727956, 46.304386);
insert into circuit values(23, 'D’IFATY à DIEGO SUAREZ', '23','4509','14',-23.125866, 43.607992);
insert into circuit values(24, 'PARTIE SUD COMBINÉE AVEC LA PARTIE EST', '21','5069','15',-23.345713, 43.669988);
insert into circuit values(25, 'REMONTEE DU FLEUVE TSIRIBIHINA ET LA PARTIE SUD', '23','4039','16',-19.686008, 44.542260);

insert into reservationcircuit values(1, 'Test1', 1, 4, '05/07/18');
insert into reservationcircuit values(2, 'Test1', 3, 1, '05/07/18');
insert into reservationcircuit values(3, 'Test2', 2, 5, '05/07/18');
insert into reservationcircuit values(4, 'Test1', 2, 5, '05/07/18');
insert into reservationcircuit values(5, 'Test2', 2, 5, '05/07/18');
insert into reservationcircuit values(6, 'Test3', 4, 5, '05/07/18');
insert into reservationcircuit values(7, 'Test5', 2, 5, '05/07/18');
insert into reservationcircuit values(8, 'Test6', 4, 5, '05/07/18');
insert into reservationcircuit values(9, 'Test7', 6, 5, '05/07/18');
insert into reservationcircuit values(10, 'Test8', 8, 5, '05/07/18');
insert into reservationcircuit values(11, 'Test8', 9, 5, '05/07/18');
insert into reservationcircuit values(12, 'Test9', 9, 5, '05/07/18');
insert into reservationcircuit values(13, 'Test10', 9, 5, '05/07/18');
insert into reservationcircuit values(14, 'Test10', 9, 5, '05/07/18');
insert into reservationcircuit values(15, 'Test8', 21, 5, '05/07/18');


insert into hotel values(1, 'Joh HOTEL','2');
insert into hotel values(2, 'AL HOTEL','3');
insert into hotel values(3, 'Heggy HOTEL','4');
insert into hotel values(4, 'V HOTEL','5');
insert into hotel values(5, 'AC HOTEL','6');
insert into hotel values(6, 'L HOTEL','7');
insert into hotel values(7, 'Mangah HOTEL','8');
 
-- INSERT INTO Circuit VALUES(26, '', '');
