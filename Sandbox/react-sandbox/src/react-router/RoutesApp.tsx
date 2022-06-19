import { Link } from "react-router-dom";
import { RoutesTest } from "./Routes";

export function App() {
    return (
        <div>
            <header>
                <nav>
                    <Link to='/'>Home</Link>
                    <Link to='/pagina1'>Página 1</Link>
                    <Link to='/pagina2'>Página 2</Link>
                </nav>
            </header>

            <RoutesTest />
        </div>
    )
}