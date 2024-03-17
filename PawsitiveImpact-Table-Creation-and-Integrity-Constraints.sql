#Create table for user_details
CREATE TABLE user_details (
	user_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_fname varchar(255),
	user_lname varchar(255),
    user_sex char(1) CHECK(user_sex IN('F','M')),
    user_birtdate date,
    user_address varchar(255),
    user_contactno varchar(255),
    user_email varchar(255),
    user_password varchar(255),
    user_image text,
    user_account_status tinyint not null default 1
);

#Create table for animal_identification
CREATE TABLE animal_identification (
	animal_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    animal_type varchar(255),
    animal_name varchar(255),
    animal_age int(100),
    animal_sex char(1) CHECK(animal_sex IN('F','M')),
    animal_breed varchar(255),
    animal_weight float(20),
    kapon_date date,
    arv_date date,
    deworm_date date,
    animal_description varchar(255),
    animal_status tinyint not null default 1
);

#Create table for program_listing
CREATE TABLE program_listing (
	program_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_program_id int(100) NOT NULL,
    program_name varchar(255),
    program_duration varchar(255),
    volunteers_needed int(50),
    volunteers_acquired int(50),
    program_desc varchar(255),
    program_status tinyint not null default 1
);

#Create table for adoption_listing
CREATE TABLE adoption_listing (
	adoption_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_adoption_id int(100) NOT NULL,
    animal_adoption_id int(100) NOT NULL,
    date_listed date,
    adoption_description varchar(255),
    adoption_status tinyint not null default 1
);

#Create table for donation_listing
CREATE TABLE donation_listing (
	donation_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_donation_id int(100) NOT NULL,
    animal_donation_id int(100) NOT NULL,
    amount_needed int(100),
    amount_reached int(100),
    date_listed date,
    donation_description varchar(255),
    donation_status tinyint not null default 1
);

#Create table for merchandise_listing
CREATE TABLE merchandise_listing (
	merchandise_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_merchandise_id int(100) NOT NULL,
    merchandise_name varchar(255),
    merchandise_description varchar(255),
    merchandise_price float(20),
    merchandise_stock int(100),
    merchandise_status tinyint not null default 1
);

#Create table for blog_listing
CREATE TABLE blog_listing (
	blog_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_blog_id int(100) NOT NULL,
    blog_description varchar(255),
    date_blogged date
);

#Create table for program_images
CREATE TABLE program_images (
	image_list_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    program_image_id int(100) NOT NULL,
    program_image text
);

#Create table for animal_images
CREATE TABLE animal_images (
	image_list_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    animal_image_id int(100) NOT NULL,
    animal_image text
);

#Create table for merchandise_images
CREATE TABLE merchandise_images (
	image_list_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    merchandise_image_id int(100) NOT NULL,
    merchandise_image text
);

#Create table for blog_images
CREATE TABLE blog_images (
	image_list_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    blog_image_id int(100) NOT NULL,
    blog_image text
);

#Create table for volunteer_details
CREATE TABLE volunteer_details (
	volunteer_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_volunteer_id int(100) NOT NULL,
    program_listing_id int(100) NOT NULL
);

#Create table for donation_transactions
CREATE TABLE donation_transactions (
	donation_transaction_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    donation_listing_id int(100) NOT NULL,
    donor_name varchar(255),
    payment_method varchar(255),
    amount_donated int(100),
    date_donated date,
    donation_message varchar(255)
);

#Create table for merchandise_transactions
CREATE TABLE merchandise_transactions (
	merchandise_transaction_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    merchandise_user_id int(100) NOT NULL,
    merchandise_listing_id int(100) NOT NULL,
    date_purchased date,
    quantity_purchased int(100),
    total_price float(20),
    payment_method varchar(255),
    shipping_address varchar(255)
);

#Create table for blog_comments
CREATE TABLE blog_comments (
	comment_listing_id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    blog_listing_id int(100) NOT NULL,
    user_comment_id int(100) NOT NULL,
    blog_comment varchar(255) NOT NULL
);

-- Interity Constraint for table program_listing --
ALTER TABLE program_listing ADD CONSTRAINT FOREIGN KEY (user_program_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table adoption_listing --
ALTER TABLE adoption_listing ADD CONSTRAINT FOREIGN KEY (user_adoption_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE adoption_listing ADD CONSTRAINT FOREIGN KEY (animal_adoption_id) REFERENCES animal_identification(animal_id) ON DELETE CASCADE ON UPDATE CASCADE;


-- Interity Constraint for table donation_listing --
ALTER TABLE donation_listing ADD CONSTRAINT FOREIGN KEY (user_donation_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE donation_listing ADD CONSTRAINT FOREIGN KEY (animal_donation_id) REFERENCES animal_identification(animal_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table merchandise_listing --
ALTER TABLE merchandise_listing ADD CONSTRAINT FOREIGN KEY (user_merchandise_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
DESC merchandise_listing;

-- Interity Constraint for table blog_listing --
ALTER TABLE blog_listing ADD CONSTRAINT FOREIGN KEY (user_blog_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table program_listing --
ALTER TABLE program_images ADD CONSTRAINT FOREIGN KEY (program_image_id) REFERENCES program_listing(program_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table animal_images --
ALTER TABLE animal_images ADD CONSTRAINT FOREIGN KEY (animal_image_id) REFERENCES animal_identification(animal_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table merchandise_images --
ALTER TABLE merchandise_images ADD CONSTRAINT FOREIGN KEY (merchandise_image_id) REFERENCES merchandise_listing(merchandise_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table blog_images --
ALTER TABLE blog_images ADD CONSTRAINT FOREIGN KEY (blog_image_id) REFERENCES blog_listing(blog_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table volunteer_details --
ALTER TABLE volunteer_details ADD CONSTRAINT FOREIGN KEY (user_volunteer_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE volunteer_details ADD CONSTRAINT FOREIGN KEY (program_listing_id) REFERENCES program_listing(program_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table donation_transactions --
ALTER TABLE donation_transactions ADD CONSTRAINT FOREIGN KEY (donation_listing_id) REFERENCES donation_listing(donation_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table merchandise_transactions --
ALTER TABLE merchandise_transactions ADD CONSTRAINT FOREIGN KEY (merchandise_user_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE merchandise_transactions ADD CONSTRAINT FOREIGN KEY (merchandise_listing_id) REFERENCES merchandise_listing(merchandise_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Interity Constraint for table blog_comments --
ALTER TABLE blog_comments ADD CONSTRAINT FOREIGN KEY (blog_listing_id) REFERENCES blog_listing(blog_listing_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE blog_comments ADD CONSTRAINT FOREIGN KEY (user_comment_id) REFERENCES user_details(user_id) ON DELETE CASCADE ON UPDATE CASCADE;