<?PHP 
function view_r($arr, $tab="", $encode=false, $focus_attr=null, $style=null) {
    $return_debug = "<div style='width: 100%;'><pre>";
    $return_debug.= "<pre>" . $tab . "[</pre>";
    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $return_debug.= "<pre>" . $tab . "<span class='array_key'>$key</span>   =>   </pre>";
                $return_debug.=view_r($value, $tab . "        ", $encode, $focus_attr, $style);
            } else {
                if ($encode) {
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . $value . "</span></pre>";
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . encode_html($value, $tab, $focus_attr, $style) . "</span></pre>";
                }
                else
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . $value . "</span></pre>";
            }
        //echo "<pre>".$tab."        ]</pre><br />";
        }
        $return_debug.= "<pre>" . $tab . "]</pre><br />";
    }
    $return_debug.= "</pre></div>";
    echo $return_debug;
}

function get_r($arr, $tab="", $encode=false, $focus_attr=null, $style=null) {
    $return_debug = "<div style='width: 100%;'><pre>";
    $return_debug.= "<pre>" . $tab . "[</pre>";
    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $return_debug.= "<pre>" . $tab . "<span class='array_key'>$key</span>   =>   </pre>";
                $return_debug.=view_r($value, $tab . "        ", $encode, $focus_attr, $style);
            } else {
                if ($encode) {
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . $value . "</span></pre>";
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . encode_html($value, $tab, $focus_attr, $style) . "</span></pre>";
                }
                else
                    $return_debug.= "<pre>" . $tab . "<span class='array_key'>" . $key . "</span>   =>     <span class='array_value'>" . $value . "</span></pre>";
            }
        //echo "<pre>".$tab."        ]</pre><br />";
        }
        $return_debug.= "<pre>" . $tab . "]</pre><br />";
    }
    $return_debug.= "</pre></div>";
    return $return_debug;
}

function encode_html($str, $tab, $focus_attr=null, $style=null) {
    $skip = 0;
    $current_tag = null;
    $html_close = false;
    $html_open = false;
    $return_str = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str{$i} == "<" && $skip == 0) {
            $return_str.="<mark>&lt;</mark>";
            $tag_arr = get_tag($str, $i, $focus_attr, $style);
            $return_str.=$tag_arr["value"];
            $skip = $tag_arr["skip"];
            $html_open = true;
        } elseif ($str{$i} == ">" && $skip == 0) {
            $return_str.="<mark>&gt;</mark>\n$tab        ";
            $html_close = true;
        } elseif ($str{$i} == "'" && $skip == 0 && $html_open) {
        //$return_str.="<quote>'</quote>";
            $quoted = get_quoted_value($str, $i, $focus_attr, $style, $current_tag);
            $return_str.=$quoted['value'];
            $skip = $quoted['skip'];
        } elseif ($str{$i} == " " && $skip == 0 && $html_open) {
        //$return_str.="<quote>'</quote>";
            $current_tag = get_current_tag($str, $i);
            $attr = get_attr($str, $i, $focus_attr, $style);
            $return_str.=$attr['value'];
            $skip = $attr['skip'];
        } elseif ($skip > 0) {
            $skip--;
        }
        else
            $return_str.=$str{$i};
    }

    return $return_str;
}

function get_current_tag($str, $index) {
    for ($new = $index + 1; $new < strlen($str); $new++) {
        if ($str{$new} != "=" && $str{$new} != "/" && $str{$new} != ">" && $str{$new} != "<") {
            $cur_tag.=$str{$new};
        } else {
            break;
        }
    }
    return trim($cur_tag);
}

function get_attr($str, $index, $focus_attr=null, $style=null, $current_tag=null) {
    $count = 0;
    $return_quoted_arr = null;
    if (isset($current_tag))
        $quoted_text.="<attr" . check_focus($focus_attr, $current_tag, $style) . "> ";
    else
        $quoted_text.="<attr" . check_focus($focus_attr, "attr", $style) . "> ";
    for ($s = $index + 1; $s < strlen($str); $s++) {
        if ($str{$s} != "=" && $str{$s} != ">" && $str{$s} != "/")
            $quoted_text.=$str{$s};
        else {
            $quoted_text.="</attr>";
            $count = $s;
            break;
        }
    }

    $return_quoted_arr["skip"] = $count - $index - 1;

    $return_quoted_arr["value"] = $quoted_text;
    return $return_quoted_arr;
}

function get_tag($str, $index, $focus_attr=null, $style=null) {
    $count = 0;
    $return_quoted_arr = null;
    $quoted_text.="<tag" . check_focus($focus_attr, "tag", $style) . ">";
    for ($s = $index + 1; $s < strlen($str); $s++) {
        if ($str{$s} != " " && $str{$s} != ">")
            $quoted_text.=$str{$s};
        else {
            $quoted_text.="</tag>";
            $count = $s;
            break;
        }
    }

    $return_quoted_arr["skip"] = $count - $index - 1;

    $return_quoted_arr["value"] = $quoted_text;
    return $return_quoted_arr;
}

function get_quoted_value($str, $index, $focus_attr=null, $style=null, $current_tag=null) {
    $count = 0;
    $return_quoted_arr = null;
    if (isset($current_tag))
        $quoted_text.="<qoute>'</quote><attrvalue" . check_focus($focus_attr, $current_tag, $style) . check_focus($focus_attr, "attrvalue", $style) . ">";
    else
        $quoted_text.="<qoute>'</quote><attrvalue" . check_focus($focus_attr, "attrvalue", $style) . ">";
    for ($s = $index + 1; $s < strlen($str); $s++) {
        if ($str{$s} != " " && $str{$s} != "'")
            $quoted_text.=$str{$s};
        else {
            $quoted_text.="</attrvalue><qoute>'</quote> ";
            $count = $s;
            break;
        }
    }
    $return_quoted_arr["skip"] = $count - $index;
    $return_quoted_arr["value"] = $quoted_text;
    return $return_quoted_arr;
}

function check_focus($focus_attr, $attr, $style) {
    if ($focus_attr == null) {
        return "";
    } else {
        if ($focus_attr == $attr) {
            return " style='color: white; font-size: large;background: black;" . $style . "' ";
        }
        else
            return "";
    }
}
?>