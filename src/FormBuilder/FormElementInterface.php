<?php

namespace Drupal\form_data_utilities\FormBuilder;

use Drupal\form_data_utilities\FormBuilder;

interface FormElementInterface {

  /**
   * For ease of fluent interface addition
   *
   * @return \Drupal\form_data_utilities\FormBuilder|FormElementInterface
   */
  public function done(): FormBuilder|FormElementInterface;

  public function getRenderArray(): array;

}