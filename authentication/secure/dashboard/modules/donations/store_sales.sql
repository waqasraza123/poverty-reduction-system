create database store_db;
use store_db;

create table store_sales (
item_code			int primary key auto_increment,
item_name			varchar(20),
item_path			varchar(120),
item_price			float,
item_description	varchar(150),
sale				int,
pieces				int		not null,
item_quantity			int
);

create table client_comment
(
	client_name		varchar(30),
    client_email	varchar(30),
    client_subject	varchar(30),
    client_message	varchar(200),
    primary key (client_name, client_email, client_message)
);

 select * from store_sales where item_price >0 and item_price<2000;

select * from client_comment;

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces,item_quantity) 
values("clear_bloom","clear_bloom.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,4);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces,item_quantity) 
values("BAROQUE BEADS","BAROQUE_BEADS.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3, 5);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces,item_quantity) 
values("SEA BREEZE","SEA_BREEZE.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,2);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces, item_quantity) 
values("PAISLEY PARADISE","PAISLEY_PARADISE.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,5);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces, item_quantity) 
values("UNSTITCHED","UNSTITCHED.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,3);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces, item_quantity) 
values("clear_bloom","clear_bloom.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,1);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces, item_quantity) 
values("UNSTITCHED_2","UNSTITCHED_2.jpg",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,5);

insert into store_sales(item_name, item_path, item_price,item_description, sale, pieces, item_quantity) 
values("UNSTITCHED_3","UNSTITCHED_3.JPG",1736,"Shirt Front : 1.5m (Lawn) 
Shirt Back : 2m (lawn) 
Shalwar : 2.5m (Dyed) 
Dupatta : 2.5m (Lawn)",0,3,4);



select * from store_sales where sale=0;