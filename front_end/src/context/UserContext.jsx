import { createContext, useState } from "react"

const context = createContext({
    user: null,
    setUser: () => {},
    logout: () => {},
    login: () => {},
})
export default function UserContext({ children }) {
    const [user, setUser] = useState(null);
    const logout = () => setUser(null);
  return <>

    <context.Provider value={{ user, setUser, logout }}>
      {children}
    </context.Provider>

  </>
}
