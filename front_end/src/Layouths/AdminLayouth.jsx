import { Outlet } from 'react-router-dom'
import Footer from '../Components/Footer.jsx'
import AdminHeader from '../Components/Header/AdminHeader.jsx'
export default function AdminLayouth() {
    return (
        <>
        <AdminHeader/>
        <main>
            <Outlet/>
        </main>
        <Footer/>
        </>
    )
}


