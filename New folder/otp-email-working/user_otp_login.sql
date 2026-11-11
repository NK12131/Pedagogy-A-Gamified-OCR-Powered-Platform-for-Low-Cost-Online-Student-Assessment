CREATE TABLE IF NOT EXISTS `registered_users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
)
CREATE TABLE `otpstore` (
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `id` int(12) NOT NULL,
  `newid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;