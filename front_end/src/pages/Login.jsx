import { useState} from 'react';
import '@Css/floatingLabel.css';
export default function Login() {
  const [emailFocused, setEmailFocused] = useState(false);
  const [passwordFocused, setPasswordFocused] = useState(false);

  const handleFocusEmail = (event, field) => {
    setEmailFocused(true);
  };

  const handleFocusPassword = (event, field) => {
    setPasswordFocused(true);
  };

  return (
    <>
      <div className="login-section">
        <div className="materialContainer">
          <div className="box">
            <form method="POST" action="{{route('login')}}">
              <div className="login-title">
                <h2>Loginhrban</h2>
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
                  required=""
                  onClick={(event) => handleFocusPassword(event, 'email')}
                />
                <span className="text-danger mt-3">message</span>
              </div>

              <a href="javascript:void(0)" className="pass-forgot">
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
