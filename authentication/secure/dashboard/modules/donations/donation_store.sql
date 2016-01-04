create database userdata;
use userdata;

CREATE TABLE monetary_donation (
    problem_id INT AUTO_INCREMENT PRIMARY KEY,
    problem_name VARCHAR(30) NOT NULL,
    problem_description VARCHAR(500) NOT NULL,
    money_required INT,
    money_recieved INT,
    picture VARCHAR(30)
);


CREATE TABLE visitor_comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_name VARCHAR(30) NOT NULL,
    visitor_email VARCHAR(30) NOT NULL,
    visitor_subject VARCHAR(55),
    visitor_message VARCHAR(400) NOT NULL
);

CREATE TABLE mh_user_data (
    user_first_name VARCHAR(15) NOT NULL,
    user_last_name VARCHAR(15) NOT NULL,
    user_email VARCHAR(40) NOT NULL,
    user_donor VARCHAR(1),
    user_password VARCHAR(40) NOT NULL,
    user_address VARCHAR(100) NOT NULL,
    user_contact_number INT(12) NOT NULL,
    PRIMARY KEY(user_first_name, user_last_name, user_email)
);

CREATE TABLE metirial_donation (
    metirial_id INT AUTO_INCREMENT PRIMARY KEY,
    metirial_name VARCHAR(30) NOT NULL,
    category VARCHAR(30) NOT NULL,
    picture VARCHAR(30)
);

CREATE TABLE metirial_donation_user (
    metirial_id INT references metirial_donation(metirial_id)  on delete cascade on update cascade,
    user_first_name VARCHAR(15) NOT NULL,
    user_last_name VARCHAR(15) NOT NULL,
    user_email VARCHAR(40) NOT NULL,
    foreign key(user_first_name, user_last_name, user_email) references mh_user_data(user_first_name, user_last_name, user_email) on delete cascade on update cascade,
    PRIMARY KEY(metirial_id)
);


CREATE TABLE metirial_donation_acceptor (
    metirial_id INT references metirial_donation(metirial_id)  on delete cascade on update cascade,
    user_first_name VARCHAR(15) NOT NULL,
    user_last_name VARCHAR(15) NOT NULL,
    user_email VARCHAR(40) NOT NULL,
    foreign key(user_first_name, user_last_name, user_email) references mh_user_data(user_first_name, user_last_name, user_email) on delete cascade on update cascade,
    PRIMARY KEY(metirial_id)
);


select * from mh_user_data natural join metirial_donation_user natural join metirial_donation ;
update metirial_donation set recieved=1 where metirial_id in 
(
select metirial_id from metirial_donation_user 
where user_first_name='maria' and user_last_name='hameed' and user_email='maria@yahoo.com');

select * from mh_user_data natural join metirial_donation_user natural join metirial_donation where metirial_id=9;
delete from metirial_donation where metirial_id in (select metirial_id from metirial_donation_user where user_first_name='maria' and user_last_name='hameed' and user_email='maria@yahoo.com');

SELECT 
    *
FROM
    metirial_donation
WHERE
    metirial_id IN (SELECT 
            metirial_id
        FROM
            metirial_donation_acceptor
        WHERE
            user_first_name = 'sumera'
                AND user_last_name = 'ali'
                AND user_email = 'sumera@gmail.com');
                
                
select metirial_id, metirial_name,category,picture,recieved, reserved from metirial_donation where category='Stationery and books'
and reserved=0 and recieved=1;

select * from metirial_donation where metirial_id in(21,22,23,24,25,26,27,28) and recieved=1 and reserved=1;
update monetary_donation set money_recieved = money_recieved + 2000 where problem_id=12;



ALTER TABLE `metirial_donation_acceptor`
ADD CONSTRAINT `pro_cat_product_id` FOREIGN KEY (`metirial_id`) 
 REFERENCES `metirial_donation` (`metirial_id`);