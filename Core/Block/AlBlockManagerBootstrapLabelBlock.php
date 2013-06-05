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

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlockContainer;

/**
 * Defines the Block Manager to handle the Bootstrap Label
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBootstrapLabelBlock extends AlBlockManagerJsonBlockContainer
{
    protected $formParam = 'bootstraplabelblock.form';    
    protected $blockTemplate = 'BootstrapLabelBlockBundle:Label:label.html.twig';    
    protected $editorTemplate = 'BootstrapLabelBlockBundle:Editor:label_editor.html.twig';

    /**
     * {@inheritdoc}
     */
    public function getDefaultValue()
    {
        $value = 
            '
                {
                    "0" : {
                        "label_text": "Label 1",
                        "label_type": ""
                    }
                }
            ';
        
        return array('Content' => $value);
    }
    
    /**
     * {@inheritdoc}
     */
    protected function renderHtml()
    {
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        
        return array('RenderView' => array(
            'view' => $this->blockTemplate,
            'options' => array('data' => $items[0]),
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function editorParameters()
    {        
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        $item = $items[0];
        
        $formClass = $this->container->get($this->formParam);
        $form = $this->container->get('form.factory')->create($formClass, $item);
        
        return array(
            "template" => $this->editorTemplate,
            "title" => "Bootstrap label editor",
            "form" => $form->createView(),
        );
    }
}
