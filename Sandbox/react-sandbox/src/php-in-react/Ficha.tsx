const url = 'http://localhost:2020/'

/* async function getUsers() {
    return await fetch(url)
        .then(r => r.json());
}

getUsers().then(res => console.log(res)); */

import axios from 'axios'

/* axios.get(url).then(res => console.log(res.data)); */
/* axios.post(url, { nome: 'José' }) */

/* async function getUsers() {
    console.log('aaaaa');
    return await fetch(url, {
        method: 'POST',
        body: JSON.stringify({ nome: 'José'})
    })

} */

/* let resposta : String | Object;

resposta = { nome: 'José'};
resposta = Object.entries(resposta); */


async function getUsers() {
    return axios.post(url, { nome: 'José'});
}

getUsers();

export function Ficha() {
    return (
        <div>
        </div>
    )
}