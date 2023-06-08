SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
    `id` int(11) AUTO_INCREMENT PRIMARY key,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `is_admin` BOOLEAN DEFAULT FALSE,
    `profile_name` varchar(50) NOT NULL,
    `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE licensekeys (
    `id` INT PRIMARY KEY,
    `key` VARCHAR(50) NOT NULL,
    `used` BOOLEAN DEFAULT FALSE
);

CREATE TABLE `pages` (
      `id` int(11) NOT NULL,
      `owner` varchar(50) NOT NULL,
      `page_name` varchar(50) NOT NULL,
      `page_clicks` varchar(50) NOT NULL,
      `background` mediumtext NOT NULL DEFAULT 'https://www.icegif.com/wp-content/uploads/icegif-47.gif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `services` (
    `id` int(11) NOT NULL,
    `name` varchar(50) NOT NULL,
    `icon` varchar(65535) NOT NULL,
    `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

COMMIT;