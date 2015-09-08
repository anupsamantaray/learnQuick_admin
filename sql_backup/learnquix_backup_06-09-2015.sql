-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2015 at 07:39 AM
-- Server version: 5.5.42-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learnquix`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(10) NOT NULL AUTO_INCREMENT,
  `chap_id` int(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `time_stamp` varchar(20) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `chap_id`, `question`, `a`, `b`, `c`, `d`, `ans`, `level`, `time_stamp`) VALUES
(5, 41, ' A and B together can do a piece of work in 10 days. B alone can finish it in 20 days. In how many days can A alone finish the work ?', '30 days', '20 days', '10 days', '5 days', '20 days', 'S', '2015-07-17 18:59:08'),
(6, 27, 'What is ato', 'a1', 'a2', 'a3', 'a4', 'a1', 'S', '2015-08-19 17:21:03'),
(9, 27, 'Brass gets discoloured in air because of the presence of which of the following gases in air?', 'Oxygen', 'Hydrogen sulphide', 'Carbon dioxide', 'Nitrogen', 'Hydrogen sulphide', 'S', '2015-07-21 15:47:21'),
(10, 27, 'Which of the following is used in pencils?', 'Graphite', 'Silicon', 'Charcoal', 'Phosphorous', 'Graphite', 'S', '2015-07-21 15:50:54'),
(11, 27, 'Which of the following metals forms an amalgam with other metals?', 'Tin', 'Mercury', 'Lead', 'Zinc', 'Mercury', 'S', '2015-07-21 15:51:35'),
(12, 27, 'Chemical formula for water is', 'NaAlO2', 'H2O', 'Al2O3', 'CaSiO3', 'H2O', 'S', '2015-07-21 15:52:21'),
(13, 27, 'The gas usually filled in the electric bulb is -', 'nitrogen', 'hydrogen', 'carbon dioxide', 'oxygen', 'carbon dioxide', 'S', '2015-08-04 21:22:31'),
(14, 27, 'Washing soda is the common name for', 'Sodium carbonate', 'Calcium bicarbonate', 'Sodium bicarbonate', 'Calcium carbonate', 'Sodium carbonate', 'S', '2015-07-21 15:53:39'),
(15, 27, 'Quartz crystals normally used in quartz clocks etc. is chemically', 'silicon dioxide', 'germanium oxide', 'a mixture of germanium oxide and silicon dioxide', 'a mixture of germanium oxide and silicon dioxide', 'silicon dioxide', 'M', '2015-07-21 15:54:45'),
(17, 27, 'Bromine is a', 'black solid', 'red liquid', 'colourless gas', 'highly inflammable gas', 'red liquid', 'S', '2015-08-04 22:10:01'),
(18, 27, 'The hardest substance available on earth is', 'Gold', 'Iron', 'Diamond', 'Platinum', 'Diamond', 'M', '2015-07-21 16:00:36'),
(19, 27, 'Tetraethyl lead is used as', 'pain killer', 'fire extinguisher', 'mosquito repellent', 'petrol additive', 'petrol additive', 'M', '2015-07-21 16:02:58'),
(20, 27, 'The inert gas which is substituted for nitrogen in the air used by deep sea divers for breathing, is', 'Argon', 'Xenon', 'Helium', 'Krypton', 'Helium', 'M', '2015-07-21 16:03:41'),
(21, 27, 'The gases used in different types of welding would include\n', 'oxygen and hydrogen', 'oxygen, hydrogen, acetylene and nitrogen', 'oxygen, acetylene and argon', 'oxygen and acetylene', 'oxygen and acetylene', 'M', '2015-07-21 16:04:22'),
(22, 27, 'The property of a substance to absorb moisture from the air on exposure is called', 'osmosis', 'deliquescence', 'efflorescence', 'desiccation', 'deliquescence', 'M', '2015-07-21 16:05:08'),
(23, 27, 'In which of the following activities silicon carbide is used?', 'Making cement and glass', 'Disinfecting water of ponds', 'cutting very hard substances', 'Making casts for statues', 'cutting very hard substances', 'H', '2015-07-21 16:06:35'),
(24, 27, 'The inert gas which is substituted for nitrogen in the air used by deep sea divers for breathing, is', 'Argon', 'Xenon', 'Helium', 'Krypton', 'Helium', 'H', '2015-07-21 16:15:21'),
(25, 27, 'The gases used in different types of welding would include', 'oxygen and hydrogen', 'oxygen, hydrogen, acetylene and nitrogen', 'oxygen, acetylene and argon', 'oxygen and acetylene', 'oxygen and acetylene', 'H', '2015-07-21 16:16:12'),
(26, 27, 'The property of a substance to absorb moisture from the air on exposure is called', 'osmosis', 'deliquescence', 'efflorescence', 'desiccation', 'deliquescence', 'H', '2015-07-21 16:17:13'),
(27, 27, 'In which of the following activities silicon carbide is used?', 'Making cement and glass', 'Disinfecting water of ponds', 'cutting very hard substances', 'Making casts for statues', 'cutting very hard substances', 'H', '2015-07-21 16:17:52'),
(28, 27, 'When an iron nail gets rusted, iron oxide is formed', 'without any change in the weight of the nail', 'with decrease in the weight of the nail', 'with increase in the weight of the nail', 'without any change in colour or weight of the nail', 'with increase in the weight of the nail', 'H', '2015-07-21 16:19:35'),
(29, 27, 'Among the various allotropes of carbon,', 'coke is the hardest, graphite is the softest', 'diamond is the hardest, coke is the softest', 'diamond is the hardest, graphite is the softest', 'diamond is the hardest, lamp black is the softest', 'diamond is the hardest, graphite is the softest', 'H', '2015-07-21 16:31:07'),
(30, 27, 'The group of metals Fe, Co, Ni may best called as', 'transition metals', 'main group metals', 'alkali metals', 'rare metals', 'transition metals', 'H', '2015-07-21 16:32:34'),
(31, 27, 'The chemical (ethyl mercaptan) added to the otherwise odourless LPG cooking gas for imparting a detectable smell to the gas is a compound of', 'bromine', 'fluorine', 'chlorine', 'sulphur', 'sulphur', 'H', '2015-07-21 16:34:10'),
(32, 27, 'The element common to all acids is', 'hydrogen', 'carbon', 'sulphur', 'oxygen', 'hydrogen', 'H', '2015-07-21 16:34:59'),
(33, 31, 'Which one of the following is not a prime number?', '31', '61', '71', '91', '61', 'S', '2015-08-04 16:02:27'),
(34, 44, 'Tickets numbered 1 to 20 are mixed up and then a ticket is drawn at random. What is the probability that the ticket drawn has a number which is a multiple of 3 or 5?', '1/2', '2/5', '8/15', '9/20', '9/20', 'S', '2015-07-21 16:43:18'),
(35, 44, 'A bag contains 2 red, 3 green and 2 blue balls. Two balls are drawn at random. What is the probability that none of the balls drawn is blue?', '10/21', '11/21', '2/7', ' 5/7', '10/21', 'm', '2015-07-21 16:49:45'),
(36, 44, 'What is the probability of getting a sum 9 from two throws of a dice?', ' 1/6', '1/8', '1/9', '1/12', '1/9', 'S', '2015-07-21 16:52:05'),
(37, 44, 'Three unbiased coins are tossed. What is the probability of getting at most two heads?', ' 3/4', ' 1/4', ' 3/8', '7/8', '7/8', 'S', '2015-07-21 16:53:35'),
(38, 44, 'Two dice are thrown simultaneously. What is the probability of getting two numbers whose product is even?', '1/2', '3/4', ' 3/8', ' 5/16', '3/4', 'M', '2015-07-21 16:54:53'),
(39, 44, 'In a class, there are 15 boys and 10 girls. Three students are selected at random. The probability that 1 girl and 2 boys are selected, is:', ' 21/46', ' 25/117', '1/50', ' 3/25', ' 21/46', 'M', '2015-07-21 16:56:16'),
(40, 44, 'In a lottery, there are 10 prizes and 25 blanks. A lottery is drawn at random. What is the probability of getting a prize?', '1/10', '2/5', ' 2/7', '5/7', ' 2/7', 'M', '2015-07-21 17:01:35'),
(41, 44, 'From a pack of 52 cards, two cards are drawn together at random. What is the probability of both the cards being kings?', '1/15', '25/57', '35/256', '1/221', '1/221', 'M', '2015-07-21 17:02:40'),
(42, 44, 'Two dice are tossed. The probability that the total score is a prime number is:', '1/6', '5/12', '1/2', '7/9', '5/12', 'H', '2015-07-21 17:03:49'),
(43, 44, 'A card is drawn from a pack of 52 cards. The probability of getting a queen of club or a king of heart is:', '1/13', '2/13', '1/26', '1/52', '1/26', 'H', '2015-07-21 17:05:14'),
(44, 44, 'A bag contains 4 white, 5 red and 6 blue balls. Three balls are drawn at random from the bag. The probability that all of them are red, is:', '1/22', '3/22', '2/91', ' 2/77', '2/91', 'H', '2015-07-21 17:06:10'),
(45, 44, 'Two cards are drawn together from a pack of 52 cards. The probability that one is a spade and one is a heart, is:', '3/20', '29/34', '47/100', '13/102', '13/102', 'H', '2015-07-21 17:06:58'),
(46, 31, '(112 x 54) = ?', '67000', '70000', '76500', '77200', '70000', 'S', '2015-07-21 17:09:49'),
(47, 31, 'It is being given that (232 + 1) is completely divisible by a whole number. Which of the following numbers is completely divisible by this number?', '(216 + 1)', '(216 - 1)', '(7 x 223)', '(296 + 1)', '(296   1)', 'S', '2015-07-21 17:10:46'),
(48, 31, 'What least number must be added to 1056, so that the sum is completely divisible by 23 ?', '2', '3', '18', '21', '2', 'S', '2015-07-21 17:11:36'),
(49, 31, 'How many of the following numbers are divisible by 132 ?\n264, 396, 462, 792, 968, 2178, 5184, 6336', '4', '5', '6', '7', '4', 'S', '2015-07-21 17:13:40'),
(50, 31, '(935421 x 625) = ?', '575648125', '584638125 ', '584649125', '585628125', '584638125 ', 'M', '2015-07-21 17:15:13'),
(51, 31, 'The largest 4 digit number exactly divisible by 88 is:', '9944', '9768', '9988', '8888', '9944', 'M', '2015-07-21 17:16:10'),
(52, 31, 'Which of the following is a prime number ?', '33', '81', '93', '97', '97', 'M', '2015-07-21 17:17:38'),
(53, 31, 'What is the unit digit in {(6374)1793 x (625)317 x (341491)}?', '0', '2', '3', '5', '0', 'M', '2015-07-21 17:18:28'),
(54, 31, '5358 x 51 = ?', '273258', '273268', '273348', '273358', '273258', 'M', '2015-07-21 17:19:13'),
(55, 31, 'The sum of first five prime numbers is:', '11', '18', '26', '28', '28', 'M', '2015-07-21 17:20:53'),
(56, 31, 'The difference of two numbers is 1365. On dividing the larger number by the smaller, we get 6 as quotient and the 15 as remainder. What is the smaller number ?', '240', '270', '295', '360', '270', 'H', '2015-07-21 17:21:51'),
(57, 31, '(12)3 x 64 Ã· 432 = ?', '5184', '5060', '5148', '5084', '5184', 'H', '2015-07-21 17:25:06'),
(58, 31, '72519 x 9999 = ?', '725117481', '674217481', '685126481', '696217481', '725117481', 'H', '2015-07-21 17:25:51'),
(59, 31, 'If the number 517*324 is completely divisible by 3, then the smallest whole number in the place of * will be:', '0', '1', '2', 'None of these', '2', 'H', '2015-07-21 17:32:28'),
(60, 31, 'The smallest 3 digit prime number is:', '101', '103', '109', '113', '101', 'M', '2015-07-21 17:33:11'),
(61, 31, 'Which one of the following numbers is exactly divisible by 11?', '235641', '245642', '315624', '415624', '415624', 'H', '2015-07-21 17:33:49'),
(62, 52, 'Most spoilage bacteria grow at', 'acidic pH', 'alkaline pH ', 'neutral pH', 'any of the pH', 'neutral pH', 'S', '2015-07-21 18:07:20'),
(63, 52, 'The microbiological examination of coliform bacteria in foods preferably use', 'MacConkey broth', 'violet Red Bile agar', 'eosine Methylene blue agar', 'all of these', 'all of these', 'S', '2015-07-21 18:08:48'),
(64, 52, 'Which of the following acid will have higher bacteriostatic effect at a given pH?', 'Acetic acid', 'Tartaric acid', 'Citric acid', 'Maleic acid', 'Acetic acid', 'S', '2015-07-21 18:09:25'),
(65, 52, 'Which of the following is not true for the thermal resistance of the bacterial cells?', 'Cocci are usually more resistant than rods', 'Higher the optimal and maximal temperatures for growth, higher the resistance', 'Bacteria that clump considerably or form capsules are difficult to kill', 'Cells low in lipid content are harder to kill than other cells', 'Cells low in lipid content are harder to kill than other cells', 'S', '2015-07-21 18:10:09'),
(66, 52, 'Water activity can act as', 'an intrinsic factor determining the likelihood of microbial proliferation', 'a processing factor', 'an extrinsic factor', 'all of the above', 'all of the above', 'M', '2015-07-21 18:11:32'),
(67, 52, 'Plate count of bacteria in foods generally use the plating medium consisting of', 'peptone, yeast extract, glucose, sodium chloride, agar and distilled water', 'yeast extract, glucose, sodium chloride, agar and distilled water', 'peptone, glucose, sodium chloride, agar and distilled water', 'peptone, yeast extract, glucose, sodium chloride and distilled water', 'peptone, yeast extract, glucose, sodium chloride, agar and distilled water', 'M', '2015-07-21 18:15:01'),
(68, 52, 'Yeast and mould count determination requires-', 'nutrient agar', 'acidified potato glucose agar', 'MacConkey agar', 'violet Red Bile agar', 'acidified potato glucose agar', 'H', '2015-07-21 18:23:44'),
(69, 52, 'The time temperature combination for HTST paterurization of 71.1Â°C for 15 sec is selected on the basis of', 'Coxiella Burnetii', 'E. coli', 'B. subtilis', 'C. botulinum', 'Coxiella Burnetii', 'H', '2015-07-21 18:24:37'),
(70, 52, 'Suspected colonies of Staphylococcus aureus when grown on Baird-Parker medium shall show\n', 'coagulase activity', 'protease activity', 'catalase activity', 'none of these', 'coagulase activity', 'H', '2015-07-21 18:51:41'),
(71, 45, 'what is formula of finding mean value?', 'sum of total item/number of items', 'add items', 'no of items/sum of item', 'sum of tems', 'sum of total item/number of items', 'S', '2015-07-22 18:42:32'),
(75, 66, 'dwsdwfw', 'sds', 'dsds', 'sdsdf', 'adas', 'sdsdf', 'S', '2015-07-29 17:01:19'),
(76, 38, '', '      ', '', '', '', '      ', 'M', '2015-07-30 10:51:24'),
(82, 45, 'gghgn bfght fvbfh cbfh', 'dd', 'df fdg ', 'gdgh dfg', ' ggrh ', 'gdgh dfg', 'M', '2015-08-03 11:10:44'),
(83, 48, 'rfhtutjy vhfgh', '', '', '', '', '', 'M', '2015-08-03 11:11:13'),
(84, 48, 'ffh ghngtjt gjntj gng ', '', '', '', '', '', 'H', '2015-08-03 11:11:58'),
(87, 53, 'fhfg gg gg gnmg ngg gg gmgm', '     ', '          ', '          ', '             ', '     ', 'M', '2015-08-04 10:51:11'),
(89, 53, 'sfdgfd fgf vghngfn', 'a ', 'b', 'c', 'd', 'd', 'M', '2015-08-06 11:51:02'),
(90, 54, 'What is organisation?', 'a', 'b', 'c', 'd', 'c', 'H', '2015-08-11 18:40:46'),
(91, 53, 'what is motion?', 'abc', 'xyz', 'pqr', 'shg', 'abc', 'H', '2015-08-06 11:30:50'),
(92, 53, 'shhhh', 'aaa', 'bbbbbbc', 'cccc', 'ffgfg', 'aaa', 'M', '2015-08-06 11:32:23'),
(93, 84, 'ytuytu', 'a', 'bbbbbbb', 'c', 'd', 'a', 'M', '2015-08-06 11:47:59'),
(94, 79, 'dgrfg', 'fdhgf', 'ffh', 'hfh', 'hfgh', 'fdhgf', 'M', '2015-08-06 11:53:59'),
(95, 83, 'What is qqqqq?', 'a', 'b', 'c', 'd', 'a', 'M', '2015-08-07 15:49:48'),
(96, 77, 'wahat is ', 'a', 'bbbbbb', 'cvc', 'ddvg', 'a', 'M', '2015-08-07 18:26:38'),
(100, 30, 'fghgf vng bnjhm', 'ss', 'ffh', 'gfh', 'thtgj', 'ffh', 'H', '2015-08-10 17:47:36'),
(101, 54, '     ', '        ', '          ', '            ', '            ', '            ', 'H', '2015-08-11 18:41:56'),
(103, 70, '              ', '', '', '', '', '', 'M', '2015-08-11 20:00:24'),
(105, 45, 'ggggggggggggggggg', '', '', '', '', 'undefined', 'M', '2015-08-14 13:15:17'),
(111, 95, 'mvv', 'mvb', 'vmbn', 'vm', 'mv', 'undefined', 'M', '2015-08-14 15:09:43'),
(112, 45, 'cn cbnn', 'bcn', 'nbc', 'nbc', 'nbx', 'nbx', 'H', '2015-08-14 15:10:01'),
(115, 109, '         ', '        ', '          ', '       ', '          ', '       ', 'M', '2015-08-17 17:45:00'),
(128, 107, 'What is Science', 'A', 'B', 'C', 'D', 'C', 'S', '2015-08-19 12:40:10'),
(129, 107, 'What is Science ?', 'dsfsdf', 'sdf', 'sdf', 'sfd', 'sdf', 'M', '2015-08-19 12:43:03'),
(132, 49, 'Wdfdf', 'g', 'dg', 'gfdf', 'fd', 'gfdf', 'H', '2015-08-19 16:19:40'),
(133, 128, 'fgdg', 'fg', 'fgdf', 'gd', 'gf', 'gd', 'S', '2015-08-20 10:55:09'),
(134, 34, 'zsdsas', 'sdsdf', 'dsds', 'dsfdsw', 'sdsf', 'dsds', 'M', '2015-08-20 11:15:16'),
(139, 32, 'jkgjkj', 'kjhk', 'jkk', 'jhk', 'jhk', 'jhk', 'M', '2015-08-21 07:09:41'),
(140, 61, 'What is Arithmetic?', 'a', 'b', 'c', 'd', 'b', 'S', '2015-08-26 03:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tiime_stamp` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `mobile`, `address`, `email`, `password`, `image`, `status`, `tiime_stamp`) VALUES
(55, 'shishir', '9007012732', 'Kolkata', 'shishir.behera@gmail.com', 'prachi', '2863366285564746.jpg', '1', '2015-08-04 14:06:06'),
(59, 'Rahul', '9898989898', 'Mumbai', 'rahul@gmail.com', '1234', '8968606294892848.jpg', '1', '2015-08-12 11:47:23'),
(60, 'sunny', '9969157484', '?panevel', 'sunnycs0103@gmail.com', 'asdfgh', '4835059721990123.jpg', '1', '2015-08-12 12:04:25'),
(63, 'Anil', '9696969696', 'Navi Mumbai', 'avi.androapps@gmail.com', '12345', '7517670001616636.jpg', '1', '2015-08-19 11:48:13'),
(88, 'sunny', '9594340066', 'panvel', 'info@androappstech.com', 'asdfgh', '1181562076386681.jpg', '1', '2015-08-21 07:12:05'),
(90, 'Sunny Gupta', '8767939182', 'panvel', 'anilsushila@gmail.com', 'asdfgh', '', '1', '2015-08-23 00:00:11'),
(91, 'ravee bhargav', '9004653799', 'Navi Mumbai', 'raveebhargav@gmail.com', 'alex3690', '', '1', '2015-08-23 02:09:14'),
(92, 'sathya', '9505569984', 'karimnagar', 'sathyaprakashbollampally@gmail.com', '123456', '', '1', '2015-08-24 07:07:28'),
(94, 'Shivam singh Baghel', '9827554604', 'Gwalior m.p.', 'shivambaghel777@gmail.com', 'qwertyuiop', '', '1', '2015-08-26 07:20:00'),
(95, 'chetan wadhwa', '9416010445', '192  subhash colony tehsil camp panipat', 'chetanwadhwa1994@gmail.com', '*yoyohoneysingh*', '', '1', '2015-08-27 08:45:40'),
(96, 'Ayush', '7773863591', 'Tappa', 'Ayushrathore331@gmail.com', '7773863591', '', '1', '2015-08-27 18:55:35'),
(97, 'Ayush rathore', '9009481823', 'tappa', 'Ayushrathore143@gamil.com', 'Ayushrathore', '', '1', '2015-08-27 19:07:31'),
(98, 'janet', '9972717524', 'kulshekar ', 'wilmajanet@gmail.com ', 'joswin204', '', '1', '2015-08-28 20:47:30'),
(99, 'Arindam', '9038769216', 'Chakraborty para Halisahar', 'carindam23@gmail.com', 'arindam', '', '1', '2015-08-29 05:40:47'),
(101, 'vishesh', '9945910707', 'banglore', 'visheshvaishnav1999@gmail.com', 'raju121212', '', '1', '2015-09-02 05:03:02'),
(102, 'nimisha', '7507584666', 'pune', 'nimisha.bansal@outlook.com', 'Ankit#123', '', '1', '2015-09-02 09:39:29'),
(103, 'Anjal shah', '9805363062', 'Dharan,Nepal', 'anjalshah100@gmail.com', 'catanddog', '', '1', '2015-09-03 08:57:08'),
(104, 'madhumitha ', '9474238666', 'andaman nicobar island', 'vinayairtravels@gmail.com', 'madhu', '', '1', '2015-09-03 09:52:59'),
(105, 'astha gautam', '9919241470', 'jr.271 hindalco colony', 'astha_sjivp@rediffmail.com', 'sps@12345', '', '1', '2015-09-03 11:32:18'),
(106, 'mohd saad', '8175918870', '786/685', 'mohdsaad.lko@gmail.com', 'supercomputer', '', '1', '2015-09-03 23:02:51'),
(107, 'chirag', '9690772404', '37 anand chowk', 'chiragsethi010@gmail.com', 'partyonnight', '', '1', '2015-09-06 01:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `res_id` int(10) NOT NULL AUTO_INCREMENT,
  `standard` varchar(20) NOT NULL,
  `sub_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `chap_id` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `result` float NOT NULL,
  `time_stamp` varchar(30) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `standard`, `sub_id`, `user_id`, `chap_id`, `level`, `result`, `time_stamp`) VALUES
(1, '10', '19', '59', '31', 'S', 26, '2015-08-12 11:48:23'),
(2, '10', '19', '59', '31', 'M', 12, '2015-08-12 11:49:34'),
(3, '10', '20', '60', '52', 'H', 0, '2015-08-12 12:18:00'),
(4, '10', '20', '60', '52', 'M', 55, '2015-08-12 12:18:15'),
(5, '10', '20', '60', '52', 'M', 27, '2015-08-12 12:18:22'),
(6, '10', '20', '60', '52', 'H', 0, '2015-08-12 12:19:28'),
(7, '9', '18', '60', '44', 'S', 16, '2015-08-12 12:28:52'),
(8, '9', '18', '60', '44', 'M', 16, '2015-08-12 12:29:01'),
(9, '9', '18', '60', '44', 'H', 75, '2015-08-12 12:29:08'),
(10, '9', '18', '60', '45', 'S', 0, '2015-08-12 12:29:36'),
(11, '9', '18', '60', '48', 'H', 100, '2015-08-12 12:29:48'),
(12, '10', '19', '60', '31', 'H', 33, '2015-08-12 12:44:34'),
(13, '10', '19', '59', '31', 'S', 19, '2015-08-12 13:26:18'),
(14, '10', '19', '59', '31', 'M', 11.71, '2015-08-12 13:27:08'),
(15, '10', '19', '11', '31', 'S', 26, '2015-08-12 14:00:54'),
(16, '10', '20', '61', '52', 'S', 21.67, '2015-08-14 13:43:22'),
(17, '10', '20', '62', '52', 'S', 18.57, '2015-08-17 17:57:36'),
(18, '10', '19', '40', '31', 'S', 13, '2015-08-19 12:19:45'),
(19, '10', '19', '40', '31', 'S', 0, '2015-08-19 12:21:37'),
(20, '9', '16', '56', '27', 'M', 27.33, '2015-08-19 16:07:11'),
(21, '9', '16', '40', '27', 'S', 24.38, '2015-08-20 10:42:27'),
(22, '10', '20', '40', '52', 'H', 0, '2015-08-20 15:12:32'),
(23, '10', '20', '88', '52', 'H', 0, '2015-08-24 05:25:53'),
(24, '10', '20', '88', '52', 'H', 33.33, '2015-08-24 05:29:31'),
(25, '10', '20', '88', '52', 'M', 41, '2015-08-24 05:39:28'),
(26, '10', '19', '97', '31', 'S', 13, '2015-08-27 19:13:46'),
(27, '10', '19', '97', '31', 'M', 23.43, '2015-08-27 19:14:20'),
(28, '10', '20', '102', '52', 'S', 0, '2015-09-02 11:23:36'),
(29, '10', '20', '102', '52', 'S', 0, '2015-09-02 11:24:08'),
(30, '9', '16', '102', '109', 'M', 82, '2015-09-02 11:25:05'),
(31, '9', '16', '102', '109', 'M', 82, '2015-09-02 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `username`, `password`, `fname`, `lname`, `gender`, `dob`, `contact_no`, `email`, `address`) VALUES
(1, 'admin', '1234', 'Avinash', 'Gaikwad', 'M', '10-2-1996', '', 'rahul.androapps@gmail.com', 'r-74,krishna bhavan, navi mumbai-400708');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapters`
--

CREATE TABLE IF NOT EXISTS `tbl_chapters` (
  `chap_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_id` int(20) NOT NULL,
  `chapter_name` varchar(500) NOT NULL,
  PRIMARY KEY (`chap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `tbl_chapters`
--

INSERT INTO `tbl_chapters` (`chap_id`, `sub_id`, `chapter_name`) VALUES
(27, 16, 'Matter in Our Surroundings'),
(31, 19, 'REAL NUMBERS'),
(32, 19, 'POLYNOMIALS'),
(33, 19, 'PAIR OF LINEAR EQUATIONS IN TWO VARIABLES'),
(34, 19, 'TRIANGLES'),
(35, 19, 'INTRODUCTION TO TRIGONOMETRY'),
(36, 19, 'STATISTICS'),
(37, 19, 'QUADRATIC EQUATIONS'),
(38, 19, 'CIRCLES'),
(39, 19, 'CONSTRUCTIONS'),
(40, 19, 'HEIGHTS AND DISTANCES'),
(41, 19, 'PROBABILITY'),
(42, 19, 'Coordinate Geometry'),
(43, 19, 'AREAS RELATED TO CIRCLES'),
(44, 18, 'PROBABILITY'),
(45, 18, 'STATISTICS'),
(46, 18, 'SURFACE AREAS AND VOLUMES'),
(47, 18, 'CONSTRUCTIONS'),
(48, 18, 'CIRCLES'),
(49, 18, 'Areas of Parallelograms and Triangles'),
(50, 18, 'QUADRILATERALS'),
(51, 18, 'LINEAR EQUATIONS IN TWO VARIABLES'),
(52, 20, 'Chemical Reactions and Equations'),
(55, 21, 'aaa'),
(61, 19, 'Arithmetic Progression'),
(62, 23, 'ratio'),
(65, 24, 'chapter1'),
(66, 26, 'udia information'),
(69, 26, 'inro udia'),
(70, 18, 'Polynomials'),
(79, 27, 'computer info'),
(84, 37, 'intro Udia 12'),
(86, 23, 'dfgdg'),
(87, 18, 'REAL NUMBERS'),
(93, 19, 'Surface Areas and Volumes'),
(94, 20, 'Acids Bases and Salts'),
(95, 20, 'Metals and Non Metals'),
(96, 20, 'Carbon and Its Compounds'),
(97, 20, 'Periodic Classification of Elements'),
(98, 20, 'Life Processes'),
(99, 20, 'Control & Coordination'),
(100, 20, 'How do Organisms Produce'),
(101, 20, 'The Human Eye and Colourful World'),
(102, 20, 'Electricity'),
(103, 20, 'Magnetic Effects of Electric Currents'),
(104, 20, 'Sources of Energy'),
(105, 20, 'Light Reflection and Refraction'),
(106, 20, 'Our Environment'),
(107, 20, 'Management of Natural Resources'),
(108, 16, 'Is Matter around Us Pure'),
(109, 16, 'Atoms and Molecules'),
(110, 16, 'Structure of the Atom'),
(111, 16, 'Fundamental Unit of Life'),
(112, 16, 'Tissues'),
(113, 16, 'Diversity in Living Organisms'),
(114, 16, 'Motion'),
(115, 16, 'Force and Laws of Motion'),
(116, 16, 'Gravitation'),
(117, 16, 'Work and Energy'),
(118, 16, 'Sound'),
(119, 16, 'Why do we fall ill'),
(120, 16, 'Natural Resources'),
(121, 16, 'Improvement in Food Resources'),
(122, 18, 'Coordinate Geometry'),
(123, 18, 'Lines and Angles'),
(126, 20, 'ghghg'),
(128, 55, 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_docs`
--

CREATE TABLE IF NOT EXISTS `tbl_docs` (
  `doc_id` int(20) NOT NULL AUTO_INCREMENT,
  `chap_id` int(20) NOT NULL,
  `sub_id` int(20) NOT NULL,
  `standard_id` int(20) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tbl_docs`
--

INSERT INTO `tbl_docs` (`doc_id`, `chap_id`, `sub_id`, `standard_id`, `doc_name`) VALUES
(1, 5, 1, 1, 'bbbb'),
(2, 5, 1, 1, '1436251055DncReport.xls'),
(3, 5, 1, 9, '1436271897std11-phys-em-1.pdf'),
(4, 5, 1, 9, '1436272331std12-phy-em-1.pdf'),
(5, 5, 1, 9, '143635121247076299220991AN_900.pdf'),
(6, 5, 1, 9, '1436527154Java-Advanced-OOP.pdf'),
(7, 7, 3, 9, '14365998151436272331std12-phy-em-1.pdf'),
(8, 7, 3, 9, '1436599969life country.pdf'),
(9, 7, 3, 9, '1436600208my life.pdf'),
(10, 11, 3, 9, '1436600277indian culture.pdf'),
(11, 8, 4, 9, '1436600313line.pdf'),
(12, 9, 4, 9, '1436600346circle.pdf'),
(13, 12, 6, 10, '1436600371indian freedom.jpg'),
(14, 13, 6, 10, '1436600422modern history.pdf'),
(15, 14, 7, 10, '1436600470indian economy - Copy.pdf'),
(16, 15, 7, 10, '1436600507Bussiness economy.pdf'),
(17, 15, 7, 10, '1436601912Bussiness economy.pdf'),
(18, 15, 7, 10, '1436602040Bussiness economy.pdf'),
(19, 15, 7, 10, '1436602234Bussiness economy.pdf'),
(20, 15, 7, 10, '1436602319Bussiness economy.pdf'),
(21, 15, 7, 10, '1436602409Bussiness economy.pdf'),
(22, 15, 7, 10, '1436602452Bussiness economy.pdf'),
(23, 15, 7, 10, '1436602534Bussiness economy.pdf'),
(24, 15, 7, 10, '1436602562Bussiness economy.pdf'),
(25, 15, 7, 10, '1436602612Bussiness economy.pdf'),
(26, 27, 16, 9, '14366039692016_syllabus_10_mathematics.pdf'),
(27, 31, 19, 10, '1436604000REAL NUMBERS.pdf'),
(28, 31, 19, 10, '1436604000POLYNOMIALS.pdf'),
(31, 32, 19, 10, '14366042192016_syllabus_10_mathematics.pdf'),
(32, 41, 19, 10, '14366042862016_syllabus_10_mathematics.pdf'),
(33, 41, 19, 10, '14366043082016_syllabus_10_mathematics.pdf'),
(34, 38, 19, 10, '1437050300Desert.jpg'),
(35, 53, 20, 9, '143730019809_science_notes_ch11_work.pdf'),
(36, 52, 20, 10, '1437558808Doc1.docx'),
(48, 27, 16, 9, '1438804343asasasasasasasasasasa.docx'),
(53, 53, 20, 10, '1439302288GOLD Pocket Guideline.pdf'),
(54, 53, 20, 10, '1439302288GINA Guideline.pdf'),
(56, 31, 19, 10, '1439968132C-CnergeeCRMMyPageMastersPDFs-niyati123_1680199.pdf'),
(57, 27, 16, 9, '1439980128Mobility_Whitepaper_Mobile-Application-Testing_1012-1.pdf'),
(58, 94, 20, 10, '1440583941Class X  2 Acids Bases and Salts .pdf'),
(59, 93, 19, 10, '1440585626C-CnergeeCRMMyPageMastersPDFs-niyati123_1680199.pdf'),
(60, 39, 19, 10, '1440588161Mobility_Whitepaper_Mobile-Application-Testing_1012-1.pdf'),
(61, 39, 19, 10, '1440593620Mobility_Whitepaper_Mobile-Application-Testing_1012-1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hof_mode`
--

CREATE TABLE IF NOT EXISTS `tbl_hof_mode` (
  `id` int(11) NOT NULL,
  `mode` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'auto',
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hof_mode`
--

INSERT INTO `tbl_hof_mode` (`id`, `mode`, `time_stamp`) VALUES
(1, 'auto', '2015-08-03 22:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `image_id` int(20) NOT NULL AUTO_INCREMENT,
  `chap_id` int(20) NOT NULL,
  `sub_id` int(20) NOT NULL,
  `standard_id` int(20) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `chap_id`, `sub_id`, `standard_id`, `image_name`) VALUES
(18, 5, 1, 1, '14362509631.jpg'),
(19, 5, 1, 9, '1436526912Chrysanthemum.jpg'),
(20, 5, 1, 9, '14365269881435577276_photo.png'),
(21, 5, 1, 9, '1436528567Koala.jpg'),
(22, 7, 3, 9, '1436596836My life.jpg'),
(23, 11, 3, 9, '1436596857Indian culture.jpg'),
(24, 8, 4, 9, '1436596976line.jpg'),
(25, 9, 4, 9, '1436596992circle.jpg'),
(26, 14, 7, 10, '1436599825indian economy.jpg'),
(27, 15, 7, 10, '1436599857Bussiness economy.jpg'),
(28, 12, 6, 10, '1436599968indian freedom.jpg'),
(29, 13, 6, 10, '1436599988modern hostory.jpg'),
(30, 27, 16, 9, '1436604003science_chap_1.jpg'),
(33, 29, 16, 9, '1437392669Jellyfish.jpg'),
(34, 28, 16, 9, '14374679181436596836My life.jpg'),
(35, 31, 19, 10, '1437558097images1.jpg'),
(37, 44, 18, 9, '1437561261Desert.jpg'),
(38, 52, 20, 10, '1437561486Penguins.jpg'),
(39, 53, 20, 10, '1438084640Lighthouse.jpg'),
(40, 47, 18, 9, '1438154588Desert.jpg'),
(42, 31, 19, 10, '1438181948clinical-gallery.jpg'),
(48, 31, 19, 10, '1438579581IMG-20150728-WA0000.jpg'),
(51, 31, 19, 10, '1438579581IMG_20150721_094406703.jpg'),
(53, 27, 16, 9, '14386692611423486703_519967-030_Camera-48.png'),
(54, 44, 18, 9, '1438672165arrow-3.png'),
(55, 44, 18, 9, '1438672213arrow-3.png'),
(56, 44, 18, 9, '1438672298arrow-3.png'),
(58, 52, 20, 10, '1438672580arrow-3.png'),
(61, 45, 18, 9, '1438677851Chrysanthemum.jpg'),
(62, 45, 18, 9, '1438677851Desert.jpg'),
(63, 47, 18, 9, '1438838848IMG_20150721_094406703.jpg'),
(64, 31, 19, 10, '1438864403Hydrangeas.jpg'),
(65, 83, 16, 9, '1439301522IMG_20150721_094406703.jpg'),
(66, 83, 16, 9, '1439301522IMG-20150729-WA0002.jpg'),
(67, 83, 16, 9, '1439301522IMG-20150728-WA0000.jpg'),
(68, 83, 16, 9, '1439301576IMG-20150728-WA0000.jpg'),
(69, 83, 16, 9, '1439301576IMG_20150717_221915292.jpg'),
(71, 83, 16, 9, '1439301576IMG-20150729-WA0002.jpg'),
(72, 31, 19, 10, '1439886465images3.jpg'),
(73, 107, 20, 10, '1439978796Bussiness economy.jpg'),
(74, 107, 20, 10, '1439979160Bussiness economy.jpg'),
(75, 99, 20, 10, '1439979179circle.jpg'),
(76, 36, 19, 10, '1439979262Indian culture.jpg'),
(77, 97, 20, 10, '1439979387circle.jpg'),
(78, 35, 19, 10, '1439979429Bussiness economy.jpg'),
(80, 32, 19, 10, '1439981845circle.jpg'),
(81, 31, 19, 10, '1440143356Jellyfish.jpg'),
(82, 31, 19, 10, '1440164631IMG-20150729-WA0002.jpg'),
(83, 109, 16, 9, '1440423241Periodic_table_(polyatomic).svg.png'),
(84, 109, 16, 9, '1440423362Periodic_table_(polyatomic).svg.png'),
(85, 93, 19, 10, '1440585587IMG_20150717_221915292.jpg'),
(86, 93, 19, 10, '1440586453IMG-20150729-WA0002.jpg'),
(87, 39, 19, 10, '1440588121IMG-20150729-WA0002.jpg'),
(88, 39, 19, 10, '1440593668IMG-20150728-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_temp`
--

CREATE TABLE IF NOT EXISTS `tbl_result_temp` (
  `res_id` int(10) NOT NULL AUTO_INCREMENT,
  `standard` varchar(20) NOT NULL,
  `sub_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `chap_id` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `result` float NOT NULL,
  `time_stamp` varchar(30) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `tbl_result_temp`
--

INSERT INTO `tbl_result_temp` (`res_id`, `standard`, `sub_id`, `user_id`, `chap_id`, `level`, `result`, `time_stamp`) VALUES
(59, '10', '19', '59', '', 'S', 36.11, '2015-08-04 11:51:14'),
(89, '10', '20', '55', '', 'H', 100, '2015-08-04 14:08:10'),
(95, '10', '19', '8', '', 'S', 65, '2015-07-28 13:23:37'),
(96, '10', '19', '8', '', 'S', 37.14, '2015-07-31 16:45:38'),
(98, '10', '20', '35', '', 'H', 99, '2015-07-22 16:40:41'),
(102, '10', '19', '8', '', 'S', 97.5, '2015-07-28 13:22:23'),
(103, '10', '19', '8', '', 'S', 65, '2015-07-28 13:23:37'),
(104, '9', '16', '8', '', 'M', 35.14, '2015-08-03 20:32:35'),
(108, '9', '16', '40', '', 'M', 82, '2015-08-10 17:33:14'),
(113, '10', '20', '11', '', 'H', 87, '2015-07-22 16:39:29'),
(116, '9', '18', '60', '', 'H', 100, '2015-08-12 12:29:48'),
(117, '9', '18', '60', '', 'H', 75, '2015-08-12 12:29:08'),
(118, '9', '18', '60', '', 'S', 16, '2015-08-12 12:28:52'),
(120, '10', '20', '60', '', 'M', 55, '2015-08-12 12:18:15'),
(121, '10', '20', '60', '', 'M', 27, '2015-08-12 12:18:22'),
(122, '10', '20', '61', '', 'S', 21.67, '2015-08-14 13:43:22'),
(126, '10', '20', '60', '', 'H', 0, '2015-08-12 12:19:28'),
(130, '10', '19', '59', '', 'S', 26, '2015-08-12 11:48:23'),
(131, '10', '19', '59', '', 'M', 11.71, '2015-08-12 13:27:08'),
(134, '10', '20', '88', '', 'M', 41, '2015-08-24 05:39:28'),
(135, '10', '20', '88', '', 'H', 33.33, '2015-08-24 05:29:31'),
(136, '10', '20', '88', '', 'H', 0, '2015-08-24 05:25:53'),
(137, '9', '16', '40', '', 'S', 24.38, '2015-08-20 10:42:27'),
(140, '10', '19', '59', '', 'M', 12, '2015-08-12 11:49:34'),
(142, '10', '19', '40', '', 'S', 0, '2015-08-19 12:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_standard`
--

CREATE TABLE IF NOT EXISTS `tbl_standard` (
  `standard_id` int(10) NOT NULL AUTO_INCREMENT,
  `standard` varchar(20) NOT NULL,
  PRIMARY KEY (`standard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_standard`
--

INSERT INTO `tbl_standard` (`standard_id`, `standard`) VALUES
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `standard` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`sub_id`, `standard`, `subject_name`) VALUES
(16, '9', 'Science'),
(18, '9', 'Math'),
(19, '10', 'Math'),
(20, '10', 'Science'),
(39, 'Select standard', 'marathi'),
(40, 'Select standard', ' '),
(41, 'Select standard', 'Math'),
(45, 'Select standard', 'mathe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `video_id` int(20) NOT NULL AUTO_INCREMENT,
  `chap_id` int(20) NOT NULL,
  `sub_id` int(20) NOT NULL,
  `standard_id` int(20) NOT NULL,
  `video_name` varchar(200) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `chap_id`, `sub_id`, `standard_id`, `video_name`) VALUES
(24, 7, 3, 9, '1436595898My life.3gp'),
(25, 11, 3, 9, '1436595922Indian Culture.3gp'),
(26, 8, 4, 9, '1436595954line.3gp'),
(27, 9, 4, 9, '1436596049Circle.3gp'),
(28, 9, 4, 9, '1436596159Circle.3gp'),
(29, 12, 6, 10, '1436596228india freedom.3gp'),
(30, 13, 6, 10, '1436596279modrn history.3gp'),
(31, 14, 7, 10, '1436596433indian economy (2).3gp'),
(32, 15, 7, 10, '1436596458bussiness economy.3gp'),
(34, 44, 18, 9, '1436603916science_chap_2.3gp'),
(35, 44, 18, 9, '1436603916science_chap_3.3gp'),
(36, 44, 18, 9, '1436603916science_chap_4.3gp'),
(37, 44, 18, 9, '1436603953science_chap_2.3gp'),
(38, 44, 18, 9, '1436603953science_chap_3.3gp'),
(42, 52, 20, 10, '1437048153Chrysanthemum.jpg'),
(43, 29, 16, 9, '1437294183work-energy.swf'),
(44, 53, 20, 10, '1437392757Koala.jpg'),
(52, 49, 18, 9, '1438840207VID-20150722-WA0020.mp4'),
(53, 87, 18, 9, '1439300999VID-20150722-WA0020.mp4'),
(54, 87, 18, 9, '1439300999VID-20150714-WA0001.3gp'),
(55, 87, 18, 9, '1439300999VID-20150729-WA0004.mp4'),
(56, 87, 18, 9, '1439300999VID-20150727-WA0009.mp4'),
(59, 27, 16, 9, 'class.swf'),
(60, 27, 16, 9, '1439541095VID-20150111class.swf'),
(61, 31, 19, 10, '1439796042Class X 1Real Numbers.swf'),
(62, 31, 19, 10, '1439797848Class X 1Real Numbers.swf'),
(63, 31, 19, 10, '1439797848Class X 2Polynomials.swf'),
(64, 31, 19, 10, '1439797848Class X 3Linear Equation.swf'),
(69, 41, 19, 10, '1440585391Class X 1Real Numbers.swf'),
(70, 41, 19, 10, '1440585391Class X 2Polynomials.swf'),
(71, 93, 19, 10, '1440585495Class X 3Linear Equation.swf'),
(72, 39, 19, 10, '1440588089Class X 1Real Numbers.swf'),
(73, 39, 19, 10, '1440593573Class X 2Polynomials.swf'),
(74, 94, 20, 10, '1441349197Acids Bases & Salts2.swf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
