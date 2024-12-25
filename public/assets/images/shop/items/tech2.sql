-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 25, 2024 lúc 04:16 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tech2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `thumbnail`, `name`, `created_at`, `updated_at`) VALUES
(1, 'banners/s5XAco7suj5VrWmv0ztnyNhPmf2luMDTbqGU5T44.jpg', 'anh 1', NULL, '2024-12-05 23:28:42'),
(2, 'banners/HYQIpqYjeVHo4EnSyv1vJRl6nDsnJUjcyeSasaqs.jpg', 'Banner 3', NULL, '2024-12-05 20:37:53'),
(3, 'banner.jpg', 'Banner 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `content`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Quaerat minus rerum dolores ut autem.', 'In deserunt aut quaerat. Qui et dolorem fugiat voluptate dicta esse voluptas. Harum quo aspernatur reiciendis nihil blanditiis. Consequatur repudiandae consequatur enim vel consequatur libero unde.', 'Ut officia et dolorum amet et. Illo enim sint fugiat impedit magni et reprehenderit. Unde qui modi maiores. Sed sit tempore libero ab quae rerum omnis. Occaecati suscipit a vel ea labore. Quam nam repellendus architecto aspernatur earum. Dolore quia dolorem qui architecto velit sapiente sed. Minus commodi nam est. Quo sint vel hic est molestias. Id fugit consectetur quo eaque eveniet magnam. Quam fugit voluptas sint modi voluptatem at molestiae. Consequatur ut nobis dolorum et et qui commodi molestiae. Sapiente omnis est similique dicta aut consequatur. Quis nihil a vel laborum illo nulla repellendus. Dolorum doloribus aut quaerat sunt voluptas. Nihil iure ad natus facere et distinctio cupiditate. Est est sed molestiae odit quia vel distinctio quam. Facilis esse nulla distinctio ea autem. Et illo ullam maiores nemo reprehenderit dolorem sint. Ipsam fugit non nobis illum blanditiis. Quo magni aut eos numquam velit repellendus quo. Ducimus eos quis beatae quia quidem quis beatae. Et quas sed hic illo at est ut. Consectetur consectetur molestiae nostrum adipisci fugit. Autem sed officiis voluptatem sapiente sit tenetur necessitatibus. Dolorum consequatur laborum accusamus fugit et. Omnis odio error porro voluptatum. Explicabo et enim laborum quam sapiente. Sit laudantium quis ducimus aut sapiente tempora. Sapiente enim cumque sunt eaque tempora commodi in. Quo voluptas dolor omnis eos enim. Temporibus ex qui consequatur repellendus hic. Asperiores porro pariatur dolorum error totam. Rerum doloribus rem quia laudantium dolore omnis dicta est. Et accusantium autem itaque asperiores. Non officia molestias nulla et sequi dolore optio. Enim et ut quas ducimus. Ut fuga soluta est dolor neque sint et. Consequuntur tempora quas eum dolor consequatur quia veniam. Expedita quia odit qui ad nesciunt perferendis. Delectus recusandae impedit quas voluptas. Iure blanditiis nostrum consectetur nemo sequi fugit. Sint at nisi odit molestiae. Ullam voluptas non delectus consequatur.', 'https://via.placeholder.com/640x480.png/0099aa?text=articles+ut', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(2, 'Vel eos ipsum accusamus voluptatibus.', 'Aspernatur est libero ut in ea nam. Minima voluptatem nostrum ut ipsum in. Sit fugit nesciunt ut blanditiis voluptas nulla incidunt omnis. Aut reprehenderit sapiente atque tempore maiores eum nihil laboriosam.', 'Ut est exercitationem rerum facere totam. Quas dolorem fuga atque ut illum. Porro aliquam voluptas amet iure adipisci odio ea. Facere sint natus necessitatibus vel unde voluptatem rerum. Dicta dolorum delectus quae nihil et perspiciatis qui ut. Excepturi est laboriosam quis voluptatum labore quis. Odit quibusdam quisquam dolor amet. Pariatur et magnam enim laborum doloremque. Perspiciatis dolor dolore a debitis est qui. Fuga sed dolor quidem voluptates perspiciatis tempora. Eos velit eligendi sed doloribus harum eligendi. Doloremque est quos voluptatibus et totam. Qui laborum distinctio est ut quod autem. Hic aspernatur veritatis harum molestiae quia nisi tenetur. Error consectetur neque ut reprehenderit molestias. Deserunt nisi natus ipsum neque repellat et. Nostrum nemo quis molestiae nam. Ab voluptas praesentium magnam blanditiis consequatur aut. Nemo maiores et similique mollitia. Accusantium adipisci inventore deserunt aut expedita aut. Aut autem aut cupiditate sit mollitia a voluptatem. Aspernatur eaque eos quaerat eius. Quibusdam quidem minus eum quasi corrupti sint. Atque velit culpa nulla esse et est quia tempore. Eos porro quod magnam quo est sint. Quaerat perspiciatis et inventore. Repellendus sed voluptatibus sequi natus. Sequi fugiat blanditiis nisi omnis minus. Exercitationem aut iste ut repellat. Ut aut molestiae aspernatur aperiam qui rerum accusantium. Doloribus molestiae libero et voluptas voluptate. Alias necessitatibus recusandae et qui voluptas. Necessitatibus consectetur quibusdam commodi deserunt voluptas ullam reprehenderit nemo. Sunt qui numquam tenetur quidem dolores quae. Sapiente alias veritatis voluptatibus accusantium eum quae suscipit. Deleniti aspernatur minima quia ipsum quasi voluptas sint ut. Ex praesentium et magni. Sequi sint aliquam ratione qui beatae sed. Laboriosam et qui repellendus est cumque ut enim. Reprehenderit et sint laudantium ratione sequi qui optio. Sed neque possimus molestiae molestiae excepturi corrupti odit.', 'https://via.placeholder.com/640x480.png/009966?text=articles+iure', 42, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(3, 'Voluptatem fuga qui praesentium quae.', 'Similique voluptas sint esse aperiam laborum odit ut. Quos voluptas cum sequi pariatur totam eos optio. Voluptatem ut aliquid quaerat saepe quod.', 'Accusamus aut dignissimos occaecati cupiditate. Cumque et eos et ut harum maiores. Error dolor libero assumenda distinctio laudantium omnis. Nisi quia reprehenderit cum ea. Voluptatibus quisquam aliquam dolorem qui libero et nihil quo. Voluptatem aut consequatur nihil ab. Sed ratione voluptas ut est. Facere harum id quis ab dolore maiores modi. Voluptatem quod fugiat vel mollitia perferendis. Aut eligendi recusandae quia id qui eos modi. Quas sequi dignissimos illum quam nihil. Aspernatur commodi fuga nobis enim. Fugit aut sit magni consectetur quia omnis. Ut architecto ut et ratione id necessitatibus. Temporibus recusandae omnis repellendus optio aut eveniet. Voluptatem quia quia voluptatem ut voluptatem. Veritatis amet ut qui odit assumenda dolore. Aut excepturi repellat aut impedit aspernatur eos possimus vel. Explicabo ea iure ex excepturi. Laborum molestias est odit occaecati perferendis. In quo amet omnis suscipit harum. Quisquam quibusdam labore odio ullam. Nihil quidem doloribus laboriosam. Voluptatem ratione ut quam eum. Cupiditate et neque fugiat commodi facilis quam et quae. Aliquid at consectetur est voluptate sint. Perferendis consequatur nostrum tenetur ut. Porro qui eligendi eos consequatur ex quis. Exercitationem corrupti et quaerat labore. Repellat numquam nesciunt ducimus voluptatum aut consequatur. Nesciunt eos sit deleniti molestias est voluptatem est. Voluptatem cupiditate atque molestiae quas aut asperiores magni. Dolores et incidunt ut cumque cum amet. Blanditiis enim sunt eveniet voluptatem distinctio animi qui distinctio. Voluptatem ut sit qui distinctio et quia illum est. Corrupti vitae voluptas ut sed. Aut dolor id fugit at. Nisi minima quia maiores tenetur. Sunt aut autem inventore rerum omnis molestias voluptas. Dolores dolorem ut nemo dignissimos amet sapiente. Excepturi perspiciatis vel et dolore repellat ut. Magni beatae amet et quia. Aspernatur quam qui quas iusto magni earum non dignissimos. Sit cumque libero a voluptas.', 'https://via.placeholder.com/640x480.png/003366?text=articles+corporis', 43, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(4, 'Repellat sunt rerum modi repellendus aut magnam quod.', 'Nostrum quam sint rerum perferendis. Qui non ab nemo delectus. Sed ullam saepe temporibus aut quas omnis nisi. Quia officiis dicta qui veritatis expedita vero quisquam.', 'Et doloremque sit consequatur quas esse et. Accusantium architecto qui pariatur corporis et recusandae quisquam. Eius numquam molestiae officia rerum id consequatur. Corrupti dicta temporibus consectetur corrupti sit a et. Amet asperiores maxime laboriosam beatae aut dolor. Optio maiores qui totam sunt sint. Incidunt quia sit pariatur optio sed. Non quo blanditiis doloremque debitis illum in. Deserunt et cum aliquid velit dolor officia. Fugiat sint laudantium fugit atque voluptatem vitae ratione. Aut quia sequi deleniti molestiae ad ea dolores. At enim reiciendis est quis. Et at rem atque. Vel ducimus in debitis dicta et ab harum necessitatibus. Id aut et autem temporibus earum. Voluptatem qui delectus ab quis. Aut magnam adipisci ea et. Eum rerum maiores deleniti expedita. Qui error molestiae quisquam adipisci reprehenderit voluptatem. Aspernatur similique sapiente eos voluptatem necessitatibus fugit ipsa. Et qui et temporibus alias. Ut eos tempore id aut. Commodi alias sequi consectetur cumque fugiat. Officia rem dolore ipsam sapiente. Laudantium animi autem animi. Iure praesentium rerum alias minima. Tempore dolorem earum id ipsa nulla inventore est harum. Quia corrupti et quos totam. Minus repellendus modi quaerat et. Natus eveniet totam quos necessitatibus soluta eos. Rem et eaque eaque quia. Voluptatum qui itaque quo praesentium hic. Temporibus at architecto commodi ut eligendi. Ea voluptas eos qui doloribus saepe quidem. Autem culpa et aliquid ullam explicabo possimus. Non esse reprehenderit est. Voluptate unde repellendus sequi. Deserunt voluptas asperiores id asperiores. Libero quis beatae aut quis quis ut atque. Commodi autem ex consequuntur voluptas. Tenetur sit nobis libero quisquam. Soluta ut fugiat et sit. Iure aut ad assumenda illum tempore atque. Quae voluptates eum ad. Odio et cumque voluptatem nostrum molestias porro labore. Labore enim neque dolor temporibus sequi. Ut cumque nesciunt et ut dignissimos.', 'https://via.placeholder.com/640x480.png/006600?text=articles+in', 44, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(5, 'Aliquid sint nihil repellat.', 'Et reiciendis architecto cumque nam ad. Harum reprehenderit voluptatem ut sed. Quo magnam blanditiis sint possimus similique culpa.', 'Sequi maiores tenetur vel ex voluptatem quia nesciunt magni. Aut a sed est provident dolore. Vel magnam blanditiis et laudantium illum. Sint et labore beatae. Commodi voluptatem ut odio vel dolorum minus est rerum. Et sapiente distinctio assumenda pariatur non labore. Minima eum ratione provident aliquam provident a est. Dolores et labore aut voluptatem quia occaecati non sint. Minima tenetur autem deleniti ullam. Unde accusantium est delectus id omnis. Odio ut ut harum quo tempore aut. Sapiente quo quis hic labore facilis. Nemo non consequuntur laudantium vitae. Unde velit iusto enim iste tempore sit autem. Qui saepe id aut quis omnis. Nam laboriosam repellendus et ullam alias. Deserunt molestiae voluptas iusto. Sit a deleniti quos asperiores est eum iure. Non doloribus consectetur in. Natus non inventore et et et. Totam velit esse temporibus quibusdam asperiores commodi. Aspernatur incidunt vel et temporibus enim totam. Rerum repudiandae totam saepe. Labore pariatur fugiat rem consequatur rem repellendus. Consequuntur omnis dolore aliquam placeat dolores eos sed. Voluptatem sequi placeat sint. Nihil ut maxime et officiis. Laborum et illo repellat placeat quidem. Totam accusamus ut aut laboriosam id quod ea voluptates. Tempora eum velit dolorem sit sed. Adipisci illo cupiditate recusandae reprehenderit a. Provident culpa tempora porro voluptatem error sed beatae. Possimus asperiores quo enim ab reiciendis. Labore nemo occaecati non debitis ab veniam. Voluptas voluptatem quam perferendis. Quis quisquam aut quasi error et. Veritatis reprehenderit quis ut. Consequatur recusandae repellat dolor ut esse et tempore. Nemo asperiores dolore enim. Qui a ut sit nam. Aut tenetur atque eaque dolor. Dolorum consequatur provident est. Corporis odio soluta illo consequatur eos quos. Ut illo nobis aut et rerum. Cumque excepturi similique quo est et. Omnis et nisi id cum qui quia. Explicabo et qui quasi quia aut dolorem impedit. Sit officia deleniti consequuntur illo dolor.', 'https://via.placeholder.com/640x480.png/007755?text=articles+fuga', 45, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(6, 'Ut quod sunt officia dolores sapiente vero.', 'Consequatur eius officiis aut eos. Excepturi ex at eum eum.', 'Corporis minima est sequi et. Reprehenderit neque quia aperiam error voluptatem earum. Consequatur quam ex non velit harum atque. Dolor id fuga ratione amet et. Consequatur minus ut fuga hic veniam pariatur. Alias qui porro voluptatem aut nihil adipisci adipisci eum. Et atque ad et soluta doloremque incidunt eos. Adipisci vitae qui quia esse totam. Dolorem voluptas unde ab voluptatem. Aut eaque odit consequatur. Aut esse magnam qui commodi qui. Et aut aut ducimus aut accusamus atque sed occaecati. Quia voluptas maiores harum sunt exercitationem et. Ullam sequi rerum incidunt et. Magnam blanditiis natus est quaerat cupiditate. Est deserunt aut laborum consequatur est omnis non quis. Adipisci laboriosam id soluta rerum. Omnis dolorem quo quas error soluta ut aut illo. Ipsum quaerat in odit reprehenderit optio. Consequatur et ut nulla eaque cupiditate et voluptatem. Aut vitae pariatur sint. Dicta animi et eum rem enim error. Harum quibusdam facilis assumenda sed consequatur. Cum repellat necessitatibus sed et. Nemo quis suscipit impedit ipsum asperiores qui nihil. Facilis porro quia est sit. Est est et aut occaecati. Assumenda officiis officiis saepe. Minus molestiae asperiores odio iure ut recusandae. Officia et incidunt et dolores quia reprehenderit voluptas eum. Cum explicabo voluptatum ut incidunt veniam. Impedit non facilis commodi cupiditate dicta reiciendis architecto. Quae voluptatem provident eum voluptates. Possimus sequi voluptas illo natus hic blanditiis. Nihil dolorem libero alias qui rerum. Quos odit exercitationem sequi blanditiis possimus ipsam qui magni. Dicta consequatur et rerum et animi ab aut. Est veritatis recusandae qui saepe sed. Cum provident possimus consequatur saepe quo ipsa. Eum quo reprehenderit inventore et omnis assumenda molestiae. Ratione sit id reprehenderit dolorum nobis corrupti atque. Corporis est placeat nostrum repellendus.', 'https://via.placeholder.com/640x480.png/002211?text=articles+dolor', 46, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(7, 'Autem ratione accusantium beatae ab qui maxime eum.', 'Eum qui odit corporis nihil consectetur consequatur ad. Quo perspiciatis similique aspernatur minus. Accusamus veniam nihil tempore temporibus veniam excepturi et. Odio nemo tenetur nostrum minus nostrum.', 'Ea consequatur omnis in veritatis. Eum alias nihil sunt est omnis voluptatum ut. Quos eius ipsum quo voluptas. Et non et assumenda blanditiis velit. Quisquam ipsa quaerat est eos asperiores esse commodi. Qui ea laborum eos labore. Qui saepe dolores eos temporibus non saepe ut blanditiis. Nobis doloribus et odit dicta. Numquam minus aut veniam in facilis voluptas maxime. Quod minus quas itaque molestiae. Vitae inventore repellendus nihil nostrum inventore non. Eum qui molestiae repellat animi. Nam deserunt assumenda consequatur sit. Ut autem nisi rerum. Voluptates minima facilis qui animi quidem placeat sed. Error officia nobis fugit quod. Est distinctio odio dicta tempora quidem id dolores. Dignissimos ipsa fugit quas aliquid id. Error dolor temporibus velit ut quia libero. Culpa eum quibusdam rem et consequuntur autem qui. Mollitia nemo et excepturi provident similique deserunt tenetur a. Soluta sit qui molestias consectetur nesciunt alias. Sit aut maiores consectetur est eligendi consequatur. Repellendus veritatis porro quidem dicta et voluptatem animi. Modi in incidunt odio esse. Explicabo officiis consequuntur quod non voluptas dolores. Illo in nostrum voluptatem accusamus. Et minus ut consequatur a nulla possimus est. Tempore aut eos sapiente voluptatum deserunt atque. Est iure ipsam et saepe velit. Natus minus mollitia recusandae. Deserunt quos ratione reiciendis non maxime repellat quibusdam. At error et quos quasi doloribus quis ut. Culpa non quidem rerum est distinctio temporibus sit. Aliquid maiores quasi voluptas nihil. Aut enim non veritatis nisi delectus odit quod ipsum. Odio ea ad voluptatibus autem. Sit eaque id eum commodi dolorum. Id iusto qui deserunt possimus consequatur aliquid et voluptas. Id est deserunt aut quidem molestias consectetur. Qui maxime deleniti consequatur eius. Ut quasi mollitia exercitationem iste consectetur incidunt numquam expedita. Veniam fuga ut eos sint. Aut et ut id eum.', 'https://via.placeholder.com/640x480.png/0044ee?text=articles+dignissimos', 47, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(8, 'Ut quam velit aut accusamus accusamus non et dolores.', 'Qui perspiciatis excepturi tempora numquam. Sint tempora maxime ipsam dicta vel pariatur molestias. Et accusamus qui qui. Facilis sit labore repudiandae voluptatem sit et.', 'Sequi veniam omnis voluptas omnis fugit omnis odit. Eum et aut molestiae neque. Dicta nihil eaque nobis. Ut laborum eveniet unde est a sequi molestias sunt. Iusto beatae sapiente est occaecati. Odio ab quidem labore eligendi. Tempora nemo perspiciatis non et. Laborum ut id cupiditate consequatur distinctio. Voluptatem ea voluptas quo omnis eos. Laudantium ut reiciendis sunt expedita minus iusto deserunt. Consequatur voluptas aspernatur quas ut sit enim error. Consequatur officiis quisquam itaque. Ut ut nostrum ut. Provident eum excepturi voluptates. Rerum quos atque iste voluptas ea. Pariatur beatae ad veniam veritatis non voluptatem molestiae harum. Repellat dignissimos vel cum voluptates sed. Nam autem id totam suscipit. Qui quidem maxime qui ipsum molestiae. Alias quod et sed et non accusamus. Voluptatem voluptates voluptates et consectetur eos ut. Quis hic explicabo doloribus quis enim incidunt neque. Itaque modi et ut cupiditate in. Maiores non et temporibus ab. Aut voluptatum dolor consectetur aliquid dignissimos dolore. Debitis sequi aut odio et. Est et quae cumque aut eum. Corrupti laudantium voluptatem quidem id similique odio. Perferendis et in quod. Cum nesciunt fugiat quisquam debitis explicabo. Aut quisquam dignissimos voluptas sed ad ad. Quos dignissimos et nisi rerum placeat vel. Facilis est sit qui maiores quam. Corrupti aspernatur dolore quae id molestiae nobis. Ipsa est dicta velit exercitationem minus in ullam non. Alias fugit eos recusandae aut quibusdam. Totam provident exercitationem qui nulla sequi odit. Voluptatem veniam aut voluptas. Dolor et explicabo et molestiae. Quos ratione aliquam aut voluptatem. Sequi qui omnis exercitationem qui odit quisquam. Saepe rem a doloribus. Natus adipisci deserunt at eius. Ullam libero debitis deleniti sint. Magnam aperiam quas officiis exercitationem et.', 'https://via.placeholder.com/640x480.png/002266?text=articles+consequatur', 48, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(9, 'A placeat est necessitatibus nemo consequatur et.', 'Iure delectus omnis atque distinctio qui. Accusamus modi mollitia beatae sed quas nihil molestiae. Earum eveniet consequatur hic tenetur quibusdam.', 'Distinctio accusantium quis sed quasi. Debitis quia quae excepturi molestias reiciendis ipsum. Deleniti nesciunt rem temporibus ut enim. Repudiandae totam fugiat cum vel quia. Distinctio esse non omnis et fugit corrupti aperiam laboriosam. Sit repellat neque autem magni fuga ab dolores. Dignissimos consequatur sequi vero est mollitia. Dolores nemo atque illo vero praesentium molestias. Nisi repellat dignissimos dolorum facilis nulla eum. Consequatur esse aut dolore vel neque. Consequatur voluptate impedit ut accusamus quod. Pariatur sed et rerum et ullam dolore. Voluptas aperiam cumque repudiandae. Cum voluptates quam omnis beatae nam. Aut ea odio blanditiis quam eveniet est. Rem recusandae aliquam molestias quos consequatur. Et necessitatibus totam officiis qui. Nam magni dolores pariatur perspiciatis ipsum aut consequatur. Quibusdam necessitatibus atque in ut consectetur in ut aut. Consequuntur officiis quo consequuntur. Enim aut illum ut id aut eos aperiam. Consequuntur qui ad quibusdam est voluptatibus praesentium delectus non. Consequatur cupiditate error error molestiae ut dolorem ducimus temporibus. Hic qui nesciunt rerum odit aut velit. Ut culpa quo aut. Occaecati sit voluptatem sint quasi velit. Cupiditate molestias aperiam explicabo perferendis. Eligendi atque reprehenderit laborum quod reiciendis sed. Magnam architecto deserunt tenetur et unde. Dicta et voluptas nihil ipsum quaerat mollitia. Veniam provident voluptate necessitatibus quis molestias et neque sint. Hic ut neque pariatur voluptate. Dolores velit consequatur deserunt nihil sit cupiditate qui. Velit praesentium quia minima similique. Asperiores soluta fuga nostrum maxime. Excepturi ut ex laborum libero. Nihil voluptas enim nihil quasi aut distinctio. Qui hic labore architecto aliquid. Qui unde iure aperiam ut doloremque aut dolore. Iure temporibus magni sed voluptatem eius rerum quis. Delectus quibusdam eaque asperiores consequuntur est enim dolorem.', 'https://via.placeholder.com/640x480.png/00ff66?text=articles+incidunt', 49, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(10, 'Laboriosam sed ut est et eos corporis.', 'Sit quisquam delectus explicabo hic nesciunt voluptatem. Architecto officia dolore nulla ipsa. Recusandae iure dolor sed quia aut distinctio doloremque.', 'Dolor recusandae itaque eligendi porro laborum. Accusantium consequatur voluptatem et. Qui voluptatum eius aut deleniti et. Quia sed id non ducimus architecto quas. Laborum sint necessitatibus consequatur cumque rerum dolorem. Ad qui dolor qui omnis. Voluptas porro iste quasi numquam. Qui nulla consequatur et quaerat et quia perspiciatis eligendi. Blanditiis fugiat quaerat modi qui voluptatum. Sit ea quidem veniam aliquam voluptate. Iure in reprehenderit aliquid in est dolorum. Non aperiam voluptates quia alias velit et eius labore. Est explicabo numquam saepe unde vel atque. Ut a deserunt eum et porro velit facere. Quia vel unde et soluta natus quaerat. Rerum hic sed eligendi tempore non iste libero. Quisquam laborum quia cum voluptatem quis voluptatem. Reiciendis velit commodi eaque voluptatum. Amet dolor omnis velit praesentium neque praesentium enim. Quia non nisi facere reprehenderit veniam repellat facere. Vitae ducimus libero dolorem quod dolores molestias ab. Esse voluptatibus explicabo dolores totam qui. Enim quasi ut est iusto consequuntur. Ea dolores expedita quam aut et. Fugit veritatis sit provident eius accusamus dolorem. Esse earum et quo ut voluptatum iusto. Dolorem laudantium facere vitae inventore deleniti soluta vero. Et delectus alias id eius aut nam. Sit aut eius asperiores dolores quo. Alias quo temporibus vel ipsa architecto id sunt. Mollitia praesentium aliquid animi voluptatem hic odio temporibus. Tempora est quia consectetur sunt quae. Et quam autem eos voluptas architecto quas. Ad officiis vero consequatur. Maiores sed incidunt officia non quae omnis ex sunt. Cumque vero est aliquid voluptas animi animi. Aut non aliquam quaerat hic aut nihil. Ipsum voluptas omnis possimus quaerat. Maxime consectetur quia unde vel incidunt recusandae expedita. Minima veniam voluptatibus doloremque dignissimos. Nostrum iusto vel eligendi quia modi. Et corporis cumque dicta enim eum tempora autem.', 'https://via.placeholder.com/640x480.png/008822?text=articles+veniam', 50, '2024-11-27 19:18:25', '2024-11-27 19:18:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-category.png',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F9%2F22%2F0%2F1729585184413_1_15.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(41, 'Sam Sung', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F9%2F11%2F0%2F1728633270510_12.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-12-06 03:09:06'),
(42, 'Xiaomi', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F10%2F19%2F0%2F1732011833705_1_49.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(43, 'Tai nghe', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F10%2F5%2F0%2F1730822811987_1_41.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(44, 'Phụ kiện ', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F10%2F5%2F0%2F1730800788755_1_39.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(45, 'Oppo', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F10%2F12%2F0%2F1731406537518_1_43.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(46, 'Laptop', 'Porro vel amet voluptatibus dolor unde vero non.', 'https://didongviet.vn/_next/image?url=https%3A%2F%2Fcdn-v2.didongviet.vn%2Ffiles%2Fpage%2F2024%2F9%2F11%2F0%2F1728633270510_12.png&w=64&q=75', NULL, '2024-11-27 19:18:24', '2024-11-27 19:18:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '0001_01_01_000000_create_users_table', 1),
(31, '0001_01_01_000001_create_cache_table', 1),
(32, '0001_01_01_000002_create_jobs_table', 1),
(33, '2024_09_20_020100_create_categories_table', 1),
(34, '2024_09_20_020121_create_products_table', 1),
(35, '2024_09_20_020125_create_orders_table', 1),
(36, '2024_09_20_020128_create_order_items_table', 1),
(37, '2024_09_20_020155_create_user_metas_table', 1),
(38, '2024_09_20_020204_create_blogs_table', 1),
(39, '2024_10_25_034613_create_variants_table', 1),
(40, '2024_10_26_024853_create_carts_table', 1),
(41, '2024_11_05_104427_review', 1),
(42, '2024_11_06_081933_add_variant_id_to_order_items_table', 1),
(43, '2024_11_07_025142_create_wishlists_table', 1),
(44, '2024_11_08_162355_create-banner-table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'ORD097', 'pending', 'Delfina Dicki', 'nstrosin@example.org', '863-314-7656', '184 Vinnie Estates\nLemkeview, NJ 35734-1403', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 21),
(2, 'ORD723', 'completed', 'Brenna Nienow', 'schaden.rollin@example.com', '727-686-0475', '7078 Bridie Orchard\nNorth Kaelyn, KS 13714', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 22),
(3, 'ORD388', 'completed', 'Gregory Leannon PhD', 'creola73@example.net', '(678) 783-6777', '164 Wiegand Wells Apt. 454\nBaronhaven, NE 01426', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 23),
(4, 'ORD926', 'pending', 'Terence Wisozk', 'bhodkiewicz@example.org', '(865) 316-4165', '69898 Lemke Field\nWest Cindyborough, NY 43375', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 24),
(5, 'ORD742', 'pending', 'Waino Sipes', 'dee18@example.org', '+1-865-440-6167', '6409 Blake Flats\nEast Blake, NJ 10568', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 25),
(6, 'ORD577', 'cancelled', 'Trevion Von', 'kpacocha@example.com', '(727) 780-3613', '93979 Wisozk Roads\nEast Oliver, VA 22960-7334', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 26),
(7, 'ORD131', 'cancelled', 'Noemi Pagac', 'dibbert.greta@example.org', '520.873.1235', '266 Wilderman Estates Suite 809\nEast Rosalyn, WY 04372-3546', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 27),
(8, 'ORD851', 'pending', 'Pauline Donnelly', 'krussel@example.org', '+18105336689', '8035 Jerde Extensions Apt. 727\nHillshire, FL 83684', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 28),
(9, 'ORD942', 'cancelled', 'Tomas Donnelly', 'isidro94@example.org', '(631) 450-1865', '62484 Wuckert Islands Suite 995\nHuelsshire, MD 07670-6931', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 29),
(10, 'ORD950', 'completed', 'Unique DuBuque', 'jalyn03@example.org', '+1.520.488.0912', '9148 Mitchell Viaduct Apt. 896\nWest Jaquelin, MD 99853-7973', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 30),
(11, 'ORD279', 'completed', 'Maximo Paucek', 'mireille34@example.com', '865.835.3635', '24325 Olga Plain Suite 922\nWest Oranchester, TN 47993-8252', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 31),
(12, 'ORD217', 'cancelled', 'Dr. Akeem Borer', 'nhahn@example.com', '360-456-4322', '869 Ziemann Glens Suite 095\nWest Morris, AR 86134-1164', '2024-11-27 19:18:24', '2024-11-27 19:18:24', 32),
(15, 'ORD621', 'pending', 'Mr. Devin Boyle', 'gbauch@example.net', '+1-309-857-5702', '318 Maximus Row\nJesusfurt, VA 55882-7396', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 35),
(16, 'ORD448', 'cancelled', 'Caesar Lesch', 'corkery.malinda@example.org', '628-736-8519', '155 Lakin Loaf Apt. 938\nDibbertstad, TX 37548-6592', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 36),
(17, 'ORD623', 'completed', 'Mr. Dewayne Walker', 'schaden.martin@example.org', '+1 (641) 416-4494', '28118 Pollich Ports\nNew Winfield, TX 13518', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 37),
(18, 'ORD293', 'completed', 'Stone Moen', 'jordon54@example.net', '269-755-0243', '243 Maynard Alley\nNorth Armand, PA 98266', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 38),
(19, 'ORD145', 'completed', 'Martin Beahan', 'darius.schowalter@example.org', '+1.714.705.2782', '37235 Hauck Ramp Apt. 608\nNorth Antwonfort, IA 93079', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 39),
(20, 'ORD112', 'completed', 'Adonis Bailey', 'rasheed58@example.org', '(678) 505-2812', '54673 Bednar Station\nLake Unique, CO 36970-8871', '2024-11-27 19:18:25', '2024-11-27 19:18:25', 40),
(21, 'ORD-1MPIYINA', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0352919655', 'kiệt 67 nguyễn văn chính', '2024-11-27 19:24:52', '2024-11-27 19:24:52', 51),
(22, 'ORD-WJZPPQKJ', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', 'Tx. Hương Thủy', '2024-11-27 20:16:20', '2024-11-27 20:16:20', 51),
(23, 'ORD-JSYXWVYQ', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-11-28 00:44:12', '2024-11-28 00:44:12', 51),
(24, 'ORD-EXD5VKPP', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-11-28 00:44:21', '2024-11-28 00:44:21', 51),
(25, 'ORD-S3ISTKVY', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-11-28 00:44:25', '2024-11-28 00:44:25', 51),
(26, 'ORD-STM1VWQU', 'completed', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-11-28 02:18:33', '2024-11-28 02:39:16', 51),
(27, 'ORD-FNPK7JEU', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-11-28 03:20:21', '2024-11-28 03:20:21', 51),
(28, 'ORD-KLIX5QXZ', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-02 19:48:41', '2024-12-02 19:48:41', 51),
(29, 'ORD-JJHNDKUL', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-02 20:21:37', '2024-12-02 20:21:37', 51),
(30, 'ORD-241PGHKS', 'completed', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-04 19:59:59', '2024-12-05 00:49:54', 51),
(31, 'ORD-XCFHAMNM', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-04 20:59:27', '2024-12-04 20:59:27', 51),
(36, 'ORD-NWRCSNBO', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-04 21:02:18', '2024-12-04 21:02:18', 51),
(37, 'ORD-JXYHU0VP', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-04 21:18:57', '2024-12-04 21:18:57', 51),
(38, 'ORD-897AXXEN', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-04 21:27:26', '2024-12-04 21:27:26', 51),
(39, 'ORD-K70GZFFE', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:15:39', '2024-12-05 00:15:39', 51),
(40, 'ORD-G0OJMJ3Q', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:19:48', '2024-12-05 00:19:48', 51),
(41, 'ORD-Z6IP4IVC', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:19:55', '2024-12-05 00:19:55', 51),
(42, 'ORD-FIMNWZGH', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:26:23', '2024-12-05 00:26:23', 51),
(43, 'ORD-0VRNXC8Q', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:29:55', '2024-12-05 00:29:55', 51),
(44, 'ORD-OYXRU2R7', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 00:35:10', '2024-12-05 00:35:10', 51),
(47, 'ORD-0V5KZ3NH', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 02:55:22', '2024-12-05 02:55:22', 51),
(48, 'ORD-EQZOSQOR', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 21:08:39', '2024-12-05 21:08:39', 51),
(49, 'ORD-QO1R6ABO', 'complet', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-05 21:22:49', '2024-12-05 21:22:49', 51),
(50, 'ORD-TE4EL9UH', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-09 02:06:48', '2024-12-09 02:06:48', 51),
(51, 'ORD-0DV7JA5O', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-09 02:25:17', '2024-12-09 02:25:17', 51),
(52, 'ORD-LKPHT5MM', 'completed', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-09 20:46:39', '2024-12-09 21:12:16', 51),
(53, 'ORD-JNCQDYBW', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-11 01:44:15', '2024-12-11 01:44:15', 51),
(54, 'ORD-TDJYYZBI', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-11 01:58:36', '2024-12-11 01:58:36', 51),
(55, 'ORD-35MFNXXK', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-11 01:58:41', '2024-12-11 01:58:41', 51),
(56, 'ORD-KMA9D1CS', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-11 01:58:45', '2024-12-11 01:58:45', 51),
(57, 'ORD-F7NW1K0I', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-11 01:58:50', '2024-12-11 01:58:50', 51),
(58, 'ORD-Q6AMLM5O', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-23 06:25:52', '2024-12-23 06:25:52', 51),
(59, 'ORD-TMIHVRBD', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-25 00:32:19', '2024-12-25 00:32:19', 51),
(60, 'ORD-RQFC74CG', 'pending', 'Võ Phi Kiệt', 'kietlac410@gmail.com', '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', '2024-12-25 00:32:27', '2024-12-25 00:32:27', 51);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `size`, `color`, `quantity`, `price`, `total_price`, `created_at`, `updated_at`, `order_id`, `product_id`, `variant_id`) VALUES
(109, '256G', 'Xanh', 1, 29690000.00, 29690000.00, '2024-12-25 00:32:19', '2024-12-25 00:32:19', 59, 4, 97),
(110, '256G', 'Đen', 1, 27690000.00, 27690000.00, '2024-12-25 00:32:19', '2024-12-25 00:32:19', 59, 3, 103),
(111, 'Vừa', 'Đen', 1, 399000.00, 399000.00, '2024-12-25 00:32:19', '2024-12-25 00:32:19', 59, 44, 131),
(112, '256G', 'Xanh', 1, 29690000.00, 29690000.00, '2024-12-25 00:32:27', '2024-12-25 00:32:27', 60, 4, 97),
(113, '256G', 'Đen', 1, 27690000.00, 27690000.00, '2024-12-25 00:32:27', '2024-12-25 00:32:27', 60, 3, 103),
(114, 'Vừa', 'Đen', 1, 399000.00, 399000.00, '2024-12-25 00:32:27', '2024-12-25 00:32:27', 60, 44, 131);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `view`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'iPhone 16 Pro 128GB Chính Hãng (VN/A)', 'iPhone 16 Pro 128GB Chính hãng (VN/A) chính thống giá rẻ chỉ có tại Di Động Việt - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Với chip A18 Pro mạnh mẽ, hệ thống camera Pro nâng cao cho những bức ảnh chuyên nghiệp và màn hình ProMotion 120Hz mượt mà, sản phẩm này mang đến trải nghiệm tuyệt vời.\r\n\r\n', 951, 'out of stock', 1, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(4, 'iPhone 15 Pro Max 256GB Chính hãng (VN/A)\r\n', 'iPhone 15 Pro Max 256GB Chính hãng (VN/A) chính thống giá rẻ chỉ có tại Di Động Việt - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Với thiết kế đầy sang trọng đẳng cấp, cùng với những trang bị chất lượng như camera chính 48MP, 2 ống kính phụ 12MP, khả năng zoom quang học 5x. Cùng với nâng cấp hiệu năng ấn tượng với con chip mới nhất đầy mạnh mẽ Apple A17 Pro. Cùng với viên pin lớn kết hợp cùng hệ điều hành mới nhất iOS 17 mang đến thời lượng pin bền bỉ, ấn tượng.', 305, 'out of stock', 1, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(5, 'iPhone 14 Chính hãng (VN/A)', 'iPhone 15 Pro 1TB Chính hãng (VN/A) chính thống giá rẻ chỉ có tại Di Động Việt - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Với thiết kế thời thượng và các tính năng hiện đại, chiếc smartphone này sẽ mang đến cho bạn trải nghiệm đầy cảm xúc với khả năng sáng tạo bứt phá với bộ 3 camera gồm: 48MP và 2 camera 12MP, kết hợp với hiệu năng mạnh mẽ từ chipset Apple A17 Pro. Bên cạnh đó, máy có dung lượng pin lớn, cho phép người dùng trải nghiệm dài lâu.', 322, 'out of stock', 1, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(6, 'iPhone 13 128GB Chính Hãng (VN/A)\r\n', 'iPhone 13 128GB Chính hãng (VN/A) chính thống giá RẺ HƠN CÁC LOẠI RẺ chỉ có tại Di Động Việt - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Với thiết kế thời thượng và các tính năng hiện đại, chiếc smartphone này sẽ mang đến cho bạn trải nghiệm đầy cảm xúc với khả năng sáng tạo vô tận từ 2 camera 12MP, kết hợp với hiệu năng mạnh mẽ từ chipset Apple A15 Bionic sản xuất trên tiến trình 5nm. Bên cạnh đó, với dung lượng pin lớn cho phép người dùng trải nghiệm dài lâu. Đặt ngay để có trải nghiệm mua sắm Hơn cả Chính Hãng.', 174, 'out of stock', 1, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(32, 'iPhone 16 265G Chính Hãng (VN/A)', 'iPhone 16 128GB Chính hãng (VN/A) chính thống giá rẻ chỉ có tại Di Động Việt - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Máy sở hữu chip A18 Bionic, camera 48MP và màn hình Super Retina XDR, hứa hẹn trải nghiệm người dùng tuyệt vời. Đặc biệt, thời lượng pin được cải thiện giúp bạn thoải mái sử dụng cả ngày dài.', 878, 'out of stock', 1, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(33, 'Samsung Galaxy Z Flip6 5G 256GB Chính Hãng', 'Samsung Galaxy Z Flip6 5G 256GB Chính Hãng là điện thoại gập mới nhất của Samsung sở hữu thiết kế nhỏ gọn, không kém phần hiện đại. Đây là tân binh hứa hẹn sẽ mang đến cho người dùng những phút giây trải nghiệm vượt bậc với màn hình rộng rãi, camera siêu sắc nét đi kèm hiệu năng cực kỳ mạnh mẽ.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(36, 'Samsung Galaxy A06 128GB Chính Hãng', 'Samsung Galaxy A06 128GB Chính Hãng nổi bật trong phân khúc với màn hình lớn 6.7inch, thời lượng pin bền bỉ 5000mAh đi kèm nhiều tính năng thiết thực. Với việc nâng cấp bảo mật vân tay và thiết kế Key Islands thời thượng, điện thoại này hứa hẹn sẽ mang đến những trải nghiệm mới mẻ và nâng cấp cho mọi người dùng.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(37, 'Samsung Galaxy S24 FE 5G 128GB Chính Hãng', 'Samsung Galaxy S24 5G 128GB (BHĐT) là máy mới, nguyên Seal 100%, sản phẩm chỉ kích hoạt trực tuyến và được bảo hành trong vòng 12 tháng.\n\nSamsung Galaxy A14 4G 128GB Chính Hãng (BHĐT) sở hữu thiết kế mỏng nhẹ, bo cong bốn góc cạnh mềm mại. Chiếc smartphone này được trang bị màn hình LCD với tần số quét 90Hz mang đến trải nghiệm mượt mà. Bên cạnh đó, điện thoại còn sở hữu sức mạnh từ con chip Mediatek Dimensity 700. Ngoài ra, với dung lượng pin 5000nmAh cho phép người dùng trải nghiệm dài lâu.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(38, 'Samsung Galaxy A55 5G 128GB Chính Hãng', 'Samsung Galaxy A55 5G 128G Chính Hãng (BHĐT) là chiếc smartphone series A mới nhất của Samsung sở hữu thiết kế tinh tế, hiệu suất mạnh mẽ và màn hình rộng rãi. Dù có mức giá phải chăng, sản phẩm vẫn sở hữu pin khủng cho bạn thoải mái sử dụng trong thời gian dài.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(40, 'Samsung Galaxy A15 128GB Chính Hãng', 'Samsung Galaxy A15 128GB Chính Hãng gây ấn tượng với người dùng qua thiết kế tinh tế, sang trọng và hiện đại. Thiết bị sở hữu kích thước màn hình 6.5inch rộng rãi, độ phân giải FHD+ đi kèm tần số quét 90Hz. Bên cạnh đó, tân binh A mới nhất này còn được trang bị chip mạnh mẽ là Helio G99 có thể đáp ứng tốt các tác vụ thực hiện của người dùng.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(41, 'Samsung Galaxy A35 5G 128GB Chính Hãng\n', 'Samsung Galaxy A35 5G 512GB sở hữu thiết kế cao cấp với màn hình 6.8 inch độ phân giải 3088 x 1440 pixels, tấm nền Dynamic AMOLED 2X tần số quét 120Hz, cấu hình mạnh mẽ với vi xử lý Snapdragon 8 Gen 2. Camera chính 200MP mang lại khả năng chụp ảnh đỉnh cao hỗ trợ nhiều chế độ chụp ảnh khác nhau.', 878, 'out of stock', 41, '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(44, 'Chuột Gaming Có Dây iCore GM03', '\r\nNgoài thiết kế dây tiện lợi, chuột gaming iCore GM03 còn được tích hợp hệ thống đèn LED RGB ấn tượng, cảm biến quang siêu nhạy, nút bấm siêu bền và các nút tiện lợi ở cạnh bên. Đáng chú ý, sản phẩm có mức giá bán vô cùng phải chăng.\r\n\r\nThiết kế công thái học', 50, 'out of stock', 44, NULL, NULL),
(51, 'Pin sạc dự phòng UmeTravel 10000mAh TRIP10000 Quick Charge', 'Gây ấn tượng nhờ thiết kế hiện đại, có khả năng hỗ trợ sạc nhanh và sở hữu dung lượng pin lớn, bộ pin sạc dự phòng UMETRAVEL TRIP10000 là một trong những giải pháp hiệu quả nhất để đáp ứng nhu cầu sạc pin cơ động cho smartphone và tablet của bạn.', 50, 'out of stock', 44, NULL, NULL),
(52, 'Củ sạc nhanh 1 cổng 10.5W USB A Trusmi CH09-059\r\n', 'Củ sạc nhanh 1 cổng 10.5W USB A Trusmi CH09-059 là một sản phẩm tiện ích, được thiết kế để đáp ứng nhu cầu sạc điện thoại và các thiết bị điện tử hiện đại. Với thiết kế nhỏ gọn và công suất 10.5W, đây là lựa chọn phù hợp để bạn sử dụng tại nhà cũng như mang theo trong các chuyến du lịch, công tác. Ngoài ra, củ sạc còn tích hợp các tính năng an toàn như chống quá nhiệt, chống quá dòng, chống ngắn mạch, giúp người dùng yên tâm hơn khi sử dụng.\r\n\r\nCông suất sạc 10.5W, cung cấp năng lượng cho nhiều thiết bị', 50, 'out of stock', 44, NULL, NULL),
(53, 'Cáp Micro 1m Trusmi CA34-059 Silicon', 'Cáp Micro 1m Trusmi CA34-059 Silicon được thiết kế để đáp ứng nhu cầu sạc pin và truyền dữ liệu một cách nhanh chóng, ổn định. Với kiểu dáng nhỏ gọn và hiệu suất vượt trội, sản phẩm này là sự lựa chọn lý tưởng cho những ai sử dụng các thiết bị hỗ trợ cổng Micro-USB. Ngoài ra, cáp được chế tạo từ các vật liệu cao cấp như hợp kim nhôm và silicon, giúp tăng độ bền và sự tiện dụng.  \r\n\r\nĐộ dài 1 mét, không bị giới hạn khoảng cách', 50, 'out of stock', 44, NULL, NULL),
(54, 'Ốp lưng magsafe iPhone 16 Pro Max lưng kính viền dẻo Fashion', 'Sử dụng ốp lưng kính viền dẻo Fashion, bạn sẽ trang bị cho chiếc iPhone 16 Pro Max của mình một lớp bảo vệ hiệu quả, giúp chống xước và chống sốc tốt hơn. Ngoài ra, sản phẩm còn hỗ trợ sạc không dây MagSafe hữu hiệu thông qua vòng nam châm từ tính bên trong.', 50, 'out of stock', 44, NULL, NULL),
(55, 'Miếng dán cường lực chống ánh sáng xanh iPhone 14 Pro Max 10D YVS', 'Miếng dán màn hình kính cường lực chống ánh sáng xanh 10D của YVS được thiết kế để giúp bảo vệ màn hình của iPhone 14 Pro Max khỏi hư hỏng do tác động từ bên ngoài. Bên cạnh đó, sản phẩm còn giúp bảo vệ mắt của bạn trước những tác hại từ ánh sáng xanh.\r\n\r\nChống ánh sáng xanh', 50, 'out of stock', 44, NULL, NULL),
(56, 'Giá đỡ tản nhiệt iCore ILS102 Bạc', 'Ngày nay, laptop đã trở thành công cụ không thể thiếu trong công việc cũng như học tập. Tuy nhiên, việc sử dụng chúng quá nhiều trong thời gian dài dễ gây ra các hiện tượng quá nhiệt, làm ảnh hưởng đến hiệu suất và tuổi thọ của máy. Để giải quyết vấn đề này, người dùng cần một giá đỡ tản nhiệt hiệu quả. Giá đỡ tản nhiệt iCore ILS102 với thiết kế hiện đại, khả năng tản nhiệt vượt trội và tính di động cao sẽ là lựa chọn hàng đầu cho người dùng laptop.\r\n\r\nThiết kế đơn giản, dễ sử dụng', 50, 'out of stock', 44, NULL, NULL),
(57, 'Ốp lưng bảo vệ Spigen nhựa chống sốc quân đội', 'Ốp lưng Spigen Caseology Athlex Active Black không chỉ là một phụ kiện thời trang mà còn là một công cụ bảo vệ lý tưởng cho iPhone, đặc biệt là với những người thường xuyên tham gia các hoạt động ngoài trời và thể thao.\r\n\r\nThiết kế mỏng nhẹ và tiện lợi\r\n', 50, 'out of stock', 44, NULL, NULL),
(58, 'OPPO Reno12 5G 256GB Chính Hãng', 'OPPO Reno12 5G 256GB ra mắt với mặt lưng bóng bẩy theo hướng gradient độc đáo cùng cụm camera hình chữ nhật với dòng chữ “AI Camera System” tạo điểm nhấn đặc sắc. Sự kết hợp giữa họa tiết mới trên nền thiết kế cũ đã tái định nghĩa ngôn ngữ thiết kế của phiên bản tiêu chuẩn năm nay.\r\n\r\n', 0, 'stock of out', 45, NULL, NULL),
(59, 'OPPO Reno12 F 5G 256GB Chính Hãng', 'OPPO Reno12 F 5G 256GB Chính hãng ra mắt trong phân khúc tầm trung với màn hình lớn thích ứng thông minh 120Hz. Điện thoại còn nâng tầm nhiếp ảnh AI, mang đến những bức ảnh tuyệt vời nhờ camera chính 50MP. Tiêu chuẩn chống nước và bụi bẩn IP64 cũng giúp thiết bị trở thành “bạn đồng hành” lý tưởng của mọi người dùng.', 0, 'stock of out', 45, NULL, NULL),
(60, 'OPPO A18 128GB Chính Hãng', 'OPPO A18 128GB sở hữu thiết kế tương tự như những chiếc điện thoại cùng dòng ra mắt trong năm 2023. Bề mặt tinh thể mượt mà mang đến sự nổi bật cho mặt lưng, cùng với viền màn hình được làm mỏng hơn so với đời trước. Máy cũng sở hữu thiết kế mỏng nhẹ với trọng lượng 188g và màn hình 6.56 inch cùng tần số quét 90Hz hứa hẹn đáp ứng tốt trải nghiệm trong tầm giá của người dùng.\r\n\r\n', 0, 'stock of out', 45, NULL, NULL),
(61, 'OPPO A3 128GB Chính Hãng', 'OPPO A3 128GB thuộc phân khúc tầm trung dòng A, nổi bật với thiết kế mỏng nhẹ nhưng vẫn đảm bảo độ bền cao, mang lại cảm giác thoải mái khi cầm nắm và sử dụng. Được trang bị khả năng chống nước chuẩn IP54, OPPO A3 giúp người dùng yên tâm trong mọi điều kiện sử dụng hàng ngày, từ môi trường ẩm ướt đến những tình huống bất ngờ. Sản phẩm là lựa chọn lý tưởng cho những ai tìm kiếm sự cân bằng giữa hiệu năng, thiết kế và độ bền.', 0, 'stock of out', 45, NULL, NULL),
(62, 'OPPO A17K 64GB Chính Hãng\r\n', 'OPPO A17K là sản phẩm mới vừa được cho ra mắt của nhà OPPO. Chiếc smartphone này sở hữu vẻ ngoài với thiết kế hiện đại, tinh tế và tỉ mỉ trong từng chi tiết. Nó được trang bị màn hình rộng lớn giúp nâng cao trải nghiệm của người dùng. Bên cạnh đó, với dung lượng pin lên đến 5000mAh, bạn có thể tha hồ giải trí, làm việc mà không sợ bị gián đoạn.', 0, 'stock of out', 45, NULL, NULL),
(63, 'OPPO Find N3 Flip 256GB Chính Hãng', 'OPPO Find N3 Flip 256GB là thế điện thoại gập OPPO tiếp theo ra mắt tại thị trường Việt Nam. Máy vẫn duy trì kích thước tương tự như đời tiền nhiệm, nhưng có sự thay đổi về thiết kế module camera sau. Chất lượng ảnh chụp được nâng tầm hơn nhờ sự hợp tác với Hasselblad và cảm biến chính lên đến 50MP. Hiệu năng mạnh mẽ từ chip Dimensity 9200 cũng hỗ trợ xử lý tốt mọi yêu cầu của người dùng.', 10, 'stock of out', 45, NULL, NULL),
(66, 'Xiaomi Redmi 14C 128GB Chính Hãng', '1. Xiaomi Redmi 14C - Điện thoại giá rẻ mới sắp ra mắt\r\nRedmi 14C tiếp tục tạo nên khái niệm mới cho những chiếc smartphone giá rẻ của Xiaomi. Điện thoại sở hữu màn hình lớn với chất lượng hiển thị tốt trong tầm giá, đi kèm chip xử lý MediaTek Helio G81-Ultra cung cấp hiệu năng hoạt động tốt phục vụ nhu cầu cơ bản hàng ngày. Vậy hãy cùng Di Động Việt khám phá Redmi 14C có gì mới đáng chú ý hay không!', 0, 'stock', 42, NULL, NULL),
(67, 'Xiaomi 14T 5G 512GB Chính Hãng', 'Xiaomi 14T 512GB mang đến lựa chọn hấp dẫn cho những ai muốn trải nghiệm công nghệ flagship 2024 với mức giá tối ưu. Điện thoại duy trì thiết kế mỏng nhẹ với màn hình 144Hz AI mới, tăng cường trải nghiệm giải trí của người dùng. Đồng thời, Mi 14T cũng tiếp tục kết hợp Leica để mang đến thấu kính quang học Leica Summilux và cảm biến ảnh Sony IMX906.', 50, 'stock', 42, NULL, NULL),
(68, 'Xiaomi Redmi Note 13 128GB Chính Hãng', 'Xiaomi Redmi Note 13 128GB sở hữu thiết kế khác biệt, mới mẻ nhưng vẫn cực đẹp. Màn hình kích thước lớn lên đến 6.67 inch với công nghệ AMOLED cùng tần số quét 120Hz cho trải nghiệm hình ảnh sống động. Camera chính 108MP hỗ trợ bắt trọn sắc nét từng khoảnh khắc trong cuộc sống. Chip Snapdragon 685 mang đến hiệu năng mạnh mẽ đối với một thiết bị nằm trong phân khúc giá rẻ.', 50, 'stock', 42, NULL, NULL),
(69, 'Xiaomi 14 5G 256GB Chính Hãng', 'Xiaomi 14 5G 256GB mở ra thế giới nhiếp ảnh hấp dẫn với ống kính Leica tích hợp công nghệ Vario-Summilux đời mới. Trải nghiệm màn hình ấn tượng với 68 tỷ màu trên tấm nền LTPO OLED 6.36 inch cùng độ sáng tối đa lên đến 3000 nits cao nhất trên thị trường hiện nay. Và sự xuất hiện của chip Qualcomm Snapdragon 8 Gen 3 cho phép chinh phục mọi giới hạn, mở ra khả năng xử lý tuyệt vời.', 50, 'stock', 42, NULL, NULL),
(70, 'Xiaomi 14 Ultra 5G 512GB Chính Hãng', 'Xiaomi 14 Ultra 5G 512GB Chính hãng là phiên bản cao cấp nhất của dòng Xiaomi 14 ra mắt đầu năm 2024. Chiếc flagship mở ra không gian hiển thị ấn tượng với viền màn hình siêu mỏng cùng kích thước lớn. Đặc biệt, điện thoại sở hữu hiệu năng mạnh mẽ từ chip Qualcomm Snapdragon 8 Gen 3 cho phép xử lý mượt mọi tác vụ nâng cao và khả năng chụp ảnh tuyệt vời từ hệ thống camera Leica.', 50, 'stock', 42, NULL, NULL),
(71, 'Tai nghe Apple AirPods 4 Chính Hãng\r\n', 'Tai nghe Apple AirPods 4 đã chính thức được ra mắt với những nâng cấp đầy ấn tượng. Được trang bị chip H2, mang đến khả năng xử lý âm thanh xuất sắc tạo nên trải nghiệm nghe tuyệt vời. Với hệ thống micrô kép và cảm biến quang học, tai nghe này có khả năng thu âm rõ ràng và chính xác hơn. ', 10, 'stock', 43, NULL, NULL),
(72, 'Tai nghe Bluetooth True Wireless JBL Tour Pro 3', '\r\nThời gian phát nhạc với Bluetooth và tắt ANC: lên đến 11 giờ Thời gian phát nhạc với Bluetooth và bật ANC: lên đến 8 giờ / Thời gian phát nhạc với Bluetooth và bật True Adaptive ANC: lên đến 7 giờ / Thời gian đàm thoại với ANC tắt: lên đến 5.5 giờ', 10, 'stock', 43, NULL, NULL),
(73, 'Tai nghe True Wireless HAVIT TW945', 'Tai nghe HAVIT TW945 là tai nghe dành cho game thủ vừa qua đã được nhà Havit tung ra thị trường. Chiếc tai nghe này sở hữu thiết kế nhỏ gọn, cùng với những tông màu và kiểu thiết kế trẻ trung. Bên cạnh đó, nó còn sở hữu dung lượng pin lên đến 3 giờ và có độ trễ thấp mang đến những trải nghiệm tốt nhất cho người dùng.', 10, 'stock', 43, NULL, NULL),
(74, 'Tai nghe không dây Redmi Buds 5 Chính Hãng', 'Tai nghe không dây Redmi Buds 5 vừa được nhà Xiaomi cho ra mắt với nhiều tính năng hiện đại. Chiếc tai nghe được trang bị công nghệ tiên tiến để mang đến trải nghiệm âm thanh tuyệt vời. Với tính năng chống ồn chủ động, tai nghe này giúp bạn tận hưởng âm nhạc mà không bị phiền toái bởi tiếng ồn xung quanh. Để hiểu chi tiết hơn về sản phẩm thì hãy cùng mình tìm hiểu qua bài viết dưới đây nhé.', 10, 'stock', 43, NULL, NULL),
(75, 'Tai nghe Bluetooth Sony WH-CH520', 'gọn nhẹ, âm thanh rõ nét\r\nTai nghe Bluetooth Sony WH-CH520 được đánh giá cao vì nó được tích hợp nhiều tính năng độc đáo và hữu ích. Chiếc tai nghe này sở hữu thiết kế thời trang và chất lượng âm thanh xuất sắc. Để hiểu rõ hơn về chiếc tai nghe đến từ nhà Sony này thì đừng bỏ qua bài viết dưới đây nhé.', 10, 'stock', 43, NULL, NULL),
(76, 'Laptop Asus TUF Gaming FA506NFR-HN006W R7 ', 'Asus TUF Gaming FA506NFR-HN006W với vi xử lý và card đồ họa mạnh mẽ, hứa hẹn mang đến cho người dùng trải nghiệm gaming thật tốt. Sản phẩm còn được trang bị màn hình 15.6 inch với tần số quét 144Hz, tái hiện chuyển động game nhanh và mượt đến ngỡ ngàng.\r\n\r\nHiệu năng vượt trội với vi xử lý cao cấp', 50, 'con hang', 46, NULL, NULL),
(77, 'Laptop Asus Vivobook 15 X1504ZA-NJ517W', 'Laptop Asus Vivobook 15 X1504ZA-NJ517W thuộc dòng laptop Asus Vivobook với giá thành phải chăng nhưng hiệu năng lại cực kỳ ấn tượng. Vi xử lý Intel Core i5 1235U cùng với 16GB RAM và ổ cứng SSD 512GB đem đến sức mạnh phần cứng đáng kinh ngạc để xử lý mượt mà không chỉ tác vụ văn phòng mà còn có tác vụ đồ họa và chơi game eSports thoải mái.\r\n\r\nThiết kế thời thượng, thuận tiện di chuyển', 50, 'con hang', 46, NULL, NULL),
(78, 'Laptop HP Pavilion 15-eg3111TU', 'Hiệu suất đáng kinh ngạc của một chiếc PC trong thiết kế laptop siêu nhỏ gọn, HP Pavilion 15-eg3111TU với bộ vi xử lý Intel Core i5 Gen 13 thế hệ mới sẽ giúp bạn làm được nhiều việc hơn và tận hưởng niềm vui giải trí mọi lúc mọi nơi.', 50, 'con hang', 46, NULL, NULL),
(79, 'Laptop Dell Inspiron N3530', 'Dell Inspiron N3530 là một lựa chọn tốt trong phân khúc laptop tầm 20 triệu đồng. Màn hình siêu ấn tượng với tần số quét 120Hz tái hiện chuyển động mượt mà. Cấu hình phần cứng với chip Intel Core i5 1334U cùng 16GB RAM và ổ cứng SSD 512GB đáp ứng tốt nhu cầu xử lý công việc.\r\n\r\nHiệu suất ổn định cho công việc văn phòng', 50, 'con hang', 46, NULL, NULL),
(80, 'Laptop Acer Nitro 5 Tiger Gaming AN515-58-5193 ', 'Với Acer Nitro 5 Tiger AN 515-58-5193, bạn sẽ có được trải nghiệm giải trí và đồ họa tối ưu. Chiếc laptop gaming tới từ Acer gây ấn tượng với chip Intel Core i5 12450H kết hợp cùng card đồ họa rời NVIDIA RTX 4050 mạnh mẽ. Không chỉ vậy, màn hình 15.6 inch với tần số quét 144Hz cũng cung cấp những khuôn hình mượt mà và đã mắt.', 50, 'con hang', 46, NULL, NULL),
(81, 'iPhone 11 128GB Chính Hãng (VN/A)', 'iPhone 11 Pro 128GB Chính hãng (VN/A) chính thống giá rẻ chỉ có tại TeachWIN - Đại lý uỷ quyền chính thức của Apple tại Việt Nam. Với chip A18 Pro mạnh mẽ, hệ thống camera Pro nâng cao cho những bức ảnh chuyên nghiệp và màn hình ProMotion 120Hz mượt mà, sản phẩm này mang đến trải nghiệm tuyệt vời.\r\n\r\n', 951, 'out of stock', 1, '2024-11-27 19:18:24', '2024-11-27 19:18:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(2, 38, 51, 5, 'ok', '2024-12-09 02:28:32', '2024-12-09 02:28:32'),
(3, 38, 51, 5, 'ok', '2024-12-09 02:28:37', '2024-12-09 02:28:37'),
(4, 38, 51, 5, 'ok', '2024-12-09 02:30:57', '2024-12-09 02:30:57'),
(5, 38, 51, 5, 'ok', '2024-12-09 02:31:00', '2024-12-09 02:31:00'),
(6, 38, 51, 5, 'ok', '2024-12-09 02:31:02', '2024-12-09 02:31:02'),
(7, 38, 51, 5, 'ok', '2024-12-09 02:31:03', '2024-12-09 02:31:03'),
(8, 38, 51, 5, 'ok', '2024-12-09 02:31:04', '2024-12-09 02:31:04'),
(9, 38, 51, 5, 'ok', '2024-12-09 02:31:05', '2024-12-09 02:31:05'),
(10, 60, 51, 4, 'ok', '2024-12-25 07:45:26', '2024-12-25 07:45:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('E9wA8858W9ULJTR9KlQo8KL2jn6bThv8pQCeUa9w', 51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieTVkNmVCZkdzNGtJYWhpaUVDMnBKcVY1bUE4SmEwVkUzQlZhQkpUcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM1MTA4MDEwO319', 1735113502),
('OTwExabkYstahFxzzFJJdaCD73WBe7Zr226huUcv', 51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMXVJZUtLRzBhVnBicGM5MEE4OExiNXF3ajg0ZDNZWlFqaGcwOVhuQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG9wP2NhdGVnb3J5X2lkPSZwYWdlPTEmc2VhcmNoPSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjUxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTczNTEzNzg1Mjt9fQ==', 1735143365);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Mae Erdman', 'stiedemann.dedrick@example.net', '2024-11-27 19:18:23', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'NZXSHzUCV4', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(2, 'Kraig Kuhic I', 'corbin40@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Uu3gqZy9m9', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(3, 'Miss Clare Kemmer', 'marilyne70@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'EWG6pmnnyg', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(4, 'Stephen Swaniawski', 'kshlerin.zachariah@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'HYkL5Bl16j', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(5, 'Wade Von', 'maia.hermann@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'TLpAZLuHlI', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(6, 'Miss Ashlee Swaniawski', 'paula46@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'zrNZgyChbG', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(7, 'Agnes Wisozk V', 'okessler@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'KHdmFnSGe0', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(8, 'Kiley Jones', 'baylee.aufderhar@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'VLg0JVg4Hw', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(9, 'Jazmyn Herman', 'bhackett@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'cxjNLDYT4p', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(10, 'Lawson Beer', 'nickolas.marks@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '8bEJa5PiDz', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(11, 'Kareem Schoen', 'vfeeney@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'amAMMDg3Ma', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(12, 'Prof. Candelario Cole PhD', 'alda05@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Z3q6ddEHJi', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(13, 'Daisha Breitenberg DDS', 'rhianna77@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'r1urL2TpsY', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(14, 'Cooper Schneider', 'geovanni20@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '441xt0sx1W', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(15, 'Alyce Jaskolski', 'bessie.lockman@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'jVclZqSw4u', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(16, 'Kimberly DuBuque', 'alford.barton@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'CkKa5JmtUb', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(17, 'Sarina Padberg', 'nkoepp@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'RShWXX4sN5', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(18, 'Kayden Schinner', 'leopoldo.metz@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'JizKe7E8TM', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(19, 'Alexandro Heathcote', 'ebert.shanel@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'yGyVYHeq6h', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(20, 'Prof. Matilde Bashirian II', 'jordon.graham@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'gjT3KHod14', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(21, 'Mabelle Homenick', 'lubowitz.elvera@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '2t8HwIQjZ8', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(22, 'Emely Steuber', 'zreynolds@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'YelXdMr7Bq', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(23, 'Hosea Rippin', 'dietrich.richie@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'c5AlYXXn0C', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(24, 'Daija Olson', 'fkuhlman@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'OF3Uvn9W79', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(25, 'Prof. Elroy Schmidt I', 'schmitt.florine@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'MveEN4Gg62', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(26, 'Johnnie Douglas', 'beatty.nils@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'DxGoZVOZ5I', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(27, 'Sigmund Ward', 'luisa.purdy@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'S08mG8mhJC', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(28, 'Vella Bayer', 'destany.mckenzie@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'X7Hnf0z0d7', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(29, 'Freddy Kilback', 'htowne@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'prALY4NMUQ', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(30, 'Melissa Wilderman', 'christ.treutel@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Y8TxU0kaOa', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(31, 'Katelin Runolfsson DDS', 'cbailey@example.com', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'R6IQkY5PLr', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(32, 'Rosalee Reichel IV', 'trobel@example.org', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'HVY1oVNc7g', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(33, 'Dr. Marilou Durgan', 'rohan.shanon@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Y3JYlsoBf7', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(34, 'Ms. Violet Osinski MD', 'omari.kreiger@example.net', '2024-11-27 19:18:24', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'DBn9MFrYCA', '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(35, 'Annabelle Haley', 'block.katelynn@example.com', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Yd7GKbVDiR', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(36, 'Mr. Chase Bosco', 'jedidiah.quigley@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'Tpj9oHgf90', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(37, 'Domingo Swaniawski', 'purdy.jennyfer@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '5YQ7q4yPaS', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(38, 'Lydia Schamberger', 'mayert.delfina@example.com', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'EaVdyyjWch', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(39, 'Dr. Michele Dooley', 'cordelia.schowalter@example.com', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'hjprwTx07h', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(40, 'Waylon Schaefer', 'kbashirian@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'XSOWXBDnps', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(41, 'Drake Bauch PhD', 'mallory93@example.net', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'qu532mUdV8', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(42, 'Gretchen Doyle', 'alda.wilkinson@example.net', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'LhwUER0vqV', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(43, 'Dr. Jaycee Douglas Jr.', 'janelle76@example.com', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'C0Dc8KwDFL', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(44, 'Prof. Baylee Lynch DVM', 'kurt10@example.net', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '3IoAndY7xA', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(45, 'Ms. Lenna Haley DVM', 'tchristiansen@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'VMQ4LAW8Gh', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(46, 'Reba Erdman', 'deon.bednar@example.net', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'nR03ZF7ZMN', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(47, 'Mr. Jayce Kovacek', 'nikolaus.maia@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 't51JxhYq8s', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(48, 'Isobel Sporer', 'zarmstrong@example.net', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'tFm6FLqhnC', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(49, 'Cooper Mayert', 'fkuhn@example.com', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', 'nLt3SeQOgk', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(50, 'Abner Stehr', 'estrella.gaylord@example.org', '2024-11-27 19:18:25', '$2y$12$ddMJu7ddYLWSPvkRClkp7OLdk34c9swOrL/uRs0DyEC6FnjMmkx2q', '04eIggiUUx', '2024-11-27 19:18:25', '2024-11-27 19:18:25'),
(51, 'Võ Phi Kiệt', 'kietlac410@gmail.com', NULL, '$2y$12$GeBgVVSv5owLsrlFVDI1t.RptRcwjc9vRZ5xN7iHxHmkez3ZlGGsS', 'r6cZk0HNcpfDlmPQ3EY2pBv4ZClNVttu1mJ4BneG7TMkIaOF3pqLXMiMpOhs', '2024-11-27 19:22:30', '2024-11-27 19:22:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_metas`
--

CREATE TABLE `user_metas` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_metas`
--

INSERT INTO `user_metas` (`id`, `phone`, `address`, `role`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '217-378-2747', '181 Cassandra Estates Apt. 451\nLarkinshire, AZ 70952-3338', 'Miss Enola Schinner IV', 'default-avatar.png', 11, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(2, '+1-458-409-7317', '99073 Dicki Extension Suite 500\nEstelmouth, DC 89398', 'Kenyon Conroy', 'default-avatar.png', 12, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(3, '+1 (706) 799-3211', '4716 Ernser Dam Apt. 544\nGoldnermouth, MN 08331-2755', 'Beth Corwin V', 'default-avatar.png', 13, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(4, '508-580-6275', '26870 Gottlieb Station Suite 966\nSchowaltermouth, HI 97101-6674', 'Amaya Kerluke', 'default-avatar.png', 14, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(5, '1-564-996-8054', '521 Cole Road\nPort Leeside, NH 20050', 'Makenzie Bayer', 'default-avatar.png', 15, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(6, '909-224-0735', '57590 Hamill Plains Apt. 285\nSouth Anissaville, CO 77005', 'Dr. Lera Bernhard Jr.', 'default-avatar.png', 16, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(7, '1-586-790-2684', '163 Julius Burg\nGaylordland, TN 95758', 'Madaline Christiansen', 'default-avatar.png', 17, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(8, '+1-559-366-3278', '9979 Gus Mall Apt. 443\nEast Adonis, DE 58863', 'Viva Ullrich II', 'default-avatar.png', 18, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(9, '+1 (325) 631-1650', '567 Mafalda Keys Apt. 302\nLake Olemouth, MT 11356-0751', 'Dr. Brennon Pagac', 'default-avatar.png', 19, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(10, '1-707-438-2869', '90445 Jerde Squares Suite 992\nLake Amparo, VA 12121', 'Prof. Virgil Rutherford III', 'default-avatar.png', 20, '2024-11-27 19:18:24', '2024-11-27 19:18:24'),
(11, '0906451275', '2/67 Nguyễn Văn Chính , Phường Thủy Phương , Tx Hương thủy , Thừa Thiên Huế', 'admin', 'default-avatar.png', 51, '2024-11-27 19:22:30', '2024-11-27 20:49:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `image`, `color`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(96, 4, 'assets\\images\\shop\\items\\iphone15promax.png', 'Xám ', '256G', 29690000, 10, NULL, NULL),
(97, 4, 'assets\\images\\shop\\items\\iphone15promaxxanh.png', 'Xanh', '256G', 29690000, 8, NULL, '2024-12-25 00:32:27'),
(98, 4, 'assets\\images\\shop\\items\\iphone15promaxxanh.png', 'Đen', '256G', 29690000, 10, NULL, NULL),
(100, 32, 'assets\\images\\shop\\items\\iphone16.png', 'Xanh dương', '128G', 27690000, 10, NULL, NULL),
(101, 32, 'assets\\images\\shop\\items\\iphone16xanh.png', 'Xanh lá', '128G', 27690000, 10, NULL, NULL),
(102, 3, 'assets\\images\\shop\\items\\iphone16Pro.png', 'Trắng', '256G', 27690000, 10, NULL, NULL),
(103, 3, 'assets\\images\\shop\\items\\iphone16proden.png', 'Đen', '256G', 27690000, 8, NULL, '2024-12-25 00:32:27'),
(104, 3, 'assets\\images\\shop\\items\\iphone16provang.png', 'vàng', '256G', 27690000, 10, NULL, NULL),
(105, 6, 'assets\\images\\shop\\items\\iphone13hong.png', 'Hồng', '128G', 12000000, 20, NULL, NULL),
(106, 6, 'assets\\images\\shop\\items\\iphone13xanhduong.png', 'Xanh Dương', '128G', 12000000, 20, NULL, NULL),
(107, 6, 'assets\\images\\shop\\items\\iphone13xanhla.png', 'Xanh Lá', '128G', 12000000, 20, NULL, NULL),
(108, 6, 'assets\\images\\shop\\items\\iphone13do.png', 'Đỏ', '128G', 12000000, 20, NULL, NULL),
(109, 5, 'assets\\images\\shop\\items\\iphone14xanh.png', 'Xanh dương', '128G', 13000000, 10, NULL, NULL),
(110, 5, 'assets\\images\\shop\\items\\iphone14tim.png', 'Tím', '128G', 13000000, 10, NULL, NULL),
(115, 33, 'assets\\images\\shop\\items\\samsungflip6.png', 'Bạc', '256G', 22654000, 10, NULL, NULL),
(116, 33, 'assets\\images\\shop\\items\\samsungflip6xanh.png', 'Xanh', '256G', 22654000, 10, NULL, NULL),
(117, 33, 'assets\\images\\shop\\items\\samsungflip6vang.png', 'Vàng', '256G', 22654000, 10, NULL, NULL),
(118, 36, 'assets\\images\\shop\\items\\samsunga06den.png', 'Đen', '128G', 3490000, 0, NULL, NULL),
(119, 36, 'assets\\images\\shop\\items\\samsunga06xanh.png', 'Xanh', '128G', 3490000, 0, NULL, NULL),
(120, 36, 'assets\\images\\shop\\items\\samsunga06trang.png', 'Trắng', '128G', 3490000, 0, NULL, NULL),
(121, 37, 'assets\\images\\shop\\items\\samsungs24feden.png', 'Đen', '128G', 13999000, 10, NULL, NULL),
(122, 37, 'assets\\images\\shop\\items\\samsungs24fexam.png', 'Xám', '128G', 13999000, 10, NULL, NULL),
(123, 37, 'assets\\images\\shop\\items\\samsungs24fexanhduong.png', 'Xanh Dương', '128G', 13999000, 10, NULL, NULL),
(124, 41, 'assets\\images\\shop\\items\\samsunga35den.png', 'Đen', '128G', 7790000, 20, NULL, NULL),
(125, 41, 'assets\\images\\shop\\items\\samsunga35vang.png', 'Vàng', '128G', 7790000, 20, NULL, NULL),
(126, 41, 'assets\\images\\shop\\items\\samsunga35xanhduong.png', 'Xanh Dương', '128G', 7790000, 20, NULL, NULL),
(127, 38, 'assets\\images\\shop\\items\\samsunga55den.png', 'Đen', '128G', 949000, 10, NULL, NULL),
(128, 38, 'assets\\images\\shop\\items\\samsunga55tim.png', 'Tím', '128G', 949000, 10, NULL, NULL),
(129, 38, 'assets\\images\\shop\\items\\samsunga55xanh.png', 'Xanh', '128G', 949000, 10, NULL, NULL),
(131, 44, 'assets\\images\\shop\\items\\2022_4_20_637860686371233655_icore-gm03.jpg', 'Đen', 'Vừa', 399000, 8, NULL, '2024-12-25 00:32:27'),
(132, 51, 'assets\\images\\shop\\items\\pinduphongden.jpg', 'Đen', '10000mAh', 299000, 50, NULL, NULL),
(133, 51, 'assets\\images\\shop\\items\\pinduphongtrang.png', 'Trắng', '10000mAh', 299000, 50, NULL, NULL),
(134, 52, 'assets\\images\\shop\\items\\sactrang.png', 'Trắng', 'Sạc nhanh', 99000, 100, NULL, NULL),
(137, 53, 'assets\\images\\shop\\items\\daysactrang.png', 'Trắng', '1M', 99000, 100, NULL, NULL),
(138, 54, 'assets\\images\\shop\\items\\oplung16promax.png', 'Vàng hồng', 'iphone 16 pro max', 652000, 10, NULL, NULL),
(139, 55, 'assets\\images\\shop\\items\\cuonglucip14.png', 'Trắng', 'Iphone 14 Pro Max', 210000, 1000, NULL, NULL),
(140, 56, 'assets\\images\\shop\\items\\kedowlaptop.png', 'Bạc', '15cm - 25cm', 333000, 500, NULL, NULL),
(141, 57, 'assets\\images\\shop\\items\\opiphone.png', 'Đen', 'Iphone 15 ', 300000, 100, NULL, NULL),
(142, 57, 'assets\\images\\shop\\items\\opiphone.png', 'Đen', 'Iphone 14 ', 300000, 100, NULL, NULL),
(143, 57, 'assets\\images\\shop\\items\\opiphone.png', 'Đen', 'Iphone 14 Promax', 300000, 100, NULL, NULL),
(144, 57, 'assets\\images\\shop\\items\\opiphone.png', 'Đen', 'Iphone 15 Promax', 300000, 100, NULL, NULL),
(145, 58, 'assets\\images\\shop\\items\\oppoa12den.png', 'Đen', '256G', 11990000, 20, NULL, NULL),
(146, 58, 'assets\\images\\shop\\items\\oppoa15.png', 'Bạc', '256G', 11990000, 20, NULL, NULL),
(147, 59, 'assets\\images\\shop\\items\\opporeno12fcam.png', 'Cam', '256G', 8690000, 10, NULL, NULL),
(148, 59, 'assets\\images\\shop\\items\\opporeno12xanh.png', 'Xanh', '256G', 8690000, 10, NULL, NULL),
(149, 60, 'assets\\images\\shop\\items\\oppoa18den.png', 'Đen', '64G', 3650000, 10, NULL, NULL),
(150, 60, 'assets\\images\\shop\\items\\oppoa18xanhduong.png', 'Xanh Dương', '64G', 3650000, 10, NULL, NULL),
(151, 60, 'assets\\images\\shop\\items\\oppoa18xanhduong.png', 'Xanh Dương', '128G', 3650000, 10, NULL, NULL),
(152, 60, 'assets\\images\\shop\\items\\oppoa18den.png', 'Đen', '128G', 3650000, 10, NULL, NULL),
(153, 61, 'assets\\images\\shop\\items\\oppoa3den.png', 'Đen', '128G', 4650000, 10, NULL, NULL),
(154, 61, 'assets\\images\\shop\\items\\oppoa3timpng.png', 'Tím', '128G', 4650000, 10, NULL, NULL),
(155, 62, 'assets\\images\\shop\\items\\oppopa17kxanh.png', 'Xanh', '64G', 2490000, 10, NULL, NULL),
(156, 62, 'assets\\images\\shop\\items\\oppopa17kvang.png', 'Vàng', '64G', 2490000, 10, NULL, NULL),
(157, 63, 'assets\\images\\shop\\items\\oppofinđen.png', 'Đen', '256G', 22990000, 10, NULL, NULL),
(158, 63, 'assets\\images\\shop\\items\\oppofindvang.png', 'Vàng', '256G', 22990000, 10, NULL, NULL),
(159, 66, 'assets\\images\\shop\\items\\redmi14cden.png', 'Đen', '128G', 279000, 10, NULL, NULL),
(160, 66, 'assets\\images\\shop\\items\\redmi14cxanh.png', 'Xanh', '128G', 279000, 10, NULL, NULL),
(161, 67, 'assets\\images\\shop\\items\\xaomi14den.png', 'Đen', '512G', 11690000, 10, NULL, NULL),
(162, 67, 'assets\\images\\shop\\items\\xaomi14txam.png', 'Xám', '512G', 11690000, 10, NULL, NULL),
(163, 68, 'assets\\images\\shop\\items\\note13.png', 'Đen', '128G', 3990000, 10, NULL, NULL),
(164, 68, 'assets\\images\\shop\\items\\note13xanhla.png', 'Đen', '128G', 3990000, 10, NULL, NULL),
(165, 69, 'assets\\images\\shop\\items\\xaomi14xanhla.png', 'Xanh lá', '256G', 17564000, 10, NULL, NULL),
(166, 69, 'assets\\images\\shop\\items\\xaomiden14.png', 'Đen', '256G', 17564000, 10, NULL, NULL),
(169, 70, 'assets\\images\\shop\\items\\xaomi14ultraden.png', 'Đen', '512G', 25123000, 10, NULL, NULL),
(170, 70, 'assets\\images\\shop\\items\\xaomi14ultratrang.png', 'Trắng', '512G', 25123000, 10, NULL, NULL),
(171, 71, 'assets\\images\\shop\\items\\taingheair4.png', 'Trắng', 'Pro4', 4562000, 20, NULL, NULL),
(172, 72, 'assets\\images\\shop\\items\\jpg3.png', 'Trắng', 'JPG Pro gen 3', 5990000, 10, NULL, NULL),
(173, 73, 'assets\\images\\shop\\items\\tw94den.png', 'Đen', 'tw94', 230000, 10, NULL, NULL),
(174, 73, 'assets\\images\\shop\\items\\tw94cam.png', 'cam', 'tw94', 230000, 10, NULL, NULL),
(175, 74, 'assets\\images\\shop\\items\\bd15den.png', 'Đen', 'BD 15', 890000, 10, NULL, NULL),
(176, 74, 'assets\\images\\shop\\items\\bd15trang.png', 'Trắng', 'BD 15', 890000, 10, NULL, NULL),
(177, 74, 'assets\\images\\shop\\items\\bd15xanh.png', 'Xanh', 'BD 15', 890000, 10, NULL, NULL),
(178, 75, 'assets\\images\\shop\\items\\sonyden.png', 'Đen', 'WH-CH520', 1090000, 10, NULL, NULL),
(179, 75, 'assets\\images\\shop\\items\\sonyxanh.png', 'Xanh', 'WH-CH520', 1090000, 10, NULL, NULL),
(180, 75, 'assets\\images\\shop\\items\\sonykem.png', 'kem', 'WH-CH520', 1090000, 10, NULL, NULL),
(181, 76, 'assets\\images\\shop\\items\\asustuf.png', 'Đen', '5102G', 17652000, 10, NULL, NULL),
(182, 77, 'assets\\images\\shop\\items\\vivibook15.png', 'Bạc', '512G', 13456000, 10, NULL, NULL),
(183, 78, 'assets\\images\\shop\\items\\HP15bac.png', 'Bạc', '512G', 18654000, 10, NULL, NULL),
(184, 79, 'assets\\images\\shop\\items\\delln3.png', 'Bạc', '512G', 17990000, 10, NULL, NULL),
(185, 80, 'assets\\images\\shop\\items\\nitro5.png', 'Đen', '512G', 17862000, 10, NULL, NULL),
(186, 81, 'assets\\images\\shop\\items\\iphone11tim.png', 'Tím', '128G', 6500000, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_variant_id_foreign` (`variant_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_variant_id_foreign` (`variant_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_metas_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_variant_id_foreign` (`variant_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_metas`
--
ALTER TABLE `user_metas`
  ADD CONSTRAINT `user_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
