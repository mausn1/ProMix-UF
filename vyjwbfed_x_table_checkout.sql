
-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `randomkey` int(11) NOT NULL,
  `checkedout` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_postcode` varchar(150) NOT NULL,
  `method` int(11) NOT NULL,
  `user_city` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
