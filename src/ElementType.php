<?php

namespace Drupal\form_data_utilities;

enum ElementType: string {

  case TEXT_FIELD = 'textfield';
  case TEXTAREA = 'textarea';
  case SELECT = 'select';
  case CHECKBOX = 'checkbox';
  case RADIO = 'radio';
  case SUBMIT = 'submit';
  case BUTTON = 'button';
  case MARKUP = 'markup';
  case CONTAINER = 'container';
  case TABLE = 'table';
  case LINK = 'link';
  case IMAGE = 'image';
  case ITEM_LIST = 'item_list';
  case DETAILS = 'details';
  case FORM = 'form';
  case EMAIL = 'email';
  case TEL = 'tel';
  case NUMBER = 'number';
  case DATE = 'date';
  case DATETIME = 'datetime';
  case TIME = 'time';
  case PASSWORD = 'password';
  case SEARCH = 'search';
  case RANGE = 'range';
  case COLOR = 'color';
  case FILE = 'file';
  case HIDDEN = 'hidden';
  case TEXT_FORMAT = 'text_format';

}
