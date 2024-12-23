<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\ElementType;
use Drupal\form_data_utilities\FormBuilder;
use Drupal\form_data_utilities\FormElement;
use Drupal\form_data_utilities\FormElementInterface;
use Drupal\form_data_utilities\FormElementTrait\Attributes;
use Drupal\form_data_utilities\FormElementTrait\DefaultValue;
use Drupal\form_data_utilities\FormElementTrait\Maxlength;
use Drupal\form_data_utilities\FormElementTrait\Pattern;
use Drupal\form_data_utilities\FormElementTrait\Required;
use Drupal\form_data_utilities\FormElementTrait\Size;
use Drupal\form_data_utilities\FormElementTrait\Title;
use Drupal\form_data_utilities\FormElementTrait\Value;

class Button extends FormElement implements FormElementInterface {

  use Value;
  use Attributes;

  public function __construct(FormBuilder $formBuilder, ?FormBuilder $parent = NULL) {
    parent::__construct($formBuilder, $parent);
    $this->type = ElementType::BUTTON;
  }

  public function fromArguments(
    ?string $value = NULL,
    ?array $attributeClass = NULL,
    ?string $attributeId = NULL,
    ?string $attributeName = NULL
  ): self {
    $this->callSettersFromArgList(get_defined_vars());
    return $this;
  }

}