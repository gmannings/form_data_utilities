<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Size {

  /**
   * @var int|null
   */
  protected ?int $size = NULL;

  /**
   * @return int|null
   */
  public function getSize(): ?int {
    return $this->size;
  }

  /**
   * @param int|null $size
   *
   * @return void
   */
  public function setSize(?int $size): void {
    $this->size = $size;
  }

}