-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 11:03 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `palito`
--

-- --------------------------------------------------------

--
-- Table structure for table `plt_article`
--

CREATE TABLE `plt_article` (
  `id` int(11) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `background_image` varchar(255) NOT NULL,
  `bg_image_mobile` varchar(255) DEFAULT NULL,
  `article_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `is_premium` tinyint(4) DEFAULT NULL COMMENT '1=Yes 0=No',
  `featured` tinyint(4) DEFAULT NULL COMMENT '1=Yes 0=No',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_article`
--

INSERT INTO `plt_article` (`id`, `article_image`, `background_image`, `bg_image_mobile`, `article_name`, `description`, `is_premium`, `featured`, `created_at`) VALUES
(2, '4678photo.jpg', '1968yellow.jpg', '579510s.jpg', 'What to Do in New York This Weekend What to Do in New York This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/Shoes_Category_men_casualshoes._V278980763_.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 1, 0, '2019-11-22 05:12:34'),
(3, '6456unionflag-620x349.png', '7956yellow.jpg', '85331s.jpg', 'What to Do in Las Vegas This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#2ecc71\"><em><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/e70bb5f7a0bc56abb637082957429bec.jpg\" style=\"height:100px; width:100px\" /></span></span></em></span></p>\r\n', 0, 1, '2019-11-22 05:12:34'),
(5, '806Flag_of_Russia.png', '2129yellow.jpg', '43432s.jpg', 'What to Do in Gujarat This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 0, '2019-11-22 05:12:34'),
(6, '7025two-column-blog-2.jpg', '832yellow.jpg', '86703s.jpg', 'What to Do in Canada This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#9b59b6\"><span style=\"font-size:16px\"><em><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/Shoes-for-Men-15.jpg\" style=\"height:100px; width:100px\" /></em></span></span></span></p>\r\n', 0, 1, '2019-11-22 05:12:34'),
(7, '7191two-column-blog-4.jpg', '2147yellow.jpg', '82734s.jpg', 'What to Do in England This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#4e5f70\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/SPOT3_220616%281%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 0, 1, '2019-11-22 05:12:34'),
(8, '6817two-column-blog-3.jpg', '8768yellow.jpg', '63575s.jpg', 'What to Do in Paris This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#f1c40f\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/e70bb5f7a0bc56abb637082957429bec%281%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 0, 0, '2019-11-23 12:11:30'),
(9, '7763images (1).jpg', '2867yellow.jpg', '69616s.jpg', 'What to Do in France This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/joy-low-to-help-men-canvas-shoes-blue-5659-4606985-f8ca49d86c4caaf7eb8930c4b12e5529-catalog_233%281%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 0, 0, '2019-11-22 05:12:34'),
(10, '4448Flag_of_the_United_States.svg.png', '8318yellow.jpg', '28077s.jpg', 'What to Do in Miami This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#e74c3c\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:16px\"><strong><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/Shoes_Category_men_casualshoes._V278980763_%281%29.jpg\" style=\"height:100px; width:100px\" /></strong></span></span></span></p>\r\n', 0, 0, '2019-11-22 05:12:34'),
(11, '9638images (2).jpg', '5096yellow.jpg', '41588s.jpg', 'What to Do in Phuket This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#16a085\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/Shoes-for-Men-15%281%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 0, 1, '2019-11-22 05:12:34'),
(12, '6703images (3).jpg', '6085yellow.jpg', '18899s.jpg', 'What to Do in Sydney This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#f39c12\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:16px\"><em><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/SPOT3_220616%282%29.jpg\" style=\"height:100px; width:100px\" /></em></span></span></span></p>\r\n', 0, 0, '2019-11-22 05:12:34'),
(13, '3378images.jpg', '1399yellow.jpg', '63911s.jpg', 'What to Do in Manali This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#d35400\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:16px\"><em><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/e70bb5f7a0bc56abb637082957429bec%282%29.jpg\" style=\"height:100px; width:100px\" /></em></span></span></span></p>\r\n', 0, 0, '2019-11-22 05:12:34'),
(14, '5425iStock_000088944359_Full-new.jpg', '5848yellow.jpg', '81512s.jpg', 'What to Do in Greece This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#7f8c8d\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/joy-low-to-help-men-canvas-shoes-blue-5659-4606985-f8ca49d86c4caaf7eb8930c4b12e5529-catalog_233%282%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 0, 0, '2019-11-22 05:12:34'),
(15, '6797nxZ3CQ6.jpg', '5846yellow.jpg', '652310s.jpg', 'What to Do in Ladakh This Weekend', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-family:Comic Sans MS,cursive\"><em><span style=\"font-size:16px\"><img alt=\"\" src=\"/web/palito/kcfinder/uploads/images/Shoes-for-Men-15%282%29.jpg\" style=\"height:100px; width:100px\" /></span></em></span></span></p>\r\n', 1, 1, '2019-11-23 10:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `plt_bookmark`
--

CREATE TABLE `plt_bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `article_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_bookmark`
--

INSERT INTO `plt_bookmark` (`id`, `user_id`, `article_id`) VALUES
(67, 74, 2),
(77, 74, 5);

-- --------------------------------------------------------

--
-- Table structure for table `plt_category`
--

CREATE TABLE `plt_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(4) DEFAULT '0' COMMENT '1=yes; 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_category`
--

INSERT INTO `plt_category` (`id`, `category_name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(6, 'test category', '2020-02-18 08:28:00', NULL, 0),
(7, 'computer', '2020-02-18 08:36:01', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plt_comment`
--

CREATE TABLE `plt_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `comment_content` text,
  `comment_remark` int(4) DEFAULT '0' COMMENT '1=like; 2=dislike; 0=none;',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(4) DEFAULT '0' COMMENT '1=yes; 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_comment`
--

INSERT INTO `plt_comment` (`id`, `post_id`, `user_id`, `comment_content`, `comment_remark`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 3, 74, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2020-03-03 14:11:40', NULL, 0),
(2, 3, 74, 'computer is .. .. .. .', 0, '2020-03-03 14:14:08', NULL, 0),
(3, 3, 76, 'liuohgddiusd sddfiuasd fasadfyuig;ol SLSDF SDiusdf sddfliuushsdf sdfsdfgsdjdsf sddflijbsddf glidfsg gsslidfg lia b;s dblsdfbga klyasd asdfias sdlhb asdluia kiuhgvasd lashdbf asduhi  asdiugasddf .', 0, '2020-03-04 06:03:12', NULL, 0),
(4, 3, 72, ';iouwe aiubasd asdfiuasddfiuasddf assdffiuasd ;iofs; dfgp;ioushjhabsd asujbsdfuio suiooknaah', 0, '2020-03-05 11:22:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plt_comment_liked`
--

CREATE TABLE `plt_comment_liked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_comment_liked`
--

INSERT INTO `plt_comment_liked` (`id`, `user_id`, `post_id`, `comment_id`) VALUES
(1, 74, 3, 3),
(3, 76, 3, 3),
(4, 76, 3, 2),
(5, 72, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `plt_liked`
--

CREATE TABLE `plt_liked` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `article_id` int(255) DEFAULT NULL,
  `liked` tinyint(4) DEFAULT NULL COMMENT '1=Yes 0=No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_liked`
--

INSERT INTO `plt_liked` (`id`, `user_id`, `article_id`, `liked`) VALUES
(19, 74, 2, NULL),
(20, 74, 5, NULL),
(21, 74, 15, NULL),
(22, 74, 11, NULL),
(24, 76, 11, NULL),
(25, 74, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plt_package`
--

CREATE TABLE `plt_package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `is_monthly` int(4) DEFAULT NULL COMMENT '1=yes; 0=no',
  `is_deleted` int(4) DEFAULT NULL COMMENT '1=yes; 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_package`
--

INSERT INTO `plt_package` (`id`, `name`, `package_id`, `price`, `is_monthly`, `is_deleted`) VALUES
(1, 'palito_premium', 'plan_GR7JhRAfmAYrTq', '1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plt_payment`
--

CREATE TABLE `plt_payment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_payment`
--

INSERT INTO `plt_payment` (`id`, `email`, `amount`, `currency_code`, `txn_id`, `payment_status`, `payment_response`, `created_at`) VALUES
(3, 'ram@gmail.com', '100', 'inr', 'txn_1FgpghEpB2Pg6zC3wUCTez0Q', '1', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_1FgpggEpB2Pg6zC3FKACw2ou\",\n    \"object\": \"charge\",\n    \"amount\": 100,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_1FgpghEpB2Pg6zC3wUCTez0Q\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"ram@gmail.com\",\n        \"phone\": null\n    },\n    \"captured\": true,\n    \"created\": 1574242886,\n    \"currency\": \"inr\",\n    \"customer\": \"cus_GDGDEcSKWSiSH3\",\n    \"description\": null,\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 10,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1FgpgcEpB2Pg6zC3NCPmPD0P\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 2,\n            \"exp_year\": 2023,\n            \"fingerprint\": \"LXtsxewEYDOHA1Ky\",\n            \"funding\": \"credit\",\n            \"installments\": null,\n            \"last4\": \"4242\",\n            \"network\": \"visa\",\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1FefNFEpB2Pg6zC3\\/ch_1FgpggEpB2Pg6zC3FKACw2ou\\/rcpt_GDGDGlZ4243i5uahi2dj8OUXwPosteU\",\n    \"refunded\": false,\n    \"refunds\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/charges\\/ch_1FgpggEpB2Pg6zC3FKACw2ou\\/refunds\"\n    },\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1FgpgcEpB2Pg6zC3NCPmPD0P\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": \"cus_GDGDEcSKWSiSH3\",\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 2,\n        \"exp_year\": 2023,\n        \"fingerprint\": \"LXtsxewEYDOHA1Ky\",\n        \"funding\": \"credit\",\n        \"last4\": \"4242\",\n        \"metadata\": [],\n        \"name\": \"ram@gmail.com\",\n        \"tokenization_method\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', '2019-11-20 09:41:25'),
(4, 'aaa@gmail.com', '100', 'inr', 'txn_1FgplCEpB2Pg6zC3EnOcEhl9', '1', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_1FgplBEpB2Pg6zC3y8pczRib\",\n    \"object\": \"charge\",\n    \"amount\": 100,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_1FgplCEpB2Pg6zC3EnOcEhl9\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"aaa@gmail.com\",\n        \"phone\": null\n    },\n    \"captured\": true,\n    \"created\": 1574243165,\n    \"currency\": \"inr\",\n    \"customer\": \"cus_GDGHOSADGBmXyk\",\n    \"description\": null,\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 10,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1Fgpl7EpB2Pg6zC3U2MppACl\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 4,\n            \"exp_year\": 2024,\n            \"fingerprint\": \"LXtsxewEYDOHA1Ky\",\n            \"funding\": \"credit\",\n            \"installments\": null,\n            \"last4\": \"4242\",\n            \"network\": \"visa\",\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1FefNFEpB2Pg6zC3\\/ch_1FgplBEpB2Pg6zC3y8pczRib\\/rcpt_GDGHtyPGnYzIxZd4HoIfrMFcrPnTgm7\",\n    \"refunded\": false,\n    \"refunds\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/charges\\/ch_1FgplBEpB2Pg6zC3y8pczRib\\/refunds\"\n    },\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1Fgpl7EpB2Pg6zC3U2MppACl\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": \"cus_GDGHOSADGBmXyk\",\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 4,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"LXtsxewEYDOHA1Ky\",\n        \"funding\": \"credit\",\n        \"last4\": \"4242\",\n        \"metadata\": [],\n        \"name\": \"aaa@gmail.com\",\n        \"tokenization_method\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', '2019-11-20 09:46:04'),
(5, 'mahavirsinh.amcodr@gmail.com', '100', 'inr', 'txn_1FgpnfEpB2Pg6zC3U5dTi3FQ', '1', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_1FgpneEpB2Pg6zC3hgJ16WIf\",\n    \"object\": \"charge\",\n    \"amount\": 100,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_1FgpnfEpB2Pg6zC3U5dTi3FQ\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"mahavirsinh.amcodr@gmail.com\",\n        \"phone\": null\n    },\n    \"captured\": true,\n    \"created\": 1574243318,\n    \"currency\": \"inr\",\n    \"customer\": \"cus_GDGKdtrdOCiSCz\",\n    \"description\": null,\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 54,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1FgpnaEpB2Pg6zC3hXZJld8C\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"brand\": \"mastercard\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 9,\n            \"exp_year\": 2027,\n            \"fingerprint\": \"vwPNIEXbNu580BUu\",\n            \"funding\": \"credit\",\n            \"installments\": null,\n            \"last4\": \"4444\",\n            \"network\": \"mastercard\",\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1FefNFEpB2Pg6zC3\\/ch_1FgpneEpB2Pg6zC3hgJ16WIf\\/rcpt_GDGKwVa7ik8thVEMhr0jIIdZH2Dt1Rv\",\n    \"refunded\": false,\n    \"refunds\": {\n        \"object\": \"list\",\n        \"data\": [],\n        \"has_more\": false,\n        \"total_count\": 0,\n        \"url\": \"\\/v1\\/charges\\/ch_1FgpneEpB2Pg6zC3hgJ16WIf\\/refunds\"\n    },\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1FgpnaEpB2Pg6zC3hXZJld8C\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"MasterCard\",\n        \"country\": \"US\",\n        \"customer\": \"cus_GDGKdtrdOCiSCz\",\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 9,\n        \"exp_year\": 2027,\n        \"fingerprint\": \"vwPNIEXbNu580BUu\",\n        \"funding\": \"credit\",\n        \"last4\": \"4444\",\n        \"metadata\": [],\n        \"name\": \"mahavirsinh.amcodr@gmail.com\",\n        \"tokenization_method\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', '2019-11-20 09:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `plt_post`
--

CREATE TABLE `plt_post` (
  `id` int(11) NOT NULL,
  `category_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` text,
  `post_views` int(255) DEFAULT '0',
  `post_remark` int(4) DEFAULT '0' COMMENT '1=like; 2=dislike; 0=none;',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(4) DEFAULT '0' COMMENT '1=yes; 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_post`
--

INSERT INTO `plt_post` (`id`, `category_id`, `user_id`, `post_title`, `post_content`, `post_views`, `post_remark`, `created_at`, `updated_at`, `is_deleted`) VALUES
(3, 7, 74, 'title 1', 'what is computer?', 36, 0, '2020-02-18 12:18:03', '2020-03-12 05:26:25', 0),
(4, 6, 74, 'title 2', 'afasa', 5, 0, '2020-02-18 13:10:24', '2021-02-11 11:19:17', 0),
(5, 7, 74, 'iuwiuhwiu?', 'asuhiaussf asiuasiduass safiub asias asdfias asiouhwplmddf sdoisdf asdfoiasdddfasf asfas', 1, 0, '2020-02-18 13:23:51', '2020-03-05 11:32:30', 0),
(6, 6, 76, 'anything test', 'what i  can sduiih sdfiouha asdfiuhasd asdfiugasdd ;opidfgkdf sdfggiulhsdfg dsfggliuhbsdfkj sdfguidfg dfliuudfbfv?', 1, 0, '2020-03-04 06:02:31', '2020-03-05 11:12:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plt_post_liked`
--

CREATE TABLE `plt_post_liked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_post_liked`
--

INSERT INTO `plt_post_liked` (`id`, `user_id`, `post_id`) VALUES
(1, 74, 3),
(2, 72, 3);

-- --------------------------------------------------------

--
-- Table structure for table `plt_reply`
--

CREATE TABLE `plt_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `reply_content` text,
  `reply_remark` int(4) DEFAULT '0' COMMENT '1=like; 2=dislike; 0=none;',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(4) DEFAULT '0' COMMENT '1=yes; 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plt_terms`
--

CREATE TABLE `plt_terms` (
  `id` int(11) NOT NULL,
  `conditions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_terms`
--

INSERT INTO `plt_terms` (`id`, `conditions`) VALUES
(2, 'condition 1'),
(3, 'condition 2'),
(4, 'condition 3');

-- --------------------------------------------------------

--
-- Table structure for table `plt_transaction`
--

CREATE TABLE `plt_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `subscription_id` varchar(255) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `subscription_date` datetime DEFAULT NULL,
  `sub_period_start` datetime DEFAULT NULL,
  `sub_period_end` datetime DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `response` text,
  `refundable_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plt_transaction`
--

INSERT INTO `plt_transaction` (`id`, `user_id`, `subscription_id`, `invoice_id`, `subscription_date`, `sub_period_start`, `sub_period_end`, `transaction_id`, `package_id`, `amount`, `response`, `refundable_amount`, `status`) VALUES
(1, 74, '0', '0', '2019-12-27 11:13:11', '2019-12-27 11:13:10', '2020-01-27 11:13:10', '0', '1', '1', '{\"id\":\"sub_GR84efNT3Tgvgr\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing_cycle_anchor\":1577441590,\"billing_thresholds\":null,\"cancel_at\":null,\"cancel_at_period_end\":false,\"canceled_at\":null,\"collection_method\":\"charge_automatically\",\"created\":1577441590,\"current_period_end\":1580119990,\"current_period_start\":1577441590,\"customer\":\"cus_GR848DulXqVTIL\",\"days_until_due\":null,\"default_payment_method\":null,\"default_source\":null,\"default_tax_rates\":[],\"discount\":null,\"ended_at\":null,\"invoice_customer_balance_settings\":{\"consume_applied_balance_on_void\":true},\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_GR84kC1EylMQPL\",\"object\":\"subscription_item\",\"billing_thresholds\":null,\"created\":1577441590,\"metadata\":[],\"plan\":{\"id\":\"plan_GR7JhRAfmAYrTq\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"amount_decimal\":\"100\",\"billing_scheme\":\"per_unit\",\"created\":1577438770,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Monthly\",\"product\":\"prod_GR7JyofQqjcw47\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_GR84efNT3Tgvgr\",\"tax_rates\":[]}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_GR84efNT3Tgvgr\"},\"latest_invoice\":\"in_1FuFogEpB2Pg6zC39YKwoc9j\",\"livemode\":false,\"metadata\":[],\"next_pending_invoice_item_invoice\":null,\"pending_invoice_item_interval\":null,\"pending_setup_intent\":null,\"plan\":{\"id\":\"plan_GR7JhRAfmAYrTq\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"amount_decimal\":\"100\",\"billing_scheme\":\"per_unit\",\"created\":1577438770,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Monthly\",\"product\":\"prod_GR7JyofQqjcw47\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"schedule\":null,\"start_date\":1577441590,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', NULL, 'active'),
(2, 74, 'sub_GR8Ahd7Ermt0Du', 'in_1FuFttEpB2Pg6zC3ToZ0F5ra', '2019-12-27 11:18:34', '2019-12-27 11:18:33', '2020-01-27 11:18:33', 'ch_1FuFttEpB2Pg6zC327E00YGz', '1', '1', '{\"id\":\"sub_GR8Ahd7Ermt0Du\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing_cycle_anchor\":1577441913,\"billing_thresholds\":null,\"cancel_at\":null,\"cancel_at_period_end\":false,\"canceled_at\":null,\"collection_method\":\"charge_automatically\",\"created\":1577441913,\"current_period_end\":1580120313,\"current_period_start\":1577441913,\"customer\":\"cus_GR8Aq7t6ggjuAK\",\"days_until_due\":null,\"default_payment_method\":null,\"default_source\":null,\"default_tax_rates\":[],\"discount\":null,\"ended_at\":null,\"invoice_customer_balance_settings\":{\"consume_applied_balance_on_void\":true},\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_GR8A7ZcSLR5y34\",\"object\":\"subscription_item\",\"billing_thresholds\":null,\"created\":1577441913,\"metadata\":[],\"plan\":{\"id\":\"plan_GR7JhRAfmAYrTq\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"amount_decimal\":\"100\",\"billing_scheme\":\"per_unit\",\"created\":1577438770,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Monthly\",\"product\":\"prod_GR7JyofQqjcw47\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_GR8Ahd7Ermt0Du\",\"tax_rates\":[]}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_GR8Ahd7Ermt0Du\"},\"latest_invoice\":\"in_1FuFttEpB2Pg6zC3ToZ0F5ra\",\"livemode\":false,\"metadata\":[],\"next_pending_invoice_item_invoice\":null,\"pending_invoice_item_interval\":null,\"pending_setup_intent\":null,\"plan\":{\"id\":\"plan_GR7JhRAfmAYrTq\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"amount_decimal\":\"100\",\"billing_scheme\":\"per_unit\",\"created\":1577438770,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Monthly\",\"product\":\"prod_GR7JyofQqjcw47\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"schedule\":null,\"start_date\":1577441913,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `plt_user`
--

CREATE TABLE `plt_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(3) DEFAULT '2' COMMENT '1=admin; 2=User',
  `terms_id` varchar(255) DEFAULT NULL,
  `is_premium` tinyint(4) DEFAULT '0' COMMENT '1=Yes 0=No',
  `is_activate` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Yes 0=No',
  `package_id` varchar(255) DEFAULT NULL,
  `subscription_id` varchar(255) DEFAULT NULL,
  `subscription_date` datetime DEFAULT NULL,
  `sub_period_start` datetime DEFAULT NULL,
  `sub_period_end` datetime DEFAULT NULL,
  `forgot_token_expire` varchar(255) DEFAULT NULL,
  `forgot_password_token` varchar(255) DEFAULT NULL,
  `is_deleted` int(3) DEFAULT '0' COMMENT '0 = no; 1 = yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plt_user`
--

INSERT INTO `plt_user` (`id`, `username`, `email`, `password`, `user_type`, `terms_id`, `is_premium`, `is_activate`, `package_id`, `subscription_id`, `subscription_date`, `sub_period_start`, `sub_period_end`, `forgot_token_expire`, `forgot_password_token`, `is_deleted`) VALUES
(72, 'Radhe', 'radheshyam.amcodr@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2', 0, 1, NULL, NULL, NULL, NULL, NULL, '1573028160', '380d50679387fcfa0846d78e0e4a1f05', 0),
(73, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '0', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(74, 'Mahavirsinh', 'mahavirsinh.amcodr@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2,4', 1, 1, '1', 'sub_GR8Ahd7Ermt0Du', '2019-12-27 11:18:34', '2019-12-27 11:18:33', '2020-01-27 11:18:33', '1574514054', '11cbde18dd319599298ba22bb5a81f16', 0),
(76, 'Harsh', 'harsh@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2,3,4', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plt_article`
--
ALTER TABLE `plt_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_bookmark`
--
ALTER TABLE `plt_bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_category`
--
ALTER TABLE `plt_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_comment`
--
ALTER TABLE `plt_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_comment_liked`
--
ALTER TABLE `plt_comment_liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_liked`
--
ALTER TABLE `plt_liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_package`
--
ALTER TABLE `plt_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_payment`
--
ALTER TABLE `plt_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_post`
--
ALTER TABLE `plt_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_post_liked`
--
ALTER TABLE `plt_post_liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_reply`
--
ALTER TABLE `plt_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_terms`
--
ALTER TABLE `plt_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_transaction`
--
ALTER TABLE `plt_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plt_user`
--
ALTER TABLE `plt_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plt_article`
--
ALTER TABLE `plt_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plt_bookmark`
--
ALTER TABLE `plt_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `plt_category`
--
ALTER TABLE `plt_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plt_comment`
--
ALTER TABLE `plt_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plt_comment_liked`
--
ALTER TABLE `plt_comment_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plt_liked`
--
ALTER TABLE `plt_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `plt_package`
--
ALTER TABLE `plt_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plt_payment`
--
ALTER TABLE `plt_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plt_post`
--
ALTER TABLE `plt_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plt_post_liked`
--
ALTER TABLE `plt_post_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plt_reply`
--
ALTER TABLE `plt_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plt_terms`
--
ALTER TABLE `plt_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plt_transaction`
--
ALTER TABLE `plt_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plt_user`
--
ALTER TABLE `plt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
