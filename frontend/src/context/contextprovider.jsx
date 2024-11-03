import { useContext, useState, createContext } from "react";
import { cookies } from "next/headers";

const StateContext = createContext({
	user: null,
	token: null,
	setUser: () => {},
	setToken: () => {},
});

export const ContextProvider = ({ children }) => {
	const [user, setUser] = useState({});
	const [token, _setToken] = useState(cookies().get("ACCESS_TOKEN"));

	const setToken = (token) => {
		_setToken(token);
		if (token) {
			cookies().set("ACCESS_TOKEN", token);
		} else {
			cookies().delete("ACCESS_TOKEN");
		}
	};
	return (
		<StateContext.Provider
			value={{
				user,
				token,
				setUser,
				setToken,
			}}>
			{children}
		</StateContext.Provider>
	);
};

export const useStateContext = () => useContext(StateContext);
