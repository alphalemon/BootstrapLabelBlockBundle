<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\BootstrapLabelBlockBundle\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlockContainer;

/**
 * Description of AlBlockManagerBootstrapLabelBlock
 */
class AlBlockManagerBootstrapLabelBlock extends AlBlockManagerJsonBlockContainer
{
    protected $formParam = 'bootstraplabelblock.form';    
    protected $blockTemplate = 'BootstrapLabelBlockBundle:Label:label.html.twig';    
    protected $editorTemplate = 'BootstrapLabelBlockBundle:Editor:label_editor.html.twig';

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
    
    protected function renderHtml()
    {
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        
        return array('RenderView' => array(
            'view' => $this->blockTemplate,
            'options' => array('data' => $items[0]),
        ));
    }
    
    public function editorParameters()
    {        
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        $item = $items[0];
        
        $formClass = $this->container->get($this->formParam);
        $form = $this->container->get('form.factory')->create($formClass, $item);
        
        return array(
            "template" => $this->editorTemplate,
            "title" => "Badge editor",
            "form" => $form->createView(),
        );
    }
}
