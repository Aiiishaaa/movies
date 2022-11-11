<?PHP
class Contact{
	protected $ContactId;
	protected $fullname;
	protected $Email;
	protected $Sujet;
	protected $Message;
	protected $Date;


	/**
	 * @return mixed
	 */
	public function getContactId() {
		return $this->ContactId;
	}

	/**
	 * @param mixed $number
	 */
	public function setContactId( $ContactId ) {
		$this->ContactId = $ContactId;
	}

	function __construct($fullname,$Email,$Sujet,$Message){
		$this->fullname=$fullname;
		$this->Email=$Email;
		$this->Sujet=$Sujet;
		$this->Message=$Message;

	}

	public function getFullname() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setFullname( $fullname ) {
		$this->fullname = $fullname;
	}

	/**
	 * @return mixed
	 */
	public function getSujet() {
		return $this->Sujet;
	}

	/**
	 * @param mixed $username
	 */
	public function setSujet( $Sujet ) {
		$this->Sujet = $Sujet;
	}

	/**
	 * @return mixed
	 */
	public function getMessage() {
		return $this->Message;
	}

	/**
	 * @param mixed $name
	 */
	public function setMessage( $Message ) {
		$this->Message = $Message;
	}

	

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->Email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $Email ) {
		$this->Email = $Email;
	}


	/**
	 * @return mixed
	 */
	public function getDate() {
		return $this->Date;
	}

	/**
	 * @param mixed $email
	 */
	public function setDate( $Date ) {
		$this->Date = $Date;
	}
}

