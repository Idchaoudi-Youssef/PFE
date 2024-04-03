
import Header from './Header.jsx'
export default function GuestHeader(){
    return(
        <>
    <Header>
    <li className="onhover-dropdown">
    <div className="cart-media name-usr">
     youssef <i data-feather="user" />
     </div>
      <div className="onhover-div profile-dropdown">
       <ul>
        <li><a href="{{route('login')}}" className="d-block">Login</a></li>
         <li><a href="{{route('register')}}" className="d-block">Register</a></li>
         </ul>
    </div>
     </li>
      </Header>
        </>
    )
}
