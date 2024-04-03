import { useState} from 'react';
import '@Css/floatingLabel.css';
import axios from '../api/axios';
import { useNavigate } from 'react-router-dom';
export default function Login() {
  const [emailFocused, setEmailFocused] = useState(false);
  const [passwordFocused, setPasswordFocused] = useState(false);


  const handleFocusEmail = (event, field) => {
    setEmailFocused(true);
  };

  const handleFocusPassword = (event, field) => {
    setPasswordFocused(true);
  };
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();


  const handleSubmit = async (e) => {
    e.preventDefault();

 
      // Fetch the CSRF cookie first
      axios.defaults.withCredentials = true;
      axios.defaults.withXSRFToken = true;
  try {
    await axios.get('http://localhost:8000/sanctum/csrf-cookie');
    await axios
      .post('http://localhost:8000/login', {
        email: email,
        password: password,
      });

      
      setEmail("");
      setPassword("");
      navigate("/");
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <>
      <div className="login-section">
        <div className="materialContainer">
          <div className="box">
            <form method="POST" action="{{route('login')}}" onSubmit={handleSubmit}>
              <div className="login-title">
                <h2 >Login</h2>
              </div>
              <div className="input">
                <label
                  htmlFor="name"
                  className={`floating-label ${emailFocused ? 'active' : ''}`}
                >
                  Email
                </label>
                <input
                  type="email"
                  id="name"
                  name="email"
                  onChange={(e) => setEmail(e.target.value)}
                  required=""                
                  onClick={(event) => handleFocusEmail(event, 'email')}
                />
                <span className="text-danger mt-3">message</span>
              </div>

              <div className="input">
                <label
                  htmlFor="pass"
                  className={`floating-label ${passwordFocused ? 'active' : ''}`}
                >
                  Password
                </label>
                <input
                  type="password"
                  id="pass"
                  className="block mt-1 w-full"
                  name="password"
                  onChange={(e) => setPassword(e.target.value)}
                  required=""
                  onClick={(event) => handleFocusPassword(event, 'email')}
                />
                <span className="text-danger mt-3">message</span>
              </div>

              <a href="#" className="pass-forgot">
                Forgot your password?
              </a>

              <div className="button login">
                <button type="submit">
                  <span>Log In</span>
                  <i className="fa fa-check"></i>
                </button>
              </div>
              <p>
                Not a member?{' '}
                <a href="{{route('register')}}" className="theme-color">
                  Sign up now
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </>
  );
}
