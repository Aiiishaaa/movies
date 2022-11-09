

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone  "+00:00";


--
-- Database: `mymovies'--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactId` int(20) NOT NULL,
  `ContactEmail` varchar(100) NOT NULL,
  `ContactTitle` varchar(200) NOT NULL,
  `ContactMessage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF-8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestId`, `RequestEmail`, `RequestTitle`, `RequestMessage`) VALUES
(1, 'Aicha', 'Demande de renseignement', 'Bonjour, Merci de me communiquer les étapes de suppressions de compte');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `UserId` int(50) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF-8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`UserId`, `Fullname`, `Email`, `Username`, `Password`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@moviesinfo.cf', 'admin'),
(22, 'aicha', 'aicha', 'Aicha Hamida', 'aicha.hamida@ynov.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `contact`
  MODIFY `ContactId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `UserId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

