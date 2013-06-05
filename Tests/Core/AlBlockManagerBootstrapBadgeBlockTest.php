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

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Tests\Core;

use AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block\AlBlockManagerBootstrapBadgeBlock;

/**
 * AlBlockManagerBootstrapBadgeBlockTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBootstrapBadgeBlockTest extends AlBlockManagerTestBase
{    
    protected function getBlockManager()
    {
        return new AlBlockManagerBootstrapBadgeBlock($this->container, $this->validator);
    }
        
    public function testDefaultValue()
    {
        $expectedValue = array(
            'Content' => '
                {
                    "0" : {
                        "badge_text": "Badge 1",
                        "badge_type": ""
                    }
                }
            '
        );
        
        $this->defaultValue($expectedValue);
    }
    
    public function testEditorParameters()
    {
        $value =
        '{
            "0" : {
                "badge_text": "My custom badge",
                "badge_type": ""
            }
        }';
        
        $this->editorParameters($value, 'bootstrapbadgeblock.form');
    }
    
    public function testGetHtml()
    {
        $value =
        '{
            "0" : {
                "badge_text": "My custom badge",
                "badge_type": "danger"
            }
        }';
        
        $expectedData = array(
            'badge_text' => 'My custom badge',
            'badge_type' => 'danger',
        );
        
        $this->getHtml($value, 'BootstrapLabelBlockBundle:Badge:badge.html.twig', $expectedData );        
    }
}
