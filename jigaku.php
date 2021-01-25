<?php
/**
 * Plugin name: オレイン自学室カスタマイズ用プラグイン
 * Description: jigaku.olein-design.com専用のプラグインです
 * Version: 1.0.0
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * import CSS file
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'dekitas-styles',
			untrailingslashit( plugin_dir_url( __FILE__ ) ) . '/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( plugin_dir_path( __FILE__ ) )
		);
	}
);

/**
 * WordPressテーマ制作レッスンのエントリー下部にYoutubeプレイリストへのボタン設置
 */
add_action(
	'snow_monkey_append_entry_content',
	function() {
		if ( in_category( 'wp-theme-dev-lesson') ) {
		?>
		<a class="c-btn c-btn--block p-move-to-youtube" href="https://www.youtube.com/playlist?list=PLhydLf-S4Z5H5oQSqrEgCDDHMMul6KUF9" target="_blank">
			<i class="fab fa-youtube"></i> このレッスンの関連動画一覧を見る
		</a>
		<?php } elseif ( in_category( 'wp-basic' ) ) { ?>
		<a class="c-btn c-btn--block p-move-to-youtube" href="https://www.youtube.com/watch?v=Fy29rdJHxhU&list=PLhydLf-S4Z5HHIQruAC49xC9GIjPUZalb" target="_blank">
			<i class="fab fa-youtube"></i> このレッスンの関連動画一覧を見る
		</a>
		<?php }
	}
);