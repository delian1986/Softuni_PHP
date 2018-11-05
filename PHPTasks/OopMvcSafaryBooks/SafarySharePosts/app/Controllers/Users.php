<?php


class Users extends Controller
{
    /**
     * @var User
     */
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //check for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Process the form
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else if (strlen($data['email']) < 3) {
                $data['email_err'] = 'Please valid email';
            } else if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            //Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            } else if (strlen($data['name']) < 3) {
                $data['name_err'] = 'Please at least 3 chars';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (strlen($data['password']) < 3) {
                $data['password_err'] = 'Password is too short';
            } else if ($data['password'] !== $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords should match';
            }

            //Make sure there is no errors
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //validated
                //pass hash
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                //proceed register
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You were registered please log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            //load form
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //check for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            //Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            if (!$this->userModel->findUserByEmail($data['email'])) {
                //User not found
                $data['email_err'] = 'No user found with that email';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            //Make sure there is no errors
            if (empty($data['email_err']) && empty($data['password_err'])) {
                //validated
                //Check and set logged in user
                $loggedUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedUser) {
                    //Create Session
                    $this->createUserSession($loggedUser);
                } else {
                    $data['password_err'] = 'Incorrect username or password';
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            //load form
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user): void
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('pages/index');
    }

    public function logout(): void
    {
        unset($_SESSION['user_id'], $_SESSION['user_email'], $_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }


}