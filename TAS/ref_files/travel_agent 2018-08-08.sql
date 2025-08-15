-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 12:33 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agent`
--

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `market_id`, `ag_code`, `ag_name`, `address`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'GFT', 'Grand FT Tour', 'kjasdkjhsajkdfsajk', 'adsafsdf', '2018-08-06 04:06:27', '2018-08-06 04:06:27');

--
-- Dumping data for table `agent_contacts`
--

INSERT INTO `agent_contacts` (`id`, `agent_id`, `type`, `contact`, `created_at`, `updated_at`) VALUES
(1, 1, 'Email_A', 'user@gmail.com', NULL, NULL),
(2, 1, 'Email_B', 'user@gmail.com', NULL, NULL),
(3, 1, 'Email_C', 'user@gmail.com', NULL, NULL),
(4, 1, 'Fax', '0112555455', NULL, NULL),
(5, 1, 'Tel', '0122545455', NULL, NULL);

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_id`, `country_id`, `City_name`, `branch_code`, `branch_name`, `branch_address`, `contact_details`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Colombo', 'CMB', 'Colombo BR', 'Colombo 8', 'test contact details', 'Description test', 1, NULL, NULL);

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `district_id`, `city_name`, `city_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Piliyandala', 'PLY', NULL, NULL),
(2, 1, 'Nugegoda', 'NGGD', NULL, NULL),
(3, 2, 'Ja-Ela', 'JEL', '2018-08-07 01:31:50', '2018-08-07 01:31:50');

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_code`, `company_name`, `company_address`, `email`, `tel`, `vat_rate`, `created_at`, `updated_at`) VALUES
(1, 'ATQT', 'Antiquity', 'Colombo 8', 'use@gmail.com', '012245256', '15', NULL, NULL);

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `c_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'LK', 'Sri lanka', NULL, NULL),
(2, 'US', 'USA', NULL, NULL);

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `type`, `usd_rate`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'USD', 1, '2018-08-06 04:04:39', '2018-08-06 04:04:39');

--
-- Dumping data for table `distances`
--

INSERT INTO `distances` (`id`, `frm`, `to`, `distance`, `created_at`, `updated_at`) VALUES
(21, 4, 5, 100, NULL, NULL),
(22, 4, 6, 140, NULL, NULL),
(23, 6, 5, 180, NULL, NULL);

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `dist_name`, `code`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Colombo', 'CMB', 1, NULL, NULL),
(2, 'Gampaha', 'GMP', 1, NULL, NULL);

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `supplier_id`, `hotel_type_id`, `desc`, `postal_code`, `hotel_group_id`, `star_rate`, `web_url`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'kjshdkjas', 12132, 1, 3, 'https://www.thespringvillakandy.lk', '2018-08-07 23:04:58', '2018-08-07 23:04:58'),
(2, 13, 1, 'lsjndfkjsa', 456, 2, 2, 'https:\\\\www.thespringvillakandy.lk', '2018-08-07 23:20:40', '2018-08-07 23:20:40');

--
-- Dumping data for table `hotel_groups`
--

INSERT INTO `hotel_groups` (`id`, `hotel_gp_name`, `group_code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', NULL, NULL),
(2, 'Jetwing Group', 'JTWG', NULL, NULL);

--
-- Dumping data for table `hotel_types`
--

INSERT INTO `hotel_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Villa', NULL, NULL),
(2, 'Resort', NULL, NULL);

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `country_id`, `district_id`, `city_id`, `location_name`, `location_code`, `long_name`, `geo_name`, `narration`, `short_des`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 'Colombo', 'CMB', 'aaa', 'aaa', 'asdsa', 'asdsada', 1, '2018-08-08 00:30:11', '2018-08-08 00:33:00'),
(5, 1, 1, 1, 'Kandy', 'KDD', 'asds', 'sad', 'sadsa', 'asds', 1, '2018-08-08 00:30:37', '2018-08-08 00:33:39'),
(6, 1, 2, 3, 'Galle', 'GLL', 'asd', 'sdsa', 'asda', 'sdasd', 1, '2018-08-08 00:31:00', '2018-08-08 00:33:39');

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `market_name`, `m_code`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 'UK Market', 'UK', 1, '2018-08-06 04:04:54', '2018-08-06 04:04:54');

--
-- Dumping data for table `meal_planes`
--

INSERT INTO `meal_planes` (`id`, `meal_plane`, `created_at`, `updated_at`) VALUES
(1, 'BB', NULL, NULL),
(2, 'HB', NULL, NULL),
(3, 'FB', NULL, NULL),
(4, 'Room only', NULL, NULL);

--
-- Dumping data for table `package_periods`
--

INSERT INTO `package_periods` (`id`, `title`, `type`, `fr_date`, `to_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xmas Week', 'Date Range', '2018-12-16', '2018-12-29', '1', '2018-08-11 04:53:54', '2018-08-11 04:53:54'),
(2, 'Summer Season', 'Date Range', '2018-08-15', '2018-09-08', '1', '2018-08-11 04:54:40', '2018-08-11 04:54:40'),
(3, 'Winter', 'Date Range', '2018-08-23', '2019-04-13', '1', '2018-08-11 04:55:08', '2018-08-11 04:55:08');

--
-- Dumping data for table `package_period_types`
--

