<?php

namespace Drupal\form_data_utilities;

interface FormElementInterface {

  /**
   * For ease of fluent interface addition
   *
   * @return \Drupal\form_data_utilities\FormBuilder|FormElementInterface
   */
  public function done(): FormBuilder|FormElementInterface;

  /**
   * Get the element's render array with populated properties.
   *
   * @return array
   */
  public function getRenderArray(): array;

}