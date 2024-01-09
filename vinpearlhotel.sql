-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28
=======
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 11:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6
>>>>>>> Last Update

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< HEAD
-- Database: `vinpearlhotel`
=======
-- Database: `bluebirdhotel`
>>>>>>> Last Update
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE `emp_login` (
  `empid` int(100) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL,
  `Emp_Password` varchar(50) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`empid`, `Emp_Email`, `Emp_Password`) VALUES
(1, 'Admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `NoofRoom` int(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `noofdays` int(30) NOT NULL,
  `roomtotal` double(8,2) NOT NULL,
  `bedtotal` double(8,2) NOT NULL,
  `meal` varchar(30) NOT NULL,
  `mealtotal` double(8,2) NOT NULL,
  `finaltotal` double(8,2) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Name`, `Email`, `RoomType`, `Bed`, `NoofRoom`, `cin`, `cout`, `noofdays`, `roomtotal`, `bedtotal`, `meal`, `mealtotal`, `finaltotal`) VALUES
<<<<<<< HEAD
(51, 'Minh Ngo', 'minh@gmail.com', 'Guest House', 'Quad', 1, '2023-12-28', '2024-01-05', 8, 12000.00, 480.00, 'Breakfast', 960.00, 13440.00),
(58, 'Ngo Quang A', 'A@gmail.com', 'Superior Room', 'Single', 1, '2024-01-05', '2024-01-07', 2, 6000.00, 60.00, 'Full Board', 240.00, 6300.00),
(59, 'Ngo Quang B', 'B@gmail.com', 'Deluxe Room', 'Single', 2, '2024-01-05', '2024-01-08', 3, 12000.00, 120.00, 'Breakfast', 120.00, 12240.00);
=======
(41, 'Bao Ngo', 'bao992001pth@gmail.com', 'Single Room', 'Single', 1, '2023-12-09', '2024-01-105', 1, 1000.00, 10.00, 'Room only', 0.00, 1010.00);
>>>>>>> Last Update

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `bedding` varchar(50) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`) VALUES
<<<<<<< HEAD
=======
(4, 'Superior Room', 'Single'),
(6, 'Superior Room', 'Triple'),
>>>>>>> Last Update
(7, 'Superior Room', 'Quad'),
(8, 'Deluxe Room', 'Single'),
(9, 'Deluxe Room', 'Double'),
(10, 'Deluxe Room', 'Triple'),
(11, 'Guest House', 'Single'),
(12, 'Guest House', 'Double'),
(13, 'Guest House', 'Triple'),
(14, 'Guest House', 'Quad'),
(16, 'Superior Room', 'Double'),
(20, 'Single Room', 'Single'),
(22, 'Superior Room', 'Single'),
(23, 'Deluxe Room', 'Single'),
(24, 'Deluxe Room', 'Triple'),
(27, 'Guest House', 'Double'),
<<<<<<< HEAD
(30, 'Deluxe Room', 'Single'),
(31, '', ''),
(32, '', ''),
(33, '', ''),
(34, 'Superior Room', 'Single'),
(35, 'Deluxe Room', 'Single'),
(36, 'Deluxe Room', 'Single');
=======
(30, 'Deluxe Room', 'Single');
>>>>>>> Last Update

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `Meal` varchar(30) NOT NULL,
  `NoofRoom` varchar(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `nodays` int(50) NOT NULL,
  `stat` varchar(30) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Name`, `Email`, `Country`, `Phone`, `RoomType`, `Bed`, `Meal`, `NoofRoom`, `cin`, `cout`, `nodays`, `stat`) VALUES
<<<<<<< HEAD
(53, 'Nguyen Van A', 'van@gmail.com', 'Vietnam', '01223213214', 'Single Room', 'Single', 'Full Board', '1', '2024-01-03', '2024-01-05', 2, 'Confirm'),
(58, 'Ngo Quang A', 'A@gmail.com', 'Vietnam', '0385633120', 'Superior Room', 'Single', 'Full Board', '1', '2024-01-05', '2024-01-07', 2, 'Confirm'),
(59, 'Ngo Quang B', 'B@gmail.com', 'Sweden', '0385633121', 'Deluxe Room', 'Single', 'Breakfast', '2', '2024-01-05', '2024-01-08', 3, 'Confirm');
=======
(41, 'Bao Ngo', 'bao992001pth@gmail.co,', 'VietNam', '0385633120', 'Single Room', 'Single', 'Room only', '1', '2023-12-09', '2024-01-05', 1, 'Confirm');
>>>>>>> Last Update

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
<<<<<<< HEAD
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `signup`
--
<<<<<<< HEAD

INSERT INTO `signup` (`UserID`, `Username`, `Email`, `Password`) VALUES
(12, 'bao', 'bao992001pth@gmail.com', '$2y$10$2YKHhJkIENCvMENMfY5hhOsTNH36WiRic.cU5f74CdwGdeQcELQgm'),
(13, 'bao', 'bao892001pth@gmail.com', '$2y$10$ws.nap4zIqykQ3Hq6HvuS.IjGSwz3XO5DYYL2THLBcHpyNknCX/9K'),
(14, 'minh', 'minh@gmail.com', '$2y$10$/UqJnObwm0vUNW9gnvySvugL8C8DfVjZLb8omi1J15NjtFw3ba2nq'),
(15, 'bao89', 'bao123@gmail.com', '$2y$10$qlK1.g3IZxBk5rWTTdhjy.tRDVvpyrYN31Zj2/2vteB6UUY1UpYtO'),
(16, 'QuangA', 'A@gmail.com', '$2y$10$mgc1GE8UhmLccZo8mWhLiub.1ps0lOqQsUOJGE5BnY0aDzrbxUp1S'),
(17, 'C', 'c@gmail.com', '$2y$10$TAuUtHM8.Tl2.rZDgZXvPeY7tTwOZharqpVGMV25lbf2oDDMk9nDW');
=======
INSERT INTO `signup` (`UserID`, `Username`, `Email`, `Password`) VALUES
(1, 'bao', 'bao992001pth@gmail.com', '123');
>>>>>>> Last Update

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `work` varchar(30) NOT NULL
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> Last Update

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `work`) VALUES
<<<<<<< HEAD
(1, 'Bao Ngo', 'Manager'),
=======
(1, 'Tushar pankhaniya', 'Manager'),
(3, 'rohit patel', 'Cook'),
>>>>>>> Last Update
(4, 'Dipak', 'Cook'),
(5, 'tirth', 'Helper'),
(6, 'mohan', 'Helper'),
(7, 'shyam', 'cleaner'),
(8, 'rohan', 'weighter'),
<<<<<<< HEAD
(10, 'nikunj', 'weighter'),
(12, 'Minh', 'cleaner'),
(13, 'Luis', 'Cook'),
(14, 'Ramsey', 'Chef'),
(15, 'QuangB', 'Helper');
=======
(9, 'hiren', 'weighter'),
(10, 'nikunj', 'weighter'),
(11, 'rekha', 'Cook');
>>>>>>> Last Update

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_login`
--
ALTER TABLE `emp_login`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_login`
--
ALTER TABLE `emp_login`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
<<<<<<< HEAD
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
=======
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
>>>>>>> Last Update

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
<<<<<<< HEAD
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
=======
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
>>>>>>> Last Update

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
<<<<<<< HEAD
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
=======
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> Last Update

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
<<<<<<< HEAD
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
=======
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
>>>>>>> Last Update
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
<<<<<<< HEAD
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> Last Update
