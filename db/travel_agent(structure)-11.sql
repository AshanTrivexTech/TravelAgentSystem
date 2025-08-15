-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 08:44 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `accmd_allocate_guests`
--

CREATE TABLE `accmd_allocate_guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accmd_reservations`
--

CREATE TABLE `accmd_reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_hotel_detail_id` int(11) NOT NULL,
  `sgl_qty` int(11) NOT NULL,
  `dbl_qty` int(11) NOT NULL,
  `twn_qty` int(11) NOT NULL,
  `tbl_qty` int(11) NOT NULL,
  `qd_qty` int(11) NOT NULL,
  `total_sup` double NOT NULL,
  `total_rmc` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accmd_resevation_voucher_details`
--

CREATE TABLE `accmd_resevation_voucher_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `accmd_resevation_voucher_header_id` int(11) NOT NULL,
  `accmd_reservation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accmd_resevation_voucher_headers`
--

CREATE TABLE `accmd_resevation_voucher_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_voucher_no` int(11) NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `vpos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `confirmed_date` date NOT NULL,
  `confirmed_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condi` tinyint(4) NOT NULL,
  `pax` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `market_id` int(11) NOT NULL,
  `ag_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_contacts`
--

CREATE TABLE `agent_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_inv_details`
--

CREATE TABLE `agent_inv_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `agent_inv_header_id` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noofpax` int(11) NOT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_inv_headers`
--

CREATE TABLE `agent_inv_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `inv_no` int(11) NOT NULL,
  `amd_no` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inv_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agen_inv_nos`
--

CREATE TABLE `agen_inv_nos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inv_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frm_date` date NOT NULL,
  `to_date` date NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `City_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compulsory_supliments`
--

CREATE TABLE `compulsory_supliments` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `cs_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_type` tinyint(4) NOT NULL,
  `amt` double NOT NULL,
  `fr_date` date NOT NULL,
  `to_date` date NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries_markets`
--

CREATE TABLE `countries_markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency_exchange_rates`
--

CREATE TABLE `currency_exchange_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_A` int(11) NOT NULL,
  `currency_B` int(11) NOT NULL,
  `amount` double NOT NULL,
  `frm_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distances`
--

CREATE TABLE `distances` (
  `id` int(10) UNSIGNED NOT NULL,
  `frm` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `distance` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `dist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_contacts`
--

CREATE TABLE `driver_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exception_returns`
--

CREATE TABLE `exception_returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `cur_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `fedb_type` tinyint(4) NOT NULL,
  `fedb_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagePath` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_qt_pax_setups`
--

CREATE TABLE `group_qt_pax_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `pax_frm` int(11) NOT NULL,
  `pax_to` int(11) NOT NULL,
  `guide_accmd_add` int(11) NOT NULL,
  `guide_type` int(11) NOT NULL,
  `accmd_foc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PN` int(11) NOT NULL,
  `dob` date NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_allocations`
--

CREATE TABLE `guest_allocations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `flight_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_date` date NOT NULL,
  `depature_date` date NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_contacts`
--

CREATE TABLE `guest_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `guide_type_id` int(11) NOT NULL,
  `guide_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_allocate_voucher_details`
--

CREATE TABLE `guide_allocate_voucher_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `guide_allocate_voucher_header_id` int(11) NOT NULL,
  `guide_allocation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_allocate_voucher_headers`
--

CREATE TABLE `guide_allocate_voucher_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `guide_voucher_no` int(11) NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `vpos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `confirmed_date` datetime NOT NULL,
  `confirmed_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_allocations`
--

CREATE TABLE `guide_allocations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quot_guide_detail_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_hotel_reserves`
--

CREATE TABLE `guide_hotel_reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quot_guide_detail_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_hotel_voucher_details`
--

