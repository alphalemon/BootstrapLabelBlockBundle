<?php
/*
 * This file is part of the BusinessDropCapBundle and it is distributed
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

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Form;

use AlphaLemon\AlphaLemonCmsBundle\Core\Form\JsonBlock\JsonBlockType;
use Symfony\Component\Form\FormBuilderInterface;

class AlLabelType extends JsonBlockType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('label_text');
        $builder->add('label_type', 'choice', array('choices' => array('' => 'base', 'label-info' => 'info', 'label-success' => 'success', 'label-warning' => 'warning', 'label-important' => 'important', 'label-inverse' => 'inverse')));
    }
}
