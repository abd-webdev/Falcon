-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 01:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `author_id`, `status`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Sustainable Living: Small Changes for a Greener Future for pakistan', '                       In recent years, the concept of sustainable living has gained significant attention as climate change and environmental concerns continue to rise. Sustainable living refers to making lifestyle choices that reduce one\'s environmental impact, such as using renewable energy, minimizing waste, and conserving natural resources. While large-scale changes require governmental and corporate efforts, individuals can make a difference by adopting simple, eco-friendly habits. Small changes like reducing single-use plastics, recycling properly, and conserving water can collectively have a major impact on the planet.\r\n\r\nOne of the most effective ways to lead a sustainable lifestyle is through conscious consumerism. Many people are shifting towards buying ethically sourced and eco-friendly products, supporting businesses that prioritize sustainability. The fashion industry, for example, has seen a rise in sustainable brands that promote ethical labor practices and use recycled materials. Additionally, switching to energy-efficient appliances and using public transport instead of personal vehicles can significantly reduce one\'s carbon footprint. These small steps, when adopted by many, create a ripple effect that contributes to a healthier planet.\r\n\r\nEducation and awareness play a crucial role in promoting sustainability. Schools, social media influencers, and environmental activists are spreading knowledge on how everyday actions impact the environment. Governments are also introducing policies encouraging green practices, such as plastic bans and incentives for renewable energy use. The journey toward a more sustainable future starts with individual responsibility and collective effort. By making mindful choices today, we can ensure a healthier and more sustainable world for future generations.                ', 21, 'approved', '2025-02-23 23:09:14', '2025-02-28 10:28:35', '../uploads/5.jpeg'),
(3, 'Pak vs india rivalry on 22 Fabruary', '                                Stay tuned for the greated rivalry Pak vs Ind                                 ', 2, 'approved', '2025-02-24 05:38:48', '2025-02-28 06:24:22', '../uploads/aksh-yadav-bY4cqxp7vos-unsplash.jpg'),
(4, 'Laptop for sale in best prices and cheap in pakistan', '                Laptop Price in Pakistan starts from Rs. 97,500. We offer cash-on-delivery services in Karachi, Lahore, and Islamabad. To receive an order in ...\r\n\r\n                                                                                ', 6, 'approved', '2025-02-24 05:57:32', '2025-02-27 13:56:30', '../uploads/kari-shea-1SAnrIxw5OY-unsplash.jpg'),
(7, 'Laptop for sale in best prices', 'Laptop for sale in best prices. Laptop for sale in best prices. Laptop for sale in best prices', 6, 'approved', '2025-02-24 06:08:47', '2025-02-27 13:56:33', '../uploads/kari-shea-1SAnrIxw5OY-unsplash.jpg'),
(29, 'Sport news about cricket champions trophy', 'The ICC Men\'s Champions Trophy, formerly called the ICC Knockout Trophy, is a quadrennial cricket tournament organised by the International Cricket Council. It is played in ODI format.\r\n\r\nInaugurated in 1998, The ICC conceived the idea of the Champions Trophy – a short cricket tournament to raise funds for the development of the game in non-test playing countries. It can be compared to FIFA Confederations Cup in football. It remains as one of the ICC events that has the same format', 2, 'approved', '2025-02-24 10:44:31', '2025-02-28 06:19:29', '../uploads/pexels-pixabay-36762.jpg'),
(30, 'The Future of Artificial Intelligence in Everyday Life', '          Artificial Intelligence (AI) has rapidly evolved from a futuristic concept into an essential part of our daily lives. From virtual assistants like Siri and Alexa to recommendation algorithms on Netflix and YouTube, AI is shaping the way we interact with technology. Businesses are leveraging AI to improve customer experiences, automate tasks, and enhance efficiency. The healthcare sector has also seen revolutionary changes, with AI-powered diagnostics improving accuracy and speeding up the process of detecting diseases. As AI continues to advance, it is expected to bring even more personalized experiences and intelligent automation to every aspect of our lives.\r\n\r\nHowever, with these advancements come challenges. Ethical concerns about AI decision-making, data privacy, and job displacement are hot topics in the tech industry. Many experts emphasize the importance of responsible AI development, ensuring that AI systems are fair, unbiased, and used for the betterment of society. Regulations and policies are also being developed to manage AI\'s impact on industries and the workforce. While AI is set to transform various domains, it is crucial to balance innovation with ethical responsibility.\r\n\r\nLooking ahead, AI is likely to play an even more significant role in transportation, education, and even creative fields such as art and music. Self-driving cars, personalized learning experiences, and AI-generated artwork are just the beginning. The question remains: how can we harness AI\'s potential while ensuring it benefits humanity as a whole? The answer lies in responsible development, ethical considerations, and continuous learning as AI continues to shape the future.\r\n\r\n', 2, 'approved', '2025-02-24 10:45:12', '2025-02-28 06:19:22', '../uploads/kari-shea-1SAnrIxw5OY-unsplash.jpg'),
(31, 'Exploring the Beauty of Northern Areas of pakistan', '                The northern areas of Pakistan offer breathtaking landscapes, from the lush green valleys of Swat to the snow-covered peaks of Skardu. Whether you\'re a nature lover or an adventure seeker, these regions provide the perfect getaway with mesmerizing views, cultural heritage, and thrilling activities like trekking and camping                ', 2, 'approved', '2025-02-25 08:39:17', '2025-02-28 06:19:33', '../uploads/sajid-khan-woKVhXH1R9o-unsplash.jpg'),
(32, 'Tips for Becoming a Successful Freelancer', 'Freelancing is an excellent way to earn money while working on your own terms. To succeed, it\'s essential to build a strong portfolio, communicate effectively with clients, and consistently deliver high-quality work. Platforms like Upwork and Fiverr can help you find opportunities and grow your freelancing career.\r\n\r\n', 2, 'approved', '2025-02-25 08:43:00', '2025-02-28 06:19:39', '../uploads/zain-raza-D8CQpDTXPyE-unsplash.jpg'),
(34, 'Best Cafés to Visit in Lahore', 'Lahore is home to some of the most amazing cafés, offering a variety of cuisines and cozy atmospheres. From the artistic vibes of Coffee Planet to the elegant ambiance of Mocca, there\'s something for everyone. Whether you\'re looking for a quiet study spot or a lively hangout, these cafés won\'t disappoint.\r\n\r\n', 2, 'approved', '2025-02-25 08:44:11', '2025-02-28 10:28:30', '../uploads/shazib-ali-8pn4XEIGtX8-unsplash.jpg'),
(37, 'The Importance of Web Security 2025 with the new data', '                As cyber threats continue to rise, securing your website is more important than ever. Implementing SSL certificates, using strong passwords, and keeping your software updated are crucial steps to protect your data from hackers. Stay ahead with the latest security practices to keep your site and users safe.\r\n                ', 21, 'approved', '2025-02-26 06:21:30', '2025-02-28 10:56:54', '../uploads/4.jfif'),
(49, 'Government Announces New Tax Policies for Economic Growth', 'The finance ministry has introduced a series of tax reforms aimed at stimulating the economy. Officials stated that these changes will benefit small businesses, reduce corporate tax rates, and simplify tax filing procedures.\r\n\r\nOne of the major highlights of the policy is the introduction of tax incentives for startups. These incentives aim to encourage entrepreneurship and foreign investment. Additionally, tax rebates for middle-income families are expected to provide financial relief.\r\n\r\nEconomists have mixed opinions on the impact of these changes. Some believe that the policy will boost economic growth, while others argue that it may lead to a decrease in government revenue. The finance minister is expected to address these concerns in an upcoming press conference.\r\n\r\n', 2, 'approved', '2025-02-28 10:24:31', '2025-02-28 10:28:24', '../uploads/1.jpg'),
(50, ' AI Revolution: Transforming Industries at an Unprecedented Pace', '                                Artificial Intelligence (AI) is rapidly changing industries, from healthcare to finance. Companies are leveraging AI-powered automation, predictive analytics, and machine learning to improve efficiency and decision-making processes.\r\n\r\nIn the healthcare sector, AI is being used to analyze medical data, detect diseases at early stages, and assist in robotic surgeries. Meanwhile, financial institutions are using AI to detect fraud, assess creditworthiness, and optimize stock market predictions.\r\n\r\nDespite its advantages, AI adoption comes with challenges, including ethical concerns, job displacement, and data privacy issues. Experts call for government regulations to ensure AI is used responsibly, benefiting both businesses and society.\r\n\r\n                                ', 21, 'approved', '2025-02-28 10:24:49', '2025-02-28 10:55:02', '../uploads/2.jfif'),
(51, 'Champions League Semi-Finals: Exciting Matches Ahead', '                Football fans are eagerly awaiting the UEFA Champions League semi-finals as top European clubs prepare to battle for the title. This year’s competition has seen thrilling matches, unexpected upsets, and star performances.\r\n\r\nManchester City will face Real Madrid in what promises to be a thrilling encounter, while Bayern Munich takes on Paris Saint-Germain. Both fixtures will see world-class players competing at their highest level, with tactics and teamwork playing crucial roles in determining the winners.\r\n\r\nCoaches and analysts predict that the matches will be closely contested. Fans worldwide are expected to tune in, with stadiums packed to capacity. The road to the final is filled with excitement, and the world will soon witness who emerges victorious.                ', 21, 'approved', '2025-02-28 10:25:27', '2025-02-28 10:55:37', '../uploads/download5.jfif'),
(52, '10 Tips for a Healthier Lifestyle in 2025', '                As we enter 2025, more people are focusing on improving their health and well-being. Maintaining a healthy lifestyle requires a combination of proper nutrition, regular exercise, and mental well-being.\r\n\r\nExperts suggest incorporating a balanced diet that includes fresh fruits, vegetables, and lean proteins while reducing processed foods and excessive sugar intake. Hydration and mindful eating habits also contribute to overall health.\r\n\r\nPhysical activity is equally important. A mix of cardio, strength training, and flexibility exercises can improve fitness levels. Additionally, prioritizing mental health through meditation, stress management, and quality sleep is essential for overall well-being.\r\n\r\n                ', 21, 'approved', '2025-02-28 10:25:51', '2025-02-28 10:56:05', '../uploads/5.jfif'),
(53, 'Stock Market Surges Amid Positive Economic Outlook', '                The stock market saw a significant rise today as investors remain optimistic about economic recovery. Leading indices recorded their highest gains in months, driven by strong corporate earnings and positive job market reports.\r\n\r\nAnalysts believe that the Federal Reserve’s decision to maintain stable interest rates has encouraged investments. Additionally, global trade improvements and consumer spending growth have contributed to market confidence.\r\n\r\nWhile the outlook remains positive, experts warn of potential volatility due to geopolitical tensions and inflation concerns. Investors are advised to stay informed and diversify their portfolios to mitigate risks.                ', 21, 'approved', '2025-02-28 10:26:19', '2025-02-28 10:56:00', '../uploads/5.jfif'),
(54, 'The stock market saw a significant rise today as investors remain op', '                                The stock market saw a significant rise today as investors remain optimistic about economic recovery. Leading indices recorded their highest gains in months, driven by strong corporate earnings and positive job market reports.\r\n\r\nAnalysts believe that the Federal Reserve’s decision to maintain stable interest rates has encouraged investments. Additionally, global trade improvements and consumer spending growth have contributed to market confidence.\r\n\r\nWhile the outlook remains positive, experts warn of potential volatility due to geopolitical tensions and inflation concerns. Investors are advised to stay informed and diversify their portfolios to mitigate risks.                                ', 21, 'approved', '2025-02-28 10:26:50', '2025-02-28 10:56:20', '../uploads/download8.jfif'),
(55, 'The stock market saw a significant rise today as investors remain optimistic .', 'The stock market saw a significant rise today as investors remain optimistic about economic recovery. Leading indices recorded their highest gains in months, driven by strong corporate earnings and positive job market reports.\r\n\r\nAnalysts believe that the Federal Reserve’s decision to maintain stable interest rates has encouraged investments. Additionally, global trade improvements and consumer spending growth have contributed to market confidence.\r\n\r\nWhile the outlook remains positive, experts warn of potential volatility due to geopolitical tensions and inflation concerns. Investors are advised to stay informed and diversify their portfolios to mitigate risks.', 2, 'approved', '2025-02-28 10:27:17', '2025-02-28 10:28:12', '../uploads/download1.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(2, 'admin'),
(1, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`, `created_at`) VALUES
(2, 2, 'ce72346dd3a9e54d521be70d354046c7995b9e775b599e9526f6a4e077e05a37', '2025-02-26 05:52:46'),
(3, 2, '9c42bad3d1252a36f18d97763c468a05d3b1c0e4d20a2fb57630b55a88993b01', '2025-02-26 08:17:25'),
(4, 2, 'e25c1191b01d7c4993eb35cafbf119b22d27b49f31a357faf709742825c242ef', '2025-02-26 12:01:06'),
(5, 2, '35e6f9f9ccb40454a25057d882773268a3d39b18523237df5c5e3783430c2abe', '2025-02-26 12:03:00'),
(6, 2, '6c022f827e4c14ce85b9534f93e41f0fc62af368e7234a5a872ae038ab105f22', '2025-02-26 13:15:40'),
(7, 2, 'ae671b2b7ef51022c9a652769a289ce18f39ddc9c50b0c750910d6adb915f8a9', '2025-02-26 13:16:24'),
(8, 2, 'aeba2eedb4c2903485ee89babbc558f2f43fc1d89449af77b45dc3122473fd20', '2025-02-27 05:11:38'),
(9, 2, 'fefef39d9b4080d5345c2445a47306a6a0beae361a7c7379f102d9b23d461d71', '2025-02-27 06:20:42'),
(10, 2, '10c5e7215d6ae475eed4e1c2ee634aad29e7a630f4a0fadf6e8e51c5e4da01c1', '2025-02-27 06:22:14'),
(11, 2, '9bf6b48bb01738859d24108592037a6150491fb1bec09dba16b89a94fdd56330', '2025-02-27 06:22:43'),
(12, 2, '5645360846ad85bd19d5bf30185a2ac8631fb8119e24438a169ca7347852781b', '2025-02-27 06:23:13'),
(13, 2, 'faf103b662457132e2d352f2e1c908129c447569b49d471a7b544b5cbc9d09a8', '2025-02-27 06:29:34'),
(14, 2, 'c9cd3b5f89089e3e89a22851dc9b18f229c6150291bc281b6a2ba30408cbfab3', '2025-02-27 06:29:41'),
(15, 21, 'fc00ba256443e8a23d447f1932ad721036f6ed52942651beda9c68e402807c07', '2025-02-28 06:49:30'),
(16, 21, '83df35bf8ce3bb1ac73928ff67a45c1ec05bd658e743e44cf36e7d1102252c9e', '2025-02-28 06:54:17'),
(17, 21, '808c730633e88771cea96f41af76977f4f715c43d04ea06b236713a86e315a75', '2025-02-28 07:06:24'),
(18, 2, '19984934a6dc86b21e172abd94a0a7c354db8d547f7264cf8d47c42137340548', '2025-02-28 07:06:38'),
(19, 2, '90ff127fe7d9bf567f00eb40f82ec2212929dc067a699de1b0a8740b0bbcf03e', '2025-02-28 07:07:47'),
(20, 2, 'b1878ed1f75af933cef5792161e32fcdf4f0db38bc44dc2ce1c7650a70d354d3', '2025-02-28 07:11:10'),
(21, 2, '66868c95fd87724cc825065e85ceb0214c9fb36be2b207f25c67e422f9b99acc', '2025-02-28 07:11:53'),
(23, 26, 'a00066e1363e596ab6b04819b2802457c179e94e11f3404603cb41de6f4fb7cd', '2025-02-28 07:33:08'),
(24, 26, '336ac5f37f90f214c22ede279c2cfaff99f31a88b2b324277011d5d825cf3593', '2025-02-28 07:51:53'),
(25, 26, '4fd43f56a15e0f2ff72b3d9a7b0a79e88a40b52a79d97b6856a265270957f959', '2025-02-28 07:53:57'),
(26, 26, '426c352e05e647d9b7c238f90f89ac2f5dd6d5449911680219a99b214678b014', '2025-02-28 09:18:14'),
(30, 21, '8ca873b021cf73723fb95d72b95d401cbd5b461fc1e566f1e749cc3dc3621599', '2025-02-28 09:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role_id`) VALUES
(1, 'sdfm sdfm', 'afa@gmail.com', '$2y$10$buyvpOalkZolqZ4Q0zVzM.i4xQoIUhTH10RHpx7Jcib/ALp5uLMDi', '2025-02-22 15:41:43', 1),
(2, 'Abdullah', 'abd@gmail.com', '$2y$10$NOSPt/dRWThJVplgyInMfejD/dwWl.EfaPz2mmMNwPHkVqxsl5l2O', '2025-02-22 15:42:55', 1),
(3, 'hello', 'hello@gmail.com', '$2y$10$dZSbSgkrkFT8Z2riqoi1xuNUBWn5LOt2Jvx/lxgPv778VnigOlqra', '2025-02-22 16:00:08', 1),
(4, 'Sidra', 'sidra@gmail.com', '$2y$10$tzwdES3Rt0TRF2Lqdw2Sieci5xEik3uB3CdNGViUY4bxNWPVcy4Oq', '2025-02-22 17:26:34', 1),
(6, 'arslan', 'arslan@gmail.com', '$2y$10$jcGSJVI2xEhFdPh8FZutseO/LXfiTFoW15mi6iXAbxyHUJTi.XXte', '2025-02-22 22:21:58', 1),
(7, 'ahmad', 'ahmad@gmail.com', '$2y$10$pLiqXt/fwPByY6wPxLh1XOzpV5OsqYhBU6XUsvrywak1W7iL6jheO', '2025-02-22 22:24:08', 1),
(8, 'Abdullah Atiq', 'abdullah@gmail.com', '$2y$10$lsFVykYt6sDWmp.mOx4r3OdsGUbwWz0LNJ5JWnAHxgHvwA6UR2e2.', '2025-02-25 07:49:37', 1),
(9, 'ABC', 'abc@gmail.com', '$2y$10$x/cchcimUOUuUjGaV7oJ9O0Q/1MeDMQI0VYdlQmZ7hgBbY4TKYxYG', '2025-02-25 13:31:40', 1),
(10, 'abdullah', 'abdullahatiq0180@gmail.com', '$2y$10$BMR0nVsZmbs5CIAsJy1sw.DcDHltFiyQIe4jMcvVK3DlA9zt64MiC', '2025-02-25 13:48:24', 1),
(12, 'Ali', 'ali@gmail.com', '$2y$10$t8lRzlEQVrwZtaw2vcLX6uijB5WYIfI9StvUEOk.SyEv1rM0d5xL6', '2025-02-25 13:49:35', 1),
(17, 'Ali', 'ali12@gmail.com', '$2y$10$4TDXSb1./yZp5sTPz1f95OH6gYXNUiSsakU97fcTv/Xc64gbB0LgW', '2025-02-27 06:35:23', 1),
(18, 'Ali', 'ali123@gmail.com', '$2y$10$wU3NINFnjYr6DbynL35.kuN5D3NpsBjJiPIhVfT4Cp4KUd0T.hzCC', '2025-02-27 06:40:57', 1),
(19, 'Ali', 'ali1213@gmail.com', '$2y$10$Mby5FYz5440B5AC4TzTi0.hf6NaGIHLB2zZPRF3u4ugkGlf7x1Zdi', '2025-02-27 06:50:33', 1),
(20, 'Hadi', 'hadi@gmail.com', '$2y$10$GjEyRFvDbjMv.V0IQy5.yufDldZxut8g9tiT70k85KBtWVMdDQIxS', '2025-02-27 11:14:21', 2),
(21, 'admin', 'admin@gmail.com', '$2y$10$mny1ajU3bvCfNPgkrxCxrun4Du3JvjrR0AwCnZpRIJm6qwdR4cV0a', '2025-02-27 12:01:23', 2),
(22, 'Ali', 'ali12113@gmail.com', '$2y$10$mX0SdVKq9eX8gZur5v9ZY.LJ6eDzZtb5nwBIx5LIzwflsCckrrfvK', '2025-02-28 07:14:46', 1),
(23, 'Ali', 'ali113@gmail.com', '$2y$10$UgA9pVqFIe/t3Blm8PWtMehJvQfVQ4Fp23W6J1EVZl0GsDgERhrhq', '2025-02-28 07:17:22', 1),
(24, 'Ali', 'ali11113@gmail.com', '$2y$10$2fiV61FqpfAsG/G7AEzZJ.X.6YUzvzxuR1cC3YI76kwNEKEnwbuJO', '2025-02-28 07:18:49', 1),
(25, 'Abdullah Atiq', 'abdullah12@gmail.com', '$2y$10$f1/OimxOcmssZnZdzlWP5Oop9UPu2XFZobsKa8OIOJ0jaq1jRsJNK', '2025-02-28 07:32:24', 1),
(26, 'Abdullah Atiq', 'abdullah123@gmail.com', '$2y$10$5qUoltYYPEPd5qwa13Xk7OwjUCRKPVZpCLiY57vSDv.jfhiAeMheK', '2025-02-28 07:32:43', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
