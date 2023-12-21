-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 10:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `themegrill`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'student',
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `age`, `contact`, `course`, `position`, `password`, `status`, `profile_picture`) VALUES
(72, 'Nima', 'Lama', 'nimadorjelama19@gmail.com', 22, '9840713865', 'Computing', 'teacher', '$2y$10$qxZ6PIVUqroIbvZl5AUriei4gnVF2ZTjpfUk6Yl29EfUrXy9N5W4.', 'pending', 'uploads/dorje2.jpg'),
(73, 'Dipak', 'Kc', 'dipakKc@gmail.com', 22, '9861923646', 'Environmental Science', 'student', '$2y$10$0eA6zOovLulfc5ytHQazXuh8tfaehYckyGcSBv6rhWaB2XYidKyA6', 'Approved', 'uploads/Dipak_3.JPG'),
(74, 'Adwait', 'Khadka', 'adwait@gmail.com', 28, '9860988926', 'MBBS', 'student', '$2y$10$Pcg8Pu7poYVli/5ihGVuXOl3ao/kn6xQNrdhGcRJMH.dcwC.4wN/O', 'Approved', 'uploads/Adwait_1.jpg'),
(75, 'Renish', 'Shrestha', 'renish@gmail.com', 25, '9813855194', 'Computing', 'student', '$2y$10$.adOCgzTkDSKWW.d17Q3DuS7cYF1c7zlPiLgLoHGapm5MxQkc5Sku', 'pending', ''),
(76, 'Anish', 'Dangi', 'anish@gmail.com', 23, '9862590756', 'Environmental Science', 'student', '$2y$10$t6rc3hSp3oW7zx4cv26E8.cqX6/w0sVtB5zr2Mw9iNUdeMkl/Y5dO', 'Approved', 'uploads/karan.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
