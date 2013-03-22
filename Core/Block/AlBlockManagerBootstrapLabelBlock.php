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
    
    public function getHtml()
    {
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        
        return array('RenderView' => array(
            'view' => $this->blockTemplate,
            'options' => array('data' => $items[0]),
        ));
    }
    
    protected function replaceHtmlCmsActive()
    {
        $items = $this->decodeJsonContent($this->alBlock->getContent());
        $item = $items[0];
        
        $formClass = $this->container->get($this->formParam);
        $labelForm = $this->container->get('form.factory')->create($formClass, $item);
        
        return array('RenderView' => array(
            'view' => $this->editorTemplate,
            'options' => array('data' => $item, 'form' => $labelForm->createView()),
        ));
    }
}
