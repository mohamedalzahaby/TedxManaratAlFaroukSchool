-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 10:09 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedxmanaratalfaroukschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `openingDate` date NOT NULL,
  `closingDate` date NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

CREATE TABLE `contactnumber` (
  `id` int(11) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `contactTypeId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacttype`
--

CREATE TABLE `contacttype` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `conversionValue` int(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datatypes`
--

CREATE TABLE `datatypes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datepurchase`
--

CREATE TABLE `datepurchase` (
  `id` int(11) NOT NULL,
  `dateTime` date NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jobDescribtion` text NOT NULL,
  `boardId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departmentform`
--

CREATE TABLE `departmentform` (
  `id` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `registrationFormId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `eventStart` time NOT NULL,
  `eventEnd` time NOT NULL,
  `description` text NOT NULL,
  `addressId` int(11) NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `boardId` int(11) NOT NULL,
  `isRegisterationOpened` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventform`
--

CREATE TABLE `eventform` (
  `id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `registerationFormId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `physicalName` varchar(255) NOT NULL,
  `friendlyName` varchar(255) NOT NULL,
  `htmlCode` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `addressId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturecontactinfo`
--

CREATE TABLE `manufacturecontactinfo` (
  `id` int(11) NOT NULL,
  `manufactureId` int(11) NOT NULL,
  `contactNumberId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `messageTemplate` text NOT NULL,
  `messageTypeId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messagetype`
--

CREATE TABLE `messagetype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messageuser`
--

CREATE TABLE `messageuser` (
  `id` int(11) NOT NULL,
  `messageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `favorite` varchar(255) NOT NULL,
  `isReaded` tinyint(1) NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dataTypeId` int(30) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodoptions`
--

CREATE TABLE `paymentmethodoptions` (
  `id` int(11) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `paymentOptionId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodoptionvalue`
--

CREATE TABLE `paymentmethodoptionvalue` (
  `id` int(11) NOT NULL,
  `paymentMethodOptionId` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `value` text NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `currencyId` int(11) NOT NULL DEFAULT '1',
  `productTypeId` int(11) NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productoptionsvalue`
--

CREATE TABLE `productoptionsvalue` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `productSelectedOptionsId` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productselectedoptions`
--

CREATE TABLE `productselectedoptions` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `optionsId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `datePurchaseId` int(11) NOT NULL,
  `manufactureId` int(11) NOT NULL,
  `deliveryPersonId` int(11) NOT NULL,
  `PaymentMethodId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `id` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registerationdetails`
--

CREATE TABLE `registerationdetails` (
  `id` int(11) NOT NULL,
  `registerationId` int(11) NOT NULL,
  `boardId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `registrationFormId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registerationform`
--

CREATE TABLE `registerationform` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `registrationFormTypeId` int(11) NOT NULL,
  `registerAs` int(11) NOT NULL,
  `isRegistrationClosed` tinyint(1) NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrationformoptions`
--

CREATE TABLE `registrationformoptions` (
  `rid` int(11) NOT NULL,
  `registrationFormId` int(11) NOT NULL,
  `optionId` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrationformoptionsvalue`
--

CREATE TABLE `registrationformoptionsvalue` (
  `id` int(11) NOT NULL,
  `registrationFormOptionsId` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `registrationDetailsId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrationformtype`
--

CREATE TABLE `registrationformtype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isForEvent` tinyint(1) NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userTypeId` int(11) NOT NULL DEFAULT '1',
  `ismale` tinyint(1) NOT NULL DEFAULT '0',
  `birthDate` date NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usercontactinfo`
--

CREATE TABLE `usercontactinfo` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `contactNumberId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinterests`
--

CREATE TABLE `userinterests` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `interestsId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usersnotifications`
--

CREATE TABLE `usersnotifications` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `notificationId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertypelinks`
--

CREATE TABLE `usertypelinks` (
  `id` int(11) NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `linkId` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academicYearId` (`academicYearId`);

--
-- Indexes for table `contactnumber`
--
ALTER TABLE `contactnumber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phoneTypeId` (`contactTypeId`);

--
-- Indexes for table `contacttype`
--
ALTER TABLE `contacttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatypes`
--
ALTER TABLE `datatypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datepurchase`
--
ALTER TABLE `datepurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boardId` (`boardId`);

--
-- Indexes for table `departmentform`
--
ALTER TABLE `departmentform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentId` (`departmentId`),
  ADD KEY `registerationFormId` (`registrationFormId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressId` (`addressId`),
  ADD KEY `academicYearId` (`academicYearId`),
  ADD KEY `boardId` (`boardId`);

--
-- Indexes for table `eventform`
--
ALTER TABLE `eventform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `registerationFormId` (`registerationFormId`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressId` (`addressId`);

--
-- Indexes for table `manufacturecontactinfo`
--
ALTER TABLE `manufacturecontactinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactNumberId` (`contactNumberId`),
  ADD KEY `manufactureId` (`manufactureId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messageTypeId` (`messageTypeId`);

--
-- Indexes for table `messagetype`
--
ALTER TABLE `messagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageuser`
--
ALTER TABLE `messageuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messageId` (`messageId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dataType` (`dataTypeId`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentMethodId` (`paymentMethodId`),
  ADD KEY `paymentOptionId` (`paymentOptionId`);

--
-- Indexes for table `paymentmethodoptionvalue`
--
ALTER TABLE `paymentmethodoptionvalue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaseId` (`purchaseId`),
  ADD KEY `paymentMethodOptionId` (`paymentMethodOptionId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencyId` (`currencyId`),
  ADD KEY `productTypeId` (`productTypeId`);

--
-- Indexes for table `productoptionsvalue`
--
ALTER TABLE `productoptionsvalue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productSelectedOptionsId` (`productSelectedOptionsId`),
  ADD KEY `purchaseId` (`purchaseId`);

--
-- Indexes for table `productselectedoptions`
--
ALTER TABLE `productselectedoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `optionsId` (`optionsId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `datePurchaseId` (`datePurchaseId`),
  ADD KEY `PaymentMethodId` (`PaymentMethodId`),
  ADD KEY `manufactureId` (`manufactureId`),
  ADD KEY `deliveryPersonId` (`deliveryPersonId`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaseId` (`purchaseId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `statusId` (`statusId`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `academicYearId` (`academicYearId`);

--
-- Indexes for table `registerationdetails`
--
ALTER TABLE `registerationdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registerationId` (`registerationId`),
  ADD KEY `boardId` (`boardId`),
  ADD KEY `statusId` (`statusId`),
  ADD KEY `registrationFormId` (`registrationFormId`);

--
-- Indexes for table `registerationform`
--
ALTER TABLE `registerationform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registerAs` (`registerAs`),
  ADD KEY `registrationFormTypeId` (`registrationFormTypeId`);

--
-- Indexes for table `registrationformoptions`
--
ALTER TABLE `registrationformoptions`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `optionId` (`optionId`),
  ADD KEY `registrationFormId` (`registrationFormId`);

--
-- Indexes for table `registrationformoptionsvalue`
--
ALTER TABLE `registrationformoptionsvalue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrationId` (`registrationDetailsId`),
  ADD KEY `registerationDetailsOptionsId` (`registrationFormOptionsId`);

--
-- Indexes for table `registrationformtype`
--
ALTER TABLE `registrationformtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTypeId` (`userTypeId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usercontactinfo`
--
ALTER TABLE `usercontactinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `contactNumberId` (`contactNumberId`);

--
-- Indexes for table `userinterests`
--
ALTER TABLE `userinterests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `interestsId` (`interestsId`);

--
-- Indexes for table `usersnotifications`
--
ALTER TABLE `usersnotifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificationId` (`notificationId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTypeId` (`userTypeId`),
  ADD KEY `linkId` (`linkId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactnumber`
--
ALTER TABLE `contactnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacttype`
--
ALTER TABLE `contacttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datatypes`
--
ALTER TABLE `datatypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datepurchase`
--
ALTER TABLE `datepurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmentform`
--
ALTER TABLE `departmentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventform`
--
ALTER TABLE `eventform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturecontactinfo`
--
ALTER TABLE `manufacturecontactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagetype`
--
ALTER TABLE `messagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messageuser`
--
ALTER TABLE `messageuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethodoptionvalue`
--
ALTER TABLE `paymentmethodoptionvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productoptionsvalue`
--
ALTER TABLE `productoptionsvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productselectedoptions`
--
ALTER TABLE `productselectedoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registerationdetails`
--
ALTER TABLE `registerationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registerationform`
--
ALTER TABLE `registerationform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrationformoptions`
--
ALTER TABLE `registrationformoptions`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrationformoptionsvalue`
--
ALTER TABLE `registrationformoptionsvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrationformtype`
--
ALTER TABLE `registrationformtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usercontactinfo`
--
ALTER TABLE `usercontactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinterests`
--
ALTER TABLE `userinterests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersnotifications`
--
ALTER TABLE `usersnotifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`academicYearId`) REFERENCES `academicyear` (`id`),
  ADD CONSTRAINT `board_ibfk_2` FOREIGN KEY (`academicYearId`) REFERENCES `academicyear` (`id`);

--
-- Constraints for table `contactnumber`
--
ALTER TABLE `contactnumber`
  ADD CONSTRAINT `contactnumber_ibfk_1` FOREIGN KEY (`contactTypeId`) REFERENCES `contacttype` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`boardId`) REFERENCES `board` (`id`);

--
-- Constraints for table `departmentform`
--
ALTER TABLE `departmentform`
  ADD CONSTRAINT `departmentform_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `departmentform_ibfk_2` FOREIGN KEY (`registrationFormId`) REFERENCES `registerationform` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`academicYearId`) REFERENCES `academicyear` (`id`),
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`boardId`) REFERENCES `board` (`id`),
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`addressId`) REFERENCES `address` (`id`);

--
-- Constraints for table `eventform`
--
ALTER TABLE `eventform`
  ADD CONSTRAINT `eventform_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `eventform_ibfk_2` FOREIGN KEY (`registerationFormId`) REFERENCES `registerationform` (`id`);

--
-- Constraints for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD CONSTRAINT `manufacture_ibfk_2` FOREIGN KEY (`addressId`) REFERENCES `address` (`id`);

--
-- Constraints for table `manufacturecontactinfo`
--
ALTER TABLE `manufacturecontactinfo`
  ADD CONSTRAINT `manufacturecontactinfo_ibfk_2` FOREIGN KEY (`contactNumberId`) REFERENCES `contactnumber` (`id`),
  ADD CONSTRAINT `manufacturecontactinfo_ibfk_3` FOREIGN KEY (`manufactureId`) REFERENCES `manufacture` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`messageTypeId`) REFERENCES `messagetype` (`id`);

--
-- Constraints for table `messageuser`
--
ALTER TABLE `messageuser`
  ADD CONSTRAINT `messageuser_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `messageuser_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `messages` (`id`);

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`dataTypeId`) REFERENCES `datatypes` (`id`);

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  ADD CONSTRAINT `paymentmethodoptions_ibfk_1` FOREIGN KEY (`paymentMethodId`) REFERENCES `paymentmethod` (`id`),
  ADD CONSTRAINT `paymentmethodoptions_ibfk_2` FOREIGN KEY (`paymentOptionId`) REFERENCES `options` (`id`);

--
-- Constraints for table `paymentmethodoptionvalue`
--
ALTER TABLE `paymentmethodoptionvalue`
  ADD CONSTRAINT `paymentmethodoptionvalue_ibfk_1` FOREIGN KEY (`purchaseId`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `paymentmethodoptionvalue_ibfk_2` FOREIGN KEY (`paymentMethodOptionId`) REFERENCES `paymentmethodoptions` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`currencyId`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`productTypeId`) REFERENCES `producttype` (`id`);

--
-- Constraints for table `productoptionsvalue`
--
ALTER TABLE `productoptionsvalue`
  ADD CONSTRAINT `productoptionsvalue_ibfk_1` FOREIGN KEY (`productSelectedOptionsId`) REFERENCES `productselectedoptions` (`id`),
  ADD CONSTRAINT `productoptionsvalue_ibfk_2` FOREIGN KEY (`purchaseId`) REFERENCES `purchase` (`id`);

--
-- Constraints for table `productselectedoptions`
--
ALTER TABLE `productselectedoptions`
  ADD CONSTRAINT `productselectedoptions_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `productselectedoptions_ibfk_2` FOREIGN KEY (`optionsId`) REFERENCES `options` (`id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`datePurchaseId`) REFERENCES `datepurchase` (`id`),
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`PaymentMethodId`) REFERENCES `paymentmethod` (`id`),
  ADD CONSTRAINT `purchase_ibfk_4` FOREIGN KEY (`manufactureId`) REFERENCES `manufacture` (`id`),
  ADD CONSTRAINT `purchase_ibfk_5` FOREIGN KEY (`deliveryPersonId`) REFERENCES `user` (`id`);

--
-- Constraints for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD CONSTRAINT `purchasedetails_ibfk_1` FOREIGN KEY (`purchaseId`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `purchasedetails_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `purchasedetails_ibfk_3` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`);

--
-- Constraints for table `registeration`
--
ALTER TABLE `registeration`
  ADD CONSTRAINT `registeration_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `registeration_ibfk_2` FOREIGN KEY (`academicYearId`) REFERENCES `academicyear` (`id`);

--
-- Constraints for table `registerationdetails`
--
ALTER TABLE `registerationdetails`
  ADD CONSTRAINT `registerationdetails_ibfk_1` FOREIGN KEY (`registerationId`) REFERENCES `registeration` (`id`),
  ADD CONSTRAINT `registerationdetails_ibfk_2` FOREIGN KEY (`boardId`) REFERENCES `board` (`id`),
  ADD CONSTRAINT `registerationdetails_ibfk_3` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `registerationdetails_ibfk_5` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `registerationdetails_ibfk_6` FOREIGN KEY (`registrationFormId`) REFERENCES `registerationform` (`id`);

--
-- Constraints for table `registerationform`
--
ALTER TABLE `registerationform`
  ADD CONSTRAINT `registerationform_ibfk_1` FOREIGN KEY (`registerAs`) REFERENCES `usertype` (`id`),
  ADD CONSTRAINT `registerationform_ibfk_2` FOREIGN KEY (`registrationFormTypeId`) REFERENCES `registrationformtype` (`id`);

--
-- Constraints for table `registrationformoptions`
--
ALTER TABLE `registrationformoptions`
  ADD CONSTRAINT `registrationformoptions_ibfk_1` FOREIGN KEY (`optionId`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `registrationformoptions_ibfk_2` FOREIGN KEY (`registrationFormId`) REFERENCES `registerationform` (`id`);

--
-- Constraints for table `registrationformoptionsvalue`
--
ALTER TABLE `registrationformoptionsvalue`
  ADD CONSTRAINT `registrationformoptionsvalue_ibfk_2` FOREIGN KEY (`registrationFormOptionsId`) REFERENCES `registrationformoptions` (`rid`),
  ADD CONSTRAINT `registrationformoptionsvalue_ibfk_3` FOREIGN KEY (`registrationDetailsId`) REFERENCES `registerationdetails` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`);

--
-- Constraints for table `usercontactinfo`
--
ALTER TABLE `usercontactinfo`
  ADD CONSTRAINT `usercontactinfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usercontactinfo_ibfk_2` FOREIGN KEY (`contactNumberId`) REFERENCES `contactnumber` (`id`);

--
-- Constraints for table `userinterests`
--
ALTER TABLE `userinterests`
  ADD CONSTRAINT `userinterests_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `userinterests_ibfk_2` FOREIGN KEY (`interestsId`) REFERENCES `interests` (`id`);

--
-- Constraints for table `usersnotifications`
--
ALTER TABLE `usersnotifications`
  ADD CONSTRAINT `usersnotifications_ibfk_2` FOREIGN KEY (`notificationId`) REFERENCES `notification` (`id`),
  ADD CONSTRAINT `usersnotifications_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `password` (`userId`);

--
-- Constraints for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD CONSTRAINT `usertypelinks_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`),
  ADD CONSTRAINT `usertypelinks_ibfk_2` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`),
  ADD CONSTRAINT `usertypelinks_ibfk_3` FOREIGN KEY (`linkId`) REFERENCES `links` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
