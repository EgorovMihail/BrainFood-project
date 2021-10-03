<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'brainfood-project-wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')bEl*3l[HEN=Dv{[1vpnBUNwi#Wuu3&N]DOw8o-11!Mb*{XP;!oh)SMKCM3BCh&8' );
define( 'SECURE_AUTH_KEY',  '~aIG[h%f0;Jj#cOn%;%cmBgTyjC|5U@1v{Na9FMbvY;N/m?J`u<,Yi.B[=m;aA|A' );
define( 'LOGGED_IN_KEY',    'sTF&YukjScBJ9_?hE9<ozZy<jB3?`#xs(Elqce7()C}F;XVeUY#NU/v/-GAbg-%n' );
define( 'NONCE_KEY',        'ASuZ<TDb/I%sPp1{*=IU_NoJP;]$Ej9|^VH56S}4HBgyaX]2T7S%BF$xKc6^pN-n' );
define( 'AUTH_SALT',        '>8S|aWt}w?m+sGEzq-_u[4 0nBw:!u5 D_a-Ko0!>;W;?UhgOkO|>IBKI6B<xt!B' );
define( 'SECURE_AUTH_SALT', '3c<r zAA?~KBGpn1~JNH1tf+iUIr|ZF!@[lwj9Jv21=gpAH+y^69&[E;Et(!d~@;' );
define( 'LOGGED_IN_SALT',   'q-Q5<chQSNjT2$W>ZckW*3)i@GT2M*+p@=Dvo<5%]DDH2QY.tvq2Ni4`a/^Z/)7^' );
define( 'NONCE_SALT',       '88&i#7d:}}[-UOOpIQqn v$J:`<xxr/rnY0jvP_)+&i|6m2{TFIuRIzS!x#q:0=V' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
