import { useState } from 'react';
import '@Css/floatingLabel.css';

export default function Register() {
  const [emailFocused, setEmailFocused] = useState(false);
  const [passwordFocused, setPasswordFocused] = useState(false);
  const [nameFocused, setNameFocused] = useState(false);
  const [confirmPasswordFocused, setConfirmPassword] = useState(false);

  const handleFocusEmail = (event) => {
    setEmailFocused(true);
  };

  const handleFocusPassword = (event) => {
    setPasswordFocused(true);
  };

  const handleFocusName = (event) => {
    setNameFocused(true);
  };

  const handleFocusConfirmPassword = (event) => {
    setConfirmPassword(true);
  };

  return (
    <>
      <div className="login-section">
        <div className="materialContainer">
          <div className="box">
            <form method="POST" action="{{route('register')}}">
              <div className="login-title">
                <h2>Register</h2>
              </div>
              <div className="input">
                <label htmlFor="name" className={`floating-label ${nameFocused ? 'active' : ''}`}>Name</label>
                <input
                  type="text"
                  id="name"
                  className="block mt-1 w-full"
                  name="name"
                  required=""
                  onClick={handleFocusName}
                />
                <span className="text-danger mt-3">message </span>
              </div>
              <div className="input">
                <label htmlFor="emailname" className={`floating-label ${emailFocused ? 'active' : ''}`}>Email Address</label>
                <input
                  type="email"
                  id="emailname"
                  className="block mt-1 w-full"
                  name="email"
                  required=""
                  onClick={handleFocusEmail}
                />
                <span className="text-danger mt-3">message </span>
              </div>
              <div className="input">
                <label htmlFor="pass" className={`floating-label ${passwordFocused ? 'active' : ''}`}>Password</label>
                <input
                  type="password"
                  id="pass"
                  className="block mt-1 w-full"
                  name="password"
                  required=""
                  onClick={handleFocusPassword}
                />
                <span className="text-danger mt-3">message </span>
              </div>
              <div className="input">
                <label htmlFor="compass" className={`floating-label ${confirmPasswordFocused ? 'active' : ''}`}>Confirm Password</label>
                <input
                  type="password"
                  id="compass"
                  className="block mt-1 w-full"
                  name="password_confirmation"
                  required=""
                  onClick={handleFocusConfirmPassword}
                />
                <span className="text-danger mt-3">message </span>
              </div>
              <div className="button login">
                <button type="submit">
                  <span>Sign Up</span>
                  <i className="fa fa-check" />
                </button>
              </div>
            </form>
          </div>
          <p>
            <a href="#" className="theme-color">
              Already have an account?
            </a>
          </p>
        </div>
      </div>
    </>
  );
}
