<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'ipp_teste' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F(-=#5Jx|YAoMD8m!G;yzGQ3b]$w=I&uwC_h$bMtAkQ7C}Sg)OIsWc[`F|N=1cvW' );
define( 'SECURE_AUTH_KEY',  'NomKh<d}%<_h+.BiGaTWrz:Oxc[Shf3tvEZE#^MTdcGBy3A:^k.b47d1 ]4@lxVb' );
define( 'LOGGED_IN_KEY',    'LuTo1=^}Sw6<IP@]7b}{:7LRFn^?bj5Z7a;Z??|@7[o2`5yrkSb?:wRQZQ%g/f6e' );
define( 'NONCE_KEY',        '1AH#7evF*qzM=0z75#i:?f>?kX[A2XJw^YepS;zl!mpMr*ygKR(U.q/g7e7_O2[O' );
define( 'AUTH_SALT',        ':1K[5G.8,aLOah%EAcUxuH~k6{mCZ/oK!Rdf#yH5n)v.z^FFG.|kDJTu4}pWq|Fw' );
define( 'SECURE_AUTH_SALT', 'Q~QWSVLLw!a!@V/:PoAN#_C&Gg>%S_}z 8524e#bf5PWZq19e||pL=B=WhfjIpom' );
define( 'LOGGED_IN_SALT',   'RQO~Z@Y62Nppb)(aGZ7o(Wt=YI8oI8RHvv80i5YKrdLk(e~( #7wa/io+m00<42a' );
define( 'NONCE_SALT',       '}NYvkW)Rc&&:t#`LN#4#t^]OY>l9T^0{R/Kn0ZC6$1*1KYw_UJ{}eE Gq*gUxIZ?' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
