-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 11, 2019 at 05:47 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanitarium`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `patient` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor`, `patient`, `room`, `time`, `date`) VALUES
(25, 'Dr Fred-Cardiologist', 'JeffToats', 'A3 1st floor', '13:00', '2019-09-13'),
(26, 'Dr Stephanie-Surgeon', 'Humphrey', 'G0 G floor', '12:00', '2019-09-24'),
(27, 'Dr Phill-Obstetrician', 'Nicole', 'B4 3rd floor', '16:00', '2019-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profileimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `speciality`, `room`, `phone`, `profileimg`) VALUES
(39, 'Dr Fred', 'Cardiologist', 'B1 1st floor', '0867867890', 'photo-1560249953-598cedd0e273.jpeg'),
(40, 'Dr Karl', 'Oncologist', 'A4 2nd floor', '0887676782', 'Header_2023804_1.1-1024x1023.jpg'),
(41, 'Dr Stephen', 'Psychiatrist', 'A3 1st floor', '0989623232', 'N7pHGpsf.jpeg'),
(42, 'Dr Bones', 'Surgeon', 'A2 1st floor', '0864549339', '4528c7b73eb741e5b83533b0727441f0.jpg'),
(43, 'Dr Phill', 'Obstetrician', 'G0 G floor', '0878781232', 'pexels-photo-433635.jpeg'),
(44, 'Dr Stephanie', 'Surgeon', 'A1 1st floor', '0968987342', 'photo-1550525811-e5869dd03032.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `medical` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `medical`) VALUES
(20, 'Mathew', 'mat@hotmail.com', '0845673232', '54321'),
(21, 'Luke', 'luke@outlook.com', '0739925787', '80085'),
(22, 'Gilly Wilikers', 'gwilly@gmail.com', '0114567843', '00001'),
(23, 'JeffToats', 'manamejeff@gmail.com', '0736942077', '12345'),
(24, 'Alfred', 'alf@outlook.com', '0909203932', '7536582'),
(25, 'Humphrey', 'actuallyhumphry@gm.com', '0975513377', '850976'),
(26, 'Guy', 'guyfiery@gmail.com', '0867831313', '76532'),
(27, 'Ricky', 'rick@gmail.com', '0783253492', '134543'),
(28, 'Nicole', 'nix@gmail.com', '0987793432', '1256533');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `occupied` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `floor`, `occupied`) VALUES
(1, 'A1', '1st', 'no'),
(2, 'B2', '2nd', 'no'),
(3, 'A2', '1st', 'no'),
(4, 'A3', '1st', 'no'),
(5, 'A4', '2nd', 'no'),
(6, 'A5', '2nd', 'no'),
(7, 'A6', '3rd', 'no'),
(8, 'B1', '1st', 'no'),
(9, 'B3', '2nd', 'no'),
(10, 'B4', '3rd', 'no'),
(11, 'G0', 'G', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `name`) VALUES
(1, 'Pediatrician'),
(2, 'Obstetrician'),
(3, 'Surgeon'),
(4, 'Cardiologist'),
(5, 'Psychiatrist'),
(6, 'Dermatologist'),
(7, 'Endocrinologist'),
(8, 'Neurologist'),
(9, 'Radiologist'),
(10, 'Anesthesiologist'),
(11, 'Oncologist');

-- --------------------------------------------------------

--
-- Table structure for table `timeSlots`
--

CREATE TABLE `timeSlots` (
  `id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timeSlots`
--

INSERT INTO `timeSlots` (`id`, `time`) VALUES
(1, '09:00'),
(2, '10:00'),
(3, '11:00'),
(4, '12:00'),
(5, '13:00'),
(6, '14:00'),
(7, '15:00'),
(8, '16:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userprofileimg` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userprofileimg`, `email`) VALUES
(2, 'Luke', 'luke', 'person-6.jpg', 'luke@gmail.com'),
(9, 'cool dude', 'okay', 'person-6.jpg', 'cooldude@gmail.com'),
(10, 'Mike', 'mike', '5KbkzPy.jpg', 'Mike');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeSlots`
--
ALTER TABLE `timeSlots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timeSlots`
--
ALTER TABLE `timeSlots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