INSERT INTO `package_period_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'All', NULL, NULL),
(2, 'Date Range', NULL, NULL);

--
-- Dumping data for table `quotation_codes`
--

INSERT INTO `quotation_codes` (`id`, `agent_id`, `code_year`, `code_no`, `created_at`, `updated_at`) VALUES
(1, 1, 2018, 1, '2018-08-06 04:11:43', '2018-08-06 04:11:43');

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `r_type`, `created_at`, `updated_at`) VALUES
(1, 'Delux', NULL, NULL),
(2, 'Luxry', NULL, NULL),
(3, 'Superior', NULL, NULL);

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `code`, `sup_s_name`, `sup_name`, `type`, `address`, `city_id`, `district_id`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'TAG', 'The Spring Villas Kandy', 'The Spring Villas Kandy', 'Hotel', '4554asdas', '1', '1', '1', 1, '2018-08-07 23:04:58', '2018-08-07 23:04:58'),
(13, 'THY', 'alsdjkahskjdf', 'alsdjkahskjdf', 'Hotel', 'asdfljhaskfjh', '1', '1', '1', 1, '2018-08-07 23:20:40', '2018-08-07 23:20:40'),
(14, 'TGH', 'Nuwan Transport', 'Nuwan Transport', 'Vehicle', 'asdsadada', '3', '2', '1', 1, '2018-08-10 00:18:17', '2018-08-10 00:18:17');

--
-- Dumping data for table `sup_contact_details`
--

INSERT INTO `sup_contact_details` (`id`, `supplier_id`, `type`, `contact`, `created_at`, `updated_at`) VALUES
(1, 4, 'Email_A', 'user@gmail.com', NULL, NULL),
(2, 4, 'Email_B', 'user@gmail.com', NULL, NULL),
(3, 4, 'Email_C', 'user@gmail.com', NULL, NULL),
(4, 4, 'Fax', '2312321111', NULL, NULL),
(5, 4, 'Tel', '3244534343', NULL, NULL),
(6, 13, 'Email_A', 'user@gmail.com', NULL, NULL),
(7, 13, 'Email_B', 'user@gmail.com', NULL, NULL),
(8, 13, 'Email_C', 'user@gmail.com', NULL, NULL),
(9, 13, 'Fax', '6546545451', NULL, NULL),
(10, 13, 'Tel', '5155365165', NULL, NULL),
(11, 14, 'Email_A', '32432454675745', NULL, NULL),
(12, 14, 'Tel', '2131232134', NULL, NULL);

--
-- Dumping data for table `tour_quotation_headers`
--

INSERT INTO `tour_quotation_headers` (`id`, `tour_id`, `tour_code`, `market_id`, `agent_id`, `branch_id`, `version_id`, `tour_type`, `title`, `frm_date`, `to_date`, `Days`, `pax_adult`, `pax_child`, `remarks`, `currency_id`, `vat_rate`, `millage`, `tot_hotel_price`, `tot_trp_price`, `tot_misc_price`, `pp_price`, `pp_ss_price`, `pp_tp_price`, `com_rate`, `nbt_rate`, `promotion`, `confirmed`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'UK/GFT/CMB/082018-1-V1', 1, 1, 1, 1, 1, 'Familiy Tour 2018', '2018-08-21', '2018-08-29', 8, 2, 1, 'test remarks', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, 0, 0, 1, '2018-08-06 04:11:43', '2018-08-06 04:11:43');

--
-- Dumping data for table `tour_quot_distances`
--

INSERT INTO `tour_quot_distances` (`id`, `tour_quot_location_id`, `tour_id`, `pos`, `location_id`, `lc_name`, `lc_code`, `kms`, `created_at`, `updated_at`) VALUES
(105, 166, 2, 1, 4, 'Colombo', 'CMB', 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(106, 166, 2, 2, 5, 'Kandy', 'KDD', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(107, 166, 2, 3, 4, 'Colombo', 'CMB', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(108, 166, 2, 4, 5, 'Kandy', 'KDD', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(109, 166, 2, 5, 4, 'Colombo', 'CMB', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(110, 166, 2, 6, 6, 'Galle', 'GLL', 140, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(111, 167, 2, 1, 4, 'Colombo', 'CMB', 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(112, 167, 2, 2, 5, 'Kandy', 'KDD', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(113, 167, 2, 3, 4, 'Colombo', 'CMB', 100, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(114, 169, 2, 1, 5, 'Kandy', 'KDD', 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52');

--
-- Dumping data for table `tour_quot_locations`
--

INSERT INTO `tour_quot_locations` (`id`, `tour_quotation_header_id`, `tour_id`, `tour_date`, `tour_day`, `ttkms`, `created_at`, `updated_at`) VALUES
(166, 1, 2, '2018-08-21', 1, 540, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(167, 1, 2, '2018-08-22', 2, 200, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(168, 1, 2, '2018-08-23', 3, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(169, 1, 2, '2018-08-24', 4, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(170, 1, 2, '2018-08-25', 5, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(171, 1, 2, '2018-08-26', 6, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(172, 1, 2, '2018-08-27', 7, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52'),
(173, 1, 2, '2018-08-28', 8, 0, '2018-08-10 05:00:52', '2018-08-10 05:00:52');

--
-- Dumping data for table `tour_types`
--

INSERT INTO `tour_types` (`id`, `tour_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Round Tour', NULL, NULL),
(2, 'Hotel only', NULL, NULL),
(3, 'Transport Only', NULL, NULL);

--
-- Dumping data for table `tr_datas`
--

INSERT INTO `tr_datas` (`id`, `tour_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '2018-08-06 04:11:43');

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `title`, `supplier_id`, `vehicle_type_id`, `reg_no`, `licence_exp_date`, `insurance_exp_date`, `mf_year`, `reg_year`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota KDH', 14, 2, 'PI-2585', '2018-08-16', '2018-08-28', 2012, 2013, 'asdada', 1, '2018-08-10 00:31:10', '2018-08-10 00:31:10');

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `no_of_seats`, `rate_per_km`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 32, 'Car', '2018-08-10 00:19:56', '2018-08-10 00:19:56'),
(2, 10, 42, 'KDH', '2018-08-10 00:20:10', '2018-08-10 00:20:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
