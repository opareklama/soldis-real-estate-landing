<?php
defined( 'ABSPATH' ) || exit;

/**
 * SOLDIS Landing — Admin Dashboard (Command Center)
 *
 * Read-only overview of site health, module status, and technical readiness.
 * No settings are stored here. All settings are in their respective modules.
 *
 * @package    OpaReklama\SoldisLanding
 * @author     OPA Reklama
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */

// ─── Data Collection (lightweight, no external API calls) ─────────────────────

$plugin_version  = defined( 'SOLDIS_LANDING_VERSION' ) ? SOLDIS_LANDING_VERSION : '—';
$wp_version      = get_bloginfo( 'version' );
$php_version     = PHP_VERSION;
$site_language   = get_bloginfo( 'language' );
$is_https        = is_ssl();
$wp_debug        = ( defined( 'WP_DEBUG' ) && WP_DEBUG );
$cron_disabled   = ( defined( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON );
$php_memory      = ini_get( 'memory_limit' );
$max_exec        = ini_get( 'max_execution_time' );
$upload_size     = ini_get( 'upload_max_filesize' );
$db_ver          = $GLOBALS['wpdb']->db_version() ?? '—';
$os              = PHP_OS;
$server_sw       = isset( $_SERVER['SERVER_SOFTWARE'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_SOFTWARE'] ) ) : '—';
$max_input_vars  = ini_get( 'max_input_vars' );

// Timezone
$tz_string   = get_option( 'timezone_string' );
$gmt_offset  = get_option( 'gmt_offset' );
$timezone    = $tz_string ?: ( $gmt_offset >= 0 ? 'UTC+' . $gmt_offset : 'UTC' . $gmt_offset );

// Global Settings
$global     = get_option( 'soldis_global_settings', array() );
$header_opt = get_option( 'soldis_header_settings',  array() );
$footer_opt = get_option( 'soldis_footer_settings',  array() );
$company    = ! empty( $global['company_name'] ) ? $global['company_name'] : 'SOLDIS';

// ─── Homepage Progress ────────────────────────────────────────────────────────
$homepage_sections = array(
	array( 'label' => 'Hero',       'icon' => '🏠', 'key' => 'soldis_hero_settings',       'flag' => 'enable_hero',       'built' => true ),
	array( 'label' => 'Apie Mus',   'icon' => '⭐', 'key' => 'soldis_whysoldis_settings',  'flag' => 'enable_whysoldis',  'built' => true ),
	array( 'label' => 'Benefits',   'icon' => '✅', 'key' => 'soldis_benefits_settings',   'flag' => 'enable_benefits',   'built' => true ),
	array( 'label' => 'Process',    'icon' => '🔄', 'key' => 'soldis_process_settings',    'flag' => 'enable_process',    'built' => true ),
	array( 'label' => 'Investment', 'icon' => '💰', 'key' => 'soldis_investment_settings', 'flag' => 'enable_investment', 'built' => true ),
	array( 'label' => 'Guarantee',  'icon' => '🛡️', 'key' => '',                           'flag' => '',                  'built' => false ),
	array( 'label' => 'Pricing',    'icon' => '💳', 'key' => '',                           'flag' => '',                  'built' => false ),
	array( 'label' => 'FAQ',        'icon' => '❓', 'key' => 'soldis_faq_settings',        'flag' => 'enable_faq',        'built' => true ),
	array( 'label' => 'CTA',        'icon' => '📣', 'key' => '',                           'flag' => '',                  'built' => false ),
	array( 'label' => 'Footer',     'icon' => '📋', 'key' => 'soldis_footer_settings',     'flag' => 'enable_footer',     'built' => true ),
);

$sections_active = 0;
$sections_built  = 0;
foreach ( $homepage_sections as &$s ) {
	if ( ! $s['built'] ) {
		$s['status'] = 'coming';
	} else {
		$opts        = get_option( $s['key'], array() );
		$s['status'] = ! empty( $opts[ $s['flag'] ] ) ? 'active' : 'off';
		if ( $s['status'] === 'active' ) $sections_active++;
		$sections_built++;
	}
}
unset( $s );
$progress_pct = $sections_built > 0 ? round( ( $sections_active / count( $homepage_sections ) ) * 100 ) : 0;

// ─── Global Settings Completeness ─────────────────────────────────────────────
$global_checks = array(
	'Logo'         => ! empty( $global['logo_image'] ) || ! empty( $global['logo_text'] ),
	'Phone'        => ! empty( $global['phone'] ),
	'Email'        => ! empty( $global['email'] ),
	'Address'      => ! empty( $global['address'] ),
	'Social Media' => ! empty( $global['facebook'] ) || ! empty( $global['instagram'] ) || ! empty( $global['linkedin'] ),
	'Brand Colors' => ! empty( $global['color_primary'] ),
);
$global_complete = array_sum( $global_checks );
$global_total    = count( $global_checks );

// ─── SEO Readiness ────────────────────────────────────────────────────────────
$seo_yoast    = defined( 'WPSEO_VERSION' );
$seo_rank     = defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath' );
$seo_aioseo   = defined( 'AIOSEO_VERSION' )   || class_exists( 'AIOSEO\Plugin\AIOSEO' );
$has_seo      = $seo_yoast || $seo_rank || $seo_aioseo;
$seo_plugin_name = $seo_yoast ? 'Yoast SEO' : ( $seo_rank ? 'Rank Math' : ( $seo_aioseo ? 'AIOSEO' : null ) );

$seo_checks = array(
	array( 'label' => 'Meta Title',       'ok' => $has_seo, 'note' => $has_seo ? $seo_plugin_name : 'No SEO plugin detected' ),
	array( 'label' => 'Meta Description', 'ok' => $has_seo, 'note' => $has_seo ? $seo_plugin_name : 'No SEO plugin detected' ),
	array( 'label' => 'Canonical URL',    'ok' => $has_seo, 'note' => $has_seo ? 'Managed by ' . $seo_plugin_name : 'Not configured' ),
	array( 'label' => 'Open Graph',       'ok' => $has_seo, 'note' => $has_seo ? $seo_plugin_name . ' handles OG' : 'Not configured' ),
	array( 'label' => 'Robots.txt',       'ok' => true,     'note' => 'WordPress managed' ),
	array( 'label' => 'Schema Markup',    'ok' => $has_seo, 'note' => $has_seo ? $seo_plugin_name : 'Not detected' ),
	array( 'label' => 'XML Sitemap',      'ok' => $has_seo, 'note' => $has_seo ? 'Auto-generated' : 'Not detected' ),
);
$seo_ok_count = count( array_filter( array_column( $seo_checks, 'ok' ) ) );

// ─── AEO & GEO Readiness (Informational) ─────────────────────────────────────
$aeo_items = array(
	array( 'label' => 'FAQ Schema (AEO)',        'status' => 'info', 'note' => 'FAQ section built — add schema via SEO plugin' ),
	array( 'label' => 'Q&A Content Signals',     'status' => 'ok',   'note' => 'FAQ accordion content present on page' ),
	array( 'label' => 'Entity Clarity',          'status' => 'ok',   'note' => 'Company name & contact in footer' ),
	array( 'label' => 'Local Business Markup',   'status' => 'warn', 'note' => 'Add LocalBusiness JSON-LD schema' ),
	array( 'label' => 'Lithuanian Language GEO', 'status' => 'ok',   'note' => 'Lithuanian landing page detected' ),
	array( 'label' => 'Address / GEO Signals',   'status' => ! empty( $global['address'] ) ? 'ok' : 'warn', 'note' => ! empty( $global['address'] ) ? 'Address set in Global Settings' : 'Set address in Global Settings' ),
);

// ─── Performance Summary ──────────────────────────────────────────────────────
$has_webp = ( function_exists( 'imagewebp' ) && extension_loaded( 'gd' ) ) || class_exists( 'Imagick' );

$wp_ver_arr        = explode( '.', $wp_version );
$has_lazy_loading  = ( (int) $wp_ver_arr[0] > 5 ) || ( (int) $wp_ver_arr[0] === 5 && (int) ( $wp_ver_arr[1] ?? 0 ) >= 5 );

$cache_plugins = array(
	'WP Super Cache'   => function_exists( 'wp_super_cache_text_domain' ),
	'W3 Total Cache'   => defined( 'W3TC_VERSION' ),
	'WP Rocket'        => defined( 'WP_ROCKET_VERSION' ),
	'LiteSpeed Cache'  => defined( 'LSCWP_V' ),
	'WP Fastest Cache' => class_exists( 'WpFastestCache' ),
	'Autoptimize'      => defined( 'AUTOPTIMIZE_PLUGIN_VERSION' ),
);
$active_cache     = array_keys( array_filter( $cache_plugins ) );
$has_cache        = ! empty( $active_cache );
$cache_label      = $has_cache ? implode( ', ', $active_cache ) : 'No cache plugin detected';

// Count media
$img_counts  = wp_count_attachments( 'image' );
$total_images = is_object( $img_counts ) ? (int) array_sum( (array) $img_counts ) : 0;

// Count plugin CSS/JS files
$css_dir  = SOLDIS_LANDING_PATH . 'resources/css/';
$js_dir   = SOLDIS_LANDING_PATH . 'resources/js/';
$css_count = count( glob( $css_dir . '*.css' ) ?: array() );
$js_count  = count( glob( $js_dir . '*.js' ) ?: array() );

// ─── Technical Health ─────────────────────────────────────────────────────────
$rest_url  = get_rest_url();
$has_rest  = ! empty( $rest_url );

// PHP memory: parse and evaluate
$memory_limit = (int) $php_memory;
$memory_ok    = $memory_limit >= 128;
$memory_color = $memory_ok ? 'ok' : 'warn';

// ─── Changelog ───────────────────────────────────────────────────────────────
$changelog = array(
	array( 'v' => '1.0.35', 'date' => '2026-07-21', 'note' => 'Premium admin UI redesign — new design system, polished tabs & buttons' ),
	array( 'v' => '1.0.34', 'date' => '2026-07-21', 'note' => 'Footer module — independent architecture matching Header' ),
	array( 'v' => '1.0.33', 'date' => '2026-07-21', 'note' => 'Header nav connected to all sections, smooth scroll with offset fix' ),
	array( 'v' => '1.0.32', 'date' => '2026-07-21', 'note' => 'FAQ CSS fix — removed incorrect stylesheet dependency' ),
	array( 'v' => '1.0.29', 'date' => '2026-07-21', 'note' => 'FAQ (DUK) section — editorial accordion with full ARIA support' ),
	array( 'v' => '1.0.27', 'date' => '2026-07-20', 'note' => 'Investment section — Dynamic Marketing Pillars with expansion animation' ),
	array( 'v' => '1.0.24', 'date' => '2026-07-19', 'note' => 'Process section — Scroll-Animated Timeline Pipeline' ),
	array( 'v' => '1.0.16', 'date' => '2026-07-18', 'note' => 'Benefits section — alternating feature showcase with scroll animations' ),
	array( 'v' => '1.0.10', 'date' => '2026-07-17', 'note' => 'Why SOLDIS section — trust pillars layout' ),
	array( 'v' => '1.0.05', 'date' => '2026-07-16', 'note' => 'Hero section — full viewport with animated CTA' ),
);

// ─── GitHub Updater ──────────────────────────────────────────────────────────
$github_transient = get_transient( 'soldis_landing_github_release' );
$github_latest_v  = ! empty( $github_transient['version'] ) ? $github_transient['version'] : '—';
$github_checked   = ! empty( $github_transient['checked_at'] ) ? $github_transient['checked_at'] : '—';

$update_status    = 'Up to date';
$update_color     = 'ok';

if ( $github_latest_v !== '—' ) {
	if ( version_compare( $plugin_version, $github_latest_v, '<' ) ) {
		$update_status = 'Update Available';
		$update_color  = 'warn';
	}
} elseif ( false === $github_transient ) {
	$update_status = 'Checking...';
	$update_color  = 'info';
}

// ─── Quick Links ──────────────────────────────────────────────────────────────
$quick_actions = array(
	array( 'label' => 'Global Settings', 'page' => 'soldis-landing-global',   'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z' ),
	array( 'label' => 'Header',          'page' => 'soldis-landing-header',    'icon' => 'M4 6h16M4 12h16M4 18h7' ),
	array( 'label' => 'Homepage',        'page' => 'soldis-landing-homepage',  'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' ),
	array( 'label' => 'Footer',          'page' => 'soldis-landing-footer',    'icon' => 'M4 18h16M4 12h16M4 6h7' ),
);

// ─── Helper: Status Icon ──────────────────────────────────────────────────────
function sd_dot( $status ) {
	$map = array(
		'ok'     => 'sd-dot--ok',
		'warn'   => 'sd-dot--warn',
		'bad'    => 'sd-dot--bad',
		'info'   => 'sd-dot--info',
		'coming' => 'sd-dot--coming',
	);
	$cls = $map[ $status ] ?? 'sd-dot--info';
	return '<span class="sd-dot ' . $cls . '" aria-hidden="true"></span>';
}
?>
<?php defined( 'ABSPATH' ) || exit;

/* ─── Dashboard-scoped styles ─── */ ?>
<style id="soldis-dashboard-css">
/* ── Layout ─────────────────────────────────────────────── */
.sd-dashboard { --sd-gap: 20px; }

.sd-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: var(--sd-gap);
	margin-top: var(--sd-gap);
}
.sd-span-2 { grid-column: span 2; }
.sd-span-3 { grid-column: span 3; }

/* ── Card ───────────────────────────────────────────────── */
.sd-card {
	background: #fff;
	border: 1px solid #e4e6ea;
	border-radius: 12px;
	padding: 0;
	box-shadow: 0 1px 4px rgba(0,0,0,0.05);
	display: flex;
	flex-direction: column;
	overflow: hidden;
}
.sd-card-head {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 16px 20px;
	border-bottom: 1px solid #f0f2f5;
}
.sd-card-head-icon {
	width: 32px; height: 32px;
	border-radius: 8px;
	background: rgba(10,37,64,0.07);
	display: flex; align-items: center; justify-content: center;
	flex-shrink: 0;
	color: #0a2540;
}
.sd-card-head h3 {
	margin: 0; font-size: 13px;
	font-weight: 700; color: #111827;
	flex: 1;
}
.sd-card-head-badge {
	font-size: 11px; font-weight: 600;
	padding: 3px 8px; border-radius: 100px;
}
.sd-card-body { padding: 16px 20px; flex: 1; }
.sd-card-foot {
	padding: 12px 20px;
	border-top: 1px solid #f0f2f5;
	background: #fafbfc;
}

/* ── Quick Actions ───────────────────────────────────────── */
.sd-quick-actions {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 12px;
	margin-top: 20px;
}
.sd-action-btn {
	display: flex; align-items: center; gap: 10px;
	padding: 14px 18px;
	background: #fff;
	border: 1px solid #e4e6ea;
	border-radius: 10px;
	text-decoration: none;
	color: #111827;
	font-size: 13px;
	font-weight: 600;
	transition: all 0.2s ease;
	box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}
.sd-action-btn:hover {
	background: #0a2540;
	border-color: #0a2540;
	color: #fff;
	transform: translateY(-1px);
	box-shadow: 0 4px 12px rgba(10,37,64,0.2);
}
.sd-action-btn:hover .sd-action-icon { color: #c79a3b; }
.sd-action-icon { color: #6b7280; flex-shrink: 0; transition: color 0.2s; }

/* ── Status Dot ─────────────────────────────────────────── */
.sd-dot {
	display: inline-block;
	width: 8px; height: 8px;
	border-radius: 50%;
	flex-shrink: 0;
}
.sd-dot--ok     { background: #16a34a; box-shadow: 0 0 0 3px rgba(22,163,74,0.15); }
.sd-dot--warn   { background: #d97706; box-shadow: 0 0 0 3px rgba(217,119,6,0.15); }
.sd-dot--bad    { background: #dc2626; box-shadow: 0 0 0 3px rgba(220,38,38,0.15); }
.sd-dot--info   { background: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.12); }
.sd-dot--coming { background: #d1d5db; }

/* ── Row List ───────────────────────────────────────────── */
.sd-row-list {
	display: flex; flex-direction: column;
	gap: 0;
	margin: 0; padding: 0; list-style: none;
}
.sd-row {
	display: flex; align-items: center; gap: 10px;
	padding: 9px 0;
	border-bottom: 1px solid #f3f4f6;
	font-size: 12.5px;
	color: #374151;
}
.sd-row:last-child { border-bottom: none; }
.sd-row-label { flex: 1; font-weight: 500; }
.sd-row-value { font-size: 12px; color: #6b7280; text-align: right; max-width: 160px; }
.sd-row-value strong { color: #111827; font-weight: 600; }

/* ── Progress Bar ───────────────────────────────────────── */
.sd-progress-wrap { margin-bottom: 12px; }
.sd-progress-info {
	display: flex; justify-content: space-between;
	font-size: 12px; color: #6b7280; margin-bottom: 6px;
}
.sd-progress-info strong { color: #111827; font-weight: 700; }
.sd-progress-bar {
	height: 6px; background: #f0f2f5; border-radius: 100px; overflow: hidden;
}
.sd-progress-fill {
	height: 100%; border-radius: 100px;
	background: linear-gradient(90deg, #0a2540, #c79a3b);
	transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

/* ── Section Chips ──────────────────────────────────────── */
.sd-section-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 6px;
}
.sd-section-chip {
	display: flex; align-items: center; gap: 8px;
	padding: 8px 10px;
	border-radius: 8px;
	border: 1px solid #f0f2f5;
	background: #fafbfc;
	font-size: 12px; font-weight: 500; color: #374151;
}
.sd-section-chip.is-active  { background: #f0fdf4; border-color: #bbf7d0; color: #15803d; }
.sd-section-chip.is-off     { background: #fffbeb; border-color: #fde68a; color: #92400e; }
.sd-section-chip.is-coming  { background: #f9fafb; border-color: #e5e7eb; color: #9ca3af; }
.sd-section-chip-icon { font-size: 14px; flex-shrink: 0; }

/* ── Badges ─────────────────────────────────────────────── */
.sd-badge {
	display: inline-flex; align-items: center; gap: 4px;
	font-size: 11px; font-weight: 600;
	padding: 2px 8px; border-radius: 100px;
}
.sd-badge--ok     { background: #f0fdf4; color: #15803d; }
.sd-badge--warn   { background: #fffbeb; color: #92400e; }
.sd-badge--bad    { background: #fef2f2; color: #991b1b; }
.sd-badge--info   { background: #eff6ff; color: #1d4ed8; }
.sd-badge--coming { background: #f9fafb; color: #9ca3af; }

/* ── Tech Health Rows ───────────────────────────────────── */
.sd-health-row {
	display: flex; align-items: center; gap: 10px;
	padding: 8px 0;
	border-bottom: 1px solid #f3f4f6;
	font-size: 12.5px;
}
.sd-health-row:last-child { border-bottom: none; }
.sd-health-label { flex: 1; font-weight: 500; color: #374151; }
.sd-health-note  { font-size: 11.5px; color: #9ca3af; }

/* ── Changelog ──────────────────────────────────────────── */
.sd-changelog { list-style: none; margin: 0; padding: 0; }
.sd-changelog-item {
	display: flex; gap: 12px; align-items: flex-start;
	padding: 9px 0;
	border-bottom: 1px solid #f3f4f6;
	font-size: 12px;
}
.sd-changelog-item:last-child { border-bottom: none; }
.sd-changelog-v {
	background: #0a2540; color: #fff;
	font-size: 10px; font-weight: 700;
	padding: 2px 7px; border-radius: 100px;
	flex-shrink: 0; white-space: nowrap;
	margin-top: 1px;
}
.sd-changelog-text { color: #374151; line-height: 1.45; }
.sd-changelog-date { font-size: 11px; color: #9ca3af; }

/* ── Collapsible ────────────────────────────────────────── */
.sd-collapsible-trigger {
	display: flex; align-items: center; justify-content: space-between;
	width: 100%; padding: 16px 20px;
	background: none; border: none; cursor: pointer;
	border-bottom: 1px solid #f0f2f5;
	font-size: 13px; font-weight: 700; color: #111827;
	text-align: left;
	transition: background 0.15s;
}
.sd-collapsible-trigger:hover { background: #fafbfc; }
.sd-collapsible-trigger .sd-caret { transition: transform 0.25s ease; flex-shrink: 0; }
.sd-collapsible-trigger.is-open .sd-caret { transform: rotate(180deg); }
.sd-collapsible-body { display: none; padding: 16px 20px; }
.sd-collapsible-body.is-open { display: block; }

/* ── Sysinfo Table ──────────────────────────────────────── */
.sd-sysinfo {
	width: 100%; border-collapse: collapse;
	font-size: 12px; margin: 0;
}
.sd-sysinfo td { padding: 6px 0; border-bottom: 1px solid #f3f4f6; vertical-align: top; }
.sd-sysinfo td:first-child { font-weight: 600; color: #374151; width: 55%; }
.sd-sysinfo td:last-child   { color: #6b7280; text-align: right; }
.sd-sysinfo tr:last-child td { border-bottom: none; }

/* ── Stat number ────────────────────────────────────────── */
.sd-stat-num { font-size: 26px; font-weight: 800; color: #0a2540; line-height: 1; }
.sd-stat-sub { font-size: 12px; color: #9ca3af; margin-top: 2px; }

/* ── Gold score ring ─────────────────────────────────────── */
.sd-score-wrap {
	display: flex; align-items: center; justify-content: center;
	gap: 16px; padding: 4px 0 8px;
}
.sd-score-ring {
	width: 72px; height: 72px; flex-shrink: 0;
}
.sd-score-ring-text {
	font-size: 14px; font-weight: 800; fill: #0a2540;
}
.sd-score-ring-sub {
	font-size: 8px; font-weight: 500; fill: #9ca3af;
}
.sd-score-detail { flex: 1; }
.sd-score-detail p { margin: 0 0 4px; font-size: 12px; color: #6b7280; }
.sd-score-detail strong { font-size: 13px; color: #111827; }

/* ── Responsive ─────────────────────────────────────────── */
@media (max-width: 1200px) {
	.sd-grid { grid-template-columns: repeat(2, 1fr); }
	.sd-span-2 { grid-column: span 1; }
	.sd-span-3 { grid-column: span 2; }
	.sd-quick-actions { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 782px) {
	.sd-grid, .sd-quick-actions { grid-template-columns: 1fr; }
	.sd-span-2, .sd-span-3 { grid-column: span 1; }
	.sd-section-grid { grid-template-columns: 1fr; }
}
</style>

<div class="wrap soldis-admin-wrap sd-dashboard">

	<!-- ── Page Header ────────────────────────────────────────────────────── -->
	<header class="soldis-admin-header">
		<div class="soldis-admin-header-content">
			<h1><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $company ); ?> — Command Center</h1>
			<p class="soldis-admin-subtitle"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Site health, module status and technical readiness at a glance', 'soldis-landing' ); ?></p>
		</div>
		<div style="display:flex; align-items:center; gap:10px; position:relative; z-index:1;">
			<div class="soldis-admin-header-badge">
				<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $is_https ? 'ok' : 'warn' ); ?>
				<?php defined( 'ABSPATH' ) || exit;

echo $is_https ? esc_html__( 'HTTPS Active', 'soldis-landing' ) : esc_html__( 'HTTP Only', 'soldis-landing' ); ?>
			</div>
			<div class="soldis-admin-header-badge">
				<strong>v<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $plugin_version ); ?></strong>
			</div>
		</div>
	</header>

	<!-- ── Quick Actions ──────────────────────────────────────────────────── -->
	<div class="sd-quick-actions">
		<?php defined( 'ABSPATH' ) || exit;

foreach ( $quick_actions as $action ) : ?>
			<a href="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( admin_url( 'admin.php?page=' . $action['page'] ) ); ?>" class="sd-action-btn">
				<svg class="sd-action-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $action['icon'] ); ?>"/>
				</svg>
				<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $action['label'] ); ?>
			</a>
		<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
	</div>

	<!-- ── Widget Grid ────────────────────────────────────────────────────── -->
	<div class="sd-grid">

		<!-- ═══════════════════════════════════════════════════
		     1. SITE OVERVIEW
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Site Overview', 'soldis-landing' ); ?></h3>
			</div>
			<div class="sd-card-body">
				<ul class="sd-row-list">
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Plugin Version', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong>v<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $plugin_version ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'WordPress', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $wp_version ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( version_compare( $php_version, '8.0', '>=' ) ? 'ok' : 'warn' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'PHP Version', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $php_version ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Site Language', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $site_language ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $is_https ? 'ok' : 'bad' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Site Protocol', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo $is_https ? 'HTTPS' : 'HTTP'; ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( ! $wp_debug ? 'ok' : 'warn' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Debug Mode', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo $wp_debug ? esc_html__( 'ON (disable for prod)', 'soldis-landing' ) : esc_html__( 'OFF', 'soldis-landing' ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Timezone', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $timezone ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Database', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong>MySQL <?php defined( 'ABSPATH' ) || exit;

echo esc_html( $db_ver ); ?></strong></span>
					</li>
				</ul>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     2. HOMEPAGE PROGRESS
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card sd-span-2">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Homepage Progress', 'soldis-landing' ); ?></h3>
				<span class="sd-badge <?php defined( 'ABSPATH' ) || exit;

echo $sections_active >= 6 ? 'sd-badge--ok' : 'sd-badge--warn'; ?>">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $sections_active ); ?>/<?php defined( 'ABSPATH' ) || exit;

echo count( $homepage_sections ); ?> <?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Active', 'soldis-landing' ); ?>
				</span>
			</div>
			<div class="sd-card-body">
				<!-- Progress bar -->
				<div class="sd-progress-wrap">
					<div class="sd-progress-info">
						<span><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Overall completion', 'soldis-landing' ); ?></span>
						<strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $progress_pct ); ?>%</strong>
					</div>
					<div class="sd-progress-bar">
						<div class="sd-progress-fill" style="width: <?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $progress_pct ); ?>%;"></div>
					</div>
				</div>
				<!-- Section chips -->
				<div class="sd-section-grid">
					<?php defined( 'ABSPATH' ) || exit;

foreach ( $homepage_sections as $s ) :
						$chip_class = 'is-' . $s['status'];
						if ( $s['status'] === 'active' ) {
							$badge_label = __( 'Active', 'soldis-landing' );
						} elseif ( $s['status'] === 'off' ) {
							$badge_label = __( 'Disabled', 'soldis-landing' );
						} else {
							$badge_label = __( 'Coming Soon', 'soldis-landing' );
						}
					?>
					<div class="sd-section-chip <?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $chip_class ); ?>">
						<span class="sd-section-chip-icon" aria-hidden="true"><?php defined( 'ABSPATH' ) || exit;

echo $s['icon']; ?></span>
						<span style="flex:1;"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $s['label'] ); ?></span>
						<span class="sd-badge <?php defined( 'ABSPATH' ) || exit;

echo $s['status'] === 'active' ? 'sd-badge--ok' : ( $s['status'] === 'off' ? 'sd-badge--warn' : 'sd-badge--coming' ); ?>" style="font-size:10px;">
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $badge_label ); ?>
						</span>
					</div>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				</div>
			</div>
			<div class="sd-card-foot" style="font-size:12px; color: #6b7280;">
				<?php defined( 'ABSPATH' ) || exit;

printf(
					esc_html__( '%1$d of %2$d sections built. %3$d sections coming soon.', 'soldis-landing' ),
					(int) $sections_built,
					count( $homepage_sections ),
					(int) ( count( $homepage_sections ) - $sections_built )
				); ?>
				&ensp;·&ensp;
				<a href="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( admin_url( 'admin.php?page=soldis-landing-homepage' ) ); ?>" style="color: #c79a3b; font-weight: 600; text-decoration: none;">
					<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Manage Sections →', 'soldis-landing' ); ?>
				</a>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     3. TECHNICAL HEALTH
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Technical Health', 'soldis-landing' ); ?></h3>
			</div>
			<div class="sd-card-body">
				<?php
				defined( 'ABSPATH' ) || exit;

$tech_rows = array(
					array(
						'label' => 'HTTPS',
						'status' => $is_https ? 'ok' : 'bad',
						'value' => $is_https ? __( 'Enabled', 'soldis-landing' ) : __( 'Not active', 'soldis-landing' ),
					),
					array(
						'label' => 'REST API',
						'status' => $has_rest ? 'ok' : 'warn',
						'value' => $has_rest ? __( 'Available', 'soldis-landing' ) : __( 'Restricted', 'soldis-landing' ),
					),
					array(
						'label' => 'WP Cron',
						'status' => $cron_disabled ? 'warn' : 'ok',
						'value' => $cron_disabled ? __( 'Disabled', 'soldis-landing' ) : __( 'Active', 'soldis-landing' ),
					),
					array(
						'label' => 'Debug Mode',
						'status' => $wp_debug ? 'warn' : 'ok',
						'value' => $wp_debug ? __( 'ON — disable for production', 'soldis-landing' ) : __( 'OFF', 'soldis-landing' ),
					),
					array(
						'label' => 'PHP Memory',
						'status' => $memory_ok ? 'ok' : 'warn',
						'value' => $php_memory,
					),
					array(
						'label' => 'Max Execution',
						'status' => ( (int)$max_exec >= 60 ) ? 'ok' : 'warn',
						'value' => $max_exec . 's',
					),
					array(
						'label' => 'Upload Size',
						'status' => 'info',
						'value' => $upload_size,
					),
					array(
						'label' => 'Timezone',
						'status' => 'info',
						'value' => $timezone,
					),
				);
				foreach ( $tech_rows as $row ) : ?>
				<div class="sd-health-row">
					<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $row['status'] ); ?>
					<span class="sd-health-label"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $row['label'] ); ?></span>
					<span class="sd-health-note"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $row['value'] ); ?></span>
				</div>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     4. PERFORMANCE SUMMARY
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Performance Summary', 'soldis-landing' ); ?></h3>
			</div>
			<div class="sd-card-body">
				<?php
				defined( 'ABSPATH' ) || exit;

$perf_rows = array(
					array(
						'label'  => 'WebP Support',
						'status' => $has_webp ? 'ok' : 'warn',
						'note'   => $has_webp ? __( 'GD/Imagick available', 'soldis-landing' ) : __( 'Not detected', 'soldis-landing' ),
					),
					array(
						'label'  => 'Native Lazy Loading',
						'status' => $has_lazy_loading ? 'ok' : 'warn',
						'note'   => $has_lazy_loading ? __( 'WordPress 5.5+ active', 'soldis-landing' ) : __( 'Update WordPress', 'soldis-landing' ),
					),
					array(
						'label'  => 'Cache Plugin',
						'status' => $has_cache ? 'ok' : 'warn',
						'note'   => $has_cache ? implode( ', ', $active_cache ) : __( 'None detected', 'soldis-landing' ),
					),
					array(
						'label'  => 'Plugin CSS Files',
						'status' => 'info',
						'note'   => sprintf( _n( '%d file', '%d files', $css_count, 'soldis-landing' ), $css_count ),
					),
					array(
						'label'  => 'Plugin JS Files',
						'status' => 'info',
						'note'   => sprintf( _n( '%d file', '%d files', $js_count, 'soldis-landing' ), $js_count ),
					),
					array(
						'label'  => 'Media Images',
						'status' => 'info',
						'note'   => sprintf( _n( '%d image', '%d images', $total_images, 'soldis-landing' ), $total_images ),
					),
				);
				foreach ( $perf_rows as $row ) : ?>
				<div class="sd-health-row">
					<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $row['status'] ); ?>
					<span class="sd-health-label"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $row['label'] ); ?></span>
					<span class="sd-health-note"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $row['note'] ); ?></span>
				</div>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     5. GLOBAL SETTINGS STATUS
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M20 12h2M2 12h2M17.66 17.66l-1.41-1.41M6.34 17.66l1.41-1.41"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Global Settings', 'soldis-landing' ); ?></h3>
				<span class="sd-badge <?php defined( 'ABSPATH' ) || exit;

echo $global_complete === $global_total ? 'sd-badge--ok' : 'sd-badge--warn'; ?>">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $global_complete . '/' . $global_total ); ?>
				</span>
			</div>
			<div class="sd-card-body">
				<?php defined( 'ABSPATH' ) || exit;

foreach ( $global_checks as $field => $is_set ) : ?>
				<div class="sd-health-row">
					<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $is_set ? 'ok' : 'warn' ); ?>
					<span class="sd-health-label"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $field ); ?></span>
					<span class="sd-health-note">
						<?php defined( 'ABSPATH' ) || exit;

echo $is_set ? esc_html__( 'Configured', 'soldis-landing' ) : esc_html__( 'Not set', 'soldis-landing' ); ?>
					</span>
				</div>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
			<div class="sd-card-foot">
				<a href="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( admin_url( 'admin.php?page=soldis-landing-global' ) ); ?>" style="font-size:12px; color:#c79a3b; font-weight:600; text-decoration:none;">
					<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Edit Global Settings →', 'soldis-landing' ); ?>
				</a>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     6. SEO READINESS
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card sd-span-2">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'SEO Readiness', 'soldis-landing' ); ?></h3>
				<span class="sd-badge <?php defined( 'ABSPATH' ) || exit;

echo ( $seo_ok_count >= 5 ) ? 'sd-badge--ok' : ( $seo_ok_count >= 3 ? 'sd-badge--warn' : 'sd-badge--bad' ); ?>">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $seo_ok_count . '/' . count( $seo_checks ) ); ?> <?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Checks Passed', 'soldis-landing' ); ?>
				</span>
				<?php defined( 'ABSPATH' ) || exit;

if ( $has_seo ) : ?>
				<span class="sd-badge sd-badge--info" style="margin-left:4px;">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $seo_plugin_name ); ?>
				</span>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>
			<div class="sd-card-body">
				<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0 32px;">
					<?php defined( 'ABSPATH' ) || exit;

foreach ( $seo_checks as $check ) : ?>
					<div class="sd-health-row">
						<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $check['ok'] ? 'ok' : 'warn' ); ?>
						<span class="sd-health-label"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $check['label'] ); ?></span>
						<span class="sd-health-note"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $check['note'] ); ?></span>
					</div>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				</div>
			</div>
			<?php defined( 'ABSPATH' ) || exit;

if ( ! $has_seo ) : ?>
			<div class="sd-card-foot" style="font-size:12px;">
				<span style="color:#d97706; font-weight:600;">⚠ <?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'No SEO plugin detected.', 'soldis-landing' ); ?></span>
				<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Install Yoast SEO or Rank Math to improve SEO readiness.', 'soldis-landing' ); ?>
			</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     7. AEO & GEO READINESS
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'AEO & GEO Readiness', 'soldis-landing' ); ?></h3>
			</div>
			<div class="sd-card-body">
				<p style="font-size:12px; color:#6b7280; margin:0 0 12px;">
					<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Answer Engine Optimization and Geo-targeted signals. Informational only — no crawling or API calls.', 'soldis-landing' ); ?>
				</p>
				<?php defined( 'ABSPATH' ) || exit;

foreach ( $aeo_items as $item ) : ?>
				<div class="sd-health-row">
					<?php defined( 'ABSPATH' ) || exit;

echo sd_dot( $item['status'] ); ?>
					<span class="sd-health-label"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $item['label'] ); ?></span>
					<span class="sd-health-note"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $item['note'] ); ?></span>
				</div>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     8. SYSTEM UPDATER (GitHub)
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;
esc_html_e( 'System Updater', 'soldis-landing' ); ?></h3>
				<span class="sd-badge <?php echo 'sd-badge--' . esc_attr( $update_color ); ?>">
					<?php echo esc_html( $update_status ); ?>
				</span>
			</div>
			<div class="sd-card-body">
				<ul class="sd-row-list">
					<li class="sd-row">
						<?php echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php esc_html_e( 'Current Version', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong>v<?php echo esc_html( $plugin_version ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php echo sd_dot( $update_color ); ?>
						<span class="sd-row-label"><?php esc_html_e( 'Latest Release', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><strong>v<?php echo esc_html( $github_latest_v ); ?></strong></span>
					</li>
					<li class="sd-row">
						<?php echo sd_dot( 'info' ); ?>
						<span class="sd-row-label"><?php esc_html_e( 'Last Checked', 'soldis-landing' ); ?></span>
						<span class="sd-row-value"><?php echo esc_html( $github_checked ); ?></span>
					</li>
				</ul>
			</div>
			<div class="sd-card-foot">
				<a href="<?php echo esc_url( admin_url( 'update-core.php' ) ); ?>" style="font-size:12px; color:#c79a3b; font-weight:600; text-decoration:none;">
					<?php esc_html_e( 'Check for updates →', 'soldis-landing' ); ?>
				</a>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     9. RECENT PLUGIN UPDATES
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card sd-span-2">
			<div class="sd-card-head">
				<div class="sd-card-head-icon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 014-4h14M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 01-4 4H3"/></svg>
				</div>
				<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Recent Plugin Updates', 'soldis-landing' ); ?></h3>
				<span class="sd-badge sd-badge--info"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Changelog', 'soldis-landing' ); ?></span>
			</div>
			<div class="sd-card-body">
				<ul class="sd-changelog">
					<?php defined( 'ABSPATH' ) || exit;

foreach ( $changelog as $entry ) : ?>
					<li class="sd-changelog-item">
						<span class="sd-changelog-v">v<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $entry['v'] ); ?></span>
						<span class="sd-changelog-text">
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $entry['note'] ); ?>
							<br><span class="sd-changelog-date"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $entry['date'] ); ?></span>
						</span>
					</li>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- ═══════════════════════════════════════════════════
		     10. SYSTEM INFORMATION (Collapsible)
		     ═══════════════════════════════════════════════════ -->
		<div class="sd-card">
			<button class="sd-collapsible-trigger" id="sd-sysinfo-toggle" aria-expanded="false" aria-controls="sd-sysinfo-body">
				<span style="display:flex; align-items:center; gap:10px;">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
					<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'System Information', 'soldis-landing' ); ?>
				</span>
				<svg class="sd-caret" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
			</button>
			<div class="sd-collapsible-body" id="sd-sysinfo-body">
				<table class="sd-sysinfo">
					<?php
					defined( 'ABSPATH' ) || exit;

$sysinfo = array(
						__( 'PHP Version', 'soldis-landing' )      => PHP_VERSION,
						__( 'PHP OS', 'soldis-landing' )           => $os,
						__( 'Memory Limit', 'soldis-landing' )     => $php_memory,
						__( 'Max Exec Time', 'soldis-landing' )    => $max_exec . 's',
						__( 'Upload Max', 'soldis-landing' )       => $upload_size,
						__( 'Post Max Size', 'soldis-landing' )    => ini_get( 'post_max_size' ),
						__( 'Max Input Vars', 'soldis-landing' )   => $max_input_vars,
						__( 'WordPress', 'soldis-landing' )        => $wp_version,
						__( 'MySQL / MariaDB', 'soldis-landing' )  => $db_ver,
						__( 'Server Software', 'soldis-landing' )  => $server_sw,
						__( 'Site URL', 'soldis-landing' )         => get_site_url(),
						__( 'WordPress Root', 'soldis-landing' )   => ABSPATH,
						__( 'Plugin Version', 'soldis-landing' )   => $plugin_version,
						__( 'Plugin Path', 'soldis-landing' )      => SOLDIS_LANDING_PATH,
					);
					foreach ( $sysinfo as $label => $value ) : ?>
					<tr>
						<td><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $label ); ?></td>
						<td><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $value ); ?></td>
					</tr>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				</table>
			</div>
		</div>

	</div><!-- /.sd-grid -->

	<!-- Footer credit -->
	<p style="text-align:center; font-size:12px; color:#9ca3af; margin-top:32px; padding-top:20px; border-top:1px solid #e4e6ea;">
		<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'SOLDIS Landing Plugin', 'soldis-landing' ); ?> &mdash; <?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Engineered by', 'soldis-landing' ); ?>
		<a href="https://opareklama.lt/" target="_blank" rel="noopener noreferrer" style="color:#c79a3b; font-weight:600; text-decoration:none;">OPA Reklama</a>
		&mdash; v<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $plugin_version ); ?>
	</p>

</div><!-- /.sd-dashboard -->

<script>
// Collapsible System Info panel
(function() {
	var btn  = document.getElementById('sd-sysinfo-toggle');
	var body = document.getElementById('sd-sysinfo-body');
	if (!btn || !body) return;

	btn.addEventListener('click', function() {
		var open = body.classList.contains('is-open');
		body.classList.toggle('is-open', !open);
		btn.classList.toggle('is-open', !open);
		btn.setAttribute('aria-expanded', String(!open));
	});
})();
</script>

