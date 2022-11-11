<?PHP
class User{
	protected $id;
	protected $username;
	protected $name;
	protected $surname;
	protected $email;
	protected $password;
	protected $status;
	protected $number;

	
	/**
	 * @return mixed
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber( $number ) {
		$this->number = $number;
	}

	function __construct($name,$username,$email,$password){
		$this->name=$name;
		$this->username=$username;
		$this->email=$email;
		$this->password=$password;
	}

	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername( $username ) {
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getSurname() {
		return $this->surname;
	}

	/**
	 * @param mixed $surname
	 */
	public function setSurname( $surname ) {
		$this->surname = $surname;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $email ) {
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword( $password ) {
		$this->password = $password;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus( $status ) {
		$this->status = $status;
	}



}

