<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block;

use AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block\AlBlockManagerBootstrapLabelBlock;

/**
 * Description of AlBlockManagerBootstrapBadgeBlock
 */
class AlBlockManagerBootstrapBadgeBlock extends AlBlockManagerBootstrapLabelBlock
{
    protected $formParam = 'bootstrapbadgeblock.form';    
    protected $blockTemplate = 'BootstrapLabelBlockBundle:Badge:badge.html.twig';    
    protected $editorTemplate = 'BootstrapLabelBlockBundle:Editor:badge_editor.html.twig';
    
    public function getDefaultValue()
    {
        $value = 
            '
                {
                    "0" : {
                        "badge_text": "Badge 1",
                        "badge_type": ""
                    }
                }
            ';
        
        return array('Content' => $value);
    }
}
