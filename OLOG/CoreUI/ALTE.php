<?php

namespace OLOG\AdminLTE;

class ALTE
{
    public static function box($heading_str, $buttons_html, $body_html_or_collable) {
        $body_html = '';

        if (is_callable($body_html_or_collable)) {
            ob_start();
            $body_html_or_collable();
            $body_html = ob_get_clean();
        } else {
            $body_html = $body_html_or_collable;
        }

        $html = '';
        $html .= '<div class="box">';
        $html .= '<div class="box-header with-border">';
        $html .= '<h3 class="box-title">' . $heading_str . '</h3>';

        if ($buttons_html != ''){
            $html .= '<div class="box-tools pull-right">' . $buttons_html . '</div>';
        }

        $html .= '</div>';
        $html .= '<div class="box-body">';
        $html .= $body_html;
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public static function boxForTable($heading_str, $buttons_html, $body_html_or_collable) {
        $body_html = '';

        if (is_callable($body_html_or_collable)) {
            ob_start();
            $body_html_or_collable();
            $body_html = ob_get_clean();
        } else {
            $body_html = $body_html_or_collable;
        }

        $html = '';
        $html .= '<div class="box">';
        $html .= '<div class="box-header">';
        $html .= '<h3 class="box-title">' . $heading_str . '</h3>';

        if ($buttons_html != ''){
            $html .= '<div class="box-tools pull-right">' . $buttons_html . '</div>';
        }

        $html .= '</div>';
        $html .= '<div class="box-body no-padding">';
        $html .= $body_html;
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
