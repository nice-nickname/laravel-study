-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 23 2022 г., 16:53
-- Версия сервера: 8.0.31-0ubuntu0.22.04.1
-- Версия PHP: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_short` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_born` smallint NOT NULL,
  `year_died` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `name_short`, `image`, `year_born`, `year_died`) VALUES
(1, 'Михаил Афанасьевич Булгаков', 'М. А. Булгаков', 'bulgakov.jpg', 1891, 1940),
(2, 'Лев Николаевич Толстой', 'Л. Н. Толстой', 'tolstoi.jpg', 1928, 1910),
(3, 'Антон Павлович Чехов', 'А. П. Чехов', 'chechov.jpg', 1860, 1904),
(4, 'Александр Сергеевич Пушкин', 'А. С. Пушкин', 'pushkin.jpg', 1799, 1837),
(5, 'Николай Васильевич Гоголь', 'Н. В. Гоголь', 'gogol.jpg', 1809, 1852),
(6, 'Иван Сергеевич Тургеньев', 'И. С. Тургеньев', 'turgeniev.jpg', 1818, 1883),
(7, 'Михаил Юрьевич Лермонтов', 'М. Ю. Лермонтов', 'lermontov.jpg', 1814, 1841),
(8, 'Фёдор Михайлович Достоевский', 'Ф. М. Достоевский', 'dostoevski.jpg', 1821, 1881);

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `book_id`) VALUES
(19, 2, 7),
(20, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` int DEFAULT '0',
  `page_amount` int NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `preview1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `price`, `discount`, `page_amount`, `author_id`, `preview1`, `preview2`, `preview3`, `description`) VALUES
(3, 'Мастер и Маргарита', 320, 10, 345, 1, 'master_and_slaves.jpg', 'book-info.png', 'book-info-1.png', 'роман Михаила Афанасьевича Булгакова, работа над которым началась в декабре 1928 года и продолжалась вплоть до смерти писателя в марте 1940 года. Роман относится к незавершённым произведениям; редактирование и сведение воедино черновых записей осуществляла после смерти мужа вдова писателя — Елена Сергеевна. Первая версия романа, имевшая названия «Копыто инженера», «Чёрный маг» и другие, была уничтожена Булгаковым в 1930 году. В последующих редакциях среди героев произведения появились автор романа о Понтии Пилате и его возлюбленная. Окончательное название — «Мастер и Маргарита» — оформилось в 1937 году.'),
(4, 'Морфий', 1000, 0, 120, 1, 'morphey.jpg', 'book-info.png', 'book-info-1.png', 'Норм раскумарились с пацанами!!! Отличная книга для тех, кто любит гонять по вене!'),
(5, 'Записки юного врача', 220, 90, 436, 1, 'doctor_notes.jpg', 'book-info.png', 'book-info-1.png', '«Записки юного врача» — цикл рассказов Михаила Булгакова, опубликованных в 1925—1926 годах в журналах «Медицинский работник» и «Красная панорама». В цикл входят рассказы «Полотенце с петухом», «Стальное горло», «Крещение поворотом», «Вьюга», «Тьма египетская», «Пропавший глаз», «Звёздная сыпь».'),
(6, 'Война и мир', 610, 0, 800, 2, 'war_and_piece.jpeg', 'book-info.png', 'book-info-1.png', 'Война и мир — роман-эпопея Льва Николаевича Толстого, описывающий русское общество в эпоху войн против Наполеона в 1805—1812 годах. Эпилог романа доводит повествование до 1820 года.'),
(7, 'Мцыри', 144, 12, 430, 7, 'mtsiri.jpg', 'book-info.png', 'book-info-1.png', 'Романтическая поэма М. Ю. Лермонтова, написанная в 1839 году и опубликованная в 1840 году в единственном прижизненном издании поэта — сборнике «Стихотворения М. Лермонтова». Огонь. Вода. Колодец чето-там, ведро... Я люблю есть сало... и... волчьи шкуры...'),
(8, 'Преступление и наказание', 345, 2, 798, 8, 'babku_ubili.webp', 'book-info.png', 'book-info-1.png', '«Преступле́ние и наказа́ние» — социально-психологический и социально-философский роман Фёдора Михайловича Достоевского, над которым писатель работал в 1865—1866 годах. Впервые опубликован в 1866 году в журнале «Русский вестник».'),
(9, 'Бесы', 228, 98, 543, 8, 'mne_nochami_snyatsya_besu.webp', 'book-info.png', 'book-info-1.png', '«Бе́сы» — шестой роман Фёдора Михайловича Достоевского, изданный в 1871—1872 годах. Один из наиболее политизированных романов Достоевского был написан им под впечатлением от ростков террористического и радикального движений в среде русских интеллигентов, разночинцев и прочих.'),
(10, 'Каштанка', 666, 0, 777, 3, 'dawg.jpg', 'book-info.png', 'book-info-1.png', 'Давг, где видео? Давг, где видео? Давг, где видео? «Кашта́нка» — рассказ русского писателя Антона Павловича Чехова. Опубликован в газете «Новое время» на Рождество 1887 года под заглавием «В учёном сообществе». '),
(11, 'Вишнёвый сад', 222, 5, 400, 3, 'hot_cherry.jpg', 'book-info.png', 'book-info-1.png', 'Бобезная вишенка, отличные плоды + кислая веточка = «Вишнёвый сад» — пьеса в четырёх действиях Антона Павловича Чехова, жанр которой сам автор определил как комедия. Пьеса написана в 1903 году, впервые поставлена 17 января 1904 года в Московском художественном театре.'),
(12, 'Тарас Бульба', 70000, 99, 2000, 5, 'taras_bulbulyator.jpg', 'book-info.png', 'book-info-1.png', 'Повесть Николая Васильевича Гоголя, входящая в цикл «Миргород». События произведения происходят в среде запорожских казаков в первой половине XVII века. В основу повести Н. В. Гоголя легла история казацкого восстания 1637—1638 годов, подавленного гетманом Николаем Потоцким.'),
(13, 'Герои нашего времени', 30, 0, 123, 7, 'heroes_of_our_time.webp', 'book-info.png', 'book-info-1.png', '«Геро́й на́шего вре́мени» — первый в русской прозе социально-психологический роман, написанный Михаилом Юрьевичем Лермонтовым в 1838—1840 годах. Классика русской литературы.'),
(14, 'Игрок', 3333, 0, 222, 8, 'player.jpg', 'book-info.png', 'book-info-1.png', 'Роман «Игрок» - история безумия, в котором игра становится не только всепоглощающей страстью, но и единственно-возможным смыслом существования. Вероятно, «Игрок» - самая автобиографическая книга Достоевского, заядлого игрока в рулетку, неоднократно проигрывавшего большие суммы.'),
(15, 'Капитанская дочка', 22, 0, 33, 4, 'captain_daughter.jpg', 'book-info.png', 'book-info-1.png', '«Капита́нская до́чка» — исторический роман Александра Пушкина, действие которого происходит во время восстания Емельяна Пугачёва. Впервые опубликован без указания имени автора в 4-й книжке журнала «Современник», поступившей в продажу в последней декаде 1836 года.'),
(16, 'Мертвые души', 170, 20, 461, 5, 'death_note_gogol.webp', 'book-info.png', 'book-info-1.png', 'Произведение Николая Васильевича Гоголя, жанр которого сам автор обозначил как поэма. Изначально задумано как трёхтомник. Первый том был издан в 1842 году. Практически готовый второй том был утерян, но сохранилось несколько глав в черновиках. Третий том не был начат, о нём остались только отдельные сведения.\r\n\r\nПроизведение входит во «Всемирную библиотеку» (список наиболее значимых произведений мировой литературы «Норвежского книжного клуба»). '),
(17, 'Записки из мертвого дома', 872, 50, 324, 8, 'death_note.jpeg', 'book-info.png', 'book-info-1.png', ''),
(18, 'Евгений Онегин', 566, 10, 279, 4, 'eugene_onegin.jpg', 'book-info.png', 'book-info-1.png', 'ААААААААААААА ЧЕРТИИИИИ!! «Евге́ний Оне́гин» — роман в стихах русского писателя и поэта Александра Сергеевича Пушкина, начат 9 мая 1823 года и закончен 5 октября 1831 года, одно из самых значительных произведений русской словесности. Повествование ведётся от имени безымянного автора, который представился добрым приятелем.'),
(19, 'Анна Каренина', 228, 1, 234, 2, 'anna.jpg', 'book-info.png', 'book-info-1.png', 'Аня.');

