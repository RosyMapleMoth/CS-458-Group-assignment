DECLARE 
BEGIN
    insert_new_biz('Frankies NY Bagels', 'edwoods Acres 3750 Harris St',
                  'Eureka','CA','Eatery','(707) 599-3305','unknown');
    insert_new_biz('Arcata Scoop', '1068 I Street',
                  'Arcata,','CA','Eatery','(707) 845-9230','unknown');
    insert_new_biz('Brio Baking Incorporated', '791 G Street',
                  'Arcata','CA','Eatery','(707) 822-5922','unknown');
    insert_new_biz('Brett Shuler Fine Catering', '936 11th Street',
                  'Arcata','CA','Eatery','(707) 822-4221','unknown');
    insert_new_biz('Bear River Casino', '11 Bear Paws Way',
                  'Loleta','CA','Eatery','(707) 733-9644','unknown');
    insert_new_biz('Wrangletown Cider', '1350 9th St',
                  'Arcata','CA','Eatery','(707) 441-9999','unknown');
    insert_new_biz('The Big Blue Cafe', '846 G Street',
                  'Arcata','CA','Eatery','(707) 508-5175','unknown'); 
    insert_new_biz('Los Bagels', '1085 I Street #101',
                  'Arcata','CA','Eatery','707.822.3483 X 307','unknown');
    insert_new_biz('Cafe Phoenix', '1360 G Street',
                  'Arcata','CA','Eatery','(707) 630-5021','unknown');
    insert_new_biz('Alibi', '744 Ninth Street',
                  'Arcata','CA','Eatery','(707) 822-3731','unknown');
    insert_new_biz('Moonstone Crossing Winery', '1000 Moonstone Cross Road',
                  'Trinidad','CA','Eatery','(707) 677-3832','unknown');
    insert_new_biz('Humboldt Brews LLC', '856 Tenth Street',
                  'Loleta','CA','Eatery','(707) 826-2739','unknown');
    insert_new_biz('Desserts On Us', '57 Belle Falor Court',
                  'Arcata','CA','Eatery','(707) 822-0160','unknown');
    insert_new_biz('Becks Bakery', '100 Ericson Court Suite 100C',
                  'Eureka','CA','Eatery','(707) 840-8004','unknown');  
END; 
/

/*insert into Biz_prof
	values
	(666,'Arcata Scoop', '1068 I Street',
                  'Arcata,','CA','Eatery','y','7078459230', null, null, '');
*/
/* insert into Biz_prof
	values
	(new_id, new_name, new_street_add, new_city, new_state, new_type, new_active, new_phone, null, null, new_liasion); */