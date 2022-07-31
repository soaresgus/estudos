import { Routes, Route, Link } from 'react-router-dom'
import { Home } from './Components/Home'
import { Pagina1 } from './Components/Pagina1'
import { Pagina2 } from './Components/Pagina2'
import { Player } from './Components/Player'

export function RoutesTest() {
    return (
        <>
        <Routes>
            <Route path='/' element={<Home />} />
            <Route path='/pagina1' element={<Pagina1 />} />
            <Route path='/pagina2' element={<Pagina2 />} />
        </Routes>
        
        <Player />
        </>        
    )
}