-- --------------------------------------------------------

--
-- Структура таблицы `book_categories`
--

CREATE TABLE `book_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book_categories`
--

INSERT INTO `book_categories` (`id`, `category_id`, `book_id`) VALUES
(6, 2, 3),
(5, 4, 4),
(10, 1, 5),
(8, 4, 6),
(9, 5, 6),
(7, 1, 7),
(12, 1, 8),
(11, 2, 8),
(14, 1, 9),
(17, 2, 9),
(13, 4, 9),
(15, 5, 10),
(18, 2, 11),
(16, 4, 11),
(21, 4, 12),
(20, 1, 13),
(19, 5, 13),
(22, 1, 14),
(23, 4, 15),
(24, 1, 16),
(25, 3, 16),
(26, 2, 17),
(27, 2, 18),
(30, 3, 18),
(28, 4, 18),
(29, 5, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`) VALUES
(1, 'Философия', 'Философия жизни и филомофия смерти'),
(2, 'Проза', 'Устная или письменная речь без деления на соизмеримые отрезки — стихи;'),
(3, 'Научное', 'Научная литература опирается на математический аппарат - формулы, законы и т. д.'),
(4, 'Классика', 'Литературные произведения общепризнанных автором как в России, так и по всему миру'),
(5, 'Деловая', 'Деловая литература изучает деловые отношения');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `comment` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `recommend`, `comment`, `user_id`, `book_id`) VALUES
(7, 1, 'Согласен с мнением, оставленным в разделе \"О книге\"', 1, 4),
(8, 0, 'не очень', 2, 9),
(9, 1, 'Жизненно', 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `book_id`) VALUES
(30, 1, 11),
(31, 1, 7),
(33, 2, 5),
(34, 2, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_15_122504_create_books_table', 1),
(6, '2022_12_21_235521_create_basket_favorites', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
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
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Паштет Геннадий', 'c@b.a', NULL, '$2y$10$Ls37NEA7UNpChDTrfwapdudkAXnqSTxNE2R55VWuo0LQEev/GH7tm', NULL, '2022-12-21 05:32:09', '2022-12-21 05:32:09'),
(2, 'Иван Беброчка', 'a@b.c', NULL, '$2y$10$bV6pTr573e7BbJ0MGcMPzulDq4cr3/FMDDW8rmI.szRMe3mu.reoW', NULL, '2022-12-22 15:17:59', '2022-12-22 15:17:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_user_id_foreign` (`user_id`),
  ADD KEY `basket_book_id_foreign` (`book_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Индексы таблицы `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UX_book_id_category_id` (`book_id`,`category_id`),
  ADD KEY `book_categories_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_book_id_foreign` (`book_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_book_id_foreign` (`book_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `basket_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Ограничения внешнего ключа таблицы `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `book_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
