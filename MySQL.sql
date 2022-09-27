drop table orderlist;
drop table evenlist;
drop table schedule;
drop table artwork;
drop table ticket;
drop table exhibition;
drop table rating;
drop table orders;
drop table events;
drop table announcement;
drop table staff;
drop table member;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;

CREATE TABLE `member` (
  `member_id` int(4) NOT NULL AUTO_INCREMENT,
  `member_profile` longblob,
  `member_name` varchar(30),
  `member_phNo` varchar(10),
  `member_email` varchar(30),
  `member_gender` char(1),
  `member_description` varchar(255),
  `member_password` varchar(20),
  PRIMARY KEY(member_id)
) ;

ALTER TABLE member AUTO_INCREMENT = 1000;

CREATE TABLE `staff` (
  `staff_id` int(4) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(30),
  `staff_email` varchar(30),
  `staff_pass` varchar(20),
  `staff_role` varchar(30),
  `staff_phNo` varchar(10),
  `staff_address` varchar(255), 
  `staff_status` varchar(20),
  `staff_date_join` datetime,
  `staff_gender` char(1),
  `staff_profile` longblob,
  PRIMARY KEY(staff_id)
) ;

ALTER TABLE staff AUTO_INCREMENT = 1000;

CREATE TABLE `announcement` (
  `announcement_id` int(4) NOT NULL AUTO_INCREMENT,
  `announcement_name` varchar(30),
  `announcement_text` text,
  `announcement_image` longblob,
  `announcement_category` varchar(50),
  `staff_id` int(4),
  FOREIGN KEY(staff_id) REFERENCES staff(staff_id),
  PRIMARY KEY(announcement_id)
) ;

ALTER TABLE announcement AUTO_INCREMENT = 1000;

CREATE TABLE `events` (
  `event_id` int(4) NOT NULL AUTO_INCREMENT,
  `event_detail` text,
  `event_name` varchar(30),
  `event_address` varchar(255),
  `event_image` longblob,
  `event_price` double,
  `event_date` datetime,
  `event_ppl_allow` int,
  `staff_id` int(4),
  FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
  PRIMARY KEY(event_id)
) ;

ALTER TABLE events AUTO_INCREMENT = 1000;

CREATE TABLE `orders` (
  `orders_id` int(4) NOT NULL AUTO_INCREMENT,
  `member_id` int(4) NOT NULL,
  `orders_date` datetime,
  FOREIGN KEY (member_id) REFERENCES member(member_id),
  PRIMARY KEY(orders_id)
) ;

ALTER TABLE orders AUTO_INCREMENT = 1000;

ALTER TABLE `orders`
  ADD KEY `member_id` (`member_id`);

CREATE TABLE `rating` (
  `feedback_id` int(4) NOT NULL AUTO_INCREMENT,
  `member_id` int(4),
  `rating` int(2),
  `review` varchar(50),
  FOREIGN KEY (member_id) REFERENCES member(member_id),
  PRIMARY KEY(feedback_id)
) ;

ALTER TABLE rating AUTO_INCREMENT = 1000;

CREATE TABLE `exhibition` (
  `exhibition_id` int(4) NOT NULL AUTO_INCREMENT,
  `exhibition_name` varchar(30),
  `staff_id` int(4),
  FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
  PRIMARY KEY(exhibition_id)
) ;

ALTER TABLE exhibition AUTO_INCREMENT = 1000;

CREATE TABLE `ticket` (
  `ticket_id` int(4) NOT NULL AUTO_INCREMENT,
  `ticket_price` double,
  `ticket_date` datetime,
  `ticket_location` varchar(255),
  `ticket_ppl_allow` int,
  `exhibition_id` int(4),
  FOREIGN KEY (exhibition_id) REFERENCES exhibition(exhibition_id),
  PRIMARY KEY(ticket_id)
) ;

ALTER TABLE ticket AUTO_INCREMENT = 1000;

CREATE TABLE `artwork` (
  `artwork_id` int(4) NOT NULL AUTO_INCREMENT,
  `artwork_detail` text,
  `artwork_name` varchar(30),
  `artwork_artist_name` varchar(30),
  `artwork_image` longblob,
  PRIMARY KEY(artwork_id)
) ;

ALTER TABLE artwork AUTO_INCREMENT = 1000;

CREATE TABLE `schedule` (
  `artwork_id` int(4),
  `exhibition_id` int(4),
  FOREIGN KEY (artwork_id) REFERENCES artwork(artwork_id),
  FOREIGN KEY (exhibition_id) REFERENCES exhibition(exhibition_id)
) ;

ALTER TABLE `schedule`
  ADD PRIMARY KEY (`artwork_id`,`exhibition_id`);

CREATE TABLE `eventlist` (
  `event_id` int(4) NOT NULL,
  `orders_id` int(4) NOT NULL,
  `eventlist_quantity` int,
  FOREIGN KEY (event_id) REFERENCES events(event_id),
  FOREIGN KEY (orders_id) REFERENCES orders(orders_id)
);

ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`event_id`,`orders_id`);

CREATE TABLE `orderlist` (
  `orders_id` int(4) NOT NULL,
  `ticket_id` int(4) NOT NULL,
  `orderlist_quantity` int,
  FOREIGN KEY (orders_id) REFERENCES orders(orders_id),
  FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id)
) ;

ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`orders_id`,`ticket_id`);

