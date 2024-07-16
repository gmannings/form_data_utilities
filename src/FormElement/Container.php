<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\ElementType;
use Drupal\form_data_utilities\FormBuilder;
use Drupal\form_data_utilities\FormElement;
use Drupal\form_data_utilities\FormElementInterface;
use Drupal\form_data_utilities\FormElementTrait\Attributes;
use Drupal\form_data_utilities\FormElementTrait\Children;
use Drupal\form_data_utilities\FormElementTrait\Value;

class Container extends FormElement implements FormElementInterface {

  use Attributes;
  use Children;

  public function __construct(FormBuilder $formBuilder, ?FormElementInterface $parent = NULL) {
    parent::__construct($formBuilder, $parent);
    $this->type = ElementType::CONTAINER;
  }

}