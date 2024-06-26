import {createContext, useState} from "react";

export const AuthContext = createContext(undefined);

export const AuthProvider = ({children}) => {
    const [isLoggedIn, setIsLoggedIn] = useState(false)
    const signIn = () => setIsLoggedIn(true)
    const signOut = () => setIsLoggedIn(false)


    return(
        <AuthContext.Provider value={{isLoggedIn, signIn, signOut}}>
            {children}
        </AuthContext.Provider>
    )

}

