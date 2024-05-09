-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2024 at 09:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_project_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'JavaScript', 6),
(2, 'Python', 4),
(3, 'PHP', 1),
(5, 'C++', 1),
(6, 'Java', 1),
(7, 'C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_desc` text NOT NULL,
  `category` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_desc`, `category`, `post_date`, `author`, `post_img`) VALUES
(3, 'JavaScript Tutorial', 'JavaScript make program eassy', 1, '2024-04-30', 4, '1714933711-468206.jpg'),
(4, 'Python advice ', 'Python is a easy programing language                                 ', 2, '2024-04-30', 4, '1714933711-468206.jpg'),
(5, 'JavaScript programing laguges', 'JavaScript is most high leavel programin laguage.', 1, '2024-04-30', 2, '1714933711-468206.jpg'),
(6, 'Django is a Python freamwork', 'this is description for python', 2, '2024-04-30', 1, '1714933711-468206.jpg'),
(7, 'for test this is new post', 'omg i can write post on my own blog. congress me now', 1, '2024-05-05', 2, '1714933711-468206.jpg'),
(8, 'Php delvoloper Salay in USA', 'in USA php devolper salary are around 100000 per yeart', 3, '2024-05-05', 2, '1714933711-468206.jpg'),
(10, 'Python Devoloper salary in USA 2', 'in USA Python devolper salary are around 120000 per year', 2, '2024-05-05', 2, '1714933711-468206.jpg'),
(12, 'JavaScript Devoloper salary in USA', 'in USA JavaScript devolper salary are around 125000 per year                                ', 1, '2024-05-05', 2, '1715236475-javascript image.jpg'),
(13, 'C++ Devoloper salary in USA', 'in USA C++  developer salary are around 125000 per year                                java\r\n', 5, '2024-05-05', 2, '1715110744-468206.jpg'),
(17, 'What is Python?', 'Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python\'s simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.\r\n\r\nOften, programmers fall in love with Python because of the increased productivity it provides. Since there is no compilation step, the edit-test-debug cycle is incredibly fast. Debugging Python programs is easy: a bug or bad input will never cause a segmentation fault. Instead, when the interpreter discovers an error, it raises an exception. When the program doesn\'t catch the exception, the interpreter prints a stack trace. A source level debugger allows inspection of local and global variables, evaluation of arbitrary expressions, setting breakpoints, stepping through the code a line at a time, and so on. The debugger is written in Python itself, testifying to Python\'s introspective power. On the other hand, often the quickest way to debug a program is to add a few print statements to the source: the fast edit-test-debug cycle makes this simple approach very effective.', 2, '2024-05-08', 2, '1715157043-python image.jpeg'),
(18, 'What is Java?', 'Java is a widely-used programming language for coding web applications. It has been a popular choice among developers for over two decades, with millions of Java applications in use today. Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself. It is a fast, secure, reliable programming language for coding everything from mobile apps and enterprise software to big data applications and server-side technologies.                ', 6, '2024-05-08', 2, '1715157140-java image.png'),
(19, 'What is JavaScript?', 'JavaScript is a scripting or programming language that allows you to implement complex features on web pages — every time a web page does more than just sit there and display static information for you to look at — displaying timely content updates, interactive maps, animated 2D/3D graphics, scrolling video jukeboxes, etc. — you can bet that JavaScript is probably involved. It is the third layer of the layer cake of standard web technologies, two of which (HTML and CSS) we have covered in much more detail in other parts of the Learning Area.', 1, '2024-05-08', 2, '1715157245-javascript image.jpg'),
(20, 'How do you add comments to JavaScript?', 'You can add either line comments or block comments to JavaScript.\r\n\r\n// This is a line comment. It must stay on one line.\r\n\r\n/* This is a\r\n\r\nblock comment. It can\r\n\r\nspan as many lines as you’d like.*/', 1, '2024-05-08', 2, '1715191087-javascript image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `password`, `role`) VALUES
(1, 'Tanvir', 'Ahammed', 'tanvir', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'Manchur', 'Iqbal', 'manchur', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'Jahid', 'Hasan', 'jahid', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'Aminur Rosul', 'Mintu', 'mintu', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(6, 'Minhaz Ahammed', 'Javed', 'javed', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(7, 'Samdul Huda ', 'Bappy', 'bappy', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(8, 'Rasedul Islam', 'Rased', 'rased', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
