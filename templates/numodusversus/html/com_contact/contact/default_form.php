<?php
/**
 * @version     1.0.2
 * @package     nuModusVersus
 * @author      Nuevvo - http://nuevvo.com
 * @copyright   Copyright (c) 2010 - 2013 Nuevvo Webware Ltd. All rights reserved.
 * @license     http://nuevvo.com/license
 */
 
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
 if (isset($this->error)) : ?>
  <div class="contact-error">
    <?php echo $this->error; ?>
  </div>
<?php endif; ?>

<div class="contact-form">
  <form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
    <fieldset>
      <legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
              
        <?php echo $this->form->getLabel('contact_name'); ?>
        <?php echo $this->form->getInput('contact_name'); ?>                
        <div class="clr"></div>
        <?php echo $this->form->getLabel('contact_email'); ?>
        <?php echo $this->form->getInput('contact_email'); ?>        
        <div class="clr"></div>        
        <?php echo $this->form->getLabel('contact_subject'); ?>
        <?php echo $this->form->getInput('contact_subject'); ?>        
        <div class="clr"></div>
        <?php echo $this->form->getLabel('contact_message'); ?>
        <?php echo $this->form->getInput('contact_message'); ?>        
        <div class="clr"></div>
        <?php //Dynamically load any additional fields from plugins. ?>
         <?php foreach ($this->form->getFieldsets() as $fieldset): ?>
              <?php if ($fieldset->name != 'contact'):?>
                   <?php $fields = $this->form->getFieldset($fieldset->name);?>
                   <?php foreach($fields as $field): ?>
                        <?php if ($field->hidden): ?>
                             <?php echo $field->input;?>
                        <?php else:?>                            
                              <?php echo $field->label; ?>
                                <?php if (!$field->required && $field->type != "Spacer"): ?>
                                   <span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL');?></span>
                                <?php endif; ?>
                             <?php echo $field->input;?>                           
                        <?php endif;?>
                   <?php endforeach;?>
              <?php endif ?>
         <?php endforeach;?>       
        <?php if ($this->params->get('show_email_copy')){ ?>           
            <?php echo $this->form->getLabel('contact_email_copy'); ?>
            <?php echo $this->form->getInput('contact_email_copy'); ?>
          <?php } ?>
          
        <button class="button validate" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>         
              
        <div class="clr"></div>  
        <input type="hidden" name="option" value="com_contact" />
        <input type="hidden" name="task" value="contact.submit" />
        <input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
        <input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
        <?php echo JHtml::_( 'form.token' ); ?>
  
    </fieldset>
  </form>
</div>
