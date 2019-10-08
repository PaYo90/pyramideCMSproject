<?php

namespace Wesel\Shortener;

class Shortener 
{
	const ALPHABET = '1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	private $db;
    
	public function __construct()
	{
		$this->db = new DB();
	}

	public function redirectToDestinationUrl($shortForm)
	{
		$this->db->query('SELECT * FROM url WHERE BINARY shortForm = :shortForm');
		$this->db->bind(':shortForm', $shortForm);
		
		$row = $this->db->single();

		if ($row) {
			$url = $row['destinationUrl'];
			$this->db->query('UPDATE url SET clicks = clicks + 1 WHERE id = :id');
			$this->db->bind(':id', $row['id']);
			$this->db->execute();
			header("Location:" . $url);
		}
		else {
			header("Location:https://" . ROOT_LANDING_URL);
		}
	}

	public function createShortUrl($destinationUrl)
	{
		$this->db->query('INSERT INTO url (shortForm, destinationUrl, userId) VALUES("", :url, :userId)');
		$this->db->bind(':url', $destinationUrl);
		$this->db->bind(':userId', $_SESSION['user']->id);
		$this->db->execute();
		// Verify
		if ($this->db->lastInsertId()) {
			$id = $this->db->lastInsertId();
			$shortForm = $this->encode($id);
			$this->db->query('UPDATE url SET shortForm = :shortForm WHERE id = :id');
			$this->db->bind(':shortForm', $shortForm);
			$this->db->bind(':id', $id);
			$this->db->execute();

			if ($this->db->rowsAffected() > 0)
				return ROOT_SHORT_URL . '/' . $shortForm;
		}

		return null;
	}

	public function deleteUrl($id)
	{
		$this->db->query('DELETE FROM url WHERE id = :id AND userId = :userId');
		$this->db->bind(':userId', $_SESSION['user']->id);
		$this->db->bind(':id', $id);
		$this->db->execute();

		return $this->db->rowsAffected() > 0;
	}

	private function encode($num) {
		$str = '';
		$base = strlen(self::ALPHABET);
		while ($num > 0) {
			$str = self::ALPHABET[($num % $base)] . $str;
			$num = (int) ($num / $base);
		}
		return $str;
	}
}