CREATE TABLE `guide_hotel_voucher_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `guide_hotel_voucher_header_id` int(11) NOT NULL,
  `guide_hotel_reserve_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_hotel_voucher_headers`
--

CREATE TABLE `guide_hotel_voucher_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `guide_hotel_voucher_no` int(11) NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `vpos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `confirmed_date` datetime NOT NULL,
  `confirmed_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_languages`
--

CREATE TABLE `guide_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `guide_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_lanuage_rates`
--

CREATE TABLE `guide_lanuage_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `guide_type_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_rooms`
--

CREATE TABLE `guide_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `guide_room_type_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_room_types`
--

CREATE TABLE `guide_room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `gr_types` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide_types`
--

CREATE TABLE `guide_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `g_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `hotel_type_id` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `hotel_group_id` int(11) NOT NULL,
  `star_rate` int(11) NOT NULL,
  `web_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_features`
--

CREATE TABLE `hotel_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_fe_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_groups`
--

CREATE TABLE `hotel_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_gp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_hotel_features`
--

CREATE TABLE `hotel_hotel_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_feature_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_multi`
--

CREATE TABLE `hotel_multi` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `ratings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_packages`
--

CREATE TABLE `hotel_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `meal_plane_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `Package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_bed_charge` double NOT NULL,
  `child_rate` double NOT NULL,
  `SGL` double NOT NULL,
  `DBL` double NOT NULL,
  `TBL` double NOT NULL,
  `QBL` double NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `ctr_term` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_package_optional_supliment`
--

CREATE TABLE `hotel_package_optional_supliment` (
  `id` int(10) UNSIGNED NOT NULL,
  `optional_supliment_id` int(11) NOT NULL,
  `hotel_package_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_star_rates`
--

CREATE TABLE `hotel_star_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `star_rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itinerays`
--

