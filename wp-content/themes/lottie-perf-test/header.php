<!DOCTYPE html>
<?php
/**
 * The header for our theme
 */
header('ngrok-skip-browser-warning: true');
header('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

?>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <style id='wp-block-heading-inline-css'>
        h1.has-background,
        h2.has-background,
        h3.has-background,
        h4.has-background,
        h5.has-background,
        h6.has-background {
            padding: 1.25em 2.375em
        }

        h1.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h1.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]),
        h2.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h2.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]),
        h3.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h3.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]),
        h4.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h4.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]),
        h5.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h5.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]),
        h6.has-text-align-left[style*=writing-mode]:where([style*=vertical-lr]),
        h6.has-text-align-right[style*=writing-mode]:where([style*=vertical-rl]) {
            rotate: 180deg
        }
    </style>
    <style id='wp-block-paragraph-inline-css'>
        .is-small-text {
            font-size: .875em
        }

        .is-regular-text {
            font-size: 1em
        }

        .is-large-text {
            font-size: 2.25em
        }

        .is-larger-text {
            font-size: 3em
        }

        .has-drop-cap:not(:focus):first-letter {
            float: left;
            font-size: 8.4em;
            font-style: normal;
            font-weight: 100;
            line-height: .68;
            margin: .05em .1em 0 0;
            text-transform: uppercase
        }

        body.rtl .has-drop-cap:not(:focus):first-letter {
            float: none;
            margin-left: .1em
        }

        p.has-drop-cap.has-background {
            overflow: hidden
        }

        :root :where(p.has-background) {
            padding: 1.25em 2.375em
        }

        :where(p.has-text-color:not(.has-link-color)) a {
            color: inherit
        }

        p.has-text-align-left[style*="writing-mode:vertical-lr"],
        p.has-text-align-right[style*="writing-mode:vertical-rl"] {
            rotate: 180deg
        }
    </style>
    <style id='wp-block-button-inline-css'>
        .wp-block-button__link {
            box-sizing: border-box;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            word-break: break-word
        }

        .wp-block-button__link.aligncenter {
            text-align: center
        }

        .wp-block-button__link.alignright {
            text-align: right
        }

        :where(.wp-block-button__link) {
            border-radius: 9999px;
            box-shadow: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            text-decoration: none
        }

        .wp-block-button[style*=text-decoration] .wp-block-button__link {
            text-decoration: inherit
        }

        .wp-block-buttons>.wp-block-button.has-custom-width {
            max-width: none
        }

        .wp-block-buttons>.wp-block-button.has-custom-width .wp-block-button__link {
            width: 100%
        }

        .wp-block-buttons>.wp-block-button.has-custom-font-size .wp-block-button__link {
            font-size: inherit
        }

        .wp-block-buttons>.wp-block-button.wp-block-button__width-25 {
            width: calc(25% - var(--wp--style--block-gap, .5em)*.75)
        }

        .wp-block-buttons>.wp-block-button.wp-block-button__width-50 {
            width: calc(50% - var(--wp--style--block-gap, .5em)*.5)
        }

        .wp-block-buttons>.wp-block-button.wp-block-button__width-75 {
            width: calc(75% - var(--wp--style--block-gap, .5em)*.25)
        }

        .wp-block-buttons>.wp-block-button.wp-block-button__width-100 {
            flex-basis: 100%;
            width: 100%
        }

        .wp-block-buttons.is-vertical>.wp-block-button.wp-block-button__width-25 {
            width: 25%
        }

        .wp-block-buttons.is-vertical>.wp-block-button.wp-block-button__width-50 {
            width: 50%
        }

        .wp-block-buttons.is-vertical>.wp-block-button.wp-block-button__width-75 {
            width: 75%
        }

        .wp-block-button.is-style-squared,
        .wp-block-button__link.wp-block-button.is-style-squared {
            border-radius: 0
        }

        .wp-block-button.no-border-radius,
        .wp-block-button__link.no-border-radius {
            border-radius: 0 !important
        }

        :root :where(.wp-block-button .wp-block-button__link.is-style-outline),
        :root :where(.wp-block-button.is-style-outline>.wp-block-button__link) {
            border: 2px solid;
            padding: .667em 1.333em
        }

        :root :where(.wp-block-button .wp-block-button__link.is-style-outline:not(.has-text-color)),
        :root :where(.wp-block-button.is-style-outline>.wp-block-button__link:not(.has-text-color)) {
            color: currentColor
        }

        :root :where(.wp-block-button .wp-block-button__link.is-style-outline:not(.has-background)),
        :root :where(.wp-block-button.is-style-outline>.wp-block-button__link:not(.has-background)) {
            background-color: initial;
            background-image: none
        }
    </style>
    <style id='wp-block-buttons-inline-css'>
        .wp-block-buttons.is-vertical {
            flex-direction: column
        }

        .wp-block-buttons.is-vertical>.wp-block-button:last-child {
            margin-bottom: 0
        }

        .wp-block-buttons>.wp-block-button {
            display: inline-block;
            margin: 0
        }

        .wp-block-buttons.is-content-justification-left {
            justify-content: flex-start
        }

        .wp-block-buttons.is-content-justification-left.is-vertical {
            align-items: flex-start
        }

        .wp-block-buttons.is-content-justification-center {
            justify-content: center
        }

        .wp-block-buttons.is-content-justification-center.is-vertical {
            align-items: center
        }

        .wp-block-buttons.is-content-justification-right {
            justify-content: flex-end
        }

        .wp-block-buttons.is-content-justification-right.is-vertical {
            align-items: flex-end
        }

        .wp-block-buttons.is-content-justification-space-between {
            justify-content: space-between
        }

        .wp-block-buttons.aligncenter {
            text-align: center
        }

        .wp-block-buttons:not(.is-content-justification-space-between, .is-content-justification-right, .is-content-justification-left, .is-content-justification-center) .wp-block-button.aligncenter {
            margin-left: auto;
            margin-right: auto;
            width: 100%
        }

        .wp-block-buttons[style*=text-decoration] .wp-block-button,
        .wp-block-buttons[style*=text-decoration] .wp-block-button__link {
            text-decoration: inherit
        }

        .wp-block-buttons.has-custom-font-size .wp-block-button__link {
            font-size: inherit
        }

        .wp-block-button.aligncenter {
            text-align: center
        }
    </style>
    <style id='wp-block-group-inline-css'>
        .wp-block-group {
            box-sizing: border-box
        }

        :where(.wp-block-group.wp-block-group-is-layout-constrained) {
            position: relative
        }
    </style>
    <style id='wp-block-image-inline-css'>
        .wp-block-image a {
            display: inline-block
        }

        .wp-block-image img {
            box-sizing: border-box;
            height: auto;
            max-width: 100%;
            vertical-align: bottom
        }

        @media (prefers-reduced-motion:no-preference) {
            .wp-block-image img.hide {
                visibility: hidden
            }

            .wp-block-image img.show {
                animation: show-content-image .4s
            }
        }

        .wp-block-image[style*=border-radius] img,
        .wp-block-image[style*=border-radius]>a {
            border-radius: inherit
        }

        .wp-block-image.has-custom-border img {
            box-sizing: border-box
        }

        .wp-block-image.aligncenter {
            text-align: center
        }

        .wp-block-image.alignfull a,
        .wp-block-image.alignwide a {
            width: 100%
        }

        .wp-block-image.alignfull img,
        .wp-block-image.alignwide img {
            height: auto;
            width: 100%
        }

        .wp-block-image .aligncenter,
        .wp-block-image .alignleft,
        .wp-block-image .alignright,
        .wp-block-image.aligncenter,
        .wp-block-image.alignleft,
        .wp-block-image.alignright {
            display: table
        }

        .wp-block-image .aligncenter>figcaption,
        .wp-block-image .alignleft>figcaption,
        .wp-block-image .alignright>figcaption,
        .wp-block-image.aligncenter>figcaption,
        .wp-block-image.alignleft>figcaption,
        .wp-block-image.alignright>figcaption {
            caption-side: bottom;
            display: table-caption
        }

        .wp-block-image .alignleft {
            float: left;
            margin: .5em 1em .5em 0
        }

        .wp-block-image .alignright {
            float: right;
            margin: .5em 0 .5em 1em
        }

        .wp-block-image .aligncenter {
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-image :where(figcaption) {
            margin-bottom: 1em;
            margin-top: .5em
        }

        .wp-block-image.is-style-circle-mask img {
            border-radius: 9999px
        }

        @supports ((-webkit-mask-image: none) or (mask-image:none)) or (-webkit-mask-image:none) {
            .wp-block-image.is-style-circle-mask img {
                border-radius: 0;
                -webkit-mask-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"/></svg>');
                mask-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"/></svg>');
                mask-mode: alpha;
                -webkit-mask-position: center;
                mask-position: center;
                -webkit-mask-repeat: no-repeat;
                mask-repeat: no-repeat;
                -webkit-mask-size: contain;
                mask-size: contain
            }
        }

        :root :where(.wp-block-image.is-style-rounded img, .wp-block-image .is-style-rounded img) {
            border-radius: 9999px
        }

        .wp-block-image figure {
            margin: 0
        }

        .wp-lightbox-container {
            display: flex;
            flex-direction: column;
            position: relative
        }

        .wp-lightbox-container img {
            cursor: zoom-in
        }

        .wp-lightbox-container img:hover+button {
            opacity: 1
        }

        .wp-lightbox-container button {
            align-items: center;
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            backdrop-filter: blur(16px) saturate(180%);
            background-color: #5a5a5a40;
            border: none;
            border-radius: 4px;
            cursor: zoom-in;
            display: flex;
            height: 20px;
            justify-content: center;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: 16px;
            text-align: center;
            top: 16px;
            transition: opacity .2s ease;
            width: 20px;
            z-index: 100
        }

        .wp-lightbox-container button:focus-visible {
            outline: 3px auto #5a5a5a40;
            outline: 3px auto -webkit-focus-ring-color;
            outline-offset: 3px
        }

        .wp-lightbox-container button:hover {
            cursor: pointer;
            opacity: 1
        }

        .wp-lightbox-container button:focus {
            opacity: 1
        }

        .wp-lightbox-container button:focus,
        .wp-lightbox-container button:hover,
        .wp-lightbox-container button:not(:hover):not(:active):not(.has-background) {
            background-color: #5a5a5a40;
            border: none
        }

        .wp-lightbox-overlay {
            box-sizing: border-box;
            cursor: zoom-out;
            height: 100vh;
            left: 0;
            overflow: hidden;
            position: fixed;
            top: 0;
            visibility: hidden;
            width: 100%;
            z-index: 100000
        }

        .wp-lightbox-overlay .close-button {
            align-items: center;
            cursor: pointer;
            display: flex;
            justify-content: center;
            min-height: 40px;
            min-width: 40px;
            padding: 0;
            position: absolute;
            right: calc(env(safe-area-inset-right) + 16px);
            top: calc(env(safe-area-inset-top) + 16px);
            z-index: 5000000
        }

        .wp-lightbox-overlay .close-button:focus,
        .wp-lightbox-overlay .close-button:hover,
        .wp-lightbox-overlay .close-button:not(:hover):not(:active):not(.has-background) {
            background: none;
            border: none
        }

        .wp-lightbox-overlay .lightbox-image-container {
            height: var(--wp--lightbox-container-height);
            left: 50%;
            overflow: hidden;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            transform-origin: top left;
            width: var(--wp--lightbox-container-width);
            z-index: 9999999999
        }

        .wp-lightbox-overlay .wp-block-image {
            align-items: center;
            box-sizing: border-box;
            display: flex;
            height: 100%;
            justify-content: center;
            margin: 0;
            position: relative;
            transform-origin: 0 0;
            width: 100%;
            z-index: 3000000
        }

        .wp-lightbox-overlay .wp-block-image img {
            height: var(--wp--lightbox-image-height);
            min-height: var(--wp--lightbox-image-height);
            min-width: var(--wp--lightbox-image-width);
            width: var(--wp--lightbox-image-width)
        }

        .wp-lightbox-overlay .wp-block-image figcaption {
            display: none
        }

        .wp-lightbox-overlay button {
            background: none;
            border: none
        }

        .wp-lightbox-overlay .scrim {
            background-color: #fff;
            height: 100%;
            opacity: .9;
            position: absolute;
            width: 100%;
            z-index: 2000000
        }

        .wp-lightbox-overlay.active {
            animation: turn-on-visibility .25s both;
            visibility: visible
        }

        .wp-lightbox-overlay.active img {
            animation: turn-on-visibility .35s both
        }

        .wp-lightbox-overlay.show-closing-animation:not(.active) {
            animation: turn-off-visibility .35s both
        }

        .wp-lightbox-overlay.show-closing-animation:not(.active) img {
            animation: turn-off-visibility .25s both
        }

        @media (prefers-reduced-motion:no-preference) {
            .wp-lightbox-overlay.zoom.active {
                animation: none;
                opacity: 1;
                visibility: visible
            }

            .wp-lightbox-overlay.zoom.active .lightbox-image-container {
                animation: lightbox-zoom-in .4s
            }

            .wp-lightbox-overlay.zoom.active .lightbox-image-container img {
                animation: none
            }

            .wp-lightbox-overlay.zoom.active .scrim {
                animation: turn-on-visibility .4s forwards
            }

            .wp-lightbox-overlay.zoom.show-closing-animation:not(.active) {
                animation: none
            }

            .wp-lightbox-overlay.zoom.show-closing-animation:not(.active) .lightbox-image-container {
                animation: lightbox-zoom-out .4s
            }

            .wp-lightbox-overlay.zoom.show-closing-animation:not(.active) .lightbox-image-container img {
                animation: none
            }

            .wp-lightbox-overlay.zoom.show-closing-animation:not(.active) .scrim {
                animation: turn-off-visibility .4s forwards
            }
        }

        @keyframes show-content-image {
            0% {
                visibility: hidden
            }

            99% {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes turn-on-visibility {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes turn-off-visibility {
            0% {
                opacity: 1;
                visibility: visible
            }

            99% {
                opacity: 0;
                visibility: visible
            }

            to {
                opacity: 0;
                visibility: hidden
            }
        }

        @keyframes lightbox-zoom-in {
            0% {
                transform: translate(calc((-100vw + var(--wp--lightbox-scrollbar-width))/2 + var(--wp--lightbox-initial-left-position)), calc(-50vh + var(--wp--lightbox-initial-top-position))) scale(var(--wp--lightbox-scale))
            }

            to {
                transform: translate(-50%, -50%) scale(1)
            }
        }

        @keyframes lightbox-zoom-out {
            0% {
                transform: translate(-50%, -50%) scale(1);
                visibility: visible
            }

            99% {
                visibility: visible
            }

            to {
                transform: translate(calc((-100vw + var(--wp--lightbox-scrollbar-width))/2 + var(--wp--lightbox-initial-left-position)), calc(-50vh + var(--wp--lightbox-initial-top-position))) scale(var(--wp--lightbox-scale));
                visibility: hidden
            }
        }
    </style>
    <style id='wp-block-spacer-inline-css'>
        .wp-block-spacer {
            clear: both
        }
    </style>
    <style id='wp-block-list-inline-css'>
        ol,
        ul {
            box-sizing: border-box
        }

        :root :where(.wp-block-list.has-background) {
            padding: 1.25em 2.375em
        }
    </style>
    <style id='wp-block-columns-inline-css'>
        .wp-block-columns {
            align-items: normal !important;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap !important
        }

        @media (min-width: 782px) {
            .wp-block-columns {
                flex-wrap: nowrap !important
            }
        }

        .wp-block-columns.are-vertically-aligned-top {
            align-items: flex-start
        }

        .wp-block-columns.are-vertically-aligned-center {
            align-items: center
        }

        .wp-block-columns.are-vertically-aligned-bottom {
            align-items: flex-end
        }

        @media (max-width: 781px) {
            .wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
                flex-basis: 100% !important
            }
        }

        @media (min-width: 782px) {
            .wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
                flex-basis: 0;
                flex-grow: 1
            }

            .wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column[style*=flex-basis] {
                flex-grow: 0
            }
        }

        .wp-block-columns.is-not-stacked-on-mobile {
            flex-wrap: nowrap !important
        }

        .wp-block-columns.is-not-stacked-on-mobile>.wp-block-column {
            flex-basis: 0;
            flex-grow: 1
        }

        .wp-block-columns.is-not-stacked-on-mobile>.wp-block-column[style*=flex-basis] {
            flex-grow: 0
        }

        :where(.wp-block-columns) {
            margin-bottom: 1.75em
        }

        :where(.wp-block-columns.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-column {
            flex-grow: 1;
            min-width: 0;
            overflow-wrap: break-word;
            word-break: break-word
        }

        .wp-block-column.is-vertically-aligned-top {
            align-self: flex-start
        }

        .wp-block-column.is-vertically-aligned-center {
            align-self: center
        }

        .wp-block-column.is-vertically-aligned-bottom {
            align-self: flex-end
        }

        .wp-block-column.is-vertically-aligned-stretch {
            align-self: stretch
        }

        .wp-block-column.is-vertically-aligned-bottom,
        .wp-block-column.is-vertically-aligned-center,
        .wp-block-column.is-vertically-aligned-top {
            width: 100%
        }
    </style>
    <style id='wp-block-post-content-inline-css'>
        .wp-block-post-content {
            display: flow-root
        }
    </style>
    <style id='tcb-popup-style-inline-css'>
        .no-scroll {
            overflow: hidden;
            touch-action: none
        }

        .popup__overlay {
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            background: rgba(0, 0, 0, .7);
            container-type: inline-size;
            height: 0;
            left: 0;
            max-width: 100% !important;
            opacity: 0;
            position: fixed;
            top: 0;
            transition: opacity .3s, height 0s;
            transition-delay: 0s, .3s;
            transition-property: opacity, height;
            width: 100%;
            z-index: 10000
        }

        .popup__overlay.visible {
            height: 100%;
            opacity: 1;
            transition: opacity .3s, height 0s;
            transition-delay: 0s, 0s;
            transition-property: opacity, height;
            visibility: visible
        }

        .popup__box {
            background-color: var(--wp--preset--color--synergy-white, #fff);
            border-radius: 32px 32px 0 0;
            bottom: 0;
            box-sizing: border-box;
            display: none;
            padding: 0 var(--wp--custom--min-24-max-32);
            position: absolute;
            width: 100%
        }

        @container (min-width: 782px) {
            .popup__box {
                border-radius: 32px;
                left: 50%;
                max-width: -moz-max-content;
                max-width: max-content;
                position: relative;
                top: 50%;
                transform: translate(-50%, -50%)
            }
        }

        .popup-wrapper {
            max-height: 70vh;
            overflow: auto;
            padding-right: 4px;
            top: 0
        }

        @container (max-width: 782px) {
            .popup-wrapper {
                max-width: 100% !important
            }
        }

        .popup-wrapper::-webkit-scrollbar {
            width: 8px
        }

        .popup-wrapper::-webkit-scrollbar-track {
            background: var(--wp--preset--color--synergy-rhino, #efefef);
            border-radius: 100px;
            margin-bottom: 150px;
            margin-top: 50px
        }

        .popup-wrapper::-webkit-scrollbar-thumb {
            background: var(--wp--preset--color--synergy-pebble, #ccc);
            border-radius: 100px
        }

        @container (min-width: 782px) {
            .popup-wrapper {
                max-height: 85vh;
                max-width: 500px
            }
        }

        .popup__overlay.visible .popup__box {
            display: block
        }

        .popup__close {
            align-items: center;
            cursor: pointer;
            display: flex;
            height: 48px;
            justify-content: center;
            margin-left: calc(100% - 36px);
            padding-top: 10px;
            width: 48px
        }
    </style>
    <style id='wp-block-library-inline-css'>
        :root {
            --wp-admin-theme-color: #007cba;
            --wp-admin-theme-color--rgb: 0, 124, 186;
            --wp-admin-theme-color-darker-10: #006ba1;
            --wp-admin-theme-color-darker-10--rgb: 0, 107, 161;
            --wp-admin-theme-color-darker-20: #005a87;
            --wp-admin-theme-color-darker-20--rgb: 0, 90, 135;
            --wp-admin-border-width-focus: 2px;
            --wp-block-synced-color: #7a00df;
            --wp-block-synced-color--rgb: 122, 0, 223;
            --wp-bound-block-color: var(--wp-block-synced-color)
        }

        @media (min-resolution: 192dpi) {
            :root {
                --wp-admin-border-width-focus: 1.5px
            }
        }

        .wp-element-button {
            cursor: pointer
        }

        :root {
            --wp--preset--font-size--normal: 16px;
            --wp--preset--font-size--huge: 42px
        }

        :root .has-very-light-gray-background-color {
            background-color: #eee
        }

        :root .has-very-dark-gray-background-color {
            background-color: #313131
        }

        :root .has-very-light-gray-color {
            color: #eee
        }

        :root .has-very-dark-gray-color {
            color: #313131
        }

        :root .has-vivid-green-cyan-to-vivid-cyan-blue-gradient-background {
            background: linear-gradient(135deg, #00d084, #0693e3)
        }

        :root .has-purple-crush-gradient-background {
            background: linear-gradient(135deg, #34e2e4, #4721fb 50%, #ab1dfe)
        }

        :root .has-hazy-dawn-gradient-background {
            background: linear-gradient(135deg, #faaca8, #dad0ec)
        }

        :root .has-subdued-olive-gradient-background {
            background: linear-gradient(135deg, #fafae1, #67a671)
        }

        :root .has-atomic-cream-gradient-background {
            background: linear-gradient(135deg, #fdd79a, #004a59)
        }

        :root .has-nightshade-gradient-background {
            background: linear-gradient(135deg, #330968, #31cdcf)
        }

        :root .has-midnight-gradient-background {
            background: linear-gradient(135deg, #020381, #2874fc)
        }

        .has-regular-font-size {
            font-size: 1em
        }

        .has-larger-font-size {
            font-size: 2.625em
        }

        .has-normal-font-size {
            font-size: var(--wp--preset--font-size--normal)
        }

        .has-huge-font-size {
            font-size: var(--wp--preset--font-size--huge)
        }

        .has-text-align-center {
            text-align: center
        }

        .has-text-align-left {
            text-align: left
        }

        .has-text-align-right {
            text-align: right
        }

        #end-resizable-editor-section {
            display: none
        }

        .aligncenter {
            clear: both
        }

        .items-justified-left {
            justify-content: flex-start
        }

        .items-justified-center {
            justify-content: center
        }

        .items-justified-right {
            justify-content: flex-end
        }

        .items-justified-space-between {
            justify-content: space-between
        }

        .screen-reader-text {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
            word-wrap: normal !important
        }

        .screen-reader-text:focus {
            background-color: #ddd;
            clip: auto !important;
            clip-path: none;
            color: #444;
            display: block;
            font-size: 1em;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000
        }

        html :where(.has-border-color) {
            border-style: solid
        }

        html :where([style*=border-top-color]) {
            border-top-style: solid
        }

        html :where([style*=border-right-color]) {
            border-right-style: solid
        }

        html :where([style*=border-bottom-color]) {
            border-bottom-style: solid
        }

        html :where([style*=border-left-color]) {
            border-left-style: solid
        }

        html :where([style*=border-width]) {
            border-style: solid
        }

        html :where([style*=border-top-width]) {
            border-top-style: solid
        }

        html :where([style*=border-right-width]) {
            border-right-style: solid
        }

        html :where([style*=border-bottom-width]) {
            border-bottom-style: solid
        }

        html :where([style*=border-left-width]) {
            border-left-style: solid
        }

        html :where(img[class*=wp-image-]) {
            height: auto;
            max-width: 100%
        }

        :where(figure) {
            margin: 0 0 1em
        }

        html :where(.is-position-sticky) {
            --wp-admin--admin-bar--position-offset: var(--wp-admin--admin-bar--height, 0px)
        }

        @media screen and (max-width: 600px) {
            html :where(.is-position-sticky) {
                --wp-admin--admin-bar--position-offset: 0px
            }
        }
    </style>
    <style id='global-styles-inline-css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
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
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: clamp(14px, 0.875rem + ((1vw - 3.2px) * 0.361), 20px);
            --wp--preset--font-size--large: clamp(22.041px, 1.378rem + ((1vw - 3.2px) * 0.841), 36px);
            --wp--preset--font-size--x-large: clamp(25.014px, 1.563rem + ((1vw - 3.2px) * 1.023), 42px);
            --wp--preset--font-size--synergy-xsmall: var(--wp--custom--min-12-max-12);
            --wp--preset--font-size--synergy-small: var(--wp--custom--min-14-max-14);
            --wp--preset--font-size--synergy-regular: var(--wp--custom--min-16-max-16);
            --wp--preset--font-size--synergy-medium: var(--wp--custom--min-16-max-18);
            --wp--preset--font-size--synergy-large: var(--wp--custom--min-18-max-24);
            --wp--preset--font-size--synergy-massive: var(--wp--custom--min-64-max-72);
            --wp--preset--font-family--inter: "Inter", "Helvetica Neue", Helvetica, Arial, sans-seriff;
            --wp--preset--spacing--20: var(--wp--custom--min-16-max-20);
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: var(--wp--custom--min-24-max-40);
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: var(--wp--custom--min-24-max-80);
            --wp--preset--spacing--8: var(--wp--custom--min-8-max-8);
            --wp--preset--spacing--12: var(--wp--custom--min-12-max-12);
            --wp--preset--spacing--16: var(--wp--custom--min-16-max-16);
            --wp--preset--spacing--24: var(--wp--custom--min-16-max-24);
            --wp--preset--spacing--36: var(--wp--custom--min-24-max-36);
            --wp--preset--spacing--48: var(--wp--custom--min-24-max-48);
            --wp--preset--spacing--56: var(--wp--custom--min-24-max-56);
            --wp--preset--spacing--64: var(--wp--custom--min-24-max-64);
            --wp--preset--spacing--100: var(--wp--custom--min-24-max-100);
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
            --wp--custom--font-weight--regular: 400;
            --wp--custom--font-weight--medium: 500;
            --wp--custom--min-8-max-8: 0.5rem;
            --wp--custom--min-12-max-12: 0.75rem;
            --wp--custom--min-14-max-14: 0.875rem;
            --wp--custom--min-16-max-16: 1rem;
            --wp--custom--min-20-max-20: 1.25rem;
            --wp--custom--min-24-max-24: 1.5rem;
            --wp--custom--min-6-max-8: clamp(0.375rem, calc(0.188vw + 0.331rem), 0.5rem);
            --wp--custom--min-8-max-16: clamp(0.5rem, calc(0.751vw + 0.324rem), 1rem);
            --wp--custom--min-8-max-24: clamp(0.5rem, calc(1.509vw + 0.142rem), 1.5rem);
            --wp--custom--min-12-max-16: clamp(0.75rem, calc(0.376vw + 0.662rem), 1rem);
            --wp--custom--min-12-max-20: clamp(0.75rem, calc(0.751vw + 0.574rem), 1.25rem);
            --wp--custom--min-14-max-16: clamp(0.875rem, calc(0.188vw + 0.831rem), 1rem);
            --wp--custom--min-16-max-18: clamp(1rem, calc(0.188vw + 0.956rem), 1.125rem);
            --wp--custom--min-16-max-20: clamp(1rem, calc(0.376vw + 0.912rem), 1.25rem);
            --wp--custom--min-16-max-24: clamp(1rem, calc(0.751vw + 0.824rem), 1.5rem);
            --wp--custom--min-16-max-32: clamp(1rem, calc(1.502vw + 0.648rem), 2rem);
            --wp--custom--min-18-max-20: clamp(1.125rem, calc(0.188vw + 1.081rem), 1.25rem);
            ;
            --wp--custom--min-18-max-24: clamp(1.125rem, calc(0.563vw + 0.993rem), 1.5rem);
            --wp--custom--min-20-max-24: clamp(1.25rem, calc(0.379vw + 1.159rem), 1.5rem);
            --wp--custom--min-20-max-32: clamp(1.25rem, calc(1.127vw + 0.986rem), 2rem);
            --wp--custom--min-24-max-26: clamp(1.5rem, calc(0.188vw + 1.456rem), 1.625rem);
            ;
            --wp--custom--min-24-max-28: clamp(1.5rem, calc(0.376vw + 1.412rem), 1.75rem);
            ;
            --wp--custom--min-24-max-32: clamp(1.5rem, calc(0.751vw + 1.148rem), 2rem);
            --wp--custom--min-24-max-36: clamp(1.5rem, calc(1.127vw + 1.236rem), 2.25rem);
            --wp--custom--min-24-max-40: clamp(1.5rem, calc(1.502vw + 1.148rem), 2.5rem);
            --wp--custom--min-24-max-48: clamp(1.5rem, calc(2.254vw + 0.972rem), 3rem);
            --wp--custom--min-24-max-56: clamp(1.5rem, calc(3.005vw + 0.796rem), 3.5rem);
            --wp--custom--min-24-max-64: clamp(1.5rem, calc(3.756vw + 0.62rem), 4rem);
            --wp--custom--min-24-max-80: clamp(1.5rem, calc(5.258vw + 0.268rem), 5rem);
            --wp--custom--min-24-max-100: clamp(1.5rem, calc(7.136vw + -0.173rem), 6.25rem);
            --wp--custom--min-28-max-32: clamp(1.75rem, calc(0.376vw + 1.662rem), 2rem);
            ;
            --wp--custom--min-28-max-40: clamp(1.75rem, calc(1.127vw + 1.486rem), 2.5rem);
            --wp--custom--min-32-max-40: clamp(2rem, calc(0.751vw + 1.824rem), 2.5rem);
            --wp--custom--min-32-max-48: clamp(2rem, calc(1.486vw + 1.653rem), 3rem);
            --wp--custom--min-32-max-64: clamp(2rem, calc(3.005vw + 1.296rem), 4rem);
            --wp--custom--min-36-max-48: clamp(2.25rem, calc(1.127vw + 1.986rem), 3rem);
            ;
            --wp--custom--min-36-max-64: clamp(2.25rem, calc(2.629vw + 1.634rem), 4rem);
            --wp--custom--min-64-max-72: clamp(4rem, calc(0.739vw + 3.835rem), 4.5rem);
        }

        .wp-block-heading {
            --wp--preset--font-size--header-5: var(--wp--custom--min-18-max-20);
            --wp--preset--font-size--header-4: var(--wp--custom--min-20-max-24);
            --wp--preset--font-size--header-3: var(--wp--custom--min-24-max-32);
            --wp--preset--font-size--header-2: var(--wp--custom--min-32-max-40);
            --wp--preset--font-size--header-1: var(--wp--custom--min-36-max-64);
        }

        p {
            --wp--preset--font-size--xsmall: var(--wp--preset--font-size--synergy-xsmall);
            --wp--preset--font-size--small: var(--wp--preset--font-size--synergy-small);
            --wp--preset--font-size--regular: var(--wp--preset--font-size--synergy-regular);
            --wp--preset--font-size--medium: var(--wp--preset--font-size--synergy-medium);
            --wp--preset--font-size--large: var(--wp--preset--font-size--synergy-large);
        }

        :root {
            --wp--style--global--content-size: 1440px;
            --wp--style--global--wide-size: 1980px;
        }

        :where(body) {
            margin: 0;
        }

        .wp-site-blocks {
            padding-top: var(--wp--style--root--padding-top);
            padding-bottom: var(--wp--style--root--padding-bottom);
        }

        .has-global-padding {
            padding-right: var(--wp--style--root--padding-right);
            padding-left: var(--wp--style--root--padding-left);
        }

        .has-global-padding>.alignfull {
            margin-right: calc(var(--wp--style--root--padding-right) * -1);
            margin-left: calc(var(--wp--style--root--padding-left) * -1);
        }

        .has-global-padding :where(:not(.alignfull.is-layout-flow) > .has-global-padding:not(.wp-block-block, .alignfull)) {
            padding-right: 0;
            padding-left: 0;
        }

        .has-global-padding :where(:not(.alignfull.is-layout-flow) > .has-global-padding:not(.wp-block-block, .alignfull))>.alignfull {
            margin-left: 0;
            margin-right: 0;
        }

        .wp-site-blocks>.alignleft {
            float: left;
            margin-right: 2em;
        }

        .wp-site-blocks>.alignright {
            float: right;
            margin-left: 2em;
        }

        .wp-site-blocks>.aligncenter {
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        :where(.wp-site-blocks)>* {
            margin-block-start: 0px;
            margin-block-end: 0;
        }

        :where(.wp-site-blocks)> :first-child {
            margin-block-start: 0;
        }

        :where(.wp-site-blocks)> :last-child {
            margin-block-end: 0;
        }

        :root {
            --wp--style--block-gap: 0px;
        }

        :root :where(.is-layout-flow)> :first-child {
            margin-block-start: 0;
        }

        :root :where(.is-layout-flow)> :last-child {
            margin-block-end: 0;
        }

        :root :where(.is-layout-flow)>* {
            margin-block-start: 0px;
            margin-block-end: 0;
        }

        :root :where(.is-layout-constrained)> :first-child {
            margin-block-start: 0;
        }

        :root :where(.is-layout-constrained)> :last-child {
            margin-block-end: 0;
        }

        :root :where(.is-layout-constrained)>* {
            margin-block-start: 0px;
            margin-block-end: 0;
        }

        :root :where(.is-layout-flex) {
            gap: 0px;
        }

        :root :where(.is-layout-grid) {
            gap: 0px;
        }

        .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        body {
            font-family: var(--wp--preset--font-family--inter);
            font-size: var(--wp--preset--font-size--synergy-regular);
            font-weight: var(--wp--custom--font-weight--regular);
            letter-spacing: clamp(-0.026rem, calc(-0.024vw + -0.004rem), -0.01rem);
            line-height: var(--wp--custom--min-24-max-24);
            --wp--style--root--padding-top: 0px;
            --wp--style--root--padding-right: 24px;
            --wp--style--root--padding-bottom: 0px;
            --wp--style--root--padding-left: 24px;
        }

        a:where(:not(.wp-element-button)) {
            text-decoration: underline;
        }

        h1 {
            color: var(--wp--preset--color--synergy-onyx);
            font-size: var(--wp--custom--min-36-max-64);
            font-style: normal;
            font-weight: var(--wp--custom--font-weight--medium);
            letter-spacing: clamp(-0.24rem, calc(-0.158vw + -0.098rem), -0.135rem);
            line-height: var(--wp--custom--min-36-max-64);
            padding-bottom: var(--wp--custom--min-16-max-24);
        }

        h2 {
            color: var(--wp--preset--color--synergy-onyx);
            font-size: var(--wp--custom--min-32-max-40);
            font-style: normal;
            font-weight: var(--wp--custom--font-weight--medium);
            letter-spacing: clamp(-0.125rem, calc(-0.053vw + -0.078rem), -0.09rem);
            line-height: var(--wp--custom--min-36-max-48);
            padding-bottom: var(--wp--custom--min-16-max-16);
        }

        h3 {
            color: var(--wp--preset--color--synergy-onyx);
            font-size: var(--wp--custom--min-24-max-32);
            font-style: normal;
            font-weight: var(--wp--custom--font-weight--medium);
            letter-spacing: clamp(-0.1rem, calc(-0.038vw + -0.066rem), -0.075rem);
            line-height: var(--wp--custom--min-32-max-40);
            padding-bottom: var(--wp--custom--min-16-max-16);
        }

        h4 {
            color: var(--wp--preset--color--synergy-onyx);
            font-size: var(--wp--custom--min-20-max-24);
            font-style: normal;
            font-weight: var(--wp--custom--font-weight--medium);
            letter-spacing: clamp(-0.045rem, calc(-0.017vw + -0.03rem), -0.034rem);
            line-height: var(--wp--custom--min-28-max-32);
            padding-bottom: var(--wp--custom--min-8-max-8);
        }

        h5 {
            color: var(--wp--preset--color--synergy-onyx);
            font-size: var(--wp--custom--min-18-max-20);
            font-style: normal;
            font-weight: var(--wp--custom--font-weight--medium);
            letter-spacing: clamp(-0.045rem, calc(-0.017vw + -0.03rem), -0.034rem);
            line-height: var(--wp--custom--min-24-max-28);
            padding-bottom: var(--wp--custom--min-8-max-8);
        }

        :root :where(.wp-element-button, .wp-block-button__link) {
            background-color: #32373c;
            border-width: 0;
            color: #fff;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            padding: calc(0.667em + 2px) calc(1.333em + 2px);
            text-decoration: none;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-synergy-white-color {
            color: var(--wp--preset--color--synergy-white) !important;
        }

        .has-synergy-paper-color {
            color: var(--wp--preset--color--synergy-paper) !important;
        }

        .has-synergy-rhino-color {
            color: var(--wp--preset--color--synergy-rhino) !important;
        }

        .has-synergy-pebble-color {
            color: var(--wp--preset--color--synergy-pebble) !important;
        }

        .has-synergy-gunmetal-color {
            color: var(--wp--preset--color--synergy-gunmetal) !important;
        }

        .has-synergy-onyx-color {
            color: var(--wp--preset--color--synergy-onyx) !important;
        }

        .has-synergy-misty-blue-color {
            color: var(--wp--preset--color--synergy-misty-blue) !important;
        }

        .has-synergy-blueberry-color {
            color: var(--wp--preset--color--synergy-blueberry) !important;
        }

        .has-synergy-magenta-color {
            color: var(--wp--preset--color--synergy-magenta) !important;
        }

        .has-synergy-melon-color {
            color: var(--wp--preset--color--synergy-melon) !important;
        }

        .has-synergy-gold-color {
            color: var(--wp--preset--color--synergy-gold) !important;
        }

        .has-synergy-sage-green-color {
            color: var(--wp--preset--color--synergy-sage-green) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-synergy-white-background-color {
            background-color: var(--wp--preset--color--synergy-white) !important;
        }

        .has-synergy-paper-background-color {
            background-color: var(--wp--preset--color--synergy-paper) !important;
        }

        .has-synergy-rhino-background-color {
            background-color: var(--wp--preset--color--synergy-rhino) !important;
        }

        .has-synergy-pebble-background-color {
            background-color: var(--wp--preset--color--synergy-pebble) !important;
        }

        .has-synergy-gunmetal-background-color {
            background-color: var(--wp--preset--color--synergy-gunmetal) !important;
        }

        .has-synergy-onyx-background-color {
            background-color: var(--wp--preset--color--synergy-onyx) !important;
        }

        .has-synergy-misty-blue-background-color {
            background-color: var(--wp--preset--color--synergy-misty-blue) !important;
        }

        .has-synergy-blueberry-background-color {
            background-color: var(--wp--preset--color--synergy-blueberry) !important;
        }

        .has-synergy-magenta-background-color {
            background-color: var(--wp--preset--color--synergy-magenta) !important;
        }

        .has-synergy-melon-background-color {
            background-color: var(--wp--preset--color--synergy-melon) !important;
        }

        .has-synergy-gold-background-color {
            background-color: var(--wp--preset--color--synergy-gold) !important;
        }

        .has-synergy-sage-green-background-color {
            background-color: var(--wp--preset--color--synergy-sage-green) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-synergy-white-border-color {
            border-color: var(--wp--preset--color--synergy-white) !important;
        }

        .has-synergy-paper-border-color {
            border-color: var(--wp--preset--color--synergy-paper) !important;
        }

        .has-synergy-rhino-border-color {
            border-color: var(--wp--preset--color--synergy-rhino) !important;
        }

        .has-synergy-pebble-border-color {
            border-color: var(--wp--preset--color--synergy-pebble) !important;
        }

        .has-synergy-gunmetal-border-color {
            border-color: var(--wp--preset--color--synergy-gunmetal) !important;
        }

        .has-synergy-onyx-border-color {
            border-color: var(--wp--preset--color--synergy-onyx) !important;
        }

        .has-synergy-misty-blue-border-color {
            border-color: var(--wp--preset--color--synergy-misty-blue) !important;
        }

        .has-synergy-blueberry-border-color {
            border-color: var(--wp--preset--color--synergy-blueberry) !important;
        }

        .has-synergy-magenta-border-color {
            border-color: var(--wp--preset--color--synergy-magenta) !important;
        }

        .has-synergy-melon-border-color {
            border-color: var(--wp--preset--color--synergy-melon) !important;
        }

        .has-synergy-gold-border-color {
            border-color: var(--wp--preset--color--synergy-gold) !important;
        }

        .has-synergy-sage-green-border-color {
            border-color: var(--wp--preset--color--synergy-sage-green) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .has-synergy-xsmall-font-size {
            font-size: var(--wp--preset--font-size--synergy-xsmall) !important;
        }

        .has-synergy-small-font-size {
            font-size: var(--wp--preset--font-size--synergy-small) !important;
        }

        .has-synergy-regular-font-size {
            font-size: var(--wp--preset--font-size--synergy-regular) !important;
        }

        .has-synergy-medium-font-size {
            font-size: var(--wp--preset--font-size--synergy-medium) !important;
        }

        .has-synergy-large-font-size {
            font-size: var(--wp--preset--font-size--synergy-large) !important;
        }

        .has-synergy-massive-font-size {
            font-size: var(--wp--preset--font-size--synergy-massive) !important;
        }

        .has-inter-font-family {
            font-family: var(--wp--preset--font-family--inter) !important;
        }

        .wp-block-heading.has-header-5-font-size {
            font-size: var(--wp--preset--font-size--header-5) !important;
        }

        .wp-block-heading.has-header-4-font-size {
            font-size: var(--wp--preset--font-size--header-4) !important;
        }

        .wp-block-heading.has-header-3-font-size {
            font-size: var(--wp--preset--font-size--header-3) !important;
        }

        .wp-block-heading.has-header-2-font-size {
            font-size: var(--wp--preset--font-size--header-2) !important;
        }

        .wp-block-heading.has-header-1-font-size {
            font-size: var(--wp--preset--font-size--header-1) !important;
        }

        p.has-xsmall-font-size {
            font-size: var(--wp--preset--font-size--xsmall) !important;
        }

        p.has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        p.has-regular-font-size {
            font-size: var(--wp--preset--font-size--regular) !important;
        }

        p.has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        p.has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }
    </style>
    <style id='core-block-supports-inline-css'>
        .wp-elements-c39fc7f7344103e3557720aced4248f3 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-dca1115e53e68c61750f247d03f83bf9 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-6d7d5ca78e1216aa7518ac58e1b99f09 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-group-is-layout-1>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-elements-52c2cb085417f8a3c207cfdd8eb39470 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-bef556df93e23cfa8364d4edd4fdbd06 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-c68bcdc3e36231278f0f0341ad4f57e2 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-group-is-layout-2>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-3>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-elements-60449646785c501c28518623e71fa0da a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-6743c1343c89afacdceea6bbeb86ab85 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-group-is-layout-4>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-6>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-8>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-elements-343d58b2a9cf6e7a64ae22edd1bb4fb9 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-cbf7d06e458d8a8a4950233ec2c0c1b2 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-group-is-layout-9>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-10>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-12>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-14>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-16>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-18>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-19>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-20>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-20>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-20>*+* {
            margin-block-start: var(--wp--preset--spacing--16);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-21>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-22>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-23>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-elements-bb05040557279b73bfe8373adf397ced a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-gunmetal);
        }

        .wp-container-core-buttons-is-layout-17 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-27>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-27>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-27>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-buttons-is-layout-18 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-31>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-31>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-31>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-1 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-container-core-buttons-is-layout-19 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-35>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-35>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-35>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-2 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-elements-33708c64efcc5d9842c44262867f8613 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-4247715a132215c6362ccc42d522ca58 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-3e5c82668a1698613e2c0de48ded645d a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-buttons-is-layout-20 {
            justify-content: flex-start;
        }

        .wp-container-core-columns-is-layout-3 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--40);
        }

        .wp-container-core-group-is-layout-36>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-37>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-37>*+* {
            margin-block-start: var(--wp--preset--spacing--24);
            margin-block-end: 0;
        }

        .wp-container-core-buttons-is-layout-21 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-41>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-41>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-41>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-buttons-is-layout-22 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-45>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-45>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-45>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-4 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-container-core-columns-is-layout-5 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-container-core-buttons-is-layout-23 {
            justify-content: flex-start;
        }

        .wp-container-core-columns-is-layout-6 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--40);
        }

        .wp-container-core-group-is-layout-46>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-47>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-47>*+* {
            margin-block-start: var(--wp--preset--spacing--24);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-48>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-49>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-50>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-52>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-54>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-55>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-56>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-buttons-is-layout-31 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-60>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-60>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-60>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-buttons-is-layout-32 {
            justify-content: flex-start;
        }

        .wp-container-core-group-is-layout-64>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--24) * -1);
            margin-left: calc(var(--wp--preset--spacing--24) * -1);
        }

        .wp-container-core-group-is-layout-64>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-64>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-7 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-container-core-columns-is-layout-8 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--8) var(--wp--preset--spacing--8);
        }

        .wp-container-core-buttons-is-layout-33 {
            justify-content: flex-start;
        }

        .wp-container-core-columns-is-layout-9 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--40);
        }

        .wp-container-core-group-is-layout-65>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--16) * -1);
            margin-left: calc(var(--wp--preset--spacing--16) * -1);
        }

        .wp-container-core-group-is-layout-66>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-66>*+* {
            margin-block-start: var(--wp--preset--spacing--24);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-67>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-elements-de9858a896a3b19887fb3a96cb5938a1 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-cb2eced2dda073775c1fddb39d926a65 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-buttons-is-layout-35 {
            justify-content: center;
        }

        .wp-container-core-columns-is-layout-10 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--100);
        }

        .wp-container-core-group-is-layout-68> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-70> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 570px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-70>.alignwide {
            max-width: 570px;
        }

        .wp-container-core-group-is-layout-70 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-71> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 800px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-71>.alignwide {
            max-width: 800px;
        }

        .wp-container-core-group-is-layout-71 .alignfull {
            max-width: none;
        }

        .wp-container-core-columns-is-layout-11 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--100);
        }

        .wp-container-core-group-is-layout-72>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-72>*+* {
            margin-block-start: var(--wp--preset--spacing--64);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-73>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-74>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-74>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-76> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 203px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-76>.alignwide {
            max-width: 203px;
        }

        .wp-container-core-group-is-layout-76 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-77> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 1000px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-77>.alignwide {
            max-width: 1000px;
        }

        .wp-container-core-group-is-layout-77 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-79>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-79> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-80> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-80>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-80>*+* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-82>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-82> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-83> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-83>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-83>*+* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-85>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-85> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-86> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-86>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-86>*+* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-12 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--36);
        }

        .wp-container-core-group-is-layout-87>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--36) * -1);
        }

        .wp-container-core-group-is-layout-88>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-89>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-89>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-90> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-91>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-92> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 360px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-92>.alignwide {
            max-width: 360px;
        }

        .wp-container-core-group-is-layout-92 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-94>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--36) * -1);
        }

        .wp-container-core-group-is-layout-94> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-94>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-94>*+* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-95> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 360px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-95>.alignwide {
            max-width: 360px;
        }

        .wp-container-core-group-is-layout-95 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-97>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--36) * -1);
        }

        .wp-container-core-group-is-layout-97> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-97>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-97>*+* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-columns-is-layout-13 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--16);
        }

        .wp-container-core-columns-is-layout-14 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--36);
        }

        .wp-container-core-group-is-layout-98>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--36) * -1);
        }

        .wp-container-core-buttons-is-layout-37 {
            justify-content: center;
        }

        .wp-container-core-group-is-layout-99>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--36) * -1);
        }

        .wp-container-core-group-is-layout-101> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 506px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-101>.alignwide {
            max-width: 506px;
        }

        .wp-container-core-group-is-layout-101 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-102> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 300px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-102>.alignwide {
            max-width: 300px;
        }

        .wp-container-core-group-is-layout-102 .alignfull {
            max-width: none;
        }

        .wp-container-core-columns-is-layout-15 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--100);
        }

        .wp-container-core-group-is-layout-104>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-104>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-104>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-105>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-106>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-106>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-elements-5550eb9cc8e750eff2889bbd8406b0a0 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-elements-d3a9e565e60eb02ea88127b55580a7db a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-white);
        }

        .wp-container-core-buttons-is-layout-39 {
            justify-content: center;
        }

        .wp-container-core-columns-is-layout-16 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--100);
        }

        .wp-container-core-group-is-layout-107> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-108>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-109>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--100) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-109> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            margin-left: 0 !important;
        }

        .wp-container-core-group-is-layout-110>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-110>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-111> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 500px;
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-111>.alignwide {
            max-width: 500px;
        }

        .wp-container-core-group-is-layout-111 .alignfull {
            max-width: none;
        }

        .wp-container-core-columns-is-layout-17 {
            flex-wrap: nowrap;
            gap: 2em var(--wp--preset--spacing--80);
        }

        .wp-container-core-group-is-layout-112>.alignfull {
            margin-right: calc(var(--wp--preset--spacing--36) * -1);
            margin-left: calc(var(--wp--preset--spacing--100) * -1);
        }

        .wp-container-core-group-is-layout-113>* {
            margin-block-start: 0;
            margin-block-end: 0;
        }

        .wp-container-core-group-is-layout-113>*+* {
            margin-block-start: var(--wp--preset--spacing--36);
            margin-block-end: 0;
        }

        .wp-container-core-buttons-is-layout-40 {
            gap: var(--wp--preset--spacing--16);
        }

        .wp-elements-fef52660dc915f1f1e6f6f69799c41d2 a:where(:not(.wp-element-button)) {
            color: var(--wp--preset--color--synergy-black);
        }

        .wp-elements-fef52660dc915f1f1e6f6f69799c41d2 a:where(:not(.wp-element-button)):hover {
            color: var(--wp--preset--color--synergy-black);
        }

        .wp-container-core-group-is-layout-114 {
            flex-direction: column;
            align-items: center;
        }

        .wp-container-core-group-is-layout-116>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-118>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-columns-is-layout-18 {
            flex-wrap: nowrap;
            gap: var(--wp--preset--spacing--16) var(--wp--preset--spacing--16);
        }

        .wp-container-core-group-is-layout-119> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: 869px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .wp-container-core-group-is-layout-119>.alignwide {
            max-width: 869px;
        }

        .wp-container-core-group-is-layout-119 .alignfull {
            max-width: none;
        }

        .wp-container-core-group-is-layout-119>.alignfull {
            margin-right: calc(0px * -1);
            margin-left: calc(0px * -1);
        }

        .wp-container-core-group-is-layout-120 {
            flex-direction: column;
            align-items: center;
        }
    </style>
    <style id='wp-block-template-skip-link-inline-css'>
        .skip-link.screen-reader-text {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute !important;
            width: 1px;
            word-wrap: normal !important;
        }

        .skip-link.screen-reader-text:focus {
            background-color: #eee;
            clip: auto !important;
            clip-path: none;
            color: #444;
            display: block;
            font-size: 1em;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="wp-block-template-part">
        <div class="header-menu-wrapper">
            <div class="header-menu">
                <div id="block-13" class="widget widget_block">
                    <section class="navbar-wrapper">
                        <div class="navbar js-navbar is-scrolled">
                            <div class="logo">
                                <a href="https://tipalti.com/en-eu/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="92" height="46" viewBox="0 0 92 46" fill="none">
                                        <path d="M6.58218 38.4264C2.68246 38.4264 1.14448 36.2622 1.79947 32.6556L3.5281 23.1342H0L0.674319 19.4188H4.19984L5.26768 13.5391H9.91256L8.84472 19.4188H13.7099L13.0349 23.1342H8.17041L6.51327 32.259C6.25178 33.7014 6.80889 34.315 8.29406 34.315C9.31072 34.3177 10.3265 34.2573 11.3353 34.1343L10.6474 37.9217C9.31853 38.2499 7.95336 38.4194 6.58218 38.4264Z" fill="#141414"></path>
                                        <path d="M13.1953 38.0713L16.5817 19.4189H21.2723L17.8859 38.0713H13.1953Z" fill="#141414"></path>
                                        <path d="M75.7938 38.4264C71.8941 38.4264 70.3561 36.2622 71.0111 32.6556L72.7397 23.1342H69.2148L69.8892 19.4188H73.4147L74.4825 13.5391H79.1274L78.0596 19.4188H82.9247L82.2498 23.1342H77.3852L75.7281 32.259C75.4666 33.7014 76.0237 34.315 77.5089 34.315C78.5256 34.3176 79.5414 34.2573 80.5501 34.1343L79.8623 37.9217C78.5323 38.2502 77.1661 38.4197 75.7938 38.4264Z" fill="#141414"></path>
                                        <path d="M82.4062 38.0713L85.7927 19.4189H90.4833L87.0969 38.0713H82.4062Z" fill="#141414"></path>
                                        <path d="M34.9768 37.0961C33.6243 38.0281 31.9723 38.6017 30.0177 38.6017C27.7294 38.6017 26.0246 37.813 25.3296 36.774L23.7865 45.2689H19.1719L23.8509 19.4983H28.1602L27.7609 21.5418C29.2178 19.8211 31.4964 19.068 33.5986 19.068C35.5178 19.068 36.9508 19.7135 37.9627 20.6455C39.9206 22.4713 40.5543 25.2692 39.9193 28.7801C39.2553 32.4368 37.5968 35.2684 34.9768 37.0961ZM34.8306 24.2734C34.3154 23.449 33.4356 22.8029 31.9968 22.8029C28.3773 22.8029 27.0331 26.1386 26.5443 28.8289C26.0555 31.5192 26.1959 34.8187 29.8148 34.8187C31.2555 34.8187 32.3697 34.1732 33.1845 33.3481C34.3656 32.129 34.9305 30.4427 35.2235 28.8289C35.5166 27.2151 35.5694 25.4931 34.8306 24.2734Z" fill="#141414"></path>
                                        <path d="M55.1729 38.4123C53.1763 38.4123 52.292 37.1925 52.3983 35.7933C51.239 37.3001 48.7878 38.5912 46.0551 38.5912C41.4752 38.5912 39.6197 35.7933 40.173 32.7446C40.817 29.1937 44.0327 27.1495 47.7347 26.8981L53.4571 26.504L53.6651 25.3562C53.9872 23.5986 53.5717 22.4164 50.9492 22.4164C48.8071 22.4164 47.3824 23.349 46.9561 25.071H42.4902C43.5104 20.8745 47.2839 19.0093 51.5681 19.0093C54.8528 19.0093 57.4792 20.0138 58.0795 22.8111C58.3442 23.9951 58.1773 25.3218 57.9506 26.5772L56.6928 33.4983C56.5363 34.359 56.7733 34.6818 57.5488 34.6818C57.7521 34.6778 57.9545 34.6537 58.1529 34.6099L57.5558 37.91C56.7186 38.2327 56.2806 38.4123 55.1729 38.4123ZM52.8543 29.8354L47.9144 30.1938C46.4911 30.3014 44.975 31.1264 44.7019 32.6333C44.4443 34.0682 45.5714 34.9651 47.0115 34.9651C49.8917 34.9651 52.1967 33.4583 52.6984 30.6967L52.8543 29.8354Z" fill="#141414"></path>
                                        <path d="M64.8123 38.3224C61.6733 38.3224 59.8351 36.8519 60.4798 33.3009L64.0601 13.5352H68.7133L65.2703 32.5453C65.0771 33.6212 65.2059 34.3386 66.7909 34.3386C67.1973 34.3386 67.3145 34.3024 67.5727 34.3024L66.8894 38.0685C65.9336 38.2505 65.7366 38.3224 64.8123 38.3224Z" fill="#141414"></path>
                                        <path d="M91.9972 10.5044C92.0191 11.1347 91.8691 11.7594 91.5621 12.3151C91.2552 12.8708 90.8024 13.3379 90.2497 13.6688C89.6969 13.9997 89.0639 14.1827 88.4148 14.1993C87.7657 14.2159 87.1236 14.0655 86.5537 13.7633C86.4893 13.7263 86.4249 13.6894 86.3605 13.6538C86.3566 13.6488 86.3547 13.6469 86.3508 13.6469C76.6643 8.11562 65.302 5.09884 53.2416 5.4879C40.881 5.88697 29.4948 9.80697 20.073 16.2271C20.0241 16.2584 19.9732 16.2896 19.9249 16.3253C19.8386 16.3682 19.7436 16.3922 19.6467 16.3954C19.5591 16.3983 19.4718 16.3844 19.3898 16.3546C19.3078 16.3247 19.2326 16.2794 19.1686 16.2213C19.1046 16.1632 19.053 16.0935 19.0168 16.016C18.9806 15.9385 18.9604 15.8549 18.9575 15.7699C18.9529 15.6545 18.9807 15.5401 19.038 15.439C19.1482 15.3401 19.2583 15.2457 19.3697 15.1487C29.7209 6.16093 43.2549 0.515802 58.2188 0.0335423C69.6513 -0.335502 80.4571 2.35602 89.8029 7.35189C89.8068 7.35189 89.8087 7.35189 89.8126 7.35689L90.0741 7.49575C90.4662 7.70118 90.8175 7.97271 91.1116 8.29764C91.6576 8.91347 91.9701 9.6922 91.9972 10.5044Z" fill="#FFBD01"></path>
                                    </svg>
                                </a>
                            </div>
                            <nav class="main-nav">
                                <ul>
                                    <li class="main-nav__tab-item" data-has-sub="true" id="js-megamenu-products" data-id="products">
                                        <a href="/en-eu/accounts-payable-software/" class="main-nav__tab-item-link">Products</a>
                                    </li>

                                    <li class="main-nav__tab-item" data-has-sub="true" id="js-megamenu-solutions" data-id="solutions">
                                        <a href="/en-eu/industries/" class="main-nav__tab-item-link">Solutions</a>
                                    </li>

                                    <li class="main-nav__tab-item" data-has-sub="true" id="js-megamenu-resources" data-id="resources">
                                        <a href="/en-eu/resources/" class="main-nav__tab-item-link">Resources</a>
                                    </li>

                                    <li class="main-nav__tab-item" data-has-sub="true" id="js-megamenu-pricing" data-id="pricing">
                                        <a href="/en-eu/pricing/" class="main-nav__tab-item-link">Pricing</a>
                                    </li>

                                    <li class="main-nav__tab-item" data-has-sub="true" id="js-megamenu-company" data-id="company">
                                        <a href="/en-eu/company/" class="main-nav__tab-item-link">Company</a>
                                    </li>

                                    <li class="search-area js-search-area">
                                        <a class="js-search-btn btn-search" href="javascript:void(0);">
                                            <span>Search</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="js-megamenu-search" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <circle cx="10" cy="10" r="7" stroke="#141414" stroke-width="2"></circle>
                                                <path d="M20.5 20.5L15 15" stroke="#141414" stroke-width="2" stroke-linecap="round"></path>
                                            </svg>
                                        </a>
                                        <form action="https://tipalti.com/en-eu/" method="get">
                                            <input type="text" name="s" class="js-search-input input-search" placeholder="Search">
                                        </form>
                                    </li>
                                    <li>
                                        <a href="https://hub.tipalti.com" target="_blank" class="btn-login" rel="noreferrer noopener" aria-label="opens new tab">
                                            <div class="tab-item__icon tab-item__icon--bg-black">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                                        <path d="M19.4416 10.5L27 18.2145M27 18.2145H9M27 18.2145L19.4416 25.9286" stroke="#141414" stroke-width="2.62226" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </i>
                                            </div>
                                            Log In
                                        </a>
                                    </li>
                                </ul>
                                <!-- Desktop Template -->

                            </nav>
                            <div class="tgt-mobile-menu" id="js-mobile-menu" data-id="mobile-menu">

                            </div>
                            <div class="btn-getStarted-area">
                                <a href="javascript:void(0);" class="btn-get-started js-get-started-popup js-get-started-popup__header" role="button" aria-label="Get Started - Opens popup form">
                                    Get Started
                                </a><a href="javascript:void(0);" class="btn-hamburger js-megamenu-hamburger" role="button" aria-label="Toggle mobile menu" aria-expanded="false">
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </header>