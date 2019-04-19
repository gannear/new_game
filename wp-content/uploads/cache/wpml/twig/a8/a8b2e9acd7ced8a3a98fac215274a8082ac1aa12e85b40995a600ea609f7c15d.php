<?php

/* media-translation-table-row.twig */
class __TwigTemplate_d5745bf9105daa71270b87bbf8ad64db8887b6c2e12b5c3be83b7782ac6a623f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<tr class=\"wpml-media-attachment-row\" data-attachment-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "post", array()), "ID", array()), "html", null, true);
        echo "\"
    data-language-code=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), "html", null, true);
        echo "\"
    data-language-name=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), array(), "array"), "name", array()), "html", null, true);
        echo "\"
    data-is-image=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "is_image", array()), "html", null, true);
        echo "\"
    data-thumb=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "src", array()), "html", null, true);
        echo "\"
    data-file-name=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "file_name", array()), "html", null, true);
        echo "\"
    data-mime-type=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "mime_type", array()), "html", null, true);
        echo "\"
    data-title=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "post", array()), "post_title", array()), "html", null, true);
        echo "\"
    data-caption=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "post", array()), "post_excerpt", array()), "html", null, true);
        echo "\"
    data-alt_text=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "alt", array()), "html", null, true);
        echo "\"
    data-description=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "post", array()), "post_content", array()), "html", null, true);
        echo "\"
    data-flag=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), array(), "array"), "flag", array()), "html", null, true);
        echo "\">
    <td class=\"wpml-col-media-title\">
        <span title=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), array(), "array"), "name", array()), "html", null, true);
        echo "\" class=\"wpml-media-original-flag js-otgs-popover-tooltip\"
              data-tippy-distance=\"-12\">
            <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), array(), "array"), "flag", array()), "html", null, true);
        echo "\" width=\"16\" height=\"12\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), "html", null, true);
        echo "\">
        </span>
        <span class=\"wpml-media-wrapper\">
            <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "src", array()), "html", null, true);
        echo "\" width=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "width", array()), "html", null, true);
        echo "\"
                 height=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "height", array()), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), "html", null, true);
        echo "\"
                 ";
        // line 21
        if ( !$this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "is_image", array())) {
            echo "class=\"is-non-image\"";
        }
        echo ">
        </span>
    </td>
    <td class=\"wpml-col-media-translations\">
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["code"] => $context["language"]) {
            // line 26
            echo "            ";
            if ((twig_test_empty((isset($context["target_language"]) ? $context["target_language"] : null)) || ((isset($context["target_language"]) ? $context["target_language"] : null) == $context["code"]))) {
                // line 27
                echo "                ";
                if (($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()) == $context["code"])) {
                    // line 28
                    echo "                    <span class=\"js-otgs-popover-tooltip\" data-tippy-distance=\"-12\"
                          title=\"";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), array(), "array"), "name", array()), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "original_language", array()), "html", null, true);
                    echo "\">
                                    <i class=\"otgs-ico-original\"></i>
                                </span>
                ";
                } else {
                    // line 33
                    echo "                    <span class=\"wpml-media-wrapper js-otgs-popover-tooltip\"
                          id=\"media-attachment-";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "post", array()), "ID", array()), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                    echo "\"
                          data-file-name=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "file_name", array()), "html", null, true);
                    echo "\"
                          title=\"";
                    // line 36
                    echo twig_escape_filter($this->env, sprintf($this->getAttribute((isset($context["strings"]) ? $context["strings"] : null), "edit_translation", array()), $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $context["code"], array(), "array"), "name", array())), "html", null, true);
                    echo "\"
                            ";
                    // line 37
                    if ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "media_is_translated", array())) {
                        // line 38
                        echo "                          data-tippy-distance=\"-12\"
                            ";
                    }
                    // line 40
                    echo "                          data-attachment-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "id", array()), "html", null, true);
                    echo "\"
                          data-language-code=\"";
                    // line 41
                    echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                    echo "\"
                          data-language-name=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()), "html", null, true);
                    echo "\"
                          data-thumb=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "thumb", array()), "src", array()), "html", null, true);
                    echo "\"
                          data-title=\"";
                    // line 44
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "title", array()), "html", null, true);
                    echo "\"
                          data-caption=\"";
                    // line 45
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "caption", array()), "html", null, true);
                    echo "\"
                          data-alt_text=\"";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "alt", array()), "html", null, true);
                    echo "\"
                          data-description=\"";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "description", array()), "html", null, true);
                    echo "\"
                          data-flag=\"";
                    // line 48
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["languages"]) ? $context["languages"] : null), $context["code"], array(), "array"), "flag", array()), "html", null, true);
                    echo "\"
                          data-media-is-translated=\"";
                    // line 49
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "media_is_translated", array()), "html", null, true);
                    echo "\">
                                    <a class=\"js-open-media-translation-dialog ";
                    // line 50
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "media_is_translated", array())) {
                        echo "wpml-media-translation-image";
                    }
                    echo "\">
                                        <img src=\"";
                    // line 51
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "thumb", array()), "src", array()), "html", null, true);
                    echo "\"
                                             width=\"";
                    // line 52
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "width", array()), "html", null, true);
                    echo "\" height=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "thumb", array()), "height", array()), "html", null, true);
                    echo "\"
                                             alt=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "language", array()), "html", null, true);
                    echo "\"
                                             ";
                    // line 54
                    if ( !$this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "is_image", array())) {
                        echo "class=\"is-non-image\"";
                    }
                    // line 55
                    echo "                                                ";
                    if ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "media_is_translated", array())) {
                        echo "style=\"display:none\"";
                    }
                    echo ">
                                        <i class=\"";
                    // line 56
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "id", array())) {
                        echo "otgs-ico-edit";
                    } else {
                        echo "otgs-ico-add";
                    }
                    echo "\"
                                           ";
                    // line 57
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["attachment"]) ? $context["attachment"] : null), "translations", array()), $context["code"], array(), "array"), "media_is_translated", array())) {
                        echo "style=\"display:none\"";
                    }
                    echo "></i>
                                    </a>
                                </span>
                ";
                }
                // line 61
                echo "            ";
            }
            // line 62
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "media-translation-table-row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 63,  240 => 62,  237 => 61,  228 => 57,  220 => 56,  213 => 55,  209 => 54,  205 => 53,  199 => 52,  195 => 51,  189 => 50,  185 => 49,  181 => 48,  177 => 47,  173 => 46,  169 => 45,  165 => 44,  161 => 43,  157 => 42,  153 => 41,  148 => 40,  144 => 38,  142 => 37,  138 => 36,  134 => 35,  128 => 34,  125 => 33,  116 => 29,  113 => 28,  110 => 27,  107 => 26,  103 => 25,  94 => 21,  88 => 20,  82 => 19,  74 => 16,  69 => 14,  64 => 12,  60 => 11,  56 => 10,  52 => 9,  48 => 8,  44 => 7,  40 => 6,  36 => 5,  32 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "media-translation-table-row.twig", "/home/mshopphp/public_html/game_portal/wp-content/plugins/wpml-media-translation/templates/menus/media-translation-table-row.twig");
    }
}