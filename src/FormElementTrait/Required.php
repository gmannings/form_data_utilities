<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Required {

  /**
   * @var bool
   */
  protected bool $required = FALSE;

  /**
   * @return bool
   */
  public function isRequired(): bool {
    return $this->required;
  }

  /**
   * @param bool $required
   *
   * @return void
   */
  public function setRequired(bool $required): void {
    $this->required = $required;
  }

}