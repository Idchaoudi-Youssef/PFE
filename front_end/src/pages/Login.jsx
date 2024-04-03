
import '@Assets/css/demo2.css'
import '@Assets/css/demo4.css'

export default function Login() {
    return (
        <>
     <div className="login-section">
        <div className="materialContainer">
            <div className="box">
            <form method="POST" action="{{route('login')}}">
                <div className="login-title">
                <h2>Login</h2>
                </div>
                <div className="input">
                <label htmlFor="name">Email</label>
                <input type="email" id="name" name="email" required="" autofocus="" autoComplete="name" />
                <span className="text-danger mt-3">error message</span>
                </div>
                <div className="input">
                <label htmlFor="pass">Password</label>
                <input type="password" id="pass" className="block mt-1 w-full" name="password" required="" autoComplete="current-password" />
                <span className="text-danger mt-3">error message</span>
                </div>
                <a href="javascript:void(0)" className="pass-forgot">
                Forgot your password?
                </a>
                <div className="button login">
                <button type="submit">
                    <span>Log In</span>
                    <i className="fa fa-check" />
                </button>
                </div>
                <p>
                Not a member?
                <a href="{{route('register')}}" className="theme-color">
                     Sign up now
                </a>
                </p>
            </form>
            </div>
        </div>
        </div>



        </>
    )
}
