<?php

namespace App\Model;

use App\Model\MyMailerClass;
use PHPMailer\PHPMailer\PHPMailer;
use App\Model\ConfigClass;
use App\Model\ValidationModel;

class UserClass
{
	private $errors;
	public $db;
	protected $user;

	protected $imie;
	protected $nazwisko;
	protected $email;
	protected $pass1;
	protected $pass2;

	function __construct($db, $email, $pass1, $pass2 = null, $imie = null, $nazwisko = null)
	{
		$this->imie = $imie;
		$this->nazwisko = $nazwisko;
		$this->email = $email;
		$this->pass1 = $pass1;
		$this->pass2 = $pass2;
		$this->db = $db;
	}

	public function setErrors(array $errors)
	{
		$this->errors = $errors;
	}

	public function getErrors(): array
	{
		return $this->errors;
	}

	public function setUser(array $user)
	{
		$this->user = $user;
	}

	public function getUser(): array
	{
		return $this->user;
	}

	public function isLogin(): bool
	{
		$errors['incorret_login'] = "";
		$errors['incorret_pass'] = "";
		$errors['unactive_account'] = "";
		$allTrue = true;

		if (!$this->isUserExists($this->email)) {
			$allTrue = false;
			$errors['incorret_login'] = "Nie ma takiego użytkownika.";
		}

		if (!$this->isCorrectPassword($this->email, $this->pass1)) {
			$allTrue = false;
			$errors['incorret_pass'] = "Niepoprawne hasło.";
		}

		if ($allTrue) {
			if (!$this->isActivated($this->email, $this->pass1)) {
				$errors['unactive_account'] = "Kliknij w wysłany link aktywacyjny!";
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

	private function isUserExists($userEmail): bool
	{
		$user = $this->db->query("SELECT * FROM users WHERE email='$userEmail'");

		$mail_count = $user->num_rows;

		if ($mail_count > 0) {
			$user->close();

			return true;
		}

		return false;
	}

	private function isCorrectPassword($userEmail, $userPass): bool
	{
		$hash_pass = sha1($userPass);
		$user = $this->db->query("SELECT * FROM users WHERE email='$userEmail' AND password='$hash_pass'");

		$mail_count = $user->num_rows;

		if ($mail_count > 0) {
			$user->close();

			return true;
		}

		return false;
	}

	private function isActivated($userEmail, $userPass): bool
	{
		$hash_pass = sha1($userPass);
		$result = $this->db->query("SELECT * FROM users WHERE email='$userEmail' AND password='$hash_pass'");

		$row = $result->fetch_all();

		$this->setUser($row[0]);

		$isActive = $this->getUser()[6];

		if ($isActive == 0) {

			return false;
		}

		return true;
	}

	public function register(): bool
	{
		$errors['empty_imie'] = "";
		$errors['empty_nazwisko'] = "";
		$errors['hasSpaces_imie'] = "";
		$errors['hasSpaces_nazwisko'] = "";
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

		if (ValidationModel::hasSpaces($this->imie)) {
			$allTrue = false;
			$errors['hasSpaces_imie'] = "Imię nie może zawierać spacji.";
		}

		if (ValidationModel::hasSpaces($this->nazwisko)) {
			$allTrue = false;
			$errors['hasSpaces_nazwisko'] = "Nazwisko nie może zawierać spacji.";
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
		$email = $this->email;
		$result = $this->db->query("SELECT email FROM users WHERE email='$email'");

		$mail_count = $result->num_rows;

		if ($mail_count > 0) {
			$result->close();

			return false;
			exit();
		}

		$hash_pass = sha1($this->pass1);
		$active_string = sha1(time());

		$insert = "INSERT INTO users (id, firstname, lastname, password, email, active_string, is_active) VALUES ('null', '$this->imie', '$this->nazwisko', '$hash_pass', '$this->email', '$active_string', 'null')";
		
		mysqli_query($this->db, $insert);
		mysqli_close($this->db);

		$mailer = new PHPMailer();
		$myMailer = new MyMailerClass(ConfigClass::getMailerConfig(), $mailer);
		$myMailer->setActiveString($active_string);
		$myMailer->sendEmail($this->email);

		return true;
	}
}