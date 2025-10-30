<?php
/**
 * Theme Name: Lottie Performance Test
 * Description: Tipalti Finance AI replica with 4 Lottie integration strategies for performance testing
 * Version: 1.0.0
 * Author: Performance Test Team
 * Text Domain: lottie-perf-test
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function lottie_perf_test_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'lottie_perf_test_setup');

// CDN Configuration for Static Assets (GTmetrix optimization)
// Set this constant in wp-config.php: define('LPT_CDN_URL', 'https://cdn.yourdomain.com');
// Or use filter: add_filter('lottie_perf_test_cdn_url', function() { return 'https://cdn.yourdomain.com'; });
function lottie_perf_test_get_cdn_url() {
    // Check for constant first
    if (defined('LPT_CDN_URL')) {
        $cdn_constant = constant('LPT_CDN_URL');
        if (!empty($cdn_constant)) {
            return rtrim($cdn_constant, '/');
        }
    }
    
    // Check for filter
    $cdn_url = apply_filters('lottie_perf_test_cdn_url', '');
    if (!empty($cdn_url)) {
        return rtrim($cdn_url, '/');
    }
    
    return false;
}

// Replace asset URLs with CDN URLs when CDN is configured
function lottie_perf_test_cdn_asset_url($url) {
    $cdn_url = lottie_perf_test_get_cdn_url();
    if (!$cdn_url) {
        return $url;
    }
    
    // Only replace URLs from this theme's assets
    $theme_uri = get_template_directory_uri();
    if (strpos($url, $theme_uri) === 0) {
        // Replace theme URL with CDN URL
        $url = str_replace($theme_uri, $cdn_url . '/wp-content/themes/' . get_template(), $url);
    }
    
    return $url;
}
add_filter('style_loader_src', 'lottie_perf_test_cdn_asset_url', 10, 1);
add_filter('script_loader_src', 'lottie_perf_test_cdn_asset_url', 10, 1);
add_filter('theme_file_uri', 'lottie_perf_test_cdn_asset_url', 10, 1);

// 7-Step Lottie Performance Optimization Scripts
function lottie_perf_test_scripts() {
    // Get current page template
    $template = get_page_template_slug();
    
    // Define all Lottie test page templates
    $lottie_templates = array(
        'page-local-test.php',
        'page-canvas-mode-test.php', 
        'page-defer-test.php',
        'page-lazy-test.php',
        'page-cache-test.php',
        'page-conditional-test.php',
        'page-poster-test.php',
        'page-home.php'
    );
    
    if (in_array($template, $lottie_templates)) {
        add_action('wp_head', function() {
            $base_uri = get_template_directory_uri() . '/assets/js/';
            $script   = 'lottie-minimal.js';
            $versioned_src = esc_url($base_uri . $script . '?ver=1.0.0');

            // Preload the JavaScript file so it can be fetched early.
            echo '<link rel="preload" href="' . $versioned_src . '" as="script" crossorigin>';

            $script_src_json = wp_json_encode($versioned_src);

            // Lazy-load the heavy Lottie bundle when it is actually needed.
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var hasLoaded = false;
                    var scriptSrc = ' . $script_src_json . ';

                    function loadLottieScript() {
                        if (hasLoaded) {
                            return;
                        }
                        hasLoaded = true;

                        var existing = document.querySelector("script[data-lpt-lottie]");
                        if (existing) {
                            return;
                        }

                        var s = document.createElement("script");
                        s.src = scriptSrc;
                        s.async = true;
                        s.crossOrigin = "anonymous";
                        s.setAttribute("data-lpt-lottie", "1");
                        document.head.appendChild(s);
                    }

                    function scheduleIdleLoad() {
                        if (hasLoaded) {
                            return;
                        }
                        if ("requestIdleCallback" in window) {
                            requestIdleCallback(function() {
                                loadLottieScript();
                            }, { timeout: 5000 });
                        } else {
                            setTimeout(loadLottieScript, 3000);
                        }
                    }

                    var players = document.querySelectorAll("dotlottie-player");
                    if (!players.length) {
                        scheduleIdleLoad();
                        return;
                    }

                    if ("IntersectionObserver" in window) {
                        var observer = new IntersectionObserver(function(entries, obs) {
                            entries.forEach(function(entry) {
                                if (entry.isIntersecting) {
                                    loadLottieScript();
                                    obs.disconnect();
                                }
                            });
                        }, { rootMargin: "200px 0px" });

                        players.forEach(function(player) {
                            observer.observe(player);
                        });

                    } else {
                        scheduleIdleLoad();
                    }
                });
            </script>';
        }, 3);
    }
}
add_action('wp_enqueue_scripts', 'lottie_perf_test_scripts');

// PERFORMANCE OPTIMIZED: Deferred CSS Loading for Non-Critical Styles
function page_styles_enqueue() {
    $dist_dir  = get_template_directory() . '/assets/dist/css/';
    $dist_uri  = get_template_directory_uri() . '/assets/dist/css/';
    
    // Debug: Log what files exist on server
    if (current_user_can('administrator') && WP_DEBUG) {
        error_log('CSS Debug - Dist directory exists: ' . (is_dir($dist_dir) ? 'YES' : 'NO'));
        if (is_dir($dist_dir)) {
            $files = scandir($dist_dir);
            error_log('CSS Debug - Files in dist: ' . implode(', ', array_filter($files, function($f) { return strpos($f, '.css') !== false; })));
        }
    }

    // Only load critical CSS inline - everything else is deferred
    // This prevents render-blocking CSS and improves FCP/LCP
    
    // Create fallback CSS if needed
    if (!file_exists($dist_dir . 'main.style.min.css')) {
        lottie_perf_test_create_fallback_css();
    }
}
add_action('wp_enqueue_scripts', 'page_styles_enqueue', 20);

// OPTIMIZED CSS LOADING: Fix critical request chains by combining CSS and parallel loading
// This addresses GTmetrix "Avoid chaining critical requests" issue (8 CSS files in sequence)
function lottie_perf_test_deferred_css_loading() {
    $dist_uri = get_template_directory_uri() . '/assets/dist/css/';
    $dist_dir = get_template_directory() . '/assets/dist/css/';
    
    // Apply CDN URL if configured
    $dist_uri = lottie_perf_test_cdn_asset_url($dist_uri);
    
    // Create combined CSS file for non-critical styles
    lottie_perf_test_combine_css_files();
    
    // Only load main critical CSS file - everything else is deferred/combined
    // This eliminates the 8-file CSS chain
    $critical_css_file = 'main.style.min.css';
    $critical_path = $dist_dir . $critical_css_file;
    
    if (file_exists($critical_path)) {
        $href = esc_url($dist_uri . $critical_css_file);
        // Load critical CSS with high priority, no chaining
        echo '<link rel="stylesheet" href="' . $href . '" media="all" fetchpriority="high" crossorigin="anonymous">';
    }
    
    // Combine all non-critical CSS into one file to avoid chaining
    $combined_file = 'combined.min.css';
    $combined_path = $dist_dir . $combined_file;
    
    if (file_exists($combined_path)) {
        $combined_href = esc_url($dist_uri . $combined_file);
        // Preload combined CSS and load it asynchronously - single request instead of 7 chained requests
        echo '<link rel="preload" href="' . $combined_href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" crossorigin="anonymous">';
        echo '<noscript><link rel="stylesheet" href="' . $combined_href . '"></noscript>';
    } else {
        // Fallback: If combined file doesn't exist, load non-critical CSS in parallel (not chained)
        $non_critical_css = array(
            'style.min.css',
            'mega-menu-style.min.css',
            'accordion-tabsliderview.min.css',
            'footer.min.css',
            'blog-filter-style.min.css',
            'cardRenderer.min.css',
            'carousel.min.css',
            'customer-cards-desktop.min.css',
            'testimonial-card-mobile.min.css',
            'customer-cards-mobile.min.css'
        );
        
        // Preload all non-critical CSS files in parallel (no dependencies/chaining)
        foreach ($non_critical_css as $file) {
            $path = $dist_dir . $file;
            if (!file_exists($path)) {
                continue;
            }
            $href = esc_url($dist_uri . $file);
            // Preload with same priority - browser will fetch in parallel
            echo '<link rel="preload" href="' . $href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" crossorigin="anonymous">';
        }
        
        // Fallback for browsers without JavaScript
        echo '<noscript>';
        foreach ($non_critical_css as $file) {
            if (file_exists($dist_dir . $file)) {
                echo '<link rel="stylesheet" href="' . esc_url($dist_uri . $file) . '">';
            }
        }
        echo '</noscript>';
    }
    
    // Add polyfill for onload event (for older browsers)
    echo '<script>!function(e){"use strict";var t=function(t,n,o){var i,r=e.document,a=r.createElement("link");if(o)i=o;else{var l=(r.body||r.getElementsByTagName("head")[0]).childNodes;i=l[l.length-1]}var d=r.styleSheets;a.rel="stylesheet",a.href=t,a.media="only x",function e(t){if(r.body)return t();setTimeout(function(){e(t)})}(function(){i.parentNode.insertBefore(a,o?i:i.nextSibling)});var f=function(e){for(var t=a.href,n=d.length;n--;)if(d[n].href===t)return e();setTimeout(function(){f(e)})};return a.addEventListener&&a.addEventListener("load",function(){this.media=o||"all"}),a.onloadcssdefined=f,f(function(){a.media!==o&&(a.media=o)}),a};"undefined"!=typeof exports?exports.loadCSS=t:e.loadCSS=t}("undefined"!=typeof global?global:this);</script>';
}
add_action('wp_head', 'lottie_perf_test_deferred_css_loading', 15);

// Trim unused WordPress core assets to prevent extra render-blocking CSS
function lottie_perf_test_trim_core_assets() {
    if (!is_admin()) {
        $styles = array(
            'wp-block-library-theme',
            'global-styles',
            'classic-theme-styles',
            'core-block-supports',
            'dashicons'
        );

        foreach ($styles as $handle) {
            wp_dequeue_style($handle);
            wp_deregister_style($handle);
        }
    }
}
add_action('wp_enqueue_scripts', 'lottie_perf_test_trim_core_assets', 100);

// Add debugging and critical accordion layout fixes
add_action('wp_head', function() {
    // Debug: Check if CSS files are being loaded (only for admins)
    if (current_user_can('administrator')) {
        echo '<!-- CSS Debug: Main CSS loaded: ' . (wp_style_is('lpt-main', 'enqueued') ? 'YES' : 'NO') . ' -->';
        echo '<!-- CSS Debug: Accordion CSS loaded: ' . (wp_style_is('lpt-accordion', 'enqueued') ? 'YES' : 'NO') . ' -->';
        echo '<!-- JS Debug: Lottie script loaded: ' . (wp_script_is('lottie-minimal', 'enqueued') ? 'YES' : 'NO') . ' -->';
        echo '<!-- Server Debug: Dist dir exists: ' . (is_dir(get_template_directory() . '/assets/dist/css/') ? 'YES' : 'NO') . ' -->';
    }
        
    // Add Lottie initialization script
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize all Lottie players
        const lottiePlayers = document.querySelectorAll("dotlottie-player");
        
        lottiePlayers.forEach(function(player, index) {
            
            // Ensure autoplay is enabled
            if (player.hasAttribute("autoplay")) {
                player.setAttribute("autoplay", "true");
            }
            
            // Add event listeners for debugging
            player.addEventListener("ready", function() {
                console.log("Lottie player " + index + " is ready");
            });
            
            player.addEventListener("play", function() {
                console.log("Lottie player " + index + " started playing");
            });
            
            player.addEventListener("error", function(e) {
                console.error("Lottie player " + index + " error:", e);
            });
        });
    });
    </script>';
}, 25);

// Enqueue accordion tab slider JavaScript
function lottie_perf_test_enqueue_accordion_scripts() {
    if (is_page('local-test')) {
        $js_base = get_template_directory_uri() . '/assets/accordion-tab-slider/';
        
        // Enqueue accordion view script
        if (file_exists(get_template_directory() . '/assets/accordion-tab-slider/view.min.js')) {
            wp_enqueue_script('lpt-accordion-view', $js_base . 'view.min.js', array(), '1.0.0', true);
        }
        
        // Enqueue accordion tab slider view script
        if (file_exists(get_template_directory() . '/assets/accordion-tab-slider/AccordionTabSliderView.min.js')) {
            wp_enqueue_script('lpt-accordion-tab-slider', $js_base . 'AccordionTabSliderView.min.js', array('lpt-accordion-view'), '1.0.0', true);
        }
    }
}
add_action('wp_enqueue_scripts', 'lottie_perf_test_enqueue_accordion_scripts', 30);

// Strategy 5: Local Hosting with Long-term Caching
function lottie_perf_test_add_caching_headers() {
    // Only apply to Lottie files and only if we're in a WordPress context
    if (defined('ABSPATH') && isset($_SERVER['REQUEST_URI'])) {
        $request_uri = $_SERVER['REQUEST_URI'];
        
        // Only apply to Lottie files
        if (strpos($request_uri, '.lottie') !== false || 
            strpos($request_uri, 'dotlottie-player-correct.mjs') !== false) {
            
            // Check if file exists before trying to get ETag
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $request_uri;
            if (file_exists($file_path)) {
                // Set long-term caching headers
                header('Cache-Control: public, max-age=31536000, immutable'); // 1 year
                header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
                header('ETag: "' . md5_file($file_path) . '"');
                
                // Enable compression
                if (extension_loaded('zlib') && !ob_get_level()) {
                    ob_start('ob_gzhandler');
                }
            }
        }
    }
}
add_action('init', 'lottie_perf_test_add_caching_headers');

// Handle static file serving to prevent WordPress from processing them
function lottie_perf_test_handle_static_files() {
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_uri = $_SERVER['REQUEST_URI'];
        
        // Check if this is a request for static assets
        if (preg_match('/\.(css|js|mjs|png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot|lottie|dotlottie)$/', $request_uri)) {
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $request_uri;
            
            // If file exists, serve it directly
            if (file_exists($file_path)) {
                // Set proper headers
                $mime_types = array(
                    'css' => 'text/css',
                    'js' => 'application/javascript',
                    'mjs' => 'application/javascript',
                    'png' => 'image/png',
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'svg' => 'image/svg+xml',
                    'woff' => 'font/woff',
                    'woff2' => 'font/woff2',
                    'ttf' => 'font/ttf',
                    'eot' => 'font/eot',
                    'lottie' => 'application/json',
                    'dotlottie' => 'application/json'
                );
                
                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (isset($mime_types[$extension])) {
                    header('Content-Type: ' . $mime_types[$extension]);
                }

                // Prefer serving precompressed variants when available and accepted
                $accept_encoding = isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '';
                $served_compressed = false;
                if (in_array($extension, array('css','js','mjs'))) {
                    header('Vary: Accept-Encoding');
                    if (strpos($accept_encoding, 'br') !== false && file_exists($file_path . '.br')) {
                        header('Content-Encoding: br');
                        header('Cache-Control: public, max-age=31536000, immutable');
                        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
                        readfile($file_path . '.br');
                        $served_compressed = true;
                    } elseif (strpos($accept_encoding, 'gzip') !== false && file_exists($file_path . '.gz')) {
                        header('Content-Encoding: gzip');
                        header('Cache-Control: public, max-age=31536000, immutable');
                        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
                        readfile($file_path . '.gz');
                        $served_compressed = true;
                    }
                }
                if ($served_compressed) {
                    exit;
                }
                
                // Set caching headers
                header('Cache-Control: public, max-age=31536000, immutable');
                header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
                
                // Output file content
                readfile($file_path);
                exit;
            }
        }
    }
}
add_action('init', 'lottie_perf_test_handle_static_files', 1);

// PERFORMANCE OPTIMIZATION: Page Caching to Reduce TTFB (3.0s -> <500ms)
// This addresses GTmetrix "High Initial Server Response Time" issue
function lottie_perf_test_page_cache() {
    // Skip caching for admin, logged-in users, and dynamic requests
    if (is_admin() || is_user_logged_in() || defined('DOING_AJAX') || defined('DOING_CRON')) {
        return;
    }
    
    // Skip caching for POST requests
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }
    
    // Skip caching for query strings (except common ones like utm_source)
    $query_string = $_SERVER['QUERY_STRING'] ?? '';
    if (!empty($query_string) && !preg_match('/^(utm_|ref=|fbclid=|gclid=)/i', $query_string)) {
        return;
    }
    
    // Create cache key based on request URI
    $cache_key = 'lpt_page_cache_' . md5($_SERVER['REQUEST_URI'] . (is_ssl() ? '_ssl' : ''));
    
    // Try to get cached page
    $cached_page = get_transient($cache_key);
    
    if ($cached_page !== false) {
        // Serve cached page with proper headers
        header('X-Cache: HIT');
        header('Cache-Control: public, max-age=3600');
        header('Vary: Accept-Encoding');
        
        // Add compression if available
        if (extension_loaded('zlib') && !ob_get_level()) {
            ob_start('ob_gzhandler');
        }
        
        echo $cached_page;
        exit;
    }
    
    // Start output buffering to capture page content
    ob_start(function($buffer) use ($cache_key) {
        // Only cache successful responses
        if (http_response_code() === 200 && !headers_sent()) {
            // Cache for 1 hour (3600 seconds)
            set_transient($cache_key, $buffer, 3600);
        }
        return $buffer;
    });
}
add_action('template_redirect', 'lottie_perf_test_page_cache', 1);

// Clear page cache on post/page updates
function lottie_perf_test_clear_page_cache($post_id) {
    // Clear all page cache transients
    global $wpdb;
    $wpdb->query(
        "DELETE FROM {$wpdb->options} 
         WHERE option_name LIKE '_transient_lpt_page_cache_%' 
         OR option_name LIKE '_transient_timeout_lpt_page_cache_%'"
    );
}
add_action('save_post', 'lottie_perf_test_clear_page_cache');
add_action('edit_post', 'lottie_perf_test_clear_page_cache');
add_action('delete_post', 'lottie_perf_test_clear_page_cache');

// PERFORMANCE OPTIMIZATION: Compression and caching headers
function lottie_perf_test_performance_optimizations() {
    // Only add performance optimizations if we're not serving static files
    if (!isset($_SERVER['REQUEST_URI']) || 
        (strpos($_SERVER['REQUEST_URI'], '.css') === false && 
         strpos($_SERVER['REQUEST_URI'], '.js') === false && 
         strpos($_SERVER['REQUEST_URI'], '.mjs') === false)) {
        
        // Add compression headers for HTML pages
        if (!headers_sent()) {
            header('Vary: Accept-Encoding');
            header('Cache-Control: public, max-age=3600'); // 1 hour cache
            header('X-Content-Type-Options: nosniff');
            header('X-Frame-Options: SAMEORIGIN');
            
            // Enable compression
            if (extension_loaded('zlib') && !ob_get_level()) {
                ob_start('ob_gzhandler');
            }
        }
    }
}
add_action('wp_head', 'lottie_perf_test_performance_optimizations', 1);

// PERFORMANCE OPTIMIZATION: Critical CSS, Preconnects, and Resource Hints
function lottie_perf_test_critical_performance_optimizations() {
    // 1. PRECONNECT & PREFETCH KEY ORIGINS
    echo '<link rel="preconnect" href="https://tipalti.com" crossorigin>';
    echo '<link rel="preconnect" href="https://f.vimeocdn.com" crossorigin>';
    echo '<link rel="dns-prefetch" href="https://vod-adaptive-ak.vimeocdn.com">';
    echo '<link rel="preconnect" href="https://vumbnail.com" crossorigin>';
    echo '<link rel="preconnect" href="https://player.vimeo.com" crossorigin>';
    
    // 2. PRELOAD HERO IMAGE WITH FETCH PRIORITY
    echo '<link rel="preload" as="image" href="' . get_template_directory_uri() . '/assets/images/Tipalti-AI-Header.jpg.webp" fetchpriority="high" imagesrcset="' . get_template_directory_uri() . '/assets/images/Tipalti-AI-Header.jpg.webp 1440w" imagesizes="100vw">';
    
    // 3. PRELOAD CRITICAL FONTS
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/font/Inter-Regular-subset-v1.1.0.woff2" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/font/Inter-Medium-subset-v1.1.0.woff2" as="font" type="font/woff2" crossorigin>';
    
    // 4. PRELOAD CRITICAL VIMEO THUMBNAILS
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/images/vumbnail.jpg" as="image" fetchpriority="high" imagesrcset="' . get_template_directory_uri() . '/assets/images/vumbnail.jpg 1280w" imagesizes="100vw" crossorigin>';
    
    
    // 5. INLINE CRITICAL CSS (under 3KB for above-the-fold content)
    echo '<style>
        /* Critical CSS for FCP/LCP optimization */
        html {
            scroll-behavior: smooth;
        }
        body, header, .hero-section, .wp-block-cover {
            margin: 0; 
            padding: 0;
            background: #fff;
            font-display: swap;
        }
        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #141414;
        }
        .hero-section, .wp-block-cover {
            display: flex; 
            align-items: center; 
            justify-content: center;
            min-height: 60vh;
            overflow: hidden;
            aspect-ratio: 1440 / 522;
        }
        .wp-block-cover__image-background {
            width: 100%; 
            height: auto; 
            object-fit: cover;
        }
        .wp-block-cover__inner-container {
            position: relative;
            z-index: 2;
        }
        .wp-block-heading {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-weight: 500;
            line-height: 1.2;
        }
        .wp-block-buttons {
            display: flex;
            gap: 1rem;
        }
        .wp-block-button__link {
            display: inline-block;
            padding: 16px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .is-style-secondary .wp-block-button__link {
            background: #4d62d3;
            color: white;
            border: none;
        }
        .is-style-secondary .wp-block-button__link:hover {
            background: #3d52c3;
        }
        /* Prevent layout shift */
        dotlottie-player {
            width: 100%;
            height: 400px;
            display: block;
        }
        /* Critical accordion styles */
        .accordion-tab__slider-wrapper {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
            background: #fff;
            border-radius: 64px;
            box-shadow: 0 4px 16px 0 rgba(0,0,0,0.1);
        }
        .accordion-tab__slider-wrapper .slider-left {
            flex: 1;
        }
        .accordion-tab__slider-wrapper .slider-right {
            flex: 1;
        }
        .accordion-tab__slider-wrapper .pagination-item h3 {
            display: block;
            cursor: pointer;
            margin: 0;
            padding: 15px 0 0 0;
            color: #6c6c6c;
            transition: all 0.4s ease;
        }
        .accordion-tab__slider-wrapper .pagination-item h3:hover {
            color: #141414;
        }
        .accordion-tab__slider-wrapper .pagination-item.active-item h3 {
            color: #141414;
        }
        .accordion-tab__slider-wrapper .media-slide {
            opacity: 0;
            transition: opacity 0.4s;
        }
        .accordion-tab__slider-wrapper .media-slide.active-item {
            opacity: 1;
        }
        nav.main-nav,
        .main-nav {
            display: flex;
            align-items: center;
            min-height: 60px;
            width: 100%;
            box-sizing: border-box;
        }
        .wp-block-column.assistant-video {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            min-height: 0;
            position: relative;
            overflow: hidden;
        }
        lite-vimeo,
        .assistant-video lite-vimeo {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            min-height: 100%;
        }
        .entry-content.wp-block-post-content,
        .wp-block-post-content {
            display: block;
            width: 100%;
            max-width: 100%;
            padding-left: 0;
            padding-right: 0;
            margin-left: 0;
            margin-right: 0;
            box-sizing: border-box;
        }
        .entry-content.wp-block-post-content.is-layout-constrained,
        .wp-block-post-content.is-layout-constrained {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        .entry-content.wp-block-post-content.has-global-padding,
        .wp-block-post-content.has-global-padding {
            padding-left: clamp(1.5rem, 5vw, 3rem);
            padding-right: clamp(1.5rem, 5vw, 3rem);
        }
        /* CSS Variables */
        :root {
            --wp--preset--color--synergy-white: #ffffff;
            --wp--preset--color--synergy-paper: #fafafa;
            --wp--preset--color--synergy-rhino: #efefef;
            --wp--preset--color--synergy-pebble: #cccccc;
            --wp--preset--color--synergy-gunmetal: #6c6c6c;
            --wp--preset--color--synergy-onyx: #141414;
            --wp--preset--color--synergy-misty-blue: #E4EDFB;
            --wp--preset--color--synergy-blueberry: #4d62d3;
            --wp--preset--color--synergy-magenta: #efe4fb;
            --wp--preset--color--synergy-melon: #FFECBC;
            --wp--preset--color--synergy-gold: #ffbd01;
            --wp--preset--color--synergy-sage-green: #C9D6C9;
            --wp--custom--min-24-max-80: clamp(24px, 5vw, 80px);
            --wp--custom--min-24-max-64: clamp(24px, 3vw, 64px);
            --wp--custom--min-24-max-40: clamp(24px, 2vw, 40px);
            --wp--custom--min-24-max-36: clamp(24px, 2vw, 36px);
            --wp--custom--min-16-max-24: clamp(16px, 1.5vw, 24px);
            --wp--custom--min-16-max-20: clamp(16px, 1vw, 20px);
            --wp--custom--min-12-max-20: clamp(12px, 1vw, 20px);
            --wp--custom--min-6-max-8: clamp(6px, 0.5vw, 8px);
            --wp--custom--min-20-max-24: clamp(20px, 1.5vw, 24px);
            --wp--custom--min-32-max-40: clamp(32px, 2vw, 40px);
            --wp--custom--min-32-max-64: clamp(32px, 3vw, 64px);
            --wp--custom--min-24-max-32: clamp(24px, 2vw, 32px);
            --wp--custom--min-28-max-32: clamp(28px, 2vw, 32px);
            --wp--custom--min-18-max-24: clamp(18px, 1.5vw, 24px);
            --wp--custom--min-18-max-20: clamp(18px, 1vw, 20px);
            --wp--custom--min-14-max-16: clamp(14px, 1vw, 16px);
            --wp--custom--min-36-max-64: clamp(36px, 4vw, 64px);
            --wp--custom--min-36-max-48: clamp(36px, 3vw, 48px);
            --wp--custom--min-24-max-28: clamp(24px, 2vw, 28px);
            --wp--custom--min-24-max-40: clamp(24px, 2.5vw, 40px);
            --wp--custom--min-64-max-72: clamp(64px, 6vw, 72px);
            --wp--custom--min-24-max-24: 24px;
            --wp--custom--min-16-max-16: 16px;
            --wp--custom--min-14-max-14: 14px;
            --wp--custom--min-12-max-12: 12px;
            --wp--custom--min-16-max-18: clamp(16px, 1.2vw, 18px);
            --wp--custom--min-18-max-24: clamp(18px, 1.5vw, 24px);
            --wp--custom--min-64-max-72: clamp(64px, 6vw, 72px);
            --wp--custom--font-weight--regular: 400;
            --wp--custom--font-weight--medium: 500;
        }
        
        @font-face {
            font-family: "Inter";
            src: url("' . get_template_directory_uri() . '/assets/font/Inter-Regular-subset-v1.1.0.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            size-adjust: 100%;
            ascent-override: 90%;
            descent-override: 22%;
            line-gap-override: 0%;
        }
        @font-face {
            font-family: "Inter";
            src: url("' . get_template_directory_uri() . '/assets/font/Inter-Medium-subset-v1.1.0.woff2") format("woff2");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
            size-adjust: 100%;
            ascent-override: 90%;
            descent-override: 22%;
            line-gap-override: 0%;
        }
    </style>';
    
    // 6. PRELOAD CRITICAL LOTTIE ANIMATION
    $template = get_page_template_slug();
    if ($template === 'page-local-test.php') {
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/lottie/invoice-capture-agent-1.lottie" as="fetch" crossorigin>';
    }
}
add_action('wp_head', 'lottie_perf_test_critical_performance_optimizations', 0);

// Fix WordPress Lottie file support
function lottie_perf_test_add_lottie_support($mimes) {
    $mimes['lottie'] = 'application/json';
    $mimes['dotlottie'] = 'application/json';
    return $mimes;
}
add_filter('upload_mimes', 'lottie_perf_test_add_lottie_support');

// Allow Lottie files in uploads
function lottie_perf_test_allow_lottie_uploads($file) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    if ($ext === 'lottie' || $ext === 'dotlottie') {
        $file['type'] = 'application/json';
        $file['ext'] = $ext;
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'lottie_perf_test_allow_lottie_uploads');

// Note: Using Tipalti's lottie-light.js which includes dotlottie-player component
// No additional script loading needed for local-test.php

// Register navigation menus
function lottie_perf_test_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'lottie-perf-test'),
        'footer' => __('Footer Menu', 'lottie-perf-test'),
    ));
}
add_action('init', 'lottie_perf_test_menus');

