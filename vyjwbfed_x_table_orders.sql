
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `purchased` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
