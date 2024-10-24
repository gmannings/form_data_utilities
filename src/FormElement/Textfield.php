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

class Textfield extends FormElement implements FormElementInterface {

  use Title;
  use DefaultValue;
  use Size;
  use Maxlength;
  use Pattern;
  use Required;
  use Attributes;

  public function __construct(FormBuilder $formBuilder, ?FormBuilder $parent = NULL) {
    parent::__construct($formBuilder, $parent);
    $this->type = ElementType::TEXT_FIELD;
  }

  public function fromArguments(
    ?string $title = NULL,
    ?string $defaultValue = NULL,
    ?int $size  = NULL,
    ?int $maxlength = NULL,
    bool $required = FALSE,
    ?string $pattern = NULL,
    ?array $attributeClass = NULL,
    ?string $attributeId = NULL,
    ?string $attributeName = NULL
  ): self {
    $this->callSettersFromArgList(get_defined_vars());
    return $this;
  }

}