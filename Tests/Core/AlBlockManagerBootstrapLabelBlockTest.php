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

use AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block\AlBlockManagerBootstrapLabelBlock;

/**
 * AlBlockManagerBootstrapLabelBlockTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBootstrapLabelBlockTest extends AlBlockManagerTestBase
{  
 
    protected function getBlockManager()
    {
        return new AlBlockManagerBootstrapLabelBlock($this->container, $this->validator);
    }
     
    public function testDefaultValue()
    {
        $expectedValue = array(
            'Content' => '
                {
                    "0" : {
                        "label_text": "Label 1",
                        "label_type": ""
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
                "label_text": "My custom label",
                "label_type": ""
            }
        }';
        
        $this->editorParameters($value, 'bootstraplabelblock.form');
    }
    
    public function testGetHtml()
    {
        $value =
        '{
            "0" : {
                "label_text": "My custom label",
                "label_type": "primary"
            }
        }';
        
        $expectedData = array(
            'label_text' => 'My custom label',
            'label_type' => 'primary',
        );
        
        $this->getHtml($value, 'BootstrapLabelBlockBundle:Label:label.html.twig', $expectedData );        
    }
}
