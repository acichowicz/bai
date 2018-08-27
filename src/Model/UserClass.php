<?php

namespace App\Model;

use App\Model\MyMailerClass;
use PHPMailer\PHPMailer\PHPMailer;
use App\Model\ConfigClass;

class UserClass
{
	private $errors;

	protected $imie;
	protected $nazwisko;
	protected $email;
	protected $pass1;
	protected $pass2;

	function __construct($imie, $nazwisko, $email, $pass1, $pass2)
	{
		$this->imie = $imie;
		$this->nazwisko = $nazwisko;
		$this->email = $email;
		$this->pass1 = $pass1;
		$this->pass2 = $pass2;
	}

	public function setErrors(array $errors)
	{
		$this->errors = $errors;
	}

	public function getErrors(): array
	{
		return $this->errors;
	}

	public function register(): bool
	{
		$errors['empty_imie'] = "";
		$errors['empty_nazwisko'] = "";
		$errors['invalid_email'] = "";
		$errors['invalid_pass'] = "";
		$errors['diffrent_pass'] = "";
		$errors['user_exist'] = "";
		$allTrue = true;

		if (strlen($this->imie)<1) {
			$allTrue = false;
			$errors['empty_imie'] = "To pole nie może być puste";
		}

		if (strlen($this->nazwisko)<1) {
			$allTrue = false;
			$errors['empty_nazwisko'] = "To pole nie może być puste";
		}

		if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
			$allTrue = false;
			$errors['invalid_email'] = "Niepoprawny email";
		}

		if (strlen($this->pass1)<4 || strlen($this->pass2)>20) {
			$allTrue = false;
			$errors['invalid_pass'] = "Hasło musi miec między 4 a 20 znaków.";
		}

		if ($this->pass1 != $this->pass2) {
			$allTrue = false;
			$errors['diffrent_pass'] = "Hasła nie są identyczne.";
		}

		if ($allTrue) {
			if (!$this->save()) {
				$errors['user_exist'] = "Taki użytkownik już istnieje.";
				$this->setErrors($errors);

				return false;
			}
			$this->setErrors($errors);

			return true;
		} else {
			$this->setErrors($errors);

			return false;
		}
	}

	public function save()
	{
		$msql = new \mysqli('localhost', 'dev', 'dev', 'bai');

		$email = $this->email;
		$result = $msql->query("SELECT email FROM users WHERE email='$email'");

		$mail_count = $result->num_rows;

		if ($mail_count > 0) {
			$result->close();

			return false;
			exit();
		}

		$active_string = sha1(time());

		$insert = "INSERT INTO users (id, firstname, lastname, password, email, active_string, is_active) VALUES ('null', '$this->imie', '$this->nazwisko', '$this->pass1', '$this->email', '$active_string', 'null')";
		
		mysqli_query($msql, $insert);
		mysqli_close($msql);

		$mailer = new PHPMailer();
		$myMailer = new MyMailerClass(ConfigClass::getConfig(), $mailer);
		$myMailer->setActiveString($active_string);
		$myMailer->sendEmail();

		return true;
	}
}