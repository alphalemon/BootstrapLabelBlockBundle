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

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Tests\Unit\Core\Form;

use AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Form\Base\AlBaseType;
use AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Form\AlBadgeType;

/**
 * AlBadgeTypeTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBadgeTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'badge_text',
            'badge_type',
        );
    }
    
    protected function getForm()
    {
        return new AlBadgeType();
    }
    
    public function testDefaultOptions()
    {
        $this->assertEquals(array('csrf_protection' =>false), $this->getForm()->getDefaultOptions(array()));
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_json_block', $this->getForm()->getName());
    }
}
