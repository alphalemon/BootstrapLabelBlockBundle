<?php
/*
 * This file is part of the BootstrapLabelBlockBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 * 
 * @license    MIT LICENSE
 * 
 */

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block;

use AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block\AlBlockManagerBootstrapLabelBlock;

/**
 * Defines the Block Manager to handle the Bootstrap Badge
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBootstrapBadgeBlock extends AlBlockManagerBootstrapLabelBlock
{
    protected $formParam = 'bootstrapbadgeblock.form';    
    protected $blockTemplate = 'BootstrapLabelBlockBundle:Badge:badge.html.twig';    
    protected $editorTemplate = 'BootstrapLabelBlockBundle:Editor:badge_editor.html.twig';
    
    /**
     * {@inheritdoc}
     */
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
