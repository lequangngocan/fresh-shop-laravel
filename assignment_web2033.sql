-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 05:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_web2033`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertising`
--

CREATE TABLE `advertising` (
  `id` int(11) NOT NULL,
  `advertising_image` varchar(250) NOT NULL,
  `advertising_title` varchar(250) NOT NULL,
  `advertising_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`) VALUES
(5, 'Vegetables', 'uploads/categories\\categories_img_03.jpg'),
(6, 'Bulbs', 'uploads/categories\\categories_img_01.jpg'),
(38, 'Fruits', 'uploads/categories\\categories_img_02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `userID`, `productID`, `created_at`) VALUES
(1, 'hi', 13, 12, '2020-06-22 15:11:59'),
(2, 'hello', 13, 12, '2020-06-22 15:11:59'),
(5, 'Good product !', 3, 13, '2020-06-22 15:13:47'),
(6, 'halo', 3, 13, '2020-06-22 15:18:06'),
(7, 'hihi', 3, 13, '2020-06-22 15:25:28'),
(8, 'wow', 3, 18, '2020-06-22 15:25:44'),
(9, 'oke bro', 13, 18, '2020-06-22 15:26:59'),
(10, 'oh my God !', 3, 14, '2020-06-23 00:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Lê Quang Ngọc An', 'lequangngocan@gmail.com', 'Test contact', 'hello', '2020-06-19 07:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `coupon_name` varchar(250) NOT NULL,
  `coupon_detail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `coupon_name`, `coupon_detail`) VALUES
(1, 'FREESHIP5KM', 'Freeship', 'Freeship under 5km'),
(2, 'DISCOUNT20', 'Discount', '20% discount on product price');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(250) NOT NULL,
  `news_detail` text NOT NULL,
  `news_image` varchar(250) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_detail`, `news_image`, `views`, `created_at`) VALUES
(1, 'BRITISH PARENTS \'GIVING UP\' ON CONVINCING KIDS TO EAT FRUIT AND VEGETABLES, SURVEY FINDS', '<p>Half of British mums and dads have &quot;given up&quot; trying to get their kids to&nbsp;<a href=\"https://www.independent.co.uk/topic/HealthyEating\">eat their &quot;five-a-day&quot;</a>, according to research.</p>\r\n\r\n<p>A poll of 2,000 parents of children up to age 10, also found 41 per cent have abandoned attempting to get greens into kids&rsquo; diets because they are more concerned about ensuring they eat full stop.</p>\r\n\r\n<p>Twenty-nine per cent have lost their patience trying to get their youngsters to eat a healthy diet, with one in five saying they have given up because they were tired or in a rush.</p>', 'uploads/blogs\\pineapple-fruit.jpg', 3, '2020-06-13 01:33:45'),
(2, 'THE RAW FRUITS AND VEGETABLES THAT IMPROVE MENTAL HEALTH, ACCORDING TO STUDY', '<p>Eating raw fruits and vegetables could boost mental health and assuage depressive symptoms, a new&nbsp;<a href=\"https://www.frontiersin.org/articles/10.3389/fpsyg.2018.00487/full\" target=\"_blank\">study</a>&nbsp;suggests.</p>\r\n\r\n<p>Researchers at the University of Otago in New Zealand found that people who consumed more produce in its natural, uncooked state reported higher levels of psychological well-being compared to those who ate mostly cooked alternatives.</p>\r\n\r\n<p>Surveying 422 adults between the ages of 18 and 25, the study also considered other variables relating to participants&rsquo; lifestyles such as overall diet, physical activity, body mass index and socioeconomic status.</p>', 'uploads/blogs\\istock-683044558.jpg', 1, '2020-06-13 07:50:32'),
(3, 'CONSUMING FRUIT TEAS AND SALT AND VINEGAR CRISPS CAN CAUSE TOOTH EROSION, EXPERTS WARN', '<p>Frequently drinking fruit teas and eating salt and vinegar crisps could result in severe tooth erosion, experts have warned.</p>\r\n\r\n<p>In between meals, it&rsquo;s all too easy to turn to the teabags for a cleansing fruit tea or to indulge in a sweet or salty snack.</p>\r\n\r\n<p>However, researchers at King&rsquo;s College London have discovered that consuming acidic food and drinks, especially in between meals, could be extremely detrimental to the state of your teeth.</p>', 'uploads/blogs\\fruit-tea-tooth-erosion.jpg', 2, '2020-06-13 07:52:02'),
(5, 'DO YOU HAVE THE ROCKET GENE? WHY GENETICS MAY DECIDE WHETHER YOU LIKE THE PEPPERY VEGGIE', '<p>Love it or hate it, rocket is popular all over the world. Also known as arugula, roquette and rucola, it&rsquo;s known for its pungent and peppery flavours. It might look like an unassuming leafy&nbsp;<a href=\"https://www.independent.co.uk/news/world/americas/us-politics/pasta-vegetable-trump-school-lunch-flour-a9301186.html\">vegetable</a>, but the reasons for its taste, health benefits and whether we like it all comes down to genetics.</p>\r\n\r\n<p>Rocket actually encompasses several species, all of them part of the same family as broccoli, cabbage, kale, mustard and watercress &ndash; the&nbsp;<em>Brassicales</em>. Its distinctive aroma and flavours are created by chemical compounds produced by its leaves, called isothiocyanates. Some of these compounds can be eye-wateringly hot, whereas others can have a radishy flavour &ndash; or none at all.</p>', 'uploads/blogs\\rocket-arugula-rucola.jpg', 2, '2020-06-16 09:10:02'),
(6, 'WOMAN SHARES KITCHEN HACK FOR KEEPING VEGETABLES FRESH FOR UP TO A MONTH', '<p>An Australian woman has shared a hack for keeping&nbsp;<a href=\"https://www.independent.co.uk/topic/Vegetables\">vegetables</a>&nbsp;fresh for up to a month in the fridge, using just water and a jar.</p>\r\n\r\n<p>According to Kate Freebairn, who shares&nbsp;<a href=\"https://www.independent.co.uk/topic/kitchen\">kitchen</a>&nbsp;hacks under the name&nbsp;<a href=\"https://www.facebook.com/thepantrymama/\" target=\"_blank\">The Pantry Mama</a>, storing vegetables such as celery and carrots in water allows them to last much longer than storing them in a regular container.</p>\r\n\r\n<p>In the post, which Freebairn shared from @ReduceWasteNow, it says that celery stored in a water-filled jar will stay fresh for up to two weeks, while submerged carrots can last up to one month.</p>', 'uploads/blogs\\istock-831053534.jpg', 0, '2020-06-16 09:10:38'),
(7, '86% OF PEOPLE DON\'T KNOW HOW MUCH FRUIT AND VEG THEY SHOULD EAT', '<p>The majority of adults aren&#39;t sure how many portions of&nbsp;<a href=\"https://www.independent.co.uk/topic/fruit\">fruit</a>&nbsp;and&nbsp;<a href=\"https://www.independent.co.uk/topic/vegetables\">vegetables</a>&nbsp;they should be eating, a new study has warned.</p>\r\n\r\n<p>In 2003, the five-a-day campaign, based on a recommendation by the World Health Organisation (<a href=\"https://www.independent.co.uk/topic/who\">WHO</a>), was launched in the UK to encourage individuals to eat five portions of fruit and vegetables a day.</p>\r\n\r\n<p>However, despite this clear guidance, many people still aren&#39;t reaching this target, as outlined in the new Health and Food Supplements Information Service (HSIS)&nbsp;<a href=\"http://www.hsis.org/wp-content/uploads/2019/06/HSIS-Dietary-Trends-report-2019.pdf\" target=\"_blank\">report</a>&nbsp;<em>State of the Nation: Dietary Trends in the UK &ndash; 20 Years On</em>.</p>', 'uploads/blogs\\food-main.jpg', 1, '2020-06-16 09:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `couponID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `sale_price` float NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `describe` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `price`, `sale_price`, `amount`, `quantity_sold`, `views`, `describe`, `created_at`, `updated_at`, `categoryID`) VALUES
(11, 'Deer Run Farms Boston Lettuce', 'uploads/products\\veg_dmy_30633_z.jpg', 3, 2, 120, 5, 7, '<p>Boston is as mild and likeable as green leaf, but with a character all its own. It&#39;s got as complex a flavor as you&#39;ll find in any lettuce. It has a pronounced crisp garden freshness balanced by just a touch of bitterness. The velvety texture that sets Boston apart from its coarser lettuce cousins earns its entry into the &quot;butterhead&quot; lettuce category.</p>', '2020-06-10 15:19:35', '2020-06-10 15:19:35', 5),
(12, 'Little Gem Lettuce', 'uploads/products\\veg_pid_2301890_z.jpg', 3, 2, 100, 0, 6, '<p>Little Gem, a.k.a. sucrine, is your new favorite salad ingredient. It&#39;s sweet, compact lettuce that resembles romaine after you strip away the flimsy outer leaves. Vinaigrettes love getting lost in the Gem&#39;s nooks and crannies, and even grill time can&#39;t subdue its crispness.</p>', '2020-06-10 15:30:40', '2020-06-10 15:30:40', 5),
(13, 'Ocean Mist Farms Romaine Hearts', 'uploads/products\\ltc_rmanhrts_z.jpg', 6, 4, 200, 0, 2, '<p>Romaine is sweet and crunchy at heart. If you find yourself ripping through a whole head of romaine to get to the small, mild, and crisp leaves in the center, let us do the work for you. Romaine hearts deliver the soul of the lettuce without all the prep work.</p>', '2020-06-10 15:32:37', '2020-06-10 15:32:37', 5),
(14, 'Ocean Mist Farms Iceberg Lettuce', 'uploads/products\\ltc_icebrg_z.jpg', 3, 2, 50, 0, 3, '<p>Iceberg is the king of crunch in the lettuce family, with a little sweet snap in every bite. Crisp and cool, with the oomph to stand up to the biggest burger without wilting.</p>', '2020-06-10 15:34:21', '2020-06-10 15:34:21', 5),
(15, 'Deer Run Farms Red Leaf Lettuce', 'uploads/products\\veg_dmy_30634_z.jpg', 3, 2, 10, 4, 9, '<p>With crisp green stalks and frilly burgundy leaves, this leaf lettuce is slightly sweet and extremely tender. Its mild, nutty flavor makes it perfect for any salad &mdash; toss with your favorite fixings and a light dressing to create a refreshing dish. We love using this lettuce as a gourmet burger topper.</p>', '2020-06-10 15:36:05', '2020-06-10 15:36:05', 5),
(16, 'Gold Potatoes', 'uploads/products\\veg_pot_ykn_5lbbg_z.jpg', 10, 8, 120, 0, 2, '<p>The gold potato&#39;s moist, silky-smooth, pale yellow flesh makes the best mashed potatoes we&#39;ve ever eaten. Gold potatoes have a rich, buttery taste and smooth texture. Use whenever a recipe calls for a fine-grained potato with medium starchiness. Try gold potatoes simply boiled or tossed into potato salad.</p>', '2020-06-10 15:37:34', '2020-06-10 15:37:34', 6),
(17, 'The Little Potato Company', 'uploads/products\\veg_pid_2302470_z.jpg', 5, 3, 150, 0, 0, '<p>Our signature Creamer potato, the Boomer Gold varietal is coveted for its exquisite combination of delicate golden skin, velvety flesh, and naturally buttery flavor. We have carefully selected every Boomer Gold for consistent sizing to ensure they all cook quickly and evenly whether roasted, boiled, or microwaved.</p>', '2020-06-10 15:51:23', '2020-06-10 15:51:23', 6),
(18, 'Greenhouse Cucumber', 'uploads/products\\cuc_hths_z.jpg', 6, 4, 222, 8, 13, '<p>A truly super cuke. Hothouse cucumbers are green, fresh-tasting, and almost minty. At least a foot long and seedless, they are sometimes called &quot;burpless&quot; because their thin skins are easy to digest. They make the most refined teatime sandwiches.</p>', '2020-06-10 15:54:58', '2020-06-10 15:54:58', 6),
(19, 'Organic Red Cabbage', 'uploads/products\\orgveg_cbbg_red_z.jpg', 3, 2, 123, 0, 1, '<p>The purple-robed prince among cabbages. It has an intense musky flavor and sweet snappiness. Red cabbage can be stewed, braised, or even curried. It&#39;s crispy when you scoop the raw leaves into dip. Crunchy when you stir-fry small wedges. A silky herbal accent on the tongue when you add chopped leaves to stew or soup.</p>', '2020-06-10 15:56:11', '2020-06-10 15:56:11', 6),
(20, 'Snipped Green Beans', 'uploads/products\\bns_green_r2e_z.jpg', 6, 4, 142, 0, 0, '<p>Herbal and earthy, firm and crisp, green beans are universal favorites, and these pretrimmed versions make weekday dinner preparation a snap. They&#39;re a classic side dish served on their own &mdash; simply steam, saut&eacute;, or boil them (we like to add a little butter and lemon). Their texture also stands up to long cooking in dishes like casseroles and stews, or for a lightning-fast vegetable side, simply microwave them.</p>', '2020-06-10 15:57:21', '2020-06-10 15:57:21', 6),
(21, 'Hass Avocados', 'uploads/products\\avc_has_vpk_z.jpg', 7, 4, 200, 0, 0, '<p>With its irresistibly buttery flavor, the Hass sets the avocado standard. It also wins the popularity contest, making up 75% of the American crop. A luscious slice of Hass avocado really pumps up the taste of burritos, burgers, salads, and sushi rolls.</p>\r\n\r\n<p>Plan ahead! Our avocados arrive firm. They&#39;ll ripen in 3-5 days at room temperature &mdash; just like a banana &mdash; or speed up the process by storing them in a paper bag.&nbsp;</p>', '2020-06-10 15:58:46', '2020-06-10 15:58:46', 38),
(22, 'Honeycrisp Apples', 'uploads/products\\fru_apl_hnycsp_4pk_z.jpg', 12, 10, 200, 0, 0, '<p>True to its name, the honeycrisp is sweet and crunchy with a warm, yellow interior and an attractive yellow-red streaked skin. We love this healthy treat packed in a lunch, sliced for after-school snacks or as a take-along for your anytime snacking.</p>', '2020-06-10 16:00:10', '2020-06-10 16:00:10', 38),
(23, 'Organic Bananas', 'uploads/products\\fru_pid_2210788_z.jpg', 16, 12, 244, 0, 0, '<p>The banana is an anytime, year-round snack. We like them fully yellow with just a dusting of brown freckles. But super-ripe, meltingly sweet bananas and firmer greenish ones have their fans too. Slice them onto cereal or pancakes, fold into fruit salad, blend into smoothies, and bake into muffins. Heat brings out bananas&#39; creamy sweetness. Try baking, broiling, or saut&eacute;ing them with butter and sugar for a luscious dessert.</p>', '2020-06-10 16:22:44', '2020-06-10 16:22:44', 38),
(24, 'Sweetest Batch Strawberries', 'uploads/products\\fru_pid_2210796_z.jpg', 11, 9, 322, 0, 0, '<p>Driscoll&#39;s Sweetest Batch Strawberries are specially picked for their particularly sweet flavor. Each batch meets their Joy Makers&#39; rigorous sweetness standards. They&#39;re a tasty and natural treat to brighten up your summer picnics and afternoon desserts while also flavorful enough to enjoy on their own, so dig in. Here for a limited time only. (from Driscoll&#39;s)</p>', '2020-06-10 16:23:59', '2020-06-10 16:23:59', 38),
(25, 'Gold Nugget Mandarin', 'uploads/products\\fru_dmy_10114_z.jpg', 3, 2, 300, 0, 0, '<p>The Gold Nugget variety of mandarin is a bright-orange beauty with rich, sweet-and-tart flesh. Easy to peel and naturally seedless, they&#39;re perfect as kid snacks or lunch bag additions. Toss sections into salads or use to top simple desserts. No matter how you eat them, take the time to smell the mandarins &mdash; the aroma is breathtaking.</p>', '2020-06-10 16:25:02', '2020-06-10 16:25:02', 38);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `image_review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slide_title` varchar(250) NOT NULL,
  `slide_detail` varchar(250) NOT NULL,
  `slide_image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slide_title`, `slide_detail`, `slide_image`, `status`, `link`) VALUES
(4, 'Welcome To Freshshop', 'Vegetables are well-known for being good for your health. Most vegetables are low in calories but high in vitamins, minerals and fiber.', 'uploads/slider\\banner-01.jpg', 0, 'product'),
(5, 'Welcome To Freshshop', 'It is rich in a sulfur-containing plant compound known as glucosinolate, as well as sulforaphane, a by-product of glucosinolate', 'uploads/slider\\banner-02.jpg', 0, 'product'),
(6, 'Welcome To Freshshop', 'Brussels sprout consumption can help enhance detoxification as well.', 'uploads/slider\\banner-03.jpg', 0, 'product');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) DEFAULT 0,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify_code` varchar(250) DEFAULT NULL,
  `verify_code_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `password`, `role`, `email`, `address`, `phone_number`, `created_at`, `updated_at`, `verify_code`, `verify_code_time`) VALUES
