<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Maxlength {

  /**
   * @var int|null
   */
  protected ?int $maxLength = NULL;

  /**
   * @return int|null
   */
  public function getMaxLength(): ?int {
    return $this->maxLength;
  }

  /**
   * @param int|null $maxLength
   *
   * @return void
   */
  public function setMaxLength(?int $maxLength): void {
    $this->maxLength = $maxLength;
  }

}