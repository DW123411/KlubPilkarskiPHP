<?php
	namespace Exceptions;
  /**
   * Klas błędu pustej wartości
   */
  class EmptyValue extends General
  {
	  public function __construct($previousException = null){
	    parent::__construct($previousException, \Messages\Error::$empty);
	  }
  }
