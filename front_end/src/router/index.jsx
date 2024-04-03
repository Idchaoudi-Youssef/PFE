import {createBrowserRouter} from "react-router-dom";
import Home from "../pages/Home.jsx";
import Login from "../pages/Login.jsx";
import Register from "../pages/Register.jsx";
import Contact from "../pages/Contact.jsx";
import About from "../pages/About.jsx";
import Blog from "../pages/Blog.jsx";
import Profile from "../pages/Profile.jsx"
import Wishlist from "../pages/Wishlist.jsx";
import Notfound from "../pages/Notfound.jsx";
import UserLayouth from "../Layouths/UserLayouth.jsx"
import SharedLayouth from "../Layouths/SharedLayouth.jsx"
import GuestLayouth from "../Layouths/GuestLayouth.jsx"
import AdminLayouth from "../Layouths/AdminLayouth.jsx"
export const router = createBrowserRouter([

            {
                element: <UserLayouth/>,
                children: [
                    {
                        path: "profile",
                        element: <Profile/>
                    },
                    {
                        path: "/wishlist",
                        element: <Wishlist/>
                    },

                ]
            },
            {
                element: <SharedLayouth/>,
                children: [
                    {
                        path: "/",
                        element: <Home/>
                    },
                    {
                        path: "/contact",
                        element: <Contact/>
                    },
                    {
                        path: "/about",
                        element: <About/>
                    },
                    {
                        path: "/blog",
                        element: <Blog/>
                    },
                ]
            },
            {
                element: <GuestLayouth/>,
                children: [
                    {
                        path: "/login",
                        element: <Login/>
                    },
                    {
                        path: "/register",
                        element: <Register/>
                    },

                ]
            },
            {
                element:<AdminLayouth/>,
                children:[
                    {
                        path: "dashboard",
                        element: <h1>hello admin</h1>
                    },
                    {
                        path: "products",
                        element: <h1>hello admin</h1>
                    },
                    {
                        path: "users",
                        element: <h1>hello admin</h1>
                    },
                    {
                        path: "brands",
                        element: <h1>hello admin</h1>
                    },
                    {
                        path: "/wishlist",
                        element: <h1>hello admin</h1>
                    },

                ]
            },
            {
                path: "*",
                element: <Notfound/>
            }

])