(3, 'anlqn', 'Lê Quang Ngọc An', '$2y$10$PKxsKkRQJMT5B35016S7lufmeauOZ3HFLw26ooqSnZ5hrceOEvRum', 1, 'lequangngocan@gmail.com', 'Nghĩa Lộ - Yên Nghĩa - Hà Đông - Hà Nội', '0387210034', '2020-06-06 14:49:00', '2020-06-06 14:49:00', '$2y$10$UdxJadqB6Kj/FyUh1lRCcOojg0PchwejE3HYa2zzBBnt8fV.dfGEe', NULL),
(13, 'anlqnph07584', 'An Lê Quang Ngọc', '$2y$10$dICIrnimwLfq37zJbq11xuRP.p7jJgzfOeU.89knM.j.8Pr6P/mdC', 0, 'anlqnph07584@fpt.edu.vn', 'Yên Nghĩa - Hà Đông - Hà Nội', '0387210034', '2020-06-12 15:51:58', '2020-06-12 15:51:58', '$2y$10$GgGHz/PqiPQxi7kU/C1XV.bcQ5cCUul.07bW43FlEI5WWaPm1.NG6', NULL),
(17, 'anlqn123', 'Lê Quang Ngọc An', '$2y$10$wSCI7gROzWQ7yzaE/MEwHukph1sdw5kTa.2J.3sx5f2MK/5.tueqy', 0, 'lequangngocanx@gmail.com', 'Yên Nghĩa - Hà Đông - Hà Nội', '0387210030', '2020-06-20 01:18:49', '2020-06-20 01:18:49', '$2y$10$F9cWPnvfcO//LumnoJ2BYOOH2zmO.o2V/AksVtW36b/1T/4Xt.gR6', NULL),
(18, 'anlqnxxxx', 'An Lê Quang Ngọc', '$2y$10$ZnFz2Oo6mOUqC.T14UmN7u6QgCTu4X1jD.iaCYjMkfPAdUGIk5jvK', 0, 'lequangngocan123@gmail.com', 'Yên Nghĩa - Hà Đông - Hà Nội', '0387210030', '2020-06-22 15:46:17', '2020-06-22 15:46:17', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `coup` (`couponID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`couponID`) REFERENCES `coupon` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
