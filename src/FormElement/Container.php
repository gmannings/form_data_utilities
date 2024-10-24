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

  public function __construct(FormBuilder $formBuilder, ?FormBuilder $parent = NULL) {
    parent::__construct($formBuilder, $parent);
    $this->type = ElementType::CONTAINER;
  }

  public function fromArguments(
    ?array $attributeClass = NULL,
    ?string $attributeId = NULL,
    ?string $attributeName = NULL
  ): self {
    $this->callSettersFromArgList(get_defined_vars());
    return $this;
  }

}