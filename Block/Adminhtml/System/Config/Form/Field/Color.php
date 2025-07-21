<?php
declare(strict_types=1);

namespace Indexiz\AdminCustomizer\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * @Color
 */
class Color extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $value = ltrim($element->getEscapedValue(), '#') ?: '000000'; // fallback to white
        $htmlId = $element->getHtmlId();

        $html = <<<HTML
<input id="{$htmlId}" name="{$element->getName()}" value="{$value}"
       class="input-text admin__control-text"
       type="text"
       style="background-color: #{$value}; width: 100%;" />

<script>
require(['jquery', 'jquery/colorpicker/js/colorpicker', 'domReady!'], function ($) {
    var el = $('#{$htmlId}');
    el.ColorPicker({
        layout: 'hex',
        color: '{$value}',
        onChange: function (hsb, hex, rgb) {
            el.val(hex).css('background-color', '#' + hex);
        }
    });

    el.on('keyup', function () {
        var val = $(this).val();
        el.ColorPickerSetColor(val);
        el.css('background-color', '#' + val);
    });
});
</script>
HTML;

        return $html;
    }
}