CREATE TABLE `itinerays` (
  `id` int(10) UNSIGNED NOT NULL,
  `route_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startin_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itineray__locations`
--

CREATE TABLE `itineray__locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `itineray_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `ss` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `market_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_planes`
--

CREATE TABLE `meal_planes` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_plane` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `miscellanies`
--

CREATE TABLE `miscellanies` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `misc_categorie_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc_categories`
--

CREATE TABLE `misc_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `currencie_id` int(11) NOT NULL,
  `misc_rate_categorie_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mc_pax` int(11) NOT NULL,
  `Rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc_rate_categories`
--

CREATE TABLE `misc_rate_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate_ctgry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc_reserve_voucher_details`
--

CREATE TABLE `misc_reserve_voucher_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `misc_reserve_voucher_header_id` int(11) NOT NULL,
  `reservation_misc_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc_reserve_voucher_headers`
--

CREATE TABLE `misc_reserve_voucher_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `misc_voucher_no` int(11) NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `vpos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `confirmed_date` date NOT NULL,
  `confirmed_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condi` tinyint(4) NOT NULL,
  `pax` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc_types`
--

CREATE TABLE `misc_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mis_tour_adv_req_details`
--

CREATE TABLE `mis_tour_adv_req_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `mis_tour_adv_req_header_id` int(11) NOT NULL,
  `reservation_misc_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mis_tour_adv_req_headers`
--

CREATE TABLE `mis_tour_adv_req_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `misc_voucher_no` int(11) NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `vpos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Requested_For` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Required_Date` date NOT NULL,
  `Settlement_Date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `optional_supliments`
--

CREATE TABLE `optional_supliments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ops_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_type` tinyint(4) NOT NULL,
  `amt` double NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_periods`
--

CREATE TABLE `package_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_package_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fr_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_period_types`
--

CREATE TABLE `package_period_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege_actions`
--

CREATE TABLE `privilege_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `action_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege_lists`
--

CREATE TABLE `privilege_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `privilege_action_id` int(11) NOT NULL,
  `privilege_section_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege_sections`
--

CREATE TABLE `privilege_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_codes`
--

CREATE TABLE `quotation_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `code_year` int(11) NOT NULL,
  `code_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_types`
--

CREATE TABLE `rate_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_miscs`
--

CREATE TABLE `reservation_miscs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quote_misc_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `advance` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `r_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_s_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_multi`
--

CREATE TABLE `supplier_multi` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sup_contact_details`
--

CREATE TABLE `sup_contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `tax_order` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking_lists`
--

CREATE TABLE `tour_booking_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_ammd_id` int(11) NOT NULL,
  `tour_ammd` int(11) NOT NULL,
  `tour_ammd_type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_qoute_gp_vehicle_types`
--

CREATE TABLE `tour_qoute_gp_vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `group_qt_pax_setup_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `rate_per_km` double NOT NULL,
  `extr_vehicle_type_id` int(11) NOT NULL,
  `extr_rate_per_km` double NOT NULL,
  `extr_vht_millage` int(11) NOT NULL,
  `main_vt_mk_pc` double NOT NULL,
  `extr_vt_mk_pc` double NOT NULL,
  `exrchg_rate` double NOT NULL,
  `pp_rate` double NOT NULL,
  `guide_type` int(11) NOT NULL,
  `guide_accmd` int(11) NOT NULL,
  `accmd_foc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_qout_hotel_com_supliments`
--

CREATE TABLE `tour_qout_hotel_com_supliments` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_hotel_detail_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `spos` int(11) NOT NULL,
  `compulsory_supliment_id` int(11) NOT NULL,
  `rate_type` int(11) NOT NULL,
  `exrate` double NOT NULL,
  `csup_amount` double NOT NULL,
  `qty` int(11) NOT NULL,
  `cheked` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_qout_hotel_optm_supliments`
--

CREATE TABLE `tour_qout_hotel_optm_supliments` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_hotel_detail_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `spos` int(11) NOT NULL,
  `optional_supliment_id` int(11) NOT NULL,
  `rate_type` int(11) NOT NULL,
  `opsup_amount` double NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `cheked` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_headers`
--

CREATE TABLE `tour_quotation_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_code_no` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `version_no` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `tour_type` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frm_date` date NOT NULL,
  `to_date` date NOT NULL,
  `vld_frm_date` date NOT NULL,
  `vld_to_date` date NOT NULL,
  `Days` int(11) NOT NULL,
  `pax_adult` int(11) NOT NULL,
  `pax_child` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `vat_rate` double DEFAULT NULL,
  `millage` double DEFAULT NULL,
  `tot_hotel_price` double DEFAULT NULL,
  `trp_pp_price` double DEFAULT NULL,
  `tot_misc_price` double DEFAULT NULL,
  `pp_misc_price` double DEFAULT NULL,
  `tot_guide_price` double DEFAULT NULL,
  `tot_guide_acmd` double DEFAULT NULL,
  `pp_rate` double DEFAULT NULL,
  `pp_hotel_price` double DEFAULT NULL,
  `pp_ss_price` double DEFAULT NULL,
  `pp_tpre_price` double DEFAULT NULL,
  `pp_qtre_price` double DEFAULT NULL,
  `com_rate` double DEFAULT NULL,
  `qtn_type` tinyint(4) DEFAULT NULL,
  `promotion` tinyint(4) NOT NULL,
  `confirmed` tinyint(4) NOT NULL,
  `amgmt` tinyint(4) NOT NULL,
  `base_on` tinyint(4) NOT NULL,
  `bc_to_lkr` double NOT NULL,
  `child_pp_rate` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `child_chk_accmd` tinyint(4) NOT NULL,
  `child_chk_trsp` tinyint(4) NOT NULL,
  `child_chk_guide` tinyint(4) NOT NULL,
  `child_chk_misc` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_hotels`
--

CREATE TABLE `tour_quotation_hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `tour_day` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_hotel_details`
--

CREATE TABLE `tour_quotation_hotel_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_hotel_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `hotel_package_id` int(11) NOT NULL,
  `ss_rate` double NOT NULL,
  `ss_com` double NOT NULL,
  `db_rate` double NOT NULL,
  `db_com` double NOT NULL,
  `trp_rate` double NOT NULL,
  `trp_com` double NOT NULL,
  `qtb_rate` double NOT NULL,
  `qtb_com` double NOT NULL,
  `sql_splm` double NOT NULL,
  `dbl_splm` double NOT NULL,
  `tbl_splm` double NOT NULL,
  `qd_splm` double NOT NULL,
  `child_rate` double NOT NULL,
  `child_com` double NOT NULL,
  `guide` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `rate_to_base` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_miscellaneouses`
--

CREATE TABLE `tour_quotation_miscellaneouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `version_no` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `misc_type_id` int(11) NOT NULL,
  `misc_category_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `currency_rate` double NOT NULL,
  `com_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_suppliers`
--

CREATE TABLE `tour_quotation_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sup_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quotation_transports`
--

CREATE TABLE `tour_quotation_transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `version_no` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `millage` double NOT NULL,
  `currency_rate` double NOT NULL,
  `com_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quote_gp_guides_details`
--

CREATE TABLE `tour_quote_gp_guides_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_day` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `na_guide_rate` double NOT NULL,
  `na_guide_mkp` double NOT NULL,
  `ch_guide_rate` double NOT NULL,
  `ch_guide_mkp` double NOT NULL,
  `bsratelkr` double NOT NULL,
  `accmd_mkp` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quote_room_allocations`
--

CREATE TABLE `tour_quote_room_allocations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `sgl` int(11) NOT NULL,
  `dbl` int(11) NOT NULL,
  `twn` int(11) NOT NULL,
  `tbl` int(11) NOT NULL,
  `qd` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quote_trp_exps`
--

CREATE TABLE `tour_quote_trp_exps` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `transport_expense_id` int(11) NOT NULL,
  `exp_rate` double NOT NULL,
  `exp_qty` int(11) NOT NULL,
  `exp_total` double NOT NULL,
  `exp_markup` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_distances`
--

CREATE TABLE `tour_quot_distances` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quot_location_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `lc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kms` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_guides`
--

CREATE TABLE `tour_quot_guides` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `tour_day` int(11) NOT NULL,
  `lkr_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_guide_details`
--

CREATE TABLE `tour_quot_guide_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quot_guide_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `guide_type_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `has_room` tinyint(4) NOT NULL,
  `guide_room_id` int(11) NOT NULL,
  `guide_fee` double NOT NULL,
  `guide_com` double NOT NULL,
  `room_rate` double NOT NULL,
  `room_excrate` double NOT NULL,
  `room_com` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_locations`
--

CREATE TABLE `tour_quot_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `tour_day` int(11) NOT NULL,
  `ttkms` double NOT NULL,
  `itineray_id` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_miscs`
--

CREATE TABLE `tour_quot_miscs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `misc_categorie_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `rate_lkr` double NOT NULL,
  `totlkr` double NOT NULL,
  `ms_Mkp` double NOT NULL,
  `baserate` double NOT NULL,
  `ex_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_quot_transports`
--

CREATE TABLE `tour_quot_transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_quotation_header_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `millage` double NOT NULL,
  `rate_pkm` double NOT NULL,
  `totlkr` double NOT NULL,
  `trp_ls_Mkp` double NOT NULL,
  `baserate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_transport_reserves`
--

CREATE TABLE `tour_transport_reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `transport_reserve_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_types`
--

CREATE TABLE `tour_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_expenses`
--

CREATE TABLE `transport_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_reserves`
--

CREATE TABLE `transport_reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_quot_transport_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `frm_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trns_reserve_voucher_details`
--

CREATE TABLE `trns_reserve_voucher_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `trns_reserve_voucher_header_id` int(11) NOT NULL,
  `tour_transport_reserve_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trns_reserve_voucher_headers`
--

CREATE TABLE `trns_reserve_voucher_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `trns_voucher_no` int(11) NOT NULL,
  `tour_quot_trnsport_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `v_pos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pax` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `report_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `arrival_flight_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depature_flight_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` date DEFAULT NULL,
  `depature_time` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_datas`
--

CREATE TABLE `tr_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_statuses`
--

CREATE TABLE `type_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `privilege_list_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `vehicle_type_id` int(10) UNSIGNED DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence_exp_date` date NOT NULL,
  `insurance_exp_date` date NOT NULL,
  `mf_year` int(11) NOT NULL,
  `reg_year` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `rate_per_km` double NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accmd_allocate_guests`
--
ALTER TABLE `accmd_allocate_guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accmd_reservations`
--
ALTER TABLE `accmd_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accmd_resevation_voucher_details`
--
ALTER TABLE `accmd_resevation_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accmd_resevation_voucher_headers`
--
ALTER TABLE `accmd_resevation_voucher_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accmd_resevation_voucher_headers_hotel_voucher_no_unique` (`hotel_voucher_no`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_contacts`
--
ALTER TABLE `agent_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_inv_details`
--
ALTER TABLE `agent_inv_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_inv_headers`
--
ALTER TABLE `agent_inv_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agen_inv_nos`
--
ALTER TABLE `agen_inv_nos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compulsory_supliments`
--
ALTER TABLE `compulsory_supliments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries_markets`
--
ALTER TABLE `countries_markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distances`
--
ALTER TABLE `distances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_contacts`
--
ALTER TABLE `driver_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exception_returns`
--
ALTER TABLE `exception_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_qt_pax_setups`
--
ALTER TABLE `group_qt_pax_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_allocations`
--
ALTER TABLE `guest_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_contacts`
--
ALTER TABLE `guest_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_allocate_voucher_details`
--
ALTER TABLE `guide_allocate_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_allocate_voucher_headers`
--
ALTER TABLE `guide_allocate_voucher_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_allocations`
--
ALTER TABLE `guide_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_hotel_reserves`
--
ALTER TABLE `guide_hotel_reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_hotel_voucher_details`
--
ALTER TABLE `guide_hotel_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_hotel_voucher_headers`
--
ALTER TABLE `guide_hotel_voucher_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_languages`
--
ALTER TABLE `guide_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_lanuage_rates`
--
ALTER TABLE `guide_lanuage_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_rooms`
--
ALTER TABLE `guide_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_room_types`
--
ALTER TABLE `guide_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_types`
--
ALTER TABLE `guide_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_features`
--
ALTER TABLE `hotel_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_groups`
--
ALTER TABLE `hotel_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_hotel_features`
--
ALTER TABLE `hotel_hotel_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_multi`
--
ALTER TABLE `hotel_multi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_packages`
--
ALTER TABLE `hotel_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_package_optional_supliment`
--
ALTER TABLE `hotel_package_optional_supliment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_star_rates`
--
ALTER TABLE `hotel_star_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_types`
--
ALTER TABLE `hotel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerays`
--
ALTER TABLE `itinerays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineray__locations`
--
ALTER TABLE `itineray__locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_planes`
--
ALTER TABLE `meal_planes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellanies`
--
ALTER TABLE `miscellanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc_categories`
--
ALTER TABLE `misc_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc_rate_categories`
--
ALTER TABLE `misc_rate_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc_reserve_voucher_details`
--
ALTER TABLE `misc_reserve_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc_reserve_voucher_headers`
--
ALTER TABLE `misc_reserve_voucher_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `misc_reserve_voucher_headers_misc_voucher_no_unique` (`misc_voucher_no`);

--
-- Indexes for table `misc_types`
--
ALTER TABLE `misc_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis_tour_adv_req_details`
--
ALTER TABLE `mis_tour_adv_req_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis_tour_adv_req_headers`
--
ALTER TABLE `mis_tour_adv_req_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optional_supliments`
--
ALTER TABLE `optional_supliments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_periods`
--
ALTER TABLE `package_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_period_types`
--
ALTER TABLE `package_period_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_actions`
--
ALTER TABLE `privilege_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_lists`
--
ALTER TABLE `privilege_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_sections`
--
ALTER TABLE `privilege_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_codes`
--
ALTER TABLE `quotation_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_types`
--
ALTER TABLE `rate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_miscs`
--
ALTER TABLE `reservation_miscs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_multi`
--
ALTER TABLE `supplier_multi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_contact_details`
--
ALTER TABLE `sup_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_booking_lists`
--
ALTER TABLE `tour_booking_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_qoute_gp_vehicle_types`
--
ALTER TABLE `tour_qoute_gp_vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_qout_hotel_com_supliments`
--
ALTER TABLE `tour_qout_hotel_com_supliments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_qout_hotel_optm_supliments`
--
ALTER TABLE `tour_qout_hotel_optm_supliments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quotation_headers`
--
ALTER TABLE `tour_quotation_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_quotation_headers_tour_id_unique` (`tour_id`);

--
-- Indexes for table `tour_quotation_hotels`
--
ALTER TABLE `tour_quotation_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quotation_hotel_details`
--
ALTER TABLE `tour_quotation_hotel_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quotation_miscellaneouses`
--
ALTER TABLE `tour_quotation_miscellaneouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quotation_suppliers`
--
ALTER TABLE `tour_quotation_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quotation_transports`
--
ALTER TABLE `tour_quotation_transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quote_gp_guides_details`
--
ALTER TABLE `tour_quote_gp_guides_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quote_room_allocations`
--
ALTER TABLE `tour_quote_room_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quote_trp_exps`
--
ALTER TABLE `tour_quote_trp_exps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_distances`
--
ALTER TABLE `tour_quot_distances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_guides`
--
ALTER TABLE `tour_quot_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_guide_details`
--
ALTER TABLE `tour_quot_guide_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_locations`
--
ALTER TABLE `tour_quot_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_miscs`
--
ALTER TABLE `tour_quot_miscs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_quot_transports`
--
ALTER TABLE `tour_quot_transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_transport_reserves`
--
ALTER TABLE `tour_transport_reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_expenses`
--
ALTER TABLE `transport_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_reserves`
--
ALTER TABLE `transport_reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trns_reserve_voucher_details`
--
ALTER TABLE `trns_reserve_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trns_reserve_voucher_headers`
--
ALTER TABLE `trns_reserve_voucher_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_datas`
--
ALTER TABLE `tr_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_statuses`
--
ALTER TABLE `type_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_supplier_id_index` (`supplier_id`),
  ADD KEY `vehicles_vehicle_type_id_index` (`vehicle_type_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accmd_allocate_guests`
--
ALTER TABLE `accmd_allocate_guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accmd_reservations`
--
ALTER TABLE `accmd_reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accmd_resevation_voucher_details`
--
ALTER TABLE `accmd_resevation_voucher_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accmd_resevation_voucher_headers`
--
ALTER TABLE `accmd_resevation_voucher_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_contacts`
--
ALTER TABLE `agent_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_inv_details`
--
ALTER TABLE `agent_inv_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_inv_headers`
--
ALTER TABLE `agent_inv_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agen_inv_nos`
--
ALTER TABLE `agen_inv_nos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compulsory_supliments`
--
ALTER TABLE `compulsory_supliments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries_markets`
--
ALTER TABLE `countries_markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distances`
--
ALTER TABLE `distances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_contacts`
--
ALTER TABLE `driver_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exception_returns`
--
ALTER TABLE `exception_returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_qt_pax_setups`
--
ALTER TABLE `group_qt_pax_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_allocations`
--
ALTER TABLE `guest_allocations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_contacts`
--
ALTER TABLE `guest_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_allocate_voucher_details`
--
ALTER TABLE `guide_allocate_voucher_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_allocate_voucher_headers`
--
ALTER TABLE `guide_allocate_voucher_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_allocations`
--
ALTER TABLE `guide_allocations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_hotel_reserves`
--
ALTER TABLE `guide_hotel_reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_hotel_voucher_details`
--
ALTER TABLE `guide_hotel_voucher_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_hotel_voucher_headers`
--
ALTER TABLE `guide_hotel_voucher_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_languages`
--
ALTER TABLE `guide_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_lanuage_rates`
--
ALTER TABLE `guide_lanuage_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_rooms`
--
ALTER TABLE `guide_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_room_types`
--
ALTER TABLE `guide_room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guide_types`
--
ALTER TABLE `guide_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_features`
--
ALTER TABLE `hotel_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_groups`
--
ALTER TABLE `hotel_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_hotel_features`
--
ALTER TABLE `hotel_hotel_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_multi`
--
ALTER TABLE `hotel_multi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_packages`
--
ALTER TABLE `hotel_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_package_optional_supliment`
--
ALTER TABLE `hotel_package_optional_supliment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_star_rates`
--
ALTER TABLE `hotel_star_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itinerays`
--
ALTER TABLE `itinerays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itineray__locations`
--
ALTER TABLE `itineray__locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_planes`
--
ALTER TABLE `meal_planes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `miscellanies`
--
ALTER TABLE `miscellanies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc_categories`
--
ALTER TABLE `misc_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc_rate_categories`
--
ALTER TABLE `misc_rate_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc_reserve_voucher_details`
--
ALTER TABLE `misc_reserve_voucher_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc_reserve_voucher_headers`
--
ALTER TABLE `misc_reserve_voucher_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misc_types`
--
ALTER TABLE `misc_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mis_tour_adv_req_details`
--
ALTER TABLE `mis_tour_adv_req_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mis_tour_adv_req_headers`
--
ALTER TABLE `mis_tour_adv_req_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `optional_supliments`
--
ALTER TABLE `optional_supliments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_periods`
--
ALTER TABLE `package_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_period_types`
--
ALTER TABLE `package_period_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege_actions`
--
ALTER TABLE `privilege_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege_lists`
--
ALTER TABLE `privilege_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege_sections`
--
ALTER TABLE `privilege_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_codes`
--
ALTER TABLE `quotation_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_types`
--
ALTER TABLE `rate_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_miscs`
--
ALTER TABLE `reservation_miscs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_multi`
--
ALTER TABLE `supplier_multi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sup_contact_details`
--
ALTER TABLE `sup_contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_booking_lists`
--
ALTER TABLE `tour_booking_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_qoute_gp_vehicle_types`
--
ALTER TABLE `tour_qoute_gp_vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_qout_hotel_com_supliments`
--
ALTER TABLE `tour_qout_hotel_com_supliments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_qout_hotel_optm_supliments`
--
ALTER TABLE `tour_qout_hotel_optm_supliments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_headers`
--
ALTER TABLE `tour_quotation_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_hotels`
--
ALTER TABLE `tour_quotation_hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_hotel_details`
--
ALTER TABLE `tour_quotation_hotel_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_miscellaneouses`
--
ALTER TABLE `tour_quotation_miscellaneouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_suppliers`
--
ALTER TABLE `tour_quotation_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quotation_transports`
--
ALTER TABLE `tour_quotation_transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quote_gp_guides_details`
--
ALTER TABLE `tour_quote_gp_guides_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quote_room_allocations`
--
ALTER TABLE `tour_quote_room_allocations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quote_trp_exps`
--
ALTER TABLE `tour_quote_trp_exps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_distances`
--
ALTER TABLE `tour_quot_distances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_guides`
--
ALTER TABLE `tour_quot_guides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_guide_details`
--
ALTER TABLE `tour_quot_guide_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_locations`
--
ALTER TABLE `tour_quot_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_miscs`
--
ALTER TABLE `tour_quot_miscs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_quot_transports`
--
ALTER TABLE `tour_quot_transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_transport_reserves`
--
ALTER TABLE `tour_transport_reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_expenses`
--
ALTER TABLE `transport_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_reserves`
--
ALTER TABLE `transport_reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trns_reserve_voucher_details`
--
ALTER TABLE `trns_reserve_voucher_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trns_reserve_voucher_headers`
--
ALTER TABLE `trns_reserve_voucher_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_datas`
--
ALTER TABLE `tr_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_statuses`
--
ALTER TABLE `type_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
