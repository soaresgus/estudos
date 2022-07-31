import { Moon, Sun } from "phosphor-react";
import { useState } from "react"

export function ThemeButton() {
    const [darkTheme, setDarkTheme] = useState(false);

    function handleSetTheme(theme: boolean) {
        setDarkTheme(theme)
        document.documentElement.classList.toggle('dark');
    }

    return (
        <button onClick={() => handleSetTheme(!darkTheme)}>
            {
                darkTheme
                ?
                <Sun
                    size={20}
                    className='text-amber-400'
                />
                :
                <Moon
                    size={20}
                    className='text-amber-400'
                />
            }
        </button>
    )
}