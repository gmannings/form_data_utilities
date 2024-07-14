<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder\FormElement;
use Drupal\form_data_utilities\FormBuilder\FormElementInterface;

class Textfield extends FormElement implements FormElementInterface {

  public function getRenderArray(): array {
    return [
      '#type' => 'textfield',
    ];
  }

}