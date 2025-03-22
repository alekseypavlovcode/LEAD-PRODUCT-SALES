# Описание проекта

В проекте реализована связка Лидов, товаров, продаж

```SQL
CREATE TABLE `leads` (
  `lead_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `sale_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `phone` varchar(20) NOT NULL,
  `lead_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lead_id`),
  KEY `leads_id_sales_foreign` (`sale_id`),
  KEY `leads_id_produk_foreign` (`product_id`),
  CONSTRAINT `leads_id_produk_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `leads_id_sales_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `leads` */

insert  into `leads`(`lead_id`,`date`,`sale_id`,`product_id`,`phone`,`lead_name`,`city`,`created_at`,`updated_at`) values
(3,'2024-10-09',2,3,'0898787878','Roihan','Malang','2024-10-08 06:24:44','2024-10-08 06:24:44'),
(4,'2024-10-10',3,4,'08765655','Jose','Semarang','2024-10-08 06:25:24','2024-10-08 06:25:24'),
(5,'2024-10-09',2,5,'08787654','Soleh','Sidoarjo','2024-10-08 06:26:39','2024-10-08 06:26:39');

```

```SQL
CREATE TABLE `product` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product` */

insert  into `product`(`product_id`,`product_name`,`created_at`,`updated_at`) values
(1,'Cipta Residence 2',NULL,NULL),
(2,'The Rich',NULL,NULL),
(3,'Namoramble City',NULL,NULL),
(4,'Grand Banten',NULL,NULL),
(5,'Turi Mansion',NULL,NULL),
(6,'Cipta Residence 1',NULL,NULL);
```

```SQL
CREATE TABLE `sales` (
  `sale_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_sales` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sales` */

insert  into `sales`(`sale_id`,`nama_sales`,`created_at`,`updated_at`) values
(1,'sales 1',NULL,NULL),
(2,'sales 2',NULL,NULL),
(3,'sales 3',NULL,NULL);
```
