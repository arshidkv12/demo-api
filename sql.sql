CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(100) NOT NULL,
  `status` enum('created','processed','delivered','cancelled') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES orders(id)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
