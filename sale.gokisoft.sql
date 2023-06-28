CREATE TABLE `Role` (
  `id` int PRIMARY KEY,
  `name` varchar(20) NOT NULL 
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY,
  `fullname` varchar(50),
  `email` varchar(150),
  `address` varchar(200),
  `password` varchar(32),
  `phone_number` varchar(20),
  `role_id` int,
  `create_at` datetime,
  `update_at` datetime,
  `deleted` int
);

CREATE TABLE `Category` (
  `id` int PRIMARY KEY,
  `name` varchar(100)
);

CREATE TABLE `Product` (
  `id` int PRIMARY KEY,
  `Category_id` int,
  `title` varchar(350),
  `price` int,
  `discount` int,
  `thumbnail` varchar(500),
  `decription` longtext,
  `create_at` datetime,
  `deleted` int
);

CREATE TABLE `Galery` (
  `id` int PRIMARY KEY,
  `Product_id` int,
  `thumbnail` varchar(500)
);

CREATE TABLE `feedback` (
  `id` int PRIMARY KEY,
  `firstname` varchar(30),
  `lastname` varchar(30),
  `email` varchar(150),
  `phone_number` varchar(20),
  `subject_name` varchar(200),
  `note` varchar(500)
);

CREATE TABLE `order` (
  `id` int PRIMARY KEY,
  `fullname` varchar(50),
  `email` varchar(150),
  `phone_number` varchar(20),
  `address` varchar(200),
  `note` varchar(255),
  `order_date` datetime,
  `status` int,
  `total_money` int,
  `user_id` int
);

CREATE TABLE `order_detail` (
  `id` int PRIMARY KEY,
  `order_id` int,
  `Product_id` int,
  `price` int,
  `number` int,
  `total_money` int
);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`Category_id`) REFERENCES `Category` (`id`);

ALTER TABLE `order_detail` ADD FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`);

ALTER TABLE `Galery` ADD FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`);

ALTER TABLE `order_detail` ADD FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);
