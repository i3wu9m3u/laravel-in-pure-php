<?php

class ExclusiveValidator
{
	private $parameters = [];
	private $errors = [];

	public function __construct(array $parameters)
	{
		$this->parameters = $parameters;
	}

	public function run()
	{
		$this->validateName();
		$this->validateAmount();
		$this->validateRefUrl();
		return empty($this->errors());
	}

	public function errors()
	{
		return $this->errors;
	}

	private function validateName()
	{
		$key = 'name';
		if (!isset($this->parameters[$key])) {
			$this->errors[$key][] = '名前が無い';
			return;
		}
		$name = $this->parameters[$key];
		if (mb_strlen($name) < 2) {
			$this->errors[$key][] = '名前は2文字から';
		} elseif (mb_strlen($name) > 10) {
			$this->errors[$key][] = '名前は10文字まで';
		}
	}

	private function validateAmount()
	{
		$key = 'amount';
		if (!isset($this->parameters[$key])) {
			$this->errors[$key][] = '数量が無い';
			return;
		}
		$value = $this->parameters[$key];
		$filtered = filter_var($value, FILTER_VALIDATE_INT);
		if (!is_int($filtered)) {
			$this->errors[$key][] = '数量は整数で';
		} elseif ($filtered <= 1) {
			$this->errors[$key][] = '数量は1以上を';
		}
	}

	private function validateRefUrl()
	{
		$key = 'ref_url';
		if (!isset($this->parameters[$key])) {
			$this->errors[$key][] = '参考URLが無い';
			return;
		}
		$value = $this->parameters[$key];
		if (!filter_var($value, FILTER_VALIDATE_URL)) {
			$this->errors[$key][] = '参考URLにはURLを入れて';
		}
	}
}