// Add custom post types for performance test pages
function lottie_perf_test_post_types() {
    register_post_type('performance_test', array(
        'labels' => array(
            'name' => 'Performance Tests',
            'singular_name' => 'Performance Test',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-performance',
    ));
}
add_action('init', 'lottie_perf_test_post_types');

// Add custom fields for performance metrics
function lottie_perf_test_meta_boxes() {
    add_meta_box(
        'performance_metrics',
        'Performance Metrics',
        'lottie_perf_test_metrics_callback',
        'performance_test',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lottie_perf_test_meta_boxes');

function lottie_perf_test_metrics_callback($post) {
    wp_nonce_field('lottie_perf_test_metrics', 'lottie_perf_test_metrics_nonce');
    
    $performance_score = get_post_meta($post->ID, '_performance_score', true);
    $lcp = get_post_meta($post->ID, '_lcp', true);
    $tbt = get_post_meta($post->ID, '_tbt', true);
    $integration_mode = get_post_meta($post->ID, '_integration_mode', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="integration_mode">Integration Mode</label></th>';
    echo '<td><select name="integration_mode" id="integration_mode">';
    echo '<option value="global"' . selected($integration_mode, 'global', false) . '>Global CDN</option>';
    echo '<option value="defer"' . selected($integration_mode, 'defer', false) . '>Deferred Local</option>';
    echo '<option value="lazy"' . selected($integration_mode, 'lazy', false) . '>Lazy Loading</option>';
    echo '<option value="canvas"' . selected($integration_mode, 'canvas', false) . '>Canvas Renderer</option>';
    echo '</select></td></tr>';
    echo '<tr><th><label for="performance_score">Performance Score</label></th>';
    echo '<td><input type="number" name="performance_score" id="performance_score" value="' . esc_attr($performance_score) . '" /></td></tr>';
    echo '<tr><th><label for="lcp">LCP (seconds)</label></th>';
    echo '<td><input type="number" step="0.1" name="lcp" id="lcp" value="' . esc_attr($lcp) . '" /></td></tr>';
    echo '<tr><th><label for="tbt">TBT (ms)</label></th>';
    echo '<td><input type="number" name="tbt" id="tbt" value="' . esc_attr($tbt) . '" /></td></tr>';
    echo '</table>';
}

// Save custom fields
function lottie_perf_test_save_meta($post_id) {
    if (!isset($_POST['lottie_perf_test_metrics_nonce']) || !wp_verify_nonce($_POST['lottie_perf_test_metrics_nonce'], 'lottie_perf_test_metrics')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (isset($_POST['integration_mode'])) {
        update_post_meta($post_id, '_integration_mode', sanitize_text_field($_POST['integration_mode']));
    }
    if (isset($_POST['performance_score'])) {
        update_post_meta($post_id, '_performance_score', intval($_POST['performance_score']));
    }
    if (isset($_POST['lcp'])) {
        update_post_meta($post_id, '_lcp', floatval($_POST['lcp']));
    }
    if (isset($_POST['tbt'])) {
        update_post_meta($post_id, '_tbt', intval($_POST['tbt']));
    }
}
add_action('save_post', 'lottie_perf_test_save_meta');

// Add admin menu for performance dashboard
function lottie_perf_test_admin_menu() {
    add_menu_page(
        'Performance Dashboard',
        'Performance',
        'manage_options',
        'lottie-performance',
        'lottie_perf_test_dashboard',
        'dashicons-performance',
        30
    );
}
add_action('admin_menu', 'lottie_perf_test_admin_menu');

// Include Lottie content functionality
require_once get_template_directory() . '/lottie-content.php';

// Fix Wasmer admin access
function fix_wasmer_admin_access() {
    // Remove Wasmer magic login redirects
    remove_action('init', 'wasmer_magic_login');
    remove_action('wp_ajax_wasmer_magic_login', 'wasmer_magic_login_handler');
    remove_action('wp_ajax_nopriv_wasmer_magic_login', 'wasmer_magic_login_handler');
    
    // Ensure standard WordPress login works
    if (is_admin() && !is_user_logged_in()) {
        // Allow access to wp-login.php
        if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
            return;
        }
    }
}
add_action('init', 'fix_wasmer_admin_access', 1);

function lottie_perf_test_dashboard() {
    $tests = get_posts(array(
        'post_type' => 'performance_test',
        'posts_per_page' => -1,
        'meta_key' => '_performance_score',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ));
    
    echo '<div class="wrap">';
    echo '<h1>Lottie Performance Dashboard</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>Test Name</th><th>Integration Mode</th><th>Performance Score</th><th>LCP</th><th>TBT</th><th>Actions</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($tests as $test) {
        $mode = get_post_meta($test->ID, '_integration_mode', true);
        $score = get_post_meta($test->ID, '_performance_score', true);
        $lcp = get_post_meta($test->ID, '_lcp', true);
        $tbt = get_post_meta($test->ID, '_tbt', true);
        
        echo '<tr>';
        echo '<td>' . esc_html($test->post_title) . '</td>';
        echo '<td>' . esc_html(ucfirst($mode)) . '</td>';
        echo '<td>' . esc_html($score) . '</td>';
        echo '<td>' . esc_html($lcp) . 's</td>';
        echo '<td>' . esc_html($tbt) . 'ms</td>';
        echo '<td><a href="' . get_edit_post_link($test->ID) . '">Edit</a></td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
    echo '</div>';
}

// PERFORMANCE OPTIMIZATION: Combine non-critical CSS files into one bundle (fixes chaining)
// Excludes main.style.min.css which is loaded separately as critical CSS
function lottie_perf_test_combine_css_files() {
    $dist_dir = get_template_directory() . '/assets/dist/css/';
    $combined_file = $dist_dir . 'combined.min.css';
    
    // Non-critical CSS files to combine (excludes main.style.min.css which is critical)
    $css_files = array(
        'style.min.css',
        'mega-menu-style.min.css',
        'accordion-tabsliderview.min.css',
        'footer.min.css',
        'blog-filter-style.min.css',
        'cardRenderer.min.css',
        'carousel.min.css',
        'customer-cards-desktop.min.css',
        'testimonial-card-mobile.min.css',
        'customer-cards-mobile.min.css'
    );
    
    // Check if combined file exists and is newer than individual files
    if (file_exists($combined_file)) {
        $combined_time = filemtime($combined_file);
        $needs_rebuild = false;
        
        foreach ($css_files as $file) {
            $file_path = $dist_dir . $file;
            if (file_exists($file_path) && filemtime($file_path) > $combined_time) {
                $needs_rebuild = true;
                break;
            }
        }
        
        if (!$needs_rebuild) {
            return; // Combined file is up to date
        }
    }
    
    // Create combined CSS file (non-critical only)
    $combined_css = '';
    
    foreach ($css_files as $file) {
        $file_path = $dist_dir . $file;
        if (file_exists($file_path)) {
            $combined_css .= "\n/* === " . $file . " === */\n";
            $combined_css .= file_get_contents($file_path);
            $combined_css .= "\n";
        }
    }
    
    // Minify the combined CSS (basic minification)
    $combined_css = preg_replace('/\s+/', ' ', $combined_css);
    $combined_css = preg_replace('/\/\*.*?\*\//', '', $combined_css);
    $combined_css = str_replace(array('; ', ' {', '{ ', ' }', '} ', ': '), array(';', '{', '{', '}', '}', ':'), $combined_css);
    
    // Ensure directory exists
    if (!is_dir($dist_dir)) {
        wp_mkdir_p($dist_dir);
    }
    
    file_put_contents($combined_file, $combined_css);
}

// Create fallback CSS files if they don't exist on server
function lottie_perf_test_create_fallback_css() {
    $dist_dir = get_template_directory() . '/assets/dist/css/';
    
    // Create directory if it doesn't exist
    if (!is_dir($dist_dir)) {
        wp_mkdir_p($dist_dir);
    }
    
    // Create minimal main.style.min.css
    $main_css = '/* Minimal fallback CSS */
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
.accordion-tab__slider-wrapper { display: flex; max-width: 1200px; margin: 0 auto; }
.accordion-tab__slider-wrapper .slider-left { flex: 1; }
.accordion-tab__slider-wrapper .slider-right { flex: 1; }
.accordion-tab__slider-wrapper .pagination-item h3 { display: block; cursor: pointer; }
.accordion-tab__slider-wrapper .media-slide { opacity: 0; transition: opacity 0.4s; }
.accordion-tab__slider-wrapper .media-slide.active-item { opacity: 1; }
dotlottie-player { width: 100%; height: 400px; }';
    
    file_put_contents($dist_dir . 'main.style.min.css', $main_css);
    
    // Create minimal accordion CSS
    $accordion_css = '.accordion-tab__slider-wrapper{align-items:center;background-color:#fff;box-shadow:0 4px 16px 0 rgba(0,0,0,0.1);display:flex;flex-direction:column;gap:80px;padding:24px}.accordion-tab__slider-wrapper .pagination-item h3{color:#6c6c6c;cursor:pointer;display:block;margin:0;padding:15px 0 0 0;transition:all 0.4s ease}.accordion-tab__slider-wrapper .pagination-item h3:hover{color:#141414}.accordion-tab__slider-wrapper .pagination-item.active-item h3{color:#141414}.accordion-tab__slider-wrapper .info-slide{max-height:0;opacity:0;overflow:hidden;transition:all 0.4s ease}.accordion-tab__slider-wrapper .info-slide.active-info-item{max-height:500px;opacity:1}.accordion-tab__slider-wrapper .media-slide{opacity:0;transition:all 0.4s ease;width:100%}.accordion-tab__slider-wrapper .media-slide.active-item{opacity:1;display:block}@media(min-width:962px){.accordion-tab__slider-wrapper{flex-direction:row}.accordion-tab__slider-wrapper.is-row-reverse{flex-direction:row-reverse}}';
    
    file_put_contents($dist_dir . 'accordion-tabsliderview.min.css', $accordion_css);
    
    // Create combined CSS file
    lottie_perf_test_combine_css_files();
}
